var ToyShop = {};

ToyShop.Top = new function () {

    /**
     * ajax
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
                console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            },
            success: function (data) {
                callBack(data);
            }
        });
    };

    /**
     * 로그아웃 버튼 이벤트
     */
    this.adminLogOut = function () {
        var sendData = {
            'mode': 'logout'
        };

        ToyShop.Top.ajax({'url': '/admin/login'}, sendData, function () {
            window.location.href = '/admin/login';
        });
    };

    /**
     * Sidebar Toggler 버튼
     */
    this.topToggleBtn = function () {
        var $sidbar = $(".sidebar");
        $("body").toggleClass("sidebar-toggled");
        $sidbar.toggleClass("toggled");

        if ($sidbar.hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }
    };

    /**
     * 체크박스 전체선택|해제 이벤트
     * @param $this
     */
    this.checkBoxAllCheck = function ($this) {
        var name = $this.data('name');

        if ($this.is(':checked')) {
            $('input[name^="' + name + '"]').prop('checked', true);
        } else {
            $('input[name^="' + name + '"]').prop('checked', false);
        }
    };

    /**
     * 검색 버튼 이벤트
     */
    this.searchBtn = function () {
        $('#searchForm').submit();
    };
};

$(function () {
    $('.calendar').datepicker();

    $('.enterSearch').on('keydown', function (e) {
        if (e.keyCode === 13) {
            ToyShop.Top.searchBtn();
        }
    });
});
