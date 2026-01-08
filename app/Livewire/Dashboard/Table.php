<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Table extends Component
{
    public $titulo = 'Ultimos cambios en el inventario';
    public $estilos = 'shadow-2xl rounded-2xl bg-white';
    //estilos para las cards en los formularios 
    public $cardEstilos = 'shadow-2xl rounded-2xl bg-white h-[170px]';
    //controla si se muestra el boton editar en las cards
    public $mostrarBotonEditar = false;


    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
