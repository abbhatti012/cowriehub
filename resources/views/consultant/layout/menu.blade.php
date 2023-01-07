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
                <a class="nav-link menu-link" href="{{ route('user.consultant-account') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-home-line"></i> <span data-key="t-dashboards">My Account</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @if(\App\Models\User::IsUserExists('consultant'))
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('consultant.payment-detail') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money"></i> <span data-key="t-dashboards">Payment Details</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('consultant.jobs') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-tasks"></i> <span data-key="t-dashboards">Pending Jobs</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('consultant.active-jobs') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-tasks"></i> <span data-key="t-dashboards">Active Jobs</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('consultant.completed-jobs') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-tasks"></i> <span data-key="t-dashboards">Completed Jobs</span>
                </a>
            </li> <!-- end Dashboard Menu -->
            @endif
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>