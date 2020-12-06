<?php

namespace Database\Seeders;

use App\Model\Goods;
use Illuminate\Database\Seeder;

class GoodsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodInfo = $this->testGoodsInfo();

        foreach ($goodInfo as $infoRow) {
            $goods            = new Goods();
            $goods->ShipCost  = 2500;
            $goods->Price     = (rand(1, 10) * 10000) + (rand(1, 9) * 1000);
            $goods->GoodName  = $infoRow;
            $goods->GoodStock = rand(100, 300);
            $goods->State     = Goods::GOOD_STATE_SALE;
            $goods->save();
        }
    }

    private function testGoodsInfo(): array
    {
        return [
            '곰인형',
            'ps5',
            'psp',
            'Xbox',
            '헤드셋'
        ];
    }
}
