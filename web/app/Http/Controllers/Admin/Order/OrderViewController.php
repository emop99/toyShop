<?php


namespace App\Http\Controllers\Admin\Order;


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
        $orderNum = $this->request->get('orderNum');
        if (!$orderNum) {
            $this->alertEchoHistoryBack('잘못된 요청입니다.');
        }

        $this->setAdminTopInfo($this->request);

        $order = Order::find($orderNum);

        if (!$order) {
            $this->alertEchoHistoryBack('주문 번호를 확인해주세요.');
        }

        return view('admin.order.orderView', [
            'adminTopInfo'        => $this->adminTopInfo,
            'order'               => $order->toArray(),
            'orderColumnNameList' => Order::getColumnNameList(),
            'notUpdateColumn'     => Order::notUpdateColumn(),
        ]);
    }
}
