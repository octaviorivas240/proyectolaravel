<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\ProductoController;

Route::get('/calcular-producto', [ProductoController::class, 'form']);
Route::post('/calcular-producto', [ProductoController::class, 'calcular']);
