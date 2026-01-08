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



    public function __construct()
    {
        $this->fechaInicio = date('Y-m-d');
        $this->fechaFin = date('Y-m-d');
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
    
    //Calcula el total inicial del producto en la fecha inicial seleccionadas
    #[Computed()]
    public function exInicial(){
        $Productos = $this->productos();
        return Cache::remember($this->getCacheKey('exInicial'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos ->map(function($producto){
                $pos = ($producto->id_producto)-1;
                return ($this->exFinal[($pos)] - ($this->Entradas[($pos)] - $this->Salidas[($pos)]));
            });
        }); 
    } 

    
    //Calcula las existencias finales del producto en la fecha final seleccionada
    #[Computed()]
    public function exFinal(){
        $Productos = $this->productos();
        return Cache::remember($this->getCacheKey('exFinal'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos ->map(function($producto){
                $pos = ($producto->id_producto)-1;
                return ($this->totalEntradas[($pos)] - $this->totalSalidas[($pos)]);
            });
        });
    }
    #[Computed()]
    public function totalEntradas(){
        $Productos = $this->productos();
        return Cache::remember($this->getCacheKey('totalEntradas'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos->map(function($producto){
                return Registro::where('tipo_registro',1)
                                ->whereBetween('fecha_registro',[date('0000-01-01'),$this -> fechaFin])
                                ->where('producto_id', $producto->id_producto)
                                ->sum('cantidad_registro');
            });
        });
    }
    #[Computed()]
    public function totalSalidas(){
        $Productos = $this->productos();

        return Cache::remember($this->getCacheKey('totalSalidas'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos->map(function($producto){
                return Registro::where('tipo_registro',0)
                                ->whereBetween('fecha_registro',[date('0000-01-01'),$this -> fechaFin])
                                ->where('producto_id', $producto->id_producto)
                                ->sum('cantidad_registro');
            });
        });
    }



    //Calcula el total de entradas del producto en el rango de fechas seleccionado
    #[Computed()]
    public function Entradas(){  
        $Productos = $this->productos();

        return Cache::remember($this->getCacheKey('Entradas'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos->map(function($producto){
                return Registro::where('tipo_registro',1)
                                ->whereBetween('fecha_registro',[$this-> fechaInicio,$this -> fechaFin])
                                ->where('producto_id', $producto->id_producto)
                                ->sum('cantidad_registro');
            });
        });
    }

    //Calcula el total de salidas del producto en el rango de fechas seleccionado
    #[Computed()]
    public function Salidas(){
        // $Salidas = $this ->salidas();
        $Productos = $this->productos();
        return Cache::remember($this->getCacheKey('Salidas'), now()->addMinutes(10), function() use ($Productos) {
            return $Productos->map(function($producto){
                return Registro::where('tipo_registro',0)
                                ->whereBetween('fecha_registro',[$this-> fechaInicio,$this -> fechaFin])
                                ->where('producto_id', $producto->id_producto)
                                ->sum('cantidad_registro');
            });
        });
        
        /*
        Esta linea se usa para calcular el total de salidas 
        $Salidas->sum(function($registro) { return $registro->Salida->cantidad_salida; }); 
        */
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