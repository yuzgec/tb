<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\LogOptions;

class FaqCategory extends Model
{
    use HasFactory,SoftDeletes,NodeTrait;

    protected $guarded = [];
    protected $table = 'faq_categories';

    function getCategoryCount()
    {
        return $this->hasMany('App\Models\Blog', 'category')->count();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'slug']);
    }
}
