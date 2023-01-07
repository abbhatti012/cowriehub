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
                <a class="nav-link menu-link" href="{{ route('save-address') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-address-card"></i> <span data-key="t-dashboards">Addresses</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.wishlist') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-heart-line"></i> <span data-key="t-dashboards">Wishlist</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.recommended-books') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-book"></i> <span data-key="t-dashboards">Recommended Books</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('user.pending-reviews') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-star"></i> <span data-key="t-dashboards">Pending Reviews</span>
                </a>
            </li> <!-- end Dashboard Menu -->
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>