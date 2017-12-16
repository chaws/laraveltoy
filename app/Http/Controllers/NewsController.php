<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\NewsExtractorHelper;

class NewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function get($id) {
        $provider = config('news.provider');
        if($provider == 'none') {
            return 'no provider found';
        }

        $json = NewsExtractorHelper::getNewsJson($id);
        return $json;
    }
}
