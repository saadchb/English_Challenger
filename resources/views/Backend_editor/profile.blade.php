@extends('Backend_editor.Layout')
@section('title','dachboard')

@section('content')
<section class="section">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::guard('teacher')->user()->last_name }} {{ Auth::guard('teacher')->user()->first_name }}!</h2>
        <p class="section-lead">Change information about yourself on this page.</p>
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">                      
                        <form action="{{route('profile.update',Auth::guard('teacher')->user()->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                @if (!Empty(Auth::guard('teacher')->user()->picture))
                            <img alt="picture" src="{{asset('storage/'.Auth::guard('teacher')->user()->picture)}}" style="height: 100px !important; width: 100px !important;" class="rounded-circle profile-widget-picture">
                            @else
                            <figure class="avatar mr-2 avatar-xl profile-widget-picture" data-initial="{{ substr(Auth::guard('teacher')->user()->last_name, 0, 1) }}{{ substr(Auth::guard('teacher')->user()->first_name, 0, 1) }}"></figure>
                            @endif
                                <!-- <h4 class="text-right">Edit Profile</h4> -->
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="last_name">First Name</label>
                                        <input id="last_name" type="text" value="{{Auth::guard('teacher')->user()->last_name}}" class="form-control" name="last_name">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="first_name">last Name</label>
                                        <input id="first_name" type="text" value="{{Auth::guard('teacher')->user()->first_name}}" class="form-control" name="first_name">
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" value="{{Auth::guard('teacher')->user()->email}}" name="email"><br>

                                    <label>picture </label>
                                    <div class="custom-file">
                                        <input type="file" name="picture" value="{{Auth::guard('teacher')->user()->picture}}" class="custom-file-input " id="customFile">
                                        <label class="custom-file-label" for="customFile">choisir une picture</label>
                                        @error('picture')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-divider">Your Home</div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="city">City</label>
                                        <input type="text" name="city" value="{{Auth::guard('teacher')->user()->city}}" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" value="{{Auth::guard('teacher')->user()->phone}}" class="form-control">
                                    </div>                              
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-warning">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <!-- Password Change Form -->
                                <form action="{{ route('profile.changePassword', Auth::guard('teacher')->user()->id) }}" method="POST">
                                    @method('put') <!-- This line specifies that the form should make a PUT request -->
                                    @csrf
                                    <div class="card-header">
                                        <h4>Edit Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input id="current_password" type="password" class="form-control" name="current_password">
                                        </div>
                                        <div class="input-group">
                                            <input id="new_password" type="password" class="form-control" name="new_password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button class="btn btn-warning">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <!-- Account Deletion Form -->

                                <form id="delete-form-{{$teacher->id}}"  action="{{ route('profile.destroy', Auth::guard('teacher')->user()->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="card-header">
                                        <h4>Delete Account</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button type="submit" class="btn btn-danger " onclick="confirmation(event,`{{Auth::guard('teacher')->user()->id}}`)" data-toggle="modal">
                                            <i class="fa-solid fa-trash"></i> Delete Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection