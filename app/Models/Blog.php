<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia,LogsActivity;

    protected $guarded = [];
    protected $table = 'blog';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug']);
    }

    public function getCategory(){
        return $this->belongsTo('App\Models\BlogCategory', 'category');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('img')->width(1000)->nonOptimized();
        $this->addMediaConversion('thumb')->width(400)->nonOptimized();
        $this->addMediaConversion('small')->width(150)->nonOptimized();
    }

}
