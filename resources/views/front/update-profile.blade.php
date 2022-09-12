@extends($role.'.layout.index')
@section('content')
<style>
    .iti{
        display: block !important;
    }
    .avatar{
        border-radius: 50%;
        height: 150px;
        object-fit: cover;
        width: 150px;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Update Profile</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
            @endif
            <div style="display: none;" class="alert alert-danger UppermessageHere"></div>
        <div class="row">
         
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Profile</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('update-profile-fields') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="name">Name</label>
                                    <input class="form-control form-control-lg" name="name" type="text" id="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email">Email</label>
                                    <input class="form-control form-control-lg" name="email" type="email" id="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="phone">Phone</label>
                                    <input class="form-control form-control-lg" name="phone" type="text" id="phone" value="{{ $user->phone }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="avatar">Profile Avatar</label>
                                    <input class="form-control form-control-lg" name="avatar" type="file" id="avatar">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <a href="{{ asset($user->avatar) }}" target="_blank"><img class="avatar" src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}"></a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary sentVerificationCode">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewPaymentDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verification Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                <div class="alert alert-success messageHere"></div>
                    <div class="basic-form">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="basic-form row col-md-12">
                                    <div class="mb-3 col-md-12">
                                        <label for="verification_code">Verification Code</label>
                                        <input class="form-control form-control-lg" name="verification_code" type="text" id="verification_code" required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary checkVerificationCode">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.sentVerificationCode').on('click',function(){
                var email = "<?= $user->email ?>";
                var currentEmail = $('#email').val();
                if(email != currentEmail){
                    $('.sentVerificationCode').prop('disabled',true);
                    $.ajax({
                        type : 'POST',
                        url : '{{ route("send-verification-email") }}',
                        data : {
                            email : currentEmail,
                            '_token' : '{{ csrf_token() }}',
                        },
                        success : function(data){
                            if(data){
                                $('#viewPaymentDetail').modal('show');
                                $('.messageHere').html('A verification code is sent to your email. Please check and verify now');
                                $('.sentVerificationCode').prop('disabled',false);
                            } else {
                                $('.UppermessageHere').show();
                                $('.UppermessageHere').html('That email is already exists in our records. Please try to update with another email');
                                $('.sentVerificationCode').prop('disabled',false);
                            }
                        }
                    })
                } else  {
                    $('#basic-validation').submit();
                }
            })
            $('.checkVerificationCode').on('click',function(){
                var code = $('#verification_code').val();
                $.ajax({
                    type : 'POST',
                    url : '{{ route("check-verification-email") }}',
                    data : {
                        code : code,
                        '_token' : '{{ csrf_token() }}',
                    },
                    success : function(data){
                        if(data){
                            $('#viewPaymentDetail').modal('hide');
                            $('#basic-validation').submit();
                        } else {
                            $('#viewPaymentDetail').modal('show');
                            $('.messageHere').html('Invalid code or code expired!');
                        }
                    }
                })
            })
        })
    </script>
    <link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
<script>
    var countryData = window.intlTelInputGlobals.getCountryData(),
    input = document.querySelector("#phone"),
    addressDropdown = document.querySelector("#address-country");
    var iti = window.intlTelInput(input, {
    hiddenInput: "full_phone",
    utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
    });
</script>
@endsection