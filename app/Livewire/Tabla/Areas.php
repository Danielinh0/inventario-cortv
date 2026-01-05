<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\Area;
use Livewire\WithPagination;    

class Areas extends Component
{
use WithPagination;

    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $areaFilter = '';
    
    
    #[Url(history:true)]
    public $sortBy = 'id_area';
    
    #[Url(history:true)]
    public $sortDir = 'ASC';
    
    #[Url(history:true)]
    public $perPage = 10;

    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function eliminar(Producto $producto)
    {
        $producto->delete();

    }
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

    public function render()
    {
        return view('livewire.tabla.areas',
        [
            'areas' => Area::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
        ]
        );
    }
}


