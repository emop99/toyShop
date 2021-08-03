<?php


namespace App\Search;


use App\Model\Goods;

/**
 * 상품 검색
 * Class GoodsSearch
 * @package App\Model\goods
 *
 * @property string $searchKey
 * @property string $searchText
 * @property int $searchState
 * @property string $searchDateS
 * @property string $searchDateE
 * @property int $maxPageCnt
 */
class GoodsSearch
{
    private string $searchKey = '';
    private string $searchText = '';
    private int $searchState = -1;
    private string $searchDateS = '';
    private string $searchDateE = '';
    private int $maxPageCnt = 25;


    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        if (empty($value) && $value != '0') {
            return;
        }
        $this->$key = $value;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getGoodsList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        /** @var Goods $good */
        $good = new Goods();
        $good = $good->select(Goods::getSelectColumnList());

        if ($this->searchKey && $this->searchText) {
            $good = $good->where($this->searchKey, 'like', '%' . $this->searchText . '%');
        } elseif ($this->searchText) {
            $searchText = $this->searchText;
            $good = $good->where(function ($q) use ($searchText) {
                $q->orwhere('GoodName', 'like', '%' . $searchText . '%')
                    ->orwhere('KeyWord', 'like', '%' . $searchText . '%');
            });
        }

        if ($this->searchState != -1) {
            $good = $good->where('State', $this->searchState);
        }

        if ($this->searchDateS && $this->searchDateE) {
            $good = $good->whereBetween('created_at', [$this->searchDateS . ' 00:00:00', $this->searchDateE . ' 23:59:59']);
        } elseif ($this->searchDateS) {
            $good = $good->where('created_at', '>=', $this->searchDateS);
        } elseif ($this->searchDateE) {
            $good = $good->where('created_at', '<=', $this->searchDateE);
        }

        $good = $good->orderby('No', 'desc');

        return $good->paginate($this->maxPageCnt);
    }
}
