<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;
use App\Http\Controllers\ViewControl;
use App\Model\Goods;
use App\Model\goods\GoodsManagement;
use App\Model\goods\GoodsSearch;
use Illuminate\Http\Request;

class GoodsController
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

        /** @var GoodsSearch $goodsSearch */
        $goodsSearch = new GoodsSearch();
        $goodsSearch->searchDateE = $this->request->input('searchDateE');
        $goodsSearch->searchDateS = $this->request->input('searchDateS');
        $goodsSearch->searchState = $this->request->input('searchState');
        $goodsSearch->searchText = $this->request->input('searchText');
        $goodsSearch->searchKey = $this->request->input('searchKey');
        $goodsSearch->maxPageCnt = $this->request->input('maxPageCnt');

        $tableList = $goodsSearch->getGoodsList();

        return view('admin.goods.goodsList', [
            'tableList' => $tableList,
            'goodsSearch' => $goodsSearch,
            'goodsStateList' => Goods::getStateList(),
        ]);
    }

    /**
     * 선택 상품 상태 변경
     * 필수 값
     * - goodsNumList, changeState
     */
    public function multiGoodsStateChange()
    {
        $returnData = [
            'state' => 1,
            'msg'   => ''
        ];

        $requestData = $this->request->all();

        if (!isset($requestData['goodsNumList']) || !isset($requestData['changeState'])) {
            $returnData['msg'] = '잘못된 요청입니다.';
            $this->jsonEchoExit($returnData);
        }

        GoodsManagement::stateChange($requestData['changeState'], $requestData['goodsNumList']);

        $returnData['msg'] = '변경되었습니다.';
        $this->jsonEchoExit($returnData);
    }
}
