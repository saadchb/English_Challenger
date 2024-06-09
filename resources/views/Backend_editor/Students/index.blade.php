@extends('Backend_editor.Layout')
@section('title','Students')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Students.create')}}">Add new</a>
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
                            <tr style="background-color: #dedede;" align="center">
                                <th>Picture</th>
                                <th>name</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th>Teacher </th>
                                <th colspan="4"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            use App\Models\Teacher;

                            $teachers = Teacher::all();   ?>
                            @foreach ($students as $student)
                            @if($student->teacher_id == Auth::guard('teacher')->user()->id || Auth::guard('teacher')->user()->isAdmin == 1)

                            <tr>
                                @if (empty($message->picture))
                                <td align="center"> <a href="{{route('Students.show',$student->id)}}"><img src="{{ asset('build/assets/images/clients/user.png') }}" style="width: 70px !important; height: 70px !important;border-radius: 7px;"></a></td>
                                @else
                                <td align="center"><a href="{{route('Students.show',$student->id)}}"><img src="{{ asset('storage/'.$student->picture) }}" alt="{{$student->last_name}}" style="height: 60px;width:65px;border-radius: 7px;"></a></td>
                                @endif
                                <td align="center"> <a href="{{route('Students.show',$student->id)}}">{{$student->first_name}} {{$student->last_name}}</a></td>

                                <td align="center">
                                    @if(Empty($student->phone))
                                    unckown
                                    @else
                                    {{$student->phone}}
                                    @endif
                                </td>
                                <td align="center">{{$student->email}}</td>
                                <td align="center">
                                    @if(Auth::guard('teacher')->user()->isAdmin == 1)
                                    @foreach($teachers as $teacher)
                                    @if($teacher->id == $student->teacher_id)
                                    @if($teacher->isAdmin == 1)
                                    <span class="$ badge bg-purple">
                                        Created By : Admin
                                    </span>
                                    @else
                                    <a href="{{route('teacher.show',$teacher->id)}}"> <span class="$ badge bg-info">
                                            Created By : {{$teacher->first_name}} {{$teacher->last_name}}
                                        </span></a>

                                    @endif

                                    @endif
                                    @endforeach

                                    @endif
                                    @if($student->teacher_id ==0)
                                    <span class="$ badge bg-warning">
                                    Created By : No One
                                    </span>
                                    @endif
                                </td>
                                <!-- <td>ID</td> -->
                                <td align="center">
                                    <form id="delete-form-{{$student->id}}" action="{{route('Students.destroy', $student->id)}}" method="POST">
                                        <a href="{{route('Students.edit', $student->id)}}" class="btn btn-success btn-sm mt-1">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{route('Students.show', $student->id)}}" class="btn btn-info btn-sm mt-1">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-1" onclick='confirmation(event,`{{ $student->id }}`)' data-toggle="modal">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>

    </div>
</div>
<br><br>

<center>{{ $students->links() }}</center>


@endsection