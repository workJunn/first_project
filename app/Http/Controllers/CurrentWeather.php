<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse; 

class CurrentWeather extends Controller 
{
    public function index(Request $request)  {

        $lat = 59.93;
        $lon = 10.72;

        $key = "Weather_{$lat}_{$lon}";

        if(cache::has($key)){
            $Weather = Cache::get($key);
            return response()->json($Weather);
        }

        $api = "https://api.met.no/weatherapi/locationforecast/2.0/compact?lat={$lat}&lon={$lon}";

        $response = Http::withHeaders([
            'User-Agent' => 'MyWeatherApp/1.0 (your_email@example.com)', 
            'Accept' => 'application/json', // сразу получаем ответ в json формате 
        ])->get($api);

        // dd($response);
        // print_r($response);
        // echo $response;

        if ($response->successful()) {
            $Weather = $response->json();// это переделывает json щтвет в удобный для чтения php - массив 

            Cache::put($key, $Weather, $seconds = 3600);

            return response()->json($Weather);
            
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();

        }
    }
}
