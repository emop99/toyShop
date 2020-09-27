var ToyShop = {};

ToyShop.Top = new function () {

    /**
     * @param option
     * @param data
     * @param callBack
     */
    this.ajax = function (option, data, callBack) {
        var normalData = {
            '_token': $('#_token').val()
        };

        data = $.extend(data, normalData);

        var normalOption = {
            'method': 'POST',
            'cache': false,
            'dataType': 'json',
            'url': window.location.pathname
        };

        option = $.extend(normalOption, option);

        $.ajax({
            'url': option.url,
            'cache': option.cache,
            'method': option.method,
            'data': data,
            'dataType': option.dataType,
            'async': option.async,
            error: function (request, error) {
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            },
            success: function (data) {
                callBack(data);
            }
        });
    };

    this.adminLogOut = function () {
        var sendData = {
            'mode' : 'logout'
        };

        ToyShop.Top.ajax({'url': '/admin/login'}, sendData, function () {
            window.location.href = '/admin/login';
        });
    };
};
