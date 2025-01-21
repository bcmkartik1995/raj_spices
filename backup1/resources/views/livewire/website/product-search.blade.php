<div>
    <style>
        .search-results {
    /* border: 1px solid #ddd; */
    border-radius: 5px;
    max-height: 200px;
    overflow-y: auto;
}
.search-results ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

    </style>
    <form action="javascript:void(0)" class="search-header">
        <input 
            type="text" 
            placeholder="Search for products, categories or brands" 
            wire:model="searchTerm"
            class="form-control"
        >
    </form>

    <div class="search-results" style="position: absolute; z-index: 1000; background: white; width: 30%;">
        @if(strlen($searchTerm) > 2)
            @if($products->isEmpty())
                <p class="p-2">No products found.</p>
            @else
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item d-flex align-items-center" style="border: none;">
                            <!-- Product Image -->
                            <img 
                                src="{{ App\Models\Product::getFirstImage($product->id) }}" 
                                alt="{{ $product->name }}" 
                                style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;"
                            >
                            <!-- Product Name -->
                            <a href="{{ route('website-product-detail', $product->slug) }}" class="text-decoration-none">
                                {{ $product->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
    
</div>
