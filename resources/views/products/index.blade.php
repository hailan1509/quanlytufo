@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Quản lý</div>
                    <h2 class="page-title">Sản phẩm</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Thêm mới
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>KM (%)</th>
                            <th>Loại</th>
                            <th>Trạng thái</th>
                            <th>Người tạo</th>
                            <th>Cập nhật</th>
                            <th class="w-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    @if($product->thumbnail_path)
                                        <img src="{{ asset('storage/'.$product->thumbnail_path) }}" alt="thumb" class="img-thumbnail" style="max-width: 70px;">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ number_format($product->promotion, 2) }}</td>
                                <td class="text-muted">
                                    {{ $product->categories->pluck('name')->join(', ') }}
                                </td>
                                <td>
                                    <span class="badge {{ $product->status ? 'bg-green' : 'bg-secondary' }}">
                                        {{ $product->status ? 'Hoạt động' : 'Ngưng' }}
                                    </span>
                                </td>
                                <td>{{ $product->createdBy->name ?? '-' }}</td>
                                <td>{{ optional($product->updated_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td>
                                <td class="text-end">
                                    <div class="btn-list flex-nowrap justify-content-end">
                                        <a href="{{ route('products.edit', $product) }}"
                                           class="btn btn-sm btn-outline-primary">Sửa</a>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}"
                                              onsubmit="return confirm('Xoá sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Xoá</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted text-center">Chưa có dữ liệu</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
