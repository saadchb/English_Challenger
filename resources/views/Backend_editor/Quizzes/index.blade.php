@extends('Backend_editor.Layout')
@section('title','Quizzes')
@section('content')

<div class="sticky-top bg-white border-bottom  px-4 py-3" >
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Quizzes</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="/Quizzes/create" class="btn btn-primary">Add new</a>
            <div class="position-relative">
                <span class="position-absolute d-flex items-center left-0 pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="text" placeholder="Search" value="">
            </div>

        </div>
    </div>
</div>
<div class="" style="margin: 0 0 0 1%;">
    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Author</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>name</td>
                        <td>name</td>
                        <td>name</td>
                        <td>name</td>
                        <td>name</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i> DELETE</button>
                            <button type="button" class="btn btn-outline-info btn-sm" id="selectQuestionI"><i class="fa-solid fa-pen"></i> EDIT</button>

                        </td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
    </div>

    @endsection
    