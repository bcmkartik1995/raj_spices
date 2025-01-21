<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Shree Spices</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/admin-assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/admin-assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/admin-assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/admin-assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/admin-assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/admin-assets/vendor/css/pages/page-auth.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Helpers -->
    <script src="/admin-assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/admin-assets/js/config.js"></script>

  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="javascript:void(0)" class="app-brand-link gap-2" style="justify-content: center">
                  <img src="{{ env('LOCAL_URL')}}logo.jpg" alt="" style="width: 50%">
                  {{-- <span class="app-brand-text demo text-body fw-bolder">Shree Spices</span> --}}
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-4">Welcome to Shree Spices! 👋</h4>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                @csrf()
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    {{-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> --}}
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>
              {{-- <p class="text-center">
                <span>Forget Passowrd ? </span>
                <a href="{{ route('forgot-password')}}">
                  <span>Click Here</span>
                </a>
              </p> --}}
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/admin-assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/admin-assets/vendor/libs/popper/popper.js"></script>
    <script src="/admin-assets/vendor/js/bootstrap.js"></script>
    <script src="/admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/admin-assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/admin-assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  
  <script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(session('success'))
        toastr.success("{{ session('success') }}", "Welcome {{ session('username') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}", "Error");
    @endif
</script>

  </body>
</html>
