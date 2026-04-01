<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->trim();
        $status = $request->filled('status') ? $request->integer('status') : null;

        $orders = Order::withCount('items')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('customer_name', 'like', "%{$search}%")
                        ->orWhere('customer_phone', 'like', "%{$search}%");
                });
            })
            ->when($status !== null, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $statusOptions = Order::statusOptions();

        return view('orders.index', compact('orders', 'search', 'status', 'statusOptions'));
    }

    public function show(Order $order): View
    {
        $order->load('items');
        $statusOptions = Order::statusOptions();
        return view('orders.show', compact('order', 'statusOptions'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'integer', 'in:0,1,2,3'],
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng.');
    }
}
