<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\{
    Url,
    Computed
};
use App\Models\{
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

    #[Computed()]
    public function logs()
    {
        return LogModel::search($this->search)
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
