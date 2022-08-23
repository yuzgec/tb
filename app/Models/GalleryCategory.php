<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryCategory extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia,NodeTrait;

    protected $guarded = [];
    protected $table = 'gallery_categories';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug']);
    }

    function getCategoryCount()
    {
        return $this->hasMany('App\Models\Gallery', 'category')->count();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(400)->nonOptimized();
    }
}
