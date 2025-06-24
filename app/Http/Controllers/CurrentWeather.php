<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CurrentWeather extends Controller 
{
    public function index(Request $request) {

        $lat = 55.7506;
        $lon = 37.6175;

        $key = "Weather_{$lat}_{$lon}";

        $api = "https://api.met.no/weatherapi/locationforecast/2.0/classic?lat={$lat}&lon={$lon}.72&altitude=90";
        $response = Http::get($api);
        // dd($response);
        // print_r($response);
        echo $response;

        if ($response->successful()) {
            $Weather = $response->json();
            
            if(cache::has($Weather)){
                Cache::put($key, $Weather, $seconds = 3600);
            }

            return $Weather;
            
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
        }
    }
    // 1. Сделать запрос в api есть 
    // 2. сделать провеку на наличие данных 
    // 3. Ответ в формате json (P.S. хз как)
    // 4. ответ в кэш (P.S. хз как)
}
