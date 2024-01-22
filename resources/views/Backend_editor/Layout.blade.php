<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href=" {{url('css/backendeditor.css')}} " >
            <title> @yield('title') </title>
 
</head>



<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom text-primary">
             logo</div>
            <div class="list-group list-group-flush my-3">
            <a href="/dachboard" class="list-group-item list-group-item-action bg-transparent " id="dashboard-link">
                <i class="fas fa-tachometer-alt me-2 text-primary"></i>Dashboard</a>
                <a href="/Courses" class="list-group-item list-group-item-action bg-transparent ">
                    <i class='fas fa-book-open text-primary'></i> Courses</a>
                <a href="/Add_Course" class="list-group-item list-group-item-action bg-transparent "><i
                        class="fas fa-chart-line me-2 text-primary"></i>Add Course</a>
                <a href="/Lessons" class="list-group-item list-group-item-action bg-transparent "><i
                        class="fas fa-paperclip me-2 text-primary"></i>Lessons</a>
                <a href="/Quizzes" class="list-group-item list-group-item-action bg-transparent "><i
                        class="fas fa-shopping-cart me-2 text-primary"></i>Quizzes</a>
                <a href="/Assignments" class="list-group-item list-group-item-action bg-transparent "><i
                        class="fas fa-gift me-2 text-primary"></i>Assignments</a>
                 <a href="/Questions" class="list-group-item list-group-item-action bg-transparent "><i
                        class="fas fa-gift me-2 text-primary"></i>Questions</a> 
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
                        
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
           @yield('content')
        </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    var listItems = document.querySelectorAll(".list-group-item");

    listItems.forEach(function (item) {
      item.addEventListener("click", function () {

        listItems.forEach(function (li) {
          li.classList.remove("active");
        });

        item.classList.add("active");
      });
    });
  });
</script>

</body>

</html>