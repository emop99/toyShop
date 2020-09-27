<?php


namespace App\Http\Controllers\admin;


use App\Model\AdminList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\RequestControl;

class LoginController
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
        return view('admin.login.adminLogin', []);
    }

    public function login()
    {
        $returnData = [
            'msg'   => '',
            'state' => 0
        ];

        $data = $this->request->all();

        $check = AdminList::where('Email', $data['email'])
            ->where('Password', DB::Raw('sha2("' . $data['password'] . '", 256)'))
            ->first();

        if (empty($check)) {
            $returnData['msg'] = '아이디 혹은 비밀번호를 확인해주세요.';
        } else {
            $returnData['state'] = 1;
            $this->request->session()->put('adminInfo', $check->toArray());
            $this->request->session()->save();
        }

        echo json_encode($returnData);
        exit;
    }

    public function logout()
    {
        $this->request->session()->forget('adminInfo');
        $this->request->session()->save();
        echo true;
        exit;
    }
}
