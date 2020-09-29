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
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                   role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>날짜</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($loginList['data'] as $listRow) {
                                    echo '<tr>
                                <td>' . $listRow['Ip'] . '</td>
                                <td>' . $listRow['LoginTime'] . '</td>
                              </tr>';
                                }
                                if (empty($loginList['data'])) {
                                    echo '<tr><td colspan="2" style="text-align: center;">내역이 없습니다.</td></tr>';
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    if (!empty($loginList['data'])) { ?>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing 1
                                    to 10 of 57 entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                            <a
                                                href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                                                        aria-controls="dataTable"
                                                                                        data-dt-idx="1" tabindex="0"
                                                                                        class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                  data-dt-idx="2" tabindex="0"
                                                                                  class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                  data-dt-idx="3" tabindex="0"
                                                                                  class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                  data-dt-idx="4" tabindex="0"
                                                                                  class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                  data-dt-idx="5" tabindex="0"
                                                                                  class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                                                                  data-dt-idx="6" tabindex="0"
                                                                                  class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                                                                                          aria-controls="dataTable"
                                                                                                          data-dt-idx="7"
                                                                                                          tabindex="0"
                                                                                                          class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include base_path('resources/views/admin/') . 'bottom.php';
?>
