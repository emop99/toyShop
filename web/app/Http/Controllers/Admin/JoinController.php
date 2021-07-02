<?php


namespace App\Http\Controllers\Admin;


use App\Model\AdminList;
use Illuminate\Http\Request;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\RequestControl;

class JoinController
{
    use RequestControl;
    use ViewControl;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        return view('admin.login.join', []);
    }

    public function joinSave()
    {
        $data = $this->request->all();

        /* @var AdminList $adminList */
        $adminList           = new AdminList();
        $adminList->Name     = $data['Name'];
        $adminList->Password = hash('sha256', $data['Password']);
        $adminList->Email    = $data['Email'];
        $adminList->save();

        echo json_encode(['msg' => '저장되었습니다']);
        exit;
    }
}
