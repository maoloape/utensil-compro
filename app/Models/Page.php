<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'page';

    protected $fillable = [
        'title',
    ];

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(368)
    //         ->height(232)
    //         ->sharpen(10);

    //     $this->addMediaConversion('img')
    //         ->width(800)
    //         ->height(600)
    //         ->sharpen(10);
    // }

    public function getCoverPageAboutAttribute()
    {
        return $this->getFirstMediaUrl('cover-page-about');
    }

    public function getCoverPageContactAttribute()
    {
        return $this->getFirstMediaUrl('cover-page-contact');
    }

    public function getCoverPagePromotAttribute()
    {
        return $this->getFirstMediaUrl('cover-page-promot');
    }

    public function getCoverPageProductAttribute()
    {
        return $this->getFirstMediaUrl('cover-page-procduct');
    }
}