<?php


namespace App\Http\Controllers\admin;

use App\Model\Order;
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

    /**
     * 단일 주문건 상태 변경
     * 필수값
     * orderNum 변경할 주문번호
     * changeState 변경할 값
     */
    public function singleOrderStateChange()
    {
        $returnData = [
            'state' => 1,
            'msg'   => ''
        ];

        $requestData = $this->request->all();

        if (!isset($requestData['orderNum']) || !isset($requestData['changeState'])) {
            $returnData['msg'] = '잘못된 요청입니다.';
            $this->jsonEchoExit($returnData);
        }

        /** @var Order $order */
        $order             = Order::find($requestData['orderNum']);
        $order->OrderState = $requestData['changeState'];
        $order->save();

        $returnData['msg'] = '변경되었습니다.';
        $this->jsonEchoExit($returnData);
    }
}
