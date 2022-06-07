@extends('front.layout.index')
@section('content')
<style>
    .rating-component .stars-box .star{
        cursor: pointer;
    }
    .rating-component .stars-box .star.selected {
        color: #ffbd00;
        font-weight: 600;
    }
    .cursor-pointer{
        cursor: pointer;
    }
</style>

    <!-- ====== MAIN CONTENT ====== -->
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">{{ $book->title }}</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('shop') }}" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>{{ $book->title }}
                </nav>
            </div>
        </div>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main ">
            <div class="product">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                            <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                                <div class="js-slick-carousel u-slick"
                                data-pagi-classes="text-center u-slick__pagination my-4">
                                    <div class="js-slide">
                                        <img src="{{ asset($book->cover) }}" alt="Image Description" class="mx-auto img-fluid">
                                    </div>
                                    <!-- <div class="js-slide">
                                        <img src="{{ asset('assets/img/books/product-detail.jpg') }}" alt="Image Description" class="mx-auto img-fluid">
                                    </div>
                                    <div class="js-slide">
                                        <img src="{{ asset('assets/img/books/product-detail.jpg') }}" alt="Image Description" class="mx-auto img-fluid">
                                    </div> -->
                                </div>
                            </figure>
                        </div>
                        <div class="col-md-7 pl-0 summary entry-summary border-left">
                            <div class="space-top-2 px-4 px-xl-7 border-bottom pb-5">
                                <h1 class="product_title entry-title font-size-7 mb-3">{{ $book->title }}</h1>
                                <div class="font-size-2 mb-4">
                                    <span class="text-yellow-darker">
                                    @if($data['rate'] < 5)
                                        @for($i = 0; $i < $data['rate']; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                        @for($i = 0; $i < 5 - $data['rate']; $i++)
                                            <small class="far fa-star"></small>
                                        @endfor
                                    @else
                                        @for($i = 0; $i < $data['rate']; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                    @endif
                                    </span>
                                    <span class="ml-3">({{ count($reviews) }})</span>
                                    <span class="ml-3 font-weight-medium">By (author)</span>
                                    <span class="ml-2 text-gray-600">{{ $author->name }}</span>
                                </div>
                                @if($book->is_hardcover) @php $hardPrice = $book->hard_price @endphp @else @php $hardPrice = 0 @endphp @endif
                                @if($book->is_paperback) @php $paperPrice = $book->paper_price @endphp @else @php $paperPrice = 0 @endphp @endif
                                @if($book->is_digital) @php $digitalPrice = $book->digital_price @endphp @else @php $digitalPrice = 0 @endphp @endif
                                <p class="price font-size-22 font-weight-medium mb-3">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">GHS</span><span class="totalPrice">{{ $book->price + $paperPrice}}</span>
                                    </span>
                                </p>  

                                <div class="mb-2 font-size-2">
                                    <span class="font-weight-medium">Book Format:</span>
                                    <span class="ml-2 text-gray-600">Choose an option</span>
                                </div>
                                <!-- Radio Checkbox Group -->
                                <div class="row mx-gutters-2 mb-4">
                                    <div class="col-6 col-md-3 mb-3 mb-md-0">
                                        <div class="">
                                            <input type="radio" id="typeOfListingRadio1" name="extraPrices" value="{{ $hardPrice }}" data-type="hardcover" class="custom-control-input checkbox-outline__input">
                                            <label onclick="updatePrice(@if($book->is_hardcover) {{ $book->hard_price }} @else 0 @endif, {{ $book->price }})" class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0 cursor-pointer" for="typeOfListingRadio1">
                                                <span class="d-block">Hardcover</span>
                                                <span class="">GHS {{ $hardPrice }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 mb-3 mb-md-0">
                                        <div class="">
                                            <input type="radio" id="typeOfListingRadio2" name="extraPrices" value="{{ $paperPrice }}" data-type="paperback" class="custom-control-input checkbox-outline__input" checked>
                                            <label onclick="updatePrice(@if($book->is_paperback) {{ $book->paper_price }} @else 0 @endif, {{ $book->price }})" class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0 cursor-pointer" for="typeOfListingRadio2">
                                                <span class="d-block">Paperback</span>
                                                <span class="">GHS {{ $paperPrice }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="">
                                            <input type="radio" id="typeOfListingRadio3" name="extraPrices" value="{{ $digitalPrice }}" data-type="digital" class="custom-control-input checkbox-outline__input">
                                            <label onclick="updatePrice(@if($book->is_digital) {{ $book->digital_price }} @else 0 @endif, {{ $book->price }})" class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0 cursor-pointer" for="typeOfListingRadio3">
                                                <span class="d-block">Digital</span>
                                                <span class="">GHS {{ $digitalPrice }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="woocommerce-product-details__short-description font-size-2 mb-5">
                                    <p class="">{{ $book->synopsis }}</p>
                                </div>

                                <form class="cart d-md-flex align-items-center" method="post" enctype="multipart/form-data">
                                @if($book->hard_allow_preorders == '' && $book->paper_allow_preorders == '')
                                    <div class="quantity mb-4 mb-md-0 d-flex align-items-center">
                                        <div class="border px-3 width-120">
                                            <div class="js-quantity">
                                                <div class="d-flex align-items-center">
                                                    <label class="screen-reader-text sr-only">Quantity</label>
                                                    <a class="js-minus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="1px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                        </svg>
                                                    </a>
                                                    <input type="number" class="input-text qty text js-result form-control text-center border-0" id="prod_qty" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                                                    <a class="js-plus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($book->hard_allow_preorders == 1 || $book->paper_allow_preorders == 1)
                                    <a href="javascript:void(0)" name="add-to-cart" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt" data-toggle="modal" data-target="#preOrderModalModal" data-is_preorder = "1" data-id="{{ $book->id }}">Pre Order <small>(Pay 10% Upfront)</small></a>
                                @else
                                    <a href="javascript:void(0)" name="add-to-cart" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt addToCart" data-is_preorder = "0" data-id="{{ $book->id }}">Add to cart</a>
                                @endif
                                    <a href="{{ route('cart') }}" class="p-3 min-width-250 ml-md-4 btn btn-outline-dark rounded-0 px-5 mb-3 mb-md-0">View Cart</a>
                                </form>
                            </div>
                            
                            <div class="modal fade" id="preOrderModalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                        Your Shopping Cart
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-4d875 border">
                                            <div id="cartHeadingTwo" class="cart-head">
                                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                                    data-toggle="collapse"
                                                    data-target="#cartCollapseTwo"
                                                    aria-expanded="true"
                                                    aria-controls="cartCollapseTwo">

                                                    <h3 class="cart-title mb-0 font-weight-medium font-size-3">Location</h3>

                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>

                                                </a>
                                            </div>

                                            <div id="cartCollapseTwo" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingTwo">
                                                <div>
                                                    <label for="precise_location"></label>
                                                    <input type="text" id="precise_location" class="form-control" required placeholder="Enter precise location">
                                                </div>
                                                <div>
                                                    <label for="post_code"></label>
                                                    <input type="text" id="post_code" name="post_code" class="form-control" placeholder="Ghana POST Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex text-right">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <a href="javascript:void(0)" data-id="{{ $book->id }}" data-total="{{ $book->price }}" class="btn btn-dark proceedToCheckout">Proceed to checkout</a>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                        Your Shopping Cart
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-image">
                                        <thead>
                                            <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td class="w-25">
                                                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td>Vans Sk8-Hi MTE Shoes</td>
                                            <td>89$</td>
                                            <td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
                                            <td>178$</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            </tr>
                                        </tbody>
                                        </table> 
                                        <div class="d-flex justify-content-end">
                                        <h5>Total: <span class="price text-success">89$</span></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Checkout</button>
                                    </div>
                                    </div>
                                </div>
                            </div> -->

                            @if($book->hard_expected_shipment != null && $book->hard_expected_shipment > date('Y-m-d'))
                            <div style="padding-left: 65px;" class="countdown-timer">
                                <br><h6>Book to be shipped: ({{ date('F jS, Y', strtotime($book->hard_expected_shipment)) }})</h6>
                                <div class="d-flex align-items-stretch justify-content-between">
                                    <div class="py-2d75">
                                        <span class="font-weight-medium font-size-3 days"></span>
                                        <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                                    </div>
                                    <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                    <div class="py-2d75">
                                        <span class="font-weight-medium font-size-3 hours"></span>
                                        <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                                    </div>
                                    <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                    <div class="py-2d75">
                                        <span class="font-weight-medium font-size-3 minutes"></span>
                                        <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                                    </div>
                                    <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                                    <div class="py-2d75">
                                        <span class="font-weight-medium font-size-3 seconds"></span>
                                        <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                                    </div>
                                </div>
                            </div>   
                            @endif
                            <div class="px-4 px-xl-7 py-5 d-flex align-items-center">
                                <ul class="list-unstyled nav">
                                    <li class="mr-6 mb-4 mb-md-0">
                                        @if($wishlist == 0)
                                            <a href="javascript:void(0)" class="h-primary addToWishlist" data-id="{{ $book->id }}"><i class="flaticon-heart mr-2"></i> Add to Wishlist</a>
                                        @else
                                            <a href="{{ route('wishlist') }}" class="h-primary"><i class="flaticon-heart mr-2"></i> View Wishlist</a>
                                        @endif
                                    </li>
                                    <li class="mr-6">
                                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                            <a class="addthis_button_facebook"></a>
                                            <a class="addthis_button_twitter"></a>
                                            <a class="addthis_button_pinterest_share"></a>
                                            <a class="addthis_button_more"><i class="fa fa-share-alt fa-2x"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nav Classic -->
                <div class="js-scroll-nav mb-10">
                    <div class="woocommerce-tabs wc-tabs-wrapper  2 mx-lg-auto">
                        <div id="Description" class="">
                            <div class="border-top border-bottom">
                                <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                        <a class="nav-link py-4 font-weight-medium description-link active" href="#Description">
                                            Extras
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium information-link" href="#ProductDetails">
                                            Product Details
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium reviews-link" href="#ProductReviews">
                                            Reviews ({{ count($reviews) }})
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content font-size-2 container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9 description">
                                            <!-- Mockup Block -->
                                            <div class="table-responsive mb-4">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th></th>
                                                            <th>Hardcover</th>
                                                            <th>Paperback</th>
                                                            <th>Digital</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Price:</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_price }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_price }}@else --- @endif</td>
                                                            <td>@if($book->is_digital){{ $book->digital_price }}@else --- @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Page Count:</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_page }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_page }}@else --- @endif</td>
                                                            <td>@if($book->is_digital){{ $book->digital_page }}@else --- @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>ISBN:</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_isbn }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_isbn }}@else --- @endif</td>
                                                            <td>@if($book->is_digital){{ $book->digital_isbn }}@else --- @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Weight:</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_weight }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_weight }}@else --- @endif</td>
                                                            <td>---</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipped to cowriehub?</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_ship }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_ship }}@else --- @endif</td>
                                                            <td>---</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Number In Stock?</th>
                                                            <td>@if($book->is_hardcover){{ $book->hard_stock }}@else --- @endif</td>
                                                            <td>@if($book->is_paperback){{ $book->paper_stock }}@else --- @endif</td>
                                                            <td>---</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- End Mockup Block -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>

                        <div id="ProductDetails" class="">
                            <div class="border-top border-bottom">
                                <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium description-link" href="#Description">
                                            Extras
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                        <a class="nav-link py-4 font-weight-medium active information-link" href="#ProductDetails">
                                            Product Details
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium reviews-link" href="#ProductReviews">
                                            Reviews ({{ count($reviews) }})
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content font-size-2 container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9 information">
                                            <!-- Mockup Block -->
                                            <div class="table-responsive mb-4">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th class="px-4 px-xl-5">Publication date: </th>
                                                            <td>{{ $book->publication_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="px-4 px-xl-5">Publisher:</th>
                                                            <td>{{ $book->publisher }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="px-4 px-xl-5">Publication City/Country:</th>
                                                            <td>{{ $book->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="px-4 px-xl-5">Language:</th>
                                                            <td>English</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- End Mockup Block -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>

                        <div id="ProductReviews" class="">
                            <div class="border-top border-bottom">
                                <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium description-link" href="#Description">
                                            Extras
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                        <a class="nav-link py-4 font-weight-medium information-link" href="#ProductDetails">
                                            Product Details
                                        </a>
                                    </li>
                                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                        <a class="nav-link py-4 font-weight-medium active reviews-link" href="#ProductReviews">
                                            Reviews ({{ count($reviews) }})
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <!-- Tab Content -->
                            <div class="tab-content font-size-2 container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9 reviews">
                                            <!-- Mockup Block -->
                                            <h4 class="font-size-3">Customer Reviews </h4>
                                            <div class="row mb-8">
                                                <div class="col-md-6 mb-6 mb-md-0">
                                                    <div class="d-flex  align-items-center mb-4">
                                                        <span class="font-size-15 font-weight-bold">{{ $data['rate'] }}</span>
                                                        <div class="ml-3 h6 mb-0">
                                                            <span class="font-weight-normal">{{ count($reviews) }} reviews</span>
                                                            <div class="text-yellow-darker">
                                                                @if($data['rate'] < 5)
                                                                    @for($i = 0; $i < $data['rate']; $i++)
                                                                        <small class="fas fa-star"></small>
                                                                    @endfor
                                                                    @for($i = 0; $i < 5 - $data['rate']; $i++)
                                                                        <small class="far fa-star"></small>
                                                                    @endfor
                                                                @else
                                                                    @for($i = 0; $i < $data['rate']; $i++)
                                                                        <small class="fas fa-star"></small>
                                                                    @endfor
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-md-flex">
                                                        <button type="button" class="marketer_reviews btn btn-outline-dark rounded-0 px-5 mb-3 mb-md-0">See all reviews</button>
                                                        <button type="button" class="customer_reviews btn btn-dark ml-md-3 rounded-0 px-5">Write a review</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Ratings -->
                                                    <ul class="list-unstyled pl-xl-4">
                                                        <li class="py-2">
                                                            <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                                <div class="col-auto">
                                                                    <span class="text-dark">5 stars</span>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <div class="progress bg-white-100" style="height: 7px;">
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: {{ $data['five_star'] }}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">{{ $data['five_star'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2">
                                                            <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                                <div class="col-auto">
                                                                    <span class="text-dark">4 stars</span>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <div class="progress bg-white-100" style="height: 7px;">
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: {{ $data['four_star'] }}%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">{{ $data['four_star'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2">
                                                            <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                                <div class="col-auto">
                                                                    <span class="text-dark">3 stars</span>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <div class="progress bg-white-100" style="height: 7px;">
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: {{ $data['three_star'] }}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">{{ $data['three_star'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2">
                                                            <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                                <div class="col-auto">
                                                                    <span class="text-dark">2 stars</span>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <div class="progress bg-white-100" style="height: 7px;">
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: {{ $data['two_star'] }}%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">{{ $data['two_star'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2">
                                                            <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                                <div class="col-auto">
                                                                    <span class="text-dark">1 stars</span>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <div class="progress bg-white-100" style="height: 7px;">
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: {{ $data['one_star'] }}%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">{{ $data['one_star'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- End Ratings -->
                                                </div>
                                            </div>

                                            <h4 class="font-size-3 mb-8">{{ count($reviews) }} reviews</h4>

                                            <ul class="list-unstyled mb-8">
                                                @forelse($reviews as $review)
                                                @if($review->type == 'general')
                                                <li class="mb-4 pb-5 border-bottom">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h6 class="mb-0">{{ $review->title }}</h6>
                                                        <div class="text-yellow-darker ml-3">
                                                            @if($review->rate < 5)
                                                                @for($i = 0; $i < $review->rate; $i++)
                                                                    <small class="fas fa-star"></small>
                                                                @endfor
                                                                @for($i = 0; $i < 5 - $review->rate; $i++)
                                                                    <small class="far fa-star"></small>
                                                                @endfor
                                                            @else
                                                                @for($i = 0; $i < $review->rate; $i++)
                                                                    <small class="fas fa-star"></small>
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 text-lh-md">{{ $review->comment }}</p>
                                                    <div class="text-gray-600 mb-4">{{ date("F j, Y, g:i a",strtotime($review->created_at)); }} </div>
                                                    <!-- <ul class="nav">
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                                <span class="ml-2">90</span>
                                                            </a>
                                                        </li>
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                                <span class="ml-2">10</span>
                                                            </a>
                                                        </li>
                                                    </ul> -->
                                                </li>
                                                @endif
                                                @empty
                                               @endforelse
                                            </ul>
                                            <form id="customer_reviews" action="{{ route('add-review') }}" method="POST">
                                                @csrf
                                                <h4 class="font-size-3 mb-4">Write a Review</h4>
                                                <div class="rating-component d-flex align-items-center mb-6">
                                                    <h6 class="mb-0">Select a rating(required)</h6>
                                                    <div class="text-yellow-darker ml-3 font-size-4 stars-box">
                                                        <i class="star far fa-star" data-value="1"></i>
                                                        <i class="star far fa-star" data-value="2"></i>
                                                        <i class="star far fa-star" data-value="3"></i>
                                                        <i class="star far fa-star" data-value="4"></i>
                                                        <i class="star far fa-star" data-value="5"></i>
                                                    </div>
                                                    <div class="starrate">
                                                        <label>
                                                            <input class="ratevalue" type="hidden" name="rate" value=""/>
                                                            <input type="hidden" name="type" value="general"/>
                                                            <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="js-form-message form-group mb-4">
                                                    <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details please! Your review helps other shoppers.</label>
                                                    <textarea class="form-control rounded-0 p-4" rows="7" name="comment" id="descriptionTextarea" placeholder="What did you like or dislike? What should other shoppers know before buying?" required></textarea>
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label for="title" class="form-label text-dark h6 mb-3">Add a title</label>
                                                    <input type="text" class="form-control rounded-0 px-4" name="title" id="title" placeholder="Add title">
                                                </div>
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">Submit Review</button>
                                                </div>
                                            </form>
                                            <br><br>
                                            <form id="marketer_reviews" action="{{ route('add-review') }}" method="POST">
                                                @csrf
                                                <h4 class="font-size-3 mb-4">Marketer Reviews</h4>
                                                <ul class="list-unstyled mb-8">
                                                @forelse($reviews as $review)
                                                @if($review->type == 'marketer')
                                                <li class="mb-4 pb-5 border-bottom">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h6 class="mb-0">{{ $review->title }}</h6>
                                                        <div class="text-yellow-darker ml-3">
                                                            @if($review->rate < 5)
                                                                @for($i = 0; $i < $review->rate; $i++)
                                                                    <small class="fas fa-star"></small>
                                                                @endfor
                                                                @for($i = 0; $i < 5 - $review->rate; $i++)
                                                                    <small class="far fa-star"></small>
                                                                @endfor
                                                            @else
                                                                @for($i = 0; $i < $review->rate; $i++)
                                                                    <small class="fas fa-star"></small>
                                                                @endfor
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 text-lh-md">{{ $review->comment }}</p>
                                                    <div class="text-gray-600 mb-4">{{ date("F j, Y, g:i a",strtotime($review->created_at)); }} </div>
                                                    <!-- <ul class="nav">
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                                <span class="ml-2">90</span>
                                                            </a>
                                                        </li>
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                                <span class="ml-2">10</span>
                                                            </a>
                                                        </li>
                                                    </ul> -->
                                                </li>
                                                @endif
                                                @empty
                                               @endforelse
                                            </ul>
                                                <div class="rating-component d-flex align-items-center mb-6">
                                                    <h6 class="mb-0">Select a rating(required)</h6>
                                                    <div class="text-yellow-darker ml-3 font-size-4 stars-box">
                                                        <i class="star far fa-star" data-value="1"></i>
                                                        <i class="star far fa-star" data-value="2"></i>
                                                        <i class="star far fa-star" data-value="3"></i>
                                                        <i class="star far fa-star" data-value="4"></i>
                                                        <i class="star far fa-star" data-value="5"></i>
                                                    </div>
                                                    <div class="starrate">
                                                        <label>
                                                            <input class="ratevalue" type="hidden" name="rate" value=""/>
                                                            <input type="hidden" name="type" value="marketer"/>
                                                            <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="js-form-message form-group mb-4">
                                                    <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details please! Your review helps other shoppers.</label>
                                                    <textarea class="form-control rounded-0 p-4" rows="7" name="comment" id="descriptionTextarea" placeholder="What did you like or dislike? What should other shoppers know before buying?" required></textarea>
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label for="title" class="form-label text-dark h6 mb-3">Add a title</label>
                                                    <input type="text" class="form-control rounded-0 px-4" name="title" id="title" placeholder="Add title">
                                                </div>
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">Submit Review</button>
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
        </main>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            // $('#cartModal').modal('show');
            $('.description-link').on('click',function(){
                $('html, body').animate({
                    scrollTop: $(".description").offset().top
                }, 1000);
            })
            $('.information-link').on('click',function(){
                $('html, body').animate({
                    scrollTop: $(".information").offset().top
                }, 1000);
            })
            $('.reviews-link').on('click',function(){
                $('html, body').animate({
                    scrollTop: $(".reviews").offset().top
                }, 1000);
            });
            $('.marketer_reviews').on('click',function(){
                $('html, body').animate({
                    scrollTop: $("#marketer_reviews").offset().top
                }, 1000);
            });
            $('.customer_reviews').on('click',function(){
                $('html, body').animate({
                    scrollTop: $("#customer_reviews").offset().top
                }, 1000);
            });
            $('.addToWishlist').on('click',function(){
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
            $('.addToCart').on('click',function(){
                var id = $(this).data('id');
                var is_preorder = $(this).data('is_preorder');
                var qty = $('#prod_qty').val();
                var extraPrice = $("input[name='extraPrices']:checked").val();
                var extraType = $("input[name='extraPrices']:checked").data('type');
                var bookPrice = <?php echo $book->price ?>;
                var title = "<?php echo $book->title ?>";
                var image = "{{ asset($book->cover) }}";
                
                $.ajax({
                    type : 'POST',
                    url : '{{ route("add-to-cart") }}',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        id : id,
                        qty : qty,
                        extraPrice : extraPrice,
                        extraType : extraType,
                        bookPrice : bookPrice,
                        title : title,
                        image : image,
                        is_preorder : is_preorder
                    },
                    success : function(data){
                        $('body .cartItemsLength').html(data.cartLength);
                        $.notify(data.message, data.type);
                    }
                });
            });

            $(document).on('click','.proceedToCheckout',function(){
                var preciseLocation = $('#precise_location').val();
                var postCode = $('#post_code').val();
                var userId = "{{ Auth::id() }}";
                var bookId = "{{ $book->id }}";
                var totalPrice = $(this).data('total');
                var subTotal = $("input[name='extraPrices']:checked").val();
                var extraPrice = $("input[name='extraPrices']:checked").val();
                var extraType = $("input[name='extraPrices']:checked").val();
                if(userId == ''){
                    $.notify('Please login first to continue');
                    return false;
                }
                if(preciseLocation == ''){
                    $.notify('Please choose your precise location');
                    return false;
                } else {
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('preorder-before-payment') }}",
                        data : {
                            '_token' : '{{ csrf_token() }}',
                            preciseLocation : preciseLocation,
                            postCode : postCode,
                            totalPrice : parseFloat(totalPrice),
                            subTotal : parseFloat(subTotal),
                            extraPrice : extraPrice,
                            extraType : extraType,
                            bookId : bookId,
                        },
                        success : function(data){
                            location.href = "{{ route('checkout') }}?token="+data;
                        }
                    });
                }
            });
        
            $(".rating-component .stars-box .star").on("click", function () {
                var onStar = parseInt($(this).data("value"), 10);
                var stars = $(this).parent().children("i.star");
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass("selected");
                }
                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass("selected");
                }
                $('.ratevalue').val(onStar);
            });
        });
        function updatePrice(price, bookPrice){
            if(price == undefined){
                price = 0;
            }
            
            $('.totalPrice').html(+bookPrice + +price);
        }
    </script>
    <script src='https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bd330b4fbbfeb2'></script>
    <script>
        var addthis_config = {
            ui_click: true 
        } 

        // Do this when the AddThis API is ready
        function addthisReady(evt) {
            // Place the color of your website here.
            var websiteColor = "#749EAC";

            // This changes the color once the "addThis" buttons have been loaded    
            $('.addthis_toolbox > a').find('span').css("background-color", websiteColor);
        }

        // Listen for the ready event
        addthis.addEventListener('addthis.ready', addthisReady);

        $('.addthis_toolbox > a').hover(function() {
            $('.addthis_toolbox > a').not(this).stop().fadeTo( "fast" , 0.3);
        }, function() {
            $('.addthis_toolbox > a').not(this).stop().fadeTo( "fast" , 1);
        });
    </script>

    <script>
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            var end_date = "<?= date('Y-m-d') ?>";
            let today = new Date(end_date),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "<?= $book->hard_expected_shipment ?>",
                birthday = dayMonth;
            
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
            
            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {

                    const now = new Date().getTime(),
                    distance = countDown - now;
                    
                    $('.days').html(Math.floor(distance / (day)));
                    $('.hours').html(Math.floor((distance % (day)) / (hour)));
                    $('.minutes').html(Math.floor((distance % (hour)) / (minute)));
                    $('.seconds').html(Math.floor((distance % (minute)) / second));
                    
                    if (distance < 0) {
                        clearInterval(x);
                    }
                }, 0)
            }());
    </script>
@endsection