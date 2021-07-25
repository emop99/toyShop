@extends('admin.top')
@section('bodyContent')
    <style>
        .w-200px {
            width: 250px;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">주문 상세 보기</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg" onclick="">
                        저장
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
