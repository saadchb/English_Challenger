<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EnglishChallenger | @yield('title') </title>
    <link rel="icon" href="{{ asset('build/assets/images/English_Icon.png') }}" type="image/x-icon">


    <link rel="stylesheet" href=" {{ url('css/adminlte.css') }} ">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style2.css') }}">

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
            background-color: #07294D;
            position: fixed;
            top: 0;
            z-index: 1;
            border-bottom: solid 8px #72385c;
        }

        #search {
            background-color: #07294D;
            width: 200px !important;
            border: none;
            padding-right: -15px;
        }

        #search:focus {
            border: none;
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
            color: #72385c !important;
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
            background-color: #72385c;
            box-shadow: none;
            border-color: #72385c;
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

        .selected {
            background-color: #4d09b3 !important;
            color: #FFFFFF;
        }

        .gauge {
            width: 100%;
            max-width: 250px;
            font-family: "Roboto", sans-serif;
            font-size: 32px;
            color: #004033;
        }

        .gauge__body {
            width: 100%;
            height: 0;
            padding-bottom: 50%;
            background: #b4c0be;
            position: relative;
            border-top-left-radius: 100% 200%;
            border-top-right-radius: 100% 200%;
            overflow: hidden;
        }

        .gauge__fill {
            position: absolute;
            top: 100%;
            left: 0;
            width: inherit;
            height: 100%;
            background: #009578;
            transform-origin: center top;
            transform: rotate(0turn);
            transition: transform 5s;
        }

        .gauge__cover {
            width: 75%;
            height: 150%;
            background: #ffffff;
            border-radius: 50%;
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translateX(-50%);

            /* Text */
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 25%;
            box-sizing: border-box;
        }

        .false {
            background-color: #df121296 !important;
        }
    </style>
    @livewireStyles
    @yield('styles')
    <link rel="stylesheet" href=" {{ url('css/backendeditor.css') }} ">
</head>
<script>
    let startQuiz = false;
</script>

<body @if (isset($GTest)) class="sidebar-collapse" @endif>
    @if (!isset($GTest))
        <header class="d-flex justify-content-end" id="header">
            <div class="input-group rounded my-3">
                <input type="search" width="200px" style="border: none !important;" id='search'
                    class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
            </div>

            @auth('student')
                <a class="px-3 pt-2 mydivheader"
                    href="{{ route('detailsStudents.show', Auth::guard('student')->user()->id) }}">
                    <!-- Your link content -->
                </a>
            @endauth
            <svg xmlns="http://www.w3.org/2000/svg" width='50' height='50' class=""
                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
            </a>
        </header>
    @endif
    <div class="wrapper" @if (!isset($GTest)) style="margin-top:70px;" @endif>
        @if (!isset($GTest))
            <aside
                style="height:100px;position: fixed;top:70px;background-color:#07294D;border-right:solid 8px #72385c;"
                class="main-sidebar sidebar-dark-primary elevation-4  ">

                <!-- Sidebar -->
                <div class="sidebar" id="sidebar">
                    <div class="accordion" id="accordionExample">
                        @foreach ($curricula as $curriculum)
                            <div id="itemAccordion" class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $curriculum->title }}">
                                    <button id="accordion" class="accordion-button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $curriculum->title }}"
                                        aria-expanded="true" aria-controls="collapse{{ $curriculum->title }}">
                                        <b>{{ $curriculum->title }}</b>
                                    </button>
                                </h2>
                                <div style="background-color:#07294D;color:white;" id="collapse{{ $curriculum->title }}"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="heading{{ $curriculum->title }}" class='data'
                                    data-bs-parent="#accordionExample">
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
                                                            @auth('student')

                                                                <input type="hidden"
                                                                    value="{{ Auth::guard('student')->user()->id }}"
                                                                    name="student_id" />
                                                            @endauth
                                                            <input type="hidden" name="course_id"
                                                                value="{{ $course->id }}">
                                                            <input type="hidden" value="{{ $lesson['type'] }}"
                                                                name="type" />
                                                            <div class="list">
                                                                <svg fill="#FFFFFF" width="20px" height="20px"
                                                                    viewBox="-3.5 0 19 19"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="cf-icon-svg mr-1">
                                                                    <path
                                                                        d="M11.16 16.153a.477.477 0 0 1-.476.475H1.316a.477.477 0 0 1-.475-.475V3.046a.477.477 0 0 1 .475-.475h6.95l2.893 2.893zm-1.11-9.924H8.059a.575.575 0 0 1-.574-.574V3.679H1.95v11.84h8.102zM3.907 4.92a1.03 1.03 0 1 0 1.029 1.03 1.03 1.03 0 0 0-1.03-1.03zm4.958 3.253h-5.87v1.108h5.87zm0 2.354h-5.87v1.109h5.87zm0 2.354h-5.87v1.109h5.87z"
                                                                        fill-rule="evenodd" />
                                                                </svg>
                                                                <li id="lessonItem" style="cursor: pointer;"
                                                                    class="lesson-item text-light d-inline lessonItem"
                                                                    style="background-color: #07294D;">
                                                                    {{ $lesson['title'] }} <br>
                                                                    @if ($lesson['view'] == 0)
                                                                        <span class="text-white-50"
                                                                            style="font-size:12px;margin-left:8rem; ">{{ $lesson['duration'] }}<i
                                                                                class="fa-light fa-eye ml-2"
                                                                            style="font-size: 18px; display: inline;"></i></span>@else<span
                                                                            class="text-white-50"style="font-size:12px;margin-left:8rem; ">
                                                                            {{ $lesson['duration'] }}<i
                                                                                style="font-size: 18px; display: inline;"
                                                                                class="fa-solid fa-check ml-2"></i></span>
                                                                    @endif
                                                                </li>
                                                            </div>
                                                        </form>
                                                    @endif
                                                    @if (count($quizzes) !== 0)
                                                        @if ($lesson['curriculum_id'] == $curriculum->id && $lesson['type'] == 'quiz')
                                                            <form id="lessonForm"
                                                                action="{{ route('curricula.show', $curriculum->course_id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" value="{{ $lesson['id'] }}"
                                                                    name="lesson_id" />
                                                                <input type="hidden"
                                                                @auth('student')
                                                                    value="{{ Auth::guard('student')->user()->id }}"
                                                                    name="student_id" />
                                                                @endauth
                                                                <input type="hidden" name="course_id"
                                                                    value="{{ $course->id }}">
                                                                <input type="hidden" value="{{ $lesson['type'] }}"
                                                                    name="type" />
                                                                <div class="list">
                                                                    <svg fill="#FFFFFF" width="15px" height="15px"
                                                                        class="cf-icon-svg" viewBox="0 0 1920 1920"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M960 112.941c-467.125 0-847.059 379.934-847.059 847.059 0 467.125 379.934 847.059 847.059 847.059 467.125 0 847.059-379.934 847.059-847.059 0-467.125-379.934-847.059-847.059-847.059M960 1920C430.645 1920 0 1489.355 0 960S430.645 0 960 0s960 430.645 960 960-430.645 960-960 960m417.905-575.955L903.552 988.28V395.34h112.941v536.47l429.177 321.77-67.765 90.465Z"
                                                                            fill-rule="evenodd" />
                                                                    </svg>
                                                                    <li id="lessonItem" style="cursor: pointer;"
                                                                        class="lesson-item text-light d-inline lessonItem"
                                                                        style="background-color: #07294D;">
                                                                        {{ $lesson['title'] }} <br>
                                                                        @if ($lesson['pass'] === null)
                                                                            <span class="text-white-50"
                                                                                style="font-size:12px;margin-left:8rem; display: inline;">{{ $lesson['duration'] }}{{ substr($lesson['duration_unit'], 0, 1) }}
                                                                                <i class="fa-regular fa-lock ml-2"
                                                                                    style="font-size: 18px; display: inline;"></i></span>
                                                                        @elseif($lesson['pass'] == 1)
                                                                            <span
                                                                                class="text-white-50"style="font-size:12px;margin-left:8rem; ">
                                                                                {{ $lesson['duration'] }}
                                                                                {{ substr($lesson['duration_unit'], 0, 1) }}<i
                                                                                    style="font-size: 18px; display: inline;"
                                                                                    class="fa-solid fa-check ml-2"></i></span>
                                                                        @else
                                                                            <span
                                                                                class="text-white-50"style="font-size:12px;margin-left:8rem; ">
                                                                                {{ $lesson['duration'] }}
                                                                                {{ substr($lesson['duration_unit'], 0, 1) }}<i
                                                                                    style="font-size: 18px; display: inline;"
                                                                                    class="fa-solid fa-xmark ml-2"></i></span>
                                                                        @endif
                                                                    </li>

                                                                </div>
                                                            </form>
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
        @endif
        <!-- Navbar -->

        <nav style="position:sticky;top: @if (!isset($GTest)) 70px; @else 0px; @endif"
            class="main-header navbar navbar-expand  navbar-light">
            <ul class="navbar-nav ">

                <li class="nav-item">
                    <a class="nav-link" @if (!isset($GTest)) data-widget="pushmenu" @endif
                        href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                </li>
                <li class="nav-item">
                    @if ($questions !== null)
                        <span class="nav-link">{{ count($questions) }} questions .</span>
                    @endif
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" id="duration-content">
                <livewire:display-quiz :quizActivee='$quizActive' :retakingg='$retaking' :passs='$pass' />
                @if (isset($GTest) && isset($move) && $quizActive->retake - $retaking >= 0)
                    <li class="nav-item" id="timer"><span class="nav-link" id="time">--:--</span></li>
                    <script>
                        const totalTime = {{ $quizActive->duration }};
                        const timerDisplay = document.getElementById('time');
                        let timeLeft = totalTime * 60;

                        function updateTimer() {
                            const minutes = Math.floor(timeLeft / 60);
                            const seconds = timeLeft % 60;
                            timerDisplay.textContent =
                                ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')};
                            if (timeLeft <= 0) {
                                clearInterval(timerInterval);
                                timerDisplay.textContent = "Time's up!";
                                document.getElementById('formQuiz').submit();
                            } else {
                                timeLeft--;
                            }
                        }
                        const timerInterval = setInterval(updateTimer, 1000);
                    </script>
                @endif
                <script>
                    // console.log(document.getElementById('btn-Stat'))
                    // document.getElementById('btn-Stat').addEventListener('click', function() {

                    // })
                </script>
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
                            @isset($lessonActive)
                                <div class="d-flex flex-column" id="video" style="width: 810px;">
                                    <iframe class="mt-3" width="100%" height="465"
                                        src="https://www.youtube.com/embed/{{ $lessonActive->video_link }}"
                                        title="YouTube video player"frameborder="0" allowfullscreen></iframe>
                                    <h3 class='my-3 title text-uppercase'><b>{{ $lessonActive->title }}</b></h3>
                                    <p class= 'mb-3 text-gray'>{{ $lessonActive->description }}</p>
                                    <div style="background-color:#F4F6F9;"
                                        class="d-flex justify-content-center w-100 navbar p-2  ">
                                        <div class="jsutify-self-start" style="margin-bottom:0 !important;">
                                            <form class="d-inline"
                                                action="{{ route('curriculum_list.prev', $course->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $lessonActive->order }}" name="order">
                                                @auth('student')
                                                    <input type="hidden" value="{{ Auth::guard('student')->user()->id }}"
                                                        name="student_id" />
                                                @endauth
                                                <input type="hidden" value="{{ $lessonActive->id }}" name="lesson_id">
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
                                                <input type="hidden" value="{{ $lessonActive->order }}" name="order">
                                                @auth('student')
                                                    <input type="hidden" value="{{ Auth::guard('student')->user()->id }}"
                                                        name="student_id" />
                                                @endauth
                                                <input type="hidden" value="{{ $lessonActive->id }}" name="lesson_id">
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
                            @endisset
                            @isset($quizActive)
                                <center id="content-quiz">
                                    <div id="divquiz">
                                        @isset($pass)
                                            @if ($pass == 0 || isset($move))
                                                @if ($retaking <= $quizActive->retake)
                                                    <form id="formQuiz" action="{{ route('checkQuiz', $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @if (isset($GTest))
                                                            <input type="hidden" name="GTest" value="1">
                                                        @else
                                                            <input type="hidden" name="GTest" value="0">
                                                        @endif
                                                        <input type="hidden" name="grade" id="grade" value="0">
                                                        <input type="hidden" name="answers" id="answers">
                                                        <input type="hidden" name="quiz_id" value="{{ $quizActive->id }}">
                                                        @auth('student')
                                                            <input type="hidden"
                                                                value="{{ Auth::guard('student')->user()->id }}"
                                                                name="student_id" />
                                                        @endauth
                                                        <input type="hidden" name="type" value="quiz">
                                                        <section style="width: 1000px;">
                                                            @foreach ($questions as $key => $question)
                                                                @if ($question->question_type == 'true_or_false')
                                                                    <div class="question"
                                                                        data-bs-parent="{{ $question->id }}">
                                                                        <div style="text-align: left;" class="que_text  ml-3">
                                                                            {{ $key + 1 }} .<span> True or false</span>
                                                                        </div>
                                                                        <div style="text-align: left;" class="que_text ml-5">
                                                                            <span>
                                                                                {{ $question->description }}
                                                                                ?</span>
                                                                        </div>
                                                                        <div class="option_list">
                                                                            @foreach ($options as $key => $option)
                                                                                @if ($option->question_id == $question->id)
                                                                                    @if (!isset($answers))
                                                                                        <div class="option data d-flex justify-content-start ml-3"
                                                                                            data-bs-parent="{{ $question->question_type }}">
                                                                                            <input
                                                                                                name="radio{{ $question->id }}"
                                                                                                value="{{ $option->id }}"
                                                                                                class=" mr-3"
                                                                                                style="width: 20px;height:20px;"
                                                                                                type="radio"><span>{{ $option->option_text }}</span>
                                                                                        </div>
                                                                                    @endif
                                                                                    @isset($answers)
                                                                                        @if ($option->is_correct == 1)
                                                                                            <div class="option selected data d-flex justify-content-start ml-3"
                                                                                                data-bs-parent="{{ $question->question_type }}">
                                                                                                <input checked
                                                                                                    name="radio{{ $question->id }}"
                                                                                                    value="{{ $option->id }}"
                                                                                                    class=" mr-3"
                                                                                                    style="width: 20px;height:20px;"
                                                                                                    type="radio"><span>{{ $option->option_text }}</span>
                                                                                            </div>
                                                                                        @else
                                                                                            @foreach ($answers as $answer)
                                                                                                @if ($answer->option_id == $option->id && $answer->question_id == $option->question_id && $answer->is_correct == 0)
                                                                                                    <div class="option false data d-flex justify-content-start ml-3"
                                                                                                        data-bs-parent="{{ $question->question_type }}">
                                                                                                        <input
                                                                                                            name="radio{{ $question->id }}"
                                                                                                            value="{{ $option->id }}"
                                                                                                            class=" mr-3"
                                                                                                            style="width: 20px;height:20px;"
                                                                                                            type="radio"><span>{{ $option->option_text }}</span>
                                                                                                        <i
                                                                                                            class="fa-solid fa-ban text-danger ms-auto fs-4"></i>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if ($answer->option_id !== $option->id && $answer->question_id == $option->question_id)
                                                                                                    <div class="option data d-flex justify-content-start ml-3"
                                                                                                        data-bs-parent="{{ $question->question_type }}">
                                                                                                        <input
                                                                                                            name="radio{{ $question->id }}"
                                                                                                            value="{{ $option->id }}"
                                                                                                            class=" mr-3"
                                                                                                            style="width: 20px;height:20px;"
                                                                                                            type="radio"><span>{{ $option->option_text }}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endisset
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($question->question_type == 'multi_choice')
                                                                    <div class="question"
                                                                        data-bs-parent="{{ $question->id }}">
                                                                        <div style="text-align: left;" class="que_text  ml-3">
                                                                            {{ $key + 1 }} .<span> Multi choice</span>
                                                                        </div>
                                                                        <div style="text-align: left;" class="que_text  ml-5">
                                                                            <span>
                                                                                {{ $question->description }}
                                                                                ?</span>
                                                                        </div>
                                                                        <div class="option_list">
                                                                            @foreach ($options as $key => $option)
                                                                                @if ($option->question_id == $question->id)
                                                                                    @if (!isset($answers))
                                                                                        <div
                                                                                            class="option data d-flex justify-content-start ml-3"data-bs-parent="{{ $question->question_type }}">
                                                                                            <input
                                                                                                style="width: 20px;height:20px;"
                                                                                                class=" mr-3"
                                                                                                value="{{ $option->id }}"
                                                                                                id="check{{ $key + 1 }}"
                                                                                                type="checkbox"><span
                                                                                                for="check{{ $key + 1 }}">{{ $option->option_text }}</span>
                                                                                        </div>
                                                                                    @endif

                                                                                    @isset($answers)
                                                                                        @php
                                                                                            $found = false;
                                                                                            foreach (
                                                                                                $answers
                                                                                                as $answer
                                                                                            ) {
                                                                                                if (
                                                                                                    $answer->option_id ==
                                                                                                        $option->id &&
                                                                                                    $answer->question_id ==
                                                                                                        $option->question_id &&
                                                                                                    $answer->is_correct ==
                                                                                                        0
                                                                                                ) {
                                                                                                    $found = true;
                                                                                                    break;
                                                                                                }
                                                                                            }
                                                                                        @endphp
                                                                                        @if ($option->is_correct == 1)
                                                                                            <div
                                                                                                class="option data selected d-flex justify-content-start ml-3"data-bs-parent="{{ $question->question_type }}">
                                                                                                <input checked
                                                                                                    style="width: 20px;height:20px;"
                                                                                                    class=" mr-3"
                                                                                                    value="{{ $option->id }}"
                                                                                                    id="check{{ $key + 1 }}"
                                                                                                    type="checkbox"><span
                                                                                                    for="check{{ $key + 1 }}">{{ $option->option_text }}</span>
                                                                                            </div>
                                                                                        @elseif($found)
                                                                                            {{-- @foreach ($answers as $answer)
                                                                @if ($answer->option_id == $option->id && $answer->question_id == $option->question_id && $answer->is_correct == 0) --}}
                                                                                            <div
                                                                                                class="option data false d-flex justify-content-start ml-3"data-bs-parent="{{ $question->question_type }}">
                                                                                                <input checked
                                                                                                    style="width: 20px;height:20px;"
                                                                                                    class=" mr-3"
                                                                                                    value="{{ $option->id }}"
                                                                                                    id="check{{ $key + 1 }}"
                                                                                                    type="checkbox"><span
                                                                                                    for="check{{ $key + 1 }}">{{ $option->option_text }}</span>
                                                                                                <i
                                                                                                    class="fa-solid fa-ban text-danger ms-auto fs-4"></i>
                                                                                            </div>
                                                                                        @else
                                                                                            <div
                                                                                                class="option data d-flex justify-content-start ml-3"data-bs-parent="{{ $question->question_type }}">
                                                                                                <input
                                                                                                    style="width: 20px;height:20px;"
                                                                                                    class=" mr-3"
                                                                                                    value="{{ $option->id }}"
                                                                                                    id="check{{ $key + 1 }}"
                                                                                                    type="checkbox"><span
                                                                                                    for="check{{ $key + 1 }}">{{ $option->option_text }}</span>
                                                                                            </div>
                                                                                            {{-- @endif --}}
                                                                                            {{-- @endforeach --}}
                                                                                        @endif
                                                                                    @endisset
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if ($question->question_type == 'single_choice')
                                                                    <div class="question"
                                                                        data-bs-parent="{{ $question->id }}">
                                                                        <div style="text-align: left;" class="que_text  ml-3">
                                                                            {{ $key + 1 }} .<span> Single choice</span>
                                                                        </div>
                                                                        <div style="text-align: left;" class="que_text ml-5">
                                                                            <span>
                                                                                {{ $question->description }}
                                                                                ?</span>
                                                                        </div>
                                                                        <div class="option_list">
                                                                            @foreach ($options as $key => $option)
                                                                                @if ($option->question_id == $question->id)
                                                                                    @if (!isset($answers))
                                                                                        <div class="option data d-flex justify-content-start ml-3"
                                                                                            data-bs-parent="{{ $question->question_type }}">
                                                                                            <input
                                                                                                name="radio{{ $question->id }}"
                                                                                                value="{{ $option->id }}"
                                                                                                class=" mr-3"
                                                                                                style="width: 20px;height:20px;"
                                                                                                type="radio"><span>{{ $option->option_text }}</span>
                                                                                        </div>
                                                                                    @endif
                                                                                    @isset($answers)
                                                                                        @if ($option->is_correct == 1)
                                                                                            <div class="option selected data d-flex justify-content-start ml-3"
                                                                                                data-bs-parent="{{ $question->question_type }}">
                                                                                                <input checked
                                                                                                    name="radio{{ $question->id }}"
                                                                                                    value="{{ $option->id }}"
                                                                                                    class=" mr-3"
                                                                                                    style="width: 20px;height:20px;"
                                                                                                    type="radio"><span>{{ $option->option_text }}</span>
                                                                                            </div>
                                                                                        @else
                                                                                            @foreach ($answers as $answer)
                                                                                                @if ($answer->option_id == $option->id && $answer->question_id == $option->question_id && $answer->is_correct == 0)
                                                                                                    <div class="option false data d-flex justify-content-start ml-3"
                                                                                                        data-bs-parent="{{ $question->question_type }}">
                                                                                                        <input
                                                                                                            name="radio{{ $question->id }}"
                                                                                                            value="{{ $option->id }}"
                                                                                                            class=" mr-3"
                                                                                                            style="width: 20px;height:20px;"
                                                                                                            type="radio"><span>{{ $option->option_text }}</span>
                                                                                                        <i
                                                                                                            class="fa-solid fa-ban text-danger ms-auto fs-4"></i>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if ($answer->option_id !== $option->id && $answer->question_id == $option->question_id)
                                                                                                    <div class="option data d-flex justify-content-start ml-3"
                                                                                                        data-bs-parent="{{ $question->question_type }}">
                                                                                                        <input
                                                                                                            name="radio{{ $question->id }}"
                                                                                                            value="{{ $option->id }}"
                                                                                                            class=" mr-3"
                                                                                                            style="width: 20px;height:20px;"
                                                                                                            type="radio"><span>{{ $option->option_text }}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endisset
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            @if (isset($pass) && isset($grade))
                                                                @if ($pass == 1 && $quizActive->retake - $retaking >= 0)
                                                                    <div class="gauge">
                                                                        <div class="gauge__body">
                                                                            <div class="gauge__fill"></div>
                                                                            <div class="gauge__cover"></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($pass == 0 && $quizActive->retake - $retaking >= 0)
                                                                    <div class="gauge">
                                                                        <div class="gauge__body">
                                                                            <div class="gauge__fill"
                                                                                style="background: #E72929 !important"></div>
                                                                            <div class="gauge__cover"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-danger">
                                                                        Your score is below the passing grade of
                                                                        {{ $quizActive->passing_grade }}. Please review the
                                                                        material and
                                                                        reach out<br> if you need assistance.
                                                                    </div>
                                                                @endif
                                                                <script>
                                                                    window.scrollTo({
                                                                        top: document.body.scrollHeight,
                                                                        behavior: 'smooth' // Smooth scrolling animation
                                                                    });
                                                                    const gaugeElement = document.querySelector(".gauge");

                                                                    function setGaugeValue(gauge, value) {
                                                                        if (value < 0 || value > 1) {
                                                                            return;
                                                                        }
                                                                        gauge.querySelector(".gauge__fill").style.transform = `rotate(${
                                                                            value / 2
                                                                        }turn)`;
                                                                        gauge.querySelector(".gauge__cover").textContent = `${Math.round(
                                                                            value * 100
                                                                        )}%`;
                                                                    }

                                                                    let grade = @json($grade);

                                                                    function percentageToNumber(percentage) {
                                                                        const result = percentage / 100;
                                                                        return parseFloat(result.toFixed(2));
                                                                    }
                                                                    setGaugeValue(gaugeElement, percentageToNumber(grade));
                                                                </script>
                                                            @endif
                                                            <div id="error" style="display: none;"
                                                                class="btn__display top element-color-control-icon">
                                                                <div class="text-danger has-error" role="content"
                                                                    data-sider-select-id="a76800fe-ece4-418b-ae38-7e80bab89cb6">
                                                                    <i class="fas fa-warning text-danger mr-2"></i>Please
                                                                    answer
                                                                    all
                                                                    the above questions before clicking 'Submit'<div
                                                                        class="unanswered-qustions-number"
                                                                        data-sider-select-id="552ee91b-eb56-4474-a424-d7b8e311c914">
                                                                        <div>Unanswered question number:</div><span
                                                                            id="bnquestion"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <input type="hidden" name="retake" value="0">
                                                            @if (isset($retaking) && $pass === 0)
                                                                <input type="hidden" name="retake" value="1">
                                                                <button style="padding: 2% 20% 2% 20% ;" id="commit"
                                                                    type="button" class="btn btn-primary retake">Submit<span
                                                                        style="font-size: 12px;">
                                                                        Retaking({{ $quizActive->retake - $retaking }})</span></button>
                                                            @elseif (!isset($move))
                                                                <button style="padding: 2% 20% 2% 20% ;" id="commit"
                                                                    type="button" class="btn btn-primary">Submit</button>
                                                            @endif
                                                        </section>
                                                    </form>
                                                    @if ($pass == 1 && $move)
                                                        <form id='formFinishQ' style="display: inline !important;"
                                                            class="d-inline formFinishQ"
                                                            action="{{ route('curriculum_list.next', $course->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $quizActive->order }}"
                                                                name="order">
                                                            @auth('student')
                                                                <input type="hidden"
                                                                    value="{{ Auth::guard('student')->user()->id }}"
                                                                    name="student_id" />
                                                            @endauth
                                                            <input type="hidden" value="{{ $quizActive->id }}"
                                                                name="lesson_id">
                                                            <div class="alert alert-success mt-4" role="alert">
                                                                Congratulations! You are past the test successfully.
                                                                <button id="buttonSubmit"
                                                                    type="button"class="btn btn-primary btn-sm">Contunue...</button>
                                                            </div>
                                                        </form>
                                                        <script>
                                                            function Submit() {
                                                                // this.parentElement.parentElement.submit()
                                                                document.getElementById('buttonSubmit').addEventListener('click', function() {
                                                                    // document.getElementById('formQuiz').preventDefault();
                                                                    document.querySelector('#formFinishQ').submit();
                                                                    // console.log(document.getElementById('formFinishQ'));
                                                                })
                                                            }
                                                            Submit();
                                                        </script>
                                                    @endif
                                                @elseif($retaking >= $quizActive->retake)
                                                    <form id='formFinishQ' style="display: inline !important;"
                                                        class="d-inline formFinishQ"
                                                        action="{{ route('curriculum_list.next', $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $quizActive->order }}"
                                                            name="order">
                                                        @auth('student')
                                                            <input type="hidden"
                                                                value="{{ Auth::guard('student')->user()->id }}"
                                                                name="student_id" />
                                                        @endauth
                                                        <input type="hidden" value="{{ $quizActive->id }}"
                                                            name="lesson_id">
                                                        <center>
                                                            @if (isset($pass) && isset($grade))
                                                                @if ($pass == 1 && $retaking >= $quizActive->retake)
                                                                    <div class="gauge">
                                                                        <div class="gauge__body">
                                                                            <div class="gauge__fill"></div>
                                                                            <div class="gauge__cover"></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($pass == 0 && $retaking >= $quizActive->retake)
                                                                    <div class="gauge">
                                                                        <div class="gauge__body">
                                                                            <div class="gauge__fill"
                                                                                style="background: #E72929 !important"></div>
                                                                            <div class="gauge__cover"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-danger">
                                                                        Your score is below the passing grade of
                                                                        {{ $quizActive->passing_grade }}. Please review the
                                                                        material and
                                                                        reach out<br> if you need assistance.
                                                                    </div>
                                                                @endif
                                                                <script>
                                                                    window.scrollTo({
                                                                        top: document.body.scrollHeight,
                                                                        behavior: 'smooth' // Smooth scrolling animation
                                                                    });
                                                                    const gaugeElement = document.querySelector(".gauge");

                                                                    function setGaugeValue(gauge, value) {
                                                                        if (value < 0 || value > 1) {
                                                                            return;
                                                                        }
                                                                        gauge.querySelector(".gauge__fill").style.transform = `rotate(${
                                                                            value / 2
                                                                        }turn)`;
                                                                        gauge.querySelector(".gauge__cover").textContent = `${Math.round(
                                                                            value * 100
                                                                        )}%`;
                                                                    }

                                                                    let grade = @json($grade);

                                                                    function percentageToNumber(percentage) {
                                                                        const result = percentage / 100;
                                                                        return parseFloat(result.toFixed(2));
                                                                    }
                                                                    setGaugeValue(gaugeElement, percentageToNumber(grade));
                                                                </script>
                                                            @endif
                                                            <div class="alert alert-success mt-4" role="alert">
                                                                You have completed the maximum number of retakes for this quiz.
                                                                Your
                                                                score from your latest attempt will be considered final.
                                                                @if (isset($GTest))
                                                                    <a href="{{ route('EnglishChallenger.index') }}"
                                                                        class="btn btn-primary btn-sm">Go to home page</a>
                                                                @else
                                                                    <button id="buttonSubmit"
                                                                        type="button"class="btn btn-primary btn-sm">Contunue...</button>
                                                                @endif
                                                            </div>
                                                        </center>
                                                    </form>
                                                    <script>
                                                        function Submit() {
                                                            // this.parentElement.parentElement.submit()
                                                            document.getElementById('buttonSubmit').addEventListener('click', function() {
                                                                // document.getElementById('formQuiz').preventDefault();
                                                                document.querySelector('#formFinishQ').submit();
                                                                // console.log(document.getElementById('formFinishQ'));
                                                            })
                                                        }
                                                        Submit();
                                                    </script>
                                                @endif
                                            @endif
                                            @if ($pass == 1 && !isset($move))
                                                <div class="alert alert-success" role="alert">
                                                    Congratulations! You are already past the test successfully.
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="goBack()">Go
                                                        Back</button>
                                                </div>
                                            @endif
                                        @endisset
                                    </div>
                                    @if ($retaking == 0)
                                        <div id="div-start">
                                            <div>
                                                <h1>{{ $quizActive->title }}</h1>
                                                <p class="text-light-50">
                                                    {{ $quizActive->description }}
                                                </p>
                                            </div>
                                            <div>
                                                <span class=" mr-4"><i class="fa-solid fa-puzzle-piece mr-2"></i></i>
                                                    Questions:
                                                    {{ count($questions) }}</span>
                                                <span class=" mr-4"><i class="fa-solid fa-clock mr-2"></i>
                                                    Duration: {{ $quizActive->duration }}</span>
                                                <span class=" mr-4"><i class="fa-solid fa-signal mr-2"></i> Passing
                                                    grade:
                                                    {{ $quizActive->passing_grade }}</span>
                                                <div>
                                                    <livewire:time-quiz />
                                                </div>
                                            </div>
                                            <script>
                                                const btnStat = document.getElementById('btn-Stat')
                                                const quizPage = document.querySelector('#divquiz');
                                                const divStart = document.querySelector('#div-start');
                                                quizPage.style.display = 'none'
                                                btnStat.addEventListener('click', function() {
                                                    setTimeout(function() {
                                                        console.log(document.getElementById('time'))
                                                        console.log('hello from js')
                                                        const totalTime = {{ $quizActive->duration }};
                                                        console.log('hello from livewire')
                                                        const timerDisplay = document.getElementById('time');
                                                        console.log(timerDisplay)
                                                        let timeLeft = totalTime * 60;

                                                        function updateTimer() {
                                                            const minutes = Math.floor(timeLeft / 60);
                                                            const seconds = timeLeft % 60;
                                                            timerDisplay.textContent =
                                                                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                                                            if (timeLeft <= 0) {
                                                                clearInterval(timerInterval);
                                                                timerDisplay.textContent = "Time's up!";
                                                                document.getElementById('formQuiz').submit();
                                                            } else {
                                                                timeLeft--;
                                                            }
                                                        }
                                                        const timerInterval = setInterval(updateTimer, 1000);
                                                    }, 2000);

                                                })
                                                btnStat.addEventListener('click', function() {
                                                    quizPage.style.display = '';
                                                    divStart.style.display = 'none';
                                                })
                                            </script>
                                        </div>
                                    @endif
                                </center>
                            @endisset
            </section>

        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('storage/assets/js/script2.js') }}"></script>
    <script src="{{ asset('storage/assets/js/questions.js') }}"></script>
    <script>
        try {
            function goBack() {
                window.history.back();
            }
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
                        <input type="hidden" value="${lesson.id}" name="lesson_id" />
                        @auth('student')
                                                                <input type="hidden" value="{{ Auth::guard('student')->user()->id }}" name="student_id" />
                                                                @endauth
                        <input type="hidden" name="course_id"
                        value="{{ $course->id }}">
                        <input type="hidden" name='type' value="${lesson.type}"/>
                        <div class="list">
                            <svg fill="#FFFFFF" width="20px" height="20px"
                                                                viewBox="-3.5 0 19 19"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="cf-icon-svg mr-1">
                                                                <path
                                                                    d="M11.16 16.153a.477.477 0 0 1-.476.475H1.316a.477.477 0 0 1-.475-.475V3.046a.477.477 0 0 1 .475-.475h6.95l2.893 2.893zm-1.11-9.924H8.059a.575.575 0 0 1-.574-.574V3.679H1.95v11.84h8.102zM3.907 4.92a1.03 1.03 0 1 0 1.029 1.03 1.03 1.03 0 0 0-1.03-1.03zm4.958 3.253h-5.87v1.108h5.87zm0 2.354h-5.87v1.109h5.87zm0 2.354h-5.87v1.109h5.87z"
                                                                    fill-rule="evenodd" />
                                                            </svg>
                            <li id="lessonItem" onclick="this.parentElement.parentElement.submit()" class='lesson-item text-light d-inline lessonItem' style="background-color: #07294D;cursor: pointer;">
                            ${lesson.title}<br>
                            ${lesson.view == 0 ?
                            `<span class="text-white-50" style="font-size:12px;margin-left:8rem;">${lesson.duration}<i class="fa-light fa-eye ml-2" style="font-size: 18px; display: inline;"></i></span>` :
                            `<span class="text-white-50" style="font-size:12px;margin-left:8rem;">${lesson.duration}<i style="font-size: 18px; display: inline;" class="fa-solid fa-check ml-2"></i></span>`
                        }
                        </li>
                        </div>
                    </form>`;
                            }

                            if (quizzes.length !== 0) {
                                if (lesson.curriculum_id == cr.id && lesson.type == 'quiz') {
                                    html += `
                                <form id="lessonForm" action="/curriculum_list/${cr.course_id}" method="post">
                                @csrf
                                <input type="hidden" value="${lesson.id}" name="lesson_id" />
                                <@auth('student')
                                                                <input type="hidden" value="{{ Auth::guard('student')->user()->id }}" name="student_id" />
                                                                @endauth
                                <input type="hidden" name="course_id"
                                value="{{ $course->id }}">
                                <input type="hidden" name='type' value="${lesson.type}"/>
                                <div class="list"><svg fill="#FFFFFF" width="15px" height="15px" class=' mr-1'
                                                                viewBox="0 0 1920 1920"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M960 112.941c-467.125 0-847.059 379.934-847.059 847.059 0 467.125 379.934 847.059 847.059 847.059 467.125 0 847.059-379.934 847.059-847.059 0-467.125-379.934-847.059-847.059-847.059M960 1920C430.645 1920 0 1489.355 0 960S430.645 0 960 0s960 430.645 960 960-430.645 960-960 960m417.905-575.955L903.552 988.28V395.34h112.941v536.47l429.177 321.77-67.765 90.465Z"
                                                                    fill-rule="evenodd" />
                                                            </svg><li
                                                            onclick="this.parentElement.parentElement.submit()"
                                                            id="lessonItem" style="cursor: pointer;"
                                                                    class="lesson-item text-light d-inline lessonItem"
                                                                    style="background-color: #07294D;"id="item-curriculum">

                                                            ${lesson.title} <br>
                                                            ${lesson.pass === null ?
                    `<span class="text-white-50" style="font-size:12px;margin-left:8rem; display: inline;">${lesson.duration}${lesson.duration_unit.charAt(0)} <i class="fa-regular fa-lock ml-2" style="font-size: 18px; display: inline;"></i></span>` :
                    (lesson.pass == 1 ?
                        `<span class="text-white-50" style="font-size:12px;margin-left:8rem;">${lesson.duration}${lesson.duration_unit.charAt(0)} <i style="font-size: 18px; display: inline;" class="fa-solid fa-check ml-2"></i></span>` :
                        `<span class="text-white-50" style="font-size:12px;margin-left:8rem;">${lesson.duration}${lesson.duration_unit.charAt(0)} <i style="font-size: 18px; display: inline;" class="fa-solid fa-xmark ml-2"></i></span>`
                    )
                }
                                                        </li>
                                                        </div>
                                                    </form>`
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
        } catch (err) {
            console.log(err)
        }
        const data = document.querySelectorAll('.option')
        data.forEach(item => {
            item.addEventListener('click', function() {

                if (this.dataset.bsParent == 'true_or_false' || this.dataset.bsParent == 'single_choice') {
                    if (this.classList.contains('selected')) {
                        this.classList.remove('selected');
                        let input = this.querySelector('input');
                        input.removeAttribute('checked');

                    } else {
                        let prent = this.parentElement.parentElement.querySelectorAll('.selected')
                        prent.forEach(el => {
                            el.classList.remove('selected');
                            let input = el.querySelector('input');
                            input.removeAttribute('checked');
                        })
                        this.classList.add('selected');
                        let input = this.querySelector('input');
                        input.setAttribute('checked', 'checked');
                    }
                }
                if (this.dataset.bsParent == 'multi_choice') {
                    if (this.classList.contains('selected')) {
                        let inputCheck = this.querySelector('input')
                        inputCheck.removeAttribute('checked');
                        this.classList.remove('selected');
                    } else {
                        this.classList.add('selected');
                        let inputCheck = this.querySelector('input')
                        inputCheck.setAttribute('checked', 'checked');
                    }
                }
            })
        })
        let error = false;
        let NBError = [];
        let options = @json($options);
        let nbQuestions = @json($questions).length;
        let correctionSingleC = [];
        let correctionMltiC = [];

        console.log(options)
        document.getElementById('commit').addEventListener('click', function() {
            let parents = document.querySelectorAll('.question');
            parents.forEach((el, key) => {

                let itemSelected = el.querySelectorAll('.selected');
                if (itemSelected.length == 0) {
                    NBError.push(key + 1);
                    error = true;
                } else {
                    itemSelected.forEach(item => {
                        let question_type = item.dataset.bsParent;
                        let option_id = item.querySelector('input').value
                        let question_id = item.parentElement.parentElement.dataset.bsParent
                        options.forEach((option) => {
                            if (option['id'] == option_id && question_id == option[
                                    'question_id'] &&
                                question_type !== 'multi_choice') {
                                correctionSingleC.push({
                                    option_id: option['id'],
                                    question_id: option['question_id'],
                                    is_correct: option['is_correct']
                                })
                            }
                            if (option['id'] == option_id && question_id == option[
                                    'question_id'] && question_type == 'multi_choice') {
                                correctionMltiC.push({
                                    option_id: option['id'],
                                    question_id: option['question_id'],
                                    is_correct: option['is_correct']
                                })
                            }
                        })
                    })
                }
            });
            correctionMltiC = correctionMltiC.concat(correctionSingleC)
            document.getElementById('answers').value = JSON.stringify(correctionMltiC);

            let nbCorrectSingleC = 0;
            let nbNOtCorrectSingleC = 0;
            correctionSingleC.forEach(option => {
                if (option.is_correct == 1) {
                    nbCorrectSingleC++;
                } else {
                    nbNOtCorrectSingleC++
                }
            })
            correctionMltiC.forEach(item => {
                options.forEach(option => {
                    if (item.question_id == option.question_id) {
                        if (item.is_correct == 1 && item.option_id != option.id && option
                            .is_correct == 1) {
                            let otherAnswerId = options.find(opt => opt.id != item.option_id && opt
                                .question_id == item.question_id && opt.is_correct == 1).id;
                            let otherAnswer = correctionMltiC.find(opt => opt.option_id ==
                                otherAnswerId)
                            if (otherAnswer == undefined) {
                                item.is_correct = 0;
                            }
                        }
                    }
                })
            })
            let correctMutli = [];
            let uniqueQuestions = new Set();
            for (let i = 0; i < correctionMltiC.length; i++) {
                let option = correctionMltiC[i];
                let questionId = option.question_id;
                if (!uniqueQuestions.has(questionId)) {
                    uniqueQuestions.add(questionId);
                    let hasIncorrectAnswer = false;
                    for (let j = 0; j < correctionMltiC.length; j++) {
                        if (correctionMltiC[j].question_id === questionId && correctionMltiC[j].is_correct === 0) {
                            hasIncorrectAnswer = true;
                            break;
                        }
                    }
                    correctMutli.push(hasIncorrectAnswer ? 0 : 1);
                }
            }

            const totalCorrect = correctMutli.reduce((a, b) => a + b, 0)
            const scorePercentage = (totalCorrect / nbQuestions) * 100
            document.getElementById('grade').value = Math.round(scorePercentage)
            if (NBError.length > 0) {
                document.getElementById('error').style.display = 'block'
                let htmlNB = NBError.join(', ');
                NBError = [];
                document.getElementById('bnquestion').innerHTML = htmlNB;
            } else {
                document.getElementById('error').style.display = 'none'
                document.getElementById('formQuiz').submit();
            }
        });
        const retake = document.querySelector('.retake')
        if (retake) {
            const selectedElements = document.querySelectorAll('.selected');
            const falseElements = document.querySelectorAll('.false');

            function removeSelectedClass() {
                selectedElements.forEach(element => {
                    element.classList.remove('selected');
                    const input = element.querySelector('input');
                    const inputCheckbox = element.querySelectorAll('input[type=checbox]');
                    if (input) {
                        input.checked = false;
                    }
                    inputCheckbox.forEach(el => {
                        el.removeAttribute('checked')
                    })
                });
                const Finput = document.querySelectorAll('input:checked')
                Finput.forEach(el => {
                    el.removeAttribute('checked')
                })
                console.log(falseElements)
                falseElements.forEach(element => {
                    element.classList.remove('false');
                    element.querySelector('i').remove();
                });
            }
            setTimeout(removeSelectedClass, 5000);
        }
    </script>

    @include('layouts.js')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>

</html>
