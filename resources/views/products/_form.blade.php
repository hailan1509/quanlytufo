<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label required">Tên sản phẩm</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control" required>
        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-2">
        <label class="form-label required">Giá</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price ?? '') }}" class="form-control" required>
        @error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-2">
        <label class="form-label">Khuyến mãi (%)</label>
        <input type="number" step="0.01" min="0" max="100" name="promotion" value="{{ old('promotion', $product->promotion ?? 0) }}" class="form-control">
        @error('promotion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-12">
        <label class="form-label required">Loại sản phẩm (chọn nhiều)</label>
        <select name="product_categories[]" class="form-select" multiple required>
            @php
                $selected = collect(old('product_categories', isset($product) ? $product->categories->pluck('id')->all() : []))->map(fn($v) => (int) $v)->toArray();
            @endphp
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ in_array($cat->id, $selected, true) ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('product_categories')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-12">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label {{ isset($product) ? '' : 'required' }}">Ảnh đại diện</label>
        <input type="file" name="thumbnail" accept="image/*" class="form-control" {{ isset($product) ? '' : 'required' }}>
        @error('thumbnail')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        @isset($product)
            @if($product->thumbnail_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$product->thumbnail_path) }}" alt="thumb" class="img-thumbnail" style="max-width: 160px;">
                </div>
            @endif
        @endisset
    </div>

    <div class="col-md-8">
        <label class="form-label">Ảnh chi tiết (có thể chọn nhiều)</label>
        <input type="file" name="detail_images[]" accept="image/*" class="form-control" multiple>
        @error('detail_images.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        @isset($product)
            @if($product->images->count())
                <div class="mt-2 d-flex gap-2 flex-wrap">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/'.$img->path) }}" alt="detail" class="img-thumbnail" style="max-width: 120px;">
                    @endforeach
                </div>
            @endif
        @endisset
    </div>

    <div class="col-md-4">
        <label class="form-label required">Trạng thái</label>
        @php $statusValue = (string) old('status', isset($product) ? (int) $product->status : 1); @endphp
        <select name="status" class="form-select" required>
            <option value="1" {{ $statusValue === '1' ? 'selected' : '' }}>Hoạt động</option>
            <option value="0" {{ $statusValue === '0' ? 'selected' : '' }}>Ngưng</option>
        </select>
        @error('status')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
</div>
