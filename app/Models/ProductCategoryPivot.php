<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryPivot extends Model
{
    use HasFactory;

    protected  $guarded = [];
    protected $table = 'product_category_pivots';

    public $timestamps = false;

    public function getCategoryCount()
    {
        return $this->hasMany(ProductCategory::class, 'id')->count();
    }

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

}
