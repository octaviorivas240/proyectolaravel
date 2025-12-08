<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome'); // Muestra la vista welcome.blade.php
});

Route::get('/weather', [WeatherController::class, 'getWeather']);
