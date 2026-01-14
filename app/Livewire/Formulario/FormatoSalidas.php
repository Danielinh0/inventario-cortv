<?php

namespace App\Livewire\Formulario;
use livewire\Attributes\Validate;
use Livewire\Component;

class FormatoSalidas extends Component
{   

    #[Validate('required', message: 'Ingrese el área correspondiente')]
    #[Validate('max:100', message: 'El área no puede exceder los 100 caracteres')]
    public $area = '';
    
    #[Validate('required', message: 'Ingrese un nombre')]
    #[Validate('max:255', message: 'El nombre no puede exceder los 255 caracteres')]
    public $nombre='';
    
    #[Validate('required', message: 'Seleccione una categoría')]
    #[Validate('max:150', message: 'La categoría no puede exceder los 150 caracteres')]
    public $categoria = '';
    
    #[Validate('required', message: 'Ingrese quien autoriza la salida')]
    #[Validate('max:255', message: 'El nombre del autoriza no puede exceder los 255 caracteres')]
    public $autoriza = '';
    
    #[Validate('required', message: 'Ingrese a quien se entrega la salida')]
    #[Validate('max:255', message: 'El nombre de quien entrega no puede exceder los 255 caracteres')]
    public $entrega = '';

    public function save()
    {
        $this->validate([
            'area' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:150',
            'autoriza' => 'required|string|max:255',
            'entrega' => 'required|string|max:255',
        ]);

        // Aqui va lo logica w

        
        session()->flash('status', 'Formato de salida guardado correctamente.');

        // Reiniciar los campos del formulario
        $this->reset(['area', 'nombre', 'categoria', 'autoriza', 'entrega']);
    }

    public function render()
    {
        return view('livewire.formulario.formato-salidas');
    }
}
