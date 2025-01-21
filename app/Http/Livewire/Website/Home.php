<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ProductVariation;
use App\Models\Product;
use App\Models\Wishlist;

class Home extends Component
{
    public $categories;
    public $products;   
    public $latest_products;
    public $trending_products;
    public $best_seller;
    public $new_arrivals;
    public $kitchen_products;
    public $sliders;
    public $quantity = [];
    public $cartQuantity = [];
    public $selectedVariation = [];
    public $variationPrices = [];

    public function mount()
    {
        $this->quantity = [];

        // Get user's cart items if logged in
        $cartItems = [];
        if (Session::has('user')) {
            $cartItems = Cart::where('user_id', Session::get('user')->id)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->product_id => [
                        'qty' => $item->qty,
                        'variation_id' => $item->variation_id
                    ]];
                })
                ->toArray();
        }

        // Initialize quantities and variations for all product collections
        $allProducts = collect()
            ->merge($this->products ?? [])
            ->merge($this->latest_products ?? [])
            ->merge($this->trending_products ?? [])
            ->merge($this->best_seller ?? [])
            ->merge($this->new_arrivals ?? []);

        foreach ($allProducts->unique('id') as $product) {
            // Set quantity from cart if exists, otherwise 0
            $this->quantity[$product->id] = $cartItems[$product->id]['qty'] ?? 0;
            
            // Set variation from cart if exists
            $this->selectedVariation[$product->id] = $cartItems[$product->id]['variation_id'] ?? null;
        }

        // Initialize with default variations
        foreach ($this->trending_products as $product) {
            $defaultVariation = Product::getVariations($product->id)->first();
            if ($defaultVariation) {
                $this->selectedVariation[$product->id] = $defaultVariation->id;
                $this->variationPrices[$product->id] = [
                    'selling_price' => $defaultVariation->selling_price,
                    'original_price' => $defaultVariation->original_price
                ];
            }
        }
        
        // Do the same for new arrivals
        foreach ($this->new_arrivals as $product) {
            $defaultVariation = Product::getVariations($product->id)->first();
            if ($defaultVariation) {
                $this->selectedVariation[$product->id] = $defaultVariation->id;
                $this->variationPrices[$product->id] = [
                    'selling_price' => $defaultVariation->selling_price,
                    'original_price' => $defaultVariation->original_price
                ];
            }
        }
    }

    public function incrementQuantity($productId)
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        if (isset($this->quantity[$productId])) {
            $this->quantity[$productId]++;
            
            // Update or create cart entry with variation
            Cart::updateOrCreate(
                [
                    'user_id' => Session::get('user')->id,
                    'product_id' => $productId,
                    'variation_id' => $this->selectedVariation[$productId] ?? null
                ],
                ['qty' => $this->quantity[$productId]]
            );

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
                    ->where('variation_id', $this->selectedVariation[$productId] ?? null)
                    ->delete();
                    
                unset($this->quantity[$productId]);
            } else {
                // Update quantity in database with variation
                Cart::where('user_id', Session::get('user')->id)
                    ->where('product_id', $productId)
                    ->where('variation_id', $this->selectedVariation[$productId] ?? null)
                    ->update(['qty' => $this->quantity[$productId]]);
            }

            $this->emit('cartUpdated');
        }
    }

    public function addToCart($productId,$variationId=null,$quantitytoadd=0)
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        $cartItems = [];
        if (Session::has('user')) {
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
            // Create cart entry with variation if selected
            if (isset($variationId) && !empty($variationId)) {
                $variationId = $variationId;
            }else if(isset($this->selectedVariation[$productId]) && !empty($this->selectedVariation[$productId])){
                $variationId = $this->selectedVariation[$productId];    
            }else{
                $variationId = null;
            }
            Cart::updateOrCreate(
                [
                    'user_id' => Session::get('user')->id,
                    'product_id' => $productId,
                    'variation_id' => $variationId
                ],
                ['qty' => $quantityF]
            );


        }


        // Emit event to update header
        $this->emit('cartUpdated');
    }

    public function updatePrices($productId)
    {
        $variation = ProductVariation::find($this->selectedVariation[$productId]);
        if ($variation) {
            $this->variationPrices[$productId] = [
                'selling_price' => $variation->selling_price,
                'original_price' => $variation->original_price
            ];
        }
    }

    public function updatePrice($productId, $variationId)
    {

        $variation = ProductVariation::find($variationId);
        if ($variation) {
            $this->variationPrices[$productId] = [
                'selling_price' => $variation->selling_price,
                'original_price' => $variation->original_price
            ];
        }
    }
    public function addToWishlist($product_id)
    {
        $user = Session::get('user');
        if ($user) {

            if(Cart::where('product_id', $product_id)->where('user_id', $user->id)->exists()){
               
                session()->flash('error', 'Item already available in your cart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item already available in your cart',
                    'type' => 'error'
                ]);
                return false;

            }

            if (Wishlist::where('product_id', $product_id)->where('user_id', $user->id)->exists()) {
                session()->flash('error', 'Item already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item already added to wishlist',
                    'type' => 'error'
                ]);
                return false;
            } else {                
                Wishlist::create([
                    'product_id' => $product_id,
                    'user_id' => $user->id
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
        return view('livewire.website.home',[
            'categories' => $this->categories,
            'products' => $this->products,
            'latest_products' => $this->latest_products,
            'trending_products' => $this->trending_products,
            'best_seller' => $this->best_seller,
            'new_arrivals' => $this->new_arrivals,
            'kitchen_products' => $this->kitchen_products,
            'sliders' => $this->sliders
        ]);
    }
}
