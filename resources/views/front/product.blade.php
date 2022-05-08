@extends('front.layout.index')
@section('content')
    <!-- ====== MAIN CONTENT ====== -->
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop Single</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('shop') }}" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Shop Single
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
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </span>
                                    <span class="ml-3">(0)</span>
                                    <span class="ml-3 font-weight-medium">By (author)</span>
                                    <span class="ml-2 text-gray-600">{{ $author->name }}</span>
                                </div>
                                <p class="price font-size-22 font-weight-medium mb-3">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">GHS</span>{{ $book->price }}
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
                                            <input type="radio" id="typeOfListingRadio1" name="typeOfListingRadio1" class="custom-control-input checkbox-outline__input">
                                            <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio1">
                                                <span class="d-block">Hardcover</span>
                                                <span class="">GHS @if($book->is_hardcover) {{ $book->hard_price }} @else 0 @endif</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 mb-3 mb-md-0">
                                        <div class="">
                                            <input type="radio" id="typeOfListingRadio2" name="typeOfListingRadio1" class="custom-control-input checkbox-outline__input" checked>
                                            <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio2">
                                                <span class="d-block">Paperback</span>
                                                <span class="">GHS @if($book->is_paperback) {{ $book->paper_price }} @else 0 @endif</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="">
                                            <input type="radio" id="typeOfListingRadio3" name="typeOfListingRadio1" class="custom-control-input checkbox-outline__input">
                                            <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio3">
                                                <span class="d-block">Digital</span>
                                                <span class="">GHS @if($book->is_digital) {{ $book->hard_price }} @else 0 @endif</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Radio Checkbox Group -->

                                <div class="woocommerce-product-details__short-description font-size-2 mb-5">
                                    <p class="">{{ $book->synopsis }}</p>
                                </div>

                                <form class="cart d-md-flex align-items-center" method="post" enctype="multipart/form-data">
                                    <div class="quantity mb-4 mb-md-0 d-flex align-items-center">
                                        <!-- Quantity -->
                                        <div class="border px-3 width-120">
                                            <div class="js-quantity">
                                                <div class="d-flex align-items-center">
                                                    <label class="screen-reader-text sr-only">Quantity</label>
                                                    <a class="js-minus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="1px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                        </svg>
                                                    </a>
                                                    <input type="number" class="input-text qty text js-result form-control text-center border-0" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                                                    <a class="js-plus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>

                                    <!-- <button type="submit" name="add-to-cart" value="7145" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">Add to cart</button> -->
                                    <a href="{{ route('cart') }}" name="add-to-cart" value="7145" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">Add to cart</a>
                                </form>
                            </div>
                            <div class="px-4 px-xl-7 py-5 d-flex align-items-center">
                                <ul class="list-unstyled nav">
                                    <li class="mr-6 mb-4 mb-md-0">
                                        <a href="#" class="h-primary"><i class="flaticon-heart mr-2"></i> Add to Wishlist</a>
                                    </li>
                                    <li class="mr-6">
                                        <a href="#" class="h-primary"><i class="flaticon-share mr-2"></i> Share</a>
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
                                            Reviews (0)
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
                                            Reviews (0)
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
                                            Reviews (0)
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
                                                        <span class="font-size-15 font-weight-bold">4.6</span>
                                                        <div class="ml-3 h6 mb-0">
                                                            <span class="font-weight-normal">3,714 reviews</span>
                                                            <div class="text-yellow-darker">
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="far fa-star"></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-md-flex">
                                                        <button type="button" class="btn btn-outline-dark rounded-0 px-5 mb-3 mb-md-0">See all reviews</button>
                                                        <button type="button" class="btn btn-dark ml-md-3 rounded-0 px-5">Write a review</button>
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
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">205</span>
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
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">55</span>
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
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">23</span>
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
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">0</span>
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
                                                                        <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <span class="text-secondary">4</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- End Ratings -->
                                                </div>
                                            </div>

                                            <h4 class="font-size-3 mb-8">1-5 of 44 reviews</h4>

                                            <ul class="list-unstyled mb-8">
                                                <li class="mb-4 pb-5 border-bottom">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h6 class="mb-0">Amazing Story! You will LOVE it</h6>
                                                        <div class="text-yellow-darker ml-3">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star"></small>
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 text-lh-md">Such an incredibly complex story! I had to buy it because there was a waiting list of 30+ at the local library for this book. Thrilled that I made the purchase</p>
                                                    <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                    <ul class="nav">
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
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-flag"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="mb-4 pb-5 border-bottom">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h6 class="mb-0">Get the best seller at a great price.</h6>
                                                        <div class="text-yellow-darker ml-3">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star"></small>
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 text-lh-md">Awesome book, great price, fast delivery. Thanks so much.</p>
                                                    <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                    <ul class="nav">
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
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-flag"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="mb-4 pb-5 border-bottom">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h6 class="mb-0">I read this book short...</h6>
                                                        <div class="text-yellow-darker ml-3">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star"></small>
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 text-lh-md">I read this book shortly after I got it and didn't just put it on my TBR shelf mainly because I saw it on Reese Witherspoon's bookclub September read. It was one of the best books I've read this year, and reminded me some of Kristen Hannah's The Great Alone. </p>
                                                    <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                    <ul class="nav">
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
                                                        <li class="mr-7">
                                                            <a href="#" class="text-gray-600 d-flex align-items-center">
                                                                <i class="text-dark font-size-5 flaticon-flag"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>

                                            <h4 class="font-size-3 mb-4">Write a Review</h4>
                                            <div class="d-flex align-items-center mb-6">
                                                <h6 class="mb-0">Select a rating(required)</h6>
                                                <div class="text-yellow-darker ml-3 font-size-4">
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-4">
                                                <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details please! Your review helps other shoppers.</label>
                                                <textarea class="form-control rounded-0 p-4" rows="7" id="descriptionTextarea" placeholder="What did you like or dislike? What should other shoppers know before buying?" required data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="inputCompanyName" class="form-label text-dark h6 mb-3">Add a title</label>
                                                <input type="text" class="form-control rounded-0 px-4" name="companyName" id="inputCompanyName" placeholder="3000 characters remaining" aria-label="3000 characters remaining">
                                            </div>
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">Submit Review</button>
                                            </div>
                                            <!-- End Mockup Block -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- ====== END MAIN CONTENT ====== -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
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
            })
        })
    </script>
@endsection