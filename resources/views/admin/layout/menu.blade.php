<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="/" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">Home</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarpages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarpages">
                    <i class="ri-account-circle-line"></i> <span data-key="t-pages">User Roles</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarpages">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.author') }}" class="nav-link" data-key="t-horizontal">Authors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.consultant') }}" class="nav-link" data-key="t-detached">Consultants</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.general-user') }}" class="nav-link" data-key="t-detached">General
                                Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.publisher') }}" class="nav-link" data-key="t-detached">Publishers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pos') }}" class="nav-link" data-key="t-detached">POS</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.affiliates') }}" class="nav-link" data-key="t-detached">Affiliates</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.referred-users') }}" class="nav-link" data-key="t-detached">Referred
                                Users</a>
                        </li>
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="ri-pages-line"></i> <span data-key="t-pages">Jobs</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarPages">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.assign-job') }}" class="nav-link" data-key="t-starter"> Assign Job
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.active-jobs') }}" class="nav-link" data-key="t-team"> Active Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.completed-jobs') }}" class="nav-link" data-key="t-timeline"> Completed Jobs
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.books') }}" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-book-2-fill"></i> <span data-key="t-landing">Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.locations') }}" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-road-map-fill"></i> <span data-key="t-landing">Shipment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.skills') }}" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-command-line"></i> <span data-key="t-landing">Skills</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.coupons') }}" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-coupon-3-line"></i> <span data-key="t-landing">Coupons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.currency') }}" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-currency-fill"></i> <span data-key="t-landing">Currency</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                    <i class="ri-file-list-3-fill"></i> <span data-key="t-base-ui">Genres</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.genre') }}" class="nav-link" data-key="t-alerts">Main
                                        Genre</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.sub-genre') }}" class="nav-link" data-key="t-badges">Sub
                                        Genre</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI1">
                    <i class="ri-shopping-cart-fill"></i> <span data-key="t-base-ui">Orders</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI1">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.book-orders') }}" class="nav-link" data-key="t-alerts">Book
                                        Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.marketing-orders') }}" class="nav-link" data-key="t-badges">Marketing Orders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI2">
                    <i class="ri-file-text-fill"></i> <span data-key="t-base-ui">Reports</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI2">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.order-reports') }}" class="nav-link" data-key="t-alerts">Order
                                        Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.book-reports') }}" class="nav-link" data-key="t-badges">Book
                                        Reports</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI3">
                    <i class="ri-file-text-fill"></i> <span data-key="t-base-ui">Blog</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI3">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog') }}" class="nav-link" data-key="t-alerts">Create a blog</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="category.php" class="nav-link" data-key="t-badges">Create a Category</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link menu-link" href="memo.php">
                    <i class="ri-file-list-3-fill"></i> <span data-key="t-widgets">Memo</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                    <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Website</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider') }}" class="nav-link" data-key="t-sweet-alerts">Slider</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="banners.php" class="nav-link" data-key="t-sweet-alerts">Banners</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('admin.about') }}" class="nav-link" data-key="t-nestable-list">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.privacy') }}" class="nav-link" data-key="t-scrollbar">Privacy
                                Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.content-policy') }}" class="nav-link" data-key="t-scrollbar">Content
                                Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.terms') }}" class="nav-link" data-key="t-scrollbar">Terms</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.affiliate-Network-Agreement') }}" class="nav-link" data-key="t-scrollbar">Affiliate
                                Network Agreement</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.authors-Contract') }}" class="nav-link" data-key="t-scrollbar">Authors
                                Contract</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.marketers-Network-Agreement') }}" class="nav-link" data-key="t-scrollbar">Marketers
                                Network Agreement</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.referred-Customers-Agreement') }}" class="nav-link" data-key="t-scrollbar">Referred
                                Customers Agreement</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sellers-Contract-For-Authors') }}" class="nav-link" data-key="t-scrollbar">Sellers
                                Contract For Authors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sellers-Contract-For-Publishers') }}" class="nav-link" data-key="t-scrollbar">Sellers
                                Contract For Publishers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.support') }}" class="nav-link" data-key="t-scrollbar">Support</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="partners.php" class="nav-link" data-key="t-scrollbar">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a href="temp_email.php" class="nav-link" data-key="t-scrollbar">Email Template</a>
                        </li> -->
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI4">
                    <i class="ri-honour-line"></i> <span data-key="t-base-ui">Packages</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI4">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <!-- <li class="nav-item">
                                    <a href="package_type.php" class="nav-link" data-key="t-alerts">Create a Package Type</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.packages') }}" class="nav-link" data-key="t-badges">All Packages</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.settings') }}">
                    <i class="ri-settings-5-line"></i> <span data-key="t-widgets">Settings</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link menu-link" href="sys_users.php">
                    <i class="ri-account-circle-line"></i> <span data-key="t-widgets">System Users</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.contacts') }}">
                    <i class="ri-contacts-book-line"></i> <span data-key="t-widgets">All Contacts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.subscribers') }}">
                    <i class="ri-team-line"></i> <span data-key="t-widgets">All Subscribers</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>