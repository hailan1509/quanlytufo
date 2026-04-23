<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $query = Product::query()
            ->where('status', 1);

        $search = trim((string) $request->input('q', ''));
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $categoryId = $request->integer('category');
        if ($categoryId) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('product_categories.id', $categoryId);
            });
        }

        $products = $query->latest()->paginate(9)->withQueryString();

        $items = $products->getCollection()->map(function (Product $product) {
            $finalPrice = (float) $product->promotion > 0
                ? (float) $product->price * (1 - (float) $product->promotion / 100)
                : (float) $product->price;

            $imgUrl = app()->environment('production')
                ? asset('storage/' . $product->thumbnail_path)
                : 'https://tongkhotufo.com/storage/' . $product->thumbnail_path;

            return [
                'id' => $product->id,
                'name' => $product->name,
                'status' => (bool) $product->status,
                'price' => (float) $product->price,
                'promotion' => (float) $product->promotion,
                'final_price' => $finalPrice,
                'thumbnail_url' => $imgUrl,
                'detail_url' => route('product.detail', $product),
            ];
        })->values();

        return response()->json([
            'data' => $items,
            'next_page_url' => $products->nextPageUrl(),
            'current_page' => $products->currentPage(),
            'per_page' => $products->perPage(),
        ]);
    }
}

