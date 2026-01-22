@extends('tablar::auth.layout')

@section('content')
    <style>
        body { background: radial-gradient(circle at 20% 20%, #ffe1d2, #f2f5ff 40%, #e4ecff); }
        .login-card {
            border: none;
            box-shadow: 0 20px 70px rgba(0,0,0,0.12);
            border-radius: 16px;
            overflow: hidden;
        }
        .brand-circle {
            width: 88px; height: 88px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 14px 30px rgba(0,0,0,0.10);
            display: grid; place-items: center;
            margin: 0 auto 18px;
        }
    </style>
    <div class="page page-center">
        <div class="container-tight py-4" style="max-width: 420px;">
            <div class="text-center mb-4">
                <div class="brand-circle">
                    <img src="{{ asset('assets/tablar-logo.jpg') }}" alt="TUFO" style="max-width: 60px; max-height: 60px;">
                </div>
                <div class="h2 mb-0 fw-bold text-uppercase">Quản lý TUFO</div>
            </div>
            <form class="card card-md login-card" action="{{ route('login') }}" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" required autocomplete="current-password">
                        @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
@endsection
