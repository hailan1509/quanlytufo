<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function __invoke(Product $product): View
    {
        if (!$product->status) {
            abort(404);
        }

        $product->load(['categories', 'images']);

        return view('product-detail', compact('product'));
    }
}
