<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" data-simplebar style="max-height: 600px;">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <!-- Module -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarModules" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarmodule">
                        <i class="ri-global-line"></i> <span data-key="t-mmodules">System Module</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarModules">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('module') }}" class="nav-link" data-key="t-module"> Module
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarOrders">
                        <i class=" ri-shopping-cart-2-line"></i> <span data-key="t-mmodules">Orders</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('allorders') }}" class="nav-link" data-key="t-all"> All
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('pendingorders') }}" class="nav-link" data-key="t-new"> New (Pending)
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('acceptedorders') }}" class="nav-link" data-key="t-accept"> Accepted
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('processingorders') }}" class="nav-link" data-key="t-processing">
                                    Processing
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('concelledorders') }}" class="nav-link" data-key="t-cancelled">
                                    Cancelled
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('failedorders') }}" class="nav-link" data-key="t-failed"> Failed
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('refundedorders') }}" class="nav-link" data-key="t-refund"> Refunded
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('deliveredorders') }}" class="nav-link" data-key="t-delivery">
                                    Delivered
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Stores -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarStores" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarStores">
                        <i class="ri-store-2-line"></i> <span data-key="t-mmodules">Store</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarStores">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('store') }}" class="nav-link" data-key="t-store">
                                    Store</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('storelist') }}" class="nav-link" data-key="t-storelist">
                                    Store List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Products -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProducts">
                        <i class="ri-gift-line"></i> <span data-key="t-mmodules">Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('product') }}" class="nav-link" data-key="t-product">
                                    Product</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('productlist') }}" class="nav-link" data-key="t-productlist">
                                    Product List</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Master -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMasters" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarmasters">
                        <i class="ri-apps-2-line"></i> <span data-key="t-masters">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMasters">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('country') }}" class="nav-link" data-key="t-country"> Country
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('state') }}" class="nav-link" data-key="t-state"> State
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('city') }}" class="nav-link" data-key="t-city"> City </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('stateshippingcharge') }}" class="nav-link"
                                    data-key="t-stateshippingcharge">
                                    State Shipping Charge</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('maincategory') }}" class="nav-link" data-key="t-maincategory">
                                    Main Category</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('category') }}" class="nav-link" data-key="t-category">
                                    Category</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('subcategory') }}" class="nav-link" data-key="t-subcategory">
                                    Sub Category</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('brand') }}" class="nav-link" data-key="t-brand">
                                    Brand</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('attribute') }}" class="nav-link" data-key="t-attribute">
                                    Attribute</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('currency') }}" class="nav-link" data-key="t-currency">
                                    Currency</a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ route('addon') }}" class="nav-link" data-key="t-addons">
                                    Addons</a>
                            </li> --}}

                        </ul>
                    </div>
                </li>

                <!-- Customers -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCustomers">
                        <i class="ri-user-line"></i> <span data-key="t-authentication">Customers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCustomers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('customer') }}" class="nav-link" data-key="t-customers">
                                    Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Coupons & Offers -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCoupons" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCoupons">
                        <i class="ri-percent-line"></i> <span data-key="t-authentication">Coupons &
                            Offers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCoupons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('coupon') }}" class="nav-link" data-key="t-coupon">
                                    Coupon</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Banners -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBanners" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBanners">
                        <i class="ri-image-line"></i> <span data-key="t-authentication">Banners</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBanners">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('banner') }}" class="nav-link" data-key="t-banner">
                                    Banner</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- GoldChit -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGoldChit" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarGoldChit">
                        <i class="ri-sticky-note-line"></i> <span data-key="t-authentication">Gold Chit</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGoldChit">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('goldplan') }}" class="nav-link" data-key="t-goldplan">
                                    Gold Plan</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Reports -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarReports" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarReports">
                        <i class="ri-sticky-note-line"></i> <span data-key="t-authentication">Reports</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarReports">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('stockreport') }}" class="nav-link" data-key="t-banner">
                                    Stock</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Roles -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRoles" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Roles &
                            Permissions</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarRoles">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('roles') }}" class="nav-link" data-key="t-roles">
                                    Roles</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rolePermissionsView') }}" class="nav-link"
                                    data-key="t-menuPermission">
                                    Role Permission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles') }}" class="nav-link" data-key="t-users">
                                    Users</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSettings">
                        <i class="ri-settings-5-line"></i> <span data-key="t-settings">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSettings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('businesssettings') }}" class="nav-link" data-key="t-state">
                                    Business Setup
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('socialmedia') }}" class="nav-link" data-key="t-city"> Social
                                    Media </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('paymentmethod') }}" class="nav-link" data-key="t-maincategory">
                                    Payment
                                    Methods</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mailconfig') }}" class="nav-link" data-key="t-category">
                                    Mail Config</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('smssystemmodule') }}" class="nav-link" data-key="t-subcategory">
                                    SMS System Module</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notificatioinsettings') }}" class="nav-link" data-key="t-brand">
                                    Notification Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('appsettings') }}" class="nav-link" data-key="t-product">
                                    App Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('thirdpartyapi') }}" class="nav-link" data-key="t-product">
                                    Third Party APIs</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('termsandconditions') }}" class="nav-link" data-key="t-product">
                                    Terms & Condition</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacyandpolicy') }}" class="nav-link" data-key="t-product">
                                    Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('adminaboutus') }}" class="nav-link" data-key="t-product">
                                    About Us</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
