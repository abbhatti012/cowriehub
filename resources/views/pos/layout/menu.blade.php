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
                <a class="nav-link menu-link" href="{{ route('pos') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">My Account</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @if(\App\Models\User::IsUserExists('pos'))
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.wishlist') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-heart-line"></i> <span data-key="t-dashboards">Wishlist</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.pending-reviews') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-star-line"></i> <span data-key="t-dashboards">Pending Reviews</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('save-address') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-shopping-cart-line"></i> <span data-key="t-dashboards">Saved Addresses</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.recommended-books') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-currency-line"></i> <span data-key="t-dashboards">Recommended Books</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('pos.paid-invoices') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-currency-fill"></i> <span data-key="t-dashboards">Paid Invoices</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('pos.pending-invoices') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-coupon-fill"></i> <span data-key="t-dashboards">Pending Invoices</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @endif
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>