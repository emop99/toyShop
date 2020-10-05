ToyShop.Join = new function () {

    this.joinBtn = function () {
        var password = $('#password');
        var passwordCheck = $('#passwordCheck');
        var name = $('#name');
        var email = $('#email');
        var regexp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

        if (password.val() === '') {
            alert('비밀번호를 입력해주세요.');
            password.focus();
            return true;
        } else if (password.val() !== passwordCheck.val()) {
            alert('새 비밀번호를 확인해주세요.');
            return true;
        } else if (name.val() === '') {
            alert('이름을 입력해주세요.');
            name.focus();
            return true;
        } else if (email.val() === '' || !regexp.test(email.val())) {
            alert('아이디(email)을 확인해주세요');
            email.focus();
            return true;
        }

        var sendData = {
            'Name': name.val(),
            'Password': password.val(),
            'Email' : email.val(),
            'mode': 'joinSave'
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            alert(returnData.msg);
            window.location.href = '/admin/login';
        });
    };
};
