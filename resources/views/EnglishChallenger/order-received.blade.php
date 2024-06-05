@extends('layouts.app')
@section('title', 'checkout')
@section('content')
    <section id="books-bg" class="page-header"
        style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-header-content">
                        <h1><b style=" color: #FF1949;">|</b> Chekout </h1>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="/">HOME</a>
                            </li>
                            <li class="list-inline-item">/</li>
                            <li class="list-inline-item">
                                order-received
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <div class="container site-content">
        <div class="row">
            <main id="main" class="site-main col-sm-12 full-width">
                <article id="post-1699" class="post-1699 page type-page status-publish hentry pmpro-has-access">
                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce-order">
                                <p
                                    class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                    Thank you. Your order has been received.</p>
                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                    <li class="woocommerce-order-overview__order order">
                                        Order number: <strong>{{$checkout->id}}</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__date date">
                                        Date: <strong>{{$checkout->created_at}}</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__email email">
                                        Email: <strong>{{$checkout->billing_email}}</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__total total">
                                        Total: <strong><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">Mad</span> {{$total}}</bdi></span></strong>
                                    </li>
                                    <li class="woocommerce-order-overview__payment-method method">
                                        Payment method: <strong>{{$checkout->payment_method}}</strong>
                                    </li>
                                </ul>
                                <p>{{$checkout->order_comments}}</p>
                                <section class="woocommerce-order-details">
                                    <h2 class="woocommerce-order-details__title">Order details</h2>
                                    <table
                                        class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                        <thead>
                                            <tr>
                                                <th class="woocommerce-table__product-name product-name">Product</th>
                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $cart)
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="https://eduma.thimpress.com/demo-main/product/wood-postcard/">{{$cart['name']}}</a>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">Mad</span> {{$cart['price']}}</bdi></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <th scope="row">Payment method:</th>
                                                <td>{{$checkout->payment_method}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total:</th>
                                                <td><span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">Mad</span> {{$total}}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </section>
                                <section class="woocommerce-customer-details">
                                    <h1 class="woocommerce-column__title">Billing address</h1>
                                    <address>
                                        {{$checkout->billing_first_name}}  {{$checkout->billing_last_name}}<br>{{$checkout->billing_address_1}}<br>{{$checkout->billing_company}}<br>{{$checkout->billing_country}}<br>{{$checkout->billing_postcode}}<br>{{$checkout->billing_city}}
                                        <p><i class='fas fa-phone ml-2'></i> {{$checkout->phone}}</p>
                                        <p><i class="far fa-envelope ml-2"></i> {{$checkout->billing_email}}</p>
                                    </address>
                                </section>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
@endsection
