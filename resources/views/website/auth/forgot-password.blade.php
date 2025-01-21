@extends('website.template.layout')
@section('content')
{{-- <script>
    .form-control {
    height: auto; /* Ensure consistent height */
    padding-right: 2.5rem; /* Adjust to create space for the icon */
}

.toggle-password1, .toggle-password2 {
    line-height: 1; /* Ensures proper alignment */
}

</script> --}}
<!-- Forgot Password Area Start -->
<div class="rts-register-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="registration-wrapper-1">
                    <div class="logo-area mb--0">
                        <img class="mb--10" src="{{ env('LOCAL_URL') }}logo.jpg" alt="logo">
                    </div>
                    <h3 class="title">Forgot Password</h3>
                    <form id="forgot-password-form" class="registration-form">
                        @csrf
                        <div id="email-section">
                            <div class="input-wrapper">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <button type="button" id="send-otp-btn" class="rts-btn btn-primary">Send OTP</button>
                        </div>

                        <div id="otp-section" style="display: none;">
                            <div class="input-wrapper">
                                <label for="otp">Enter OTP*</label>
                                <input type="text" id="otp" name="otp" required>
                            </div>
                            <button type="button" id="verify-otp-btn" class="rts-btn btn-primary">Verify OTP</button>
                        </div>

                        <div id="reset-password-section" style="display: none;">
                            <div class="form-group position-relative">
                                <label for="password">New Password*</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span class="position-absolute top-50 translate-middle-y end-0 pe-3 toggle-password1" style="cursor: pointer;top:70% !important">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="password_confirmation">Confirm Password*</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                <span class="position-absolute top-50 translate-middle-y end-0 pe-3 toggle-password2" style="cursor: pointer;top:70% !important">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            
                            
                            
                            <button type="button" id="reset-password-btn" class="rts-btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password Area End -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        // Function to toggle button loading state
        $(document).ready(function () {
    // Function to toggle button loading state
    function toggleLoading(button, isLoading, percentage = 0) {
        // Spinner with increased size (larger than the default size)
        const spinner = `<span class="spinner-border spinner-border-lg me-2" role="status" aria-hidden="true"></span>`;

        // If loading, show spinner and progress
        if (isLoading) {
            if (!button.find('.spinner-border').length) {
                button.prepend(spinner);  // Add spinner to the button if it's not already added
            }

            // Update or add percentage text
            let progressText = button.find('.loading-progress');
            if (progressText.length) {
                progressText.text(`${percentage}%`);  // Update the existing percentage text
            } else {
                progressText = `<span class="loading-progress ms-2">${percentage}%</span>`;
                button.append(progressText);  // Add percentage text if not present
            }
        } else {
            button.prop('disabled', false);
            button.find('.spinner-border').remove();  // Remove spinner
            button.find('.loading-progress').remove();  // Remove percentage
        }
    }

    // Send OTP
    $('#send-otp-btn').click(function () {
        const button = $(this);
        const email = $('#email').val();

        toggleLoading(button, true, 0);  // Start with 0% progress

        let progress = 0;
        let progressInterval;

        // Simulate loading progress
        const startProgress = () => {
            progressInterval = setInterval(function () {
                if (progress < 100) {
                    progress += 10;
                    toggleLoading(button, true, progress);
                } else {
                    clearInterval(progressInterval);  // Stop progress once it's 100%
                }
            }, 500);
        };

        // Start the progress simulation
        startProgress();

        $.post('{{ route('forgot-password.send-otp') }}', { _token: '{{ csrf_token() }}', email: email })
            .done(function (response) {
                clearInterval(progressInterval);  // Stop progress on success

                toggleLoading(button, false);  // Stop the loading animation

                if (response.success) {
                    $('#email-section').hide();
                    $('#otp-section').show();
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent!',
                        text: response.message
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            })
            .fail(function () {
                clearInterval(progressInterval);  // Stop progress on error

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });

                toggleLoading(button, false);  // Stop the loading animation
            });
    });
});


    
        // Verify OTP
        $('#verify-otp-btn').click(function () {
            const button = $(this);
            const otp = $('#otp').val();
    
            // toggleLoading(button, true);
    
            $.post('{{ route('forgot-password.verify-otp') }}', {
                _token: '{{ csrf_token() }}',
                otp: otp
            }).done(function (response) {
                if (response.success) {
                    $('#otp-section').hide();
                    $('#reset-password-section').show();
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Verified!',
                        text: response.message
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid OTP',
                        text: response.message
                    });
                }
            }).fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }).always(function () {
                // toggleLoading(button, false);
            });
        });
    
        // Reset Password
        $('#reset-password-btn').click(function () {
            const button = $(this);
            const password = $('#password').val();
            const password_confirmation = $('#password_confirmation').val();
    
            // toggleLoading(button, true);
    
            $.post('{{ route('forgot-password.reset-password') }}', {
                _token: '{{ csrf_token() }}',
                password: password,
                password_confirmation: password_confirmation
            }).done(function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Reset Successful',
                        text: response.message
                    }).then(() => {
                        window.location.href = '{{ route('website-auth-login') }}';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            }).fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }).always(function () {
                // toggleLoading(button, false);
            });
        });
    });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
<script>
    $(document).ready(function () {
    $('.toggle-password1').click(function () {
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

    $('.toggle-password2').click(function () {
        let passwordField = $('#password_confirmation');
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
