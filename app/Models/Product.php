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
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Product extends Model implements HasMedia,Viewable
{
    use HasFactory,SoftDeletes,InteractsWithMedia,LogsActivity,InteractsWithViews,HasSlug;

    protected $guarded = [];
    protected $table = 'products';

    public function getCategory(){
        return $this->belongsTo(ProductCategoryPivot::class, 'id', 'product_id');
    }

    public function getComment(){
        return $this->belongsTo(Comment::class, 'id', 'product_id');
    }

    public function getAuthor(){
        return $this->hasMany(AuthorPivot::class, 'product_id', 'id');
    }

    public function getLanguage(){
        return $this->hasOne(Language::class, 'id', 'language');
    }

    public function getYear(){
        return $this->hasOne(Years::class, 'title', 'year');
    }

    public function getTranslator(){
        return $this->hasOne(Translator::class, 'id','translator');
    }

    public function getPublisher(){
        return $this->hasOne(Publisher::class,'id','publisher');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('img')->width(1000)->height(1000)->nonOptimized();
        $this->addMediaConversion('thumb')->width(400)->height(400)->nonOptimized();
        $this->addMediaConversion('small')->width(150)->height(150)->nonOptimized();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug', 'price']);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }
}
