<?php

namespace App\Livewire\Formulario;

use Livewire\Component;
use App\Models\{
    Producto,
    Area,
    Clave
};
use Livewire\Attributes\Validate;

class ProductoForm extends Component
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
    public $id_area = null;
    
    public function save()
    {
        $this->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion_producto' => 'required|string|max:500',
            'unidad_producto' => 'required|string|max:60',            
        ]);
        $producto = Producto::create(
            $this->only(['nombre_producto', 'descripcion_producto', 'unidad_producto'])
        );
        
        
        $id_producto = $producto->id_producto;
        $ultima_clave = Clave::where('id_area', $this->id_area)->orderBy('id_clave', 'desc')->first();
        $contador_clave = ($ultima_clave?->contador_clave ?? 0) + 1;
        
        $nombre_area = Area::find($this->id_area)->nombre_area;
        $valor_clave = 'CTV-'.$nombre_area.'-'.str_pad($contador_clave, 3, '0', STR_PAD_LEFT);

        Clave::create([
            'id_area' => $this->id_area,
            'id_producto' => $id_producto,
            'contador_clave' => $contador_clave,
            'valor_clave' => $valor_clave,
        ]);
    
        session()->flash('status', 'Producto creado exitosamente.');
        
        $this->reset(['nombre_producto', 'descripcion_producto', 'unidad_producto', 'id_area']);       
    }

    #[Computed(cached: true)]
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