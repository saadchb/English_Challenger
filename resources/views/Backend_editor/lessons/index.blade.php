@extends('Backend_editor.Layout')
@section('title','Lessons')
@section('content')


<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Lessons</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="{{route('lessons.create')}}" class="btn btn-primary">Add new</a>
          
                <form class="d-flex" name="form1">
                    <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="search" aria-label="Search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1">
                    <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
                </form>
            

        </div>
    </div>

</div>
<br><br>
<div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
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
                                <td>3</td>                                <td>Author</td>
                                <td>yes</td>
                                <td>{{$lesson->duration}}</td>
                                <td>
                                    <form id="delete-form-{{$lesson->id}}" action="{{route('lessons.destroy', $lesson->id)}}" method="POST">
                                        <a href="{{route('lessons.edit', $lesson->id)}}" class="btn btn-outline-success btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
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
        </div>
    </div>
</div>

<center style="margin-left: 50%;">{{ $lessons->links() }}</center>

@endsection