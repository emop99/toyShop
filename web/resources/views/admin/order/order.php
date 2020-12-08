<?php

use App\Model\Order;

include base_path('resources/views/admin/') . 'top.php';

/** @var \Illuminate\Contracts\Pagination\Paginator $tableList */

$totalCnt = $tableList->total();
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

    .dropdown-toggle {
        font-size: 12px;
    }
</style>

<script src="/js/Admin/Order.js?<?= CASH ?>"></script>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">주문 관리</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">검색 목록</h6>
        </div>
        <div class="card-body">
            <form id="searchForm">
                <table class="table table-bordered">
                    <colgroup>
                        <col width="10%">
                        <col width="*">
                        <col width="10%">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <td><b>기간</b></td>
                        <td>2020-10-10 ~ 2020-10-10</td>
                        <td>주문 번호</td>
                        <td>2020-10-10 ~ 2020-10-10</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                <div style="display: flex; justify-content: center;">
                    <a href="javascript:;" class="btn btn-primary btn-user btn-block" style="width: 100px;">
                        검색
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">주문 리스트</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    총 : <?= number_format($totalCnt) ?>건
                </div>
            </div>
            <div class="table-responsive" style="white-space: nowrap;">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="allCheckBox" data-name="orderCheck["
                                   onclick="ToyShop.Top.checkBoxAllCheck($(this));">
                        </th>
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
                        <th>상세보기</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 0;
                    foreach ($tableList as $key => $listRow) {
                        /** @var Order $listRow */ ?>
                        <tr data-OrderNum="<?= $listRow->OrderNum ?>">
                            <td>
                                <input type="checkbox" name="orderCheck[<?= $listRow->OrderNum ?>]"
                                       data-OrderNum="<?= $listRow->OrderNum ?>">
                            </td>
                            <td><?= 1 + $totalCnt - $tableList->firstItem() + $key ?></td>
                            <td><?= $listRow->OrderNum ?></td>
                            <td><?= $listRow->created_at ?></td>
                            <td>
                                <div class="dropdown mb-4">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <?= (new Order())->orderStateList()[$listRow->OrderState] ?>
                                    </button>
                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <?php
                                        foreach ((new Order())->orderStateList() as $stateKey => $stateRow) {
                                            if ($listRow->OrderState == $stateKey) {
                                                continue;
                                            } ?>
                                            <a class="dropdown-item" href="javascript:;"
                                               onclick="ToyShop.Order.singleOrderStateChange($(this), <?= $stateKey ?>);"><?= $stateRow ?></a>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                            </td>
                            <td><?= $listRow->GoodName ?></td>
                            <td><?= $listRow->OrderName ?></td>
                            <td><?= $listRow->OrderHp ?></td>
                            <td><?= $listRow->RecvName ?></td>
                            <td><?= $listRow->RecvHp ?></td>
                            <td><?= $listRow->RecvAddr1 . ' ' . $listRow->RecvAddr2 ?></td>
                            <td><?= $listRow->Price ?></td>
                            <td><?= $listRow->ShipCost ?></td>
                            <td><?= (new Order)->payMethodList()[$listRow->PayMethod] ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $cnt++;
                    }
                    if (empty($tableList->items())) {
                        echo '<tr><td colspan="14" class="text-center">조회된 정보가 없습니다.</td></tr>';
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
