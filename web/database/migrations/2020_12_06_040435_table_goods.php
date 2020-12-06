<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_goods', function (Blueprint $table) {
            $table->engine    = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('No');
            $table->string('GoodName', 200)->index();
            $table->integer('State')->index();
            $table->integer('Price');
            $table->longText('GoodContent')->nullable();
            $table->integer('GoodStock');
            $table->integer('ShipCost');
            $table->string('KeyWord', 200)->index()->nullable();
            $table->timestamps();
        });
        Schema::table('table_goods', function (Blueprint $table) {
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
