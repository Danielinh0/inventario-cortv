<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;    
class ProductosTabla extends Component
{
    use WithPagination;

    #[URL(history:true)]
    public $search = '';
    #[URL(history:true)]
    public $areaFilter = '';
    
    
    #[URL(history:true)]
    public $sortBy = 'id_producto';
    
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

        if($this->sortBy === $sortBy){
            $this->sortDir = $this->sortDir ==='ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
        return view('livewire.productos-tabla',
        [
            'productos' => Producto::search($this->search)
            ->when($this->areaFilter!=='', function ($query) {
                $query->whereHas('clave', function ($query) {
                    $query->where('id_area', $this->areaFilter);
                });
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
        ]
        );
    }
}



