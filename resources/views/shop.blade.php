<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nusantara Beton</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/fa-logo.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap-image-checkbox.css">

</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="img/logoNB.png" alt="" style="margin-bottom: 5px">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="img/logoNB.png" width="150px" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="d-block d-lg-none">
                                        <a href="/login">
                                            <span class="flaticon-user"></span>
                                            @guest
                                            {{--  --}}
                                            @else
                                            <b class="text-dark ml-1"> {{ Auth::user()->name  }}</b>
                                            @endguest
                                        </a>
                                    </li>
                                    <li class="d-none d-lg-block"><a class="text-white">.</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right d-none d-lg-block">
                            <ul>
                                @guest
                                <li>
                                    <a class="text-dark" href="/login">
                                        Masuk / Daftar
                                        <span class="flaticon-user"></span>
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a class="text-dark" href="/login">
                                        {{Auth::user()->name}}
                                        <span class="flaticon-user"></span>
                                    </a>
                                </li>
                                @endguest
                                <li><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider slider-height2 d-flex align-items-center slide-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Pemesanan & Penyewaan Online</h2>
                                <p class="text-white">Fitur ini kami persembahkan kepada para pelanggan dalam memesan
                                    produk atau menyewa
                                    kendaraan & alat secara online.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-order" role="tab" aria-controls="nav-home" aria-selected="true">Pemesanan
                                    Produk</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-rental"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Penyewaan Alat &
                                    Kendaraan</a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-order" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="container col-xl-9 col-md-12 col-sm-12">
                                @guest
                                <div class="d-flex p-2 bd-highlight bg-light p-3">You must Login / Register first!
                                </div>
                                @else
                                <form action="#">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectJenis">Nama Pelanggan</label>
                                        </div>
                                        <select class="custom-select col-xl-2 col-md-6" id="selectJenis">
                                            <option selected value="">Jenis</option>
                                            <option value="1">PT</option>
                                            <option value="2">CV</option>
                                            <option value="3">Instansi Pendidikan</option>
                                            <hr>
                                            <option value="3">Tuan</option>
                                            <option value="3">Nyonya</option>
                                        </select>
                                        <input type="text" class="form-control col-md-12" name="nama_pelanggan"
                                            style="height: 42px" placeholder="Contoh: Nusantara Beton">
                                    </div>
                                    <div class="d-flex p-2 bg-light mb-3 border rounded">Pilih Produk</div>
                                    <div class="row input-group">
                                        <div class="col-xl-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck1" name="1">
                                                <label class="custom-control-label" for="ck1">
                                                    <img src="img/services1.jpg" alt="#" height="200">
                                                    <p class="text-center">Paving 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck2" name="1">
                                                <label class="custom-control-label" for="ck2">
                                                    <img src="img/services2.jpg" alt="#" height="200">
                                                    <p class="text-center">Paving 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-12 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck3" name="1">
                                                <label class="custom-control-label" for="ck3">
                                                    <img src="img/services3.jpg" alt="" height="200">
                                                    <p class="text-center">Paving 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-12 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck4" name="1">
                                                <label class="custom-control-label" for="ck4">
                                                    <img src="img/services4.jpg" alt="#" height="200">
                                                    <p class="text-center">Paving 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row input-group">
                                        <div class="col-xl-3 col-md-12 mb-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck5" name="1">
                                                <label class="custom-control-label" for="ck5">
                                                    <img src="img/services1.jpg" alt="#" height="200">
                                                    <p class="text-center">U-Ditch 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-12 mb-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck6" name="1">
                                                <label class="custom-control-label" for="ck6">
                                                    <img src="img/services2.jpg" alt="#" height="200">
                                                    <p class="text-center">U-Ditch 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-12 mb-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck7" name="1">
                                                <label class="custom-control-label" for="ck7">
                                                    <img src="img/services3.jpg" alt="" height="200">
                                                    <p class="text-center">U-Ditch 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-12 mb-3 form-check">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="ck8" name="1">
                                                <label class="custom-control-label" for="ck8">
                                                    <img src="img/services4.jpg" alt="#" height="200">
                                                    <p class="text-center">U-Ditch 4x3</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectJenis">Total Pcs</label>
                                        </div>
                                        <input type="number" class="form-control col-md-12" name="total"
                                            placeholder="Contoh: 2000 pcs" style="height: 42px">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectJenis">Tanggal Pengiriman</label>
                                        </div>
                                        <input type="date" class="form-control col-md-12" name="tanggal_pengiriman"
                                            style="height: 42px">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectJenis">Alamat Pengiriman</label>
                                        </div>
                                        <input type="text" class="form-control col-md-12" name="alamat_pengiriman"
                                            style="height: 42px"
                                            placeholder="Contoh: Jl. Bisma No. 22, Kecamatan Rungkut, Kota Surabaya">
                                    </div>
                                    <button type="submit" class=" col btn btn-primary">Pesan</button>
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- Card two -->
                    <div class="tab-pane fade" id="nav-rental" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="container col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                @guest
                                <div class="d-flex p-2 bd-highlight bg-light p-3">You must Login / Register first!
                                </div>
                                @else
                                <form action="/rental" method="POST">
                                    <div class="mb-3">
                                        <label for="NameRental" class="form-label">Name Rental</label>
                                        <input type="text" class="form-control" id="NameRental">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TotalRental" class="form-label">Total Rental</label>
                                        <input type="text" class="form-control" id="TotalRental">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                &copy; <script>
                                    document.write(new Date().getFullYear());

                                </script> Nusantara Cipta Teknologi
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                {{-- <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a> --}}
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
