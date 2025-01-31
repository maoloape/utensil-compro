<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['brand_id', 'category_id', 'slug', 'name', 'detail', 'active', 'type'];

    protected $casts = [
        'detail' => 'array',
    ];

    protected $attributes = [
        'detail' => '[]',
    ];    

    protected static function booted()
    {
        static::saving(function ($product) {
            // if (request()->hasFile('image')) {
            //     $product->addMediaFromRequest('image')->toMediaCollection('product');
            // }
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::retrieved(function ($product) {
            if (!is_array($product->detail)) {
                $product->detail = json_decode($product->detail, true) ?? [];
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image');
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('image')->singleFile();
    // }

    // public function getImageUrlAttribute()
    // {
    //     return $this->getFirstMediaUrl('image') ?: asset('images/default-product.jpg');
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
