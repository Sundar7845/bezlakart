@extends('frontend.layouts.frontend_master')
@section('content')
<main class="main wishlist-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Wishlist</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <h3 class="wishlist-title">My wishlist</h3>
            <table class="shop-table wishlist-table">
                <thead>
                    <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-stock-status"><span>Stock Status</span></th>
                        <th class="wishlist-action">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="product-thumbnail">
                            <div class="p-relative">
                                <a href="product-default.html">
                                    <figure>
                                        <img src="{{ asset($product->product_image) }}" alt="product" width="300"
                                            height="338">
                                    </figure>
                                </a>
                                <button type="submit" class="btn btn-close"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </td>
                        <td class="product-name">
                            <a href="product-default.html">
                                {{ $product->product_name }}
                            </a>
                        </td>
                        <td class="product-price">
                            <ins class="new-price ml-lg-8">₹{{ $product->product_price }}</ins>
                        </td>
                        <td class="product-stock-status">
                            <span class="wishlist-in-stock ml-lg-8">In Stock</span>
                        </td>
                        <td class="wishlist-action">
                            <div class="d-lg-flex">
                                {{-- <a href="#"
                                    class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick
                                    View</a> --}}
                                <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-8 btn-cart">Add to
                                    cart</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="social-links">
                <label>Share On:</label>
                <div class="social-icons social-no-color border-thin">
                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                    <a href="#" class="social-icon social-email far fa-envelope"></a>
                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
@section('quickview')
    @include('frontend.panels.quick_view')
@endsection