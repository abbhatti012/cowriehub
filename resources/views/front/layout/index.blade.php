<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Cowriehub" />
  <title>Cowriehub Book Store</title>

  <link rel="shortcut icon" href="{{asset('assets/images/favicon.html')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('assets/images/favicon.html')}}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/rs-plugin/css/settings.css')}}" media="screen" />
  <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

  <script src="https://use.fontawesome.com/5b53daa9de.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:100i,300,400,700,900" rel="stylesheet">

  <script src="{{asset('assets/js/vendors/modernizr.js')}}"></script>
</head>
   
<body>
<div id="wrap" class="layout-16 navy"> 
    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')
    <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
</div>

<script src="{{asset('assets/js/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/wow.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/own-menu.js')}}"></script>
<script src="{{asset('assets/js/vendors/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/vendors/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/rs-plugin/js/jquery.tp.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scripts')
<script src="//code.tidio.co/wa0smygsidvita41rbcfrurkda8guxqc.js" async></script>
<style>
    .typeahead{
        left: 0 !important;
        max-width: 100% !important;
        overflow: hidden !important;
        overflow-x: scroll !important;
        width: 100%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      var buttons = document.getElementsByTagName("buttons")[0];
      buttons.addEventListener("click", function(e) {
        buttons.classList.toggle("liked");
      });
    });
</script>

  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

<script>
    $(document).on('ready', function() {
        $("#basic-validation").validate();
        $("#basic-validations").validate();
        
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
            var cat = $('.searchGenre options:selected').val();
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
                            window.location.href='<?= asset("product/") ?>/'+value+'?cat='+cat
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
