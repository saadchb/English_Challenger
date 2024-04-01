@extends('Backend_editor.Layout')
@section('title','Add Question')
@section('styles')
<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@endsection
@section('content')
<div class="container-fluid mt--8">

<form action="{{route('Questions.store')}}" method="Post" enctype="multipart/form-data">

    <div class="sticky-top bg-white border-bottom  px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-xl font-bold text-gray-900">Add new Question</h3>
            <div class="d-flex gap-3 align-items-center">
                <a href="/Questions" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                <div class="position-relative">
                
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>

            </div>
        </div>

    </div><br>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @csrf
                        <!-- Question input -->
                        <div class="form-group">
                            <label for="modalQuestion"><b>Title</b></label>
                            <input name="title" type="text" class="form-control" placeholder="Enter question">
                        </div><br>

                        <div class="form-group">
                            <label for="modalDescription"><b>Description</b></label>
                            <textarea name="description" class="form-control" id="modalDescription" rows="2" placeholder="Enter description"></textarea>
                        </div><br>

                        <!-- Question type -->
                        <div class="form-group">
                            <label for="modalQuestionType"><b>Question Type</b></label>
                            <select name="question_type" class="form-control col-md-2 form-select" style="float: inline-end;" id="modalQuestionType" onchange="updateModalOptions()">
                                <option value="true_or_false" selected>True/False</option>
                                <option value="multi_choice">Multi Choice</option>
                                <option value="single_choice">Single Choice</option>
                            </select>
                        </div><br>
                        <!-- Options container -->
                        <div id="modalOptionsContainer">

                        </div><br>
                        <!-- Point input -->
                        <div class="form-group">
                            <label for="modalPoint"><b>Point</b></label>
                            <input name="points" type="number" value="1" class="form-control col-md-1" id="modalPoint" placeholder="Enter point" />
                        </div><br>

                        <!-- Hint input -->
                        <div class="form-group">
                            <label for="modalHint"><b>Hint</b></label>
                            <textarea name="hint" type="text" class="form-control" id="modalHint" placeholder="Enter hint"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br><br>
<script>
    // Call updateModalOptions() when the page loads to set the default options
    window.onload = function() {
        updateModalOptions();
    };

    function updateModalOptions() {
        var selectedType = document.getElementById("modalQuestionType").value;
        var modalOptionsContainer = document.getElementById("modalOptionsContainer");

        // Reset options container
        modalOptionsContainer.innerHTML = "";

        // For true/false options
        if (selectedType === "true_or_false") {
            addOption(modalOptionsContainer, "checkbox", false); // Pass false to includeButton parameter
            addOption(modalOptionsContainer, "checkbox", false); // Pass false to includeButton parameter
        }

        // For multi-choice options
        if (selectedType === "multi_choice") {
            addOption(modalOptionsContainer, "checkbox", true); // Pass true to includeButton parameter
            addOption(modalOptionsContainer, "checkbox", true); // Pass true to includeButton parameter
            addOptionButton(modalOptionsContainer);
        }

        // For single-choice options
        if (selectedType === "single_choice") {
            addOption(modalOptionsContainer, "checkbox", true); // Pass true to includeButton parameter
            addOption(modalOptionsContainer, "checkbox", true); // Pass true to includeButton parameter
            addOptionButton(modalOptionsContainer);
        }
    }

    // Function to add a new option to the modal
    function addOption(container, type, includeButton) {
        var optionCount = container.children.length + 1;
        var optionId = "option" + optionCount;

        var newOption = document.createElement("div");
        newOption.classList.add("form-check");
        newOption.id = optionId;

        var buttonHTML = includeButton ? `
            <button type="button" class="btn btn-outline-danger" style="margin-left:3px;" onclick="removeOption('${optionId}')">
                <i class="fa-solid fa-trash-can "></i>
            </button>` : '';

            newOption.innerHTML = `
            <div class=" input-group-prepend col-md-10" >
                <div class="input-group-text">
                <input type="${type}" name="options[${optionCount}][is_correct]" value="false">
                </div>
                <input type="text" name="options[${optionCount}][option_text]" class="form-control" placeholder="New option">
                <div class="input-group-append">
                    ${buttonHTML}
                </div>
            </div><br>
        `;

        // Insert new option before the "Add Option" button
        container.insertBefore(newOption, container.lastChild);
    }

    // Function to add the "Add Option" button
    function addOptionButton(container) {
        var addOptionBtn = document.createElement("button");
        addOptionBtn.type = "button";
        addOptionBtn.className = "btn btn-primary";
        addOptionBtn.id = "addOptionBtn";
        addOptionBtn.textContent = "Add Option";

        addOptionBtn.style.marginLeft = "30px"
        addOptionBtn.addEventListener("click", function() {
            addOption(container, container.children[0].querySelector("input").type, true); // Pass true to includeButton parameter
        });

        container.appendChild(addOptionBtn);
    }

    // Function to remove an option
    function removeOption(optionId) {
        var optionToRemove = document.getElementById(optionId);
        if (optionToRemove) {
            optionToRemove.remove();
        }
    }
    var saveBtn = document.getElementById("saveBtn");
</script>

@endsection