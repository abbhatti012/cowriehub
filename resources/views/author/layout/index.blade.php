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
	<title>COWRIEHUB | AUTHOR</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('admin_assets/images/favicon.png')}}" />
	<!-- Style css -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
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
			border-top-color: #9370DB;
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
			border-top-color: #BA55D3;
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
			border-top-color: #FF00FF;
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
	</style>
</head>
<body>
	<div id="site_preloader">
		<div id="loader"></div>
	</div>
    <div id="main-wrapper">
       @include('author.layout.header')

        @yield('content')

        @include('author.layout.footer')
    </div>

<!-- Required vendors -->
<script src="{{asset('admin_assets/js/student-global.js')}}"></script>
<script src="{{asset('admin_assets/vendor/global/global.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/apexchart/apexchart.js')}}"></script>

<script src="{{asset('admin_assets/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
<script src="{{asset('admin_assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('admin_assets/js/dashboard/dashboard-1.js')}}"></script>
<script src="{{asset('admin_assets/js/custom.min.js')}}"></script>
<script src="{{asset('admin_assets/js/deznav-init.js')}}"></script>
@yield('scripts')
	<script>
		$(document).ready(function(){
			setTimeout(function(){
				$('#site_preloader').hide();
				$('.content-body').show();
			},1000)
		})
	</script>
</body>
</html>
