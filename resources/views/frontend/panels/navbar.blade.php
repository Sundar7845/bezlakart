@php
    use App\Models\MainCategory;
    use App\Models\Category;
    use App\Models\SubCategory;
    use App\Models\Brand;
    use App\Models\BusinessSetting;
    $maincategorys = MainCategory::where('is_active', 1)->get();
    $allcategorys = Category::where('is_active', 1)->get();
    $brands = Brand::where('is_active', 1)->get();
    $businesssetting = BusinessSetting::first();
@endphp
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to BeslaKart Store message or remove it!</p>
            </div>
            <div class="header-right">
                <!-- End of DropDown Menu -->
                <!-- End of Dropdown Menu -->
                {{-- <a href="{{ route('contactus') }}" class="d-lg-show">Contact Us</a> --}}
                {{-- <a href="{{ route('myaccount') }}" class="d-lg-show">My Account</a> --}}
                @if(Auth::check())
                <a href="{{ route('myaccount') }}">
                    <img src="{{ asset('images/users/avatar-4.jpg') }}" alt="Avatar" class="avatar cursor-pointer">
                </a>
                
                @else
                <a href="{{ route('loginform') }}" class="d-lg-show login"><i class="w-icon-account"></i>Sign In</a>
                <span class="delimiter d-lg-show">/</span>
                <a href="{{ route('register') }}" class="ml-0 d-lg-show login ">Register</a>
                @endif
            </div>
        </div>
    </div>
    <!-- End of Header Top -->
    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ route('home') }}" class="logo ml-lg-0">
                    <img src="{{ asset(isset($businesssetting) ? $businesssetting->company_logo : 'images/logo.png') }}"
                        alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="{{ route('search') }}" enctype="multipart/form-data"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    {{-- <div class="select-box">
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            @foreach ($allcategorys as $allcategory)
                                <option value="">{{ $allcategory->category_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                        required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="https://portotheme.com/cdn-cgi/l/email-protection#5675"
                                class="text-capitalize"></a>
                        </h4>
                        <a href="tel:#"
                            class="phone-number font-weight-bolder ls-50">{{ isset($businesssetting) ? $businesssetting->company_phone : '' }}</a>
                    </div>
                </div>
                @if(Auth::check())
                <a class="wishlist label-down link d-xs-show" href="{{ url('/wishlist/' . Auth::user()->id) }}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                @else
                <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                @endif
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <a href="{{ route('cart') }}" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">2</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->
    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>
                        <div class="dropdown-box">
                            @foreach ($maincategorys as $maincategory)
                                <ul class="menu vertical-menu category-menu">
                                    <li>
                                        <a href="{{ route('shop') }}">
                                            <i
                                                class="{{ $maincategory->main_category_icon }}"></i>{{ $maincategory->main_category_name }}
                                        </a>
                                        <ul class="megamenu">
                                            @php
                                                $categorys = Category::where('main_category_id', $maincategory->id)->get();
                                            @endphp
                                            @foreach ($categorys as $category)
                                                <li>
                                                    <h4 class="menu-title">{{ $category->category_name }}</h4>

                                                    <hr class="divider">
                                                    <ul>
                                                        @php
                                                            $subcategorys = SubCategory::where('category_id', $category->id)->get();
                                                        @endphp
                                                        @foreach ($subcategorys as $subcategory)
                                                            <li><a
                                                                    href="{{ route('shop') }}">{{ $subcategory->sub_category_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="{{ request()->routeIs('shop') ? 'active' : '' }}">
                                <a href="{{ route('shop') }}">Shop</a>
                            </li>
                            <!-- Start of Megamenu -->
                            <!-- End of Megamenu -->
                            {{-- <li>
                                <a href="{{ route('shop') }}">Category</a>
                                <!-- Start of Megamenu -->
                                <ul class="megamenu"> --}}
                            {{-- <li>
                                        <h4 class="menu-title">Category</h4>
                                        @foreach ($allcategorys as $allcategory)
                                            <ul>
                                                <li><a
                                                        href="shop-banner-sidebar.html">{{ $allcategory->category_name }}</a>
                                                </li> --}}
                            {{-- <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                            <li><a href="{{ route('shop') }}">Full Width Banner</a></li>
                                            <li><a href="shop-horizontal-filter.html">Horizontal Filter<span
                                                        class="tip tip-hot">Hot</span></a></li>
                                            <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span
                                                        class="tip tip-new">New</span></a></li>
                                            <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a>
                                            </li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="shop-both-sidebar.html">Both Sidebar</a></li> --}}
                            {{-- </ul>
                                        @endforeach
                                    </li> --}}
                            {{-- </ul>
                            </li> --}}
                            <!-- End of Megamenu -->
                            <li class="">
                                <a href="">Brands</a>
                                <!-- Start of Megamenu -->
                                <ul class="megamenu">
                                    <li>
                                        <h4 class="menu-title">Brands</h4>
                                        @foreach ($brands as $brand)
                                            <ul>
                                                <li><a href="shop-banner-sidebar.html">{{ $brand->brand_name }}</a>
                                                </li>
                                                {{-- <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                            <li><a href="{{ route('shop') }}">Full Width Banner</a></li>
                                            <li><a href="shop-horizontal-filter.html">Horizontal Filter<span
                                                        class="tip tip-hot">Hot</span></a></li>
                                            <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span
                                                        class="tip tip-new">New</span></a></li>
                                            <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a>
                                            </li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="shop-both-sidebar.html">Both Sidebar</a></li> --}}
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                                <!-- End of Megamenu -->
                            </li>
                            <li class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">
                                <a href="{{ route('aboutus') }}">About us</a>

                            </li>
                            <li class="{{ request()->routeIs('contactus') ? 'active' : '' }}">
                                <a href="{{ route('contactus') }}">Contact us</a>
                            </li>
                            @if ($businesssetting->store_self_registration == 1)
                                <li class="{{ request()->routeIs('storeregister') ? 'active' : '' }}">
                                    <a href="{{ route('storeregister') }}">Be a Vendor</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div>
            </div>
        </div>
    </div>
</header>
