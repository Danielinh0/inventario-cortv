<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\{
    Producto,
    Salida,
    Entrada,
};

class Reporte extends Component
{
    public $pos = 1;
    public $sortBy = 'id_producto';
    public $sortDir = 'ASC';
    public $fechaInicio;
    public $fechaFin;
    public function totalInicial(){

    }

    public function totalEntradas(){
        return Entrada::whereBetween('fecha', [$fechaInicio, $fechaFin])->sum('cantidad');
    }
    
    public function totalSalidas(){

    }

    public function render()
    {
        return view('livewire.tabla.reporte',[
            'productos' => Producto::all(),
        ]);
        
    }
}
