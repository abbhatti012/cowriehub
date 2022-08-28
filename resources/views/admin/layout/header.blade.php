<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="nav-header">
    <a href="/" class="brand-logo">
        <img width="150" src="{{ asset('logo.png') }}" alt="logo">
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="chatbox">
    <div class="chatbox-close"></div>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
            </li>
        </ul>
       
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <!-- <div class="dashboard_bar">
                        Dashboard
                    </div> -->
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search here">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </li>
                    <!-- <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell-link ai-icon" href="javascript:void(0);">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.6667 5.16666C23.6667 2.5895 21.5772 0.5 19 0.5C15.1162 0.5 8.88387 0.5 5.00004 0.5C2.42287 0.5 0.333374 2.5895 0.333374 5.16666V20.3333C0.333374 20.8058 0.618046 21.2305 1.05321 21.4113C1.48955 21.5922 1.99121 21.4918 2.32487 21.1582C2.32487 21.1582 4.59287 18.8902 5.9672 17.517C6.4047 17.0795 6.99739 16.8333 7.61689 16.8333H19C21.5772 16.8333 23.6667 14.7438 23.6667 12.1667V5.16666ZM21.3334 5.16666C21.3334 3.87866 20.2892 2.83333 19 2.83333C15.1162 2.83333 8.88387 2.83333 5.00004 2.83333C3.71204 2.83333 2.66671 3.87866 2.66671 5.16666V17.517L4.31638 15.8673C5.19138 14.9923 6.37905 14.5 7.61689 14.5H19C20.2892 14.5 21.3334 13.4558 21.3334 12.1667V5.16666ZM6.16671 12.1667H15.5C16.144 12.1667 16.6667 11.644 16.6667 11C16.6667 10.356 16.144 9.83333 15.5 9.83333H6.16671C5.52271 9.83333 5.00004 10.356 5.00004 11C5.00004 11.644 5.52271 12.1667 6.16671 12.1667ZM6.16671 7.5H17.8334C18.4774 7.5 19 6.97733 19 6.33333C19 5.68933 18.4774 5.16666 17.8334 5.16666H6.16671C5.52271 5.16666 5.00004 5.68933 5.00004 6.33333C5.00004 6.97733 5.52271 7.5 6.16671 7.5Z" fill="#1362FC"/>
                            </svg>
                            <div class="pulse-css"></div>
                        </a>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.83333 3.91738V1.50004C8.83333 0.856041 9.356 0.333374 10 0.333374C10.6428 0.333374 11.1667 0.856041 11.1667 1.50004V3.91738C12.9003 4.16704 14.5208 4.97204 15.7738 6.22504C17.3057 7.75687 18.1667 9.8347 18.1667 12V16.3914L19.1105 18.279C19.562 19.1832 19.5142 20.2565 18.9822 21.1164C18.4513 21.9762 17.5122 22.5 16.5018 22.5H11.1667C11.1667 23.144 10.6428 23.6667 10 23.6667C9.356 23.6667 8.83333 23.144 8.83333 22.5H3.49817C2.48667 22.5 1.54752 21.9762 1.01669 21.1164C0.484686 20.2565 0.436843 19.1832 0.889509 18.279L1.83333 16.3914V12C1.83333 9.8347 2.69319 7.75687 4.22502 6.22504C5.47919 4.97204 7.0985 4.16704 8.83333 3.91738ZM10 6.1667C8.45183 6.1667 6.96902 6.78154 5.87469 7.87587C4.78035 8.96904 4.16666 10.453 4.16666 12V16.6667C4.16666 16.8475 4.12351 17.026 4.04301 17.1882C4.04301 17.1882 3.52384 18.2265 2.9755 19.322C2.88567 19.5029 2.89501 19.7187 3.00117 19.8902C3.10734 20.0617 3.29517 20.1667 3.49817 20.1667H16.5018C16.7037 20.1667 16.8915 20.0617 16.9977 19.8902C17.1038 19.7187 17.1132 19.5029 17.0234 19.322C16.475 18.2265 15.9558 17.1882 15.9558 17.1882C15.8753 17.026 15.8333 16.8475 15.8333 16.6667V12C15.8333 10.453 15.2185 8.96904 14.1242 7.87587C13.0298 6.78154 11.547 6.1667 10 6.1667Z" fill="#1362FC"/>
                            </svg>
                            <div class="pulse-css"></div>
                        </a>
                      
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link ai-icon" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.15608 11.6592C0.937571 10.4299 0.253296 8.76839 0.253296 7.03607C0.253296 5.29415 0.944772 3.62306 2.17648 2.39134C3.4082 1.15963 5.0793 0.46814 6.82122 0.46814C8.56315 0.46814 10.2342 1.15963 11.466 2.39134L11.9149 2.84033L12.3639 2.39134C13.5956 1.15963 15.2655 0.46814 17.0075 0.46814C18.7506 0.46814 20.4205 1.15963 21.6522 2.39134C22.8839 3.62306 23.5766 5.29415 23.5766 7.03607C23.5766 8.76839 22.8923 10.4299 21.6726 11.6592L12.7625 21.0939C12.5428 21.3268 12.2355 21.4589 11.9149 21.4589C11.5944 21.4589 11.2871 21.3268 11.0674 21.0939L2.15608 11.6592ZM11.9149 18.5945L19.9799 10.0553L20.0039 10.0313C20.7974 9.23659 21.244 8.15974 21.244 7.03607C21.244 5.9124 20.7974 4.83556 20.0039 4.04083C19.2092 3.2461 18.1311 2.79951 17.0075 2.79951C15.885 2.79951 14.807 3.2461 14.0122 4.04083L12.7397 5.31456C12.2835 5.76955 11.5452 5.76955 11.0902 5.31456L9.81646 4.04083C9.02293 3.2461 7.94489 2.79951 6.82122 2.79951C5.69756 2.79951 4.62071 3.2461 3.82598 4.04083C3.03125 4.83556 2.58586 5.9124 2.58586 7.03607C2.58586 8.15974 3.03125 9.23659 3.82598 10.0313C3.83438 10.0397 3.84158 10.0469 3.84879 10.0553L11.9149 18.5945Z" fill="#1362FC"/>
                            </svg>
                            <div class="pulse-css"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 ps ps--active-y p-3 height370">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>10 minutes ago</span>
                                        <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                        <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>30 minutes ago</span>
                                        <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>15 minutes ago</span>
                                        <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{asset('admin_assets/images/profile/pic1.jpg')}}" alt="">
                            <div class="header-info ms-3">
                                <span>@php echo Auth::user()->name; @endphp</span>
                                <small>Admin</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- <a href="{{ route('admin.profile') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ms-2">Profile </span>
                            </a> -->
                            <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">
                                    Logout
                                </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="<?php if(request()->segment(2) == 'dashboard'){echo 'mm-active';} ?>"><a href="{{ route('admin') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'authors' || request()->segment(2) == 'consultants' || request()->segment(2) == 'users' || request()->segment(2) == 'publisher' || request()->segment(2) == 'pos' || request()->segment(2) == 'affiliate'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-first-order"></i>
                    <span class="nav-text">User Roles</span>
                </a>
                <ul aria-expanded="false">
                    <li class="<?php if(request()->segment(2) == 'authors'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.author') }}" class="ai-icon" aria-expanded="false">
                            Authors
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'consultants'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.consultant') }}" class="ai-icon" aria-expanded="false">
                            Consultants
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'users' && request()->segment(3) != 'admin'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.general-user') }}" class="ai-icon" aria-expanded="false">
                            General Users
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'publisher'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.publisher') }}" class="ai-icon" aria-expanded="false">
                            Publishers
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'pos'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.pos') }}" class="ai-icon" aria-expanded="false">
                            POS
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'affiliate'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.affiliates') }}" class="ai-icon" aria-expanded="false">
                            Affiliates
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php if(request()->segment(2) == 'assign-job' || request()->segment(2) == 'active-jobs' || request()->segment(2) == 'completed-jobs'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-first-order"></i>
                    <span class="nav-text">Jobs</span>
                </a>
                <ul aria-expanded="false">
                    <li class="<?php if(request()->segment(2) == 'assign-job'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.assign-job') }}" class="ai-icon" aria-expanded="false">
                            Assign Job
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'active-jobs'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.active-jobs') }}" class="ai-icon" aria-expanded="false">
                            Active Jobs
                        </a>
                    </li>
                    <li class="<?php if(request()->segment(2) == 'completed-jobs'){echo 'mm-active';} ?>">
                        <a href="{{ route('admin.completed-jobs') }}" class="ai-icon" aria-expanded="false">
                            Completed Jobs
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if(request()->segment(2) == 'books' && request()->segment(3) != 'orders'){echo 'mm-active';} ?>"><a href="{{ route('admin.books') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-book"></i>
                    <span class="nav-text">Books</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'locations'){echo 'mm-active';} ?>"><a href="{{ route('admin.locations') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-book"></i>
                    <span class="nav-text">Locations</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'skills'){echo 'mm-active';} ?>"><a href="{{ route('admin.skills') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-text">Skills</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'coupons'){echo 'mm-active';} ?>"><a href="{{ route('admin.coupons') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-gift"></i>
                    <span class="nav-text">Coupons</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'currency'){echo 'mm-active';} ?>"><a href="{{ route('admin.currency') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-dollar"></i>
                    <span class="nav-text">Currency</span>
                </a>
            </li>
            
            <li class="<?php if(request()->segment(2) == 'genre' || request()->segment(2) == 'sub-genre'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-film"></i>
                    <span class="nav-text">Genres</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.genre') }}">Main Genre</a></li>
                    <li><a href="{{ route('admin.sub-genre') }}">Sub Genre</a></li>
                </ul>
            </li>
            
            <li class="<?php if(request()->segment(3) == 'orders'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-first-order"></i>
                    <span class="nav-text">Orders</span>
                </a>    
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.book-orders') }}">Book Orders</a></li>
                    <li><a href="{{ route('admin.marketing-orders') }}">Marketing Orders</a></li>
                </ul>
            </li>

            <!-- <li class="<?php //if(request()->segment(2) == 'promotions'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-bullhorn"></i>
                    <span class="nav-text">Promotions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.offers') }}">Offers</a></li>
                    <li><a href="{{ route('admin.subscribed-users') }}">Subscribed Users</a></li>
                </ul>
            </li> -->
            <li class="<?php if(request()->segment(2) == 'reports'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-bar-chart"></i>
                    <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.order-reports') }}">Order reports</a></li>
                </ul>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.book-reports') }}">Book reports</a></li>
                </ul>
            </li>
            <!-- <li class="<?php //if(request()->segment(2) == 'accounts'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-user-circle-o"></i>
                    <span class="nav-text">Accounts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.author-settelments') }}">Author's Settelments</a></li>
                </ul>
            </li> -->
            <li class="<?php if(request()->segment(2) == 'blog'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.blog') }}" class="ai-icon" aria-expanded="false">
                    <i class="fab fa-blogger-b"></i>
                    <span class="nav-text"> Blog</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'page'){echo 'mm-active';} ?>"><a class="has-arrow ai-icon" href="" aria-expanded="false">
                    <i class="fa fa-globe"></i>
                    <span class="nav-text">Website</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.slider') }}">Slider</a></li>
                    <!-- <li><a href="{{ route('admin.ads') }}">Ads</a></li> -->
                    <li><a href="{{ route('admin.about') }}">About Us</a></li>
                    <!-- <li><a href="{{ route('admin.default-policy') }}">Default Policy</a></li> -->
                    <li><a href="{{ route('admin.privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('admin.content-policy') }}">Content Policy</a></li>
                    <li><a href="{{ route('admin.terms') }}">Terms</a></li>
                    <li><a href="{{ route('admin.affiliate-Network-Agreement') }}">Affiliate Network Agreement</a></li>
                    <li><a href="{{ route('admin.authors-Contract') }}">Authors Contract</a></li>
                    <li><a href="{{ route('admin.marketers-Network-Agreement') }}">Marketers Network Agreement</a></li>
                    <li><a href="{{ route('admin.referred-Customers-Agreement') }}">Referred Customers Agreement</a></li>
                    <li><a href="{{ route('admin.sellers-Contract-For-Authors') }}">Sellers Contract For Authors</a></li>
                    <li><a href="{{ route('admin.sellers-Contract-For-Publishers') }}">Sellers Contract For Publishers</a></li>
                    <li><a href="{{ route('admin.support') }}">Suppport</a></li>
                </ul>
            </li>
            <!-- <li class="<?php //if(request()->segment(2) == 'banks'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.banks') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-bank"></i>
                    <span class="nav-text">Banks</span>
                </a>
            </li> -->
            <li class="<?php if(request()->segment(2) == 'packages'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.packages') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-gift"></i>
                    <span class="nav-text">Packages</span>
                </a>
            </li>
            <!-- <li class="<?php //if(request()->segment(2) == 'users' && request()->segment(3) == 'admin'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.system-users') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="nav-text">System Users</span>
                </a>
            </li> -->
            <li class="<?php if(request()->segment(2) == 'settings'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.settings') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'all-contacts'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.contacts') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-phone"></i>
                    <span class="nav-text">All Contacts</span>
                </a>
            </li>
            <li class="<?php if(request()->segment(2) == 'all-subscribers'){echo 'mm-active';} ?>">
                <a href="{{ route('admin.subscribers') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                    <span class="nav-text">All Subscribers</span>
                </a>
            </li>
        </ul>
        <!-- <div class="copyright">
            <p><strong>COWRIEHUB</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
        </div> -->
    </div>
</div>