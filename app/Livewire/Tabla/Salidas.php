<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\Salida;
use Livewire\WithPagination;    

class Salidas extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';
    #[Url(history:true)]
    public $areaFilter = '';
    
    
    #[Url(history:true)]
    public $sortBy = 'id_salida';
    
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

    public function render()
    {
        return view('livewire.tabla.salidas',
        [
            'salidas' =>Salida::
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
