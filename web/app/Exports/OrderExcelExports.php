<?php


namespace App\Exports;

use App\Model\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

/**
 * Class OrderExcelExports
 * @package App\Exports
 * @property object $data
 */
class OrderExcelExports implements FromView
{
    private object $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        // TODO: Implement view() method.

        return view('exports.order', [
            'tableList'      => $this->data,
            'orderStateList' => Order::orderStateList(),
            'payMethodList'  => Order::payMethodList()
        ]);
    }
}
