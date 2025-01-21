<?php

namespace App\Http\Livewire\Website\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;
use Livewire\WithFileUploads;
use App\Models\ProductReview;
use App\Models\ProductVariation;

class Detail extends Component
{
    public $product;
    public $quantity = 1;
    public $related_products;
    public $cartItems;
    public $selectedVariation = null;
    public $currentPrice = ['selling_price' => 0, 'original_price' => 0];
    public $reviews;
    public $rating;
    public $name;
    public $email;
    public $comment;
    public $image;

    use WithFileUploads; // For handling file uploads

    protected $listeners = [
        'attemptVariationChange',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        
        // Initialize reviews
        $this->reviews = $this->product->reviews;
        
        // Initialize cart items
        $this->refreshCartItems();

        // Set initial variation if available
        if ($this->product->variations->isNotEmpty()) {
            $firstAvailableVariation = $this->product->variations->first(function($variation) {
                return $variation->quantity > 0;
            });
            
            if ($firstAvailableVariation) {
                $this->selectVariation($firstAvailableVariation->id);
            } else {
                $this->selectVariation($this->product->variations->first()->id);
            }
        }

        // Get related products
        $this->related_products = Product::where('category_id', $this->product->category_id)
                                       ->where('id', '!=', $this->product->id)
                                       ->take(4)
                                       ->get();
    }

    protected function refreshCartItems()
    {
        if (Session::has('user')) {
            $this->cartItems = Cart::where('user_id', Session::get('user')->id)
                ->where('product_id', $this->product->id)
                ->get();
        } else {
            $this->cartItems = collect();
        }
    }

    public function selectVariation($variationId)
    {
        $variation = $this->product->variations->firstWhere('id', $variationId);
        if ($variation) {
            $this->selectedVariation = $variationId;
            $this->currentPrice = [
                'selling_price' => $variation->selling_price,
                'original_price' => $variation->original_price
            ];
        }
    }

    public function incrementQuantity()
    {
        if ($this->selectedVariation) {
            $variation = $this->product->variations->firstWhere('id', $this->selectedVariation);
            if ($variation && $this->quantity < $variation->quantity) {
                $this->quantity++;
            }
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        if (!$this->selectedVariation) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please select a variation first',
                'type' => 'error'
            ]);
            return;
        }

        $variation = $this->product->variations->firstWhere('id', $this->selectedVariation);
        if (!$variation || $variation->quantity < 1) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Selected variation is out of stock',
                'type' => 'error'
            ]);
            return;
        }

        // Check for existing cart item
        $existingCartItem = Cart::where('user_id', Session::get('user')->id)
            ->where('product_id', $this->product->id)
            ->where('variation_id', $this->selectedVariation)
            ->first();

        if ($existingCartItem) {
            // Calculate new quantity
            $newQuantity = $existingCartItem->qty + $this->quantity;

            // Check if new quantity exceeds stock
            if ($newQuantity > $variation->quantity) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Cannot add more units than available in stock',
                    'type' => 'error'
                ]);
                return;
            }

            // Update existing cart item
            $existingCartItem->update([
                'qty' => $newQuantity,
                'price' => $variation->selling_price
            ]);

            $message = 'Cart updated successfully';
        } else {
            // Check if adding this quantity would exceed stock
            if ($this->quantity > $variation->quantity) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Cannot add more units than available in stock',
                    'type' => 'error'
                ]);
                return;
            }

            // Create new cart item
            Cart::create([
                'user_id' => Session::get('user')->id,
                'product_id' => $this->product->id,
                'variation_id' => $this->selectedVariation,
                'price' => $variation->selling_price,
                'qty' => $this->quantity
            ]);

            $message = 'Product added to cart successfully';
        }

        // Reset quantity
        $this->quantity = 1;

        // Refresh cart items
        $this->refreshCartItems();

        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => 'success'
        ]);
        
        // Emit event for cart update
        $this->emit('cartUpdated');
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

    public function toggleWishlist($productId = null)
    {
        if (!Session::has('user')) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add items to wishlist',
                'type' => 'error'
            ]);
            return;
        }

        // Toggle wishlist with database operations
        $this->product->wishlist()->toggle(Session::get('user')->id);
        $this->product->refresh();
        
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist updated successfully',
            'type' => 'success'
        ]);
    }

    public function redirectToLogin()
    {
        return redirect()->route('website-auth-login');
    }

    public function incrementCartItem($cartItemId)
    {
        $cartItem = Cart::find($cartItemId);
        if (!$cartItem) return;

        $variation = $this->product->variations->firstWhere('id', $cartItem->variation_id);
        if (!$variation) return;

        if ($cartItem->qty < $variation->quantity) {
            $cartItem->increment('qty');
            $this->refreshCartItems();
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart quantity updated',
                'type' => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cannot add more units than available in stock',
                'type' => 'error'
            ]);
        }
    }

    public function decrementCartItem($cartItemId)
    {
        $cartItem = Cart::find($cartItemId);
        if (!$cartItem) return;

        if ($cartItem->qty > 1) {
            $cartItem->decrement('qty');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart quantity updated',
                'type' => 'success'
            ]);
        } else {
            $cartItem->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Item removed from cart',
                'type' => 'success'
            ]);
        }

        $this->refreshCartItems();
    }

    public function updateCart($cartItemId)
    {
        $cartItem = Cart::find($cartItemId);
        if (!$cartItem) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart item not found',
                'type' => 'error'
            ]);
            return;
        }

        $variation = $this->product->variations->firstWhere('id', $cartItem->variation_id);
        if (!$variation) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product variation not found',
                'type' => 'error'
            ]);
            return;
        }

        // Update the cart item with current price
        $cartItem->update([
            'price' => $variation->selling_price
        ]);
        
        $this->refreshCartItems();
        $this->emit('cartUpdated');
        
        $this->dispatchBrowserEvent('message', [
            'text' => 'Cart updated successfully',
            'type' => 'success'
        ]);
    }

    public function attemptVariationChange($newVariation)
    {
        // Store the new variation temporarily
        $this->temporaryVariation = $newVariation;

        // Optionally, you can perform additional checks here
    }

    public function confirmVariationChange()
    {
        if ($this->temporaryVariation) {
            $variation = $this->product->variations()->find($this->temporaryVariation);
            if ($variation) {
                $this->selectedVariation = $this->temporaryVariation;
                $this->updateCurrentPrice($variation);
                
                // Update cart if exists
                if ($this->cartItem) {
                    $this->cartItem->update([
                        'variation_id' => $this->selectedVariation,
                        'price' => $variation->selling_price
                    ]);
                }
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product variation updated successfully!',
                    'type' => 'success'
                ]);
            }
        }
    }

    protected function updateCurrentPrice($variation)
    {
        $this->currentPrice = [
            'selling_price' => $variation->selling_price,
            'original_price' => $variation->original_price
        ];
    }

    public function submitReview()
    {
        if(!Session::has('user')){
            return redirect()->route('website-auth-login')->with(['error'=> 'Please login first']);
        }
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'image' => 'nullable|image|max:1024', // Optional image, max size 1MB
        ]);

        // Handle image upload
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('reviews', 'public');
        }

        // Save the review
        ProductReview::create([
            'rating' => $this->rating,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'image' => $imagePath,
            'product_id' => $this->product->id,
            'user_id' => Session::get('user')->id
        ]);

        // Reset the form
        $this->reset(['rating', 'name', 'email', 'comment', 'image']);

        // Optionally show a success message or flash session data
        session()->flash('message', 'Review submitted successfully!');
    }

    public function render()
    {
        return view('livewire.website.product.detail', [
            'related_products' => $this->related_products,
            'product' => $this->product,
            'currentPrice' => $this->currentPrice,
            'reviews' => $this->reviews,

        ]);
    }
}
