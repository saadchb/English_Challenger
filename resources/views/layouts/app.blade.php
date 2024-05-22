<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="English, distant learning, education, kids education, language school, learning online , online courses,school , training, university ">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" href="{{ asset('build/assets/images/English_Icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bootstrap/bootstrap.css') }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bicon/css/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/themify/themify-icons.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/animate-css/animate.css') }}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce.css') }}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/responsive.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <style>
        #submit_btn:hover {
            background-color: #FAFAFA;
            border-color: #FAFAFA;
        }

        .icons1:hover {

            border-radius: 50%;
            text-align: center;
            background-color: #e0ceb6;
            color: black;
            padding: 10px;
            transform: translateY(0px);
            transition: all 0.3s ease-in-out;

        }

        .icons1 {
            border-radius: 50%;
            text-align: center;
            padding: 10px;

        }

        .div1 {
            border-radius: 15px;
        }

        .div1:hover {
            background-color: #00000056 !important;
            border: solid 1px #ffffffaa !important;
        }

        .loading {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #fff url("{{ asset('build/assets/images/loading.gif') }}") no-repeat center center;
            z-index: 99999;
        }
    </style>
    <title>EnglishChallenger | @yield('title')</title>
    @livewireStyles

</head>
@include('layouts.css')
</head>

<body id="top-header" onload="myFunction()">
    <div class="loading"></div>
    <?php

    use App\Models\Course;

    // Fetch data from the database (example)
    $courses = Course::all();


    ?>

    <header>
        @include('layouts.header')
    </header>


    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <!-- id="searchForm" -->
            <form action="{{ route('search') }}" method="GET" class="search-form" id="mainSearchForm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <h3>Search Your keyword</h3>
                            <div class="input-group">
                                <input name="search" id="searchInput" type="text" placeholder="Search..." class="form-control search-input" />
                                <div class="input-group-append">
                                    <button type="submit" style="height: 50px;background-color: purple;" aria-label="search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <ul id="searchResults" style="background: #f6f6f6;top: 50%;margin: auto; margin-top: 27px ;margin: 0 0% 2% 0%; padding: 0% 3% 0% 3%"></ul>
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <img class="search-close" src="{{ asset('build/assets/images/close.png') }}" srcset="build/assets/images/close@2x.png 2x" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form hidden id="secondSearchForm" action="{{ route('search.result') }}" method="GET" class="search-form">
                <input name="search2" id="secondSearchInput" type="text" placeholder="Search..." class="form-control search-input" />
                <button type="submit" style="height: 50px;background-color: purple;" aria-label="search"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <section class="content">
        @yield('content')
    </section>

    </div>
    </div>
    <section class="cta-2">
        <div class="container">
            <div class="row align-items-center subscribe-section ">
                <div class="col-lg-6">
                    <div class="section-heading white-text">
                        <span class="subheading">Newsletter</span>
                        <h3>Join our community of students</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer pt-120">
        @include('layouts.footer')
    </section>

    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

    @include('layouts.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Main jQuery -->
    <script src="{{ asset('storage/assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('storage/assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('storage/assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/jquery.isotope.js') }}"></script>
    <script src="{{ asset('storage/assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('storage/assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/script.js') }}"></script>

    <script>
        // JavaScript to show/hide the loading spinner
        window.onload = function() {
            // Hide the loading spinner when the page finishes loading
            document.querySelector('.loading').style.display = 'none';
        };
    </script>

    <script>
        let typingTimer; // Timer identifier
        const doneTypingInterval = 500; // Time in milliseconds (0.5 seconds)

        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(typingTimer); // Clear the previous timer

            // Start a new timer when the user starts typing
            typingTimer = setTimeout(function() {
                liveSearch(this.value); // Call liveSearch function after the typing interval
            }.bind(this), doneTypingInterval);
        });

        function liveSearch(searchTerm) {
            const searchResults = document.getElementById('searchResults');
            // Clear previous search results
            searchResults.innerHTML = '';

            // Check if the search term is not empty
            if (searchTerm.trim() !== '') {
                // Perform the AJAX request to fetch search results
                fetch(`/search?search=${searchTerm}`)

                    .then(response => response.json())
                    .then(data => {

                        const uniqueBooks = {}; // Object to store unique book titles
                        data.books.forEach(book => {
                            uniqueBooks[book.title] = book; // Store book by title in the object
                        });

                        data.courses.forEach(book => {
                            uniqueBooks[book.title] = book; // Store book by title in the object
                        });

                        data.schools.forEach(book => {
                            uniqueBooks[book.school_name] = book; // Store book by title in the object
                        });

                        if (Object.keys(uniqueBooks).length === 0) {
                            const errorMessage = document.createElement('p');
                            errorMessage.textContent = 'No results found';
                            searchResults.appendChild(errorMessage);
                        } else {
                            // Iterate over unique courses and append them to the search results
                            Object.values(uniqueBooks).forEach(book => {
                                const listItem = document.createElement('li');
                                const link = document.createElement('a');
                                link.textContent = book.title;
                                if (book.hasOwnProperty('file_path')) { // Check if it's a book or a course
                                    link.href = `/E_library/book/${book.id}`;
                                } else {
                                    link.href = `/course_detail/${book.id}`;
                                }
                                link.style = 'color: black; font-size: medium;';
                                link.style.transition = 'color 0.3s, text-decoration 0.3s'; // Add smooth transition effect for color and text-decoration

                                // Add hover effect to change color and underline when hovered over
                                link.style.setProperty('color', 'black');
                                link.style.setProperty('text-decoration', 'none');
                                link.addEventListener('mouseover', function() {
                                    this.style.color = 'purple'; // Change to your desired hover color
                                    this.style.textDecoration = 'underline'; // Add underline when hovered over
                                });

                                link.addEventListener('mouseout', function() {
                                    this.style.color = 'black'; // Change back to original color when mouse leaves
                                    this.style.textDecoration = 'none'; // Remove underline when mouse leaves
                                });
                                listItem.appendChild(link);
                                searchResults.appendChild(listItem);
                            });
                            // Create a "See More" link
                            const seeMoreLink = document.createElement('a');
                            seeMoreLink.textContent = 'See More';
                            seeMoreLink.style = ' font-weight: bold;';
                            seeMoreLink.href = '/course_list';
                            const seeMoreListItem = document.createElement('li');
                            seeMoreListItem.appendChild(seeMoreLink);
                            searchResults.appendChild(seeMoreListItem);

                        }

                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                    });
            }
        }
    </script>
<script>
    // Add event listener to the main search form
    document.getElementById('mainSearchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        // Get the value of the search term from the main search input
        const searchTerm = document.getElementById('searchInput').value;

        // Set the value of the hidden input field in the second form
        document.getElementById('secondSearchInput').value = searchTerm;

        // Submit the second form
        document.getElementById('secondSearchForm').submit();
    });
</script>
@livewireScripts

</body>

</html>