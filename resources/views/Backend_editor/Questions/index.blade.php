@extends('Backend_editor.Layout')
@section('title','Questions')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Questions.create')}}">Add new</a>
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
<!-- 
<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Questions</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="/Questions/create" class="btn btn-primary">Add new</a>
            <div class="position-relative">
 
                <form class="d-flex" name="form1">
                    <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                    <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            </div>

        </div>
    </div>

</div> -->
<br>

<div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                            <tr style="background-color: #dedede;">
                                <th scope="col">Question</th>
                                <th scope="col">Author</th>
                                <th scope="col">type</th>
                                <th scope="col">Date</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        @foreach ($Questions as $question)
                        <tbody>
                            <tr>
                                <td>{{$question->title}}</td>
                                <td>name</td>
                                <td>{{$question->question_type}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>

                                    <form id="delete-form-{{$question->id}}" action="{{route('Questions.destroy', $question->id)}}" method="POST">
                                        <a href="{{route('Questions.edit', $question->id)}}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $question->id }}`)' data-toggle="modal">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br><br>
<center style="margin-left: 50%;">{{ $Questions->links() }}</center>
@endsection