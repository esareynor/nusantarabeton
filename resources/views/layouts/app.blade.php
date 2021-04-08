<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if(Auth::user()->role == 'admin')
    <title>Nusantara Beton | Admin Page</title>
    @else
    <title>Nusantara Beton | Member Page </title>
    @endif
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('img/fa-logo.png') }} ">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href=" {{ asset('graintheme/public/demo/chartist.css') }}">
    <link rel="stylesheet" href=" {{ asset('graintheme/public/demo/chartist-plugin-tooltip.css') }}">

    <!-- Template -->
    <link rel="stylesheet" href=" {{ asset('graintheme/public/graindashboard/css/graindashboard.css') }} ">

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="{{ asset('img/fa-logo.png') }}" alt="Graindashboard">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="/">
                    <img class="side-nav-show-on-closed" src="{{ asset('img/fa-logo.png') }}" alt="Graindashboard"
                        style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="{{ asset('img/logoNB.png') }}" alt="Graindashboard"
                        style="width: auto; height: 50px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                        data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->


                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-auto">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#profileMenu" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            <span class="d-none d-md-block">{{ Auth::user()->name }}</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    My Profile
                                </a>
                            </li>
                            <li class="unfold-item unfold-item-has-divider">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-power-off"></i>
                                    </span>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="sidebar-heading h6">{{ strtoupper(Auth::user()->role) }}</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item {{ request()->routeIs('home') ? 'active' : '' }}"">
                    <a class=" side-nav-menu-link media align-items-center" href="/home">
                    <span class="side-nav-menu-icon d-flex mr-3">
                        <i class="gd-bar-chart"></i>
                    </span>
                    <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->
                <!-- Landing -->
                <li class="side-nav-menu-item side-nav-has-menu 
                    {{ request()->routeIs('product') ? 'side-nav-opened active' : '' }} 
                    {{ request()->routeIs('service') ? 'side-nav-opened active' : '' }}
                    {{ request()->routeIs('equipment') ? 'side-nav-opened active' : '' }}
                    {{ request()->routeIs('project') ? 'side-nav-opened active' : '' }}
                    {{ request()->routeIs('news') ? 'side-nav-opened active' : '' }}">
                    <a class=" side-nav-menu-link media align-items-center" href="#" data-target="#subLanding">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-archive"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Landing Page</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Landing: subLanding -->
                    <ul id="subLanding" class="side-nav-menu side-nav-menu-second-level mb-0" style=" display: 
                        @if(request()->routeIs('product') || request()->routeIs('service') ||
                        request()->routeIs('equipment') || request()->routeIs('project') || request()->routeIs('news'))
                        block
                        @else
                        none
                        @endif">
                        <li class=" side-nav-menu-item {{ request()->routeIs('product') ? 'active' : '' }}"">
                        <a class=" side-nav-menu-link" href="/product">Product</a>
                        </li>
                        <li class="side-nav-menu-item {{ request()->routeIs('service') ? 'active' : '' }}"">
                            <a class=" side-nav-menu-link" href="/service">Services</a>
                        </li>
                        <li class="side-nav-menu-item {{ request()->routeIs('equipment') ? 'active' : '' }}"">
                            <a class=" side-nav-menu-link" href="/equipment">Equipment</a>
                        </li>
                        <li class="side-nav-menu-item {{ request()->routeIs('project') ? 'active' : '' }}"">
                            <a class=" side-nav-menu-link" href="/project">Project</a>
                        </li>
                        <li class="side-nav-menu-item {{ request()->routeIs('news') ? 'active' : '' }}"">
                            <a class=" side-nav-menu-link" href="/news">News</a>
                        </li>
                    </ul>
                    <!-- End Landing: subLanding -->
                </li>
                <!-- End Landing -->

                <!-- Title -->
                <li class="sidebar-heading h6">LAYANAN</li>
                <!-- End Title -->

                <!-- Pesanan -->
                <li class="side-nav-menu-item {{ request()->routeIs('pesanan') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="/pesanan">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-bag"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Pesanan</span>
                    </a>
                </li>
                <!-- End Pesanan -->
                <!-- Penyewaan -->
                <li class="side-nav-menu-item {{ request()->routeIs('penyewaan') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="/penyewaan">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-truck"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Penyewaan</span>
                    </a>
                </li>
                <!-- End Penyewaan -->

            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">

            {{-- MAIN CONTENT!! --}}
            @yield('content')
            {{-- MAIN CONTENT!! --}}

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        &copy; 2021 Nusantara Beton.
                    </div>

                    <div class="col-lg text-center text-lg-right">
                        All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>


    <script src="{{ asset('graintheme/public/graindashboard/js/graindashboard.js') }}"></script>
    <script src="{{ asset('graintheme/public/graindashboard/js/graindashboard.vendor.js') }}"></script>

    <!-- DEMO CHARTS -->
    <script src="{{ asset('graintheme/public/demo/resizeSensor.js') }}"></script>
    <script src="{{ asset('graintheme/public/demo/chartist.js') }}"></script>
    <script src="{{ asset('graintheme/public/demo/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('graintheme/public/demo/gd.chartist-area.js') }}"></script>
    <script src="{{ asset('graintheme/public/demo/gd.chartist-bar.js') }}"></script>
    <script src="{{ asset('graintheme/public/demo/gd.chartist-donut.js') }}"></script>
    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');

    </script>
</body>

</html>
