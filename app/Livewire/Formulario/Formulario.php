<?php

namespace App\Livewire\Formulario;

use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\Validate;

class Formulario extends Component
{

    //adaptabilidad del formulario
    public $titulo_f = 'Registrar un nuevo producto';

    //propiedades para el formulario
    #[Validate('required', message: 'Por favor ingrese un nombre para el producto')]
    #[Validate('max:255', message: 'El nombre del producto no puede exceder los 255 caracteres')]
    public $nombre_producto = '';
    
    #[Validate('required', message:'De una descripción del producto')]
    #[Validate('max:500', message: 'La descripción del producto no puede exceder los 500 caracteres')]

    public $descripcion_producto = '';
    
    #[Validate('required', message:'Ingrese la unidad del producto')]
    #[Validate('max:60', message: 'La unidad del producto no puede exceder los 60 caracteres')]
    public $unidad_producto = '';
    
    #[Validate('required', message:'Seleccione un área para el producto')]
    #[Validate]
    public $area_producto = [];
    
    public function save()
    {
        $this->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion_producto' => 'required|string|max:500',
            'unidad_producto' => 'required|string|max:60',            
        ]);

        Producto::create(
            $this->only(['nombre_producto', 'descripcion_producto', 'unidad_producto', 'area_producto'])
        );
 
        session()->flash('status', 'Producto creado exitosamente.');
        //$this->reset(['nombre_producto', 'descripcion_producto', 'unidad_producto', 'area_producto']);       
    }

    public function render()
    {
        return view('livewire.formulario.formulario');
    }
}
