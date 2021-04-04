<?php


namespace App\Model\goods;

use App\Model\Goods;

/**
 * Class GoodsManagement
 * @package App\Model\goods
 */
class GoodsManagement
{
    /**
     * 주문 상태 변경
     * @param int $changeState
     * @param array $goodsNumList
     */
    public static function stateChange(int $changeState, array $goodsNumList)
    {
        $now = date('Y-m-d H:i:s');
        $updateColumn = [
            'State' => $changeState,
            'updated_at' => $now
        ];

        Goods::whereIn('No', $goodsNumList)->update($updateColumn);
    }
}
