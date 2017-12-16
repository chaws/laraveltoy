<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function temp() {
        $host  = config('weather.host');
        $ver   = config('weather.version');
        $key   = config('weather.key');
        $city  = config('weather.city');
        $query = $host .'/'. $ver .'/weather?q='. $city .'&APPID='. $key;

        $json = file_get_contents($query);
        $data = json_decode($json);

        return $this->kelvin2celsius($data->main->temp);
    }

    private function kelvin2celsius($kelvin) {
        // Numero magico para converter kelvin para celsius
        $magicNumber = 273.15;
        return floor($kelvin - $magicNumber);
    }
}
