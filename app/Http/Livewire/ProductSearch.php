<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $searchTerm = ''; // Declare the property

    public function render()
    {
        $products = [];
        if (strlen($this->searchTerm) > 2) {
            $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
                // ->orWhere('category', 'like', '%' . $this->searchTerm . '%')
                ->limit(10)
                ->get();
        }

        return view('livewire.website.product-search', [
            'products' => $products,
        ]);

    }
}
