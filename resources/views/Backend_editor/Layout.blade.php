<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css"> -->
  <link rel="icon" href="{{ asset('build/assets/images/English_Icon.png') }}" type="image/x-icon">

<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
  <title>EnglishChallenger | @yield('title') </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" href=" {{url('css/adminlte.css')}} ">
  <style>
    #link.active {
      color: #4d09b3;
    }
  </style>
  @yield('styles')
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" {{url('css/backendeditor.css')}} ">



</head>


<body >
<div class="wrapper">


  <aside style="  position: fixed; background-color: #100f1f;" class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="#" class="brand-link ml-4">
    <img src="{{ asset('build/assets/images/English_Logo_white.png') }}"  alt="English_Logo" width="160px" >

    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <div class="list-group list-group-flush " style="max-height: 300px; overflow-y: auto;">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item mt-2">
              <a href="/dachboard" class="nav-link">
                <i class="nav-icon fa-solid fa-house-user"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a href="/Courses" class="nav-link">
                <i class="nav-icon fa-regular fa-book-open"></i>
                <p>
                  Courses
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/books" class="nav-link">
              <i class="nav-icon fa-regular fa-book"></i>
                <p>
                  Books
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/Schools" class="nav-link">
                <i class="nav-icon fa-solid fa-school fa-sm"></i>
                <p>
                  Schools
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/lessons" class="nav-link">
                <i class="nav-icon fa-solid fa-scroll"></i>
                <p>
                  lessons
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/Students" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                  Students
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/Quizzes" class="nav-link">
                <i class="nav-icon fa-solid fa-stopwatch"></i>
                <p>
                  Quizzes
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/Questions" class="nav-link">
                <i class="nav-icon fa-solid fa-clipboard-question "></i>
                <p>
                  Questions
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="/Bloges" class="nav-link">
                <i class="nav-icon fa-solid fa fa-book mr-2 "></i>
                <p>
                  Blogs
                </p>
              </a>
            </li>
          </ul>

        </div>

      </nav><br>
      <a href="/" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
         <!-- button add new  -->
         <li class="nav-item">
         @yield('button_add')
      </li>
      <!-- Navbar Search -->
      <li class="nav-item">

          @yield('search')

      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown ml-4">
        <div style="display: flex;">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" height="40px" width="40px" alt="Formateur Image">
          <a href="#" class="nav-link" data-toggle="dropdown" class="d-block"><strong style="color: black;">SAAD CHAIB <i class="fa-solid fa-caret-down"></i></strong></a>
          </a>
          <div>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
              <span class="dropdown-item dropdown-header"><strong>Profile</strong></span>
              <div class="dropdown-divider"></div>

              <a href="#" class="dropdown-item">
                <i class=" fa-regular fa-gear text-info"></i> SETTING
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa-solid fa-power-off text-danger"></i> LOG OUT
              </a>

            </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="content-wrapper">

    <section class="content">

      <div class="container-fluid">


        @yield('content')
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.7.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

@include('Backend_editor.js')


</body>

</html>
