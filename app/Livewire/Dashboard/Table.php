<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Registro;
class Table extends Component
{
    //Se buscan los primeros 3 registros ordenados por fecha de registro descendente
    //En caso de querer aumentar o disminuir la cantidad de registros, cambiar el valor en limit()
    #[Computed()]
    public function registros(){
        return Registro::orderBy('fecha_registro','desc')->limit(3)->get();
    }


    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
