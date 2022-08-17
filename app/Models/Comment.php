<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'comments';

    public function getProduct()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

}
