<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const STATUS_PENDING_CONTACT = 0;   // chờ liên hệ
    public const STATUS_WAIT_PAYMENT   = 1;   // chờ thanh toán
    public const STATUS_PAID           = 2;   // đã thanh toán
    public const STATUS_CANCELLED      = 3;   // đã huỷ

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'status' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function statusOptions(): array
    {
        return [
            self::STATUS_PENDING_CONTACT => 'Chờ liên hệ',
            self::STATUS_WAIT_PAYMENT => 'Chờ thanh toán',
            self::STATUS_PAID => 'Đã thanh toán',
            self::STATUS_CANCELLED => 'Đã huỷ',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::statusOptions()[$this->status] ?? 'Không xác định';
    }
}
