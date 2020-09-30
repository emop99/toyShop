<?php


namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\AdminLoginLog;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;

class LoginlogController
{
    use RequestControl;
    use ViewControl;
    use AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        $this->setAdminTopInfo($this->request);
        $loginList = (new AdminLoginLog)->getAdminLoginList($this->request->session()->get('adminInfo')['No']);

        return view('admin.loginlog', [
            'adminTopInfo' => $this->adminTopInfo,
            'loginList'    => $loginList
        ]);
    }
}
