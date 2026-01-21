<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\{
    Url,
    Computed
};
use App\Models\{
    Producto,
    Log as LogModel
};
use Livewire\WithPagination;

class Log extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $areaFilter = '';
    
    #[Url(history:true)]
    public $sortBy = 'id';
    
    #[Url(history:true)]
    public $sortDir = 'ASC';
    
    #[Url(history:true)]
    public $perPage = 10;


    
    public function setSortBy($sortBy)
    {
        if ($sortBy === 'NoFiltro') {
            return;
        }

        if ($this->sortBy === $sortBy) {
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }
    
    public function restaurar(Producto $producto)
    {
        $producto->activo = true;
        $producto->save();
        
        LogModel::create([
            'user_id' => auth()->id(),
            'tipo' => 5,
            'action' => "Restauró el producto: {$producto->nombre_producto} (ID: {$producto->id_producto})",
            'producto_id' => $producto->id_producto,
        ]);
    }

    #[Computed()]
    public function logs()
    {
        return LogModel::search($this->search)->
            when($this->areaFilter !== '', function ($query) {
                $query->where('tipo', $this->areaFilter);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        // return LogModel::query()->when($this->search !== '', function ($query) {
        //         $query->where(function ($subQuery) {
        //             $subQuery->where('id', 'like', "%{$this->search}%")
        //                 ->orWhere('action', 'like', "%{$this->search}%");
        //         });
        //     })
        //     ->orderBy($this->sortBy, $this->sortDir)
        //     ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.tabla.Log');
    }
}
