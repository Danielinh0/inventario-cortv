<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DialogDashboard extends Component
{   
    public $tipo;
    public $producto;
    public $cantidad;
    public $unidad;

    public function mount($tipo)
    {
        $this->tipo = $tipo;
        
        // Lógica para obtener el producto según el tipo
        if ($tipo === 'demanda') {
            // Consulta para producto más demandado
            $this->producto = 'Hojas Blancas';
            $this->cantidad = 2;
            $this->unidad = 'paquetes';
        } else {
            // Consulta para producto menos demandado
            $this->producto = 'Grapas';
            $this->cantidad = 15;
            $this->unidad = 'cajas';
        }
    }


    public function render()
    {
        return view('livewire.dashboard.dialog-dashboard');
    }
}
