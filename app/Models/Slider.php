<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = [];
    protected $table = 'slider';

    public $timestamps = false;

    public function getProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
