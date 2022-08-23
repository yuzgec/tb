<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'shop_carts';

    public function getOrder(){
        return $this->hasMany(Order::class, 'cart_id', 'cart_id');
    }




}
