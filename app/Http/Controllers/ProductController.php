<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $search = request()->string('q')->trim();
        $categoryId = request()->input('category');

        $products = Product::with(['categories', 'createdBy'])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($categoryId, function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($sub) use ($categoryId) {
                    $sub->where('product_categories.id', $categoryId);
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = ProductCategory::where('status', 1)->orderBy('name')->get();

        return view('products.index', compact('products', 'categories', 'search', 'categoryId'));
    }

    public function create(): View
    {
        $categories = ProductCategory::where('status', 1)->orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($request, $data) {
            $product = new Product();
            $product->fill([
                'name' => $data['name'],
                'price' => $data['price'],
                'promotion' => $data['promotion'] ?? 0,
                'description' => $data['description'] ?? null,
                'status' => $data['status'],
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            if ($request->hasFile('thumbnail')) {
                $product->thumbnail_path = $request->file('thumbnail')->store('products/thumbnails', 'public');
            }

            $product->save();

            $product->categories()->sync($data['product_categories'] ?? []);

            if ($request->hasFile('detail_images')) {
                foreach ($request->file('detail_images') as $file) {
                    $path = $file->store('products/details', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            }
        });

        return redirect()->route('products.index')->with('success', 'Đã tạo sản phẩm.');
    }

    public function edit(Product $product): View
    {
        $product->load(['categories', 'images']);
        $categories = ProductCategory::where('status', 1)->orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($request, $data, $product) {
            $product->fill([
                'name' => $data['name'],
                'price' => $data['price'],
                'promotion' => $data['promotion'] ?? 0,
                'description' => $data['description'] ?? null,
                'status' => $data['status'],
                'updated_by' => Auth::id(),
            ]);

            if ($request->hasFile('thumbnail')) {
                $product->deleteThumbnailFile();
                $product->thumbnail_path = $request->file('thumbnail')->store('products/thumbnails', 'public');
            }

            $product->save();
            $product->categories()->sync($data['product_categories'] ?? []);

            if ($request->hasFile('detail_images')) {
                // Remove old images
                foreach ($product->images as $image) {
                    Storage::disk('public')->delete($image->path);
                    $image->delete();
                }
                foreach ($request->file('detail_images') as $file) {
                    $path = $file->store('products/details', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            }
        });

        return redirect()->route('products.index')->with('success', 'Đã cập nhật sản phẩm.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        DB::transaction(function () use ($product) {
            $product->deleteThumbnailFile();
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
            $product->categories()->detach();
            $product->delete();
        });

        return redirect()->route('products.index')->with('success', 'Đã xoá sản phẩm.');
    }
}
