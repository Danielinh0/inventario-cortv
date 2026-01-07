<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Registro;
use Livewire\Attributes\Computed;


class CardTable extends Component
{   
    public $fechaSolicitud;
    public $area = 'COM';
    public $solicitador = 'Daniel Garcia Salvador';
    public $producto = 'Toner HP LaserJet Pro M15w';
    public $cantidad = 30;

    public function __construct()
    {
        $this->fechaSolicitud = date('2024-06-15');
    }

    //Aqui se definen los iconos para cada area
    public function icon(){
        switch ($this->area) {
            case 'PAP':
                return 'M26 7.25V23.5H3.5V7.25M12.25 12.25H17.25M1 1H28.5V7.25H1V1Z';
            case 'LIMP':
                return 'M14,17V3c0-1.1,0.9-2,2-2h0c1.1,0,2,0.9,2,2v14 M26,31H6l2.7-12.4c0.2-0.9,1-1.6,2-1.6h10.8c0.9,0,1.8,0.7,2,1.6L26,31z M9 21 L23 21 M11 27 L11 30 M21 29 L21 30';
            case 'ALM':
                return 'm20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z';
            case 'COM':
                return 'M11.25 1.25V5M18.75 1.25V5M11.25 25V28.75M18.75 25V28.75M25 11.25H28.75M25 17.5H28.75M1.25 11.25H5M1.25 17.5H5M7.5 5H22.5C23.8807 5 25 6.11929 25 7.5V22.5C25 23.8807 23.8807 25 22.5 25H7.5C6.11929 25 5 23.8807 5 22.5V7.5C5 6.11929 6.11929 5 7.5 5ZM11.25 11.25H18.75V18.75H11.25V11.25Z';
            case 'VEC':
                return 'M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12';
            case 'HRR':
                return 'M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z';
            case 'HIG':
                return 'M3,25l2.6-4.2c1.5-2.3,4-3.8,6.8-3.8H19v0c0,2.2-1.8,4-4,4h-2 M15,21h8l1.2-1.6c1.1-1.5,2.9-2.4,4.8-2.4h0l-2.7,4.8c-1.4,2.6-4.2,4.2-7.1,4.2h0c-4.7,0-9.3,1.4-13.2,4l0,0 M20,9c0,2.2-1.8,4-4,4s-4-1.8-4-4c0-3,4-7,4-7S20,6,20,9z';
            case 'UNI':
                return 'M3 7L6 4H9C9 4.39397 9.0776 4.78407 9.22836 5.14805C9.37913 5.51203 9.6001 5.84274 9.87868 6.12132C10.1573 6.3999 10.488 6.62087 10.8519 6.77164C11.2159 6.9224 11.606 7 12 7C12.394 7 12.7841 6.9224 13.1481 6.77164C13.512 6.62087 13.8427 6.3999 14.1213 6.12132C14.3999 5.84274 14.6209 5.51203 14.7716 5.14805C14.9224 4.78407 15 4.39397 15 4H18L21 7L20.5785 11.2152C20.542 11.5801 20.1382 11.7829 19.8237 11.5942L18 10.5V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V10.5L4.17629 11.5942C3.86184 11.7829 3.45801 11.5801 3.42152 11.2152L3 7Z';
        }
    }
    //Convierte las claves de area en texto para mostrar en la tarjeta
    public function area_texto(){
        switch ($this->area) {
            case 'PAP':
                return 'Papelería';
            case 'LIMP':
                return 'Limpieza';
            case 'ALM':
                return 'Almacén';
            case 'COM':
                return 'Cómputo';
            case 'VEC':
                return 'Vehicular';
            case 'HRR':
                return 'Herramientas';
            case 'HIG':
                return 'Higiene';  
            case 'UNI':
                return 'Uniformes';
        }
    }

    //Fecha de solicitud en formato dd/mm/yyyy
    public function fecha_formateada(){
        return date('d/m/Y', strtotime($this->fechaSolicitud));
    }

    //Renderiza la vista del componente
    public function render()
    {
        return view('livewire.dashboard.card-table',[]);
    }
}
