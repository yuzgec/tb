<?php

namespace App\View\Components\Shop;

use App\Models\Product;
use Illuminate\View\Component;

class ProductList extends Component
{
    public $size;
    public $paginate;
    public $limit;


    public function __construct($size = null,$paginate = null,$limit = null )
    {
        $this->size = $size;
        $this->paginate = $paginate;
        $this->limit = $limit;
    }

    public function render()
    {
        $Product = Product::with('getCategory')->limit($this->limit)->orderBy('rank')->get();
        return view('components.shop.product-list', compact('Product'));
    }
}
