<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entrada;
use Livewire\WithPagination;    


class EntradasTabla extends Component
{
    use WithPagination;

    #[URL(history:true)]
    public $search = '';
    #[URL(history:true)]
    public $areaFilter = '';
    
    
    #[URL(history:true)]
    public $sortBy = 'id_entrada';
    
    #[URL(history:true)]
    public $sortDir = 'ASC';
    
    #[URL(history:true)]
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

    public function render()
    {
        return view('livewire.entradas-tabla',
        [
            'entradas' =>Entrada::
            search($this->search)-> 
            when($this->areaFilter!=='', function ($query) {
                $query->whereHas('registro.producto.clave', function ($query) {
                    $query->where('id_area', $this->areaFilter);
                });
            })->
            orderBy($this->sortBy, $this->sortDir)->
            paginate($this->perPage),
        ]
        );
    }
}
