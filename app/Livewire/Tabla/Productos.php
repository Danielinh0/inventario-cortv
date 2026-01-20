<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\{
    Compute,
    Lazy
};
use App\Models\{
    Producto,
    Registro
};
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

    public function placeholder(){
        return view('livewire.placeholders.tabla.common');
    }

    #[Compute()]
    public function cant_productos(){
        $Productos = Producto::all();

        return $Productos ->map(function($producto){
            //Totales de entradas y salidas
            $totalEntrada   =   Registro::where('producto_id', $producto->id_producto)->where('tipo_registro',1)->sum('cantidad_registro');
            $totalSalida    =   Registro::where('producto_id', $producto->id_producto)->where('tipo_registro',0)->sum('cantidad_registro');
            
            //Existencias finales e iniciales en el periodo
            return $totalEntrada - $totalSalida;
        });

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
