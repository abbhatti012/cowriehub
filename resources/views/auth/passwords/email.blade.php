<!DOCTYPE html>
<html lang="en" class="h-100">

<head>	
	<!-- PAGE TITLE HERE -->
	<title>RESET PASSWORD</title>
	
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
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="{{ url('/') }}"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">{{ __('Reset Password') }}</h4>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form id="basic-form" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </form>
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