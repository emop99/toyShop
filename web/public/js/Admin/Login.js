ToyShop.Login = new function () {

    const idRememberCookieName = 'adminIdRememberCheck';

    this.loginBtn = function () {
        var email = $('#eamil').val();
        if ($('#idRememberChack:checked').length) {
            $.cookie(idRememberCookieName, email, { expires: 30 });
        } else {
            $.removeCookie(idRememberCookieName);
        }

        var sendData = {
            'email': email,
            'password': $('#password').val(),
            'mode': 'login'
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            if (returnData.msg) {
                alert(returnData.msg);
            } else if (returnData.state) {
                window.location.href = '/admin/main';
            }
        });
    };

    this.enterEvent = function (event) {
        if (event.keyCode === 13) {
            ToyShop.Login.loginBtn();
        }
    };

    this.adminIdRememberCheck = function () {
        if ($.cookie(idRememberCookieName) !== undefined) {
            $('#idRememberChack')[0].checked = true;
            $('#eamil').val($.cookie(idRememberCookieName));
        }
    };
};

$(function () {
    ToyShop.Login.adminIdRememberCheck();
});
