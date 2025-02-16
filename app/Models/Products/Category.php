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

    protected $fillable = [
        'name', 'slug', 'active', 'div_class', 'div_garis', 'col_span', 'row_span', 'order', 'text_color'
    ];

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

    public function setTextColorAttribute($value)
    {
        $this->attributes['text_color'] = strtolower($value);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category')->singleFile();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('category');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

