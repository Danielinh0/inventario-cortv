<?php

namespace App\Livewire\Dashboard;
use Livewire\Attributes\Computed;
use App\Models\Registro;
use Livewire\Component;
use App\Models\Producto;

class Table extends Component
{
    public $titulo = 'Ultimos cambios en el inventario';
    public $estilos = 'shadow-2xl rounded-2xl bg-white';
    //estilos para las cards en los formularios 
    public $cardEstilos = 'shadow-2xl rounded-2xl bg-white h-[170px]';
    //controla si se muestra el boton editar en las cards
    public $mostrarBotonEditar = false;
    //obtiene los ultimos 3 productos añadidos
    public $mostrar_Nuevo_Producto = false;
    
    #[Computed()]
    public function Productos(){
        return Producto::orderBy('created_at','DESC')->take(3)->get();
    }

    //obtiene los ultimos 3 registros de entradas y salidas
    #[Computed()]
    public function Registros(){
        return Registro::orderBy('fecha_registro','DESC')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
