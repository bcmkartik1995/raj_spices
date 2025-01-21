<div>
    <div class="rts-cart-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="rts-cart-list-area wishlist">
                        @if($wishlist_items->isEmpty())
                        <div class="empty-wishlist text-center py-5">
                            <h3 class="mb-4">Your wishlist is empty!</h3>
                            <div class="row justify-content-center">
                                <div class="col-md-4 text-center">
                                    <a href="{{ route('website-product-view') }}" class="rts-btn btn-primary radious-sm mx-auto">
                                        <div class="btn-text">Go to Shopping</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-cart-area-list head d-flex justify-content-between align-items-center py-3">
                            <div class="product-main">
                                <p class="fw-bold text-uppercase">Products</p>
                            </div>
                            <div class="price">
                                <p class="fw-bold text-uppercase">Price</p>
                            </div>
                            <div class="button-area"></div>
                        </div>
                        @foreach($wishlist_items as $wishlist)
                        <div class="single-cart-area-list main item-parent d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div class="product-main-cart d-flex align-items-center">
                                <div class=" section-activation me-3" wire:click="removeItem({{ $wishlist->product->id }})">
                                    <img src="{{ env('LOCAL_URL') }}website-assets/images/shop/01.png" alt="remove" class="cursor-pointer" style="width: 20px;">
                                </div>
                                <div class="thumbnail me-3">
                                    <img src="{{ $wishlist->product->getFirstImage($wishlist->product->id) }}" alt="product" class="rounded" style="width: 50px; height: 50px;">
                                </div>
                                <div class="information">
                                    <h6 class="title m-0">{{ $wishlist->product->name }}</h6>
                                </div>
                            </div>
                            <div class="price">
                                <p class="m-0">${{ $wishlist->product->variationPrice['selling_price'] }}</p>
                            </div>
                            <div class="button-area">
                                <a wire:click="addToCart({{ $wishlist->product->id }})" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">Add To Cart</div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
