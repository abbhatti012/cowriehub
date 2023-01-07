<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('dashboard') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.profile.edit') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">Edit Author Profile</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @if(\App\Models\User::IsUserExists('author-detail'))
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.books') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-book"></i> <span data-key="t-dashboards">My Books</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.marketing') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-star-line"></i> <span data-key="t-dashboards">My Marketing</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.sales') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-shopping-cart-line"></i> <span data-key="t-dashboards">Sales and Revenue</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.coupons') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-currency-line"></i> <span data-key="t-dashboards">Coupons</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @endif
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>