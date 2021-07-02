<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Model\order\OrderManagement;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;

class MainController
{
    use RequestControl;
    use ViewControl;
    use AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        $this->setAdminTopInfo($this->request);

        return view('admin.main', [
            'adminTopInfo' => $this->adminTopInfo,
            'todayStatistics' => OrderManagement::todayStatistics(),
            'todayNonDeliveryCnt' => OrderManagement::todayNonDeliveryCnt()
        ]);
    }
}
