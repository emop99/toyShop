@php
    /** @var \App\Model\Goods $goods */
@endphp
@extends('admin.top')
@section('bodyContent')

    <script charset="utf-8" src="/smartEditor/js/service/HuskyEZCreator.js" type="text/javascript"></script>

    <style>
        .w-200px {
            width: 250px;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">상품 상세 보기</h1>
        </div>

        <div class="card">
            <form enctype="multipart/form-data" id="goodsInfoForm" method="post" target="tempIframe">
                @csrf
                <input type="hidden" name="mode" value="modifySave">
                <input type="hidden" name="goodNo" value="{{$goods['No']}}">
                <div class="card-body">
                    @foreach($goods as $column => $listRow)
                        @php
                            $addClass = '';
                            $disabled = '';
                            $passColumn = false;
                            $modify = false;
                            if ($column == 'GoodStock' || $column == 'Price' || $column == 'ShipCost') {
                                # 숫자만 입력
                                $addClass .= ' onlyNumber ';
                            }
                            if (isset($notUpdateColumn[$column]) || $column == 'updated_at') {
                                # 수정 불가
                                $disabled = ' disabled ';
                            }
                            if ($column == 'GoodContent') {
                                # 미생성
                                $passColumn = true;
                            }
                        @endphp
                        @if(!$passColumn)
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text w-200px">
                                {{$goodsColumnNameList[$column]}}
                            </span>
                                </div>
                                <input type="text" class="form-control {{$addClass}}" id="{{$column}}" name="{{!$disabled ? $column : ''}}" value="{{$listRow}}" {{$disabled}}>
                            </div>
                        @endif
                    @endforeach
                    <div class="input-group mb-3">
                        <label for="GoodContent"></label><textarea id="GoodContent" name="GoodContent" style="width: 100%">{{$goods['GoodContent']}}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-lg" onclick="ToyShop.GoodsInfo.saveBtn();">
                            저장
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/Admin/Goods/GoodsInfo.js?v={{CASH}}"></script>
@endsection
