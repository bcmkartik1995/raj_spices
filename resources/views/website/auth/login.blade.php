@extends('website.template.layout')
@section('content')

    <!-- rts register area start -->
    <div class="rts-register-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-wrapper-1">
                        <div class="logo-area mb--0">
                            <img class="mb--10" src="{{ env('LOCAL_URL') }}logo.jpg" alt="logo">
                        </div>
                        <h3 class="title">Login Into Your Account</h3>
                        <form action="{{ route('website-auth-login') }}" method="post" class="registration-form">
                            @csrf
                            <div class="input-wrapper">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="input-wrapper">
                                <label for="password">Password*</label>
                                <div class="password-wrapper" style="position: relative;">
                                    <input type="password" id="password" name="password">
                                    <span class="toggle-password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <button class="rts-btn btn-primary">Login Account</button>
                            <div class="another-way-to-registration">
                                <p>Don't Have Account? <a href="{{ route('website-auth-register') }}">Register</a></p>
                                <p><a href="{{ route('forgot-password') }}">Forgot your password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts register area end -->

    <!-- Include FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.toggle-password').click(function () {
                let passwordField = $('#password');
                let passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).html('<i class="fa fa-eye"></i>');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).html('<i class="fa fa-eye-slash"></i>');
                }
            });
        });
    </script>

@endsection
