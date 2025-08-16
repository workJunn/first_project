<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrentWeather;

Route::get('/', [CurrentWeather::class, 'index']);

