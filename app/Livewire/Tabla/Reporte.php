<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use App\Models\{
    Producto,
    Salida,
    Entrada,
    Registro
};

class Reporte extends Component
{
    #[Url(history: true)]
        public $fechaInicio;
    #[Url(history: true)]
        public $fechaFin;
    
    public $showPdfButton = true;
    public $sortBy = 'id_producto';
    public $sortDir = 'ASC';
    public $pos = 1;

    //Inicializa los totales de entradas y salidas
    public $totalSalida;
    public $totalEntrada;


    public function mount($fechaInicio = null, $fechaFin = null){
        $this->fechaInicio = $fechaInicio ?? date('Y-m-d');
        $this->fechaFin = $fechaFin ?? date('Y-m-d');
    }

    public function setSortBy($sortBy){
        if($sortBy === 'NoFiltro') {
            return;
        }
        if($this->sortBy === $sortBy){
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }
    
    //Genera una clave unica para cada consulta de cache basado en las fechas y el tipo de dato
    private function getCacheKey($tipo){
        return "reporte-{$this->fechaInicio}-{$this->fechaFin}-{$tipo}";
    }
    
    public function placeholder(){
    return view('livewire.placeholders.tabla.reporte-placeholder');
    }


    //Calcula el total inicial del producto en la fecha inicial seleccionadas
    #[Computed()]
    public function datosReporte(){
        $Productos = $this->productos();

        return Cache::remember($this->getCacheKey('datosReporte'), now()->addMinutes(60), function() use ($Productos) {
            return $Productos ->map(function($producto){
                $pos = ($producto->id_producto)-1;
                //Registros en el rango de fechas
                $registro = Registro::whereBetween('fecha_registro',[$this-> fechaInicio,$this -> fechaFin])
                                ->where('producto_id', $producto->id_producto);
                //Totales de entradas y salidas en el rango de fechas
                    $entrada = $registro->where('tipo_registro',1)->sum('cantidad_registro');
                    $salida = $registro->where('tipo_registro',0)->sum('cantidad_registro');
                
                //Registros totales hasta la fecha final
                $totalRegistro = Registro::where('fecha_registro','<',$this -> fechaFin)
                                ->where('producto_id', $producto->id_producto);
                //Totales de entradas y salidas hasta la fecha final
                $totalEntrada = $totalRegistro->where('tipo_registro',1)->sum('cantidad_registro');
                $totalSalida = $totalRegistro->where('tipo_registro',0)->sum('cantidad_registro');
                
                //Existencias finales e iniciales en el periodo
                $exFinal = $totalEntrada - $totalSalida;
                $exInicial = $exFinal - ($entrada - $salida);


                return [
                    'datos_producto' => $producto,
                    'exInicial' => $exInicial,
                    'totalEntrada' => $entrada,
                    'totalSalida' => $salida,
                    'exFinal' => $exFinal,
                ];
            });
        });
    }


    //Productos
    #[Computed()]
    public function productos(){
        return Producto::all();
    }
    //Devuelve todos los productos para el reporte
    public function render()
    {
        return view('livewire.tabla.reporte',[]);
        
    }
}



/*
INICIALIZAR TINKER

use App\Models\{
    Producto,
    Salida,
    Entrada,
    Registro
};
$fechaInicio = date('0000-01-01');
$fechaFin = date('Y-m-d');

$Productos = Producto::all();
$Entradas = Entrada:: join('registros', 'entradas.id_entrada', '=', 'registros.id_registro')->whereBetween('registros.fecha_registro',[$fechaInicio,$fechaFin]);
$Salidas = Salida:: join('registros', 'salidas.id_salida', '=', 'registros.id_registro')->whereBetween('registros.fecha_registro',[$fechaInicio,$fechaFin]);
*/