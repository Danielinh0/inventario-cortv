<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\{
    Producto,
    Area,
    Clave
};

class PostProducto extends Form
{
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
    public $id_area = 1; // Área por defecto
    
    //funcion para inicializar el formulario
    public function setProducto(Producto $producto){
        $this->nombre_producto = $producto->nombre_producto;
        $this->descripcion_producto = $producto->descripcion_producto;
        $this->unidad_producto = $producto->unidad_producto;
        $this->id_area = $producto->claves()->first()->id_area ?? 1;
    }

    //funcion para guardar el producto en la base de datos
    public function store(){
         $this->validate();

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
    
    }

    //funcion para editar los campos del formulario
    public function update(){
        $this->validate();

        // Verificar si el área ha cambiado
        $clave_actual = Clave::where('id_producto', $producto->id_producto)->first();
        if ($clave_actual->id_area != $this->id_area) {
            
            // Crear nueva clave con la nueva área
            $ultima_clave = Clave::where('id_area', $this->id_area)->orderBy('id_clave', 'desc')->first();
            $contador_clave = ($ultima_clave?->contador_clave ?? 0) + 1;
            
            $nombre_area = Area::find($this->id_area)->nombre_area;
            $valor_clave = 'CTV-'.$nombre_area.'-'.str_pad($contador_clave, 3, '0', STR_PAD_LEFT);

            Clave::update([
                'id_area' => $this->id_area,
                'id_producto' => $producto->id_producto,
                'contador_clave' => $contador_clave,
                'valor_clave' => $valor_clave,
            ]);
        }
        
        $producto = Producto::where('nombre_producto', $this->nombre_producto)->first();
        $producto->update(
            $this->only(['nombre_producto', 'descripcion_producto', 'unidad_producto'])
        );
        
    }
}
