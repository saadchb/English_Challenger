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

    <style>
        body {
            background-image: url("{{asset('build/assets/images/bg/38414911.jpg')}}");
            position: absolute;

            background-size: cover;

        }

        .btn-social-icon,
        .btn-social {
            border: none;
            border-radius: 3px
        }

        .btn-social-icon {
            color: #fff !important;

        }

        .btn-social-icon>:first-child {
            font-size: 16px
        }

        .btn-social {
            text-align: center;
            padding: 12px 12px 12px 12px;
            color: #fff !important;
            font-weight: 500
        }

        .btn-social>:first-child {
            /* width: 45px; */
            /* line-height: 50px; */
            border-right: none
        }
    </style>
    <title>EnglishChallenger </title>

    @include('layouts.css')

</head>

<body>

    <div id="app">
        <section class="section">
            <div class="container mt-3  ">
                <center class="mb-3">
                    <div class="col-lg-6">
                        <div class="card card-primary " style="border-radius:25px ;background-color: #f9f9f9d0;">

                            <div class="card-body ">
                                <div class="login-brand mb-3 mt-1" align="center">
                                    <a href="/"><img src="{{ asset('build/assets/images/English_Logo.png') }}" alt="logo" width="150" class="shadow-light "></a>
                                </div>
                                <h4 align="center">Sign in to your <a href="/"> EnglishChallenger</a> account</h4><br><br>

                                <form action="{{ route('loginShool') }}" method="post">
                                    @csrf <!-- cross-site-request-forgery -->
                                    <div class="form-group text-left">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control mb-2"
                                            name="email" tabindex="1" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger "> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control"
                                                name="password" tabindex="2" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i style="cursor: pointer;" class="fa fa-eye"
                                                        id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="woocommerce-Button button btn-lg btn-block"
                                            tabindex="4">
                                            Login
                                        </button>

                                    </div>
                                </form>
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters text-center">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook bg-primary"><span class="fab fa-facebook"></span> Facebook</a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-google" style="background-color: #db7c1e;"><span class="fab fa-google"></span> Google</a>
                                    </div>
                                </div>

                                <div class="mt-5 mb-4 text-muted text-center">
                                    Don't have an account?
                                        <a href="{{ route('registerSchoolFrom') }}">
                                    Create One</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>

                </div>
            </center>
        </div>
    </section>
    </div>
    <script>
        const passwordField = document.getElementById("password");
        const togglePassword = document.querySelector("#togglePassword");

        togglePassword.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            }
        });
    </script>
</body>

</html>
