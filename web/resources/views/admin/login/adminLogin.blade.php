@extends('admin.login.top')
@section('bodyContent')
    <script src="/js/Admin/Login.js?{{CASH}}"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div style="width: 100%;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">관리자 로그인</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   onkeydown="ToyShop.Login.enterEvent(event)"
                                                   aria-describedby="emailHelp" placeholder="ID" id="eamil">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   onkeydown="ToyShop.Login.enterEvent(event)"
                                                   placeholder="Password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="idRememberChack">
                                                <label class="custom-control-label" for="idRememberChack">ID 저장</label>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="btn btn-primary btn-user btn-block"
                                           onclick="ToyShop.Login.loginBtn();">
                                            로그인
                                        </a>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="javascript:;">비밀번호를 잊어버리셨습니까?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/admin/join">회원가입</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
