<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CurrentWeather;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CurrentWeather::class, 'current_weather']);

