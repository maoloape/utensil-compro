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
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brand-logo')->singleFile();
        $this->addMediaCollection('brand-logo-hitam')->singleFile();
        $this->addMediaCollection('brand-cover')->singleFile();
        $this->addMediaCollection('brand-cover-background')->singleFile();
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('brand-logo');
    }

    public function getLogoHitamUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('brand-logo-hitam');
    }

    public function getCoverUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('brand-cover');
    }

    public function getCoverBackgroundUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('brand-cover-background');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
