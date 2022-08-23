<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Kalnoy\Nestedset\NodeTrait;

class BlogCategory extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia,NodeTrait;

    protected $guarded = [];
    protected $table = 'blog_categories';


    function getCategoryCount()
    {
        return $this->hasMany(Blog::class, 'category')->count();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug']);
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(250)
            ->nonOptimized();
    }
}
