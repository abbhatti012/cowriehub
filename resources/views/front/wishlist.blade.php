@extends('front.layout.index')
@section('content')

    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Wishlist</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('shop') }}" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Wishlist
                </nav>
            </div>
        </div>
    </div>
    <div class="wishtemHere" id="content">
        <?php echo $wishlist_item ?>
    </div>
    
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click','.removeWishlist',function(){
                var id = $(this).data('id');
                $.ajax({
                    type : 'GET',
                    url : '{{ route("remove-wishlist") }}',
                    data : {
                        id : id
                    },
                    success : function(data){
                        $.notify('Product removed from the wishlist successfully!', 'success');
                        $('.wishtemHere').html(data);
                    }
                })
            });
        });
    </script>
@endsection