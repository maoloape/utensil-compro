<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'active'];

    protected static function booted()
    {
        static::saving(function ($category) {
            if (request()->hasFile('image')) {
                $category->addMediaFromRequest('image')->toMediaCollection('category');
            }
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('category')->singleFile();
    // }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
