<?php

use App\Http\Controllers\{
    ProfileController,
    ProductController,
    AreaController,
    RegistroController,
    EntradaController,
    SalidaController,
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
    return view('pdfs.index');
})->middleware(['auth', 'verified'])->name('pdfs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/consultar-tablas')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('tabla.index');
    Route::get('/areas', [AreaController::class, 'index'])->name('tabla.areas');
    Route::get('/productos', [ProductController::class, 'index'])->name('tabla.productos');
    Route::get('/existencias', [ProductController::class, 'index'])->name('tabla.existencias');
    Route::get('/entradas', [EntradaController::class, 'index'])->name('tabla.entradas');
    Route::get('/salidas', [SalidaController::class, 'index'])->name('tabla.salidas');
    
});


Route::get('/reportes', function () {
    return view('reportes.index');
})->name('reportes');

Route::get('/nuevo-producto', function () {
    return view('nuevo_producto');
})->name('nuevo_producto');

Route::get('/entradas', function () {
    return view('entradas');
})->name('entradas');

Route::get('/salidas', function () {
    return view('salidas');
})->name('salidas');

require __DIR__.'/auth.php';
