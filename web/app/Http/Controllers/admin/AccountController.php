<?php


namespace App\Http\Controllers\admin;


use App\Model\AdminList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ViewControl;
use App\Http\Controllers\AdminTopValue;
use App\Http\Controllers\RequestControl;

class AccountController
{
    use RequestControl, ViewControl, AdminTopValue;

    public function index(Request $request)
    {
        $this->setRequest($request);
        return $this->view();
    }

    public function show()
    {
        $this->setAdminTopInfo($this->request);

        return view('admin.account', [
            'adminTopInfo' => $this->adminTopInfo,
            'accountInfo'  => AdminList::where('No', $this->adminTopInfo['adminNo'])->first()->toArray()
        ]);
    }

    /**
     * 회원 정보 수정 ajax
     */
    public function accountInfoSave()
    {
        $returnData = [
            'msg'       => '',
            'errorCode' => 0
        ];

        $data    = $this->request->all();
        $adminNo = $this->request->session()->get('adminInfo')['No'];

        $passwordCheck = AdminList::where('No', $adminNo)
            ->where('Password', DB::Raw('sha2("' . $data['OldPassword'] . '", 256)'))
            ->first();

        if (empty($passwordCheck)) {
            $returnData['msg']       = '비밀번호를 확인해주세요.';
            $returnData['errorCode'] = 100;
            echo json_encode($returnData);
            exit;
        }

        AdminList::where('No', $adminNo)
            ->update([
                'Name'     => $data['Name'],
                'Password' => DB::Raw('sha2("' . $data['Password'] . '", 256)'),
            ]);

        $returnData['msg'] = '수정되었습니다.';
        echo json_encode($returnData);
        exit;
    }
}
