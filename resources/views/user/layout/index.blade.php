<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="https://innap.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>COWRIEHUB | User</title>
	
	<link rel="shortcut icon" href="{{asset('admin_assets/assets/images/favicon.png')}}">
    <link href="{{asset('admin_assets/assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin_assets/assets/js/layout.js')}}"></script>
    <link href="{{asset('admin_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		#site_preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		#loader {
			display: block;
			position: relative;
			left: 50%;
			top: 50%;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #55cdc8;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
		}
		#loader:before {
			content: "";
			position: absolute;
			top: 5px;
			left: 5px;
			right: 5px;
			bottom: 5px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #55cdc8;
			-webkit-animation: spin 3s linear infinite;
			animation: spin 3s linear infinite;
		}
		#loader:after {
			content: "";
			position: absolute;
			top: 15px;
			left: 15px;
			right: 15px;
			bottom: 15px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: #55cdc8;
			-webkit-animation: spin 1.5s linear infinite;
			animation: spin 1.5s linear infinite;
		}
		@-webkit-keyframes spin {
			0%   {
				-webkit-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100% {
				-webkit-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		@keyframes spin {
			0%   {
				-webkit-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100% {
				-webkit-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		.content-body{
			display: none;
		}
		label.error {
			color: red;
			font-size: 1rem;
			display: block;
			margin-top: 5px;
		}

		input.error {
			border: 1px dashed red;
			font-weight: 300;
			color: red;
		}
		textarea.error {
			border: 1px dashed red;
			font-weight: 300;
			color: red;
		}
	</style>
</head>
<body>
	
<div id="layout-wrapper">
       @include('user.layout.header')

	   	<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('admin_assets/assets/images/favicon.png')}}" width="50" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('admin_assets/assets/images/cowriehub.png')}}" width="200" alt="">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('admin_assets/assets/images/favicon.png')}}" width="50" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('admin_assets/assets/images/cowriehub.png')}}" width="200" alt="">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            @include('user.layout.menu')
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
		
		<div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
        			@yield('content')
				</div>
        	</div>

        @include('user.layout.footer')
    </div>
</div>

<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
	<i class="ri-arrow-up-line"></i>
</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('admin_assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/plugins.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- <script src="{{asset('admin_assets/assets/js/pages/dashboard-ecommerce.init.js')}}"></script> -->
<script src="{{asset('admin_assets/assets/js/app.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

@yield('scripts')
	<script>
		$(document).ready(function(){
			$("#basic-validation").validate();
			setTimeout(function(){
				$('#site_preloader').hide();
				$('.content-body').show();
			},1000)
			
		})
		var loadFile = function(event, id) {
			var output = document.getElementById(id);
			output.src = URL.createObjectURL(event.target.files[0]);
			output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
			}
		};
	</script>
</body>
</html>
