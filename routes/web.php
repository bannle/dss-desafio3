<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PagoController;

//landing page
Route::get('/', [ProductoController::class, 'landing'])->name('tienda.inicio');

//carrito
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

//pagar
Route::get('/pagar', [PagoController::class, 'mostrarFormulario'])->name('pago');
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/reiniciar', function () {
    session()->forget('carrito');
    return redirect()->route('tienda.inicio');
})->name('carrito.reiniciar');



