<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\{
    Producto,
    Salida,
    Entrada,
    Registro
};

class Reporte extends Component
{
    public $pos = 1;
    public $sortBy = 'id_producto';
    public $sortDir = 'ASC';
    public $fechaInicio;
    public $fechaFin;
    
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

    

    public function totalInicial($producto){
        return ($producto->cantidad_producto + ($this->totalEntradas($producto->id) - $this->totalSalidas($producto->id)));
    }   

    
    public function totalEntradas($id_producto){
        return Entrada::join('registros', 'entradas.id_entrada', '=', 'registros.id_registro')
        ->where('registros.producto_id', $id_producto)
        ->whereBetween('entradas.created_at', [$this->fechaInicio, $this->fechaFin])
        ->sum('entradas.cantidad_entrada');
    }

    
    
    public function totalSalidas($id_producto){
        return Salida::join('registros', 'salidas.id_salida', '=', 'registros.id_registro')
        ->where('registros.producto_id', $id_producto)
        ->whereBetween('salidas.created_at', [$this->fechaInicio, $this->fechaFin])
        ->sum('salidas.cantidad_salida');
    }

    public function render()
    {
        return view('livewire.tabla.reporte',[
            'productos' => Producto::all(),
        ]);
        
    }
}
