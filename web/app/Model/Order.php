<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Model
 *
 * @property int $OrderNum 주문 번호
 * @property int $MemberNo 주문 회원 번호
 * @property int $GoodNo 주문 상품 번호
 * @property string $OrderState 주문 상태
 * @property string $OrderName 주문자 명
 * @property string $OrderHp 주문자 번호
 * @property string $RecvName 수령인 명
 * @property string $RecvHp 수령인 번호
 * @property string $ShippingDate 배송시작일
 * @property string $GoodName 상품명
 * @property int $Price 결제 금액
 * @property int $ShipCost 배송비
 * @property int $PayMethod 결제 방식
 * @property string $OrderData 주문 데이터 JSON
 * @property string $OrderIp 주문자 IP
 * @property string $RecvAddr1 수령 주소
 * @property string $RecvAddr2 수령 주소
 * @property string $created_at 생성일
 * @property string $updated_at 수정일
 */
class Order extends Model
{
    public $primaryKey = 'OrderNum';
    public $keyType = 'string';
    public $table = 'table_order';

    protected int $OrderNum;
    protected int $MemberNo;
    protected int $GoodNo;
    protected string $OrderState;
    protected string $OrderName;
    protected string $OrderHp;
    protected string $RecvName;
    protected string $RecvHp;
    protected string $ShippingDate;
    protected string $GoodName;
    protected int $Price;
    protected int $ShipCost;
    protected int $PayMethod;
    protected string $OrderData;
    protected string $OrderIp;
    protected string $RecvAddr1;
    protected string $RecvAddr2;
    protected string $created_at;
    protected string $updated_at;

    # 주문 상태
    /** 미결제 상태 */
    const ORDER_STATE_UNPAID = 0;
    /** 결제완료 상태 */
    const ORDER_STATE_PAID = 1;
    /** 배송준비 상태 */
    const ORDER_STATE_SHIP_READY = 2;
    /** 배송중 상태 */
    const ORDER_STATE_SHIP_ING = 3;
    /** 배송완료 상태 */
    const ORDER_STATE_SHIP_END = 4;

    /**
     * 주문 상태 리스트
     * @return string[]
     */
    public function orderStateList(): array
    {
        return [
            self::ORDER_STATE_UNPAID     => '미결제',
            self::ORDER_STATE_PAID       => '결제완료',
            self::ORDER_STATE_SHIP_READY => '배송준비',
            self::ORDER_STATE_SHIP_ING   => '배송중',
            self::ORDER_STATE_SHIP_END   => '배송완료'
        ];
    }

    # 결제 수단
    /** 카드 결제 */
    const ORDER_METHOD_CARD = 1;
    /** 무통장 입금 */
    const ORDER_METHOD_BANK = 2;

    /**
     * @return string[]
     */
    public function payMethodList(): array
    {
        return [
            self::ORDER_METHOD_CARD => '카드',
            self::ORDER_METHOD_BANK => '무통장'
        ];
    }

    /**
     * OrderNum 생성
     * @param string $day
     * @return string
     */
    public function createOrderNum($day): string
    {
        $microtime = explode('.', explode(' ', microtime())[0])[1];
        return date('ymd', strtotime($day)).'-'.$microtime.rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    }
}
