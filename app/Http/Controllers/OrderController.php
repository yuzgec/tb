<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\ShopCart;

class OrderController extends Controller
{
    public function index(){
        $Order = ShopCart::with('getOrder')->withCount('getOrder')->get();
        return view('backend.order.index',compact('Order'));
    }

    public function orderDetails($id){
        $ShopCart = ShopCart::where('cart_id', $id)->with('getOrder')->withCount('getOrder')->first();
        $Order = Order::where('cart_id', $id)->get();
        return view('backend.order.detail', compact('Order', 'ShopCart'));
    }
}
