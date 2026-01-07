<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Table extends Component
{
    public $titulo = 'Ultimos cambios en el inventario';
    public $estilos = 'shadow-2xl rounded-2xl bg-white';
    //estilos para las cards en los formularios 
    public $cardEstilos = 'shadow-2xl rounded-2xl bg-white h-[170px]';


    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
