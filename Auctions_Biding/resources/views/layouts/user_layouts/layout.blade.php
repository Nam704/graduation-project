<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 13:03:37 GMT -->
{{-- header start --}}
@include('layouts.user_layouts.header')

{{-- end header --}}

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            @yield('content')
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
    {{-- footer start --}}
    @include('layouts.user_layouts.footer')

    {{-- end footer --}}
</body>


<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 13:03:37 GMT -->

</html>