@extends('Backend_editor.Layout')
@section('title','Quizzes')
@section('content')

<div class="sticky-top bg-white border-bottom navbar navbar-expand   px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Quizzes</h2>
        <div class="d-flex gap-3  ml-12 ">
            <div class="position-relative">

                <form class="d-flex " name="form1"  >
                    <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                    <button class="btn btn-outline-secondary" type="submit"><span class="fa fa-search"></span></button>
                </form>

            </div>

            <ul class="navbar-nav" style="margin-left: 150px;">
                <a class="ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Quizzes.create')}}">Add new</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Date</th>
                                <th scope="col">Author</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Quizs as $Quiz)
                            <tr>
                                <td>{{$Quiz->title}}</td>
                                <td>{{$Quiz->duration}}{{$Quiz->duration_unit}}</td>
                                <td>{{$Quiz->created_at}}</td>
                                <td>?</td>
                                <td>
                                    <form id="delete-form-{{$Quiz->id}}" action="{{route('Quizzes.destroy', $Quiz->id)}}" method="POST">
                                        <a href="{{route('Quizzes.edit', $Quiz->id)}}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{route('Quizzes.show', $Quiz->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $Quiz->id }}`)' data-toggle="modal">
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

<center style="margin-left: 40%;">{{ $Quizs->links() }}</center>

@endsection