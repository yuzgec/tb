<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'contact';

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(400)->nonOptimized();
    }
}
