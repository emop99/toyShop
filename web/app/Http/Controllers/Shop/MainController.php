<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class MainController
{
    public function index(Request $request)
    {
        return view('shop.main');
    }
}
