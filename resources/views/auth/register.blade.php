<!DOCTYPE html>
<html lang="en" class="h-100">

<head>	
	<!-- PAGE TITLE HERE -->
	<title>REGISTER</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">

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
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="{{ url('/') }}"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Register your account</h4>
                                    <form id="basic-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- <div class="row mb-3">
                                            <label for="name" class="mb-1"><strong>SignUp By</strong></label>

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
                                        <!-- <input type="hidden" value="user" name="role"> -->
                                        <div class="row mb-3">
                                            <label for="name" class="mb-3">{{ __('Name') }}</label>

                                            <div class="col-md-12">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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
                                        <div class="row mb-3">
                                            <label for="password-confirm" class="mb-3"><strong>Confirm Password</strong></label>

                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check custom-checkbox ms-1">
                                                <input type="checkbox" class="form-check-input" name="subscribe" id="subscribe">
                                                <label class="form-check-label" for="subscribe">Subscribe to <a href="{{ url('/') }}">COWRIEHUB</a></label>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                        @if(isset($_REQUEST['ref']))
                                        <input type="hidden" name="code" value="{{ $_REQUEST['ref'] }}">
                                        @endif
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
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