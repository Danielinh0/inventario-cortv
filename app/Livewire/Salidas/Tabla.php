<?php

namespace App\Livewire\Salidas;

use Livewire\Component;
use App\Models\Registro;
use Livewire\WithPagination;    
use Livewire\Attributes\{
    Url,
    Computed
};

class Tabla extends Component
{

    use WithPagination;    
    
    public $showModal = false;
    public $search = '';
    public $sortBy = 'id_registro'; 
    public $sortDir = 'ASC'; 

    public $cant_registros = 0;

    public function setSortBy($sortBy){
        if($sortBy === 'NoFiltro') {
            return;
        }
        if($this->sortBy === $sortBy){
            $this->sortDir = $this->sortDir ==='ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }

    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }
    #[Computed()]
    public function Salidas(){
        return Registro::where('tipo_registro', false)->orderBy('id_registro', 'DESC')->take($this->cant_registros)->get(); 
    }
   

    public function render()
    {
        return view('livewire.salidas.tabla');
    }
}
