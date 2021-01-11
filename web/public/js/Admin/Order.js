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

    /**
     * 선택 주문 상태 변경 이벤트
     */
    this.multiOrderStateChange = function (changeState) {
        var checkedList = $('input[name^="orderCheck["]:checked');
        if (!checkedList.length) {
            alert('선택된 주문이 없습니다.');
            return true;
        }

        if (!confirm('선택한 주문들의 상태를 바꾸시겠습니까?')) {
            return true;
        }

        var orderNumList = [];
        checkedList.each(function () {
            orderNumList.push($(this).data('ordernum'));
        });

        var sendData = {
            'mode': 'multiOrderStateChange',
            'orderNumList': orderNumList,
            'changeState': changeState
        };

        ToyShop.Top.ajax({}, sendData, function (returnData) {
            alert(returnData.msg);
            location.reload();
        });
    };

    /**
     * 주문 상세보기 버튼 이벤트
     * @param orderNum
     */
    this.orderDetailViewBtn = function (orderNum) {
        location.href = '/admin/orderView?orderNum=' + orderNum;
    };

};
