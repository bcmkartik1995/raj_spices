<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Product;

class MobileSearch extends Component
{
    public $searchTerm = ''; // Holds the user input

    public function render()
    {
        $products = [];
        if (strlen($this->searchTerm) > 2) {
            $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
                // ->orWhere('category', 'like', '%' . $this->searchTerm . '%')
                ->limit(10)
                ->get();
        }

        return view('livewire.website.mobile-search', [
            'products' => $products,
        ]);    }
}
