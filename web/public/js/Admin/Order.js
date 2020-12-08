ToyShop.Order = new function () {

    /**
     * 단일 주문 상태 변경 이벤트
     * @param $this
     * @param changeState 변경할 상태값
     */
    this.singleOrderStateChange = function ($this, changeState) {
        if (!confirm('해당 주문의 상태를 바꾸시겠습니까?')) {
            return true;
        }

        var sendData = {
            'mode': 'singleOrderStateChange',
            'orderNum': $this.closest('tr').data('ordernum'),
            'changeState': changeState
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            alert(returnData.msg);
            location.reload();
        });
    };

};
