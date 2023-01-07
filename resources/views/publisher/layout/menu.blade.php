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
                <a class="nav-link menu-link" href="{{ route('user.publisher-account') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-users"></i> <span data-key="t-dashboards">My Account</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @if(\App\Models\User::IsUserExists('publishers'))
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publishers.dashboard') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-dashboard"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publisher.create-author') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-users"></i> <span data-key="t-dashboards">Create an author</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publisher.add-book-for-author') }}?type=author" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-plus"></i> <span data-key="t-dashboards">Add book for author</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publisher.all-books') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-book"></i> <span data-key="t-dashboards">All books</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publisher.marketing') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-bullseye"></i> <span data-key="t-dashboards">My Marketing</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('author.sales') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money"></i> <span data-key="t-dashboards">Sales and Revenue</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('publisher.payment-details') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-info-circle"></i> <span data-key="t-dashboards">Payment Details</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @endif
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>