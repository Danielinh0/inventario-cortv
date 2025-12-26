<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Area;
use Livewire\WithPagination;    

class AreaTabla extends Component
{
    use WithPagination;

    #[URL(history:true)]
    public $search = '';
    #[URL(history:true)]
    public $areaFilter = '';
    
    
    #[URL(history:true)]
    public $sortBy = 'id_area';
    
    #[URL(history:true)]
    public $sortDir = 'ASC';
    
    #[URL(history:true)]
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
        return view('livewire.area-tabla',
        [
            'areas' => Area::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
        ]
        );
    }
}
