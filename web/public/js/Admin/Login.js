ToyShop.Login = new function () {

    this.loginBtn = function () {
        var sendData = {
            'email': $('#eamil').val(),
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
    }
};
