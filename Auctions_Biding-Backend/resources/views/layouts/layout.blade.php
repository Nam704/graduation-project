<!DOCTYPE html>
<html lang="en">

<!-- Header page -->

<head>
    <!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 13:03:29 GMT -->



    <meta charset="utf-8" />
    <title>Dashboard | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @stack('styles')

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

@include('layouts.header')


<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        @include('layouts.topbar')
        <!-- ========== Topbar End ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.leftSidebar')

        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
                <!-- Start Content-->

                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('layouts.themeSettings')

    <!-- End Theme Settings -->
    {{-- footer scripts --}}
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    @stack('scripts')



    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    {{-- End Footer Scripts --}}





</body>

<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 13:03:30 GMT -->

</html>