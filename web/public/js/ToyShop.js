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
            'url': window.location.pathname,
            'loading': 0,
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
            },
            beforeSend: function () {
                // loading bar show
                ToyShop.Top.loadingBarShow(1);
            },
            complete: function () {
                // loading bar hide
                if (option.loading !== 1) {
                    ToyShop.Top.loadingBarShow(0);
                }
            }
        });
    };

    /**
     * loadingBar Show|noShow
     * @param showType 1:Show 0:noShow
     */
    this.loadingBarShow = (showType) => {
        let loadingBar = $('#loading-main');
        if (showType === 1) {
            loadingBar.show();
        } else {
            loadingBar.hide();
        }
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

    /**
     * 엑셀 다운로드 버튼 이벤트
     */
    this.excelDownBtn = function () {
        window.open(location.pathname + location.search + '&excelDown=1');
    };

    /**
     * 검색 최대 개수 설정 버튼 이벤트
     * @param cnt
     */
    this.searchMaxCntBtn = function (cnt) {
        $('#maxPageCnt').val(cnt);
        ToyShop.Top.searchBtn();
    };
};

$(function () {
    $('.calendar').datepicker();

    $('.enterSearch').on('keydown', function (e) {
        if (e.keyCode === 13) {
            ToyShop.Top.searchBtn();
        }
    });

    $('.onlyNumber').on('keyup', function () {
        $(this).val($(this).val().replace(/[^0-9]/g, ""));
    });
});
