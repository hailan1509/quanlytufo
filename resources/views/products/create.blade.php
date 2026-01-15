@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Quản lý</div>
                    <h2 class="page-title">Thêm sản phẩm</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('products.index') }}" class="btn btn-link">Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('products._form')
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('products.index') }}" class="btn btn-link">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
