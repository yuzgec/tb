<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'shop_carts';
    protected $connection = "kiblegah";


    public function getOrder(){
        return $this->hasMany(Order::class, 'cart_id', 'cart_id');
    }




}
