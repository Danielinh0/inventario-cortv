<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use App\Models\{
    Producto, 
    Registro,
    Area,
};
use Illuminate\Support\Facades\Cache;

class pdfController extends Controller
{

    //
    public function generateReport($fechaInicio, $fechaFin,$areaFilter){
        set_time_limit(240);
        // Calculate report data statically without using Livewire
        $productos = Producto::when($areaFilter !== ' ', function ($query) use ($areaFilter) {
                $query->whereHas('clave', function ($query) use ($areaFilter) {
                    $query->where('id_area', $areaFilter);
                });
            })->get();
        $reporteData = $productos->map(function($producto) use ($fechaInicio, $fechaFin) {
            $entrada = Registro::whereBetween('fecha_registro', [$fechaInicio, $fechaFin])
                            ->where('producto_id', $producto->id_producto)->where('tipo_registro', 1)->sum('cantidad_registro');
            $salida = Registro::whereBetween('fecha_registro', [$fechaInicio, $fechaFin])
                            ->where('producto_id', $producto->id_producto)->where('tipo_registro', 0)->sum('cantidad_registro');
            
            $totalEntrada = Registro::where('fecha_registro', '<', $fechaFin)
                            ->where('producto_id', $producto->id_producto)->where('tipo_registro', 1)->sum('cantidad_registro');
            $totalSalida = Registro::where('fecha_registro', '<', $fechaFin)
                            ->where('producto_id', $producto->id_producto)->where('tipo_registro', 0)->sum('cantidad_registro');
            
            $exFinal = $totalEntrada - $totalSalida;
            $exInicial = $exFinal - ($entrada - $salida);
            
            return [
                'datos_producto' => $producto,
                'exInicial' => $exInicial,
                'totalEntrada' => $entrada,
                'totalSalida' => $salida,
                'exFinal' => $exFinal,
            ];
        })->toArray();
        $area = 'Todos';
        if($areaFilter != ' '){
            $area = Area::find($areaFilter)->descripcion_area;
        }
        $clave = '';
        if($areaFilter != ' '){
            $clave = Area::find($areaFilter)->nombre_area;
        }
        Area::find($areaFilter);
        return Pdf::view('pdfs.report', [
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'reporteData' => $reporteData,
            'area' => $area,
        ])                    
            ->name('REPORTE_'. $clave .'(' . $fechaInicio .' a '.$fechaFin . ').pdf')
            ->download();
    }

    public function generateFormatoSalida($cantidad_registro)
    {
        set_time_limit(240);
        $datos_registro = session('datos_registro');
        $registros = Registro::with('producto')
            ->where('tipo_registro', 0)
            ->orderByDesc('id_registro')
            ->limit($cantidad_registro)
            ->get();
    
        return Pdf::view('pdfs.salidas', [
            'registros' => $registros,
            'datos'=>$datos_registro,
        ])
            ->name('FORMATO_DE_SALIDA.pdf')
            ->download();
    }

    
}
