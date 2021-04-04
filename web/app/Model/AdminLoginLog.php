<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminLoginLog
 * @package App\Model
 *
 * @property int $AdminNo
 * @property string $Ip
 * @property string $LoginTime
 */
class AdminLoginLog extends Model
{
    public $timestamps = false;
    protected $table = 'table_adminloginlog';
    protected $primaryKey = 'No';

    protected int $AdminNo;
    protected string $Ip;
    protected string $LoginTime;

    /**
     * @param int $adminNo
     * @return object
     */
    public function getAdminLoginList(int $adminNo): object
    {
        return AdminLoginLog::where('AdminNo', $adminNo)
            ->orderBy('LoginTime', 'DESC')
            ->paginate(30);
    }
}
