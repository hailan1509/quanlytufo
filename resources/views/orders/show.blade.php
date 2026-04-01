@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Đơn hàng</div>
                    <h2 class="page-title">#{{ $order->id }}</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('orders.index') }}" class="btn btn-link">Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Khách hàng</h3>
                            <div class="mb-2"><strong>Họ tên:</strong> {{ $order->customer_name }}</div>
                            <div class="mb-2"><strong>SĐT:</strong> {{ $order->customer_phone }}</div>
                            <div class="mb-2"><strong>Địa chỉ:</strong> {{ $order->customer_address }}</div>
                            <div class="mb-2"><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}₫</div>
                            <div class="mb-3">
                                @php
                                    $badge = match($order->status) {
                                        \App\Models\Order::STATUS_PAID => 'bg-green',
                                        \App\Models\Order::STATUS_WAIT_PAYMENT => 'bg-warning',
                                        \App\Models\Order::STATUS_CANCELLED => 'bg-danger',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badge }} text-white">{{ $order->status_label }}</span>
                            </div>
                            <form method="POST" action="{{ route('orders.update', $order) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Cập nhật trạng thái</label>
                                    <select name="status" class="form-select">
                                        @foreach($statusOptions as $key => $label)
                                            <option value="{{ $key }}" {{ (int)$order->status === (int)$key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu trạng thái</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Sản phẩm</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th class="text-end">Đơn giá</th>
                                        <th class="text-end">SL</th>
                                        <th class="text-end">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td class="text-end">{{ number_format($item->price, 0, ',', '.') }}₫</td>
                                            <td class="text-end">{{ $item->quantity }}</td>
                                            <td class="text-end">{{ number_format($item->subtotal, 0, ',', '.') }}₫</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
