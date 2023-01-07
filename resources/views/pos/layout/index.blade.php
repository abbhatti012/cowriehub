<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="{{asset('admin_assets/assets/images/favicon.ico')}}">
    <!-- dropzone css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/libs/dropzone/dropzone.css')}}" type="text/css" />

    <!-- Filepond css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/libs/filepond/filepond.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin_assets/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">

    <!-- Layout config Js -->
    <script src="{{asset('admin_assets/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admin_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin_assets/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin_assets/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admin_assets/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
	<div id="layout-wrapper">
       @include('pos.layout.header')

	   <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('admin_assets/assets/images/favicon.png')}}" width="50" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('admin_assets/assets/images/cowriehub.png')}}" width="200" alt="">
                    </span>
                </a>
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
			@include('pos.layout.menu')
            <div class="sidebar-background"></div>
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

        @include('pos.layout.footer')
    </div>
</div>

<!-- Required vendors -->
<!-- JAVASCRIPT -->
<script src="{{asset('admin_assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/plugins.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{asset('admin_assets/assets/js/pages/datatables.init.js')}}"></script>
<!-- App js -->
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
	</script>
</body>
</html>
