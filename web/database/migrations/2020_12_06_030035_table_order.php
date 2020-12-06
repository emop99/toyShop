<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_order', function (Blueprint $table) {
            $table->engine    = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->string('OrderNum', 20)->primary();
            $table->integer('MemberNo')->index();
            $table->integer('GoodNo')->index();
            $table->integer('OrderState')->index()->default(0);
            $table->string('OrderName', 100)->index();
            $table->string('OrderHp', 20)->index();
            $table->string('RecvName', 100)->index();
            $table->string('RecvHp', 20)->index();
            $table->dateTime('ShippingDate')->index()->nullable();
            $table->integer('PayMethod')->index();
            $table->string('GoodName', 200);
            $table->integer('Price');
            $table->integer('ShipCost');
            $table->longText('OrderData');
            $table->string('OrderIp', 100);
            $table->string('RecvAddr1', 200);
            $table->string('RecvAddr2', 200);
            $table->timestamps();
        });
        Schema::table('table_order', function (Blueprint $table) {
            $table->string('created_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
