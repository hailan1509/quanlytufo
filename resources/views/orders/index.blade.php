@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Quản lý</div>
                    <h2 class="page-title">Đơn hàng</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card mb-3">
                <div class="card-body">
                    <form method="GET" action="{{ route('orders.index') }}" class="row g-3 align-items-end">
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label mb-1">Tìm theo tên hoặc SĐT</label>
                            <input type="text" name="q" value="{{ $search }}" class="form-control" placeholder="Nhập tên khách hoặc số điện thoại">
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <label class="form-label mb-1">Trạng thái</label>
                            <select name="status" class="form-select">
                                <option value="">-- Tất cả --</option>
                                @foreach($statusOptions as $key => $label)
                                    <option value="{{ $key }}" {{ isset($status) && (string)$status === (string)$key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button class="btn btn-primary w-100" type="submit">Lọc</button>
                        </div>
                        @if($search || $status !== null && $status !== '')
                            <div class="col-12 col-md-2">
                                <a class="btn btn-outline-danger w-100" href="{{ route('orders.index') }}">Xoá lọc</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Khách hàng</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th class="w-1">Chuyển trạng thái</th>
                            <th class="w-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td class="text-muted">{{ \Illuminate\Support\Str::limit($order->customer_address, 60) }}</td>
                                <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                                <td>
                                    @php
                                        $badge = match($order->status) {
                                            \App\Models\Order::STATUS_PAID => 'bg-green',
                                            \App\Models\Order::STATUS_WAIT_PAYMENT => 'bg-warning',
                                            default => 'bg-secondary',
                                            \App\Models\Order::STATUS_CANCELLED => 'bg-danger',
                                        };
                                    @endphp
                                    <span class="badge {{ $badge }} text-white">{{ $order->status_label }}</span>
                                </td>
                                <td>{{ optional($order->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</td>
                                <td class="text-end">
                                    @php
                                        $nextStatus = match($order->status) {
                                            \App\Models\Order::STATUS_PENDING_CONTACT => \App\Models\Order::STATUS_WAIT_PAYMENT,
                                            \App\Models\Order::STATUS_WAIT_PAYMENT => \App\Models\Order::STATUS_PAID,
                                            default => null,
                                        };
                                    @endphp
                                    <div class="d-flex gap-2 justify-content-end">
                                        @if($order->status !== \App\Models\Order::STATUS_PAID)
                                            <form method="POST" action="{{ route('orders.update', $order) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="{{ $nextStatus ?? $order->status }}">
                                                <button class="btn btn-sm btn-outline-primary"
                                                        {{ $nextStatus === null ? 'disabled' : '' }}>
                                                    {{ $nextStatus === \App\Models\Order::STATUS_PAID ? 'Đã thanh toán' : 'Chờ thanh toán' }}
                                                </button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('orders.update', $order) }}"
                                              onsubmit="return confirm('Huỷ đơn hàng này?');">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="{{ \App\Models\Order::STATUS_CANCELLED }}">
                                            <button class="btn btn-sm btn-outline-danger"
                                                    {{ (int)$order->status === \App\Models\Order::STATUS_CANCELLED ? 'disabled' : '' }}>
                                                Huỷ đơn
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Chưa có đơn hàng</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
