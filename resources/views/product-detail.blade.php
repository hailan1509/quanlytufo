<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - TUFO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #f5f5f5; margin: 0; padding-bottom: 80px; color: #333; }
        a { text-decoration: none; }
        .top-nav { position: fixed; top:0; left:0; right:0; background:#fff; padding:10px 14px; display:flex; justify-content: space-between; align-items:center; gap:12px; z-index:1000; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        .cart-icon, .menu-icon { font-size: 22px; cursor: pointer; position: relative; }
        .cart-badge { position:absolute; top:-8px; right:-8px; background:#ee4d2d; color:#fff; width:20px; height:20px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; }
        .product-image-container { margin-top:54px; position: relative; background:#fff; }
        .product-image { width:100%; height:360px; object-fit: cover; background: linear-gradient(135deg,#f6f6f6 0%,#e0e0e0 100%); }
        .promo-overlay { position:absolute; top:16px; left:16px; color:#fff; font-weight:700; text-shadow:0 2px 6px rgba(0,0,0,0.45); line-height:1.5; }
        .play-button { position:absolute; bottom:80px; left:16px; width:60px; height:60px; background:rgba(0,0,0,0.45); border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; }
        .play-icon { width:0; height:0; border-left:18px solid #fff; border-top:10px solid transparent; border-bottom:10px solid transparent; margin-left:4px; }
        .image-counter { position:absolute; bottom:18px; right:16px; background:rgba(0,0,0,0.55); color:#fff; padding:6px 12px; border-radius:12px; font-size:13px; }
        .color-section, .flash-sale, .pricing-section, .product-title-section, .delivery-section, .return-section, .store-section { background:#fff; margin-top:6px; padding:14px 14px; }
        .product-title-section {
            display: flex;
            align-items: center;
        }
        .thumbnail-gallery { display:flex; gap:10px; overflow-x:auto; padding:6px 0; }
        .thumbnail { min-width:72px; height:72px; border-radius:10px; object-fit:cover; border:2px solid transparent; cursor:pointer; }
        .thumbnail.active { border-color:#ee4d2d; }
        .flash-sale { display:flex; justify-content:space-between; align-items:center; background:#ff6b35; color:#fff; }
        .flash-sale-left { display:flex; align-items:center; gap:8px; font-size:18px; font-weight:700; }
        .countdown { display:flex; gap:4px; align-items:center; }
        .countdown-item { background:rgba(255,255,255,0.2); padding:5px 10px; border-radius:4px; font-weight:700; }
        .price-row { display:flex; align-items:center; gap:10px; }
        .current-price { font-size:26px; font-weight:800; color:#ee4d2d; }
        .original-price { font-size:16px; color:#999; text-decoration: line-through; }
        .discount-badge { color:#ee4d2d; font-weight:700; }
        .deal-tag { display:inline-block; margin-top:6px; background:#ee4d2d; color:#fff; padding:5px 12px; border-radius:12px; font-size:12px; }
        .mall-tag { display:inline-block; background:#ee4d2d; color:#fff; padding:3px 8px; border-radius:4px; font-size:11px; margin-right:8px; }
        .product-title { font-size:16px; line-height:1.5; }
        .delivery-section, .return-section, .store-section { display:flex; justify-content:space-between; align-items:center; }
        .reviews-section { background:#fff; padding:14px; margin-top:6px; }
        .review-card { border-bottom:1px solid #f1f1f1; padding:10px 0; }
        .review-card:last-child { border-bottom:none; }
        .stars { color: #f7b500; font-size: 14px; }
        .review-meta { font-size: 12px; color: #777; }
        .delivery-item { display:flex; align-items:center; gap:8px; font-size:14px; margin-bottom:6px; }
        .chevron { color:#999; font-size:20px; }
        .return-content { display:flex; align-items:center; gap:8px; font-size:14px; }
        .store-info { display:flex; align-items:center; gap:12px; flex:1; }
        .store-avatar {
            width:50px; height:50px; border-radius:50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .view-shop-btn { background:#ee4d2d; color:#fff; border:none; padding:8px 18px; border-radius:18px; font-weight:700; }
        .bottom-action-bar { position:fixed; bottom:0; left:0; right:0; background:#fff; padding:10px 14px; display:flex; gap:10px; box-shadow:0 -2px 10px rgba(0,0,0,0.1); z-index:1000; align-items:center; }
        .action-item { display:flex; flex-direction:column; align-items:center; gap:4px; color:#ee4d2d; font-size:12px; cursor:pointer; flex:1; }
        .action-icon { font-size:22px; }
        .buy-now-btn { background:#ee4d2d; color:#fff; border:none; padding:12px 16px; border-radius:18px; font-size:15px; font-weight:700; flex:2; }
        @media (min-width: 768px) {
            body { padding-bottom: 0; }
            .product-image { height: 440px; }
            .bottom-action-bar { position:static; box-shadow:none; padding:0; margin-top:12px; }
        }
    </style>
</head>
<body>
@php
    $mainImg = app()->environment('production')
        ? asset('storage/'.$product->thumbnail_path)
        : 'http://154.26.136.88:8081/storage/'.$product->thumbnail_path;
    $hasSale = $product->promotion > 0;
    $salePrice = $hasSale ? $product->price * (1 - $product->promotion / 100) : $product->price;
@endphp

<div class="top-nav">
    <div class="menu-icon">☰</div>
    <div class="cart-icon" id="hero-click">
        🛒
        <span class="cart-badge" id="detail-cart-count">0</span>
    </div>
</div>

<div class="product-image-container">
    <img id="main-img" src="{{ $mainImg }}" alt="{{ $product->name }}" class="product-image">
    @if($hasSale)
        <div class="promo-overlay">
            <div>Ưu đãi nổi bật</div>
            <div>Giảm {{ number_format($product->promotion, 0) }}%</div>
        </div>
    @endif
    <div class="image-counter"><span id="img-index">1</span>/{{ $product->images->count() + 1 }}</div>
</div>

<div class="color-section">
    <div class="thumbnail-gallery">
        <img src="{{ $mainImg }}" class="thumbnail active" data-src="{{ $mainImg }}">
        @foreach($product->images as $img)
            @php
                $path = app()->environment('production')
                    ? asset('storage/'.$img->path)
                    : 'http://154.26.136.88:8081/storage/'.$img->path;
            @endphp
            <img src="{{ $path }}" class="thumbnail" data-src="{{ $path }}">
        @endforeach
    </div>
</div>

<!-- <div class="flash-sale">
    <div class="flash-sale-left">
        <span>⚡</span>
        <span>FLASH SALE</span>
    </div>
    <div class="flash-sale-right">
        <span>Kết thúc trong</span>
        <div class="countdown">
            <span class="countdown-item">01</span><span>:</span>
            <span class="countdown-item">57</span><span>:</span>
            <span class="countdown-item">29</span>
        </div>
    </div>
</div> -->

<div class="pricing-section">
    <div class="price-row">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="current-price">{{ number_format($salePrice, 0, ',', '.') }}₫</span>
            @if($hasSale)
                <span class="original-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                <span class="discount-badge">-{{ number_format($product->promotion, 0) }}%</span>
            @endif
        </div>
        @php
            $sold = rand(300, 2000);
        @endphp
        <span class="ms-auto text-muted" style="font-size: 13px;">Đã bán {{ number_format($sold) }}</span>
    </div>
</div>

<div class="product-title-section">
    <span class="mall-tag">Mall</span>
    <div class="product-title">
        {{ $product->name }}
    </div>
    
</div>
<div class="store-section">
    <div class="store-info">
        <div class="store-avatar">TUFO</div>
        <div class="store-details">
            <h3 class="mb-1" style="font-size:15px;">TUFO Tổng Kho Sỉ</h3>
            <div class="online-status d-flex align-items-center gap-2 text-success" style="font-size:12px;">
                <span class="online-dot" style="width:8px;height:8px;background:#27ae60;border-radius:50%;"></span>
                <span>Online</span>
            </div>
        </div>
    </div>
    <a href="https://www.facebook.com/profile.php?id=61553704516295" target="_blank" class="view-shop-btn">Xem shop</a>
</div>

<div class="delivery-section">
    <div class="delivery-content">
        <div class="delivery-item">
            <b><span>Mô tả sản phẩm</span></b>
        </div>
        <div class="mt-2 text-muted" id="desc-preview" style="max-height: 300px; overflow: hidden;">
            {!! $product->description ?: '<p>Chưa có mô tả</p>' !!}
        </div>
        <div class="text-center mt-2 d-none" id="desc-toggle-wrap">
        <span role="button" tabindex="0" id="toggle-desc"
              class="text-decoration-none"
              style="color:#ee4d2d; font-weight:600; cursor:pointer; outline:none; display:inline-flex; align-items:center; gap:4px;">
            Xem thêm <svg viewBox="0 0 12 12" fill="none" width="12" height="12" color="#ee4d2d" class="ZDyJDI"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 8.146L11.146 3l.707.707-5.146 5.147a1 1 0 01-1.414 0L.146 3.707.854 3 6 8.146z" fill="currentColor"></path></svg>
        </span>
        </div>
    </div>
</div>

@php
    $reviews = $product->fakeReviews(3);
    $totalReviews = $product->fakeTotalReviews();
@endphp
<div class="reviews-section">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="fw-bold">Đánh giá sản phẩm</div>
        <div class="text-muted" style="font-size:13px;">{{ $totalReviews }} lượt đánh giá</div>
    </div>
    @foreach($reviews as $review)
        <div class="review-card">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <div class="fw-semibold">{{ $review['name'] }}</div>
                <div class="review-meta">{{ $review['time_human'] }}</div>
            </div>
            <div class="stars mb-1">
                @for($i=0; $i<5; $i++)
                    <span class="{{ $i < $review['stars'] ? 'fas' : 'far' }} fa-star"></span>
                @endfor
            </div>
            <div class="text-muted" style="font-size:14px;">{{ $review['content'] }}</div>
        </div>
    @endforeach
</div>

<div class="return-section">
    <div class="return-content">
        <span class="text-success">✓</span>
        <span>Chính hãng 100% - Miễn phí đổi trả 7 ngày</span>
    </div>
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
<div class="bottom-action-bar">
    <button class="buy-now-btn flex-fill" id="buy-now-btn">Thêm giỏ hàng</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (() => {
        const STORAGE_KEY = 'tufo_cart_items';
        const btnBottom = document.getElementById('add-cart-bottom');
        const buyNowBtn = document.getElementById('buy-now-btn');
        const mainImg = document.getElementById('main-img');
        const thumbs = document.querySelectorAll('.thumbnail');
        const cartCount = document.getElementById('detail-cart-count');
        const descPreview = document.getElementById('desc-preview');
        const toggleDescBtn = document.getElementById('toggle-desc');
        const descToggleWrap = document.getElementById('desc-toggle-wrap');
        const imgIndex = document.getElementById('img-index');
        const heroClick = document.getElementById('hero-click');
        const openCartBtn = document.getElementById('open-cart');
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
        const cartModal = cartModalEl ? new bootstrap.Modal(cartModalEl) : null;

        const productData = {
            id: {{ $product->id }},
            name: @json($product->name),
            price: {{ $salePrice }},
            image: '{{ $mainImg }}'
        };

        const loadCart = () => { try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; } catch { return []; } };
        const saveCart = (items) => localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
        const formatPrice = (n) => new Intl.NumberFormat('vi-VN').format(Number(n) || 0) + '₫';
        const updateCount = () => { const total = loadCart().reduce((s,i)=>s+(Number(i.qty)||0),0); if(cartCount) cartCount.textContent = total; };

        thumbs.forEach(t => {
            t.addEventListener('click', () => {
                const src = t.dataset.src;
                if (src) mainImg.src = src;
                thumbs.forEach(i => i.classList.remove('active'));
                t.classList.add('active');
                if (imgIndex) {
                    const total = thumbs.length;
                    const idx = Array.from(thumbs).indexOf(t) + 1;
                    imgIndex.textContent = `${idx}`;
                }
                if (btnAdd) btnAdd.dataset.image = src;
            });
        });

        const addProduct = () => {
            const product = {
                id: productData.id,
                name: productData.name,
                price: productData.price,
                image: mainImg?.src || productData.image,
                qty: 1,
            };
            const items = loadCart();
            const found = items.find(i => i.id === product.id);
            if (found) { found.qty = Number(found.qty || 0) + 1; }
            else { items.push(product); }
            saveCart(items);
            updateCount();
        };

        if (btnBottom) {
            btnBottom.addEventListener('click', () => {
                addProduct();
                renderCart();
                cartModal?.show();
            });
        }

        if (buyNowBtn) {
            buyNowBtn.addEventListener('click', () => {
                addProduct();
                renderCart();
                cartModal?.show();
            });
        }

        if (heroClick) {
            heroClick.addEventListener('click', () => {
                renderCart();
                cartModal?.show();
            });
        }

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
                if (!name) { setError(checkoutNameEl, 'Vui lòng nhập họ tên'); valid = false; }
                else setError(checkoutNameEl, '');
            }
            if (checkoutPhoneEl) {
                const phoneOk = /^0\d{9,10}$/.test(phone);
                if (!phone) { setError(checkoutPhoneEl, 'Vui lòng nhập số điện thoại'); valid = false; }
                else if (!phoneOk) { setError(checkoutPhoneEl, 'Số điện thoại không hợp lệ'); valid = false; }
                else setError(checkoutPhoneEl, '');
            }
            if (checkoutAddressEl) {
                if (!address) { setError(checkoutAddressEl, 'Vui lòng nhập địa chỉ'); valid = false; }
                else setError(checkoutAddressEl, '');
            }
            if (!valid) showCheckoutInfo();
            return valid ? { name, phone, address } : null;
        };

        const handleCheckout = () => {
            const items = loadCart();
            if (!items.length) {
                alert('Giỏ hàng đang trống.');
                return;
            }
            showCheckoutInfo();
            const info = validateForm();
            if (!info) return;

            const payload = {
                customer: info,
                items: items.map(i => ({
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
                    cartModal?.hide();
                })
                .catch(err => {
                    alert(err.message || 'Có lỗi xảy ra khi gửi đơn hàng.');
                })
                .finally(() => {
                    checkoutBtn?.removeAttribute('disabled');
                    checkoutBtn?.classList.remove('disabled');
                });
        };

        if (cartItemsEl) {
            cartItemsEl.addEventListener('click', (e) => {
                const btn = e.target.closest('.remove-cart-item');
                if (btn?.dataset.id) {
                    removeItem(btn.dataset.id);
                }
            });
        }

        if (openCartBtn && cartModal) {
            openCartBtn.addEventListener('click', () => {
                renderCart();
                cartModal.show();
            });
        }

        if (clearCartBtn) {
            clearCartBtn.addEventListener('click', () => {
                saveCart([]);
                updateCount();
                renderCart();
            });
        }

        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', handleCheckout);
        }

        if (toggleCheckoutInfoBtn) {
            toggleCheckoutInfoBtn.addEventListener('click', toggleCheckoutInfo);
        }

        if (toggleDescBtn && descPreview) {
            let expanded = false;
            const originalHeight = descPreview.scrollHeight;
            if (originalHeight > 320 && descToggleWrap) {
                descToggleWrap.classList.remove('d-none');
            }
            toggleDescBtn.addEventListener('click', () => {
                expanded = !expanded;
                descPreview.style.maxHeight = expanded ? 'none' : '300px';
                toggleDescBtn.innerHTML = expanded
                    ? 'Thu gọn <svg viewBox="0 0 12 12" fill="none" width="12" height="12" color="#ee4d2d" class="ZDyJDI"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 4L.854 9.146.146 8.44l5.147-5.146a1 1 0 011.414 0l5.147 5.146-.707.707L6 4z" fill="currentColor"></path></svg>'
                    : 'Xem thêm <svg viewBox="0 0 12 12" fill="none" width="12" height="12" color="#ee4d2d" class="ZDyJDI"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 8.146L11.146 3l.707.707-5.146 5.147a1 1 0 01-1.414 0L.146 3.707.854 3 6 8.146z" fill="currentColor"></path></svg>';
            });
        }

        updateCount();
    })();
</script>
</body>
</html>
