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
        * { padding: 0; margin: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        body { background-color: bisque; }
        /* .container { margin: 30px auto; } */
        .navbar-nav .nav-link { color: #000 !important; padding: 0.5rem 0rem !important; border-color: transparent; margin-left: 1.5rem; transition: none; }
        .navbar .navbar-toggler:focus { box-shadow: none; }
        .navbar-nav .nav-link.active, .border-red { border-bottom: 3px solid #b71c1c; }
        .navbar-nav .nav-link:hover { border-bottom: 3px solid #b71c1c; }
        .product-item {
            height: 430px;
            border: 1px solid #e5e5e5;
            overflow: hidden;
            position: relative;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .product-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.08);
        }
        .product-item .product { width: 100%; height: 300px; position: relative; overflow: hidden; cursor: pointer; }
        .product-item .product img { width: 100%; height: 100%; object-fit: cover; }
        .product-item .product .icons { position: absolute; bottom: 20px; left: 0; right: 0; }
        .product-item .product .icons .icon { width: 40px; height: 40px; background-color: rgba(255,255,255,0.65); border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: transform 0.6s ease, background-color .2s ease; transform: rotate(180deg); cursor: pointer; }
        .product-item .product .icons .icon:hover { background-color: rgba(183,28,28,0.8); color: #fff; }
        .product-item .product .icons .icon:nth-last-of-type(3) { transition-delay: 0.2s; }
        .product-item .product .icons .icon:nth-last-of-type(2) { transition-delay: 0.15s; }
        .product-item .product .icons .icon:nth-last-of-type(1) { transition-delay: 0.1s; }
        .product-item:hover .product .icons .icon { transform: translateY(-60px); }
        .product-item .tag { text-transform: uppercase; font-size: 0.75rem; font-weight: 500; position: absolute; top: 10px; left: 20px; padding: 0 0.4rem; }
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
        .product-item .fa-star { font-size: 0.65rem; color: goldenrod; }
        .product-item .price { margin-top: 10px; margin-bottom: 10px; font-weight: 600; }
        .fw-800 { font-weight: 800; }
        .bg-green { background-color: #208f20 !important; color: #fff; }
        .bg-black { background-color: #1f1d1d; color: #fff; }
        .bg-red { background-color: #bb3535; color: #fff; }
        .color-red { color:rgb(253, 75, 5); }
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
            box-shadow: 0 6px 14px rgba(0,0,0,0.06);
            transition: box-shadow .2s ease, border-color .2s ease;
        }
        .search-animated input:focus {
            border-color: #b71c1c;
            box-shadow: 0 10px 20px rgba(183,28,28,0.12);
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
            box-shadow: 0 8px 16px rgba(183,28,28,0.25);
            background: #e63c3c;
        }
        @media (max-width: 767.5px) {
            .product-item { height: 260px; }
            .product-item .product { height: 150px; }
            .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover { background-color: #b71c1c; color: #fff !important; }
            .navbar-nav .nav-link { border: 3px solid transparent; margin: 0.8rem 0; display: flex; border-radius: 10px; justify-content: center; }
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

    <div class="row" id="product-list">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-center justify-content-center product-item my-3">
                @php
                    $imgUrl = app()->environment('production')
                        ? asset('storage/'.$product->thumbnail_path)
                        : 'http://180.93.2.247:80/storage/'.$product->thumbnail_path;
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
                        <li class="icon mx-3"><span class="far fa-heart"></span></li>
                        <!-- <li class="icon"><span class="fas fa-shopping-bag"></span></li> -->
                    </ul>
                </div>
                @if($product->promotion > 0)
                    <div class="tag bg-red">sale -{{ number_format($product->promotion, 0) }}%</div>
                @else
                    <div class="tag {{ $product->status ? 'bg-green' : 'bg-black' }}">{{ $product->status ? 'new' : 'ngưng' }}</div>
                @endif
                <div class="title pt-4 pb-1 text-center">{{ $product->name }}</div>
                <div class="price">{{ number_format($product->price, 0, ',', '.') }}₫</div>
            </div>
        @empty
            <div class="col-12 text-center py-4">Không có sản phẩm.</div>
        @endforelse
    </div>

    <div class="row">
        <div class="col-12 text-center py-3" id="load-more" data-next="{{ $products->nextPageUrl() }}">
            <span class="text-muted small" id="load-more-text">{{ $products->nextPageUrl() ? 'Kéo xuống để tải thêm...' : 'Đã hết sản phẩm' }}</span>
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
            }, { rootMargin: '100px' });
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
                }, { rootMargin: '100px' });
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

        const fetchMore = () => {
            const next = loadMoreEl.dataset.next;
            if (!next || loading) return;
            loading = true;
            loadMoreText.textContent = 'Đang tải...';
            fetch(next, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(renderMore)
                .catch(() => { loadMoreText.textContent = 'Lỗi tải thêm'; })
                .finally(() => { loading = false; });
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) fetchMore();
            });
        }, { rootMargin: '200px' });

        observer.observe(loadMoreEl);
    })();
</script>
</body>
</html>
