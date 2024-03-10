@extends('Backend_editor.Layout')
@section('title','edit student')
@push('style')

@endpush
@section('content')
<form action="{{route('Students.update',$student->id)}}" method="post" enctype="multipart/form-data">

<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-xl font-bold text-gray-900">Edit Student</h3>
        <div class="d-flex gap-3 align-items-center">
        <a href="/Students" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
            <div class="position-relative">
                <span class="position-absolute d-flex items-center left-0 pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </div>

        </div>
    </div>
    
</div><br><br>
<div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        @method('PUT')
                        <h3>edit student {{$student->first_name}} {{$student->last_name}}</h3>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="first_name"><strong>First name :</strong></label>
                                <input type="text " value="{{$student->first_name}}" class="form-control" id="first_name" placeholder="student's first name" name="first_name"><br>
                                @error('first_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name"><strong>Last name :</strong></label>
                                <input type="text " value="{{$student->last_name}}" class="form-control" id="last_name" placeholder="student's last name" name="last_name"><br>
                                @error('last_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone"><strong>Phone number :</strong></label>
                                <input type="number" value="{{$student->phone}}" class="form-control" id="phone" placeholder=" phone" name="phone"><br>
                                @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email"><strong>email :</strong></label>
                                <input type="email" value="{{$student->email}}"  placeholder="email of student" class="form-control" id="email" name="email"><br>
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="date_of_birth"><strong>Date of birth  :</strong></label>
                            <input type="text" value="{{$student->date_of_birth}}"  placeholder="student's date of birth" class="form-control" id="date_of_birth"  name="date_of_birth"><br>
                            @error('date_of_birth')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <hr>
                       
                        <div class="form-row">
                            <div class="col-md-6">
                            <label for="class"><strong>Class/Grade levle :</strong></label>
                            <input type="text"  value="{{$student->class}}" placeholder="Student's class" class="form-control" id="class" name="class"><br>
                            @error('class')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="address"><strong>Address :</strong></label>
                            <input type="text" value="{{$student->address}}"  placeholder="Student's address" class="form-control" id="address" name="address"><br>
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                            <div class="col-md-6">
                            <label for="picture"><strong>picture : </strong></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="picture" @error('picture') is-invalid @enderror>
                            </div>
                            @error('picture')
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