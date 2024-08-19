<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Ruang Dualapan</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>

    <header id="header" id="home">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
                        <ul>
                            <li>Mon-Fri: 8am to 2pm</li>
                            <li>Sat-Sun: 11am to 4pm</li>
                            <li><a href="tel:(012) 6985 236 7512">(012) 6985 236 7512</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#buy">Menu</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <!-- start banner Area -->
    <section class="banner-area" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content col-lg-7">
                    <h6 class="text-white text-uppercase">Now you canfeel the Energy</h6>
                    <h1>
                        Start your day with <br>
                        a black Coffee
                    </h1>
                    <a href="#buy" class="primary-btn text-uppercase">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start video-sec Area -->
    <section class="video-sec-area pb-100 pt-40" id="about">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                    <div class="overlay overlay-bg"></div>
                    <a class="play-btn" href="https://www.youtube.com/watch?v=jhlCWuK0V8s"><img class="img-fluid" src="{{ asset('assets/img/play-icon.png') }}" alt=""></a>
                </div>
                <div class="col-lg-6 video-left">
                    <h6>Live Coffee making process.</h6>
                    <h1>We Telecast our <br>Coffee Making Live</h1>
                    <p><span>We are here to listen from you deliver exellence</span></p>
                    <p>Selamat datang di <strong>Ruang Dualapan</strong>, destinasi utama bagi para pecinta kopi yang mencari pengalaman unik dan menyenangkan. Kami adalah coffeshop yang mengedepankan kualitas dan kenyamanan, menyediakan berbagai varian kopi spesialti yang diolah dengan teknik modern namun tetap mempertahankan cita rasa tradisional.</p>

                    <p>Di <strong>Ruang Dualapan</strong>, kami percaya bahwa setiap cangkir kopi adalah sebuah karya seni. Tim barista kami yang terlatih dengan baik siap menyajikan kopi dengan rasa yang konsisten dan berkualitas tinggi. Selain kopi, kami juga menawarkan berbagai pilihan makanan ringan dan kue-kue segar yang dipilih dengan teliti untuk melengkapi pengalaman Anda.</p>


                    <img class="img-fluid" src="{{ asset('assets/img/signature.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End video-sec Area -->

    <!-- Start menu Area -->
<section class="menu-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center mb-4">
            <div class="menu-content pb-60 col-lg-10 text-center">
                <h2 class="display-5 mb-4">Kopi Berkualitas, Suasana yang Hangat</h2>
                <p class="lead fs-4">Temukan Kenikmatan di Setiap Tegukan.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{ $item->name }}</h4>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small>Posted on {{ date('F j, Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End menu Area -->


<!-- Start gallery Area -->
<section class="gallery-area section-gap" id="buy">
    <div class="container">
        <div class="row d-flex justify-content-center mb-4">
            <div class="menu-content pb-60 col-lg-10 text-center">
                <h1 class="display-3 mb-4">Our Menu</h1>
                <p class="lead fs-4">"Lebur dalam Aroma Kopi yang Menggoda, Nikmati Momen Berharga di Sini"</p>
            </div>
        </div>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg border-light rounded position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-top" alt="{{ $item->name }}">
                        <div class="card-body d-flex flex-column justify-content-between position-relative z-index-1">
                            <div>
                                <h3 class="card-title fs-4 mb-3">{{ $item->name }}</h3>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="badge bg-dark text-white fs-6 p-2">Quantity: {{ $item->quantity }}</span>
                                <span class="text-success fw-bold fs-4">Rp {{ number_format($item->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Add this to your CSS file or inside <style> tag -->
<style>
    .gallery-area {
        background: #f9f9f9;
        padding: 60px 0;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .card-img-top {
        object-fit: cover;
        height: 200px;
        transition: transform 0.3s ease;
    }
    .card-img-top:hover {
        transform: scale(1.05);
    }
    .card-body {
        background: #ffffff;
    }
    .badge {
        font-size: 0.875rem; /* Adjust font size */
    }
</style>



    
    <!-- End gallery Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>Di <strong>Ruang Dualapan</strong>, kami percaya bahwa setiap cangkir kopi adalah sebuah karya seni. Tim barista kami yang terlatih dengan baik siap menyajikan kopi dengan rasa yang konsisten dan berkualitas tinggi. Selain kopi, kami juga menawarkan berbagai pilihan makanan ringan dan kue-kue segar yang dipilih dengan teliti untuk melengkapi pengalaman Anda.</p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Ruang Dualapan <i class="fa fa-heart-o" aria-hidden="true"></i> by <a target="_blank">Randy</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 footer-social">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <!--
    JS
    ============================================= -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
