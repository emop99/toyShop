<?php

use App\Model\Order;

include base_path('resources/views/admin/') . 'top.php';
?>
<style>
    .container-fluid table {
        font-size: 13px;
    }

    table th {
        text-align: center;
    }

    table td {
        text-align: center;
    }
</style>

<script src="/js/Admin/Order.js?<?= CASH ?>"></script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">주문 관리</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        총 : <?= number_format($tableList->total()) ?>건
                    </div>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>주문 번호</th>
                        <th>주문 날짜</th>
                        <th>주문 상태</th>
                        <th>상품명</th>
                        <th>주문자</th>
                        <th>주문자 핸드폰번호</th>
                        <th>수령인</th>
                        <th>수령인 핸드폰번호</th>
                        <th>주소</th>
                        <th>금액</th>
                        <th>배송비</th>
                        <th>결제수단</th>
                        <th>관리</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tableList as $listRow) {
                        /** @var Order $listRow */ ?>
                        <tr>
                            <td>0</td>
                            <td><?= $listRow->OrderNum ?></td>
                            <td><?= $listRow->created_at ?></td>
                            <td><?= (new Order())->orderStateList()[$listRow->OrderState] ?></td>
                            <td><?= $listRow->GoodName ?></td>
                            <td><?= $listRow->OrderName ?></td>
                            <td><?= $listRow->OrderHp ?></td>
                            <td><?= $listRow->RecvName ?></td>
                            <td><?= $listRow->RecvHp ?></td>
                            <td><?= $listRow->RecvAddr1 . ' ' . $listRow->RecvAddr2 ?></td>
                            <td><?= $listRow->Price ?></td>
                            <td><?= $listRow->ShipCost ?></td>
                            <td><?= (new Order)->payMethodList()[$listRow->PayMethod] ?></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    if (empty($tableList->items())) {
                        echo '<tr><td colspan="99" class="text-center">조회된 정보가 없습니다.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?= $tableList->links('pagination') ?>
        </div>
    </div>

</div>

<?php
include base_path('resources/views/admin/') . 'bottom.php';
?>
