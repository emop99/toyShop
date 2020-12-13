<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_member', function (Blueprint $table) {
            $table->engine    = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('No');
            $table->string('Id', 100)->index()->nullable();
            $table->string('Name', 100)->index();
            $table->string('Hp', 20)->index();
            $table->integer('IsMember')->index();
            $table->string('Password', 200)->nullable();
            $table->string('AddrNum', 10)->nullable();
            $table->string('Addr1', 200)->nullable();
            $table->string('Addr2', 200)->nullable();
            $table->timestamps();
        });
        Schema::table('table_member', function (Blueprint $table) {
            $table->string('created_at')->index()->change();
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
