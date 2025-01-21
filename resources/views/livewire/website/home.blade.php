<div>
    <style>
        .fa-star-half-rating {
            color: #FFD700;
        }
        .fa-star{
            color: #FFD700;
            cursor: pointer
        }
        .dropdwonCls{
            style="background-color: #fff;
            border-radius: 5px;
            border: solid 1px #e8e8e8;
            box-sizing: border-box;
            clear: both;cursor: pointer;
            display: block;
            float: left;
            font-family: inherit;
            font-size: 14px;
            height: 42px;
            padding-left: 18px;"
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10000;
            text-align: center;
        }

        .popupButtoncls {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .popupButtoncls:hover {
            background-color: #0056b3;
        }
        .yellow-star {
            color: #FFD700; /* Sets the half star to yellow */
        }
        .rating-container {
            display: flex;
            flex-direction: column;
        }
        .rating-stars-group + .ratings-text {
            display: block;
        }
        @media (min-width: 768px) {
            .rating-container {
                flex-direction: row;
                align-items: center;
            }

            .rating-stars-group + .ratings-text {
                display: inline-block;
                margin-left: 10px;
            }
        }
  

    .slider {
      position: relative;
      width: 100%;
      max-width: 100%;
      margin: auto;
      overflow: hidden;
      /*border-radius: 10px;*/
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      height: 400px;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      border-radius: 50%;
      z-index: 100;
      width: 45px;
    }

    .prev {
      left: 40px;
    }

    .next {
      right: 40px;
    }

    .dots {
        background: #F3F4F6;
        text-align: center;
      /*margin-top: 10px;*/
    }

    .dot {
      display: inline-block;
      width: 10px;
      height: 10px;
      margin: 5px;
      background-color: #ccc;
      border-radius: 50%;
      cursor: pointer;
    }

    .dot.active {
      background-color: #555;
    }


    </style>

  <div class="slider">
    <div class="slides">
        @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <div class="banner-bg-image bg_image ptb--120 ptb_md--80 ptb_sm--60" 
                     style="background-size: 100% 100%; background-image: url('{{ env('BANNER_IMAGE_URL').'/'.$slider->image }}');">
                    <div class="banner-one-inner-content">
                        <span class="pre">{{ $slider->subtitle }}</span>
                        <h1 class="title">
                            {!! nl2br($slider->title) !!}
                        </h1>
                        <a href="{{ route('website-product-view') }}" class="rts-btn btn-primary radious-sm with-icon">
                            <div class="btn-text">
                             Shop now
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
  </div>
  <div class="dots">
@foreach ($sliders as $key => $slider)
    @if ($key == 0)
        <span class="dot active" data-slide="0"></span>
    @else
        <span class="dot" data-slide="{{ $key }}"></span>
    @endif
@endforeach
  </div>



    <div class="background-light-gray-color rts-section-gap bg_light-1 pt_sm--20">
        <!-- rts banner area start -->
        <div class="rts-banner-area-one mb--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="category-area-main-wrapper-one">
                            <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":1,
                                "slidesPerView":1,
                                "loop": false,
                                "speed": 2000,
                                "autoplay":{
                                    "delay":"4000"
                                },
                             
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":1,
                                    "spaceBetween": 0},
                                "320":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "480":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "640":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "840":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "1140":{
                                    "slidesPerView":1,
                                    "spaceBetween":0}
                                }
                            }'>
                                <div class="swiper-wrapper">
                                    <!-- single swiper start -->
                                    
                                    @foreach ($sliders as $slider)  
<!--                                     <div class="swiper-slide">
                                        <div class="banner-bg-image bg_image ptb--120 ptb_md--80 ptb_sm--60" 
                                             style="background-image: url('{{ env('BANNER_IMAGE_URL').'/'.$slider->image }}');">
                                            <div class="banner-one-inner-content">
                                                <span class="pre">{{ $slider->subtitle }}</span>
                                                <h1 class="title">
                                                    {!! nl2br($slider->title) !!}
                                                </h1>
                                                <a href="{{ route('website-product-view') }}" class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text">
                                                     Shop now
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-arrow-right"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
 -->                                    @endforeach
                                    <!-- single swiper start -->
                                    
                                    <!-- single swiper start -->
                                </div>

                                {{-- <button class="swiper-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                                <button class="swiper-button-prev"><i class="fa-regular fa-arrow-left"></i></button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rts banner area end -->
        <!-- rts category area satart -->
          <!-- best selling groceris end -->
    <div class="rts-caregory-area-one "style="padding:10px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Shop By Category
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                            "spaceBetween":12,
                            "slidesPerView":10,
                            "loop": false,
                            "speed": 1000,
                            "breakpoints":{
                            "0":{
                                "slidesPerView":2,
                                "spaceBetween": 12},
                            "320":{
                                "slidesPerView":2,
                                "spaceBetween":12},
                            "480":{
                                "slidesPerView":3,
                                "spaceBetween":12},
                            "640":{
                                "slidesPerView":4,
                                "spaceBetween":12},
                            "840":{
                                "slidesPerView":4,
                                "spaceBetween":12},
                            "1140":{
                                "slidesPerView":10,
                                "spaceBetween":12}
                            }
                        }'>
                            <div class="swiper-wrapper">
                                @foreach ($categories->unique('id') as $category)
                                <div class="swiper-slide">
                                    <a href="{{ route('website-product-view', $category->slug) }}" class="single-category-one">
                                        <img src="{{ env('CATEGORY_IMAGE_URL').'/'.$category->image }}" alt="category">
                                        <p>{{ $category->name }}</p>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- best selling groceris -->
   
        <!-- rts category area end -->
    </div>


    <!-- best selling groceris -->
    <div class="weekly-best-selling-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Today's sale / offer
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- first tabs area start-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-4">
                                @foreach ($trending_products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="{{ route('website-product-detail', $product->slug) }}" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>{{ $product->discount_percentage }}% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="{{ App\Models\Product::getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <span class="single-action" wire:click="addToWishlist({{$product->id}})" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                               
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>
<div class="rating-container">
    <div class="rating-stars-group ">
        @php
        $averageRating = $product->reviews->average('rating');
        $filledStars = floor($averageRating);
        $halfStar = ($averageRating - $filledStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - ($filledStars + $halfStar);
        @endphp

        @for ($i = 0; $i < $filledStars; $i++)
            <i class="fas fa-star"></i>
        @endfor
        @if ($halfStar)
            <i class="fas fa-star-half-alt yellow-star"></i>
        @endif
        @for ($i = 0; $i < $emptyStars; $i++)
            <i class="far fa-star"></i>
        @endfor
    </div>
    <div class="ratings-text">({{ round($product->reviews->average('rating'), 1) }} Ratings)</div>
</div>
<span style="margin-top: 15px;display: grid;">
    <select  id="todayspeDD{{$product->id}}" onchange="todayspeDDchange({{$product->id}})" class="pvariationsCls dropdwonCls">
        @foreach($product->variations as $variation)
            <option value="{{ $variation->id }}" prodPrice="{{$variation->selling_price}}" prodOrgPrice="{{$variation->original_price}}">{{ App\Models\ProductVariation::variation($variation->variation_id) }} 
            </option>
        @endforeach
    </select>   
</span>    


<div class="price-area">
    <span class="current" id="todaysell_cur_{{$product->id}}">£{{ $variationPrices[$product->id]['selling_price'] ?? $product->price }}</span>
    <div class="previous" id="todaysell_org_{{$product->id}}">£{{ $variationPrices[$product->id]['original_price'] ?? $product->original_price }}</div>
</div>



                                            <div class="cart-counter-action">

<button type="button" class="rts-btn btn-primary radious-sm with-icon todayspecpop" data-product-id="{{ $product->id }}">
<div class="btn-text ">
    Add
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
</button>



                                                <button type="button" class="rts-btn btn-primary radious-sm with-icon text-center" 
                                                wire:click.prevent="addToWishlist({{ $product->id }})">
                                                    <div class="btn-text">
                                                       Add to wishlist
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



<div id="todayspecpopup-{{ $product->id }}" class="popup-overlay">
    <div class="popup-content">
        <h2>{{ $product->name }}</h2>
        <div class="quantity-controls d-flex align-items-center border rounded-pill bg-white shadow-sm" style="width: 80%;margin-bottom: 20px;margin-left: auto;margin-right: auto;">
            <button class="btn btn-link text-secondary px-3 py-2" onclick="decreaseValueFortdsp({{$product->id}})">
                <i class="fal fa-minus"></i>
            </button>
            <span class="px-3 fw-bold" id='numberForTodaySpe_{{$product->id}}'>1</span>
            <button class="btn btn-link text-secondary px-3 py-2" onclick="increaseValueFortdsp({{$product->id}})">
                <i class="fal fa-plus"></i>
            </button>
        </div>
        <div style="display: flex;">
            <button class="closepopuptodays popupButtoncls" style="width: 100px;margin-right: 20px;">Close</button>
            <button type="button" class="rts-btn btn-primary radious-sm with-icon show-popup-btn" data-product-id="{{ $product->id }}" wire:click.prevent="addToCart({{ $product->id }}, document.getElementById('todayspeDD{{$product->id}}').value,document.getElementById('numberForTodaySpe_{{$product->id}}').textContent.trim())">
                <div class="btn-text ">
                Add
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
            </button>
        </div>
    </div>
</div>



                                @endforeach
                                
                            </div>
                        </div>
                        <!-- first tabs area start-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weekly-best-selling-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                           Best Seller
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- first tabs area start-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-4">
                                @foreach ($best_seller as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="{{ route('website-product-detail', $product->slug) }}" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>{{ $product->discount_percentage }}% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="{{ App\Models\Product::getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <span class="single-action" wire:click="addToWishlist({{$product->id}})" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>
<div class="rating-container">
    <div class="rating-stars-group ">
        @php
        $averageRating = $product->reviews->average('rating');
        $filledStars = floor($averageRating);
        $halfStar = ($averageRating - $filledStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - ($filledStars + $halfStar);
        @endphp

        @for ($i = 0; $i < $filledStars; $i++)
            <i class="fas fa-star"></i>
        @endfor
        @if ($halfStar)
            <i class="fas fa-star-half-alt yellow-star"></i>
        @endif
        @for ($i = 0; $i < $emptyStars; $i++)
            <i class="far fa-star"></i>
        @endfor
    </div>
    <div class="ratings-text">({{ round($product->reviews->average('rating'), 1) }} Ratings)</div>
</div>

<span style="margin-top: 15px;display: grid;">
    <select id="bestSellDD{{$product->id}}" onchange="bestSellDDchange({{$product->id}})" class="pvariationsCls dropdwonCls">
        @foreach($product->variations as $variation)
            <option value="{{ $variation->id }}" prodPrice="{{$variation->selling_price}}" prodOrgPrice="{{$variation->original_price}}" >{{ App\Models\ProductVariation::variation($variation->variation_id) }} 
            </option>
        @endforeach
    </select>   
</span>    



<div class="price-area">
    <span class="current" id="bestsell_cur_{{$product->id}}">£{{ $variationPrices[$product->id]['selling_price'] ?? $product->price }}</span>
    <div class="previous" id="bestsell_org_{{$product->id}}">£{{ $variationPrices[$product->id]['original_price'] ?? $product->original_price }}</div>
</div>



                                            <div class="cart-counter-action">

<button type="button" class="rts-btn btn-primary radious-sm with-icon bestsellpop" data-product-id="{{ $product->id }}">
<div class="btn-text ">
    Add
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
</button>





                                                <button type="button" class="rts-btn btn-primary radious-sm with-icon text-center" 
                                                wire:click.prevent="addToWishlist({{ $product->id }})">
                                                    <div class="btn-text">
                                                       Add to wishlist
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



<div id="bestsellpopup-{{ $product->id }}" class="popup-overlay">
    <div class="popup-content">
        <h2>{{ $product->name }}</h2>
        <div class="quantity-controls d-flex align-items-center border rounded-pill bg-white shadow-sm" style="width: 80%;margin-bottom: 20px;margin-left: auto;margin-right: auto;">
            <button class="btn btn-link text-secondary px-3 py-2" onclick="decreaseValueForbestsell({{$product->id}})">
                <i class="fal fa-minus"></i>
            </button>
            <span class="px-3 fw-bold" id='numberForbestsell_{{$product->id}}'>1</span>
            <button class="btn btn-link text-secondary px-3 py-2" onclick="increaseValueForbestsell({{$product->id}})">
                <i class="fal fa-plus"></i>
            </button>
        </div>
        <div style="display: flex;">
            <button class="closepopupbestsell popupButtoncls" style="width: 100px;margin-right: 20px;">Close</button>
            <button type="button" class="rts-btn btn-primary radious-sm with-icon show-popup-btn" data-product-id="{{ $product->id }}" wire:click.prevent="addToCart({{ $product->id }}, document.getElementById('bestSellDD{{$product->id}}').value,document.getElementById('numberForbestsell_{{$product->id}}').textContent.trim())">
                <div class="btn-text ">
                Add
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
            </button>
        </div>
    </div>
</div>



                                @endforeach
                                
                            </div>
                        </div>
                        <!-- first tabs area start-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weekly-best-selling-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            New Arrivals
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- first tabs area start-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-4">
                                @foreach ($new_arrivals as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="{{ route('website-product-detail', $product->slug) }}" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>{{ $product->discount_percentage }}% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="{{ App\Models\Product::getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <span class="single-action" wire:click="addToWishlist({{$product->id}})" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>

<div class="rating-container">
    <div class="rating-stars-group ">
        @php
        $averageRating = $product->reviews->average('rating');
        $filledStars = floor($averageRating);
        $halfStar = ($averageRating - $filledStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - ($filledStars + $halfStar);
        @endphp

        @for ($i = 0; $i < $filledStars; $i++)
            <i class="fas fa-star"></i>
        @endfor
        @if ($halfStar)
            <i class="fas fa-star-half-alt yellow-star"></i>
        @endif
        @for ($i = 0; $i < $emptyStars; $i++)
            <i class="far fa-star"></i>
        @endfor
    </div>
    <div class="ratings-text">({{ round($product->reviews->average('rating'), 1) }} Ratings)</div>
</div>




<span style="margin-top: 15px;display: grid;">
    <select id="newArriveDD{{$product->id}}" onchange="newArriveDDchange({{$product->id}})" class="pvariationsCls dropdwonCls">
        @foreach($product->variations as $variation)
            <option value="{{ $variation->id }}" prodPrice="{{$variation->selling_price}}" prodOrgPrice="{{$variation->original_price}}" >{{ App\Models\ProductVariation::variation($variation->variation_id) }} 
            </option>
        @endforeach
    </select>   
</span>    

<div class="price-area">
    <span class="current" id="newArrive_cur_{{$product->id}}">£{{ $variationPrices[$product->id]['selling_price'] ?? $product->price }}</span>
    <div class="previous" id="newArrive_org_{{$product->id}}">£{{ $variationPrices[$product->id]['original_price'] ?? $product->original_price }}</div>
</div>
                                            <div class="cart-counter-action">

<button type="button" class="rts-btn btn-primary radious-sm with-icon newArrivepop" data-product-id="{{ $product->id }}">
<div class="btn-text ">
    Add
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
</button>



                                                <button type="button" class="rts-btn btn-primary radious-sm with-icon text-center" 
                                                wire:click.prevent="addToWishlist({{ $product->id }})">
                                                    <div class="btn-text">
                                                       Add to wishlist
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>


<div id="newArrivepopup-{{ $product->id }}" class="popup-overlay">
    <div class="popup-content">
        <h2>{{ $product->name }}</h2>
        <div class="quantity-controls d-flex align-items-center border rounded-pill bg-white shadow-sm" style="width: 80%;margin-bottom: 20px;margin-left: auto;margin-right: auto;">
            <button class="btn btn-link text-secondary px-3 py-2" onclick="decreaseValueFornewArrive({{$product->id}})">
                <i class="fal fa-minus"></i>
            </button>
            <span class="px-3 fw-bold" id='numberFornewArrive_{{$product->id}}'>1</span>
            <button class="btn btn-link text-secondary px-3 py-2" onclick="increaseValueFornewArrive({{$product->id}})">
                <i class="fal fa-plus"></i>
            </button>
        </div>
        <div style="display: flex;">
            <button class="closepopupnewArrive popupButtoncls" style="width: 100px;margin-right: 20px;">Close</button>
            <button type="button" class="rts-btn btn-primary radious-sm with-icon show-popup-btn" data-product-id="{{ $product->id }}" wire:click.prevent="addToCart({{ $product->id }}, document.getElementById('newArriveDD{{$product->id}}').value,document.getElementById('numberFornewArrive_{{$product->id}}').textContent.trim())">
                <div class="btn-text ">
                Add
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
            </button>
        </div>
    </div>
</div>



                                @endforeach
                                
                            </div>
                        </div>
                        <!-- first tabs area start-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weekly-best-selling-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Company products
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- first tabs area start-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-4">
                                @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="{{ route('website-product-detail', $product->slug) }}" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>{{ $product->discount_percentage }}% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="{{ App\Models\Product::getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <span class="single-action" wire:click="addToWishlist({{$product->id}})" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>
<div class="rating-container">
    <div class="rating-stars-group ">
        @php
        $averageRating = $product->reviews->average('rating');
        $filledStars = floor($averageRating);
        $halfStar = ($averageRating - $filledStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - ($filledStars + $halfStar);
        @endphp

        @for ($i = 0; $i < $filledStars; $i++)
            <i class="fas fa-star"></i>
        @endfor
        @if ($halfStar)
            <i class="fas fa-star-half-alt yellow-star"></i>
        @endif
        @for ($i = 0; $i < $emptyStars; $i++)
            <i class="far fa-star"></i>
        @endfor
    <!-- <span>{{ $product->reviews->average('rating') }} Reviews</span> -->
    </div>
    <div class="ratings-text">({{ round($product->reviews->average('rating'), 1) }} Ratings)</div>
</div>

<span style="margin-top: 15px;display: grid;">
    <select id="companyProductDD{{$product->id}}" onchange="companyProductDDchange({{$product->id}})" class="pvariationsCls dropdwonCls">
        @foreach($product->variations as $variation)
            <option value="{{ $variation->id }}" prodPrice="{{$variation->selling_price}}" prodOrgPrice="{{$variation->original_price}}" >{{ App\Models\ProductVariation::variation($variation->variation_id) }} 
            </option>
        @endforeach
    </select>   
</span>    

<div class="price-area">
    <span class="current" id="companyprod_cur_{{$product->id}}">£{{ $variationPrices[$product->id]['selling_price'] ?? $product->price }}</span>
    <div class="previous" id="companyprod_org_{{$product->id}}">£{{ $variationPrices[$product->id]['original_price'] ?? $product->original_price }}</div>
</div>


                                            <div class="cart-counter-action">

<button type="button" class="rts-btn btn-primary radious-sm with-icon companyprodpop" data-product-id="{{ $product->id }}">
<div class="btn-text ">
    Add
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
<div class="arrow-icon">
    <i class="fa-regular fa-cart-shopping"></i>
</div>
</button>


                                                <button type="button" class="rts-btn btn-primary radious-sm with-icon text-center" 
                                                wire:click.prevent="addToWishlist({{ $product->id }})">
                                                    <div class="btn-text">
                                                       Add to wishlist
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                </button>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>


<div id="companyProdpopup-{{ $product->id }}" class="popup-overlay">
    <div class="popup-content">
        <h2>{{ $product->name }}</h2>
        <div class="quantity-controls d-flex align-items-center border rounded-pill bg-white shadow-sm" style="width: 80%;margin-bottom: 20px;margin-left: auto;margin-right: auto;">
            <button class="btn btn-link text-secondary px-3 py-2" onclick="decreaseValueForcompanyProd({{$product->id}})">
                <i class="fal fa-minus"></i>
            </button>
            <span class="px-3 fw-bold" id='numberForcompanyProd_{{$product->id}}'>1</span>
            <button class="btn btn-link text-secondary px-3 py-2" onclick="increaseValueForcompanyProd({{$product->id}})">
                <i class="fal fa-plus"></i>
            </button>
        </div>
        <div style="display: flex;">
            <button class="closepopupcompanyarrive popupButtoncls" style="width: 100px;margin-right: 20px;">Close</button>
            <button type="button" class="rts-btn btn-primary radious-sm with-icon show-popup-btn" data-product-id="{{ $product->id }}" wire:click.prevent="addToCart({{ $product->id }}, document.getElementById('companyProductDD{{$product->id}}').value,document.getElementById('numberForcompanyProd_{{$product->id}}').textContent.trim())">
                <div class="btn-text ">
                Add
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
                <div class="arrow-icon">
                    <i class="fa-regular fa-cart-shopping"></i>
                </div>
            </button>
        </div>
    </div>
</div>



                                @endforeach
                                
                            </div>
                        </div>
                        <!-- first tabs area start-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($kitchen_products) > 0)
    <div class="weekly-best-selling-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Kitchen appliances
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- first tabs area start-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-4">
                                @foreach ($kitchen_products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="{{ route('website-product-detail', $product->slug) }}" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>{{ $product->discount_percentage }}% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="{{ App\Models\Product::getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <span class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                                <span class="single-action openuptip" data-flow="up" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-arrows-retweet"></i>
                                                </span>
                                                <span class="single-action openuptip cta-quickview product-details-popup-btn" data-flow="up" title="Quick View">
                                                    <i class="fa-regular fa-eye"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>
                                            <span class="availability">{{ $product->variation }}</span>
                                            <div class="price-area">
                                                <span class="current">£{{ $product->variationPrice['selling_price'] }}</span>
                                                <div class="previous">£{{ $product->variationPrice['original_price'] }}</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                @if(isset($quantity[$product->id]) && $quantity[$product->id] > 0)
                                                    <div class="quantity-edit">
                                                        <input type="text" class="input" value="{{ $quantity[$product->id] }}" readonly>
                                                        <div class="button-wrapper-action">
                                                            <button type="button" class="button" wire:click.prevent="decrementQuantity({{ $product->id }})">
                                                                <i class="fa-regular fa-chevron-down"></i>
                                                            </button>
                                                            <button type="button" class="button plus" wire:click.prevent="incrementQuantity({{ $product->id }})">
                                                                <i class="fa-regular fa-chevron-up"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button type="button" class="rts-btn btn-primary radious-sm with-icon" 
                                                            wire:click.prevent="addToCart({{ $product->id }})">
                                                        <div class="btn-text">
                                                            Add
                                                        </div>
                                                        <div class="arrow-icon">
                                                            <i class="fa-regular fa-cart-shopping"></i>
                                                        </div>
                                                        <div class="arrow-icon">
                                                            <i class="fa-regular fa-cart-shopping"></i>
                                                        </div>
                                                    </button>
                                                @endif
                                                <button type="button" class="rts-btn btn-primary radious-sm with-icon text-center" 
                                                wire:click.prevent="addToWishlist({{ $product->id }})">
                                                    <div class="btn-text">
                                                       Add to wishlist
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        <!-- first tabs area start-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
 
    <!-- best selling groceris end -->

    
    <!-- rts category feature area start -->
    {{-- <div class="category-feature-area rts-section-gapTop">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-feature-card bg_image one">
                        <div class="content-area">
                            <a href="shop-grid-sidebar.html" class="rts-btn btn-primary">Weekend Discount</a>
                            <h3 class="title">
                                Drink Fresh Corn Juice <br>
                                <span>Good Taste</span>
                            </h3>
                            <a href="shop-grid-sidebar.html" class="shop-now-goshop-btn">
                                <span class="text">Shop Now</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-feature-card bg_image two">
                        <div class="content-area">
                            <a href="shop-grid-sidebar.html" class="rts-btn btn-primary">Weekend Discount</a>
                            <h3 class="title">
                                Organic Lemon Flavored
                                <span>Banana Chips</span>
                            </h3>
                            <a href="shop-grid-sidebar.html" class="shop-now-goshop-btn">
                                <span class="text">Shop Now</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-feature-card bg_image three">
                        <div class="content-area">
                            <a href="shop-grid-sidebar.html" class="rts-btn btn-primary">Weekend Discount</a>
                            <h3 class="title">
                                Nozes Pecanera Brasil
                                <span>Chocolate Snacks</span>
                            </h3>
                            <a href="shop-grid-sidebar.html" class="shop-now-goshop-btn">
                                <span class="text">Shop Now</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-feature-card bg_image four">
                        <div class="content-area">
                            <a href="shop-grid-sidebar.html" class="rts-btn btn-primary">Weekend Discount</a>
                            <h3 class="title">
                                Strawberry Water Drinks
                                <span>Flavors Awesome</span>
                            </h3>
                            <a href="shop-grid-sidebar.html" class="shop-now-goshop-btn">
                                <span class="text">Shop Now</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- rts category feature area end -->

      <!-- rts featrure area start -->
      <div class="rts-feature-area rts-section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-20 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-feature-area">
                        <div class="icon">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.7029 6.29715C32.642 2.23634 27.2429 0 21.5 0C15.7571 0 10.358 2.23634 6.29715 6.29715C2.23642 10.358 0 15.7571 0 21.5C0 27.2429 2.23642 32.642 6.29715 36.7029C10.358 40.7637 15.7571 43 21.5 43C27.2429 43 32.642 40.7637 36.7029 36.7029C40.7636 32.642 43 27.2429 43 21.5C43 15.7571 40.7636 10.358 36.7029 6.29715ZM21.5 40.4805C11.0341 40.4805 2.51953 31.9659 2.51953 21.5C2.51953 11.0341 11.0341 2.51953 21.5 2.51953C31.9659 2.51953 40.4805 11.0341 40.4805 21.5C40.4805 31.9659 31.9659 40.4805 21.5 40.4805Z" fill="#629D23" />
                                <path d="M22.8494 20.2402H20.1506C18.6131 20.2402 17.3623 18.9895 17.3623 17.452C17.3623 15.9145 18.6132 14.6638 20.1506 14.6638H25.548C26.2438 14.6638 26.8078 14.0997 26.8078 13.404C26.8078 12.7083 26.2438 12.1442 25.548 12.1442H22.7598V9.35594C22.7598 8.66022 22.1957 8.09618 21.5 8.09618C20.8043 8.09618 20.2402 8.66022 20.2402 9.35594V12.1442H20.1507C17.2239 12.1442 14.8429 14.5253 14.8429 17.452C14.8429 20.3787 17.224 22.7598 20.1507 22.7598H22.8495C24.3869 22.7598 25.6377 24.0106 25.6377 25.548C25.6377 27.0855 24.3869 28.3363 22.8495 28.3363H17.452C16.7563 28.3363 16.1923 28.9004 16.1923 29.5961C16.1923 30.2918 16.7563 30.8559 17.452 30.8559H20.2402V33.6442C20.2402 34.34 20.8043 34.904 21.5 34.904C22.1957 34.904 22.7598 34.34 22.7598 33.6442V30.8559H22.8494C25.7761 30.8559 28.1571 28.4747 28.1571 25.548C28.1571 22.6214 25.7761 20.2402 22.8494 20.2402Z" fill="#629D23" />
                            </svg>
                        </div>
                        <div class="content">
                            <h4 class="title">Wide Assortment</h4>
                            <span>Explore a wide range of products</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-20 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-feature-area">
                        <div class="icon">
                            <svg width="37" height="44" viewBox="0 0 37 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.0347 19.5029C32.0518 11.3353 26.6248 5.76684 26.3952 5.53386L24.2276 3.33326V11.6016C24.2276 12.3124 23.658 12.8906 22.9578 12.8906C22.2577 12.8906 21.688 12.3124 21.688 11.6016C21.688 5.20446 16.5614 0 10.26 0H8.99021V1.28906C8.99021 7.30933 5.09884 11.646 2.14143 17.2212C-0.841884 22.8449 -0.69916 29.7349 2.51381 35.2021C5.7234 40.6636 11.5291 44 17.7786 44H18.3686C24.1822 44 29.6369 41.1045 32.9597 36.2545C36.2819 31.4054 37.056 25.0371 35.0347 19.5029ZM30.8748 34.7824C28.0265 38.9398 23.3513 41.4219 18.3686 41.4219H17.7786C12.4416 41.4219 7.42813 38.5325 4.69471 33.8813C1.93691 29.1886 1.81535 23.2733 4.37726 18.4436C7.17519 13.1691 10.9752 8.81934 11.4744 2.662C15.803 3.26502 19.1483 7.04412 19.1483 11.6015C19.1483 13.7338 20.8572 15.4687 22.9577 15.4687C25.0581 15.4687 26.767 13.7338 26.767 11.6015V9.91607C28.54 12.2131 31.0138 15.9094 32.6534 20.399C34.3856 25.1416 33.704 30.653 30.8748 34.7824Z" fill="#629D23" />
                                <path d="M16.6089 22C16.6089 19.8676 14.9 18.1328 12.7996 18.1328C10.6991 18.1328 8.99021 19.8676 8.99021 22C8.99021 24.1324 10.6991 25.8672 12.7996 25.8672C14.9 25.8672 16.6089 24.1324 16.6089 22ZM11.5298 22C11.5298 21.2892 12.0994 20.7109 12.7996 20.7109C13.4997 20.7109 14.0693 21.2892 14.0693 22C14.0693 22.7108 13.4997 23.2891 12.7996 23.2891C12.0994 23.2891 11.5298 22.7108 11.5298 22Z" fill="#629D23" />
                                <path d="M22.9578 28.4453C20.8573 28.4453 19.1485 30.1801 19.1485 32.3125C19.1485 34.4449 20.8573 36.1797 22.9578 36.1797C25.0583 36.1797 26.7672 34.4449 26.7672 32.3125C26.7672 30.1801 25.0583 28.4453 22.9578 28.4453ZM22.9578 33.6016C22.2577 33.6016 21.688 33.0233 21.688 32.3125C21.688 31.6017 22.2577 31.0234 22.9578 31.0234C23.658 31.0234 24.2276 31.6017 24.2276 32.3125C24.2276 33.0233 23.658 33.6016 22.9578 33.6016Z" fill="#629D23" />
                                <path d="M10.5466 34.0632L23.2407 18.599L25.1911 20.249L12.4969 35.7132L10.5466 34.0632Z" fill="#629D23" />
                            </svg>
                        </div>
                        <div class="content">
                            <h4 class="title">Hassle-Free Shopping</h4>
                            <span>Enjoy convenience and great deals</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-20 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-feature-area">
                        <div class="icon">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.2963 41.508C31.8507 41.508 31.4844 41.847 31.4412 42.2812H24.9741L23.9539 36.1376L25.0879 35.0037C25.249 34.8425 25.3396 34.6239 25.3396 34.396C25.3396 34.1681 25.249 33.9496 25.0879 33.7883L24.0845 32.7849H25.799C27.6807 32.7849 29.4317 33.7189 30.4826 35.2833C30.7473 35.6773 31.2813 35.782 31.6752 35.5174C32.0691 35.2527 32.174 34.7188 31.9093 34.3248C30.5492 32.3004 28.29 31.0861 25.8569 31.067C26.6893 30.1451 27.1971 28.9246 27.1971 27.5876V26.3271C27.1971 23.4613 24.8657 21.1298 21.9998 21.1298C19.134 21.1298 16.8025 23.4613 16.8025 26.3271V27.5876C16.8025 28.925 17.3105 30.1456 18.1432 31.0676C14.1133 31.0988 10.8441 34.3856 10.8441 38.4228V43.1406C10.8441 43.6152 11.2288 44 11.7035 44H32.2962C32.7708 44 33.1555 43.6152 33.1555 43.1406V42.3674C33.1557 41.8928 32.771 41.508 32.2963 41.508ZM22.0099 35.6511L20.7548 34.396L22.0099 33.141L23.265 34.396L22.0099 35.6511ZM21.5651 37.6007C21.7014 37.6834 21.8554 37.7258 22.0098 37.7258C22.1641 37.7258 22.3182 37.6835 22.4545 37.6007L23.2318 42.2812H20.7878L21.5651 37.6007ZM18.5214 26.3271C18.5214 24.4091 20.0819 22.8485 22 22.8485C23.9181 22.8485 25.4786 24.409 25.4786 26.3271V27.5876C25.4786 29.5056 23.9181 31.0662 22 31.0662C20.0819 31.0662 18.5214 29.5057 18.5214 27.5876V26.3271ZM12.563 38.4228C12.563 35.314 15.0922 32.7849 18.2009 32.7849H19.9351L18.9317 33.7883C18.7705 33.9496 18.68 34.1681 18.68 34.396C18.68 34.6239 18.7705 34.8425 18.9317 35.0037L20.0657 36.1376L19.0455 42.2812H12.5629L12.563 38.4228Z" fill="#629D23" />
                                <path d="M10.9901 5.49504C10.9901 2.46504 8.525 0 5.4951 0C2.4652 0 0 2.46513 0 5.49504C0 8.52495 2.46512 10.9901 5.49501 10.9901C8.52491 10.9901 10.9901 8.52503 10.9901 5.49504ZM1.71875 5.49504C1.71875 3.41285 3.41275 1.71876 5.49501 1.71876C7.57728 1.71876 9.27128 3.41285 9.27128 5.49504C9.27128 7.57723 7.57728 9.27132 5.49501 9.27132C3.41275 9.27132 1.71875 7.57731 1.71875 5.49504Z" fill="#629D23" />
                                <path d="M17.3644 10.9902H26.6357C27.1103 10.9902 27.4951 10.6053 27.4951 10.1308V0.859378C27.4951 0.38483 27.1103 0 26.6357 0H17.3644C16.8897 0 16.505 0.38483 16.505 0.859378V10.1308C16.505 10.6053 16.8897 10.9902 17.3644 10.9902ZM18.2237 1.71876H25.7763V9.2714H18.2237V1.71876Z" fill="#629D23" />
                                <path d="M43.8848 9.35966L38.9261 0.771034C38.7727 0.505143 38.489 0.341345 38.1819 0.341345C37.8749 0.341345 37.5912 0.505143 37.4377 0.771034L32.479 9.35966C32.3255 9.62555 32.3255 9.95315 32.479 10.219C32.6325 10.4849 32.9162 10.6487 33.2233 10.6487H43.1406C43.4477 10.6487 43.7313 10.4849 43.8848 10.219C44.0384 9.95315 44.0384 9.62555 43.8848 9.35966ZM34.7117 8.92997L38.1818 2.91948L41.652 8.92997H34.7117Z" fill="#629D23" />
                                <path d="M22 19.4427C22.4746 19.4427 22.8594 19.0579 22.8594 18.5834V16.1313L22.8942 16.1799C23.062 16.4144 23.3258 16.5393 23.5938 16.5393C23.7669 16.5393 23.9417 16.4871 24.0933 16.3786C24.4792 16.1024 24.5681 15.5657 24.2919 15.1797L22.6989 12.9537C22.5375 12.7282 22.2773 12.5944 22.0001 12.5944C21.7228 12.5944 21.4626 12.7282 21.3012 12.9537L19.7082 15.1797C19.432 15.5657 19.521 16.1024 19.9069 16.3786C20.2928 16.6548 20.8296 16.566 21.1059 16.1799L21.1406 16.1313V18.5834C21.1406 19.058 21.5254 19.4427 22 19.4427Z" fill="#629D23" />
                                <path d="M14.9245 26.4029C14.9245 25.9283 14.5398 25.5435 14.0651 25.5435H6.35937V16.1313L6.39418 16.1799C6.56201 16.4144 6.82584 16.5393 7.09379 16.5393C7.26687 16.5393 7.44167 16.4871 7.59326 16.3786C7.97921 16.1024 8.06815 15.5657 7.79195 15.1797L6.19893 12.9537C6.03754 12.7282 5.77732 12.5944 5.50008 12.5944C5.22285 12.5944 4.96263 12.7282 4.80124 12.9537L3.20822 15.1797C2.93201 15.5657 3.02096 16.1024 3.4069 16.3786C3.79276 16.6548 4.32962 16.566 4.6059 16.1799L4.64062 16.1313V26.4029C4.64062 26.8774 5.02536 27.2622 5.5 27.2622H14.0651C14.5397 27.2622 14.9245 26.8775 14.9245 26.4029Z" fill="#629D23" />
                                <path d="M39.1988 12.9536C39.0374 12.7281 38.7772 12.5943 38.5 12.5943C38.2227 12.5943 37.9625 12.7281 37.8011 12.9536L36.2081 15.1796C35.9319 15.5656 36.0209 16.1023 36.4068 16.3785C36.7928 16.6548 37.3296 16.5659 37.6058 16.1799L37.6406 16.1313V25.5435H29.9349C29.4602 25.5435 29.0755 25.9283 29.0755 26.4029C29.0755 26.8774 29.4602 27.2622 29.9349 27.2622H38.5C38.9746 27.2622 39.3594 26.8774 39.3594 26.4029V16.1313L39.3942 16.1799C39.562 16.4144 39.8258 16.5393 40.0938 16.5393C40.2669 16.5393 40.4417 16.4871 40.5932 16.3786C40.9792 16.1024 41.0681 15.5657 40.7919 15.1797L39.1988 12.9536Z" fill="#629D23" />
                                <path d="M32.2962 39.3597C32.7708 39.3597 33.1555 38.9749 33.1555 38.5003C33.1555 38.0257 32.7708 37.6409 32.2962 37.6409C31.8215 37.6409 31.4368 38.0257 31.4368 38.5003C31.4368 38.9749 31.8215 39.3597 32.2962 39.3597Z" fill="#629D23" />
                            </svg>
                        </div>
                        <div class="content">
                            <h4 class="title">Latest Updates & News</h4>
                            <span>Stay informed with our recent announcements</span>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-20 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-feature-area">
                        <div class="icon">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.7029 6.29715C32.642 2.23634 27.2429 0 21.5 0C15.7571 0 10.358 2.23634 6.29715 6.29715C2.23642 10.358 0 15.7571 0 21.5C0 27.2429 2.23642 32.642 6.29715 36.7029C10.358 40.7637 15.7571 43 21.5 43C27.2429 43 32.642 40.7637 36.7029 36.7029C40.7636 32.642 43 27.2429 43 21.5C43 15.7571 40.7636 10.358 36.7029 6.29715ZM21.5 40.4805C11.0341 40.4805 2.51953 31.9659 2.51953 21.5C2.51953 11.0341 11.0341 2.51953 21.5 2.51953C31.9659 2.51953 40.4805 11.0341 40.4805 21.5C40.4805 31.9659 31.9659 40.4805 21.5 40.4805Z" fill="#629D23" />
                                <path d="M22.8494 20.2402H20.1506C18.6131 20.2402 17.3623 18.9895 17.3623 17.452C17.3623 15.9145 18.6132 14.6638 20.1506 14.6638H25.548C26.2438 14.6638 26.8078 14.0997 26.8078 13.404C26.8078 12.7083 26.2438 12.1442 25.548 12.1442H22.7598V9.35594C22.7598 8.66022 22.1957 8.09618 21.5 8.09618C20.8043 8.09618 20.2402 8.66022 20.2402 9.35594V12.1442H20.1507C17.2239 12.1442 14.8429 14.5253 14.8429 17.452C14.8429 20.3787 17.224 22.7598 20.1507 22.7598H22.8495C24.3869 22.7598 25.6377 24.0106 25.6377 25.548C25.6377 27.0855 24.3869 28.3363 22.8495 28.3363H17.452C16.7563 28.3363 16.1923 28.9004 16.1923 29.5961C16.1923 30.2918 16.7563 30.8559 17.452 30.8559H20.2402V33.6442C20.2402 34.34 20.8043 34.904 21.5 34.904C22.1957 34.904 22.7598 34.34 22.7598 33.6442V30.8559H22.8494C25.7761 30.8559 28.1571 28.4747 28.1571 25.548C28.1571 22.6214 25.7761 20.2402 22.8494 20.2402Z" fill="#629D23" />
                            </svg>
                        </div>
                        <div class="content">
                            <h4 class="title">24/7 Customer Support</h4>
                            <span>We're here whenever you need us</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-20 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-feature-area">
                        <div class="icon">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.26667 8.26667C11.935 4.59834 16.8122 2.57812 22 2.57812C25.9672 2.57812 29.8028 3.78495 33.0284 6.01279L30.5382 6.2682L30.8013 8.83283L37.5044 8.14533L36.8169 1.4422L34.2522 1.70526L34.4751 3.8787C30.8247 1.36271 26.4866 0 22 0C16.1236 0 10.5989 2.28843 6.44368 6.44368C2.28843 10.5989 0 16.1236 0 22C0 26.3993 1.29456 30.6457 3.7437 34.28L5.88165 32.8393C5.852 32.7952 5.82321 32.7508 5.79391 32.7065C3.68998 29.5289 2.57812 25.8307 2.57812 22C2.57812 16.8123 4.59834 11.935 8.26667 8.26667Z" fill="#629D23" />
                                <path d="M40.2564 9.71996L38.1184 11.1607C38.148 11.2047 38.1768 11.2493 38.2061 11.2935C40.3099 14.4711 41.4219 18.1693 41.4219 22C41.4219 27.1878 39.4017 32.065 35.7333 35.7333C32.0651 39.4017 27.1879 41.4219 22 41.4219C18.0328 41.4219 14.1972 40.2151 10.9716 37.9872L13.4618 37.7318L13.1987 35.1672L6.49559 35.8547L7.18309 42.5578L9.7478 42.2947L9.52488 40.1213C13.1754 42.6373 17.5135 44 22 44C27.8764 44 33.4011 41.7116 37.5564 37.5563C41.7117 33.4011 44 27.8764 44 22C44 17.6007 42.7055 13.3543 40.2564 9.71996Z" fill="#629D23" />
                                <path d="M10.7407 24.7057L12.4096 23.1632C13.6739 22 13.9142 21.2161 13.9142 20.3564C13.9142 18.7127 12.5108 17.6633 10.4753 17.6633C8.73048 17.6633 7.4788 18.3966 6.80874 19.5093L8.66731 20.546C9.02129 19.9771 9.60291 19.6863 10.2477 19.6863C11.0063 19.6863 11.3856 20.0276 11.3856 20.5966C11.3856 20.9633 11.2845 21.3679 10.5764 22.0254L7.26387 25.123V26.6907H14.1544V24.7057L10.7407 24.7057Z" fill="#629D23" />
                                <path d="M22.1076 24.9965H23.4224V23.0115H22.1076V21.507H19.7433V23.0115H17.948L21.5512 17.8404H18.9594L14.9894 23.3655V24.9965H19.6674V26.6906H22.1076V24.9965Z" fill="#629D23" />
                                <path d="M25.6986 27.955L29.8708 16.045H27.7341L23.5618 27.955H25.6986Z" fill="#629D23" />
                                <path d="M31.995 21.1908V19.8254H34.3213L31.3375 26.6906H34.0685L37.1913 19.4081V17.8404H29.8582V21.1908H31.995Z" fill="#629D23" />
                            </svg>
                        </div>
                        <div class="content">
                            <h4 class="title">Best Prices & Offers</h4>
                            <span>Find the best deals and discounts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts category feature area end -->

</div>
<script>
    function todayspeDDchange(prodId){
        const selectedOption = document.getElementById('todayspeDD'+prodId).selectedOptions[0];
        const prodPrice = selectedOption.getAttribute('prodPrice');
        const prodOrgPrice = selectedOption.getAttribute('prodOrgPrice');
        document.getElementById('todaysell_cur_'+prodId).textContent = '£'+prodPrice;
        document.getElementById('todaysell_org_'+prodId).textContent = '£'+prodOrgPrice;
    }

    document.querySelectorAll('.todayspecpop').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            // alert(productId);
            document.getElementById(`todayspecpopup-${productId}`).style.display = 'block';
        });
    });

    document.querySelectorAll('.closepopuptodays').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.popup-overlay').style.display = 'none';
        });
    });

    // Close popup when clicking outside the popup content
    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (event) {
            // Check if the click is outside the popup-content
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    });
    function increaseValueFortdsp(id) {
        const spanElement = document.getElementById("numberForTodaySpe_"+id);
        let currentValue = parseInt(spanElement.textContent, 10); // Convert text to number
        if (currentValue < 10) {
            spanElement.textContent = currentValue + 1; // Increment by 1
        }
    }
    function decreaseValueFortdsp(id) {
        const spanElement = document.getElementById("numberForTodaySpe_"+id);
        let currentValue = parseInt(spanElement.textContent, 10);
        if (currentValue > 0) {
          spanElement.textContent = currentValue - 1; // Decrement by 1
        }
    }



    function bestSellDDchange(prodId){
        const selectedOption = document.getElementById('bestSellDD'+prodId).selectedOptions[0];
        const prodPrice = selectedOption.getAttribute('prodPrice');
        const prodOrgPrice = selectedOption.getAttribute('prodOrgPrice');
        document.getElementById('bestsell_cur_'+prodId).textContent = '£'+prodPrice;
        document.getElementById('bestsell_org_'+prodId).textContent = '£'+prodOrgPrice;
    }
    document.querySelectorAll('.bestsellpop').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            // alert(productId);
            document.getElementById(`bestsellpopup-${productId}`).style.display = 'block';
        });
    });
    document.querySelectorAll('.closepopupbestsell').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.popup-overlay').style.display = 'none';
        });
    });
    // Close popup when clicking outside the popup content
    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (event) {
            // Check if the click is outside the popup-content
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    });
    function increaseValueForbestsell(id) {
        const spanElement = document.getElementById("numberForbestsell_"+id);
        let currentValue = parseInt(spanElement.textContent, 10); // Convert text to number
        if (currentValue < 10) {
            spanElement.textContent = currentValue + 1; // Increment by 1
        }
    }
    function decreaseValueForbestsell(id) {
        const spanElement = document.getElementById("numberForbestsell_"+id);
        let currentValue = parseInt(spanElement.textContent, 10);
        if (currentValue > 0) {
          spanElement.textContent = currentValue - 1; // Decrement by 1
        }
    }


    function newArriveDDchange(prodId){
        const selectedOption = document.getElementById('newArriveDD'+prodId).selectedOptions[0];
        const prodPrice = selectedOption.getAttribute('prodPrice');
        const prodOrgPrice = selectedOption.getAttribute('prodOrgPrice');
        document.getElementById('newArrive_cur_'+prodId).textContent = '£'+prodPrice;
        document.getElementById('newArrive_org_'+prodId).textContent = '£'+prodOrgPrice;
    }
    document.querySelectorAll('.newArrivepop').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            // alert(productId);
            document.getElementById(`newArrivepopup-${productId}`).style.display = 'block';
        });
    });
    document.querySelectorAll('.closepopupnewArrive').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.popup-overlay').style.display = 'none';
        });
    });
    // Close popup when clicking outside the popup content
    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (event) {
            // Check if the click is outside the popup-content
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    });
    function increaseValueFornewArrive(id) {
        const spanElement = document.getElementById("numberFornewArrive_"+id);
        let currentValue = parseInt(spanElement.textContent, 10); // Convert text to number
        if (currentValue < 10) {
            spanElement.textContent = currentValue + 1; // Increment by 1
        }
    }
    function decreaseValueFornewArrive(id) {
        const spanElement = document.getElementById("numberFornewArrive_"+id);
        let currentValue = parseInt(spanElement.textContent, 10);
        if (currentValue > 0) {
          spanElement.textContent = currentValue - 1; // Decrement by 1
        }
    }



    function companyProductDDchange(prodId){
        const selectedOption = document.getElementById('companyProductDD'+prodId).selectedOptions[0];
        const prodPrice = selectedOption.getAttribute('prodPrice');
        const prodOrgPrice = selectedOption.getAttribute('prodOrgPrice');
        document.getElementById('companyprod_cur_'+prodId).textContent = '£'+prodPrice;
        document.getElementById('companyprod_org_'+prodId).textContent = '£'+prodOrgPrice;
    }
    document.querySelectorAll('.companyprodpop').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            // alert(productId);
            document.getElementById(`companyProdpopup-${productId}`).style.display = 'block';
        });
    });
    document.querySelectorAll('.closepopupcompanyarrive').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.popup-overlay').style.display = 'none';
        });
    });
    // Close popup when clicking outside the popup content
    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (event) {
            // Check if the click is outside the popup-content
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    });
    function increaseValueForcompanyProd(id) {
        const spanElement = document.getElementById("numberForcompanyProd_"+id);
        let currentValue = parseInt(spanElement.textContent, 10); // Convert text to number
        if (currentValue < 10) {
            spanElement.textContent = currentValue + 1; // Increment by 1
        }
    }
    function decreaseValueForcompanyProd(id) {
        const spanElement = document.getElementById("numberForcompanyProd_"+id);
        let currentValue = parseInt(spanElement.textContent, 10);
        if (currentValue > 0) {
          spanElement.textContent = currentValue - 1; // Decrement by 1
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        Livewire.hook('message.processed', (message, component) => {
            // Reset all dropdowns with the specified class
            const dropdowns = document.querySelectorAll('.pvariationsCls');
            dropdowns.forEach(dropdown => {
                dropdown.selectedIndex = 0; // Resets to the first option
            });
        });
    });

</script>
  <script>
    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;

    function updateSlide(index) {
      slides.style.transform = `translateX(-${index * 100}%)`;
      dots.forEach(dot => dot.classList.remove('active'));
      dots[index].classList.add('active');
    }

    document.querySelector('.prev').addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : dots.length - 1;
      updateSlide(currentIndex);
    });

    document.querySelector('.next').addEventListener('click', () => {
      currentIndex = (currentIndex < dots.length - 1) ? currentIndex + 1 : 0;
      updateSlide(currentIndex);
    });

    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        currentIndex = parseInt(dot.getAttribute('data-slide'));
        updateSlide(currentIndex);
      });
    });

    setInterval(() => {
      currentIndex = (currentIndex < dots.length - 1) ? currentIndex + 1 : 0;
      updateSlide(currentIndex);
    }, 5000); // Auto-slide every 5 seconds
  </script>