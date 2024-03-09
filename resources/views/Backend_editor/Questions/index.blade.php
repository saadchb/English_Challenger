@extends('Backend_editor.Layout')
@section('title','Question ')
@section('content')

<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Questions</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="/Questions/create" class="btn btn-primary">Add new</a>
            <div class="position-relative">
                <span class="position-absolute d-flex items-center left-0 pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <form class="d-flex" name="form1">
                    <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                    <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            </div>

        </div>
    </div>

</div>
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
                                <td>name</td>
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