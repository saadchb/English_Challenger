@extends('Backend_editor.Layout')
@section('title','Add_quiz')
@section('styles')
<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

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

    /* Custom CSS */
    .select2-container--default .select2-selection--single {
        height: 30px;
        /* Adjust height as needed */
    }

    #saveBtn {
        margin-left: 15px;
    }
</style>
@endsection 
@section('content')
<?php

use App\Models\Question;

$questions = Question::all();
?>
<form action="{{route('Quizzes.store')}}" method="Post" enctype="multipart/form-data">

    <div class="sticky-top bg-white border-bottom  px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-xl font-bold text-gray-900">Add new Quiz</h3>
            <div class="d-flex gap-3 align-items-center">
                <a href="/Quizzes" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                <div class="position-relative">

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
                            <label for="title"><strong>Title</strong></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                        </div><bR>
                        <div class="form-group">
                            <label for="description"><strong>Description</strong></label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                        </div><br>
                        <hr color="black">

                        <div class="form-group"><strong>Question type :</strong>
                            <div style="float: right;">

                                <select style="width: 300px" id="nameid">
                                    <option></option>
                                    @foreach($questions as $question)
                                    <option value="{{ $question->id }}" data-question-type="{{ $question->question_type }}">{{ $question->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div> <br><br>


                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="articleTable">
                                <thead class="thead-light">
                                    <tr style="text-align: center;">
                                        <th style="font-size: medium;">Id</th>
                                        <th style="font-size: medium;">title</th>
                                        <th style="font-size: medium;">Question type</th>
                                        <th style="font-size: medium;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><br><br>

                        <div class="col-md-6 " style="margin-left: 2%;">
                            <div class="border-top pt-4">
                                <div class="text-gray-800 text-base font-semibold"><strong></strong>Quiz Settings</div>

                                <div class="mt-4">
                                    <label for="_lp_duration" class="form-label">Duration</label>
                                    <div class="input-group">
                                        <input id="_lp_duration" name="duration" type="number" class="form-control" value="0">
                                        <select class="form-select col-md-5" name="duration_unit">
                                            <option value="Minutes">Minute(s)</option>
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
                                        <input id="_lp_passing_grade" name="passing_grade" type="number" class="form-control" step="1" min="0" max="100" value="80">
                                    </div>
                                    <p class="mt-2 text-sm">The conditions that must be achieved in order to pass the quiz.</p>
                                </div>

                                <div class="mt-4 form-check">
                                    <input id="_lp_instant_check" name="instant_check" type="checkbox" class="form-check-input">
                                    <label for="_lp_instant_check" class="form-check-label">Allow students to immediately check their answers while doing the quiz.</label>
                                </div>

                                <div class="mt-4 form-check">
                                    <input id="_lp_negative_marking" name="negative_marking" type="checkbox" class="form-check-input">
                                    <label for="_lp_negative_marking" class="form-check-label">For each question that students answer wrongly, the total point is deducted exactly from the question's point.</label>
                                </div>

                                <div class="mt-4 form-check">
                                    <input id="_lp_minus_skip_questions" name="minus_for_skip" type="checkbox" class="form-check-input">
                                    <label for="_lp_minus_skip_questions" class="form-check-label">For each question that students answer skip, the total point is deducted exactly from the question's point.</label>
                                </div>

                                <div class="mt-4">
                                    <label for="_lp_retake_count" class="form-label">Retake</label>
                                    <div>
                                        <input id="_lp_retake_count" name="retake" type="number" class="form-control" step="1" min="-1" max="" value="">
                                    </div>
                                    <p class="mt-2 text-sm">How many times can the user re-take this quiz? Set 0 to disable. Set -1 to infinite.</p>
                                </div>

                                <div class="mt-4">
                                    <label for="_lp_pagination" class="form-label">Pagination</label>
                                    <div>
                                        <input id="_lp_pagination" name="pagination" type="number" class="form-control" step="1" min="0" max="100" value="1">
                                    </div>
                                    <p class="mt-2 text-sm">The number of displayed questions on each page.</p>
                                </div>

                                <div class="mt-4 form-check">
                                    <input id="_lp_review" name="review" type="checkbox" class="form-check-input" checked>
                                    <label for="_lp_review" class="form-check-label">Allow students to review this quiz after they finish the quiz.</label>
                                </div>

                                <div class="mt-4 form-check">
                                    <input id="_lp_show_correct_review" name="show_correct_answer" type="checkbox" class="form-check-input" checked>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    var $jq = jQuery.noConflict();
    // var questionType = selectedOption.data('question-type');

    $jq(document).ready(function() {
    // Initialize Select2 after DOM is ready
    $jq("#nameid").select2({
        placeholder: "Select a Questions",
        allowClear: true
    });

    // Ensure correct order of initialization
    $jq("#nameid").change(function() {
        var selectedOption = $jq(this).find(':selected');
        var id = selectedOption.val();
        var title = selectedOption.text();
        var questionType = selectedOption.data('question-type');

        // Append selected option to the table
        $jq('#articleTable tbody').append('<tr style="text-align: center;">' +
            '<td >' + id + '</td>' +
            '<td>' + title + '</td>' +
            '<td>' + questionType + '</td>' +
            '<td><button class="btn btn-danger remove-row"><i class="fa-solid fa-trash"></i></button></td>' +
            '</tr>');

        // Add hidden input to capture selected question IDs
        $jq('form').append('<input type="hidden" name="questions[]" value="' + id + '">');
    });

    // Remove row when remove button is clicked
    $jq(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        var idToRemove = $(this).closest('tr').find('td:first').text();
        $('input[name="questions[]"][value="' + idToRemove + '"]').remove();
    });
});


</script>

@endsection