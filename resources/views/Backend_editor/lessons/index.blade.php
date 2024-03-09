@extends('Backend_editor.Layout')
@section('title','Lessons')
@section('content')

          
<div class="sticky-top bg-white border-bottom  px-4 py-3" >
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Lessons</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="{{route('lessons.create')}}" class="btn btn-primary">Add new</a>
            <div class="position-relative">
                <span class="position-absolute d-flex items-center left-0 pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <form class="d-flex" name="form1">
                        <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                        <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
                </div>

            </div>
        </div>

    </div>
    </form>
<div class="" style="margin: 0 0 0 1%;">
    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #dedede;">
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Author</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Date modified</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach($lessons as $lesson)
        <tr>
        <td>{{$lesson->title}}</td>
        <td>{{$lesson->course->title}}</td>
        <td>Author</td>
        <td>{{$lesson->priview}}</td>
        <td>{{$lesson->duration}}</td>
        <td>
        <form id="delete-form-{{$lesson->id}}" action="{{route('lessons.destroy', $lesson->id)}}" method="POST">
                                            <a href="{{route('lessons.edit', $lesson->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen"></i> 
                                            </a>
                                            <a href="{{route('lessons.show', $lesson->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $lesson->id }}`)' data-toggle="modal">
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

    <center style="margin-left: 50%;">{{ $lessons->links() }}</center>

@endsection 