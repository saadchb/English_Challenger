<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Quiz</title>
    <link rel="stylesheet" href=" {{url('css/backendeditor.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head> -->
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
<div class="container mt-5 " >
    <form id="quizForm" >
        <div class="form-group mt-4">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title">
        </div><bR>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Enter description"></textarea>
        </div><br>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Question Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Hint</th>
                    <th scope="col">Point</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="questionsTableBody">
                <!-- Dynamic rows will be added here -->
            </tbody>
        </table><br>

        <button type="button" class="btn btn-primary" id="selectQuestionBtn" data-toggle="modal" data-target="#questionModal">Add Question</button>
        <button type="button" class="btn btn-secondary" id="selectQuestionI">Select Questions</button>

    </form>
    <!-- Modal HTML code -->
    <div class="modal fade" id="questionModa" tabindex="-1" role="dialog" aria-labelledby="questionModalLabe" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalLabel">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Search bar -->
                    <input class="form-control mb-3" type="search" placeholder="Search for questions..." aria-label="Search">
                    <!-- Add and Close buttons -->
                    <button type="button" class="btn btn-primary" id="questionModalAddBt">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div> <br>


<!-- Modal HTML code -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questionModalLabel">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Question input -->
                <div class="form-group">
                    <label for="modalQuestion">Question</label>
                    <input type="text" class="form-control" id="modalQuestion" placeholder="Enter question">
                </div>
                <!-- Question type -->
                <div class="form-group">
                    <label for="modalQuestionType">Question Type</label>
                    <select class="form-control" id="modalQuestionType">
                        <option value="true_false">True/False</option>
                        <option value="multi_choice">Multi Choice</option>
                        <option value="single_choice">Single Choice</option>
                    </select>
                </div>
                <!-- Options container -->
                <div class="form-group" id="modalOptionsContainer">
                    <!-- Options will be added dynamically here -->
                </div>
                <!-- Update options container to include delete icon -->


                <!-- Description, Hint, and Point for all question types -->
                <div class="form-group">
                    <label for="modalDescription">Description</label>
                    <textarea class="form-control" id="modalDescription" rows="2" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="modalHint">Hint</label>
                    <textarea type="text" class="form-control" id="modalHint" placeholder="Enter hint"></textarea>
                </div>
                <div class="form-group">
                    <label for="modalPoint">Point</label>
                    <textarea type="number" class="form-control" id="modalPoint" placeholder="Enter point"></textarea>
                </div>
                <!-- Add and Close buttons -->
                <button type="button" class="btn btn-primary" id="questionModalAddBtn">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML code -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questionModalLabel">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Question input -->
                <div class="form-group">
                    <label for="modalQuestion">Question</label>
                    <input type="text" class="form-control" id="modalQuestion" placeholder="Enter question">
                </div>
                <!-- Question type -->
                <div class="form-group">
                    <label for="modalQuestionType">Question Type</label>
                    <select class="form-control" id="modalQuestionType">
                        <option value="true_false">True/False</option>
                        <option value="multi_choice">Multi Choice</option>
                        <option value="single_choice">Single Choice</option>
                    </select>
                </div>
                <!-- Options container -->
                <div class="form-group" id="modalOptionsContainer">
                    <!-- Options will be added dynamically here -->
                </div>
                <!-- Description, Hint, and Point for all question types -->
                <div class="form-group">
                    <label for="modalDescription">Description</label>
                    <textarea class="form-control" id="modalDescription" rows="2" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="modalHint">Hint</label>
                    <input type="text" class="form-control" id="modalHint" placeholder="Enter hint">
                </div>
                <div class="form-group">
                    <label for="modalPoint">Point</label>
                    <input type="number" class="form-control" id="modalPoint" placeholder="Enter point">
                </div>
                <!-- Add and Close buttons -->
                <button type="button" class="btn btn-primary" id="questionModalAddBtn">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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




<!-- script for select the quiz from database-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Your JavaScript code here
        var selectQuestionBtn = document.getElementById("selectQuestionI");
        var questionModal = new bootstrap.Modal(document.getElementById("questionModa"));

        // Activate the modal when the "Select Questions" button is clicked
        selectQuestionBtn.addEventListener("click", function() {
            questionModal.show();
        });

        // Add a click event listener to the "Add" button inside the modal
        document.getElementById("questionModalAddBt").addEventListener("click", function() {
            alert("Add button inside modal clicked!");
            // Add your custom JavaScript logic here
        });

        // Add a click event listener to the "Select Questions" button
        selectQuestionBtn.addEventListener("click", function() {
            //   alert("Select Questions button clicked!");

        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectQuestionBtn = document.getElementById("selectQuestionBtn");
        var questionModal = new bootstrap.Modal(document.getElementById("questionModal"));

        // Event listener for the "Select Questions" button
        selectQuestionBtn.addEventListener("click", function() {
            questionModal.show();
        });

        // Event listener for the "Add" button inside the modal
        document.getElementById("questionModalAddBtn").addEventListener("click", function() {
            addQuestion();
        });

        // Event listener for the "Edit" and "Delete" buttons in the table
        document.getElementById("questionsTableBody").addEventListener("click", function(event) {
            if (event.target.classList.contains("edit-btn")) {
                editQuestion(event.target);
            } else if (event.target.classList.contains("delete-btn")) {
                deleteQuestion(event.target);
            }
        });

        // Event listener for the question type select in the modal
        document.getElementById("modalQuestionType").addEventListener("change", function() {
            updateModalOptions();
        });

        // Event listener for adding checkbox options in the modal
        document.getElementById("addCheckboxBtn").addEventListener("click", function() {
            addCheckboxOption();
        });

        // Function to add a new question
        function addQuestion() {
            var modalQuestion = document.getElementById("modalQuestion").value;
            var modalQuestionType = document.getElementById("modalQuestionType").value;
            var modalDescription = document.getElementById("modalDescription").value;
            var modalHint = document.getElementById("modalHint").value;
            var modalPoint = document.getElementById("modalPoint").value;

            // Validate that the question is not empty
            if (modalQuestion.trim() === "") {
                alert("Please enter a question.");
                return;
            }

            // Create a new question container as a table row
            var newQuestionRow = document.createElement("tr");

            // Populate the table row with table data cells
            newQuestionRow.innerHTML = `
            <td>${modalQuestion}</td>
            <td>${modalQuestionType}</td>
            <td>${modalDescription}</td>
            <td>${modalHint}</td>
            <td>${modalPoint}</td>
            <td>
                <button type="button" class="btn btn-outline-primary edit-btn">Edit</button>
                <button type="button" class="btn btn-outline-danger delete-btn">Delete</button>
            </td>
        `;

            newQuestionRow.classList.add("table-light");
            // Add the new question row to the table body
            document.getElementById("questionsTableBody").appendChild(newQuestionRow);

            // Reset the modal form
            document.getElementById("questionModal").reset();

            // Close the modal
            questionModal.hide();
        }

        // Function to edit a question
        function editQuestion(target) {
            // Retrieve data from the row associated with the edit button
            var row = target.closest("tr");
            var cells = row.getElementsByTagName("td");
            var modalInputs = document.querySelectorAll("#questionModal input, #questionModal textarea");

            for (var i = 0; i < cells.length - 1; i++) { // Exclude last cell with buttons
                modalInputs[i].value = cells[i].innerText;
            }

            // Show modal
            questionModal.show();
        }

        // Function to delete a question
        function deleteQuestion(target) {
            // Delete the corresponding row from the table
            var rowToDelete = target.closest("tr");
            rowToDelete.remove();
        }

        // Function to update modal options based on question type
        function updateModalOptions() {
            var selectedType = document.getElementById("modalQuestionType").value;
            var modalOptionsContainer = document.getElementById("modalOptionsContainer");

            // Reset options container
            modalOptionsContainer.innerHTML = "";

            // For true/false options
            if (selectedType === "true_false") {
                modalOptionsContainer.innerHTML = `
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                        <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                    </div><br>
                </div>
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                        <input type="text" class="form-control" value="Answer is false" placeholder="New option">
                    </div>
                </div>
            `;
            }

            // For multi-choice options
            if (selectedType === "multi_choice") {
                modalOptionsContainer.innerHTML += `
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                        <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                        <div class="input-group-append"> 
                            <button type="button" class="btn btn-danger" onclick="removeOption('option2')"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div><br>
                </div>
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox">
                        </div>
                        <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger" onclick="removeOption('option2')"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>
                <br><button type="button" class="btn btn-primary" id="addCheckboxBtn">Add Checkbox</button>
            `;
            }

            // For single-choice options
            if (selectedType === "single_choice") {
                modalOptionsContainer.innerHTML += `
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="single">
                        </div>
                        <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger" onclick="removeOption('option1')"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                </div><br>
                <div class="form-check" id="option2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="single">
                        </div>
                        <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger" onclick="removeOption('option2')"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>
                <br><button type="button" class="btn btn-primary" id="addCheckboxBtn">Add Checkbox</button>
            `;
            }
            document.getElementById("addCheckboxBtn").addEventListener("click", function () {
                    var modalOptionsContainer = document.getElementById("modalOptionsContainer");
                    var newCheckbox = document.createElement("div");
                    newCheckbox.classList.add("form-check");
                    var optionId = "option" + (modalOptionsContainer.children.length + 1);

                    if (selectedType === "single_choice") {
                var addCheckboxBtn = document.getElementById("addCheckboxBtn");

                // Create the new checkbox element
                var newCheckbox1 = document.createElement("div");
                newCheckbox1.classList.add("form-check");
                var optionId1 = "option" + (modalOptionsContainer.children.length + 1);
                newCheckbox1.innerHTML = `
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" name="single">
                    </div>
                    <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger" onclick="removeOption('${optionId}')"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div><br>
            `;

                // Insert the new checkboxes before the "Add Checkbox" button
                modalOptionsContainer.insertBefore(newCheckbox1, addCheckboxBtn);
            } else {
                var addCheckboxBtn = document.getElementById("addCheckboxBtn");

                // Create the new checkbox element
                var newCheckbox1 = document.createElement("div");
                newCheckbox1.classList.add("form-check");
                var optionId1 = "option" + (modalOptionsContainer.children.length + 1);
                newCheckbox1.innerHTML = `
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox">
                    </div>
                    <input type="text" class="form-control" value="Answer is true" placeholder="New option">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger" onclick="removeOption('${optionId}')"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div><br>
            `;
                modalOptionsContainer.insertBefore(newCheckbox1, addCheckboxBtn);
            }

            modalOptionsContainer.appendChild(newCheckbox);
                });
           
        }

        // Function to add a checkbox option to the modal
                    // Add a click event listener to the "Add Checkbox" button in the modal


        // Function to remove an option
        function removeOption(optionId) {
            var optionToRemove = document.getElementById(optionId);
            if (optionToRemove) {
                optionToRemove.remove();
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.7.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection



<!-- 
<body>

</body>

</html> -->