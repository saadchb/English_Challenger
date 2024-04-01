@extends('Backend_editor.Layout')
@section('title','Add school')
@section('content')
<div class="container-fluid mt--8">

<form action="{{route('Schools.store')}}" method="Post" enctype="multipart/form-data">

<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-xl font-bold text-gray-900">Add new Schools</h3>
        <div class="d-flex gap-3 align-items-center">
        <a href="/Schools" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
            <div class="position-relative">
        
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </div>

        </div>
    </div>
    
</div><br><br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="school_name"><strong>School :</strong></label>
                                <input type="text" class="form-control" id="school_name" placeholder="school name" name="school_name">
                                @error('school_name')
                                <div class="text-danger m-2">{{ $message }}</div><br>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number"><strong>phone number :</strong></label>
                                <input type="number" class="form-control" id="phone_number" placeholder=" phone number" name="phone_number">
                                @error('phone_number')
                                <div class="text-danger m-2">{{ $message }}</div><br>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email"><strong>email :</strong></label>
                                <input type="email" placeholder="email of school" class="form-control" id="email" name="email">
                                @error('email')
                                <div class="text-danger m-2">{{ $message }}</div><br>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="type"><strong>type of school :</strong></label>
                            <input type="text"  placeholder="highSchool,unversity..." class="form-control" id="type" name="type">
                            @error('type')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="name_headmaster"><strong>headmaster  :</strong></label>
                            <input type="text" placeholder="headmaster name" class="form-control" id="name_headmaster"  name="name_headmaster">
                            @error('name_headmaster')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="phone_number_headmaster"><strong>headmaster number :</strong></label>
                            <input type="number"  placeholder="number" class="form-control" id="phone_number_headmaster" name="phone_number_headmaster">
                            @error('phone_number_headmaster')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                            </div>
                        </div>
                        <hr>
                       
                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="school_city"><strong>city :</strong></label>
                            <input type="text" placeholder="the city of school" class="form-control" id="school_city" name="school_city">
                            @error('school_city')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="adresse"><strong>adress :</strong></label>
                            <input type="text" placeholder="adresse of school" class="form-control" id="adresse" name="adresse">
                            @error('adresse')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                            </div>
                        </div>
                        

                            <div class="col">
                            <label for="description"><strong>description :</strong></label>
                            <textarea type="text" placeholder="description" class="form-control" id="description" name="description"></textarea>
                            @error('description')
                            <div class="text-danger m-2">{{ $message }}</div><br>
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
                            <div class="col-md-6">
                            <label for="school_photo"><strong>school_photo : </strong></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="school_photo" @error('school_photo') is-invalid @enderror>
                            </div>
                            @error('school_photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
@endsection