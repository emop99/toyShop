<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>주문 번호</th>
        <th>주문 날짜</th>
        <th>주문 상태</th>
        <th>송장번호</th>
        <th>상품명</th>
        <th>주문자</th>
        <th>주문자 핸드폰번호</th>
        <th>수령인</th>
        <th>수령인 핸드폰번호</th>
        <th>주소</th>
        <th>금액</th>
        <th>배송비</th>
        <th>결제수단</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tableList as $key => $listRow) {
        /** @var \App\Model\Order $listRow */ ?>
        <tr>
            <td><?= $listRow->OrderNum ?></td>
            <td><?= $listRow->created_at ?></td>
            <td><?= $orderStateList[$listRow->OrderState] ?></td>
            <td><?= $listRow->ShipNum ?></td>
            <td><?= $listRow->GoodName ?></td>
            <td><?= htmlspecialchars($listRow->OrderName) ?></td>
            <td><?= \App\Util\HpSplit::phone($listRow->OrderHp) ?></td>
            <td><?= htmlspecialchars($listRow->RecvName) ?></td>
            <td><?= \App\Util\HpSplit::phone($listRow->RecvHp) ?></td>
            <td><?= htmlspecialchars($listRow->RecvAddrNum) . ' ' . htmlspecialchars($listRow->RecvAddr1) . ' ' . htmlspecialchars($listRow->RecvAddr2) ?></td>
            <td><?= number_format($listRow->Price) ?></td>
            <td><?= number_format($listRow->ShipCost) ?></td>
            <td><?= $payMethodList[$listRow->PayMethod] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
