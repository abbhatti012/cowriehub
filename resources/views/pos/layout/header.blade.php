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
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search here">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{asset('admin_assets/images/profile/pic1.jpg')}}" alt="">
                            <div class="header-info ms-3">
                                <span>@php echo Auth::user()->name; @endphp</span>
                                <small>POS</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('admin.profile') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ms-2">Profile </span>
                            </a>
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
            <li class="<?php if(request()->segment(1) == 'pos'){echo 'mm-active';} ?>"><a href="{{ route('pos') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-text">My Account</span>
                </a>
            </li>
            @if(\App\Models\User::IsUserExists('pos'))
                <!-- <li class="<?php //if(request()->segment(1) == 'payment-detail'){echo 'mm-active';} ?>">
                    <a href="{{ route('pos.payment-detail') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-money"></i>
                        <span class="nav-text">Payment Details</span>
                    </a>
                </li> -->
                <li class="<?php if(request()->segment(1) == 'save-address'){echo 'mm-active';} ?>"><a href="{{ route('save-address') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-address-card"></i>
                        <span class="nav-text">Addresses</span>
                    </a>
                </li>
                <li class="<?php if(request()->segment(1) == 'user-wishlist'){echo 'mm-active';} ?>"><a href="{{ route('user.wishlist') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-heart-o"></i>
                        <span class="nav-text">Wishlist</span>
                    </a>
                </li>
                <li class="<?php if(request()->segment(1) == 'pending-invoices'){echo 'mm-active';} ?>"><a href="{{ route('pos.pending-invoices') }}" class="ai-icon" aria-expanded="false">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span class="nav-text">Pending Invoices</span>
                    </a>
                </li>
                <li class="<?php if(request()->segment(1) == 'paid-invoices'){echo 'mm-active';} ?>"><a href="{{ route('pos.paid-invoices') }}" class="ai-icon" aria-expanded="false">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span class="nav-text">Paid Invoices</span>
                    </a>
                </li>
                <li class="<?php if(request()->segment(1) == 'recommended-books'){echo 'mm-active';} ?>"><a href="{{ route('user.recommended-books') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-book"></i>
                    <span class="nav-text">Recommended Books</span>
                    </a>
                </li>
                <li class="<?php if(request()->segment(1) == 'pending-reviews'){echo 'mm-active';} ?>"><a href="{{ route('user.pending-reviews') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-star"></i>
                        <span class="nav-text">Pending Reviews</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>