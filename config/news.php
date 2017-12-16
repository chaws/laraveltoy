<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuração para extrair noticias sobre imoveis 
    |--------------------------------------------------------------------------
    | 
    |
    */
    'provider' => env('NEWS_PROVIDER', 'none'),
    'jsonfmt'  => env('NEWS_JSON_FMT', ''),
    'qty'      => env('NEWS_QTY', ''),
    'regex'    => ['link'     => env('NEWS_LINK_RGX', ''),
                   'title'    => env('NEWS_TITLE_RGX', ''),
                   'content'  => env('NEWS_CONTENT_RGX', ''),
                   'contentp' => env('NEWS_CONTENT_PARAGRAPH_RGX', ''),
                   'img'      => env('NEWS_IMG_RGX', ''),
                  ],
];
