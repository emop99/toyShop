<?php


namespace App\Search;


use App\Model\Order;

/**
 * 주문 검색
 * Class OrderSearch
 * @package App\Model\order
 *
 * @property string $searchKey 검색할 키값
 * @property string $searchText 검색할 text
 * @property int $searchState 검색할 주문 상태
 * @property string $searchDateS
 * @property string $searchDateE
 * @property int $maxPageCnt 최대 검색 개수 기본:25
 * @property int $searchPayMethod 결제수단 검색
 * @property string $searchOrderNo 검색할 주문 번호
 * @property int $excelDown 엑셀다운시 1
 */
class OrderSearch
{
    private string $searchKey       = '';
    private string $searchText      = '';
    private int    $searchState     = -1;
    private string $searchDateS     = '';
    private string $searchDateE     = '';
    private int    $maxPageCnt      = 25;
    private int    $searchPayMethod = -1;
    private string $searchOrderNo   = '';
    private int    $excelDown       = 0;

    public function __construct()
    {
        $this->searchDateS = date('Y-m-d 00:00:00', strtotime('-6 Month'));
        $this->searchDateE = date('Y-m-d 23:59:59');
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (empty($value) && $value != '0') {
            return;
        }
        $this->$name = $value;
    }

    public function getOrderList()
    {
        $order = new Order();
        $order = $order->select(Order::getColumnList());

        if ($this->searchKey && $this->searchText) {
            if ($this->searchKey == 'OrderHp' || $this->searchKey == 'RecvHp') {
                # 전화번호 검색 - 제거
                $this->searchText = str_replace('-', '', $this->searchText);
            }
            $order = $order->where($this->searchKey, 'like', '%' . $this->searchText . '%');
        } elseif ($this->searchText) {
            # 전체 검색
            $searchText = $this->searchText;
            $order      = $order->where(function ($q) use ($searchText) {
                $q->orwhere('OrderName', 'like', '%' . $searchText . '%')
                  ->orwhere('OrderHp', 'like', '%' . $searchText . '%')
                  ->orwhere('RecvName', 'like', '%' . $searchText . '%')
                  ->orwhere('RecvHp', 'like', '%' . $searchText . '%')
                  ->orwhere('GoodName', 'like', '%' . $searchText . '%');
            });

        }
        if ($this->searchState != -1) {
            $order = $order->where('OrderState', $this->searchState);
        }
        if ($this->searchPayMethod != -1) {
            $order = $order->where('PayMethod', $this->searchPayMethod);
        }
        if ($this->searchOrderNo) {
            $order = $order->where('OrderNum', $this->searchOrderNo);
        }

        $order = $order->whereBetween('created_at', [
            date('Y-m-d 00:00:00', strtotime($this->searchDateS)),
            date('Y-m-d 23:59:59', strtotime($this->searchDateE))
        ])->orderBy('created_at', 'desc');

        if ($this->excelDown) {
            return $order->get();
        } else {
            return $order->paginate($this->maxPageCnt);
        }
    }
}
