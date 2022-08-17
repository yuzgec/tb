<?php

namespace App\Http\Livewire\Backend;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use withPagination;

    public $term;

    public function render()
    {
        return view('livewire.backend.product-list', [
            'All' => Product::when($this->term, function($query, $term) {
                return $query->where('title', 'LIKE', "%$term%");
            })->paginate(10)
        ]);
    }
}
