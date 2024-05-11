<div class="row">
    <div class="col-lg-8">
        <article id="post-6" class="post-6 page type-page status-publish hentry">
            <!-- .entry-header -->
            <div class="entry-content">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove"></th>
                                <th class="product-thumbnail"></th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Books as $book)
                                    <tr class="woocommerce-cart-form__cart-item cart_item">

                                        <td>
                                                <a class="submitButton remove"  wire:click='removeBookCart("{{$book['rowId']}}")' aria-label="Remove this item"
                                                    data-product_id="30" data-product_sku="">×</a>
                                        </td>
                                        <!-- <a href="#" id="submitButton" class="remove" aria-label="Remove this item">
                                    ×
                                    </a> -->
                                        <td class="product-thumbnail">
                                            <a href="/E_library/book/{{ $book['id'] }}"><img width="324"
                                                    height="324" src="{{ asset('storage/' . $book['img']) }}"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt=""></a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="/E_library/book/{{ $book['id'] }}">{{ $book['name'] }}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            @if (!empty($book['price']))
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{ $book['price'] }}</span>
                                            @else
                                                <span class="uppercase">Free</span>
                                            @endif
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- .entry-content -->
        </article>
    </div>
    <div class="col-lg-4">
        <div class="cart-collaterals">
            <div class="cart_totals ">
                <h2>Cart totals</h2>
                <table cellspacing="0" class="shop_table shop_table_responsive">
                    <tbody>
                        <tr class="order-total">

                            <th>Total</th>
                            <td data-title="Total">
                                <strong>
                                    @if ($total == 0)
                                        Free
                                    @else
                                        <span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>{{ $total }}</span>
                                    @endif
                                </strong>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="wc-proceed-to-checkout">
                    <a href="/checkout" class="checkout-button button alt wc-forward">
                        Proceed to checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
