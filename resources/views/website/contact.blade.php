@extends('website.template.layout')

@section('content')

    <!-- rts contact main wrapper -->
    <div class="rts-contact-main-wrapper-banner bg_image">
        <div class="container">
            <div class="row">
                <div class="co-lg-12">
                    <div class="contact-banner-content">
                        <h1 class="title">
                            Get in Touch with Shree Spices

                        </h1>
                        <p class="disc">
                            Have questions or need assistance? We're here to help!

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts contact main wrapper end -->

    <div class="rts-map-contact-area rts-section-gap2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-left-area-main-wrapper">
                        <h2 class="title">
                            You can ask us questions !
                        </h2>
                        <p class="disc">
                            Contact us for all your questions and opinions, or you can solve your problems in a shorter time with our contact offices.
                        </p>
                        <div class="location-single-card">
                            <div class="icon">
                                <i class="fa-light fa-location-dot"></i>
                            </div>
                            <div class="information">
                                {{-- <h3 class="title">Berlin Germany Store</h3>
                                <p>259 Daniel Road, FKT 2589 Berlin, Germany.</p> --}}
                                <a href="tel:+447900119463" class="number">+44 7900119463</a>
                                <a href="mailto:amrutint.uk@gmail.com" class="email">amrutint.uk@gmail.com</a>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-8 pl--50 pl_sm--5 pl_md--5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2420.5442655546667!2d-1.1180417!3d52.650146199999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877610be280cb8f%3A0x59584cd3cd2f6cc4!2s85%20Harrison%20Rd%2C%20Leicester%20LE4%206BT%2C%20UK!5e0!3m2!1sen!2sin!4v1736006324099!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>
        </div>
    </div>

    <!-- rts contact-form area start -->
    {{-- <div class="rts-contact-form-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg_light-1 contact-form-wrapper-bg">
                        <div class="row">
                            <div class="col-lg-7 pr--30 pr_md--10 pr_sm--5">
                                <div class="contact-form-wrapper-1">
                                    <h3 class="title mb--50">Fill Up The Form If You Have Any Question</h3>
                                    <form action="contact.html#" class="contact-form-1">
                                        <div class="contact-form-wrapper--half-area">
                                            <div class="single">
                                                <input type="text" placeholder="name*">
                                            </div>
                                            <div class="single">
                                                <input type="text" placeholder="Email*">
                                            </div>
                                        </div>
                                        <div class="single-select">
                                            <select>
                                                <option data-display="Subject*">All Categories</option>
                                                <option value="1">Some option</option>
                                                <option value="2">Another option</option>
                                                <option value="3" disabled>A disabled option</option>
                                                <option value="4">Potato</option>
                                            </select>
                                        </div>
                                        <textarea name="message" placeholder="Write Message Here"></textarea>
                                        <button class="rts-btn btn-primary mt--20">Send Message</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5 mt_md--30 mt_sm--30">
                                <div class="thumbnail-area">
                                    <img src="assets/images/contact/02.jpg" alt="contact_form">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- rts contact-form area end -->



    
@stop
