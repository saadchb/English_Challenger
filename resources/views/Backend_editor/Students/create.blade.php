@extends('Backend_editor.Layout')
@section('title','Add student')
@push('style')

@endpush
@section('content')
<div class="container-fluid mt--8">

<form action="{{route('Students.store')}}" method="Post" enctype="multipart/form-data">

<div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">Add new students</h3>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/Students" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                    <div class="position-relative">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </div>

        </div><br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="first_name"><strong>First name :</strong></label>
                                <input type="text" class="form-control" id="first_name" placeholder="First name" name="first_name"><br>
                                @error('first_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="last_name"><strong>Last name :</strong></label>
                                <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name"><br>
                                @error('last_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone"><strong>Phone number :</strong></label>
                                <input type="number" class="form-control" id="phone" placeholder=" Phone number" name="phone"><br>
                                @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email"><strong>Email :</strong></label>
                                <input type="email" placeholder="Student's email" class="form-control" id="email" name="email"><br>
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="address"><strong>Address :</strong></label>
                            <input type="text" placeholder="Student's address" class="form-control" id="address" name="address"><br>
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="date_of_birth"><strong>Date of birth  :</strong></label>
                                <input type="date" placeholder="headmaster name" class="form-control" id="date_of_birth"  name="date_of_birth"><br>
                                @error('date_of_birth')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                            <label for="class"><strong>Class/Grade levle :</strong></label>
                            <input type="text"  placeholder="Student's grade/class" class="form-control" id="class" name="class"><br>
                            @error('class')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="picture"><strong>Picture : </strong></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="picture" @error('picture') is-invalid @enderror>
                            </div>
                            @error('picture')
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