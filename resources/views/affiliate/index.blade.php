@extends('affiliate.layout.index')
@section('content')
<link rel="stylesheet" href="{{asset('admin_assets/vendor/toastr/css/toastr.min.css')}}">
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
    .copy-icon{
        position: absolute;
        right: 15px;
        top: 10px;
    }
    .codeInput{
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
    }
    input{
        /* width: 1200px; */
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">My Affiliate Account</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Affiliate Account</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Affiliate Links</h5>
            </div>
            <div class="card-body">
                <div class="list-group-item d-flex justify-content-between align-items-center list-group-item-info code-copied">
                    <div class="accordion-item">
                        <div class="accordion-header rounded-lg collapsed" onclick="copyToClipboard('#referrelCode')" aria-expanded="false" role="button">
                            <span class="accordion-header-icon"></span>
                            <input type="text" value="<?= $userData->code ?>" id="referrelCode" style="position:absolute;left:-1000px;top:-1000px;">
                            <input type="text" class="accordion-header-text codeInput" value="Referral Code" readonly>
                            <i style="font-size:24px" class="fa copy-icon">&#xf0c5;</i>
                        </div>
                    </div>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary code-copied">
                    <div class="accordion-item">
                        <div class="accordion-header rounded-lg collapsed copyCode" id="code-copied" onclick="copyToClipboard('#HomeCode')" aria-expanded="false" role="button">
                            <span class="accordion-header-icon"></span>
                            <input type="text" value="<?= asset('/') ?>?ref=<?=$userData->code?>" id="HomeCode" style="position:absolute;left:-1000px;top:-1000px;">
                            <input type="text" class="accordion-header-text codeInput" value="Home Page">
                            <i style="font-size:24px" class="fa copy-icon">&#xf0c5;</i>
                        </div>
                    </div>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center list-group-item-secondary code-copied">
                    <div class="accordion-item">
                        <div class="accordion-header rounded-lg collapsed copyCode" id="code-copied" onclick="copyToClipboard('#signupCode')" aria-expanded="false" role="button">
                            <span class="accordion-header-icon"></span>
                            <input type="text" value="<?= route('register') ?>?ref=<?=$userData->code?>" id="signupCode" style="position:absolute;left:-1000px;top:-1000px;">
                            <input type="text" class="accordion-header-text codeInput" value="Signup Page">
                            <i style="font-size:24px" class="fa copy-icon">&#xf0c5;</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('admin_assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('admin_assets/js/plugins-init/toastr-init.js')}}"></script>
    <script>
        function copyToClipboard(element) {
            $(element).select();
            document.execCommand("copy");
        }
        $(document).ready(function(){
            $(".code-copied").on("click", function () {
                toastr.success("Code Copied", "Success", {
                    timeOut: 1000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            })
        })
    </script>
@endsection