<!DOCTYPE html>
<html lang="en" class="h-100">

<head>	
	<!-- PAGE TITLE HERE -->
	<title>LOGIN</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

</head>
<style>
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
    @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap");


.button {
	float: left;
	width: 60px;
	height: 60px;
	cursor: pointer;
	background: #fff;
	overflow: hidden;
	border-radius: 50px;
	transition: all 0.3s ease-in-out;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
}

.button span {
	font-size: 20px;
	font-weight: 500;
	line-height: 60px;
	margin-left: 10px;
}

.button:hover {
	width: 200px;
}

.button:nth-child(1):hover .icon {
	background: #4267b2;
}

.button:nth-child(2):hover .icon {
	background: #e1306c;
}


.button:nth-child(1) span {
	color: #4267b2;
}

.button:nth-child(2) span {
	color: #e1306c;
}

.button .icon {
	width: 60px;
	height: 60px;
	text-align: center;
	border-radius: 50px;
	display: inline-block;
	transition: all 0.3s ease-in-out;
}

.button .icon i {
	font-size: 25px;
	line-height: 60px;
	transition: all 0.3s ease-in-out;
}

.button:hover i {
	color: #fff;
}
.social-icons{
    display: flex;
    gap: 10px;
    margin: auto;
    /* width: 30%; */
}

</style>
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                @if (\Session::has('registrationSuccessfull'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('registrationSuccessfull') !!}</li>
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-{{session('message')['type']}}">
                        {{session('message')['text']}}
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="{{ url('/') }}"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="basic-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- <div class="row mb-3">
                                            <label for="name" class="mb-1"><strong>Login As</strong></label>

                                            <div class="col-md-12">
                                                <select id="role" class="form-control" name="role" required autofocus>
                                                    <option value="" selected disabled>---Please select user type---</option>
                                                    <option value="user">General User</option>
                                                    <option value="author">Author</option>
                                                    <option value="publisher">Publisher</option>
                                                    <option value="affiliate">Affiliate</option>
                                                    <option value="pos">POS</option>
                                                    <option value="consultant">Consultant</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="mb-3">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div><br>
                                        <div class="text-center">
                                            <div class="social-icons">
                                                <a href="{{ url('auth/facebook') }}">
                                                    <div class="button">
                                                        <div class="icon">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </div>
                                                        <span>Facebook</span>
                                                    </div>
                                                </a>
                                                <a href="{{ url('auth/google') }}">
                                                    <div class="button">
                                                        <div class="icon">
                                                            <i class="fa fa-google-plus"></i>
                                                        </div>
                                                        <span>Google</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('admin_assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/custom.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/deznav-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>	
</body>
<script>
    $(document).ready(function() {
        $("#basic-form").validate();
    });
</script>
</html>