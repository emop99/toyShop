<?php


namespace App\Http\Controllers\admin;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Model\order\OrderSearch;
use App\Exports\OrderExcelExports;
use App\Model\order\OrderManagement;
use Maatwebsite\Excel\Facades\Excel;
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

        $orderSearch                  = new OrderSearch();
        $orderSearch->searchState     = $this->request->get('searchState');
        $orderSearch->searchDateS     = $this->request->get('searchDateS');
        $orderSearch->searchDateE     = $this->request->get('searchDateE');
        $orderSearch->searchKey       = $this->request->get('searchKey');
        $orderSearch->searchText      = $this->request->get('searchText');
        $orderSearch->searchPayMethod = $this->request->get('searchPayMethod');
        $orderSearch->searchOrderNo   = $this->request->get('searchOrderNo');
        $orderSearch->maxPageCnt      = $this->request->get('maxPageCnt');

        $tableList = $orderSearch->getOrderList();

        return view('admin.order.order', [
            'adminTopInfo'   => $this->adminTopInfo,
            'tableList'      => $tableList,
            'orderSearch'    => $orderSearch,
            'orderStateList' => Order::orderStateList(),
            'payMethodList'  => Order::payMethodList()
        ]);
    }

    /**
     * 주문 엑셀 다운로드
     */
    public function excelDown()
    {
        $orderSearch                  = new OrderSearch();
        $orderSearch->searchState     = $this->request->get('searchState');
        $orderSearch->searchDateS     = $this->request->get('searchDateS');
        $orderSearch->searchDateE     = $this->request->get('searchDateE');
        $orderSearch->searchKey       = $this->request->get('searchKey');
        $orderSearch->searchText      = $this->request->get('searchText');
        $orderSearch->searchPayMethod = $this->request->get('searchPayMethod');
        $orderSearch->searchOrderNo   = $this->request->get('searchOrderNo');
        $orderSearch->excelDown       = 1;

        return Excel::download(new OrderExcelExports($orderSearch->getOrderList()), 'order_' . date('Y-m-d') . '.xlsx');
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

        OrderManagement::stateChange($requestData['changeState'], [$requestData['orderNum']]);

        $returnData['msg'] = '변경되었습니다.';
        $this->jsonEchoExit($returnData);
    }

    /**
     * 선택 주문 상태 변경
     * 필수값
     * orderNumList
     * changeState
     */
    public function multiOrderStateChange()
    {
        $returnData = [
            'state' => 1,
            'msg'   => ''
        ];

        $requestData = $this->request->all();

        if (!isset($requestData['orderNumList']) || !isset($requestData['changeState'])) {
            $returnData['msg'] = '잘못된 요청입니다.';
            $this->jsonEchoExit($returnData);
        }

        OrderManagement::stateChange($requestData['changeState'], $requestData['orderNumList']);

        $returnData['msg'] = '변경되었습니다.';
        $this->jsonEchoExit($returnData);
    }
}
