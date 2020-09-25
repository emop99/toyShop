<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdminList extends Model
{
    protected $table = 'table_adminlist';
    protected $hidden = ['Password'];
}
