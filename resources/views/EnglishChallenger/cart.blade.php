@extends('layouts.app')
@section('title', 'cart')
@section('content')
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> CART </h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">HOME</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Cart
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            @livewire('display-cart-content')
        </div>
    </section>
    <!--shop category end-->
</main>
<script>
    // Loop through each book and attach event listeners
    function SubmitForm() {
        const eleT = document.querySelectorAll(".submitButton");
        for (let i = 0; i < eleT.length; i++) {
            eleT[i].addEventListener("click", function() {
                this.parentElement.submit();
                // console.log('helo');
            });
        }
    }
    SubmitForm()
</script>


@endsection
