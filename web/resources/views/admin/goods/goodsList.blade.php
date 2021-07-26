@extends('admin.top')
@section('bodyContent')
    @php
    /** @var \App\Search\GoodsSearch $goodsSearch */
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

    <script src="/js/Admin/Goods.js?{{CASH}}"></script>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">상품 관리</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">검색 목록</h6>
            </div>
            <div class="card-body">
                <form id="searchForm">
                    <input type="hidden" name="maxPageCnt" id="maxPageCnt" value="{{$goodsSearch->maxPageCnt}}">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="10%">
                            <col width="40%">
                            <col width="10%">
                            <col width="40%">
                        </colgroup>
                        <tr>
                            <td><b>등록</b></td>
                            <td colspan="3">
                                <input type="text" class="form-control h-25 calendar" name="searchDateS" style="width: 35%; display: inline-block;"
                                       value="{{$goodsSearch->searchDateS ? date('Y-m-d', strtotime($goodsSearch->searchDateS)) : ''}}">
                                ~
                                <input type="text" class="form-control h-25 calendar" name="searchDateE" style="width: 35%; display: inline-block;"
                                       value="{{$goodsSearch->searchDateE ? date('Y-m-d', strtotime($goodsSearch->searchDateE)) : ''}}">
                            </td>
                        </tr>
                        <tr>
                            <td><b>키워드 검색</b></td>
                            <td>
                                <select class="form-control h-25" style="width: 25%; display: unset !important;" name="searchKey">
                                    <option value="">전체</option>
                                    <option value="GoodName" {{$goodsSearch->searchKey == 'GoodName' ? 'selected' : ''}}>상품명</option>
                                    <option value="KeyWord" {{$goodsSearch->searchKey == 'KeyWord' ? 'selected' : ''}}>검색 키워드</option>
                                </select>
                                <input type="text" name="searchText" class="form-control h-25 enterSearch" style="width: 65%; display: unset !important;"
                                       value="{{$goodsSearch->searchText}}">
                            </td>
                            <td><b>상품 판매 상태</b></td>
                            <td>
                                <select class="form-control h-25" style="display: unset !important;" name="searchState">
                                    <option value="">전체</option>
                                    @foreach($goodsStateList as $value => $name)
                                        <option value="{{$value}}" {{$goodsSearch->searchState == $value}}>{{$name}}</option>
                                    @endforeach
                                </select>
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
                <h6 class="m-0 font-weight-bold text-primary">상품 리스트</h6>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-12 col-md-1">
                        총 : {{number_format($tableList->total())}}건
                    </div>
                    <div class="col-sm-12 col-md-1">
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-primary dropdown-toggle f-s12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                상품 상태변경
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                @foreach($goodsStateList as $value => $name)
                                    <a class="dropdown-item" href="javascript:;" onclick="ToyShop.Goods.multiGoodsStateChange({{$value}});">{{$name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="white-space: nowrap;">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="allCheckBox" data-name="goodsCheck["
                                       onclick="ToyShop.Top.checkBoxAllCheck($(this));">
                            </th>
                            <th>No</th>
                            <th>상품명</th>
                            <th>판매 상태</th>
                            <th>상품 가격</th>
                            <th>재고 수량</th>
                            <th>배송비</th>
                            <th>등록일</th>
                            <th>수정일</th>
                            <th>상세보기</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tableList as $key => $listRow)
                            @php
                                /** @var \App\Model\Goods $listRow */
                            @endphp
                            <tr>
                                <td><input type="checkbox" name="goodsCheck[{{$listRow->No}}]" data-goodsnum="{{$listRow->No}}"></td>
                                <td>{{$listRow->No}}</td>
                                <td>{{$listRow->GoodName}}</td>
                                <td>{{$goodsStateList[$listRow->State]}}</td>
                                <td>{{number_format($listRow->Price)}}</td>
                                <td>{{number_format($listRow->GoodStock)}}</td>
                                <td>{{number_format($listRow->ShipCost)}}</td>
                                <td>{{$listRow->created_at}}</td>
                                <td>{{$listRow->updated_at}}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-info btn-circle btn-sm" onclick="ToyShop.Goods.goodsDetailViewBtn('{{$listRow->No}}')">
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
