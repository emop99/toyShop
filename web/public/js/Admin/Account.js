ToyShop.Account = new function () {
    this.saveInfo = function () {
        var nowPasswd = $('#nowPasswd');
        var newPasswd = $('#newPasswd');
        var newPasswdCheck = $('#newPasswdCheck');
        var name = $('#name');

        if (nowPasswd.val() === '') {
            alert('비밀번호를 입력해주세요.');
            nowPasswd.focus();
            return true;
        } else if (newPasswd.val() && newPasswd.val() !== newPasswdCheck.val()) {
            alert('새 비밀번호를 확인해주세요.');
            return true;
        } else if (name.val() === '') {
            name.focus();
            alert('이름을 입력해주세요.');
            return true;
        }

        var sendData = {
            'Name': name.val(),
            'Password': newPasswd.val(),
            'OldPassword': nowPasswd.val(),
            'mode': 'accountInfoSave'
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            alert(returnData.msg);

            if (returnData.errorCode === 100) {
                nowPasswd.focus();
            } else {
                location.reload();
            }
        });
    };
};
