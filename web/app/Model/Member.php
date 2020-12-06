<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * @package App\Model
 *
 * @property int $No
 * @property string $Id 회원 ID
 * @property string $Name 회원명
 * @property string $Hp 회원 전화번호
 * @property string Password 회원 비밀번호 SHA256
 * @property int $IsMember 비회원 회원 체크
 * @property string $Addr1 회원 주소1
 * @property string $Addr2 회원 주소2
 */
class Member extends Model
{
    public $primaryKey = 'No';
    protected $table = 'table_member';
    protected $hidden = ['Password'];

    protected int $No;
    protected string $Id;
    protected string $Name;
    protected string $Hp;
    protected string $Password;
    protected int $IsMember;
    protected string $Addr1;
    protected string $Addr2;

    /**
     * IsMember 비회원 값
     * @var int MEMBER_IS_NO_MEMBER
     */
    const MEMBER_IS_NO_MEMBER = 0;
    /**
     * IsMember 회원 값
     * @var int MEMBER_IS_MEMBER
     */
    const MEMBER_IS_MEMBER = 1;
}
