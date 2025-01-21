<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Brand extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'active', 'description'];

    protected static function booted()
    {
        static::saving(function ($brand) {
            if (request()->hasFile('image')) {
                $brand->addMediaFromRequest('image')->toMediaCollection('brand');
            }
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brand')->singleFile();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('brand');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
