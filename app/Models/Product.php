<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'promotion',
        'description',
        'status',
        'thumbnail_path',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2',
        'promotion' => 'decimal:2',
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleteThumbnailFile(): void
    {
        if ($this->thumbnail_path) {
            Storage::disk('public')->delete($this->thumbnail_path);
        }
    }
}
