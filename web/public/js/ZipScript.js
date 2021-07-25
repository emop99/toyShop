document.write("<script src='https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js'></script>");

/**
 * 다음 주소 관련 스크립트
 */
var ZipScript = new function () {

    var $addrNum;
    var $addr1;
    var $addr2;

    /**
     * 주소 받을 input 셋팅
     * @param addrNum
     * @param addr1
     * @param addr2
     */
    this.init = function (addrNum, addr1, addr2) {
        $addrNum = addrNum;
        $addr1 = addr1;
        $addr2 = addr2;
    };

    /**
     * 우편 주소 찾기 버튼 클릭 이벤트
     */
    this.searchZipBtn = function () {
        var width = 500; //팝업의 너비
        var height = 600; //팝업의 높이
        new daum.Postcode({
            width: width, //생성자에 크기 값을 명시적으로 지정해야 합니다.
            height: height,
            oncomplete: function (data) {
                // 선택 완료되면
                $addrNum.val(data.zonecode);
                $addr1.val(data.address);
                $addr2.focus();
            }
        }).open({
            left: (window.screen.width / 2) - (width / 2),
            top: (window.screen.height / 2) - (height / 2)
        });
    };
};
