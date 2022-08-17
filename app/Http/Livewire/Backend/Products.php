<?php

namespace App\Http\Livewire\Backend;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use withPagination;

    public $term;

    public function render()
    {
        return view('livewire.backend.products', [
            'All' => Product::when($this->term, function($query, $term) {
                return $query->where('title', 'LIKE', "%$term%");
            })->paginate(10)
        ]);
    }
}
