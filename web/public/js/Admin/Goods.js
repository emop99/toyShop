ToyShop.Goods = new function () {

    /**
     * 선택 상품 상태 변경
     */
    this.multiGoodsStateChange = function (changeState) {
        var checkedList = $('input[name^="goodsCheck["]:checked');
        if (!checkedList.length) {
            alert('선택된 상품이 없습니다.');
            return true;
        }

        if (!confirm('선택한 상품들의 상태를 바꾸시겠습니까?')) {
            return true;
        }

        var goodsNumList = [];
        checkedList.each(function () {
            goodsNumList.push($(this).data('goodsnum'));
        });

        var sendData = {
            'mode': 'multiGoodsStateChange',
            'goodsNumList': goodsNumList,
            'changeState': changeState
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            alert(returnData.msg);
            location.reload();
        });
    };
};

$(function () {

});
