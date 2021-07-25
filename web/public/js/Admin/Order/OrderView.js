ToyShop.OrderView = function () {

};

$(function () {
    // 주소 찾기 set
    ZipScript.init($('#RecvAddrNum'), $('#RecvAddr1'), $('#RecvAddr2'));
    $('#RecvAddrNum, #RecvAddr1').on('click', function () {
        ZipScript.searchZipBtn();
    });
});
