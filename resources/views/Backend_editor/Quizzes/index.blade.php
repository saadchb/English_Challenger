@extends('Backend_editor.Layout')
@section('title','Quizzes')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Quizzes.create')}}">Add new</a>
@endsection
@section('search')
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
    <form class="form-inline" name="form1">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="submit" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('content')
<br><br> 
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
                                <td> {{Auth()->guard('teacher')->user()->first_name}} {{Auth()->guard('teacher')->user()->last_name}} </td>
                                <td>
                                    <form id="delete-form-{{$Quiz->id}}" action="{{route('Quizzes.destroy', $Quiz->id)}}" method="POST">
                                        <a href="{{route('Quizzes.edit', $Quiz->id)}}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <!-- <a href="{{route('Quizzes.show', $Quiz->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a> -->
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