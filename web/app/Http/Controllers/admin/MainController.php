<?php


namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\RequestControl;

class MainController
{
    use RequestControl;
    use ViewControl;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        return view('admin.main', [
            'adminName' => $this->request->session()->get('adminInfo')['Name']
        ]);
    }
}
