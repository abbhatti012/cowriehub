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
                <a class="nav-link menu-link" href="{{ route('affiliate') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">My Account</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('affiliate.commissions') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money"></i> <span data-key="t-dashboards">My Commissions</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('affiliate.user-referred') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-user-plus"></i> <span data-key="t-dashboards">User Referrals</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('affiliate.pos-referred') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-user-plus"></i> <span data-key="t-dashboards">POS Referrals</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('affiliate.payment-details') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money"></i> <span data-key="t-dashboards">Payment Details</span>
                </a>
            </li> <!-- end Dashboard Menu -->
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>