<?php

namespace App\Livewire\Salidas;

use Livewire\Component;
use App\Models\Registro;
use Livewire\WithPagination;   
use App\Http\Controllers\pdfController; 
use Livewire\Attributes\{
    Url,
    Computed,
    On
};

class Tabla extends Component
{

    use WithPagination;    
    
    public $showModal = false;
    public $search = '';
    public $sortBy = 'id_registro'; 
    public $sortDir = 'ASC';
    public $formKey = 0; 

    public $salidas = [];

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

    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }
    //Guardar datos de salida en la base de datos
    public function guardarSalidas()
    {   
        //Contar la cantidad de registros a pasar al PDF
        $cantidad_registro = count($this->salidas);


        //Comprobar que haya salidas para guardar
        if($cantidad_registro > 0){ 
            foreach ($this->salidas as $salida) {
                Registro::create([
                    'persona_id' => $salida['persona_id'],
                    'producto_id' => $salida['producto_id'],
                    'cantidad_registro' => $salida['cantidad_registro'],
                    'tipo_registro' => false,
                ]);
            }

            // Limpiar el array de salidas después de guardar
            $this->salidas = [];
            
            // Cerrar el modal
            $this->cerrarModal();
            
            // Flash message de exito
            session()->flash('status', 'Salidas guardadas exitosamente.');
            // Redirigir a la ruta que genera el PDF
            return redirect()->route('generate.formato.salida',[
                'cantidad_registro' => $cantidad_registro,
            ]);
        }
        else{
            // Flash message de error si no hay salidas para guardar
            session()->flash('status', 'No hay salidas para guardar.');
        }
  }

    public function resetearFormulario()
    {
        $this->formKey++; // Incrementar para forzar recreación del componente

        // Limpiar el array de salidas después de guardar
        $this->salidas = [];

        // Cerrar el modal
        $this->cerrarModal();

        // Flash message de exito
        session()->flash('status', 'Salidas guardadas exitosamente.');
    }

    protected $listeners = ['salidaGuardada' => 'cerrarModal'];

    //Cuando ocurra el evento "salida-agregada", se ejecuta este metodo
    #[On('salida-agregada')]
    public function agregarSalida($persona_id, $producto_id, $cantidad_registro, $tipo_unidad, $producto_nombre)
    {
        // Agregar los datos al array de salidas para procesarlos después
        $this->salidas[] = [
            'persona_id' => $persona_id,
            'producto_id' => $producto_id,
            'cantidad_registro' => $cantidad_registro,
            'tipo_unidad' => $tipo_unidad,
            'producto_nombre' => $producto_nombre,
        ];
    }


    
    public function render()
    {
        return view('livewire.salidas.tabla');
    }
}
