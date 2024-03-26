@extends('layouts.app')
@section('title', 'library')
@section('content')
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-bg.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> Books List</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">Home </a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Courses
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    <main class="site-main page-wrapper  woocommerce">
        <!--product section start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="section-title">
    <h2 class="title d-block text-left-sm">Shop</h2>
    <p class="woocommerce-result-count"> Showing 1–16 of 17 results</p>
    <form class="woocommerce-ordering float-lg-right" method="get">
        <select name="orderby" class="orderby form-control" aria-label="Shop order" >
            <option value="" selected="selected">Default sorting</option>
            <option value="">Sort by popularity</option>
            <option value="">Sort by average rating</option>
            <option value="">Sort by latest</option>
            <option value="">Sort by price: low to high</option>
            <option value="">Sort by price: high to low</option>
        </select>
        <input type="hidden" name="paged" value="1">
    </form>
</div>
                        <ul class="products columns-3">
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p1.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="onsale">Sale!</span>
        <span class="price">
            <del>
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">$</span>
                    45.00
                </span>
            </del>
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">$</span>
                    42.00
                </span>
            </ins>
        </span>

        <div class="star-rating"></div>
    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p2.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product last">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p3.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p4.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p5.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product last">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p6.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p7.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p8.jpg" alt="">
            </a>

            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
           
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product last">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p9.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Nike Running Plus jacket with printed panels in black</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p1.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="onsale">Sale!</span>
        <span class="price">
            <del>
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">$</span>
                    45.00
                </span>
            </del>
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">$</span>
                    42.00
                </span>
            </ins>

        </span>
    <div class="star-rating"></div>

    </li>
    <li class="product">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p2.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
    <li class="product last">
        <div class="product-wrap">
            <a href="#" class="">
                <img src="assets/images/shop/p3.jpg" alt="">
            </a>
            <div class="product-btn-wrap">
                <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                    <i class="fa fa-shopping-basket"></i>
                </a>
                <a href="#" class="button wish-list"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="woocommerce-product-title-wrap">
            <h2 class="woocommerce-loop-product__title">
                <a href="#">Stitched leather sports shoe</a>
            </h2>
        </div>
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">$</span> 18.00
            </span>
        </span>
        <div class="star-rating"></div>

    </li>
</ul>

                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers">
                                <li><span aria-current="page" class="page-numbers current">1</span></li>
                                <li><a class="page-numbers" href="https://ha.motologgers.com/shop/page/2/">2</a></li>
                                <li><a class="next page-numbers" href="https://ha.motologgers.com/shop/page/2/">→</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!-- product Sidebar start-->
<div class="col-lg-4 widget-area ">
    <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
        <form role="search" method="get" class="woocommerce-product-search"
              action="#">
            <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                Search for:</label>
            <input type="search" id="woocommerce-product-search-field-0" class="search-field"
                   placeholder="Search products…" value="" name="s">
            <button type="submit" value="Search">Search</button>
            <input type="hidden" name="post_type" value="product">
        </form>
    </section>
    <section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
        <h3 class="widget-title">Filter by price</h3>
        <form method="get" action="#">
            <div class="price_slider_wrapper">
                <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                     
                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                         style="left: 22.2222%; width: 44.4444%;"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                          style="left: 22.2222%;"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                          style="left: 66.6667%;"></span>
                </div>
                <div class="price_slider_amount" data-step="10">
                    <input type="text" id="min_price" name="min_price" value="0" data-min="0"
                           placeholder="Min price" style="display: none;">
                    <input type="text" id="max_price" name="max_price" value="90" data-max="90"
                           placeholder="Max price" style="display: none;">
                    <button type="submit" class="button">Filter</button>
                    <div class="price_label">
                        Price: <span class="from">৳&nbsp;20</span> — <span
                            class="to">৳&nbsp;60</span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </form>
    </section>
    <section id="woocommerce_layered_nav-2"
             class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav"><h3
            class="widget-title">Filter by</h3>
        <ul class="woocommerce-widget-layered-nav-list">
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Blue</a> <span class="count">(4)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term current-cat"><a rel="nofollow" href="#">Gray</a> <span class="count">(2)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Green</a> <span class="count">(3)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Red</a> <span class="count">(4)</span></li>
            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Yellow</a> <span class="count">(1)</span></li>
        </ul>
    </section>
    <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
        <h3 class="widget-title">Product categories</h3>
        <ul class="product-categories nav flex-column">
            <li class="cat-item cat-item-17 cat-parent nav-item"><a href="#" class="nav-link">Clothing</a>
                <ul class="children nav flex-column">
                    <li class="cat-item cat-item-20 nav-item current-cat"><a href="#" class="nav-link">Accessories</a></li>
                    <li class="cat-item cat-item-19 nav-item"><a href="#" class="nav-link">Hoodies</a></li>
                    <li class="cat-item cat-item-18 nav-item"><a href="#" class="nav-link">Tshirts</a></li>
                </ul>
            </li>
            <li class="cat-item cat-item-22 nav-item"><a href="#" class="nav-link">Decor</a></li>
            <li class="cat-item cat-item-21 nav-item"><a href="#" class="nav-link">Music</a></li>
            <li class="cat-item cat-item-15 nav-item"><a href="#" class="nav-link">Uncategorized</a></li>
        </ul>
    </section>
    <section id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
        <h3 class="widget-title">Top rated products</h3>
        <ul class="product_list_widget">
            <li>
                <a href="#">
                    <img width="300" height="300" src="assets/images/shop/p1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                    <span class="product-title">V-Neck T-Shirt</span>
                </a>

                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>15.00</span> – <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>20.00</span>
            </li>
            <li> <a href="#">
                    <img width="300" height="300" src="assets/images/shop/p2.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                    <span class="product-title">Album</span>
                </a>

                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>15.00</span>
            </li>
            <li>
                <a href="#">
                    <img width="300" height="300" src="assets/images/shop/p3.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                    <span class="product-title">Hoodie</span>
                </a>
                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>42.00</span> – <span class="woocommerce-Price-amount amount"><span
                    class="woocommerce-Price-currencySymbol">৳&nbsp;</span>45.00</span>
            </li>
            <li>
                <a href="#">
                    <img width="300" height="300" src="assets/images/shop/p4.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                    <span class="product-title">Single</span>
                </a>

                <del><span class="woocommerce-Price-amount amount"><span
                        class="woocommerce-Price-currencySymbol">৳&nbsp;</span>3.00</span></del>
                <ins><span class="woocommerce-Price-amount amount"><span
                        class="woocommerce-Price-currencySymbol">৳&nbsp;</span>2.00</span></ins>
            </li>
            <li>
                <a href="#">
                    <img width="300" height="300" src="assets/images/shop/p5.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" >
                    <span class="product-title">Hoodie with Logo</span>
                </a>
                <span class="woocommerce-Price-amount amount"><span
                        class="woocommerce-Price-currencySymbol">৳&nbsp;</span>45.00</span>
            </li>
        </ul>
    </section>
</div>
<!-- product section end-->
                </div>
            </div>
        </section>
        <!-- product section end-->


    </main>
@endsection