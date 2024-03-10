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
<form action="{{route('Questions.store')}}" method="Post" enctype="multipart/form-data">

    <div class="sticky-top bg-white border-bottom  px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-xl font-bold text-gray-900">Add new Quiz</h3>
            <div class="d-flex gap-3 align-items-center">
                <a href="/Quizzes" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                <div class="position-relative">
                    <span class="position-absolute d-flex items-center left-0 pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>

            </div>
        </div>

    </div><br>
    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @csrf
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
            </div>
        </div>
    </div>
</form>
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