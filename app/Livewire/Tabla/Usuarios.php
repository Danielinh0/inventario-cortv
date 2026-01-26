<?php

namespace App\Livewire\Tabla;

use Livewire\Attributes\Computed;
use Livewire\{
    Component,
    WithPagination};
use Livewire\Attributes\Url;
use App\Models\{
    User
};

class Usuarios extends Component
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

    #[Computed()]
    public function usuarios()
    {

        return User::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.tabla.usuarios');
    }
}
