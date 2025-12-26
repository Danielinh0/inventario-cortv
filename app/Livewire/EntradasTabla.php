<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entrada;
use Livewire\WithPagination;    


class EntradasTabla extends Component
{
    public function render()
    {
        return view('livewire.entradas-tabla');
    }
}
