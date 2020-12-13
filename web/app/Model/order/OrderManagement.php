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
     * 대쉬보드 매출 순이익 금액
     * @return object
     */
    static public function todayStatistics(): object
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
    static public function todayNonDeliveryCnt(): int
    {
        return DB::table('table_order')
                 ->where('created_at', '>=', date('Y-m-d 00:00:00'))
                 ->where('OrderState', Order::ORDER_STATE_PAID)
                 ->count();
    }

    /**
     * 주문 상태 변경
     * @param int $changeState
     * @param array $orderNumList
     */
    static public function stateChange(int $changeState, array $orderNumList)
    {
        $now          = date('Y-m-d H:i:s');
        $updateColumn = [
            'OrderState' => $changeState,
            'updated_at' => $now
        ];

        if ($changeState == Order::ORDER_STATE_SHIP_END) {
            $updateColumn['ShipingEndDate'] = $now;
        } elseif ($changeState == Order::ORDER_STATE_SHIP_ING) {
            $updateColumn['ShipingDate'] = $now;
        }

        Order::whereIn('OrderNum', $orderNumList)->update($updateColumn);
    }
}
