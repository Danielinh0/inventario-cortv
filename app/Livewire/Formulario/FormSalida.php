<?php

namespace App\Livewire\Formulario;
use Livewire\Attributes\{
    Computed,
    Validate,
};
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Registro,
    Producto,
    };


class FormSalida extends Component
{

    //propiedades para el formulario, creacion de registros de entrada y salida 
    //ATRIBUTOS Con validacion
    #[Validate('required',message: 'Seleccione un producto')]
    #[Validate('exists:productos,nombre_producto', message: 'El producto seleccionado no es válido')]
    public $nombre_producto;
    

    #[Validate('required', message: 'Ingrese una cantidad válida')]
    public $cantidad_registro;      
    
    // Indica si el formulario está dentro de un modal
    public $enModal = false;    

    public function save(){
        $this->validate();
        
        $user = Auth::user();
        $producto = Producto::where('nombre_producto', $this->nombre_producto)->first();
        
        // Emitir evento con los datos validados para que Tabla los procese
        $this->dispatch('salida-agregada', 
            persona_id: $user->id,
            producto_id: $producto->id_producto,
            cantidad_registro: $this->cantidad_registro,
            tipo_unidad: $producto->unidad_producto,
            producto_nombre: $this->nombre_producto
        );

        // Flash message de exito
        session()->flash('status', 'Registro de salida agregado.');
        $this->reset(['nombre_producto', 'cantidad_registro']);    
         if($this->enModal) {
              $this->dispatch('salidaGuardada');
          }    
    }

    #[Computed()]
    public function productos()
    {
        return Producto::all();
    }


    public function render()
    {
        return view('livewire.formulario.form-salida');
    }
}
