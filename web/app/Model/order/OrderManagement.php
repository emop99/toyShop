<?php


namespace App\Model\order;


use App\Model\Order;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderManagement
 * @package App\Model\order
 */
class OrderManagement
{
    /**
     * 주문관리 페이지 목록 불러오기
     * @param $params
     * @return object
     */
    public function getOrderList($params): object
    {
        $searchStartDate = date('Y-m-d 00:00:00', strtotime('-6 Month'));
        $searchEndDate   = date('Y-m-d 23:59:59');
        $maxPageCnt      = isset($params['maxPageCnt']) ? $params['maxPageCnt'] : 25;

        $order = new Order();
        $order = $order->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->orderBy('created_at', 'desc');

        return $order->paginate($maxPageCnt);
    }

    /**
     * 대쉬보드 매출 순이익 금액
     * @return object
     */
    public function todayStatistics(): object
    {
        return DB::table('table_order')
            ->where('created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('OrderState', '>=', Order::ORDER_STATE_PAID)
            ->select(DB::Raw('sum(Price) as PriceSum, sum(ShipCost) as ShipCostSum'))
            ->first();
    }

    /**
     * 대쉬보드 미배송 건수
     * @return int
     */
    public function todayNonDeliveryCnt(): int
    {
        return DB::table('table_order')
            ->where('created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('OrderState', Order::ORDER_STATE_PAID)
            ->count();
    }
}
