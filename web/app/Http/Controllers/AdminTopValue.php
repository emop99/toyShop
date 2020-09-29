<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

trait AdminTopValue
{
    private $adminTopInfo = [];

    public function setAdminTopInfo(Request $request)
    {
        $this->adminTopInfo['adminName'] = $request->session()->get('adminInfo')['Name'];
    }
}
