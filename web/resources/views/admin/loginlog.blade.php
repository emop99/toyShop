@extends('admin.top')
@section('bodyContent')

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
                                    @foreach($loginList as $row)
                                        <tr>
                                            <td>{{$row['Ip']}}</td>
                                            <td>{{$row['LoginTime']}}</td>
                                        </tr>
                                    @endforeach
                                    @if(empty($loginList->items()))
                                        <tr><td colspan="2" style="text-align: center;">내역이 없습니다.</td></tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$loginList->links('pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
