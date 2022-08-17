<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;

class Faq extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    protected $table = 'faq';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'slug']);
    }

    public function getCategory(){
        return $this->belongsTo('App\Models\FaqCategory', 'category');
    }

}
