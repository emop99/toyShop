<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Goods
 * @package App\Model
 *
 * @property int $No
 * @property string $GoodName 상품명
 * @property int $State 판매 상태
 * @property int $Price 상품 가격
 * @property string $GoodContent 상품 상세내용
 * @property int $GoodStock 재고 수량
 * @property int $ShipCost 배송비
 * @property string $KeyWord 검색 키워드
 */
class Goods extends Model
{
    public $primaryKey = 'No';
    protected $table = 'table_goods';

    protected int $No;
    protected string $GoodName;
    protected int $State;
    protected int $Price;
    protected string $GoodContent;
    protected int $GoodStock;
    protected int $ShipCost;
    protected string $KeyWord;

    /**
     * $State 미판매 상태 값
     * @var int GOOD_STATE_NO_SALE
     */
    const GOOD_STATE_NO_SALE = 0;
    /**
     * $State 판매 중 상태 값
     * @var int GOOD_STATE_SALE
     */
    const GOOD_STATE_SALE = 1;
}
