<?php
namespace App\Http\Livewire\Website\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\ProductVariation;


class Wishlist extends Component
{
    public $wishlist_items, $user,$cart_qty,$qty=1,$product;
    public $quantity = [];

    public function __construct()
    {
        $this->user = Session::get('user');
    }


    public function addToCart($productId)
    {
        if (!Session::has('user')) {
            return redirect()->route('website-auth-login');
        }

        // Check if a variation is selected, if not, select the first available variation
        $variationId =  ProductVariation::where('product_id', $productId)->first()->id;
// dd($variationId);
        $this->quantity[$productId] = 1;
        
        // Add to database
        Cart::updateOrCreate(
            [
                'user_id' => Session::get('user')->id,
                'product_id' => $productId,
                'variation_id' => $variationId
            ],
            ['qty' => 1]
        );

        ModelsWishlist::where('product_id',$productId)->where('user_id',Session::get('user')->id)->delete();
        $this->dispatchBrowserEvent('message', [
            'text' => 'Item has been deleted',
            'type' => 'success'
        ]);
        // Emit the cart updated event
        $this->emit('cartUpdated');
    }

    public function removeItem($id)
    {
        if ($this->user) {
            if (ModelsWishlist::where('product_id', $id)->where('user_id', $this->user->id)->delete()) {
                session()->flash('success', 'Item has been deleted');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item has been deleted',
                    'type' => 'success'
                ]);
                $this->wishlist_items = ModelsWishlist::where('user_id', $this->user->id)->get();
                $this->emit('wishlistUpdated');

                return true;
            }
        }
    }

    public function mount($wishlist_items)
    {
        $this->wishlist_items = $wishlist_items;
    }

    public function render()
{
    $this->wishlist_items = ModelsWishlist::where('user_id', $this->user->id)->get();
    return view('livewire.website.product.wishlist', [
        'wishlist_items' => $this->wishlist_items
    ]);
}

}
