@extends('frontend.layouts.frontend_master')
@section('content')
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                <li><a href="{{ route('checkout') }}">Checkout</a></li>
                <li><a href="{{ route('ordercomplete') }}">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-quantity"><span>Quantity</span></th>
                                <th class="product-subtotal"><span>Subtotal</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="assets/images/shop/12.jpg" alt="product"
                                                    width="300" height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" class="btn btn-close"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="product-default.html">
                                        Classic Simple Backpack
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">₹40.00</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input class="quantity form-control" type="number" min="1" max="100000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">₹40.00</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="assets/images/shop/13.jpg" alt="product"
                                                    width="300" height="338">
                                            </figure>
                                        </a>
                                        <button class="btn btn-close"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="product-default.html">
                                        Smart Watch
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">₹60.00</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input class="quantity form-control" type="number" min="1" max="100000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">₹60.00</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="cart-action mb-6">
                        <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button> 
                        <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="Update Cart">Update Cart</button>
                    </div>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <h3 class="cart-title text-uppercase">Cart Totals</h3>
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            <b>Product</b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bb-no">
                                        <td class="product-name">Palm Print Jacket <i
                                                class="fas fa-times"></i> <span
                                                class="product-quantity">1</span></td>
                                        <td class="product-total">₹40.00</td>
                                    </tr>
                                    <tr class="bb-no">
                                        <td class="product-name">Brown Backpack <i class="fas fa-times"></i>
                                            <span class="product-quantity">1</span></td>
                                        <td class="product-total">₹60.00</td>
                                    </tr>
                                    <tr class="cart-subtotal bb-no">
                                        <td>
                                            <b>Subtotal</b>
                                        </td>
                                        <td>
                                            <b>₹100.00</b>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>
                                            <b>Total</b>
                                        </th>
                                        <td>
                                            <b>₹100.00</b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="{{ route('checkout') }}"
                                class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection