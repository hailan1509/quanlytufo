<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::with(['createdBy', 'updatedBy'])->latest()->paginate(10);
        return view('product_categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('product_categories.create');
    }

    public function store(ProductCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        // Auto-generate code if not provided
        if (empty($data['code'])) {
            $nextId = (ProductCategory::max('id') ?? 0) + 1;
            $data['code'] = 'TUFO' . str_pad((string)$nextId, 6, '0', STR_PAD_LEFT);
        }

        ProductCategory::create($data);

        return redirect()->route('product-categories.index')
            ->with('success', 'Đã tạo loại sản phẩm thành công.');
    }

    public function edit(ProductCategory $productCategory): View
    {
        return view('product_categories.edit', ['category' => $productCategory]);
    }

    public function update(ProductCategoryRequest $request, ProductCategory $productCategory): RedirectResponse
    {
        $data = $request->validated();
        $data['updated_by'] = Auth::id();

        // Preserve existing code when not provided
        if (empty($data['code'])) {
            unset($data['code']);
        }

        $productCategory->update($data);

        return redirect()->route('product-categories.index')
            ->with('success', 'Đã cập nhật loại sản phẩm.');
    }

    public function destroy(ProductCategory $productCategory): RedirectResponse
    {
        $productCategory->delete();

        return redirect()->route('product-categories.index')
            ->with('success', 'Đã xoá loại sản phẩm.');
    }
}
