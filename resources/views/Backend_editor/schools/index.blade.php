@extends('Backend_editor.Layout')
@section('title','school')
@push('style')
<style type="text/css">
    .my-active span {
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }

    ul.pager>li {
        display: inline-flex;
        padding: 5px;
    }
</style>
@endpush
@section('content')
<div class="sticky-top bg-white border-bottom navbar navbar-expand    py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Quizzes</h2>
        <div class="d-flex gap-3  ml-12 ">
            <a href="/Schools/create" class="btn btn-primary">Add new</a>
            <div class="position-relative">

                <form class="d-flex " name="form1" style="margin-left: 130px;">
                    <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                    <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <ul class="navbar-nav" style="margin-left: 150px;">
                <li class="nav-item dropdown ml-4">
                    <div style="display: flex;">
                        <img src="build/assets/images/pic-4.png" class="img-circle elevation-2" height="40px" width="40px" alt="Formateur Image">
                        <a href="#" class="nav-link" data-toggle="dropdown" class="d-block"><strong style="color: black;">SAAD CHAIB <i class="fa-solid fa-caret-down"></i></strong></a>
                        </a>
                        <div>
                            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"><strong>Profile</strong></span>
                                <div class="dropdown-divider"></div>

                                <a href="#" class="dropdown-item">
                                    <i class=" fa-regular fa-gear text-info"></i> SETTING
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-power-off text-danger"></i> LOG OUT
                                </a>

                            </div>
                </li>


            </ul>

        </div>
    </div>
</div><br><br>

    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr style="background-color: #dedede;">
                                    <th>school logo</th>
                                    <th>school name</th>
                                    <th>name headmaster</th>
                                    <th>school city</th>
                                    <th>course </th>
                                    <th colspan="4"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                <tr>
                                    <!-- <td><img src="{{ asset('storage/'.$school->school_logo) }}" alt="logo" style="height: 50px;width:100px;"></td> -->
                                    <td><img src="{{ asset('storage/'.$school->school_logo) }}" alt="IMG" style="height: 50px;width:100px;"></td>
                                    <td>{{$school->school_name}}</td>
                                    <td>{{$school->name_headmaster}}</td>
                                    <td>{{$school->school_city}}</td>
                                    <td>1</td>
                                    <td>
                                        <form id="delete-form-{{$school->id}}" action="{{route('Schools.destroy', $school->id)}}" method="POST">
                                            <a href="{{route('Schools.edit', $school->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen"></i> 
                                            </a>
                                            <a href="{{route('Schools.show', $school->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $school->id }}`)' data-toggle="modal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>

        </div>
    </div>
<br><br>

<center style="margin-left: 40%;">{{ $schools->links() }}</center>

@endsection