<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    use ControllerTrait;

    public function index(Request $request, $id = null)
    {
        $this->folderPath = 'Admin';
        $this->className  = $id;

        $class = $this->getControllerClass();
        return call_user_func_array([new $class(), 'index'], [$request]);
    }

    public function subIndex(Request $request, $id = null, $subid = null)
    {
        $this->folderPath = 'Admin/' . ucfirst($id);
        $this->className  = $subid;

        $class = $this->getControllerClass();
        return call_user_func_array([new $class(), 'index'], [$request]);
    }
}
