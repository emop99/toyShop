ToyShop.GoodsInfo = new function () {


    this.saveBtn = function () {

    };

};

// 스마트 에디터 적용
var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
    oAppRef: oEditors,
    elPlaceHolder: "contentsArea",  // textarea ID
    sSkinURI: "/smartEditor/index.html",  // skin경로
    fCreator: "createSEditor2",
});
