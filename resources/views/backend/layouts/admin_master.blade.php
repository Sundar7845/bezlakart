<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BezlaKart Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!---- Toasitfy Js ---->
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" />
    <!---- Select2 ---->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('js/datatable/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/datatable/responsive.bootstrap.min.css') }}" />

    <!--Header-->
    @yield('header')
    <!-- /Header-->
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!--Sidebar Menu --> @include('backend.panels.sidebar')
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar --> @include('backend.panels.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="main-content">
                        <div class="page-content">
                            <div class="container-fluid">
                                <!-- Content -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    @include('backend.panels.footer') <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    <!-- JQEURY -->
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/datatable/datatables.init.js') }}"></script>

    <!--select2 cdn-->
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2/select2.init.js') }}"></script>

    <!-- notifications init -->
    <script src="{{ asset('js/pages/notifications.init.js') }}"></script>
    <!---- Toasitfy Js ---->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!---- Jquery Validation ---->
    <script src="{{ asset('jquery.validate.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('libs/prismjs/prism.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/hamburger.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Common js -->
    <script src="{{ asset('js/common/common.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            var message = "{{ Session::get('message') }}";

            function showToast(type, message, color, icon) {
                Toastify({
                    text: message,
                    icon: icon,
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: color
                    },
                    onClick: function() {}
                }).showToast();
            }

            switch (type) {
                case 'info':
                    showToast(type, message, "blue", "success");
                    break;
                case 'success':
                    showToast(type, message, "green", "success");
                    break;
                case 'warning':
                    showToast(type, message, "orange", "success");
                    break;
                case 'error':
                    showToast(type, message, "red", "success");
                    break;
            }
        @endif
    </script>


    @yield('footer')
</body>

</html>
