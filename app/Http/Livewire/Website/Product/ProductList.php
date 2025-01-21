<?php

namespace App\Http\Livewire\Website\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\Log;
use App\Models\Wishlist;

class ProductList extends Component
{

    public $products,$categories,$category_input=[],$user,$product;
    public $search,$cart_qty;
    public $quantities = [];
    public $quantity = [];
    public $brands;
    public $selectedCategory = '';
    public $selectedBrand = '';
    public $selectedVariation = '';
    public $minPrice = 0;
    public $maxPrice = 150;
    public $minAvailablePrice;
    public $maxAvailablePrice;
    public $priceRange;
    public $selectedCategories = [];
    public $selectedBrands = [];
    public $categorySlug;
    public $variations;
    public $selectedVariations = [];

    public function __construct($user)
    {
        $this->user = Session::get('user');
    }

    protected $queryString = [
        'category_input' => ['except','as' => 'category'],
        'search' => ['except','as' => 'search']
    ];


    public function addToCart($productId,$variationId=null,$quantitytoadd=0)
    {

        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        $cartItems = [];
        if (Session::has('user') && isset($productId) && isset($variationId)) {
            $cartItems = Cart::where('user_id', Session::get('user')->id)
                 ->where('product_id', $productId)
                 ->where('variation_id', $variationId)
                 ->first();        
        }
        if (isset($cartItems) && isset($cartItems->qty) && $cartItems->qty > 0 && isset($quantitytoadd) && $quantitytoadd > 0) {
                $newvarqty = $cartItems->qty + $quantitytoadd;
                Cart::updateOrCreate(
                    [
                        'user_id' => Session::get('user')->id,
                        'product_id' => $productId,
                        'variation_id' => $variationId
                    ],
                    ['qty' => $newvarqty]
                );
        }else{

           if(isset($quantitytoadd) && $quantitytoadd > 0){
            $quantityF = $quantitytoadd;
           }else{
            $quantityF = 1;
           }


        $this->quantity[$productId] = 1;


            if (isset($variationId) && !empty($variationId)) {
                $variationId = $variationId;
            }else if(isset($this->selectedVariation) && !empty($this->selectedVariation)){
                $variationId = $this->selectedVariation;
            }else{
                $variationId = ProductVariation::where('product_id', $productId)->first()->id;
            }


        
        // Add to database
        Cart::updateOrCreate(
            [
                'user_id' => Session::get('user')->id,
                'product_id' => $productId,
                'variation_id' => $variationId
            ],
            ['qty' => $quantityF]
        );

    }




        // Emit the cart updated event
        $this->emit('cartUpdated');
    }


    public function mount($products, $categories, $search=null, $categorySlug=null) {
        $this->categories = $categories;
        $this->search = $search;
        $this->categorySlug = $categorySlug;

        // Get user's cart items if logged in
        $cartItems = [];
        if (Session::has('user')) {
            $cartItems = Cart::where('user_id', Session::get('user')->id)
                ->get()
                ->pluck('qty', 'product_id')
                ->toArray();
        }

        // Load products based on category slug
        if ($this->categorySlug) {
            $this->products = Product::with(['category'])
                ->whereHas('category', function($q) {
                    $q->where('slug', $this->categorySlug);
                })
                ->get();
            
            // Set selected category
            $category = Category::where('slug', $this->categorySlug)->first();
            if ($category) {
                $this->selectedCategories = [$category->id];
            }
        } else {
            $this->products = $products;
        }

        // Initialize quantities for all products
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = $cartItems[$product->id] ?? 0;
        }

        // Update to get min/max prices from product_variations table
        $this->minAvailablePrice = DB::table('product_variations')->min('selling_price') ?? 0;
        $this->maxAvailablePrice = DB::table('product_variations')->max('selling_price') ?? 150;
        
        // Set initial values
        $this->minPrice = $this->minAvailablePrice;
        $this->maxPrice = $this->maxAvailablePrice;
        $this->priceRange = $this->maxPrice;

        // Initialize variations
        $this->variations = ProductVariation::variations();
    }

    public function incrementQuantity($productId)
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }
        $variationId = $this->selectedVariation ?: ProductVariation::where('product_id', $productId)->first()->id;

        if (isset($this->quantity[$productId])) {
            $this->quantity[$productId]++;
            
            // Update or create cart entry
            Cart::updateOrCreate(
                [
                    'user_id' => Session::get('user')->id,
                    'product_id' => $productId,
                    'variation_id' => $variationId
                ],
                ['qty' => $this->quantity[$productId]]
            );

            // Emit the cart updated event
            $this->emit('cartUpdated');
        }
    }

    public function decrementQuantity($productId)
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        if (isset($this->quantity[$productId]) && $this->quantity[$productId] > 0) {
            $this->quantity[$productId]--;
            
            if ($this->quantity[$productId] === 0) {
                // Remove from database if quantity is 0
                Cart::where('user_id', Session::get('user')->id)
                    ->where('product_id', $productId)
                    ->delete();
                    
                unset($this->quantity[$productId]);
            } else {
                // Update quantity in database
                Cart::where('user_id', Session::get('user')->id)
                    ->where('product_id', $productId)
                    ->update(['qty' => $this->quantity[$productId]]);
            }

            // Emit the cart updated event
            $this->emit('cartUpdated');
        }
    }

    public function applyFilter()
    {
        // The render method will automatically apply all filters
    }

    public function resetFilter()
    {
        $this->reset([
            'selectedCategory', 
            'selectedBrand', 
            'selectedVariation',
            'selectedCategories',
            'selectedBrands',
            'selectedVariations',
            'minPrice',
            'maxPrice'
        ]);
        
        // Reset price range to initial values
        $this->minPrice = $this->minAvailablePrice;
        $this->maxPrice = $this->maxAvailablePrice;
    }

    // Add this new method
    public function updatedPriceRange($value)
    {
        $this->maxPrice = (int)$value;
        $this->loadProducts();
    }

    // Add this method to help debug
    public function updatedSelectedCategory()
    {
        \Log::info('Category changed to: ' . $this->selectedCategory);
    }

    public function updatedSelectedBrand()
    {
        \Log::info('Brand changed to: ' . $this->selectedBrand);
    }

    public function updatedSelectedVariation()
    {
        \Log::info('Variation changed to: ' . $this->selectedVariation);
    }

    private function loadProducts()
    {
        $query = Product::query()->with(['category', 'subcategory']);

        // Join with product_variations table
        $query->join('product_variations', 'products.id', '=', 'product_variations.product_id');

        // Apply category slug filter and include subcategories
        if ($this->categorySlug) {
            $category = Category::active()->where('slug', $this->categorySlug)->first();

            if ($category) {
                // Get IDs of the selected category and its subcategories
                $categoryIds = $this->getAllCategoryIds($category);

                // Apply the filter to include products from these categories
                $query->where(function($q) use ($categoryIds) {
                    $q->whereIn('products.category_id', $categoryIds)
                      ->orWhereIn('products.parent_category_id', $categoryIds);
                });
            }
        }

        // Apply category input filter
        if ($this->category_input) {
            $categoryInputIds = Category::active()->whereIn('slug', $this->category_input)->pluck('id')->toArray();
            $subcategoryIds = Category::active()->whereIn('parent_id', $categoryInputIds)->pluck('id')->toArray();
            $allCategoryIds = array_merge($categoryInputIds, $subcategoryIds);

            $query->where(function($q) use ($allCategoryIds) {
                $q->whereIn('products.category_id', $allCategoryIds)
                  ->orWhereIn('products.parent_category_id', $allCategoryIds);
            });
        }

        // Apply selected categories filter
        if (!empty($this->selectedCategories)) {
            $query->where(function($q) {
                $q->whereIn('products.category_id', $this->selectedCategories)
                  ->orWhereIn('products.parent_category_id', $this->selectedCategories);
            });
        }

        // Apply brand filter
        if (!empty($this->selectedBrands)) {
            $query->whereIn('products.brand_id', $this->selectedBrands);
        }

        // Apply variation filters
        if ($this->selectedVariation) {
            $query->where('product_variations.variation_id', $this->selectedVariation);
        }

        if (!empty($this->selectedVariations)) {
            $query->whereIn('product_variations.variation_id', $this->selectedVariations);
        }

        // Update price filter to use product_variations table
        if (!is_null($this->minPrice) && !is_null($this->maxPrice)) {
            $query->whereBetween('product_variations.selling_price', [$this->minPrice, $this->maxPrice]);
        }

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('products.name', 'LIKE', "%{$this->search}%")
                  ->orWhereHas('category', function($q) {
                      $q->where('name', 'LIKE', "%{$this->search}%");
                  });
            });
        }

        // Debugging: Log the SQL query and bindings
        Log::info('SQL Query: ' . $query->toSql());
        Log::info('Bindings: ', $query->getBindings());

        // Select distinct products to avoid duplicates due to joins
        $this->products = $query->select('products.*')->distinct()->get();

        // Remove or comment out the dd() to allow rendering
        // dd($this->products);
    }

    /**
     * Helper method to retrieve all relevant category IDs, including subcategories.
     *
     * @param Category $category
     * @return array
     */
    private function getAllCategoryIds(Category $category)
    {
        // Initialize with the main category ID
        $categoryIds = [$category->id];

        // Fetch direct subcategories
        $subcategories = $category->subcategories()->get();

        foreach ($subcategories as $subcategory) {
            $categoryIds[] = $subcategory->id;

            // If you have multiple levels of subcategories, uncomment the following line:
            // $categoryIds = array_merge($categoryIds, $this->getAllCategoryIds($subcategory));
        }

        return $categoryIds;
    }
    public function addToWishlist($product_id)
    {
        if ($this->user) {

            if(Cart::where('product_id', $product_id)->where('user_id', $this->user->id)->exists()){
               
                session()->flash('error', 'Item already available in your cart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item already available in your cart',
                    'type' => 'error'
                ]);
                return false;

            }

            if (Wishlist::where('product_id', $product_id)->where('user_id', $this->user->id)->exists()) {
                session()->flash('error', 'Item already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item already added to wishlist',
                    'type' => 'error'
                ]);
                return false;
            } else {                
                Wishlist::create([
                    'product_id' => $product_id,
                    'user_id' => $this->user->id
                ]);
                $this->emit('wishlistUpdated');

                session()->flash('success', 'Item has been added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item has been added',
                    'type' => 'success'
                ]);
                return true;
            }
        } else {
            return redirect()->route('website-auth-login')->with(['error' => 'Please login first']);
        }
    }
    public function render()
    {
        // Only load products if filters have changed
        $this->loadProducts();


        // Load brands if not already loaded
        if (!$this->brands) {
            $this->brands = \App\Models\Brand::all();
        }

        return view('livewire.website.product.product-list', [
            'products' => $this->products,
            'categories' => $this->categories,
            'brands' => $this->brands
        ]);
    }
}
