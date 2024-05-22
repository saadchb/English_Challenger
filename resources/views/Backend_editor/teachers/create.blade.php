@extends('Backend_editor.Layout')
@section('title','Add teacher')
@push('style')

@endpush
@section('content')
<div class="container-fluid mt--8">

    <form action="{{route('Teachers.store')}}" method="Post" enctype="multipart/form-data">

        <div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">Add new Teacher</h3>
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
                        <input type="text" hidden name="isAdmin" value="2">
                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="isAdmin" value="0" class="custom-control-input" id="agree">
                                <label class="custom-control-label" for="agree">Make this teacher Admin</label>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div><br><br>
@endsection