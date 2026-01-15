<div class="row g-3">
    <div class="col-md-12">
        <label class="form-label required">Tên</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="form-control" required>
        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label required">Trạng thái</label>
        <select name="status" class="form-select" required>
            @php $statusValue = (string) old('status', isset($category) ? (int) $category->status : 1); @endphp
            <option value="1" {{ $statusValue === '1' ? 'selected' : '' }}>Hoạt động</option>
            <option value="0" {{ $statusValue === '0' ? 'selected' : '' }}>Ngưng</option>
        </select>
        @error('status')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
</div>
