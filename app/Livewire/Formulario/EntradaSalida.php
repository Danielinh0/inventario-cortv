<?php

namespace App\Livewire\Formulario;

use Livewire\Component;
use App\Models\Entrada;
use Livewire\Attributes\Validate;


class EntradaSalida extends Component
{
    //propiedades para el formulario, creacion de registros de entrada y salida 
    //ATRIBUTOS Con validacion
    public $cantidad_registro;
    public $tipo_registro; // 1 para entrada, 0 para salida
    public $nombre_producto;
   
    
    //titulo de la tabla reutilizable
    public $titulo_f = 'Registrar entrada o salida de producto';

    //descripcion de los productos
    public $p_entrada_salida = '¿Que producto nuevo o existente entra al inventario?';
    public $cantidad_entrada_salida = '¿Cuantos productos entran al inventario?';    

    // Indica si el formulario está dentro de un modal
    public $enModal = false;    

    public function save()
    {
        
    }

    public function render()
    {
        return view('livewire.formulario.entrada-salida');
    }
}
