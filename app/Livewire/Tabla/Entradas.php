<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\{
    Url,
    Computed
};
use App\Models\Registro;
use Livewire\WithPagination;    

class Entradas extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $areaFilter = '';
    
    #[Url(history:true)]
    public $sortBy = 'id_registro';
    
    #[Url(history:true)]
    public $sortDir = 'ASC';
    
    #[Url(history:true)]
    public $perPage = 10;

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
    #[Computed()]
    public function registros(){
        return Registro::search($this->search)
            ->where('tipo_registro', true)
            ->when($this->areaFilter !=='', function ($query) {
                $query->whereHas('producto.clave', function ($query) {
                    $query->where('id_area', $this->areaFilter);
                });
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.tabla.entradas',[]);
    }
}




