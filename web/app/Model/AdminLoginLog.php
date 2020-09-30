<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdminLoginLog extends Model
{
    const CREATED_AT = 'LoginTime';
    public $timestamps = false;
    protected $table = 'table_adminloginlog';

    /**
     * @param int $adminNo
     * @return object
     */
    public function getAdminLoginList($adminNo)
    {
        return AdminLoginLog::where('AdminNo', $adminNo)
            ->orderBy('LoginTime', 'DESC')
            ->paginate(30);
    }
}
