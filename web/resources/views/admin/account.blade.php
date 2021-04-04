@extends('admin.top')
@section('bodyContent')

    <style>
        .w-200px {
            width: 200px;
        }
    </style>

    <script src="/js/Admin/Account.js?{{CASH}}"></script>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">계정 설정</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text w-200px">이메일(ID)</span>
                    </div>
                    <input type="text" class="form-control" value="{{$accountInfo['Email']}}" disabled>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text w-200px">비밀번호</span>
                    </div>
                    <input type="password" class="form-control" placeholder="현재 비밀번호를 입력해주세요." id="nowPasswd">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text w-200px">비밀번호 변경</span>
                    </div>
                    <input type="password" class="form-control" placeholder="비밀번호를 입력해주세요." id="newPasswd">
                    <input type="password" class="form-control" placeholder="비밀번호 확인" id="newPasswdCheck">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text w-200px">이름</span>
                    </div>
                    <input type="text" class="form-control" placeholder="이름을 입력해주세요." value="{{$accountInfo['Name']}}"
                           id="name">
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg" onclick="ToyShop.Account.saveInfo();">
                        저장
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
