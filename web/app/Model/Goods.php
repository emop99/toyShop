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
 * @property string $created_at
 * @property string $updated_at
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
    protected string $created_at;
    protected string $updated_at;

    const GOOD_STATE_NO_SALE = 0; # 미판매 상태
    const GOOD_STATE_SALE = 1; # 판매중 상태

    public static function getStateList(): array
    {
        return [
            0 => '미판매',
            1 => '판매중',
        ];
    }

    /**
     * @return array
     */
    public static function getColumnList(): array
    {
        return [
            'No',
            'GoodName',
            'State',
            'Price',
//            'GoodContent',
            'GoodStock',
            'ShipCost',
//            'KeyWord',
            'created_at',
            'updated_at',
        ];
    }
}
