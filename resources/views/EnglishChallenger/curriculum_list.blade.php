<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EnglishChallenger | @yield('title') </title>

    <link rel="stylesheet" href=" {{ url('css/adminlte.css') }} ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <style>
        #link.active {
            color: #4d09b3;
        }


        .accordion {
            --bs-accordion-btn-focus-box-shadow: none;
            --bs-accordion-btn-bg: #07294D;
            --bs-accordion-bg: #07294D;
            --bs-accordion-active-bg: #07294D;
            --bs-accordion-border-radius: none;
            --bs-accordion-inner-border-radius: none;
            --bs-accordion-border-color: none;
            --bs-accordion-btn-color: #FFFFFF;
            --bs-accordion-active-color: #FFFFFF;
            --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");


        }

        .accordion-button {
            border-bottom: #FFFFFF solid 1px;
            font-size: 20px;
        }

        #header {
            height: 70px;
            width: 100%;
            background-color: #953288;
            position: fixed;
            top: 0;
            z-index: 1;
        }
        #search{
            background-color: #953288;
            width:200px !important;
            border:none;
        }
        #search:focus{

        }
        .mydivheader {
            background-color: #c2b5976b;
        }

        .mydivheader:hover {
            background-color: #c2b5979c;
            cursor: pointer;
        }

        .curriculum *:hover {
            color: #4d09b3;
        }

        .lessonItem:hover {
            color: #4d09b3 !important;
        }

        #item-curriculum {
            color: #FFFFFF;
        }

        body {
            font-family: "Muli", sans-serif;
            font-size: 16px;
            line-height: 30px;
            margin: 0;
            text-align: left;
            background-color: #fff;
            font-weight: 400;
            color: #535967;
            overflow-x: hidden;
        }

        .title {
            font-family: "Quicksand", sans-serif;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 0px;
            color: #07294D;
        }

        .btnPag {
            background-color: #953288;
            box-shadow: none;
            border-color: #953288;
            border-radius: 20px !important;

        }

        .btnPag:hover {
            background-color: #07294D;
            border-color: #07294D;
        }

        .btnPag:active {
            background-color: #07294D !important;
        }

        .custom-ordered-list {
            list-style: none;
            counter-reset: orderedlist;
        }

        .custom-ordered-list li {
            counter-increment: orderedlist;
            margin-bottom: 10px;
        }

        .custom-ordered-list li::before {
            content: counter(orderedlist);
            background-color: #07294D;
            color: #fff;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            line-height: 25px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
        }

        .list {
            margin-left: 5px !important;
            position: relative;
            right: 30px;
        }
    </style>
    @yield('styles')
    <link rel="stylesheet" href=" {{ url('css/backendeditor.css') }} ">
</head>

<body>
    <header class="d-flex justify-content-end" id="header">
        <div class="input-group rounded my-3">
            <input type="search" width="200px"  id='search' class="form-control rounded" placeholder="Search"
                aria-label="Search" aria-describedby="search-addon" />
        </div>
        <a class="px-3 pt-2 mydivheader" href="{{ route('detailsStudentss.show') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width='50' height='50' class=""
                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
        </a>
    </header>
    <div class="wrapper" style="margin-top:70px;">
        <aside style="height:100px;position: fixed;top:70px;background-color:#07294D;"
            class="main-sidebar sidebar-dark-primary elevation-4  ">

            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">

                <div class="accordion" id="accordionExample">
                    @foreach ($curricula as $curriculum)
                        <div id="itemAccordion" class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $curriculum->title }}">
                                <button id="accordion" class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $curriculum->title }}" aria-expanded="true"
                                    aria-controls="collapse{{ $curriculum->title }}">
                                    <b>{{ $curriculum->title }}</b>
                                </button>
                            </h2>
                            <div style="background-color:#07294D;color:white;" id="collapse{{ $curriculum->title }}"
                                class="accordion-collapse collapse show"
                                aria-labelledby="heading{{ $curriculum->title }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body" id="accordion-body">
                                    @if (count($lessons) !== 0)
                                        <ol class="curriculum custom-ordered-list">
                                            @foreach ($lessonsMix as $lesson)
                                                @if ($lesson['curriculum_id'] == $curriculum->id && $lesson['type'] == 'lesson')
                                                    <form id="lessonForm"
                                                        action="{{ route('curricula.show', $curriculum->course_id) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $lesson['id'] }}"
                                                            name="lesson_id" />
                                                        <div class="list">
                                                            <svg fill="#FFFFFF" width="20px" height="20px"
                                                                viewBox="-3.5 0 19 19"
                                                                xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg mr-1">
                                                                <path
                                                                    d="M11.16 16.153a.477.477 0 0 1-.476.475H1.316a.477.477 0 0 1-.475-.475V3.046a.477.477 0 0 1 .475-.475h6.95l2.893 2.893zm-1.11-9.924H8.059a.575.575 0 0 1-.574-.574V3.679H1.95v11.84h8.102zM3.907 4.92a1.03 1.03 0 1 0 1.029 1.03 1.03 1.03 0 0 0-1.03-1.03zm4.958 3.253h-5.87v1.108h5.87zm0 2.354h-5.87v1.109h5.87zm0 2.354h-5.87v1.109h5.87z"
                                                                    fill-rule="evenodd" />
                                                            </svg>
                                                            <li id="lessonItem" style="cursor: pointer;"
                                                                class="lesson-item text-light d-inline lessonItem"
                                                                style="background-color: #07294D;">

                                                                {{ $lesson['title'] }} <br><span class="text-white-50"
                                                                    style="font-size:12px;margin-left:7rem;">{{ $lesson['duration'] }}</span>
                                                            </li>
                                                        </div>
                                                    </form>
                                                @endif
                                                @if (count($quizzes) !== 0)
                                                    @if ($lesson['curriculum_id'] == $curriculum->id && $lesson['type'] == 'quiz')
                                                        <div class="list">
                                                            <svg fill="#FFFFFF" width="15px" height="15px"  class="cf-icon-svg"
                                                                viewBox="0 0 1920 1920"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M960 112.941c-467.125 0-847.059 379.934-847.059 847.059 0 467.125 379.934 847.059 847.059 847.059 467.125 0 847.059-379.934 847.059-847.059 0-467.125-379.934-847.059-847.059-847.059M960 1920C430.645 1920 0 1489.355 0 960S430.645 0 960 0s960 430.645 960 960-430.645 960-960 960m417.905-575.955L903.552 988.28V395.34h112.941v536.47l429.177 321.77-67.765 90.465Z"
                                                                    fill-rule="evenodd" />
                                                            </svg>
                                                            <li id="item-curriculum"
                                                                class="lesson-item text-light d-inline lessonItem">
                                                                {{ $lesson['title'] }}<br><span class="text-white-50"
                                                                    style="font-size:12px;margin-left:7rem;">{{ $lesson['duration'] }}
                                                                    {{ $lesson['duration_unit'] }}</span>
                                                            </li>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ol>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </aside>

        <!-- Navbar -->

        <nav style="position:sticky;top:70px;" class="main-header navbar navbar-expand  navbar-light">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <div class="content-wrapper">

            <section class="content">

                <div class="container-fluid">
                    <div class="container-fluid m--8">
                        <div class="px-8 py-4 d-flex justify-content-center ">
                            <div class="d-flex flex-column" id="video" style="width: 810px;">
                                <iframe class="mt-3" width="100%" height="465"
                                    src="https://www.youtube.com/embed/{{ $lessonActive->video_link }}"
                                    title="YouTube video player"frameborder="0" allowfullscreen></iframe>
                                <h3 class='my-3 title text-uppercase'><b>{{ $lessonActive->title }}</b></h3>
                                <p class= 'mb-3 text-gray'>{{ $lessonActive->description }}</p>
                                <div style="position: sticky; bottom: 0;margin-bottom:1;margin-bottom:0 !important;background-color:#F4F6F9;"
                                    class="d-flex justify-content-center w-100 navbar p-2  ">
                                    <div class="jsutify-self-start" style="margin-bottom:0 !important;">
                                        <form class="d-inline"
                                            action="{{ route('curriculum_list.prev', $course->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $lessonActive->order }}"
                                                name="lesson_id">
                                            <button class="btn btn-primary rounded btnPag"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                    viewBox="0 0 256 512">
                                                    <path
                                                        d="M9.4 278.6c-12.5-12.5-12.5-32.8 0-45.3l128-128c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 256c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-128-128z"
                                                        fill="white" />
                                                </svg> Prev</button>
                                        </form>
                                    </div>
                                    <div class="justify-self-end ms-auto"style="margin-bottom:0 !important;">
                                        <form class="d-inline"
                                            action="{{ route('curriculum_list.next', $course->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $lessonActive->order }}"
                                                name="lesson_id">
                                            <button class="btn btn-primary rounded btnPag">
                                                Next <svg xmlns="http://www.w3.org/2000/svg" width="20px"
                                                    height="20px" viewBox="0 0 256 512">
                                                    <path
                                                        d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");
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
            function SubmitForm() {
                const eleT = document.querySelectorAll(".lesson-item");
                for (let i = 0; i < eleT.length; i++) {
                    eleT[i].addEventListener("click", function() {
                        this.parentElement.parentElement.submit();
                    });
                }
            }
            SubmitForm()

            const curricula = @json($curricula);
            const lessons = @json($lessons);
            const quizzes = @json($quizzes);
            const lessonsMix = @json($lessonsMix);

            document.getElementById('search').addEventListener("input", function(e) {
                eleTH = document.querySelectorAll(".lesson-item");
                console.log(eleTH)
                console.log('eleTH')
                for (let i = 0; i < eleTH.length; i++) {
                    eleTH[i].addEventListener("click", function() {
                        // this.parentElement.parentElement.submit();
                        console.log('hello from li ')
                    });
                }
                const value = e.target.value.toLowerCase();
                const cuuriSearch = curricula.filter((cr) => cr.title.toLowerCase().search(value) !== -1)
                search(cuuriSearch, lessons, quizzes, lessonsMix);
            })

            function search(curr, lessons, quizzes, lessonMix) {
                let html = ``;
                curr.forEach(cr => {
                    html += `
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading${cr.title}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse${cr.title}" aria-expanded="true"
                    aria-controls="collapse${cr.title}">
                    <b>${cr.title}</b>
                </button>
            </h2>
            <div class="accordion-collapse collapse show"
                id="collapse${cr.title}" aria-labelledby="heading${cr.title}">
                <div class="accordion-body">`;

                    if (lessons.length !== 0) {
                        html += `<ol class="curriculum custom-ordered-list">`;

                        lessonMix.forEach(lesson => {
                            if (lesson.curriculum_id == cr.id && lesson.type == 'lesson') {
                                html += `
                    <form id="lessonForm" action="/curriculum_list/${cr.course_id}" method="post">
                        @csrf
                        <div class="list">
                        <input type="hidden" value="${lesson.id}" name="lesson_id" />
                        <svg fill="#FFFFFF" width="20px" height="20px" viewBox="-3.5 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg mr-2">
                                <path d="M11.16 16.153a.477.477 0 0 1-.476.475H1.316a.477.477 0 0 1-.475-.475V3.046a.477.477 0 0 1 .475-.475h6.95l2.893 2.893zm-1.11-9.924H8.059a.575.575 0 0 1-.574-.574V3.679H1.95v11.84h8.102zM3.907 4.92a1.03 1.03 0 1 0 1.029 1.03 1.03 1.03 0 0 0-1.03-1.03zm4.958 3.253h-5.87v1.108h5.87zm0 2.354h-5.87v1.109h5.87zm0 2.354h-5.87v1.109h5.87z" fill-rule="evenodd"></path>
                            </svg><li id="lessonItem" onclick="this.parentElement.parentElement.submit()" class='lesson-item text-light d-inline lessonItem' style="background-color: #07294D;cursor: pointer;">
                            ${lesson.title}<br><span class="text-white-50"
                                                            style="font-size:12px;margin-left:7rem;">${lesson['duration'] }</span>
                        </li>
                        </div>
                    </form>`;
                            }

                            if (quizzes.length !== 0) {
                                if (lesson.curriculum_id == cr.id && lesson.type == 'quiz') {
                                    html += ` <div class="list"><svg fill="#FFFFFF" width="15px" height="15px" class=' mr-1'
                                                                viewBox="0 0 1920 1920"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M960 112.941c-467.125 0-847.059 379.934-847.059 847.059 0 467.125 379.934 847.059 847.059 847.059 467.125 0 847.059-379.934 847.059-847.059 0-467.125-379.934-847.059-847.059-847.059M960 1920C430.645 1920 0 1489.355 0 960S430.645 0 960 0s960 430.645 960 960-430.645 960-960 960m417.905-575.955L903.552 988.28V395.34h112.941v536.47l429.177 321.77-67.765 90.465Z"
                                                                    fill-rule="evenodd" />
                                                            </svg><li class='lesson-item text-light d-inline lessonItem' id="item-curriculum">

                                                            ${lesson.title} <br><span class="text-white-50" style="font-size:12px;margin-left:7rem;">${lesson['duration'] } ${lesson['duration_unit'] }</span>
                                                        </li>
                                                        </div>
                        `
                                }
                            }
                        });
                        html += `</ol>`;
                    }
                    html += `
                </div>
            </div>
        </div>`;
                });


                // Append the generated HTML to a container element
                document.getElementById('accordionExample').innerHTML = html;
            }
        </script>
        @include('layouts.js')

</body>

</html>
