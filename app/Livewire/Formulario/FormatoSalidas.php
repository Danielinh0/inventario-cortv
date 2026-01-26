<?php

namespace App\Livewire\Formulario;
use livewire\Attributes\Validate;
use Livewire\Component;

class FormatoSalidas extends Component
{   
    #[Validate('required', message: 'Seleccione un formato')]
    public $formato = 'Solicitud y Salida de Almacen';

    #[Validate('required', message: 'Ingrese el área correspondiente')]
    #[Validate('max:100', message: 'El área no puede exceder los 100 caracteres')]
    public $area = '';
    
    #[Validate('required', message: 'Ingrese un nombre')]
    #[Validate('max:255', message: 'El nombre no puede exceder los 255 caracteres')]
    public $nombre='';
    
    #[Validate('required', message: 'Seleccione una categoría')]
    #[Validate('max:150', message: 'La categoría no puede exceder los 150 caracteres')]
    public $categoria = 'ART. DE LIMPIEZA';
    
    #[Validate('required', message: 'Ingrese quien autoriza la salida')]
    #[Validate('max:255', message: 'El nombre del autoriza no puede exceder los 255 caracteres')]
    public $autoriza = '';
    
    #[Validate('required', message: 'Ingrese a quien se entrega la salida')]
    #[Validate('max:255', message: 'El nombre de quien entrega no puede exceder los 255 caracteres')]
    public $entrega = '';

    #[Validate('required', message: 'Ingrese quien solicita y recibe la salida')]
    #[Validate('max:200', message: 'El nombre de quien solicita y recibe no puede exceder los 200 caracteres')]
    public $solicito = '';
    
    public function mount()
    {
        $datos_registro = session()->get('datos_registro', []);

        $this->area = $datos_registro['area'] ?? '';
        $this->nombre = $datos_registro['nombre'] ?? '';
        $this->categoria = $datos_registro['categoria'] ?? 'ART. DE LIMPIEZA';
        $this->autoriza = $datos_registro['autoriza'] ?? '';
        $this->entrega = $datos_registro['entrega'] ?? '';
        $this->solicito = $datos_registro['solicito'] ?? '';
    }
    public function save()
    {
        $this->validate([
            'area' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:150',
            'autoriza' => 'required|string|max:255',
            'entrega' => 'required|string|max:255',
            'solicito' => 'required|string|max:200',
        ], [
            'area.required' => 'Ingrese el área correspondiente',
            'area.max' => 'El área no puede exceder los 100 caracteres',
            'nombre.required' => 'Ingrese un nombre',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres',
            'categoria.required' => 'Seleccione una categoría',
            'categoria.max' => 'La categoría no puede exceder los 150 caracteres',
            'autoriza.required' => 'Ingrese quien autoriza la salida',
            'autoriza.max' => 'El nombre del autoriza no puede exceder los 255 caracteres',
            'entrega.required' => 'Ingrese a quien se entrega la salida',
            'entrega.max' => 'El nombre de quien entrega no puede exceder los 255 caracteres',
            'solicito.required' => 'Ingrese quien solicita y recibe la salida',
            'solicito.max' => 'El nombre de quien solicita y recibe no puede exceder los 200 caracteres',
        ]);

        session()->put('datos_registro', [
            'area' => $this->area,
            'nombre' => $this->nombre,
            'categoria' => $this->categoria,
            'autoriza' => $this->autoriza,
            'entrega' => $this->entrega,
            'solicito' => $this->solicito,
        ]);
        $this->dispatch('formato-salida-guardado', 
            area: $this->area,
            nombre: $this->nombre,
            categoria: $this->categoria,
            autoriza: $this->autoriza,
            entrega: $this->entrega,
            solicito: $this->solicito
        );
        
        session()->flash('status', 'Información del formato registrada correctamente.');

        // Reiniciar los campos del formulario
        $this->reset(['area', 'nombre', 'categoria', 'autoriza', 'entrega', 'solicito']);
    }

    public function render()
    {
        return view('livewire.formulario.formato-salidas');
    }
}
