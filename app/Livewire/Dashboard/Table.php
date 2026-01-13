<?php

namespace App\Livewire\Dashboard;
use Livewire\Attributes\Computed;
use App\Models\{Registro, Producto};
use Livewire\Component;
use App\Models\Producto;

class Table extends Component
{
    //Tipo de tabla: 0=ultimos registros, 1=productos con stock bajo, 2=productos agotados
    public $tipo = 0;

    public $estilos = 'shadow-2xl rounded-2xl bg-white';
    //estilos para las cards en los formularios 
    public $cardEstilos = 'shadow-2xl rounded-2xl bg-white h-[170px]';
    //controla si se muestra el boton editar en las cards
    public $mostrarBotonEditar = false;
    //obtiene los ultimos 3 productos añadidos
    public $mostrar_Nuevo_Producto = false;
    
    public function mount()
    {
        //
    }

    public function titulo(){
        switch($this->tipo){
            case 0:
                return 'Ultimos cambios en el inventario';
            case 1:
                return 'Ultimos productos añadidos';
            case 2:
                return 'Ultimas entradas al inventario';
        }
    }
    
    #[Computed()]
    public function Productos(){
        return Producto::orderBy('created_at','DESC')->take(3)->get();
    }

    //obtiene los ultimos 3 registros de entradas y salidas
    #[Computed()]
    public function Registros(){
        switch ($this->tipo){
            case 0:
            case 1:
                return Registro::orderBy('fecha_registro','DESC')->take(3)->get();
                // return Producto::orderBy('created_at','DESC')->take(3)->get();
            case 2:
                return Registro::where('tipo_registro', 1)->orderBy('fecha_registro','DESC')->take(3)->get();
        }
    }

    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
