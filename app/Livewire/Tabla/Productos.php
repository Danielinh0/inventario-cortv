<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Productos extends Component
{
    use WithPagination;

    #historial de URL
        #[Url(history: true)]
        public $search = '';

        #[Url(history: true)]
        public $areaFilter = '';

        #[Url(history: true)]
        public $sortBy = 'id_producto';

        #[Url(history: true)]
        public $sortDir = 'ASC';

        #[Url(history: true)]
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
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
        return view('livewire.tabla.productos', [
            'productos' => Producto::search($this->search)
                ->when($this->areaFilter !== '', function ($query) {
                    $query->whereHas('clave', function ($query) {
                        $query->where('id_area', $this->areaFilter);
                    });
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
