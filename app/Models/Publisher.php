<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Publisher extends Model
{
    use HasFactory,HasSlug;

    protected $guarded = [];
    protected $table = 'publishers';

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title' )->saveSlugsTo('slug');
    }
}
