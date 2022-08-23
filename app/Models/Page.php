<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia,LogsActivity,HasSlug;

    protected $guarded = [];
    protected $table = 'page';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug']);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }

    public function getCategory(){
        return $this->belongsTo('App\Models\PageCategory', 'category');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('img')->width(750)->nonOptimized();
        $this->addMediaConversion('thumb')->width(400)->nonOptimized();
        $this->addMediaConversion('small')->width(150)->nonOptimized();
    }


}
