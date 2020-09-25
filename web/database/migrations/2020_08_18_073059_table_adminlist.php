<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAdminlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_adminlist', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('No');
            $table->string('Name', 50);
            $table->string('Email', 100)->unique();
            $table->string('Password', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
