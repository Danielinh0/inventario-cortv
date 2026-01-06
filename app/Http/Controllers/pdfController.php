<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;

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
        return Pdf::view('pdfs.report', ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin])
                    ->withBrowsershot(function (Browsershot $browsershot) {
                        $browsershot->setOption('protocolTimeout', 120000); // 120 segundos
                    })
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
