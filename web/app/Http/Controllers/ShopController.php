<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    use ControllerTrait;

    public function index(Request $request, $id = null)
    {
        $this->folderPath = 'Shop';
        $this->className = $id ? $id : 'Main';

        $class = $this->getControllerClass();
        return call_user_func_array([new $class(), 'index'], [$request]);
    }

    public function subIndex(Request $request, $id = null, $subid = null)
    {
        $this->folderPath = 'Shop/' . ucfirst($id);
        $this->className = $subid;

        $class = $this->getControllerClass();
        return call_user_func_array([new $class(), 'index'], [$request]);
    }

    public function subSubIndex(Request $request, $id = null, $subid = null, $subSubId = null)
    {
        $this->folderPath = 'Shop/' . $id . '/' . ucfirst($subid);
        $this->className = $subid;

        $class = $this->getControllerClass();
        return call_user_func_array([new $class(), 'index'], [$request]);
    }
}
