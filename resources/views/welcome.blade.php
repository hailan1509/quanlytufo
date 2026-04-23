<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOFU TỔNG KHO SỈ</title>
    <meta name="description" content="TOFU tổng kho sỉ đồ chơi trẻ em, vật dụng gia đình, đồ lưu niệm. Tìm kiếm sản phẩm nhanh, giá tốt, giao diện thân thiện di động.">
    <meta name="keywords" content="TOFU, tổng kho sỉ, đồ chơi trẻ em, vật dụng gia đình, đồ lưu niệm, sản phẩm giá sỉ">
    <meta property="og:title" content="TOFU tổng kho sỉ đồ chơi trẻ em, vật dụng gia đình, đồ lưu niệm">
    <meta property="og:description" content="Xem và tìm kiếm sản phẩm nhanh chóng trên TOFU: đồ chơi trẻ em, đồ gia đình, đồ lưu niệm, giá sỉ.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/tablar-logo.jpg') }}">
    <meta property="og:image:alt" content="TOFU tổng kho hàng gia dụng - Đồ chơi">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="TOFU tổng kho sỉ đồ chơi trẻ em, vật dụng gia đình, đồ lưu niệm">
    <meta name="twitter:description" content="Tìm kiếm sản phẩm nhanh, giá sỉ, giao diện thân thiện di động.">
    <meta name="twitter:image" content="{{ asset('assets/tablar-logo.jpg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;800&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: bisque;
        }

        /* .container { margin: 30px auto; } */
        .navbar-nav .nav-link {
            color: #000 !important;
            padding: 0.5rem 0rem !important;
            border-color: transparent;
            margin-left: 1.5rem;
            transition: none;
        }

        .navbar .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-nav .nav-link.active,
        .border-red {
            border-bottom: 3px solid #b71c1c;
        }

        .navbar-nav .nav-link:hover {
            border-bottom: 3px solid #b71c1c;
        }

        .product-item {
            height: 430px;
            border: 1px solid #e5e5e5;
            overflow: hidden;
            position: relative;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .product-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .product-item .product {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .product-item .product img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-item .product .icons {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
        }

        .product-item .product .icons .icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.65);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.6s ease, background-color .2s ease;
            transform: rotate(180deg);
            cursor: pointer;
        }

        .product-item .product .icons .icon:hover {
            background-color: rgba(183, 28, 28, 0.8);
            color: #fff;
        }

        .product-item .product .icons .icon:nth-last-of-type(3) {
            transition-delay: 0.2s;
        }

        .product-item .product .icons .icon:nth-last-of-type(2) {
            transition-delay: 0.15s;
        }

        .product-item .product .icons .icon:nth-last-of-type(1) {
            transition-delay: 0.1s;
        }

        .product-item:hover .product .icons .icon {
            transform: translateY(-60px);
        }

        .product-item .tag {
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 500;
            position: absolute;
            top: 10px;
            left: 20px;
            padding: 0 0.4rem;
        }

        .product-item .title {
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            text-align: center;
            height: 44px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-item .fa-star {
            font-size: 0.65rem;
            color: goldenrod;
        }

        .product-item .price {
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .fw-800 {
            font-weight: 800;
        }

        .bg-green {
            background-color: #208f20 !important;
            color: #fff;
        }

        .bg-black {
            background-color: #1f1d1d;
            color: #fff;
        }

        .bg-red {
            background-color: #bb3535;
            color: #fff;
        }

        .color-red {
            color: rgb(253, 75, 5);
        }

        .floating-cart-btn {
            position: fixed;
            right: 16px;
            bottom: 18px;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.18);
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity .2s ease, transform .2s ease;
        }

        .floating-cart-btn.show {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        @media (max-width: 576px) {
            .floating-cart-btn {
                width: 48px;
                height: 48px;
                right: 12px;
                bottom: 14px;
            }
        }

        .form-error {
            color: #dc3545;
            font-size: 0.85rem;
        }

        .floating-top-btn {
            position: fixed;
            right: 16px;
            bottom: 82px;
            z-index: 1049;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.18);
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity .2s ease, transform .2s ease;
        }

        .floating-top-btn.show {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        @media (max-width: 576px) {
            .floating-top-btn {
                right: 12px;
                bottom: 72px;
                width: 42px;
                height: 42px;
            }
        }

        .search-animated {
            position: relative;
            max-width: 480px;
            margin: 12px auto 8px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .search-animated input {
            width: 100%;
            padding: 10px 44px 10px 14px;
            border: 1px solid #e5e5e5;
            border-radius: 999px;
            outline: none;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
            transition: box-shadow .2s ease, border-color .2s ease;
        }

        .search-animated input:focus {
            border-color: #b71c1c;
            box-shadow: 0 10px 20px rgba(183, 28, 28, 0.12);
        }

        .search-animated button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: #b71c1c;
            color: #fff;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .search-animated button:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 8px 16px rgba(183, 28, 28, 0.25);
            background: #e63c3c;
        }

        @media (max-width: 767.5px) {
            .product-item {
                height: 260px;
            }

            .product-item .product {
                height: 150px;
            }

            .navbar-nav .nav-link.active,
            .navbar-nav .nav-link:hover {
                background-color: #b71c1c;
                color: #fff !important;
            }

            .navbar-nav .nav-link {
                border: 3px solid transparent;
                margin: 0.8rem 0;
                display: flex;
                border-radius: 10px;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container bg-white">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid p-0">
                <a class="navbar-brand text-uppercase fw-800 color-red" href="{{ route('welcome') }}"><span class="border-red pe-2 color-red">TUFO TỔNG KHO</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="myNav">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link {{ request('category') ? '' : 'active' }}" href="{{ route('welcome', array_filter(['q' => request('q')])) }}">Tất cả</a>
                        @foreach($categories as $cat)
                        <a class="nav-link {{ (int)request('category') === $cat->id ? 'active' : '' }}"
                            href="{{ route('welcome', array_filter(['category' => $cat->id, 'q' => request('q')])) }}">
                            {{ $cat->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </nav>

        <div class="search-animated">
            <form method="GET" action="{{ route('welcome') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm sản phẩm..." aria-label="Tìm sản phẩm">
                <button type="submit"><span class="fas fa-search"></span></button>
            </form>
        </div>
        <div class="d-flex justify-content-end align-items-center mb-2 pe-1">
            <button type="button"
                class="btn btn-sm btn-outline-dark position-relative d-flex align-items-center justify-content-center"
                id="open-cart"
                aria-label="Xem giỏ hàng">
                <span class="fas fa-shopping-bag"></span>
                <span id="cart-count"
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                </span>
            </button>
        </div>

        <div class="row" id="product-list">
            @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center justify-content-center product-item my-3">
                @php
                $imgUrl = app()->environment('production')
                ? asset('storage/'.$product->thumbnail_path)
                : 'https://tongkhotufo.com/storage/'.$product->thumbnail_path;
                $finalPrice = $product->promotion > 0
                ? $product->price * (1 - $product->promotion / 100)
                : $product->price;
                @endphp
                <div class="product">
                    <img class="lazy-img"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                        data-src="{{ $imgUrl }}"
                        alt="{{ $product->name }}"
                        loading="lazy"
                        decoding="async">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <!-- <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li> -->
                        <!-- <li class="icon mx-3"><span class="far fa-heart"></span></li> -->
                        <li class="icon mx-3 add-to-cart"
                            data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}"
                            data-price="{{ $finalPrice }}"
                            data-image="{{ $imgUrl }}">
                            <span class="fas fa-shopping-bag"></span>
                        </li>
                    </ul>
                </div>
                @if($product->promotion > 0)
                <div class="tag bg-red">sale -{{ number_format($product->promotion, 0) }}%</div>
                @else
                <div class="tag {{ $product->status ? 'bg-green' : 'bg-black' }}">{{ $product->status ? 'new' : 'ngưng' }}</div>
                @endif
                <a class="title pt-4 pb-1 text-center d-block text-decoration-none text-dark"
                    href="{{ route('product.detail', $product) }}">
                    {{ $product->name }}
                </a>
                <div class="price">
                    <span class="fw-bold text-danger">{{ number_format($finalPrice, 0, ',', '.') }}₫</span>
                    @if($product->promotion > 0)
                    <small class="text-muted text-decoration-line-through ms-1">{{ number_format($product->price, 0, ',', '.') }}₫</small>
                    @endif
                </div>
                <a class="btn btn-sm w-100 mt-auto position-relative overflow-hidden"
                    style="border-radius: 12px; font-weight: 700; letter-spacing: 0.3px; color:#fff; background:#ee4d2d; border:1px solid #adadad; padding: 6px 10px; height: 36px; line-height: 22px; margin-bottom: 5px;"
                    href="{{ route('product.detail', $product) }}">
                    <span class="position-relative" style="z-index:2;">Xem chi tiết</span>
                    <span class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(135deg, rgba(238,77,45,0.15), rgba(238,77,45,0.08)); z-index:1; border:1px solid rgba(0,0,0,0.05); border-radius: 12px;"></span>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-4">Không có sản phẩm.</div>
            @endforelse
        </div>

        <div class="row">
            @php
                $apiNext = $products->hasMorePages()
                    ? url('/api/products') . '?' . http_build_query(array_filter([
                        'page' => $products->currentPage() + 1,
                        'q' => request('q'),
                        'category' => request('category'),
                    ], fn($v) => $v !== null && $v !== ''))
                    : '';
            @endphp
            <div class="col-12 text-center py-3" id="load-more" data-next="{{ $apiNext }}">
                <span class="text-muted small" id="load-more-text">{{ $apiNext ? 'Kéo xuống để tải thêm...' : 'Đã hết sản phẩm' }}</span>
            </div>
        </div>

        <!-- @if ($products->hasPages())
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    @endif -->
    </div>

    <!-- Cart modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <h5 class="modal-title mb-0" id="cartModalLabel">Giỏ hàng</h5>
                        <button type="button" class="btn btn-sm btn-outline-danger" id="clear-cart">Xoá giỏ</button>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div id="cart-items" class="d-flex flex-column gap-3 small"></div>
                    <hr>
                    <button type="button" class="btn btn-outline-secondary btn-sm mb-2" id="toggle-checkout-info">
                        Thông tin thanh toán
                    </button>
                    <div id="checkout-info" class="d-none">
                        <div class="mb-2">
                            <label class="form-label mb-1">Họ tên *</label>
                            <input type="text" class="form-control form-control-sm" id="checkout-name" placeholder="Nhập họ tên">
                            <div class="form-error d-none" data-error-for="checkout-name"></div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-1">Số điện thoại *</label>
                            <input type="tel" class="form-control form-control-sm" id="checkout-phone" placeholder="VD: 098xxxxxxx">
                            <div class="form-error d-none" data-error-for="checkout-phone"></div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-1">Địa chỉ *</label>
                            <textarea class="form-control form-control-sm" rows="2" id="checkout-address" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành"></textarea>
                            <div class="form-error d-none" data-error-for="checkout-address"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex flex-column align-items-stretch gap-2">
                    <div class="w-100 d-flex justify-content-between fw-semibold">
                        <span>Tổng</span>
                        <span id="cart-total">0₫</span>
                    </div>
                    <div class="d-flex w-100 gap-2">
                        <button type="button" class="btn btn-outline-secondary flex-fill" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary flex-fill" id="checkout-btn">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating cart button -->
    <button type="button"
        class="btn btn-dark floating-cart-btn position-fixed"
        id="open-cart-floating"
        aria-label="Xem giỏ hàng nhanh">
        <span class="fas fa-shopping-bag"></span>
        <span id="cart-count-floating"
            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            0
        </span>
    </button>
    <button type="button"
        class="btn btn-outline-secondary floating-top-btn"
        id="scroll-top-btn"
        aria-label="Lên đầu trang">
        <span class="fas fa-arrow-up"></span>
    </button>

    <!-- Order success modal -->
    <div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đặt hàng thành công</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fw-semibold mb-1">Mã đơn hàng: <span id="order-success-id" class="text-danger"></span></p>
                    <p class="mb-0 text-muted">Vui lòng để ý điện thoại, TUFO sẽ liên hệ lại ngay.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        (function() {
            const images = document.querySelectorAll('.lazy-img');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            const src = img.getAttribute('data-src');
                            if (src) img.src = src;
                            obs.unobserve(img);
                        }
                    });
                }, {
                    rootMargin: '100px'
                });
                images.forEach(img => observer.observe(img));
            } else {
                images.forEach(img => {
                    const src = img.getAttribute('data-src');
                    if (src) img.src = src;
                });
            }
        })();
    </script>
    <script>
        (() => {
            const listEl = document.getElementById('product-list');
            const loadMoreEl = document.getElementById('load-more');
            const loadMoreText = document.getElementById('load-more-text');
            if (!listEl || !loadMoreEl) return;

            let loading = false;
            const placeholder = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

            const attachLazy = (img) => {
                if (img.dataset.boundLazy) return;
                img.dataset.boundLazy = '1';
                img.classList.add('lazy-img');
                img.src = placeholder;
                const src = img.getAttribute('data-src');
                if (!src) return;
                if ('IntersectionObserver' in window) {
                    const obs = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                img.src = src;
                                observer.unobserve(img);
                            }
                        });
                    }, {
                        rootMargin: '100px'
                    });
                    obs.observe(img);
                } else {
                    img.src = src;
                }
            };

            const renderMore = (html) => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newItems = doc.querySelectorAll('#product-list > div');
                newItems.forEach(item => {
                    listEl.appendChild(item);
                    const img = item.querySelector('img[data-src]');
                    if (img) attachLazy(img);
                });
                const next = doc.getElementById('load-more')?.dataset.next;
                loadMoreEl.dataset.next = next || '';
                loadMoreText.textContent = next ? 'Kéo xuống để tải thêm...' : 'Đã hết sản phẩm';
                if (!next) observer.disconnect();
            };

            const formatPrice = (n) => {
                const num = Number(n) || 0;
                return new Intl.NumberFormat('vi-VN').format(num) + '₫';
            };

            const escapeHtml = (s) => String(s ?? '').replace(/[&<>"']/g, (c) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            } [c]));

            const renderMoreJson = (payload) => {
                const items = Array.isArray(payload?.data) ? payload.data : [];
                items.forEach((p) => {
                    const promo = Number(p.promotion) || 0;
                    const status = !!p.status;
                    const tagHtml = promo > 0
                        ? `<div class="tag bg-red">sale -${Math.round(promo)}%</div>`
                        : `<div class="tag ${status ? 'bg-green' : 'bg-black'}">${status ? 'new' : 'ngưng'}</div>`;

                    const priceHtml = promo > 0
                        ? `<span class="fw-bold text-danger">${formatPrice(p.final_price)}</span>
                           <small class="text-muted text-decoration-line-through ms-1">${formatPrice(p.price)}</small>`
                        : `<span class="fw-bold text-danger">${formatPrice(p.final_price ?? p.price)}</span>`;

                    const col = document.createElement('div');
                    col.className = 'col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center justify-content-center product-item my-3';
                    col.innerHTML = `
                        <div class="product">
                            <img class="lazy-img"
                                src="${placeholder}"
                                data-src="${escapeHtml(p.thumbnail_url)}"
                                alt="${escapeHtml(p.name)}"
                                loading="lazy"
                                decoding="async">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                                <li class="icon mx-3 add-to-cart"
                                    data-id="${escapeHtml(p.id)}"
                                    data-name="${escapeHtml(p.name)}"
                                    data-price="${escapeHtml(p.final_price)}"
                                    data-image="${escapeHtml(p.thumbnail_url)}">
                                    <span class="fas fa-shopping-bag"></span>
                                </li>
                            </ul>
                        </div>
                        ${tagHtml}
                        <a class="title pt-4 pb-1 text-center d-block text-decoration-none text-dark"
                            href="${escapeHtml(p.detail_url)}">
                            ${escapeHtml(p.name)}
                        </a>
                        <div class="price">
                            ${priceHtml}
                        </div>
                        <a class="btn btn-sm w-100 mt-auto position-relative overflow-hidden"
                            style="border-radius: 12px; font-weight: 700; letter-spacing: 0.3px; color:#fff; background:#ee4d2d; border:1px solid #adadad; padding: 6px 10px; height: 36px; line-height: 22px; margin-bottom: 5px;"
                            href="${escapeHtml(p.detail_url)}">
                            <span class="position-relative" style="z-index:2;">Xem chi tiết</span>
                            <span class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: linear-gradient(135deg, rgba(238,77,45,0.15), rgba(238,77,45,0.08)); z-index:1; border:1px solid rgba(0,0,0,0.05); border-radius: 12px;"></span>
                        </a>
                    `;
                    listEl.appendChild(col);
                    const img = col.querySelector('img[data-src]');
                    if (img) attachLazy(img);
                });

                const next = payload?.next_page_url || '';
                loadMoreEl.dataset.next = next;
                loadMoreText.textContent = next ? 'Kéo xuống để tải thêm...' : 'Đã hết sản phẩm';
                if (!next) observer.disconnect();
            };

            const fetchMore = () => {
                const next = loadMoreEl.dataset.next;
                if (!next || loading) return;
                loading = true;
                loadMoreText.textContent = 'Đang tải...';
                fetch(next, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(async (res) => {
                        const contentType = res.headers.get('content-type') || '';
                        const raw = await res.text();
                        if (!res.ok) {
                            throw new Error('HTTP ' + res.status);
                        }
                        if (contentType.includes('application/json')) {
                            return JSON.parse(raw || '{}');
                        }
                        // Backward compatible: if API is misconfigured and returns HTML
                        return raw;
                    })
                    .then((data) => {
                        if (typeof data === 'string') {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(data, 'text/html');
                            const hasList = !!doc.getElementById('product-list');
                            const hasLoadMore = !!doc.getElementById('load-more');
                            if (!hasList || !hasLoadMore) {
                                throw new Error('Invalid response HTML');
                            }
                            renderMore(data);
                            return;
                        }
                        renderMoreJson(data);
                    })
                    .catch((err) => {
                        console.error('Load more failed:', err);
                        loadMoreText.textContent = 'Lỗi tải thêm';
                    })
                    .finally(() => {
                        loading = false;
                    });
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) fetchMore();
                });
            }, {
                rootMargin: '200px'
            });

            observer.observe(loadMoreEl);
        })();
    </script>
    <script>
        (() => {
            const STORAGE_KEY = 'tufo_cart_items';
            const cartCountEl = document.getElementById('cart-count');
            const openCartBtn = document.getElementById('open-cart');
            const floatingCartBtn = document.getElementById('open-cart-floating');
            const scrollTopBtn = document.getElementById('scroll-top-btn');
            const cartModalEl = document.getElementById('cartModal');
            const cartItemsEl = document.getElementById('cart-items');
            const cartTotalEl = document.getElementById('cart-total');
            const clearCartBtn = document.getElementById('clear-cart');
            const checkoutBtn = document.getElementById('checkout-btn');
            const toggleCheckoutInfoBtn = document.getElementById('toggle-checkout-info');
            const checkoutInfoBox = document.getElementById('checkout-info');
            const orderSuccessModalEl = document.getElementById('orderSuccessModal');
            const orderSuccessIdEl = document.getElementById('order-success-id');
            const orderSuccessModal = orderSuccessModalEl ? new bootstrap.Modal(orderSuccessModalEl) : null;
            const checkoutNameEl = document.getElementById('checkout-name');
            const checkoutPhoneEl = document.getElementById('checkout-phone');
            const checkoutAddressEl = document.getElementById('checkout-address');
            const modalInstance = cartModalEl ? new bootstrap.Modal(cartModalEl) : null;

            const loadCart = () => {
                try {
                    return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
                } catch (e) {
                    return [];
                }
            };

            const saveCart = (items) => {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
            };

            const formatPrice = (n) => {
                const num = Number(n) || 0;
                return new Intl.NumberFormat('vi-VN').format(num) + '₫';
            };

            const updateCount = () => {
                const total = loadCart().reduce((sum, item) => sum + (Number(item.qty) || 0), 0);
                if (cartCountEl) cartCountEl.textContent = total;
                const floatingBadge = document.getElementById('cart-count-floating');
                if (floatingBadge) floatingBadge.textContent = total;
            };

            const renderCart = () => {
                if (!cartItemsEl || !cartTotalEl) return;
                const items = loadCart();
                if (!items.length) {
                    cartItemsEl.innerHTML = '<div class="text-center text-muted">Giỏ hàng trống</div>';
                    cartTotalEl.textContent = '0₫';
                    return;
                }
                let total = 0;
                cartItemsEl.innerHTML = '';
                items.forEach(item => {
                    const lineTotal = (Number(item.price) || 0) * (Number(item.qty) || 0);
                    total += lineTotal;
                    const row = document.createElement('div');
                    row.className = 'd-flex align-items-center gap-2';
                    row.innerHTML = `
                    <img src="${item.image || ''}" alt="${item.name}" class="rounded" style="width:48px;height:48px;object-fit:cover;">
                    <div class="flex-grow-1">
                        <div class="fw-semibold">${item.name}</div>
                        <div class="text-muted">SL: ${item.qty} x ${formatPrice(item.price)}</div>
                    </div>
                    <div class="text-end">
                        <div class="fw-semibold">${formatPrice(lineTotal)}</div>
                        <button class="btn btn-sm btn-link text-danger p-0 remove-cart-item" data-id="${item.id}">Xoá</button>
                    </div>
                `;
                    cartItemsEl.appendChild(row);
                });
                cartTotalEl.textContent = formatPrice(total);
            };

            const removeItem = (id) => {
                const items = loadCart().filter(i => Number(i.id) !== Number(id));
                saveCart(items);
                updateCount();
                renderCart();
            };

            const setError = (field, message) => {
                const err = document.querySelector(`[data-error-for="${field.id}"]`);
                if (!err) return;
                if (message) {
                    err.textContent = message;
                    err.classList.remove('d-none');
                } else {
                    err.textContent = '';
                    err.classList.add('d-none');
                }
            };

            const showCheckoutInfo = () => {
                if (!checkoutInfoBox) return;
                checkoutInfoBox.classList.remove('d-none');
            };

            const toggleCheckoutInfo = () => {
                if (!checkoutInfoBox) return;
                checkoutInfoBox.classList.toggle('d-none');
            };

            const validateForm = () => {
                let valid = true;
                const name = checkoutNameEl?.value.trim() || '';
                const phone = checkoutPhoneEl?.value.trim() || '';
                const address = checkoutAddressEl?.value.trim() || '';

                if (checkoutNameEl) {
                    if (!name) {
                        setError(checkoutNameEl, 'Vui lòng nhập họ tên');
                        valid = false;
                    } else setError(checkoutNameEl, '');
                }
                if (checkoutPhoneEl) {
                    const phoneOk = /^0\d{9,10}$/.test(phone);
                    if (!phone) {
                        setError(checkoutPhoneEl, 'Vui lòng nhập số điện thoại');
                        valid = false;
                    } else if (!phoneOk) {
                        setError(checkoutPhoneEl, 'Số điện thoại không hợp lệ');
                        valid = false;
                    } else setError(checkoutPhoneEl, '');
                }
                if (checkoutAddressEl) {
                    if (!address) {
                        setError(checkoutAddressEl, 'Vui lòng nhập địa chỉ');
                        valid = false;
                    } else setError(checkoutAddressEl, '');
                }
                if (!valid) showCheckoutInfo();
                return valid ? {
                    name,
                    phone,
                    address
                } : null;
            };

            const handleCheckout = () => {
                const cart = loadCart();
                if (!cart.length) {
                    alert('Giỏ hàng đang trống.');
                    return;
                }
                showCheckoutInfo();
                const info = validateForm();
                if (!info) return;

                const payload = {
                    customer: info,
                    items: cart.map(i => ({
                        id: i.id,
                        name: i.name,
                        price: i.price,
                        qty: i.qty,
                    })),
                };

                checkoutBtn?.setAttribute('disabled', 'disabled');
                checkoutBtn?.classList.add('disabled');
                fetch('/api/orders', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify(payload),
                    })
                    .then(async res => {
                        const data = await res.json().catch(() => ({}));
                        if (!res.ok) {
                            const msg = data.message || 'Không thể tạo đơn hàng.';
                            throw new Error(msg);
                        }
                        return data;
                    })
                    .then(data => {
                        if (orderSuccessIdEl) {
                            orderSuccessIdEl.textContent = '#' + data.order_id;
                        }
                        orderSuccessModal?.show();
                        saveCart([]);
                        updateCount();
                        renderCart();
                        checkoutNameEl && (checkoutNameEl.value = '');
                        checkoutPhoneEl && (checkoutPhoneEl.value = '');
                        checkoutAddressEl && (checkoutAddressEl.value = '');
                        modalInstance?.hide();
                    })
                    .catch(err => {
                        alert(err.message || 'Có lỗi xảy ra khi gửi đơn hàng.');
                    })
                    .finally(() => {
                        checkoutBtn?.removeAttribute('disabled');
                        checkoutBtn?.classList.remove('disabled');
                    });
            };

            const bindCartButtons = () => {
                document.querySelectorAll('.add-to-cart').forEach(btn => {
                    if (btn.dataset.boundCart) return;
                    btn.dataset.boundCart = '1';
                    btn.addEventListener('click', () => {
                        const product = {
                            id: Number(btn.dataset.id),
                            name: btn.dataset.name || 'Sản phẩm',
                            price: Number(btn.dataset.price) || 0,
                            image: btn.dataset.image || '',
                            qty: 1,
                        };
                        const items = loadCart();
                        const found = items.find(i => i.id === product.id);
                        if (found) {
                            found.qty = Number(found.qty || 0) + 1;
                        } else {
                            items.push(product);
                        }
                        saveCart(items);
                        updateCount();

                        btn.classList.add('bg-red', 'text-white');
                        setTimeout(() => btn.classList.remove('bg-red', 'text-white'), 600);
                    });
                });
            };

            document.addEventListener('DOMContentLoaded', () => {
                bindCartButtons();
                updateCount();
                if (openCartBtn && modalInstance) {
                    openCartBtn.addEventListener('click', () => {
                        renderCart();
                        modalInstance.show();
                    });
                }
                if (floatingCartBtn && modalInstance) {
                    floatingCartBtn.addEventListener('click', () => {
                        renderCart();
                        modalInstance.show();
                    });
                }
                if (scrollTopBtn) {
                    scrollTopBtn.addEventListener('click', () => {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                }
                if (clearCartBtn) {
                    clearCartBtn.addEventListener('click', () => {
                        saveCart([]);
                        updateCount();
                        renderCart();
                    });
                }
                if (cartItemsEl) {
                    cartItemsEl.addEventListener('click', (e) => {
                        const btn = e.target.closest('.remove-cart-item');
                        if (btn?.dataset.id) {
                            removeItem(btn.dataset.id);
                        }
                    });
                }
                if (checkoutBtn) {
                    checkoutBtn.addEventListener('click', handleCheckout);
                }
                if (toggleCheckoutInfoBtn) {
                    toggleCheckoutInfoBtn.addEventListener('click', toggleCheckoutInfo);
                }

                // Floating cart visibility on scroll
                const toggleFloating = () => {
                    const shouldShow = window.scrollY > 120;
                    if (floatingCartBtn) {
                        floatingCartBtn.classList.toggle('show', shouldShow);
                    }
                    if (scrollTopBtn) {
                        scrollTopBtn.classList.toggle('show', shouldShow);
                    }
                };
                toggleFloating();
                window.addEventListener('scroll', toggleFloating, {
                    passive: true
                });
            });

            // Re-bind when new items appended via infinite scroll
            const listEl = document.getElementById('product-list');
            if (listEl && 'MutationObserver' in window) {
                const mo = new MutationObserver(bindCartButtons);
                mo.observe(listEl, {
                    childList: true,
                    subtree: true
                });
            }
        })();
    </script>
</body>

</html>