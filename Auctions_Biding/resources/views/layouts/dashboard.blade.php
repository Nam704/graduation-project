<!DOCTYPE html>
<html lang="en">

<!-- Header page -->


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






</body>

<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 13:03:30 GMT -->

</html>