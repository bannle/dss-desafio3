<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

//landing page
Route::get('/', [ProductoController::class, 'landing']);

//carrito
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
