@extends('front.layout.index')
@section('content')
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
    </div>

    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">

                <!-- Step 1 -->
                <li class="col-sm-3 current">
                    <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>

                <!-- Step 2 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Shipping Details</h6>
                    </div>
                </li>

                <!-- Step 3 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 3</span>
                        <h6>Confirmation</h6>
                    </div>
                </li>

                <!-- Step 4 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="flaticon-business"></i> </div>
                    <div class="media-body"> <span>Step 4</span>
                        <h6>Payment Methods</h6>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="cartItemHere">
        <?php echo $cart_page; ?>
    </div>
<input type="hidden" id="coupon_value">
<input type="hidden" id="is_coupon" value="0">
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
           $(document).on('click','.checkoutNow',function(){
                var is_coupon = $('#is_coupon').val();
                if(is_coupon == 1){
                    var coupon_value = $('#coupon_value').val();
                    window.location.href = "{{ route('checkout') }}?is_coupon=1&coupon_code="+coupon_value;
                } else {
                    window.location.href = "{{ route('checkout') }}?is_coupon=0&coupon_code=";
                }
           })
            <?php if(isset($_GET['token'])): ?>
                var token = "<?= $_GET['token'] ?>";
                var is_preorder = 1;
            <?php else: ?>
                var token = '';
                var is_preorder = 0;
            <?php endif; ?>
           $('#apply_coupon').on('click',function(){
                var code = $('#coupon_code').val();
                if(code == ''){
                    $.notify('Please enter coupon code first')
                    return false;
                }
                $.ajax({
                    type : 'GET',
                    url : '{{ route("admin.check-coupon") }}',
                    data : {
                        code : code,
                        type : is_preorder,
                        token : token
                    },
                    success : function(data){
                        if(data.status == true){
                            for(var i = 0; i < data.data.length; i++){
                                $('.singlePrice'+data.data[i].id).text(data.data[i].price);
                            }
                            $('.coupoMessage').html('Congratulations you just saved GHS'+data.totalPrice);
                            $.notify('Coupon applied successfully','success');
                            $('.coupoMessage').css('color','green');
                            $('#apply_coupon').prop('disabled',true);
                            $('#coupon_code').val('');
                            $('#coupon_value').val(code);
                            $('#is_coupon').val(1);
                        } else {
                            $.notify(data.message);
                        }
                    }
                });
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