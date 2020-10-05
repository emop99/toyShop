<?php
include base_path('resources/views/admin/login/') . 'top.php';
?>

<script src="/js/Admin/Join.js?<?= CASH ?>"></script>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">관리자 회원가입</h1>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name"
                                       placeholder="이름">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email"
                                       placeholder="ID(이메일)">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" placeholder="비밀번호">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="passwordCheck" placeholder="비밀번호 확인">
                                </div>
                            </div>
                            <a href="javascript:;" class="btn btn-primary btn-user btn-block" onclick="ToyShop.Join.joinBtn();">
                                회원가입
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">비밀번호를 잊어버리셨습니까?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">기존에 가입된 아이디로 로그인하기</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include base_path('resources/views/admin/login/') . 'bottom.php';
?>
