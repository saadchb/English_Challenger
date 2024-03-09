
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
<?php 
use App\Models\Question;
if(request('search1')){
    $Questions = Question::where('title',"like","%" .request('search1').'%')->paginate(10);
}else{
            $Questions = Question::query()->latest()->paginate(10);

}

?>
<!-- <div class="container mt-8"> -->
    <!-- <div class="container mt-8 col-md-6 "> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-2 pr-7" style="width: 83%; margin-left: 18%; margin-bottom: 530px;">
    <a class="navbar-brand" href="#">Add new Quizze</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/Quizzes" class="nav-link btn btn-outline-secondary  " href="#"><i class="fa-solid fa-angle-left"></i> Back</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-primary" id="saveBtn">Save</button>
            </li>
        </ul>
    </div>
</nav>
<br>


<!-- </div> -->
<!-- <div class="container mt-5 " > -->
        <div class="form-group mt-4">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title">
        </div><bR>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Enter description"></textarea>
        </div><br>
        <hr color="black">
                                <div class="form-group">
                                    <label for="search">Question search:</label>
                                    <input type="text" id="search" class="form-control" placeholder="Nom d'article">
                        <button class="btn btn-outline-success"><span class="fa fa-search"></span></button>
                                    <div id="searchResults"></div>
                                </div><br><br>
    
                                <table class="table table-bordered" id="articleTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="font-size: medium;">Id</th>
                                            <th style="font-size: medium;">title</th>
                                            <th style="font-size: medium;">Question type</th>
                                            <th style="font-size: medium;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><br><br>

<div class="col-md-6 " style="margin-left: 2%;">
    <div class="border-top pt-4">
        <div class="text-gray-800 text-base font-semibold">Quiz Settings</div>

        <div class="mt-4">
            <label for="_lp_duration" class="form-label">Duration</label>
            <div class="input-group">
                <input id="_lp_duration" type="number" class="form-control" value="0">
                <select class="form-select col-md-5">
                    <option value="minute">Minute(s)</option>
                    <option value="hour">Hour(s)</option>
                    <option value="day">Day(s)</option>
                    <option value="week">Week(s)</option>
                </select>
            </div>
            <p class="mt-2 text-sm">Set to 0 for no limit, greater than 0 for a limit.</p>
        </div>

        <div class="mt-4">
            <label for="_lp_passing_grade" class="form-label">Passing Grade(%)</label>
            <div>
                <input id="_lp_passing_grade" type="number" class="form-control" step="1" min="0" max="100" value="80">
            </div>
            <p class="mt-2 text-sm">The conditions that must be achieved in order to pass the quiz.</p>
        </div>

        <div class="mt-4 form-check">
            <input id="_lp_instant_check" type="checkbox" class="form-check-input">
            <label for="_lp_instant_check" class="form-check-label">Allow students to immediately check their answers while doing the quiz.</label>
        </div>

        <div class="mt-4 form-check">
            <input id="_lp_negative_marking" type="checkbox" class="form-check-input">
            <label for="_lp_negative_marking" class="form-check-label">For each question that students answer wrongly, the total point is deducted exactly from the question's point.</label>
        </div>

        <div class="mt-4 form-check">
            <input id="_lp_minus_skip_questions" type="checkbox" class="form-check-input">
            <label for="_lp_minus_skip_questions" class="form-check-label">For each question that students answer skip, the total point is deducted exactly from the question's point.</label>
        </div>

        <div class="mt-4">
            <label for="_lp_retake_count" class="form-label">Retake</label>
            <div>
                <input id="_lp_retake_count" type="number" class="form-control" step="1" min="-1" max="" value="">
            </div>
            <p class="mt-2 text-sm">How many times can the user re-take this quiz? Set 0 to disable. Set -1 to infinite.</p>
        </div>

        <div class="mt-4">
            <label for="_lp_pagination" class="form-label">Pagination</label>
            <div>
                <input id="_lp_pagination" type="number" class="form-control" step="1" min="0" max="100" value="1">
            </div>
            <p class="mt-2 text-sm">The number of displayed questions on each page.</p>
        </div>

        <div class="mt-4 form-check">
            <input id="_lp_review" type="checkbox" class="form-check-input" checked>
            <label for="_lp_review" class="form-check-label">Allow students to review this quiz after they finish the quiz.</label>
        </div>

        <div class="mt-4 form-check">
            <input id="_lp_show_correct_review" type="checkbox" class="form-check-input" checked>
            <label for="_lp_show_correct_review" class="form-check-label">Allow students to view the correct answer to the question in reviewing this quiz.</label>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.7.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search1').on('keyup', function() {
            var searchTerm = $(this).val();

            $.ajax({
                url: '/search-questions',
                type: 'GET',
                data: {
                    searchTerm: searchTerm
                },
                success: function(response) {
                    var results = $('#searchResults');
                    results.empty();
                    $.each(response, function(index, question) {
                        results.append('<div><a href="#" class="question-link" data-id="' + question.id + '">' + question.title + '</a></div>');
                    });
                }
            });
        });

        $(document).on('click', '.question-link', function(e) {
            e.preventDefault();
            var questionId = $(this).data('id');
            var questionTitle = $(this).text();

            // Add the selected question to the table
            $('#articleTable tbody').append('<tr><td>' + questionId + '</td><td>' + questionTitle + '</td><td>Question Type</td><td></td></tr>');
        });
    });
</script>

@endsection



<!-- 
<body>

</body>

</html> -->