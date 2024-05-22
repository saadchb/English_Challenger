@extends('Backend_editor.Layout')
@section('title','Detail Student')
@push('style')

@endpush
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if (empty($teacher->picture))
                            <img src="{{ asset('build/assets/images/clients/user.png') }}" alt="" style="height: 90px;width: 90px;" class="profile-user-img img-fluid img-circle">
                            @else
                            <img alt="picture" src="{{ asset('storage/'. $teacher->picture) }}" style="height: 90px;width: 90px;" class="profile-user-img img-fluid img-circle">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{$teacher->first_name}} {{$teacher->last_name}}</h3>

                        <p class="text-muted text-center">English Teacher</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">About {{$teacher->first_name}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Courses</span>
                                                <span class="info-box-number">
                                                    {{$courses}}
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6 ">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Total Blogs</span>
                                                <span class="info-box-number">{{$Blogs}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- fix for small devices only -->
                                    <div class="clearfix hidden-md-up"></div>

                                    <div class="col-6 ">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-books"></i></span>

                                            <div class="info-box-content">

                                                <span class="info-box-text">Total books</span>
                                                <span class="info-box-number">{{$Books}}</span>

                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6 ">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Total students</span>
                                                <span class="info-box-number">{{$Students}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="">
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Education background</strong>

                                        <p class="text-muted">
                                            {{$teacher->description_education_background}}
                                        </p>

                                        <hr>

                                        <strong><i class="far fa-file-alt mr-1"></i> year experience</strong>

                                        <p class="text-muted">{{$teacher->year_experience}}</p>

                                        <hr>

                                        <strong><i class="fas fa-phone-alt mr-1"></i> phone</strong>

                                        <p class="text-muted">
                                            {{$teacher->phone}}
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                        <p class="text-muted">{{$teacher->city}}</p>

                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection