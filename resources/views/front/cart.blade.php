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
            $(document).on('click','.update-cart',function(){
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
@endsection