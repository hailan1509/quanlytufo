<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('customer_name');
                $table->string('customer_phone', 20);
                $table->string('customer_address');
                $table->decimal('total_amount', 15, 2)->default(0);
                $table->tinyInteger('status')->default(0); // 0: chờ liên hệ, 1: chờ thanh toán, 2: đã thanh toán
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->string('product_name');
                $table->decimal('price', 15, 2)->default(0);
                $table->unsignedInteger('quantity')->default(1);
                $table->decimal('subtotal', 15, 2)->default(0);
                $table->timestamps();

                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
