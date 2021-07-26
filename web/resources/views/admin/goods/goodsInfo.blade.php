@php
    /** @var \App\Model\Goods $goods */
@endphp
@extends('admin.top')
@section('bodyContent')
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
            <div class="card-body">
                @foreach($goods as $column => $listRow)
                    @php
                        $addClass = '';
                        $disabled = '';
                        if ($column == 'GoodStock' || $column == 'Price' || $column == 'ShipCost') {
                            # 숫자만 입력
                            $addClass .= ' onlyNumber ';
                        }
                        if (isset($notUpdateColumn[$column]) || $column == 'updated_at') {
                            # 수정 불가
                            $disabled = ' disabled ';
                        }
                    @endphp
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text w-200px">
                            {{$goodsColumnNameList[$column]}}
                        </span>
                        </div>
                        <input type="text" class="form-control {{$addClass}}" id="{{$column}}" value="{{$listRow}}" {{$disabled}}>
                    </div>
                @endforeach
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg" onclick="">
                        저장
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
