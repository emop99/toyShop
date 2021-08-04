ToyShop.GoodsInfo = new function () {

    /**
     * 저장 버튼 이벤트
     */
    this.saveBtn = function () {
        ToyShop.Top.loadingBarShow(1);
        $('#goodsInfoForm').submit();
    };

};

// 스마트 에디터 적용
var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
    oAppRef: oEditors,
    elPlaceHolder: "GoodContent",  // textarea ID
    sSkinURI: "/smartEditor/index.html",  // skin경로
    fCreator: "createSEditor2",
});
