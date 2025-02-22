<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
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

    <title>@yield('title')</title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{  env('LOCAL_URL') }}admin-assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/apex-charts/apex-charts.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
      <!-- Add Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+uG3cHIXBv8BO93Q5fBzYxJYP0cbkz6N5N16zD4e51s2pyR6rmctebB4Z" crossorigin="anonymous">
  
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/js/config.js"></script>
    @yield('import-css')
    @yield('page-css')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
     
        @include('admin.template.left-sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('admin.template.header')

          <!-- / Navbar -->

            @yield('content')
         
         
            @include('admin.template.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/popper/popper.js"></script>
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/js/bootstrap.js"></script>
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{  env('LOCAL_URL') }}admin-assets/js/dashboards-analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

       @if ($errors->any())
           toastr.error("{{ $errors->first() }}", "Validation Error");
       @endif

  
  </script>   
   @yield('import-js')
   @yield('page-js')
  </body>
</html>
