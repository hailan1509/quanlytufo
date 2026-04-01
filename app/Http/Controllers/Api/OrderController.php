<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'customer.name' => ['required', 'string', 'max:255'],
            'customer.phone' => ['required', 'regex:/^0\d{9,10}$/'],
            'customer.address' => ['required', 'string', 'max:500'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.id' => ['nullable', 'integer'],
            'items.*.name' => ['required', 'string', 'max:255'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
        ], [
            'customer.name.required' => 'Vui lòng nhập họ tên',
            'customer.phone.required' => 'Vui lòng nhập số điện thoại',
            'customer.phone.regex' => 'Số điện thoại không hợp lệ',
            'customer.address.required' => 'Vui lòng nhập địa chỉ',
            'items.required' => 'Giỏ hàng trống',
        ]);

        $customer = $data['customer'];
        $items = $data['items'];

        $total = collect($items)->reduce(function ($sum, $item) {
            return $sum + (float) $item['price'] * (int) $item['qty'];
        }, 0);

        $order = DB::transaction(function () use ($customer, $items, $total) {
            $order = Order::create([
                'customer_name' => $customer['name'],
                'customer_phone' => $customer['phone'],
                'customer_address' => $customer['address'],
                'total_amount' => $total,
                'status' => Order::STATUS_PENDING_CONTACT,
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'] ?? null,
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['qty'],
                    'subtotal' => (float) $item['price'] * (int) $item['qty'],
                ]);
            }

            return $order->load('items');
        });

        return response()->json([
            'message' => 'Tạo đơn hàng thành công',
            'order_id' => $order->id,
            'status' => $order->status,
        ], 201);
    }
}
