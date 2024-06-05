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

                            <form action="{{ route('Schools.store') }}" enctype="multipart/form-data"
                                class="woocommerce-form woocommerce-form-register register" method="POST">
                                @csrf

                                <input type="hidden" name="fromRegister" value="fromRegister">
                                <input type="hidden" name="fromRegister" value="register">
                                <div class="row">
                                    @if (!$errors->has('school_photos'))
                                    <div class="form-group col-6 mb-3">
                                        <label for="" class="form-label">School photo</label>
                                        <label for="formFile" class="form-control btn btn-dark p-2" style="cursor: pointer;">Upload </label>
                                        <input class="form-control"  name="school_photos" style="display: none;"
                                        value="{{ old('school_photos') }}" type="file" id="formFile">
                                    </div>
                                @else
                                <div class="form-group col-6 mb-3">
                                    <label for="" class="form-label text-danger">School photo (Error)</label>
                                        <label for="formFile" class="form-control btn btn-dark p-2" style="cursor: pointer;">Upload </label>
                                        <input class="form-control"  name="school_photos" style="display: none;"
                                    value="{{ old('school_photos') }}" type="file" id="formFile">
                                    <div class="mt-2 text-danger">{{ $errors->first('school_photos') }}</div>
                                </div>
                                @endif
                                    @if (!$errors->has('school_name'))
                                        <div class="form-group col-6">
                                            <label for="school_name">School Name</label>
                                            <input id="school_name" type="text" class="form-control" name="school_name"
                                                value="{{ old('school_name') }}" required autocomplete="given-name"
                                                autofocus>
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="school_name" class="text-danger">Shool name (Erreur)</label>
                                            <input id="school_name" type="text" class="form-control is-invalid"
                                                name="school_name" value="{{ old('school_name') }}" required
                                                autocomplete="family-name">
                                            <div class="mt-2 text-danger">{{ $errors->first('school_name') }}</div>
                                        </div>
                                @endif


                                    @if (!$errors->has('school_logo'))
                                        <div class="form-group col-6 mb-3">
                                            <label for="" class="form-label">Logo</label>
                                            <label for="formFile" class="form-control btn btn-dark p-2" style="cursor: pointer;">Upload </label>
                                            <input class="form-control"  name="school_logo" style="display: none;"
                                            value="{{ old('school_logo') }}" type="file" id="formFile">
                                        </div>
                                    @else
                                    <div class="form-group col-6 mb-3">
                                        <label for="" class="form-label text-danger">logo (Error)</label>
                                            <label for="formFile" class="form-control btn btn-dark p-2" style="cursor: pointer;">Upload </label>
                                            <input class="form-control"  name="school_logo" style="display: none;"
                                        value="{{ old('school_logo') }}" type="file" id="formFile">
                                        <div class="mt-2 text-danger">{{ $errors->first('school_logo') }}</div>
                                    </div>
                                    @endif

                                    @if (!$errors->has('type'))
                                        <div class="form-group col-6">
                                            <label for="type">Type</label>
                                            <input id="type" type="text" class="form-control" name="type"
                                                value="{{ old('type') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="type" class="text-danger">Type (Erreur)</label>
                                            <input id="type" type="text" class="form-control is-invalid"
                                                name="type" value="{{ old('type') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('type') }}</div>
                                        </div>
                                    @endif




                                    @if (!$errors->has('phone_number'))
                                        <div class="form-group col-6">
                                            <label for="phone_number">Phone number </label>
                                            <input id="phone_number" type="text" class="form-control" name="phone_number"
                                                value="{{ old('phone_number') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="phone_number" class="text-danger">Phone number (Erreur)</label>
                                            <input id="phone_number" type="text" class="form-control is-invalid"
                                                name="phone_number" value="{{ old('phone_number') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('phone_number') }}</div>
                                        </div>
                                    @endif


                                    @if (!$errors->has('name_headmaster'))
                                        <div class="form-group col-6">
                                            <label for="name_headmaster">Name of head master</label>
                                            <input id="name_headmaster" type="text" class="form-control" name="name_headmaster"
                                                value="{{ old('name_headmaster') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="name_headmaster" class="text-danger">Name of head master (Erreur)</label>
                                            <input id="name_headmaster" type="text" class="form-control is-invalid"
                                                name="name_headmaster" value="{{ old('name_headmaster') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('name_headmaster') }}</div>
                                        </div>
                                    @endif

                                    @if (!$errors->has('phone_number_headmaster'))
                                        <div class="form-group col-6">
                                            <label for="phone_number_headmaster">Phone number of head master</label>
                                            <input id="phone_number_headmaster" type="text" class="form-control" name="phone_number_headmaster"
                                                value="{{ old('phone_number_headmaster') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="phone_number_headmaster" class="text-danger">Phone number of head master (Erreur)</label>
                                            <input id="phone_number_headmaster" type="text" class="form-control is-invalid"
                                                name="phone_number_headmaster" value="{{ old('phone_number_headmaster') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('phone_number_headmaster') }}</div>
                                        </div>
                                    @endif

                                    @if (!$errors->has('shool_city'))
                                        <div class="form-group col-6">
                                            <label for="shool_city">Shool city</label>
                                            <input id="shool_city" type="text" class="form-control" name="shool_city"
                                                value="{{ old('shool_city') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="shool_city" class="text-danger">Shool city (Erreur)</label>
                                            <input id="shool_city" type="text" class="form-control is-invalid"
                                                name="shool_city" value="{{ old('shool_city') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('shool_city') }}</div>
                                        </div>
                                    @endif

                                    @if (!$errors->has('description'))
                                        <div class="form-group col-6">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" required autocomplete="family-name">
                                                {{ old('description') }}
                                            </textarea>

                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="description" class="text-danger">Description (Erreur)</label>
                                            <textarea id="description" class="form-control" name="description" required autocomplete="family-name">
                                                {{ old('description') }}
                                            </textarea>
                                            <div class="mt-2 text-danger">{{ $errors->first('description') }}</div>
                                        </div>
                                    @endif

                                    @if (!$errors->has('address'))
                                        <div class="form-group col-6">
                                            <label for="address">Address</label>
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ old('address') }}" required autocomplete="family-name">
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="address" class="text-danger">Address (Erreur)</label>
                                            <input id="address" type="text" class="form-control is-invalid"
                                                name="address" value="{{ old('address') }}">
                                            <div class="mt-2 text-danger">{{ $errors->first('address') }}</div>
                                        </div>
                                    @endif



                                </div>

                                @if (!$errors->has('email'))
                                    <div class="form-group ">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                @else
                                    <div class="form-group ">
                                        <label for="email" class="text-danger">email (Erreur)</label>
                                        <input id="email" type="text" class="form-control is-invalid"
                                            name="email" value="{{ old('email') }}">
                                        <div class="mt-2 text-danger">{{ $errors->first('email') }}</div>
                                    </div>
                                @endif
                                <div class="row">
                                    @if (!$errors->has('password'))
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password" required
                                                autocomplete="new-password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block text-danger">Password
                                                (Erreur)</label>
                                            <input id="password" type="password"
                                                class="form-control pwstrength is-invalid"
                                                data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            <div class="mt-2 text-danger">{{ $errors->first('password') }}</div>
                                        </div>
                                    @endif

                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <input type="text" hidden name="isAdmin" value="0">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input"
                                            id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and
                                            conditions</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="woocommerce-Button button btn-lg btn-block">Register</button>
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
