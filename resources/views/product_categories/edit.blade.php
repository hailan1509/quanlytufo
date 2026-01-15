@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Quản lý</div>
                    <h2 class="page-title">Sửa loại sản phẩm</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('product-categories.index') }}" class="btn btn-link">Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('product-categories.update', $category) }}">
                        @csrf
                        @method('PUT')
                        @include('product_categories._form', ['category' => $category])
                        <div class="mt-3 text-muted">
                            Mã: <span class="fw-bold">{{ $category->code }}</span>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('product-categories.index') }}" class="btn btn-link">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
