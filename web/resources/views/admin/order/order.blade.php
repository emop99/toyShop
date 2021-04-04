@extends('admin.top')
@section('bodyContent')
    @php
        /** @var \Illuminate\Contracts\Pagination\Paginator $tableList */
        /** @var \App\Model\order\OrderSearch $orderSearch */
    @endphp
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

        .f-s12 {
            font-size: 12px;
        }
    </style>

    <script src="/js/Admin/Order.js?{{CASH}}"></script>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">주문 관리</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">검색 목록</h6>
            </div>
            <div class="card-body">
                <form id="searchForm">
                    <input type="hidden" name="maxPageCnt" id="maxPageCnt" value="{{$orderSearch->maxPageCnt}}">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="10%">
                            <col width="40%">
                            <col width="10%">
                            <col width="40%">
                        </colgroup>
                        <tr>
                            <td><b>주문일</b></td>
                            <td colspan="3">
                                <input type="text" class="form-control h-25 calendar" name="searchDateS" style="width: 35%; display: inline-block;"
                                       value="{{date('Y-m-d', strtotime($orderSearch->searchDateS))}}">
                                ~
                                <input type="text" class="form-control h-25 calendar" name="searchDateE" style="width: 35%; display: inline-block;"
                                       value="{{date('Y-m-d', strtotime($orderSearch->searchDateE))}}">
                            </td>
                        </tr>
                        <tr>
                            <td><b>주문 상태</b></td>
                            <td>
                                <select class="form-control h-25" style="display: unset !important;" name="searchState">
                                    <option value="">전체</option>
                                    @foreach($orderStateList as $value => $name)
                                        <option value="{{$value}}" {{$orderSearch->searchState === $value ? 'selected' : ''}}>{{$name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><b>키워드 검색</b></td>
                            <td>
                                <select class="form-control h-25" style="width: 25%; display: unset !important;" name="searchKey">
                                    <option value="">전체</option>
                                    <option value="OrderName" {{$orderSearch->searchKey == 'OrderName' ? 'selected' : ''}}>주문자명</option>
                                    <option value="OrderHp" {{$orderSearch->searchKey == 'OrderHp' ? 'selected' : ''}}>주문자 핸드폰</option>
                                    <option value="RecvName" {{$orderSearch->searchKey == 'RecvName' ? 'selected' : ''}}>수령인명</option>
                                    <option value="RecvHp" {{$orderSearch->searchKey == 'RecvHp' ? 'selected' : ''}}>수형인 핸드폰</option>
                                    <option value="GoodName" {{$orderSearch->searchKey == 'GoodName' ? 'selected' : ''}}>상품명</option>
                                </select>
                                <input type="text" name="searchText" class="form-control h-25 enterSearch" style="width: 65%; display: unset !important;"
                                       value="{{$orderSearch->searchText}}">
                            </td>
                        </tr>
                        <tr>
                            <td><b>결제 수단</b></td>
                            <td>
                                <select class="form-control h-25" style="display: unset !important;" name="searchPayMethod">
                                    <option value="">전체</option>
                                    @foreach($payMethodList as $value => $name)
                                        <option value="{{$value}}" {{$orderSearch->searchPayMethod === $value ? 'selected' : ''}}>{{$name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><b>주문 번호</b></td>
                            <td>
                                <input type="text" class="form-control h-25 enterSearch" name="searchOrderNo" value="{{$orderSearch->searchOrderNo}}">
                            </td>
                        </tr>
                    </table>
                    <div style="display: flex; justify-content: center;">
                        <a href="javascript:;" class="btn btn-primary btn-user btn-block" style="width: 100px;" onclick="ToyShop.Top.searchBtn();">
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
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-12 col-md-1">
                        총 : {{number_format($tableList->total())}}건
                    </div>
                    <div class="col-sm-12 col-md-1">
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-primary dropdown-toggle f-s12" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                최대 검색 개수
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Top.searchMaxCntBtn(25);">25개</a>
                                <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Top.searchMaxCntBtn(50);">50개</a>
                                <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Top.searchMaxCntBtn(100);">100개</a>
                                <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Top.searchMaxCntBtn(500);">500개</a>
                                <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Top.searchMaxCntBtn(1000);">1000개</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-primary dropdown-toggle f-s12" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                선택주문 상태변경
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                @foreach($orderStateList as $stateKey => $stateRow)
                                    <a class="dropdown-item" href="javascript:;"
                                       onclick="ToyShop.Order.multiOrderStateChange({{$stateKey}});">{{$stateRow}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 text-right">
                        <div class="d-inline-block">
                            <button class="btn btn-primary f-s12" onclick="ToyShop.Top.excelDownBtn();">
                                엑셀 다운로드
                            </button>
                        </div>
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
                            <th>상세보기</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tableList as $key => $listRow)
                            @php
                                /** @var \App\Model\Order $listRow */
                            @endphp
                            <tr data-OrderNum="{{$listRow->OrderNum}}">
                                <td>
                                    <input type="checkbox" name="orderCheck[{{$listRow->OrderNum}}]"
                                           data-OrderNum="{{$listRow->OrderNum}}">
                                </td>
                                <td>{{1 + $tableList->total() - $tableList->firstItem() + $key}}</td>
                                <td>{{$listRow->OrderNum}}</td>
                                <td>{{$listRow->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            {{$orderStateList[$listRow->OrderState]}}
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                            @foreach($orderStateList as $stateKey => $stateRow)
                                                @if($listRow->OrderState != $stateKey)
                                                    <a class="dropdown-item" href="javascript:;"
                                                       onclick="ToyShop.Order.singleOrderStateChange($(this), {{$stateKey}});">{{$stateRow}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>{{$listRow->ShipNum}}</td>
                                <td>{{$listRow->GoodName}}</td>
                                <td>{{htmlspecialchars($listRow->OrderName)}}</td>
                                <td>{{\App\Util\HpSplit::phone($listRow->OrderHp)}}</td>
                                <td>{{htmlspecialchars($listRow->RecvName)}}</td>
                                <td>{{\App\Util\HpSplit::phone($listRow->RecvHp)}}</td>
                                <td>{{htmlspecialchars($listRow->RecvAddrNum) . ' ' . htmlspecialchars($listRow->RecvAddr1) . ' ' . htmlspecialchars($listRow->RecvAddr2)}}</td>
                                <td>{{number_format($listRow->Price)}}</td>
                                <td>{{number_format($listRow->ShipCost)}}</td>
                                <td>{{$payMethodList[$listRow->PayMethod]}}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-info btn-circle btn-sm" onclick="ToyShop.Order.orderDetailViewBtn('{{$listRow->OrderNum}}')">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if(empty($tableList->items()))
                            <tr>
                                <td colspan="15" class="text-center">조회된 정보가 없습니다.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$tableList->links('pagination')}}
            </div>
        </div>
    </div>

@endsection
