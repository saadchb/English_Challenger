<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
  <title> @yield('title') </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    #link.active {
      color: #4d09b3;
    }
  </style>
  @yield('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" {{url('css/backendeditor.css')}} ">



</head>



<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-gray" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom text-primary" style="color: #8f66cc;">
        <img src="{{ asset('logo.png') }}" class="navbar-brand-img" alt="logo" width="110px" height="100px">
      </div>
      <div class="list-group list-group-flush my-3" style="max-height: 300px; overflow-y: auto;">
        <div id="link"><a href="/" class="list-group-item list-group-item-action bg-transparent ">
            <i class="fas fa-tachometer-alt me-2 fa-lg" style="color: #8f66cc;"></i> Dashboard</a></div>
        <a href="#" class="list-group-item list-group-item-action bg-transparent " id="link">
          <i class="fa-regular fa-book-open me-2 fa-lg" style="color: #8f66cc;"></i> Courses</a>
        <a href="/Schools" class="list-group-item list-group-item-action bg-transparent " id="link">
          <i class="fa-regular fa-school me-2 fa-lg" style="color: #8f66cc;"></i> Schools</a>
        <!-- <a href="/Add_Course" class="list-group-item list-group-item-action bg-transparent "><i
            class="fas fa-chart-line me-2 text-primary me-2 text-success"></i>  Add Course</a> -->
        <a href="#" class="list-group-item list-group-item-action bg-transparent " id="link"><i class="fa-brands fa-creative-commons-share me-2 fa-lg" style="color: #8f66cc;"></i> Lessons</a>
        <a href="/Quizzes" class="list-group-item list-group-item-action bg-transparent " id="link"><i class="fa-regular fa-stopwatch me-2 fa-lg" style="color: #8f66cc;"></i> Quizzes</a>
        <!-- <a href="/Add_Quizzes" class="list-group-item list-group-item-action bg-transparent "><i
            class="fas fa-shopping-cart me-2 text-primary me-2 text-success"></i>  Add Quizze</a> -->
        <a href="#" class="list-group-item list-group-item-action bg-transparent " id="link"><i class="fa-solid fa-list-check me-2 fa-lg" style="color: #8f66cc;"></i> Assignments</a>
        <a href="/Questions" class="list-group-item list-group-item-action bg-transparent " id="link"><i class="fa-solid fa-clipboard-question me-2 fa-lg" style="color: #8f66cc;"></i> Questions</a>
      </div>

      <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
    </div>
  </div>

  <div id="page-content-wrapper">
    @yield('content')
  </div>
  </div>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
      el.classList.toggle("toggled");
    };
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var listItems = document.querySelectorAll("#link");

      listItems.forEach(function(item) {
        item.addEventListener("click", function() {

          listItems.forEach(function(li) {
            li.classList.remove("active");
          });

          item.classList.add("active");
        });
      });
    });
  </script>
  <script>
    // JavaScript to highlight active link
    document.addEventListener("DOMContentLoaded", function() {
      // Get the current URL path
      var path = window.location.pathname;

      // Get all the links in the sidebar
      var links = document.querySelectorAll("#sidebar-wrapper .list-group-item");

      // Loop through each link
      links.forEach(function(link) {
        // Check if the link's href matches the current URL path
        if (link.getAttribute("href") === path) {
          // Add the "active" class to the link
          link.classList.add("active");
        }
      });
    });
  </script>
  <script>
    function confirmation(ev, id) {
      ev.preventDefault();
      var urlToRedirect = document.getElementById('delete-form-' + id).getAttribute('action');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to delete this",
          text: "You won't be able to revert this delete",
          icon: "warning",
          buttons: true,
          dangerMode: true
        })
        .then((willCancel) => {
          if (willCancel) {
            document.getElementById('delete-form-' + id).submit();
          }
        });
    }
  </script>


</body>

</html>