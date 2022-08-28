<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home v1 | Bookworm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/slick-carousel/slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
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
        textarea.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }
        .typeahead{
            left: 0 !important;
            max-width: 100% !important;
            overflow: hidden !important;
            overflow-x: scroll !important;
        }
    </style>
<body>
@include('front.layout.header')

@yield('content')

@include('front.layout.footer')

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<!-- <script src="{{asset('admin_assets/js/student-global.js')}}"></script> -->
    
<script src="{{asset('assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendor/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js')}}"></script>
<script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/hs.core.js')}}"></script>
<script src="{{asset('assets/js/components/hs.unfold.js')}}"></script>
<script src="{{asset('assets/js/components/hs.malihu-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/components/hs.header.js')}}"></script>
<script src="{{asset('assets/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{asset('assets/js/components/hs.selectpicker.js')}}"></script>
<script src="{{asset('assets/js/components/hs.show-animation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<!-- JS Bookworm -->
<!-- <script src="../../assets/js/bookworm.js"></script> -->
<script>
    $(document).on('ready', function() {
            $("#basic-validation").validate();
            $("#basic-validations").validate();
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
            $.HSCore.components.HSHeader.init($('#header'));
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');
            var zeynep = $('.zeynep').zeynep({
                onClosed: function() {
                    $("body main").attr("style", "");
                },
                onOpened: function() {
                    $("body main").attr("style", "pointer-events: none;");
                }
            });
            $(".zeynep-overlay").click(function() {
                zeynep.close();
            });
            $(".cat-menu").click(function() {
                if ($("html").hasClass("zeynep-opened")) {
                    zeynep.close();
                } else {
                    zeynep.open();
                }
            });
            $(document).on('click','.addToWishlist',function(){
                var user_id = "{{ Auth::id() }}";
                if(user_id == ''){
                   return $.notify('Please login first');
                }
                var id = $(this).data('id');
                $.ajax({
                    type : 'POST',
                    url : '{{ route("add-to-wishlist") }}',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        id : id,
                    },
                    success : function(data){
                        $.notify(data.message, data.type);
                    }
                });
            });
            $(document).on('click','.searchIcon',function(){
                var value = $('.typeahead').val();
                if(value != ''){
                    $.ajax({
                        type : 'POST',
                        url : '{{ route("insert-search-result") }}',
                        data : {
                            "_token": "{{ csrf_token() }}",
                            value : value
                        },
                        success : function(data){
                            if(data.status){
                                window.location.href='<?= asset("product/") ?>/'+value
                            } else {
                                $.notify(data.text, data.type);
                            }
                        }
                    })
                }
            });
            $(document).on('change','.change-currency',function() {
                var id = $(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{ route("update_currency_flag") }}',
                    data : {
                        id : id
                    },
                    success : function(data){
                        if(data){
                            location.reload();
                        }
                    }
                });
            });
            $(document).on('click','.subscribeNow',function(){
                var email = $('#signupSrName').val();
                if(email == ''){
                    return $.notify('Please enter email first to subscribe!');
                }
                $(this).attr('disabled',true);
                $.ajax({
                    type : 'POST',
                    url : '{{ route("front.subscribe") }}',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        email : email,
                    },
                    success : function(data){
                        $('#signupSrName').val('');
                        $('.subscribeNow').attr('disabled',false);
                        $.notify(data.text, data.type);
                    }
                });
            });
        });

        var searchPath = "{{ route('front-autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(searchPath, { query: query }, function (data) {
                    return process(data);
                });
            },
        });
    </script>
@yield('scripts')
<script src="//code.tidio.co/wa0smygsidvita41rbcfrurkda8guxqc.js" async></script>
@if(Session::has('payment_cancelled'))
<script>
    $.notify("Your Payment has been cancelled!");
</script>
@endif
@if(Session::has('payment_cannot_process'))
<script>
    $.notify("Payment cannot process!");
</script>
@endif
@if(Session::has('fraud_payment'))
<script>
    $.notify("Fraud transaction detected!");
</script>
@endif
@if(Session::has('payment_successfull'))
<script>
    $.notify("Payment Successfull!", 'success');
</script>
@endif
@if(Session::has('review_not_added'))
<script>
    $.notify("You have already added a review against that product!");
</script>
@endif
@if(Session::has('review_added'))
<script>
    $.notify("Review added successfully.",'success');
</script>
@endif
@if(Session::has('review_error'))
<script>
    $.notify("Review not added. There is something went wrong!");
</script>
@endif
</body>
</html>
