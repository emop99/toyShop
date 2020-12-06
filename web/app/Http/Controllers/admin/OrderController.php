<?php


namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\order\OrderManagement;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;

class OrderController
{
    use RequestControl, ViewControl, AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        $this->setAdminTopInfo($this->request);

        return view('admin.order.order', [
            'adminTopInfo' => $this->adminTopInfo,
            'tableList'    => (new OrderManagement())->getOrderList($this->request->all())
        ]);
    }
}
