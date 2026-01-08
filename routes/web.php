<?php

use App\Http\Controllers\{
    ProfileController,
    ProductController,
    AreaController,
    RegistroController,
    
    SalidaController,
    pdfController
};
use App\Livewire\Tabla\{
    Entradas,
    Salidas,
};
use App\Livewire\{
    Counter,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/counter', Counter::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pdfs', function () {
    return view('pdfs.report');
})->name('pdfs.report');

Route::get('/generate-report/{fechaInicio}/{fechaFin}/', [pdfController::class, 'generateReport'])->name('generate.pdf');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/consultar-tablas')->group(function () {
    Route::get('/', function () {
        return view('table.index');

    })->name('tabla.index');

    Route::get('/productos', function(){
        return view('table.index');
    })->name('tabla.productos');

    Route::get('/areas', function(){
        return view('table.index');
    })->name('tabla.areas');

    Route::get('/entradas', function () {
        return view('table.index');
    })->name('tabla.entradas');

    Route::get('/salidas', function(){
        return view('table.index');
    })->name('tabla.salidas');
    
});


Route::get('/reportes', function () {
    return view('reportes.index');
})->name('reportes');

Route::get('/nuevo-producto', function () {
    return view('productos.index');
})->name('nuevo_producto');

Route::get('/entradas', function () {
    return view('entradas.index');
})->name('entradas');

Route::get('/salidas', function () {
    return view('salidas.index');
})->name('salidas');

require __DIR__.'/auth.php';
