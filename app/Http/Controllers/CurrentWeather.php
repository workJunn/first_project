<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrentWeather 
{

    // public function CurrentWeather(Request $request) {

    //     #Валидация для безопастности данных
    //     // $request->validate([
    //     //     'lat' => 'required|numeric',
    //     //     'lon' => 'required|numeric',
    //     // ]);

    //     $lat = [];
    //     $lon = [];

    //     $cacheKey = "weather_{$lat}_{$lon}_90";

    //     $weatherData = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($lat, $lon, $altitude) 

    //     $response = Http::get('https://api.met.no/weatherapi/locationforecast/2.0/classic?lat{$}&lon=10.72&altitude=90');
    //     $statusCode = $response->status();
    //     $body = $response->body();

    // }

    public function current_weather (Request $request){

        $lat = [];
        $lon = [];

        $response = Http::get('https://api.met.no/weatherapi/locationforecast/2.0/classic?lat=10&lon=10.72&altitude=90');
    
        if ($response->successful()) {
            $products = $response->json();
            // Process the products
        } else {
            // $statusCode = $response->status();
            // $errorMessage = $response->body();
        }

    }

    // 1. Сделать запрос в api 
    // 2. сделать провеку на наличие данных 
    // 3. Ответ в формате json (P.S. хз как)
    // 4. ответ в кэш (P.S. хз как)
}
