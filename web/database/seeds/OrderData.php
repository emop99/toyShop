<?php

namespace Database\Seeders;

use App\Model\Order;
use App\Model\Goods;
use App\Model\Member;
use Illuminate\Database\Seeder;

class OrderData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # TEST 주문데이터 insert
        for ($i = 0; $i < 100; $i++) {
            /** @var Member $member */
            $member = Member::find(rand(1, 13));
            /** @var Goods $goods */
            $goods = Goods::find(rand(1, 5));
//            $month = rand(1, 6);
//            $day   = rand(1, 30);

            $order              = new Order();
            $order->OrderNum    = $order->createOrderNum('-0 Day');
            $order->OrderState  = Order::ORDER_STATE_PAID;
            $order->OrderName   = $member->Name;
            $order->OrderHp     = $member->Hp;
            $order->RecvName    = $member->Name;
            $order->RecvHp      = $member->Hp;
            $order->RecvAddrNum = $member->AddrNum;
            $order->RecvAddr1   = $member->Addr1;
            $order->RecvAddr2   = $member->Addr2;
            $order->OrderIp     = '127.0.0.1';
            $order->OrderData   = '{}';
            $order->PayMethod   = rand(1, 2);
            $order->GoodName    = $goods->GoodName;
            $order->GoodNo      = $goods->No;
            $order->MemberNo    = $member->No;
            $order->Price       = $goods->Price;
            $order->ShipCost    = $goods->ShipCost;
            $order->created_at  = date('Y-m-d h:i:s');
            $order->save();
        }
    }
}
