<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuração para interar com a API de previsão do tempo 
    |--------------------------------------------------------------------------
    | Abaixo estão as configurações necessárias para conexão com a API do 
    | OpenWeatherMap, um serviço gratuito que oferece API de consulta de 
    | previsão do tempo.
    |
    */
    'host'    => env('WEATHER_API_HOST', 'http://localhost'),
    'version' => env('WEATHER_API_VERSION', ''),
    'city'    => env('WEATHER_API_CITY', 'Sao Paulo,BR'),
    'key'     => env('WEATHER_API_KEY', ''),
];
