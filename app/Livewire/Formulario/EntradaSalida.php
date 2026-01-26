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
    Log as LogModel
    };


class EntradaSalida extends Component
{
    //propiedades para el formulario, creacion de registros de entrada y salida 
    //ATRIBUTOS Con validacion
    #[Validate('required',message: 'Seleccione un producto')]
    #[Validate('exists:productos,nombre_producto', message: 'El producto seleccionado no es válido')]
    public $nombre_producto;
    
    #[Validate('required', message: 'Ingrese una cantidad válida')]
    public $cantidad_registro;

    public $tipo_registro = true; // 1 para entrada, 0 para salida
   
    
    //titulo de la tabla reutilizable
    public $titulo_f = 'Registrar entrada o salida de producto';

    //descripcion de los productos
    public $p_entrada_salida = '¿Que producto nuevo o existente entra al inventario?';
    public $cantidad_entrada_salida = '¿Cuantos productos entran al inventario?';    

    // Indica si el formulario está dentro de un modal
    public $enModal = false;    

    public function save(){
        $this->validate();
        
        $user = Auth::user();
        $producto = Producto::where('nombre_producto', $this->nombre_producto)->first();
        
        LogModel::create([
            'user_id' => $user->id,
            'tipo' => $this->tipo_registro ? 3 : 4,
            'action' => ($this->tipo_registro ? 'Entrada' : 'Salida').' de producto ID '.$producto->id_producto,
        ]);
        
        Registro::create([
            'user_id' => $user->id,
            'producto_id' => $producto->id_producto,
            'cantidad_registro' => $this->cantidad_registro,
            'tipo_registro' => $this->tipo_registro,
        ]);
        
        
        
        // Flash message de exito
        
        $this->reset(['nombre_producto', 'cantidad_registro']);
        
        return $this->redirect('/entradas');
        
    }

    #[Computed()]
    public function productos()
    {
        return Producto::where('activo', true)->orderBy('nombre_producto')->get();
    }


    public function render()
    {
        return view('livewire.formulario.entrada-salida');
    }
}
