<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class CardTable extends Component
{
    public $estilos = 'shadow-2xl rounded-2xl bg-white h-[170px]';
    public $mostrarBotonEditar = false;    

    public function render()
    {
        return view('livewire.dashboard.card-table');
    }
}
