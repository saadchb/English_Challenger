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

        /* #form_login {
            background-color: #e3e3e3;
        } */


        .title-container {

            text-align: center;
            /* Center the content horizontally */
            font-size: larger;
            font-family: Arial, Helvetica, sans-serif;
        }

        button {}
    </style>
    <title>EnglishChallenger </title>

    @include('layouts.css')

</head>

<body>


    <section class="section">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary mb-4 " style="border-radius:25px ;background-color: #f9f9f9d0;">

                        <div class="card-body">
                        <div class="login-brand mb-3 mt-1" align="center">
                        <a href="/" ><img src="{{ asset('build/assets/images/English_Logo.png') }}" alt="logo" width="150" class="shadow-light "></a>
                            </div>
                            <h4 align="center">Create your <a href="/" > EnglishChallenger</a> account</h4><br><br>

                            <form action="{{route('Teachers.store')}}" class="woocommerce-form woocommerce-form-register register" method="POST">
                                @csrf
                                <div class="row">

                                    @if(!$errors->has('first_name'))
                                    <div class="form-group col-6">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus>
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="first_name" class="text-danger">first name (Erreur)</label>
                                        <input id="first_name" type="text" class="form-control is-invalid" name="first_name" value="{{ old('first_name') }}" required autocomplete="family-name">
                                        <div class="mt-2 text-danger">{{ $errors->first('first_name') }}</div>
                                    </div>
                                    @endif
                                    @if(!$errors->has('last_name'))
                                    <div class="form-group col-6">
                                        <label for="last_name">last Name</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name">
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="last_name" class="text-danger">last name (Erreur)</label>
                                        <input id="last_name" type="text" class="form-control is-invalid" name="last_name" value="{{ old('last_name') }}">
                                        <div class="mt-2 text-danger">{{ $errors->first('last_name') }}</div>
                                    </div>
                                    @endif
                                </div>

                                @if(!$errors->has('email'))
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @else
                                <div class="form-group ">
                                    <label for="email" class="text-danger">email (Erreur)</label>
                                    <input id="email" type="text" class="form-control is-invalid" name="email" value="{{ old('email') }}">
                                    <div class="mt-2 text-danger">{{ $errors->first('email') }}</div>
                                </div>
                                @endif
                                <div class="row">
                                    @if(!$errors->has('password'))
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required autocomplete="new-password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block text-danger">Password (Erreur)</label>
                                        <input id="password" type="password" class="form-control pwstrength is-invalid" data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="mt-2 text-danger">{{ $errors->first('password') }}</div>
                                    </div>
                                    @endif

                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <!-- <div class="form-divider">Your Home</div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        @if(!$errors->has('ville'))
                                        <label for="ville">City</label>
                                        <input type="text" name="ville" class="form-control">
                                        @else
                                        <label for="ville" class="text-danger">City (Erreur)</label>
                                        <input type="text" name="ville"  class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('ville') }}</div>
                                        @endif

                                    </div>
                                    <div class="form-group col-6">
                                        @if(!$errors->has('tel'))
                                        <label for="tel">Phone</label>
                                        <input type="text" name="tel" class="form-control">
                                        @else
                                        <label for="tel" class="text-danger">Phone (Erreur)</label>
                                        <input type="text" name="tel"  class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('tel') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-12">
                                        @if(!$errors->has('adresse'))
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control">
                                        @else
                                        <label for="adresse" class="text-danger">Adresse (Erreur)</label>
                                        <input type="text" name="adresse" class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('adresse') }}</div>
                                        @endif
                                    </div>
                                </div> -->
                                <input type="text" hidden name="isAdmin" value="0">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="woocommerce-Button button btn-lg btn-block">Register</button>
                                </div>
                            </form>
                            <p align="center"> A lready have Account ? <a href="{{route('selection')}}">Login</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>
