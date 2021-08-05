<?php


namespace App\Http\Controllers\Admin\Goods;


use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;
use App\Http\Controllers\ViewControl;
use App\Model\Goods;
use App\Util\EditorBaseToFile;
use Illuminate\Http\Request;

class GoodInfoController
{
    use RequestControl, ViewControl, AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        $no = $this->request->input('no');

        if (!$no) {
            $this->alertEchoHistoryBack('잘못된 요청입니다.');
        }

        /** @var Goods $goods */
        $goods = Goods::find($no);

        if (!$goods) {
            $this->alertEchoHistoryBack('상품 정보가 없습니다.');
        }

        return view('admin.goods.goodsInfo', [
            'goods'               => $goods->toArray(),
            'goodsColumnNameList' => Goods::getColumnNameList(),
            'notUpdateColumn'     => Goods::notUpdateColumn(),
        ]);
    }

    /**
     * 상품 수정 저장 처리
     */
    public function modifySave()
    {
        $postDateList = $this->request->post();
        $goodNo = $this->request->post('goodNo');

        unset($postDateList['mode']);
        unset($postDateList['_token']);
        unset($postDateList['goodNo']);

        $postDateList['updated_at'] = date('Y-m-d H:i:s');
        $postDateList['GoodContent'] = EditorBaseToFile::base64DataToImageSave($postDateList['GoodContent']);

        Goods::infoUpdate($goodNo, $postDateList);

        return response('<script>alert("저장되었습니다."); parent.ToyShop.Top.loadingBarShow(0); </script>');
    }
}
