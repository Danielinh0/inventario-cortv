<?php

namespace App\Livewire\Formulario;
Use App\livewire\Forms\PostProducto;
use Livewire\Component;

use App\Models\{
    Area,
    Producto,
};
use Livewire\Attributes\Validate;
use Livewire\Attributes\Computed;

class ProductoForm extends Component
{

    //adaptabilidad del formulario
    public $titulo_f = 'Editar un producto';

    public PostProducto $postProducto;
    //Inicializar el formulario con los datos del producto a editar
    public function mount(Producto $producto){
        $this->postProducto->setProducto($producto);
    }

    //funcion para guardar el producto editado en la base de datos
    public function save()
    {
       $this->postProducto->update();
        session()->flash('status', 'Producto editado exitosamente.');
        
        return $this->redirect('/productos');      
    }

    #[Computed(cache: true)]
    public function areas()
    {
        return Area::all();
    }

    public function render()
    {
        return view('livewire.formulario.productoForm');
    }
}


/*
use App\Models\{
    Producto,
    Area,
    Clave
};
*/