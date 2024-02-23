@extends('Backend_editor.Layout')
@section('title','Add_quiz')
@section('styles')
<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Custom CSS for navbar */
    .navbar-custom {
        padding: 10px 0;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-nav {
        align-items: center;
    }

    .nav-item {
        margin-right: 15px;
    }

    #saveBtn {
        margin-left: 15px;
    }
</style>
@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-2 pr-7" style="width: 83%; margin-left: 18%; margin-bottom: 530px;">
    <a class="navbar-brand" href="#">Add new Question</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/Questions" class="nav-link btn btn-outline-secondary  "><i class="fa-solid fa-angle-left"></i> Back</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-primary" id="saveBtn">Save</button>
            </li>
        </ul>
    </div>
</nav>
<br>

<div class="countainer mt-5 m-4">

    <div class="modal-body">
        <!-- Question input -->
        <div class="form-group">
            <label for="modalQuestion"><b>title</b></label>
            <input type="text" class="form-control"  placeholder="Enter question">
        </div><br>

        <div class="form-group">
            <label for="modalDescription"><b>Description</b></label>
            <textarea class="form-control" id="modalDescription" rows="2" placeholder="Enter description"></textarea>
        </div><br>

        Question type
        <div class="form-group">
           
        <b> detail </b><select class="form-control col-md-2" style="float: inline-end;" id="modalQuestionType">
                <option value="true_false">True/False</option>
                <option value="multi_choice">Multi Choice</option>
                <option value="single_choice">Single Choice</option>
            </select>
        </div><br>
        <div>
        </div><br>

        <div class="form-group ">
            <label for="modalPoint"><b>Point</b></label>
            <input type="number" value="1" class="form-control col-md-1" id="modalPoint" placeholder="Enter point" />
        </div><br>

        <!-- Description, Hint, and Point for all question types -->
      
        <div class="form-group">
            <label for="modalHint"><b>Hint</b></label>
            <textarea type="text" class="form-control" id="modalHint" placeholder="Enter hint"></textarea>
        </div>


    </div>

</div>

@endsection