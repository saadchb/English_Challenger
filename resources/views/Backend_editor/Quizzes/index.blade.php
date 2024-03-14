@extends('Backend_editor.Layout')
@section('title','Quizzes')
@section('content')

<div class="sticky-top bg-white border-bottom  px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">List your Quizzes</h2>
        <div class="d-flex gap-3 align-items-center">
            <a href="/Quizzes/create" class="btn btn-primary">Add new</a>
            <div class="position-relative">
                
                <input class="form-control border border-gray-300 pr-3 pl-9 py-2 rounded-md w-260px text-sm font-medium text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-500" type="text" placeholder="Search" value="">
            </div>

        </div>
    </div>
</div>
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
        </div>
    </div>
</div>
</div>

@endsection