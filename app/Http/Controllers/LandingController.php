<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function __invoke(Request $request): View
    {
        $categories = ProductCategory::where('status', 1)->orderBy('name')->get();

        $query = Product::with('categories')
            ->where('status', 1);

        if ($search = $request->string('q')->trim()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($categoryId = $request->input('category')) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('product_categories.id', $categoryId);
            });
        }

        $products = $query->latest()->paginate(9)->withQueryString();

        return view('welcome', compact('categories', 'products'));
    }
}
