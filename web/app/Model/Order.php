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
 * @property string $ShipingDate 배송시작일
 * @property string $GoodName 상품명
 * @property int $Price 결제 금액
 * @property int $ShipCost 배송비
 * @property int $PayMethod 결제 방식
 * @property string $OrderData 주문 데이터 JSON
 * @property string $OrderIp 주문자 IP
 * @property int $ShipNum 송장번호
 * @property string $RecvAddrNum 수령 우편 번호
 * @property string $RecvAddr1 수령 주소
 * @property string $RecvAddr2 수령 주소
 * @property string $created_at 생성일
 * @property string $updated_at 수정일
 * @property string $ShipingEndDate 배송완료일
 */
class Order extends Model
{
    public $primaryKey = 'OrderNum';
    public $keyType    = 'string';
    public $table      = 'table_order';

    protected int    $OrderNum;
    protected int    $MemberNo;
    protected int    $GoodNo;
    protected string $OrderState;
    protected string $OrderName;
    protected string $OrderHp;
    protected string $RecvName;
    protected string $RecvHp;
    protected string $ShipingDate;
    protected string $GoodName;
    protected int    $Price;
    protected int    $ShipCost;
    protected int    $PayMethod;
    protected int    $ShipNum;
    protected string $OrderData;
    protected string $OrderIp;
    protected string $RecvAddrNum;
    protected string $RecvAddr1;
    protected string $RecvAddr2;
    protected string $created_at;
    protected string $updated_at;
    protected string $ShipingEndDate;

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
    /** 취소 */
    const ORDER_STATE_CANCEL = 5;

    /**
     * 주문 상태 리스트
     * @return string[]
     */
    public static function orderStateList(): array
    {
        return [
            self::ORDER_STATE_UNPAID     => '미결제',
            self::ORDER_STATE_PAID       => '결제완료',
            self::ORDER_STATE_SHIP_READY => '배송준비',
            self::ORDER_STATE_SHIP_ING   => '배송중',
            self::ORDER_STATE_SHIP_END   => '배송완료',
            self::ORDER_STATE_CANCEL     => '취소',
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
    public static function payMethodList(): array
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
    public static function createOrderNum(string $day): string
    {
        $microtime = explode('.', explode(' ', microtime())[0])[1];
        return date('ymd', strtotime($day)) . '-' . $microtime . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
    }

    public static function getColumnList(): array
    {
        return [
            '주문 번호'    => 'OrderNum',
            '주문 회원 번호' => 'MemberNo',
            '주문 상품 번호' => 'GoodNo',
            '주문 상태'    => 'OrderState',
            '주문자 명'    => 'OrderName',
            '주문자 번호'   => 'OrderHp',
            '수령인 명'    => 'RecvName',
            '수령인 번호'   => 'RecvHp',
            '배송시작일'    => 'ShipingDate',
            '상품명'      => 'GoodName',
            '결제 금액'    => 'Price',
            '배송비'      => 'ShipCost',
            '결제 방식'    => 'PayMethod',
            //            '주문 데이터 JSON' => 'OrderData',
            '주문자 IP'   => 'OrderIp',
            '송장번호'     => 'ShipNum',
            '우편 번호'    => 'RecvAddrNum',
            '주소'       => 'RecvAddr1',
            '상세 주소'    => 'RecvAddr2',
            '생성일'      => 'created_at',
            '수정일'      => 'updated_at',
            '배송완료일'    => 'ShipingEndDate',
        ];
    }

    public static function getColumnNameList(): array
    {
        return [
            'OrderNum'       => '주문 번호',
            'MemberNo'       => '주문 회원 번호',
            'GoodNo'         => '주문 상품 번호',
            'OrderState'     => '주문 상태',
            'OrderName'      => '주문자 명',
            'OrderHp'        => '주문자 번호',
            'RecvName'       => '수령인 명',
            'RecvHp'         => '수령인 번호',
            'ShipingDate'    => '배송시작일',
            'GoodName'       => '상품명',
            'Price'          => '결제 금액',
            'ShipCost'       => '배송비',
            'PayMethod'      => '결제 방식',
            'OrderData'      => '주문 데이터 JSON',
            'OrderIp'        => '주문자 IP',
            'ShipNum'        => '송장번호',
            'RecvAddrNum'    => '수령 우편 번호',
            'RecvAddr1'      => '수령 주소',
            'RecvAddr2'      => '수령 주소',
            'created_at'     => '생성일',
            'updated_at'     => '수정일',
            'ShipingEndDate' => '배송완료일',
        ];
    }

    public static function notUpdateColumn(): array
    {
        return [
            'OrderNum' => 1,
            'MemberNo' => 1,
            'GoodNo' => 1,
            'GoodName' => 1,
            'Price' => 1,
            'ShipCost' => 1,
            'PayMethod' => 1,
            'OrderData' => 1,
            'OrderIp' => 1,
            'created_at' => 1,
        ];
    }
}
