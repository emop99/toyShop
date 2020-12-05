<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminList
 * @package App\Model
 * @property int $No
 * @property string $Name
 * @property string $Email
 * @property string $Password
 * @property string $created_at
 * @property string $updated_at
 */
class AdminList extends Model
{
    public $primaryKey = 'No';

    protected $table = 'table_adminlist';
    protected $hidden = ['Password'];

    protected $Name;
    protected $Email;
    protected $Password;
    protected $created_at;
    protected $updated_at;
}
