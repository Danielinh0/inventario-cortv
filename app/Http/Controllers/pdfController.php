<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use App\Models\{Producto, Registro};
use Illuminate\Support\Facades\Cache;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function generateReport($fechaInicio, $fechaFin)
    {
        set_time_limit(240);
        
        // Calculate report data statically without using Livewire
        $productos = Producto::all();
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
        
        return Pdf::view('pdfs.report', [
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'reporteData' => $reporteData
        ])                    
            ->name('reporte(' . $fechaInicio .' a '.$fechaFin . ').pdf')
            ->download();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
