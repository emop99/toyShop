<?php


namespace App\Http\Controllers\admin;


use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;

class OrderViewController
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

        $order = Order::find($this->request->get('orderNum'))->toArray();

        return view('admin.order.orderView', [
            'adminTopInfo'        => $this->adminTopInfo,
            'order'               => $order,
            'orderColumnNameList' => Order::getColumnNameList(),
            'notUpdateColumn'     => Order::notUpdateColumn(),
        ]);
    }
}
