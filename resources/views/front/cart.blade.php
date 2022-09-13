@extends('front.layout.index')
@section('content')

    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Cart</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('shop') }}" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Cart
                </nav>
            </div>
        </div>
    </div>
    <div class="site-content bg-punch-light overflow-hidden cartItemHere" id="content">
        <?php echo $cart_page ?>
    </div>
    
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var shippingPriceStandard = $('.subtotalValue').text();
            var totalPrice = $('.totalPrice').text();
            $(document).on('change','.shippingChargesStandard',function(){
                $('.shippingChargesStandard option:selected').each(function(){
                    var price = $(this).data('price');
                    $('.shippingFee').html(price);
                    $('.totalPrice').html(+shippingPriceStandard + +price);
                });
            });
            var shippingPriceExpress = $('.subtotalValue').text();
            $(document).on('change','.shippingChargesExpress',function(){
                $('.shippingChargesExpress option:selected').each(function(){
                    var price = $(this).data('price')
                    $('.shippingFee').html(price);
                    $('.totalPrice').html(+shippingPriceExpress + +price);
                });
            });
           $('input[name="delivery"]').on('change',function(){
                var type = $(this).val();
                if(type == 'standard'){
                    $('.standardDelivery').show();
                    $('.expressDelivery').hide();
                } else if(type == 'express'){
                    $('.expressDelivery').show();
                    $('.standardDelivery').hide();
                }
           });
            $(document).on('click','.removeCart',function(){
                var id = $(this).data('id');
                $.ajax({
                    type : 'GET',
                    url : '{{ route("remove-cart") }}',
                    data : {
                        id : id
                    },
                    success : function(data){
                        $.notify('Product removed from the cart successfully!', 'success');
                        $('.cartItemHere').html(data);
                    }
                })
            });
            $(document).on('change','.update-cart',function(){
                var id = $(this).data('id');
                var quantity = $(this).val();
                $.ajax({
                    type : 'GET',
                    url : '{{ route("update-cart") }}',
                    data : {
                        id : id,
                        quantity : quantity
                    },
                    success : function(data){
                        $.notify('Product updated into the cart successfully!', 'success');
                        $('.cartItemHere').html(data);
                    }
                })
            });
            $(document).on('click','.proceedToCheckout',function(){
                var shippingCharges = $('#shippingCharges option:selected').val();
                var preciseLocation = $('#precise_location').val();
                var postCode = $('#post_code').val();
                
                if(shippingCharges == ''){
                    $.notify('Please choose location');
                    return false;
                } else if(preciseLocation == ''){
                    $.notify('Please choose your precise location');
                    return false;
                } else {
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('before-payment') }}",
                        data : {
                            '_token' : '{{ csrf_token() }}',
                            shippingCharges : shippingCharges,
                            preciseLocation : preciseLocation,
                            postCode : postCode,
                            totalPrice : parseInt($('.totalPrice').text()),
                            subTotal : parseInt($('.subtotalValue').text()),
                            shippingPrice : parseInt($('#shippingCharges option:selected').data('price'))
                        },
                        success : function(data){
                            location.href = "{{ route('checkout') }}?token="+data;
                        }
                    });
                }
            });
            $(document).on('click','.proceedForAddress',function(){
                $.ajax({
                    type : 'POST',
                    url : "{{ route('pos-before-payment') }}",
                    data : {
                        '_token' : '{{ csrf_token() }}',
                        totalPrice : parseInt($('.totalPrice').text()),
                        subTotal : parseInt($('.subtotalValue').text()),
                    },
                    success : function(data){
                        location.href = "{{ route('checkout') }}?token="+data;
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeEQgpHcPzV4BwOa60xgE9AwhlofidWh8&libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('precise_location');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection