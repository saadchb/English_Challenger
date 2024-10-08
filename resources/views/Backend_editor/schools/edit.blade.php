@extends('Backend_editor.Layout')
@section('title','edit school')
@section('content')
<div class="container-fluid mt--8">

<form action="{{route('Schools.update',$school->id)}}" method="post" enctype="multipart/form-data">
<div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">EDIT SCHOOL</h3>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/Schools" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                    <div class="position-relative">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </div></div>
<br><br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        @method('PUT')
                        <h3>edit school {{$school->school_name}}</h3>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="school_name"><strong>School :</strong></label>
                                <input type="text " value="{{$school->school_name}}" class="form-control" id="school_name" placeholder="school name" name="school_name"><br>
                                @error('school_name')
                                <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number"><strong>phone number :</strong></label>
                                <input type="number" value="{{$school->phone_number}}" class="form-control" id="phone_number" placeholder=" phone number" name="phone_number"><br>
                                @error('phone_number')
                                <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email"><strong>email :</strong></label>
                                <input type="email" value="{{$school->email}}"  placeholder="email of school" class="form-control" id="email" name="email"><br>
                                @error('email')
                                <div class="text-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="name_headmaster"><strong>headmaster  :</strong></label>
                            <input type="text" value="{{$school->name_headmaster}}"  placeholder="headmaster name" class="form-control" id="name_headmaster"  name="name_headmaster"><br>
                            @error('name_headmaster')
                            <div class="text-danger m-2">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="phone_number_headmaster"><strong>headmaster number :</strong></label>
                            <input type="number"  value="{{$school->phone_number_headmaster}}"  placeholder="number" class="form-control" id="phone_number_headmaster" name="phone_number_headmaster"><br>
                            @error('phone_number_headmaster')
                            <div class="text-danger m-2">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="school_city"><strong>city :</strong></label>
                            <input type="text"  value="{{$school->school_city}}" placeholder="the city of school" class="form-control" id="school_city" name="school_city"><br>
                            @error('school_city')
                            <div class="text-danger m-2">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="adresse"><strong>adress :</strong></label>
                            <input type="text" value="{{$school->adresse}}"  placeholder="adresse of school" class="form-control" id="adresse" name="adresse"><br>
                            @error('adresse')
                            <div class="text-danger m-2">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="description"><strong>description :</strong></label>
                            <input type="text"  value="{{$school->description}}" placeholder="description" class="form-control" id="description" name="description"><br>
                            @error('description')
                            <div class="text-danger m-2">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="school_logo"><strong>school_logo : </strong></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="school_logo" @error('school_logo') is-invalid @enderror>
                            </div>
                            @error('school_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
@endsection
