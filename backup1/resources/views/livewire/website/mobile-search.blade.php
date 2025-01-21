<div>
    <div class="container">
        <div class="search-input-inner" style="width:400px">
            <div class="input-div">
                <!-- Search Input -->
                <input 
                    id="searchInput1" 
                    class="search-input" 
                    type="text" 
                    placeholder="Search by keyword or #" 
                    wire:model="searchTerm"
                >
                <button>
                    <i class="far fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Search Results -->
    <div id="searchResults" style="position: absolute; background: white; z-index: 1000; width: 100%; margin-top: 10px;position: absolute; left: 50%; transform: translateX(-50%)">
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
                                style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;"
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