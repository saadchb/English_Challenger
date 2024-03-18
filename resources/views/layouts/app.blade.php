<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">
    <link rel="icon" href="{{ asset('build/assets/images/icon_challenger.png') }}" type="image/x-icon">
    <meta name="author" content="themeturn.com">

    <title>EnglishChallenger | @yield('title')</title>
</head>
@include('layouts.css')
</head>

<body id="top-header">
    <header>
        @include('layouts.header')
    </header>
    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <h3>Search Your keyword</h3>
                            <input type="text" class="form-control" placeholder="Search..." />
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <img class="search-close" src="build/assets/images/close.png" srcset="build/assets/images/close@2x.png 2x" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <section class="content">
        
        @yield('content')
    </section>

    </div>
    </div>

    <section class="footer pt-120">
        @include('layouts.footer')
    </section>

    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

    @include('layouts.js')
</body>

</html>