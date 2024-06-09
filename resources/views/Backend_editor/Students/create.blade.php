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
                        <input hidden name="teacher_id" value="{{Auth::guard('teacher')->user()->id}}">
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
                       
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="email"><strong>Email :</strong></label>
                                <input type="email" placeholder="Student's email" class="form-control" id="email" name="email"><br>
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
    
    </form>
</div>
</div>
</div>
</div>
</div><br><br>
@endsection