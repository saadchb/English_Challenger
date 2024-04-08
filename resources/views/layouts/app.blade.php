<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" href="{{ asset('build/assets/images/English_Icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bootstrap/bootstrap.css') }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bicon/css/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/themify/themify-icons.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/animate-css/animate.css') }}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce.css') }}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/responsive.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <style>
        #submit_btn:hover {
            background-color: #FAFAFA;
            border-color: #FAFAFA;
        }

        .icons1:hover {

            border-radius: 50%;
            text-align: center;
            background-color: #e0ceb6;
            color: black;
            padding: 10px;
            transform: translateY(0px);
            transition: all 0.3s ease-in-out;

        }

        .icons1 {
            border-radius: 50%;
            text-align: center;
            padding: 10px;

        }

        .div1 {
            border-radius: 15px;
        }

        .div1:hover {
            background-color: #00000056 !important;
            border: solid 1px #ffffffaa !important;
        }
        .loading {
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #fff url("{{ asset('build/assets/images/loading.gif') }}") no-repeat center center;
    z-index: 99999;
}


    </style>
    <title>EnglishChallenger | @yield('title')</title>
</head>
@include('layouts.css')
</head>

<body id="top-header" onload="myFunction()">
    <div class="loading"></div>
    <header>
        @include('layouts.header')
    </header>
    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="{{ route('search') }}" method="GET" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <h3>Search Your keyword</h3>
                            <!-- <input type="text" name="search" id="search" placeholder="Search..." class="form-control" onfocus="this.value=''" /> -->
                            <input name="search" id="search" type="text" class="form-control search-input" />
                            <!-- <button type="submit">Search</button> -->
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <img class="search-close" src="{{asset('build/assets/images/close.png')}}" srcset="build/assets/images/close@2x.png 2x" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="search_list"></div> <!-- Container for displaying search results -->

    <section class="content">
        @yield('content')
    </section>

    </div>
    </div>
    <section class="cta-2">
        <div class="container">
            <div class="row align-items-center subscribe-section ">
                <div class="col-lg-6">
                    <div class="section-heading white-text">
                        <span class="subheading">Newsletter</span>
                        <h3>Join our community of students</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer pt-120">
        @include('layouts.footer')
    </section>

    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

    @include('layouts.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Main jQuery -->
    <script src="{{ asset('storage/assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('storage/assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('storage/assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/jquery.isotope.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('storage/assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/script.js') }}"></script>

    <script>
        // JavaScript to show/hide the loading spinner
        window.onload = function() {
            // Hide the loading spinner when the page finishes loading
            document.querySelector('.loading').style.display = 'none';
        };
    </script>
</body>

</html>