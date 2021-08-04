<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public    $primaryKey = 'No';
    protected $table      = 'table_goods';

    protected int    $No;
    protected string $GoodName;
    protected int    $State;
    protected int    $Price;
    protected string $GoodContent;
    protected int    $GoodStock;
    protected int    $ShipCost;
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
    public static function getSelectColumnList(): array
    {
        return [
            'No',
            'GoodName',
            'State',
            'Price',
            //            'GoodContent',
            'GoodStock',
            'ShipCost',
            'KeyWord',
            'created_at',
            'updated_at',
        ];
    }

    public static function getColumnNameList(): array
    {
        return [
            'No'          => '상품 번호',
            'GoodName'    => '상품명',
            'State'       => '판매 상태',
            'Price'       => '상품 가격',
            'GoodContent' => '상품 상세내용',
            'GoodStock'   => '재고 수량',
            'ShipCost'    => '배송비',
            'KeyWord'     => '검색 키워드',
            'created_at'  => '생성일',
            'updated_at'  => '수정일',
        ];
    }

    public static function notUpdateColumn(): array
    {
        return [
            'No'         => 1,
            'created_at' => 1,
        ];
    }

    /**
     * @param int $goodNo
     * @param array $updateData
     * @return void
     */
    public static function infoUpdate(int $goodNo, array $updateData)
    {
        DB::table('table_goods')->where('No', $goodNo)->update($updateData);
    }
}
