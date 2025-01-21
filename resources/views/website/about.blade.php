@extends('website.template.layout')

@section('content')
  <!-- rts banner area about -->
  <div class="about-banner-area-bg rts-section-gap bg_iamge">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content-about-area">
                    <h1 class="title">Do You Want To Know Us?</h1>
                    <p class="disc">
                        "From Our Kitchen to Yours – Pickles, Jams & More!"
                    </p>
                    <a href="{{route('website-contact')}}" class="rts-btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts banner area about end -->
<!-- rts counter area start -->
<div class="rts-counter-area">
    <div class="container-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="counter-area-main-wrapper">
                    <div class="single-counter-area">
                        <h2 class="title"><span class="counter">60</span>M+</h2>
                        <p>
                            Happy <br>
                            Customers
                        </p>
                    </div>
                    <div class="single-counter-area">
                        <h2 class="title"><span class="counter">105</span>M+</h2>
                        <p>
                            Grocery <br>
                            Products
                        </p>
                    </div>
                    <div class="single-counter-area">
                        <h2 class="title"><span class="counter">80</span>K+</h2>
                        <p>
                            Active <br>
                            Salesman
                        </p>
                    </div>
                    <div class="single-counter-area">
                        <h2 class="title"><span class="counter">60</span>K+</h2>
                        <p>
                            Store <br>
                            Worldwide
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rts-about-area rts-section-gap2">
    <div class="container-3">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="thumbnail-left">
                    <img src="{{env('LOCAL_URL')}}website-assets/images/about/02.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-8 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
                <div class="about-content-area-1">
                    <h2 class="title">
                         Your Trusted Source for <br> Premium Pickles, Jams, Spices and More                       </h2>
                    <p class="disc">
                        We are importer and distributors of Indian grocery, Spices, pickle, flour, Grain, rice, Indian authentic food products and kitchen appliances from across the world. We We have our retail outlet for offline sales know as shree spice then we have introduced indias most famous brands under RASOI QUEEN AND TASTEMPL. We serve ofline sales since 15 years and customers support and them demands now we have started our online sales in Amazon and our own website under associates company AMRUT INTERNATIONAL UK LTD. we are committed to serve good quality, competitive price and timely delivery.                    </p>
                        <div class="check-main-wrapper">
                            <div class="single-check-area">
                                Made with 100% natural and fresh ingredients
                            </div>
                            <div class="single-check-area">
                                Authentic pickles and jams preserving traditional flavors
                            </div>
                            <div class="single-check-area">
                                No artificial preservatives or additives used
                            </div>
                            <div class="single-check-area">
                                Wide variety of flavors to suit every taste
                            </div>
                            <div class="single-check-area">
                                Perfect blend of spices for an irresistible taste
                            </div>
                            <div class="single-check-area">
                                Hygienically prepared and packed for freshness
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>


<div class="rts-about-area rts-section-gap2">
    <div class="container-3">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="thumbnail-left">
                    <img src="https://shreespices.co.uk/vis-mis.webp" alt="">
                </div>
            </div>
            <div class="col-lg-8 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
                <div class="about-content-area-1">
                    <h2 class="title">
                         Our Vision and Mission                       </h2>
                    <p class="disc">
                        To become the leading brand in delivering authentic Indian pickles, groceries, and products globally, ensuring every Indian abroad feels connected to their roots.                    
                    </p>
                        
                    <p class="disc">
                        To provide premium-quality, traditional Indian products to customers worldwide, maintaining authenticity, freshness, and a taste of home with every offering                    
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
