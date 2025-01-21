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
                        "Bringing the Taste of Tradition to Every Table, One Jar at a Time!"

                    </p>
                    <a href="{{route('website-contact')}}" class="rts-btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts banner area about end -->
<!-- rts counter area start -->


<div class="rts-about-area rts-section-gap2">
    <div class="container-3">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="thumbnail-left">
                    <img src="{{env('LOCAL_URL')}}vis-mis.webp" alt="">
                </div>
                
            </div>
            <div class="col-lg-8 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
                <div class="about-content-area-1">
                    <h2 class="title">
                        Our Vision
                    </h2>
                    <p class="disc" style="font-style: italic;">
                        <b> To become the leading brand in delivering authentic Indian pickles, groceries, and products globally, ensuring every Indian abroad feels connected to their roots.</b>
                    </p>
                    <h2 class="title">
                        Our Mission
                    </h2>
                    <p class="disc" style="font-style: italic;">
                        <b> To provide premium-quality, traditional Indian products to customers worldwide, maintaining authenticity, freshness, and a taste of home with every offering</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
