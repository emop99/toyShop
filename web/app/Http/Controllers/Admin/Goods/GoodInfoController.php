<?php


namespace App\Http\Controllers\Admin\Goods;


use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;
use App\Http\Controllers\ViewControl;
use Illuminate\Http\Request;

class GoodInfoController
{
    use RequestControl, ViewControl, AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {

    }
}
