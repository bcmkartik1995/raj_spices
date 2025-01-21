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
            display: block !important;
            float: left;
            font-family: inherit;
            font-size: 14px;
            height: 42px;
            padding-left: 18px;
            background: #fff;
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

    </style>
      <!-- rts navigation bar area start -->
      <div class="rts-navigation-area-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="{{ route('website-home') }}">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="{{ route('website-product-view') }}">Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts navigation bar area end -->
    <div class="section-seperator">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

    <!-- shop[ grid sidebar wrapper -->
    <div class="shop-grid-sidebar-area rts-section-gap">
    
    
        <div class="container">
            <div class="row g-0">
                <div class="col-xl-3 col-lg-12 pr--70 pr_lg--10 pr_sm--10 pr_md--5 rts-sticky-column-item">
                    <div class="sidebar-filter-main theiaStickySidebar">
                        
                        <div class="single-filter-box">
                            <h5 class="title">Product Categories</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    @foreach($categories as $category)
                                        <!-- single category -->
                                        <div class="single-category">
                                            <input id="cat{{ $category->id }}" 
                                                   type="checkbox"
                                                   wire:model="selectedCategories" 
                                                   value="{{ $category->id }}">
                                            <label for="cat{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                        <!-- single category end -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div class="single-filter-box">
                            <h5 class="title">Product Status</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    <!-- single category -->
                                    <div class="single-category">
                                        <input id="cat11" type="checkbox">
                                        <label for="cat11">In Stock

                                        </label>
                                    </div>
                                    <!-- single category end -->
                                    <!-- single category -->
                                    <div class="single-category">
                                        <input id="cat12" type="checkbox">
                                        <label for="cat12">On Sale

                                        </label>
                                    </div>
                                    <!-- single category end -->
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="single-filter-box">
                            <h5 class="title">Select Brands</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    @foreach($brands as $brand)
                                        <div class="single-category">
                                            <input id="brand{{ $brand->id }}" 
                                                   type="checkbox"
                                                   wire:model="selectedBrands" 
                                                   value="{{ $brand->id }}">
                                            <label for="brand{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="single-filter-box">
                            <h5 class="title">Select Variations</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    @foreach($variations as $variation)
                                        <div class="single-category">
                                            <input id="var{{ $loop->index }}" 
                                                   type="checkbox"
                                                   wire:model="selectedVariations" 
                                                   value="{{ $variation }}">
                                            <label for="var{{ $loop->index }}">
                                                {{ $variation }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12">
                    <div class="filter-select-area">
                        {{-- <div class="top-filter">
                            <span></span>
                            <div class="right-end">
                                <div class="button-tab-area">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link single-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                    <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                    <rect x="9.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                    <rect x="9.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link single-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3C28" />
                                                    <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3C28" />
                                                    <rect x="9" y="3" width="7" height="1" fill="#2C3C28" />
                                                    <rect x="9" y="12" width="7" height="1" fill="#2C3C28" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div> --}}
                        <div class="nice-select-area-wrapper-and-button">
                            <div class="nice-select-wrapper-1">
                                {{-- <div class="single-select">
                                    <select wire:model="selectedCategory">
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="single-select">
                                    <select wire:model="selectedBrand">
                                        <option value="">All Brands</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             
                                <div class="single-select">
                                    <select wire:model="selectedVariation">
                                        <option value="">All Weight</option>
                                        @foreach (App\Models\ProductVariation::variations() as $key => $variation)
                                        <option value="{{ $key }}">{{ $variation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="button-area">
                                <button class="rts-btn" wire:click="applyFilter">Filter</button>
                                <button class="rts-btn" wire:click="resetFilter">Reset Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="product-area-wrapper-shopgrid-list mt--20 tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
                                                <img src="{{ $product->getFirstImage($product->id) }}" alt="grocery">
                                            </a>
                                            {{-- <div class="action-share-option">
                                                <div class="single-action " wire:click="addToWishlist({{$product->id}})" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </div>
                                                
                                            </div> --}}
                                        </div>
                                        <!-- iamge and sction area start -->


                                        <div class="body-content">

                                            <a href="{{ route('website-product-detail', $product->slug) }}">
                                                <h4 class="title">{{ $product->name }}</h4>
                                            </a>
                                            <div class="rating-stars-group ">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <div class="rating-star">
                                                        <i class="fas fa-{{ $i <= $product->reviews->average('rating') ? 'star' : ($i - 0.5 <= $product->reviews->average('rating') ? 'star-half-alt' : 'star') }}"></i>
                                                    </div>
                                                @endfor
                                                {{-- <span>{{ $product->reviews_count }} Reviews</span> --}}
                                            </div>




                                            <!-- <span class="availability">{{ $product->variation }}</span> -->

<span style="margin-top: 15px;display: grid;">
    <select id="companyProductDD{{$product->id}}" onchange="companyProductDDchange({{$product->id}})" class="pvariationsCls dropdwonCls" style="display:block;">
        @foreach($product->variations as $variation)
            <option value="{{ $variation->id }}" prodPrice="{{$variation->selling_price}}" prodOrgPrice="{{$variation->original_price}}" {{ $loop->first ? 'selected' : '' }}>{{ App\Models\ProductVariation::variation($variation->variation_id) }} 
            </option>
        @endforeach
    </select>   
</span>    





<div class="price-area">
<span class="current" id="companyprod_cur_{{$product->id}}">£{{ $product->variationPrice['selling_price'] }}</span>
<div class="previous" id="companyprod_org_{{$product->id}}">£{{ $product->variationPrice['original_price'] }}</div>
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
                                                       Add  wishlist
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
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop[ grid sidebar wrapper end -->


</div>
<script type="text/javascript">
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

</script>