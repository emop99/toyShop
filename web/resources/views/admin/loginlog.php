<?php
include base_path('resources/views/admin/') . 'top.php';
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">로그인 내역</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" width="100%" cellspacing="0"
                                   role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <colgroup>
                                    <col width="40%">
                                    <col width="60%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>날짜</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($loginList as $row) {
                                    echo '<tr>
                                            <td>' . $row['Ip'] . '</td>
                                            <td>' . $row['LoginTime'] . '</td>
                                          </tr>';

                                }
                                if (empty($loginList->items())) {
                                    echo '<tr><td colspan="2" style="text-align: center;">내역이 없습니다.</td></tr>';
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?= $loginList->links('pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include base_path('resources/views/admin/') . 'bottom.php';
?>
