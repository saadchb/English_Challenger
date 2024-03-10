@extends('Backend_editor.Layout')
@section('title','Students')
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

    <div>
    <div class="sticky-top bg-white border-bottom  px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-xl font-bold text-gray-900">List of Students</h2>
            <div class="d-flex gap-3 align-items-center">
                <a href="{{route('Students.create')}}" class="btn btn-primary">Add new</a>
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
    </form><br>
    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr style="background-color: #dedede;">
                                    <th>Picture</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Date of birth</th>
                                    <th>Class/Grade</th>
                                    <th colspan="4"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td><img src="{{ asset('storage/'.$student->picture) }}" alt="{{$student->last_name}}" style="height: 50px;width:100px;"></td>
                                    <td>{{$student->first_name}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->date_of_birth}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>course_id</td>
                                    <td>
                                        <form id="delete-form-{{$student->id}}" action="{{route('Students.destroy', $student->id)}}" method="POST">
                                            <a href="{{route('Students.edit', $student->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen"></i> Edit
                                            </a>
                                            <a href="{{route('Students.show', $student->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $student->id }}`)' data-toggle="modal">
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

<center style="margin-left: 50%;">{{ $students->links() }}</center>
    

@endsection