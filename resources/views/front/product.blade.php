@extends('front.layout.index')
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
    div.pac-container {
        z-index: 1050 !important;
    }
    .some-cate-active{
        border: 2px solid #06a7a7 !important;
    }
    .banner-image{
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
</style>
@section('content')
    <!-- Linking -->
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('shop') }}">Book Store</a></li>
                <li class="active">{{ $book->title }}</li>
            </ol>
        </div>
    </div>

    <!-- Content -->
    <div id="content">
        <section class="">
            <div class="text-center">
                <img class="banner-image" src="{{ asset($book->cover) }}" alt="" width="100%">
            </div>
        </section>
        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">

            <div class="container">
                <div class="row mt-200">
                    <!-- Products -->
                    <div class="col-md-12">
                        <div class="product-detail">
                            <div class="product">
                                <div class="row">
                                    <!-- Slider Thumb -->
                                    <div class="col-xs-4 avatar">
                                        <div class="main_avatar">
                                            <img src="{{ asset($book->hero_image) }}" alt="" width="300">
                                        </div>
                                    </div>
                                    <!-- Item Content -->
                                    <div class="col-xs-8 mt-20 details">
                                        <a href="author_details_page.php"><span class="tags">By: {{ $author->name }}</span></a>
                                        <h5>{{ $book->title }}</h5>
                                        <p class="rev">
                                            @if($data['rate'] < 5)
                                                @for($i = 0; $i < $data['rate']; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                @for($i = 0; $i < 5 - $data['rate']; $i++)
                                                    <i class="fa fa-star-o"></i>
                                                @endfor
                                            @else
                                                @for($i = 0; $i < $data['rate']; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            @endif
                                            <span class="margin-left-10">({{ count($reviews) }}) Review(s)</span>
                                        </p>
                                        @if($book->book_purchased <= $book->quantity)
                                        <p>Availability: <span class="in-stock">In stock</span></p>
                                        @else
                                        <p>Availability: <span style="color: red;">Out of Stock</span></p>
                                        @endif
                                        @if($book->is_hardcover) @php $hardPrice = $book->hard_price @endphp @else @php $hardPrice = 0 @endphp @endif
                                        @if($book->is_paperback) @php $paperPrice = $book->paper_price @endphp @else @php $paperPrice = 0 @endphp @endif
                                        @if($book->is_digital) @php $digitalPrice = $book->digital_price @endphp @else @php $digitalPrice = 0 @endphp @endif

                                        <p class="price font-size-22 font-weight-medium mb-3">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span><span class="totalPrice">{{ ($book->price * $currency->exchange_rate) + ($paperPrice * $currency->exchange_rate)}}</span>
                                            </span>
                                        </p>
                                
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="javascript:void(0)"onclick="updatePrice(@if($book->is_hardcover) {{ $book->hard_price * $currency->exchange_rate }} @else 0 @endif, {{ $book->price * $currency->exchange_rate }})">
                                                    <div class="some-cate">
                                                        <input type="hidden" name="extraPrices" value="{{ $hardPrice * $currency->exchange_rate }}" data-type="hardcover">
                                                        <h6>Hardcover</h6>
                                                        <span class="price">{{ $currency->currency_symbol }} {{ $hardPrice * $currency->exchange_rate }} </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="javascript:void(0)" onclick="updatePrice(@if($book->is_paperback) {{ $book->paper_price * $currency->exchange_rate }} @else 0 @endif, {{ $book->price * $currency->exchange_rate }})">
                                                    <div class="some-cate some-cate-active">
                                                        <input type="hidden" name="extraPrices" value="{{ $paperPrice * $currency->exchange_rate }}" data-type="hardcover">
                                                        <h6>Paperback</h6>
                                                        <span class="price">{{ $currency->currency_symbol }} {{ $paperPrice * $currency->exchange_rate }} </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="javascript:void(0)" onclick="updatePrice(@if($book->is_digital) {{ $book->digital_price * $currency->exchange_rate }} @else 0 @endif, {{ $book->price * $currency->exchange_rate }})">
                                                    <div class="some-cate">
                                                        <input type="hidden" name="extraPrices" value="{{ $digitalPrice * $currency->exchange_rate }}" data-type="hardcover">
                                                        <h6>Digital</h6>
                                                        <span class="price">{{ $currency->currency_symbol }} {{ $digitalPrice * $currency->exchange_rate }} </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            <h6>Synopsis</h6>
                                            <li>{{ $book->synopsis }}</li>
                                        </ul>
                                        <!-- Compare Wishlist -->
                                        <ul class="cmp-list">
                                            <li>
                                            @if($wishlist == 0)
                                                <a href="javascript:void(0)" class="addToWishlist" data-id="{{ $book->id }}"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                            @else
                                                <a href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> View Wishlist</a>
                                            @endif
                                            </li>
                                            <li>
                                            @if($is_affiliate != 0)
                                                <li>
                                                    <?php $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                                                    <a href="javascript:void(0)" class="h-primary" onclick="copyToClipboard('#referrelCode')"><i class="fa fa-copy"></i> Copy Referral Link</a>
                                                    <input type="text" value="<?= $url ?>?ref=<?= Auth::user()->code ?>" id="referrelCode" style="position:absolute;left:-1000px;top:-1000px;">
                                                </li>
                                            @endif
                                            </li>
                                            <li>
                                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                                    <a class="addthis_button_facebook"></a>
                                                    <a class="addthis_button_twitter"></a>
                                                    <a class="addthis_button_pinterest_share"></a>
                                                    <a class="addthis_button_more"><i class="fa fa-share-alt fa-2x"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        @if($book->hard_allow_preorders == '' && $book->paper_allow_preorders == '')
                                        <h6>Quantity:</h6>
                                        <div class="product-counter">
                                            <div class="counter-cell cell-addon">
                                                <button class="btns btn-desc">-</button>
                                            </div>
                                            <div class="counter-cell cell-input">
                                                <input type="number" class="counter-value" id="prod_qty" name="quantity" value="1" min="1" max="10">
                                            </div>
                                            <div class="counter-cell cell-addon">
                                                <button class="btns btn-inc counter-cell">+</button>
                                            </div>
                                        </div>
                                        @endif
                                        <br>
                                        <div>
                                        @if($book->book_purchased <= $book->quantity)
                                            @if($book->hard_allow_preorders == 1 || $book->paper_allow_preorders == 1)
                                                <a href="javascript:void(0)" name="add-to-cart" class="btn-round single_add_to_cart_button btn-warning" data-toggle="modal" data-target="#preOrderModalModal" data-is_preorder = "1" data-id="{{ $book->id }}">Pre Order <small>(Pay 10% Upfront)</small></a>
                                                <div class="modal fade" id="preOrderModalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header border-bottom-0">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                            Your Shopping Cart
                                                            </h5>
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
                                                                        <label for="standard">
                                                                        <input type="radio" id="standard" name="delivery" value="standard" checked>
                                                                            Standard
                                                                        </label>
                                                                        <label for="express">
                                                                        <input type="radio" id="express" name="delivery" value="express">
                                                                            Express
                                                                        </label>
                                                                </div>
                                                                    <div class="standardDelivery">
                                                                    <select name="shipping" id="shippingCharges" class="form-control">
                                                                        <option value="" selected disabled data-price="0">---Choose Location</option>
                                                                        @foreach($locations as $location)
                                                                        @if($location->type == 'standard')
                                                                        <option value="{{ $location->location }}" required data-price = "{{ $location->price }}">{{ $location->location }} <small>({{ $currency->currency_symbol }} {{ $location->price * $currency->exchange_rate }})</small></option>
                                                                        @endif
                                                                        @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div style="display: none;" class="expressDelivery">
                                                                    <select name="shipping" id="shippingCharges" class="form-control">
                                                                        <option value="" selected disabled data-price="0">---Choose Location</option>
                                                                        @foreach($locations as $location)
                                                                        @if($location->type == 'express')
                                                                        <option value="{{ $location->location }}" required data-price = "{{ $location->price }}">{{ $location->location }} <small>({{ $currency->currency_symbol }} {{ $location->price * $currency->exchange_rate }})</small></option>
                                                                        @endif
                                                                        @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <label for="precise_location"></label>
                                                                        <input type="text" id="precise_location" class="form-control" required placeholder="Enter precise location">
                                                                    </div>
                                                                    <div>
                                                                        <label for="post_code"></label>
                                                                        <input type="text" id="post_code" name="post_code" class="form-control" placeholder="Ghana Digital Address">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top-0 d-flex text-right">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="javascript:void(0)" data-id="{{ $book->id }}" data-total="{{ $book->price * $currency->exchange_rate }}" class="btn btn-dark proceedToCheckout">Proceed to checkout</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <a href="javascript:void(0)" name="add-to-cart" class="btn-round single_add_to_cart_button addToCart" data-is_preorder = "0" data-id="{{ $book->id }}"  data-user_id="{{ $book->user_id }}"><i class="icon-basket-loaded margin-right-5"></i>Add to cart</a>
                                            @endif
                                        @else
                                            <button type="button" class="btn-round" disabled>Out Of Stock</button>
                                        @endif
                                            <a href="{{ route('cart') }}" class="btn-round">View Cart</a>
                                        </div>

                                        @if($book->hard_expected_shipment != null && $book->hard_expected_shipment > date('Y-m-d'))
                                            <div class="countdown-timer">
                                                <div class="countdown" id="countdown">
                                                    <ul>
                                                        <li><span id="days"></span>days</li>
                                                        <li><span id="hours"></span>Hours</li>
                                                        <li><span id="minutes"></span>Minutes</li>
                                                        <li><span id="seconds"></span>Seconds</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif


                                        <hr>
                                        <div>
                                            <a href="javascript:void(0)" class="btn-round sampleModalModal" data-toggle="modal" data-target="#exampleModal2"><i class="icon-eye margin-right-5"></i> View Book Sample</a>
                                            <a href="javascript:void(0)" class="btn-round TrailerModalModal" data-toggle="modal" data-target="#exampleModal"><i class="icon-eye margin-right-5"></i> View Book Trailer</a>
                                            @if(!Auth::check() && isset($_REQUEST['ref']) && !empty($_REQUEST['ref']))
                                                <?php $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                                                <a href="{{ route('register') }}?ref=<?= $_REQUEST['ref'] ?>&callback=<?= $url ?>?ref=<?= $_REQUEST['ref'] ?>" class="btn-round">Register Now</a>
                                            @endif
                                        </div>

                                        <br>
                                        <!-- trailer Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center text-success" id="exampleModalLabel">Book Trailer</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="sampleIframeHere"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- preview Modal -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center text-success" id="exampleModalLabel">Book Preview</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="sampleIframeHere"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details Tab Section-->
                            <div class="item-tabs-sec">
                                <!-- Nav tabs -->
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a href="#pro-detil" role="tab" data-toggle="tab">Product Details</a></li>
                                    <li role="presentation"><a href="#author" role="tab" data-toggle="tab">Formatting</a></li>
                                    <li role="presentation"><a href="#cus-rev" role="tab" data-toggle="tab">Customer Review </a></li>
                                    <li role="presentation"><a href="#marketer-rev" role="tab" data-toggle="tab">Marketer Review </a></li>
                                    <li role="presentation"><a href="#all-rev" role="tab" data-toggle="tab">All Reviews </a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            <li><b>Format:</b> 
                                                @if($book->is_paperback)
                                                    Paperback
                                                @elseif($book->is_hardcover)
                                                    Hardcover
                                                @elseif($book->is_digital)
                                                    Digital
                                                @endif
                                            </li>
                                            <li><b>Publisher:</b>
                                                {{ $book->publisher }}
                                            </li>
                                            <li><b>Language:</b> English</li>
                                            <li><b>Publication Date
                                                    :</b>
                                                {{ date("F j, Y, g:i a",strtotime($book->publication_date));  }}</li>
                                            <li><b>ISBN:</b> 
                                                @if($book->is_paperback)
                                                    {{ $book->paper_isbn }}
                                                @elseif($book->is_hardcover)
                                                    {{ $book->hard_isbn }}
                                                @elseif($book->is_digital)
                                                    {{ $book->digital_isbn }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="author">
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
                                    <div role="tabpanel" class="tab-pane fade" id="cus-rev">
                                        <div class="containers">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="chart">
                                                        <h6>Select a rating (required)</h6>
                                                        <div class="rate-box">
                                                            <span class="value">5</span>
                                                            <div class="progress-bar">
                                                                <span class="progress"></span>
                                                            </div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">4</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">3</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">2</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">1</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="global mt-35">
                                                        <span class="global-value">0.0</span>
                                                        <br><br>
                                                        <div class="rating-icons rating-component">
                                                            <span class="one stars-box">
                                                                <i class="star fa fa-star" data-value="1"></i>
                                                                <i class="star fa fa-star" data-value="2"></i>
                                                                <i class="star fa fa-star" data-value="3"></i>
                                                                <i class="star fa fa-star" data-value="4"></i>
                                                                <i class="star fa fa-star" data-value="5"></i>
                                                            </span>
                                                        </div>
                                                        <span class="total-reviews">0</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mt-10">
                                                        <br>
                                                        <h6>Write a Review</h6>
                                                        <form id="customer_reviews" action="{{ route('add-review') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group mb-5">
                                                                <label for="title" class="form-label text-dark h6 mb-3">Add a title</label>
                                                                <input type="text" class="form-control rounded-0 px-4" required name="title" id="title" placeholder="Add title">
                                                            </div>
                                                            <textarea class="form-control" name="comment" required id="descriptionTextarea" rows="5" placeholder="What did you like or dislike? What should other shoppers know before buying?"></textarea>
                                                            <br>
                                                            <div class="starrate">
                                                                <label>
                                                                    <input class="ratevalue" type="hidden" name="rate" value=""/>
                                                                    <input type="hidden" name="type" value="general"/>
                                                                    <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                                                                </label>
                                                            </div>
                                                            <button type="submit" class="btn-round">Submit</button> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="marketer-rev">
                                        <div class="containers">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="chart">
                                                        <h6>Select a rating (required)</h6>
                                                        <div class="rate-box">
                                                            <span class="value">5</span>
                                                            <div class="progress-bar">
                                                                <span class="progress"></span>
                                                            </div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">4</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">3</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">2</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">1</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="global mt-35">
                                                        <span class="global-value">0.0</span>
                                                        <br><br>
                                                        <div class="rating-icons rating-component">
                                                            <span class="one stars-box">
                                                                <i class="star fa fa-star" data-value="1"></i>
                                                                <i class="star fa fa-star" data-value="2"></i>
                                                                <i class="star fa fa-star" data-value="3"></i>
                                                                <i class="star fa fa-star" data-value="4"></i>
                                                                <i class="star fa fa-star" data-value="5"></i>
                                                            </span>
                                                        </div>
                                                        <span class="total-reviews">0</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mt-10">
                                                        <br>
                                                        <h6>Write a Review</h6>
                                                        <form id="marketer_reviews" action="{{ route('add-review') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group mb-5">
                                                                <label for="title" class="form-label text-dark h6 mb-3">Add a title</label>
                                                                <input type="text" class="form-control rounded-0 px-4" required name="title" id="title" placeholder="Add title">
                                                            </div>
                                                            <textarea class="form-control" name="comment" required id="descriptionTextarea" rows="5" placeholder="What did you like or dislike? What should other shoppers know before buying?"></textarea>
                                                            <br>
                                                            <div class="starrate">
                                                                <label>
                                                                    <input class="ratevalue" type="hidden" name="rate" value=""/>
                                                                    <input type="hidden" name="type" value="marketer"/>
                                                                    <input type="hidden" name="book_id" value="{{ $book->id }}"/>
                                                                </label>
                                                            </div>
                                                            <button type="submit" class="btn-round">Submit</button> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="all-rev">
                                        <section id="testimonials">
                                            <!--testimonials-box-container------>
                                            <div class="testimonial-box-container">
                                            @forelse($reviews as $review)
                                                @if($review->type == 'marketer')
                                                    <div class="testimonial-box">
                                                        <!--top------------------------->
                                                        <div class="box-top">
                                                            <!--profile----->
                                                            <div class="profile">
                                                                <!--img---->
                                                                <div class="profile-img">
                                                                    <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                                                                </div>
                                                                <!--name-and-username-->
                                                                <div class="name-user">
                                                                    <strong>{{ $review->title }}</strong>
                                                                    <span>{{ date("F j, Y, g:i a",strtotime($review->created_at)); }}</span>
                                                                </div>
                                                            </div>
                                                            <!--reviews------>
                                                            <div class="reviews">
                                                                @if($review->rate < 5)
                                                                    @for($i = 0; $i < $review->rate; $i++)
                                                                        <small class="fa fa-star"></small>
                                                                    @endfor
                                                                    @for($i = 0; $i < 5 - $review->rate; $i++)
                                                                        <small class="fa fa-star-o"></small>
                                                                    @endfor
                                                                @else
                                                                    @for($i = 0; $i < $review->rate; $i++)
                                                                        <small class="fa fa-star"></small>
                                                                    @endfor
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--Comments---------------------------------------->
                                                        <div class="client-comment">
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                @empty
                                            @endforelse
                                            @forelse($reviews as $review)
                                                @if($review->type == 'general')
                                                    <div class="testimonial-box">
                                                        <!--top------------------------->
                                                        <div class="box-top">
                                                            <!--profile----->
                                                            <div class="profile">
                                                                <!--img---->
                                                                <div class="profile-img">
                                                                    <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                                                                </div>
                                                                <!--name-and-username-->
                                                                <div class="name-user">
                                                                    <strong>{{ $review->title }}</strong>
                                                                    <span>{{ date("F j, Y, g:i a",strtotime($review->created_at)); }}</span>
                                                                </div>
                                                            </div>
                                                            <!--reviews------>
                                                            <div class="reviews">
                                                                @if($review->rate < 5)
                                                                    @for($i = 0; $i < $review->rate; $i++)
                                                                        <small class="fa fa-star"></small>
                                                                    @endfor
                                                                    @for($i = 0; $i < 5 - $review->rate; $i++)
                                                                        <small class="fa fa-star-o"></small>
                                                                    @endfor
                                                                @else
                                                                    @for($i = 0; $i < $review->rate; $i++)
                                                                        <small class="fa fa-star"></small>
                                                                    @endfor
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--Comments---------------------------------------->
                                                        <div class="client-comment">
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                @empty
                                            @endforelse
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Your Recently Viewed Items -->
        <section class="padding-bottom-60">
            <div class="container">

                <!-- heading -->
                <div class="heading">
                    <h2>Featured Items For You</h2>
                    <hr>
                </div>
                <!-- Items Slider -->
                <div class="item-slide-5 with-nav">
                @forelse($featured as $book)
                    <div class="product">
                        <article> 
                            <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                            @if($book->is_new)
                            <span class="new-tag">New</span>
                            @endif
                            <span class="tag">
                            @if($book->role != 'admin')
                            <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                            @else 
                            <a href="javascript:void(0)">{{ $book->name }}</a>
                            @endif
                            (
                            @if($book->is_paperback)
                                Paperback
                            @elseif($book->is_hardcover)
                                Hardcover
                            @elseif($book->is_digital)
                                Digital
                            @endif
                            )
                            </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ $book->title }}</a> 
                            <p class="rev">
                            @if($book->total_reviews != 0)
                                @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                            @else
                                @php $avg_rating = 0; @endphp
                            @endif

                            @if($avg_rating < 5)
                                @for($i = 0; $i < $avg_rating; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                @for($i = 0; $i < 5 - $avg_rating; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            @else
                                @for($i = 0; $i < $avg_rating; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif

                            <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                            <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                            <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                        </article>
                    </div>
                @empty
                @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        function copyToClipboard(element) {
            $(element).select();
            document.execCommand("copy");
            $.notify('Referral code copied','success');
        }
        $(document).ready(function(){
            // $('#cartModal').modal('show');
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
            $('.description-link').on('click',function(){
                $('html, body').animate({
                    scrollTop: $(".description").offset().top
                }, 1000);
            })
            $('.some-cate').on('click',function(){
                $('.some-cate').removeClass('some-cate-active');
                $(this).addClass('some-cate-active');
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
            $('.sampleModalModal').on('click',function(){
                $('.sampleIframeHere').html('<iframe width="100%" height="400px" src="<?= asset($book->sample) ?>"></iframe>');
            });
            $('.TrailerModalModal').on('click',function(){
                $('.sampleIframeHere').html('<iframe width="100%" height="400px" src="<?= asset($book->trailer) ?>"></iframe>');
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
                var extraPrice = $(".some-cate-active input[name='extraPrices']").val();
                var extraType = $(".some-cate-active input[name='extraPrices']").data('type');
                var bookPrice = <?php echo $book->price * $currency->exchange_rate ?>;
                var title = "<?php echo $book->title ?>";
                var image = "{{ asset($book->cover) }}";
                var author_id = $(this).data('user_id');
                var currency = "<?= $currency->currency_code ?>";
                var exchange_rate = "<?= $currency->exchange_rate ?>";
                var ref = "<?php if(isset($_REQUEST['ref']) && !empty($_REQUEST['ref'])){echo $_REQUEST['ref'];}else{echo '';} ?>";
                
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
                        is_preorder : is_preorder,
                        author_id : author_id,
                        exchange_rate : exchange_rate,
                        currency : currency,
                        ref : ref
                    },
                    success : function(data){
                        $('body .cartItemsLength').html(data.cartLength);
                        $.notify(data.message, data.type);
                    }
                });
            });

            $(document).on('click','.proceedToCheckout',function(){
                var shippingCharges = $('#shippingCharges option:selected').val();
                var shippingPrice = $('#shippingCharges option:selected').data('price');
                var preciseLocation = $('#precise_location').val();
                var postCode = $('#post_code').val();
                var userId = "{{ Auth::id() }}";
                var bookId = "{{ $book->id }}";
                var totalPrice = $(this).data('total');
                var subTotal = $(".some-cate-active input[name='extraPrices']").val();
                var extraPrice = $(".some-cate-active input[name='extraPrices']").val();
                var extraType = $(".some-cate-active input[name='extraPrices']").val();
                if(shippingCharges == ''){
                    $.notify('Please choose location');
                    return false;
                } else if(preciseLocation == ''){
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
                            shippingCharges : shippingCharges,
                            shippingPrice : shippingPrice
                        },
                        success : function(data){
                            location.href = "{{ route('checkout') }}?token="+data+"&ref=<?php if(isset($_REQUEST['ref']) && !empty($_REQUEST['ref'])){echo $_REQUEST['ref'];}else{echo '';} ?>&is_preorder=1";
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
                    
                    $('#days').html(Math.floor(distance / (day)));
                    $('#hours').html(Math.floor((distance % (day)) / (hour)));
                    $('#minutes').html(Math.floor((distance % (hour)) / (minute)));
                    $('#seconds').html(Math.floor((distance % (minute)) / second));
                    
                    if (distance < 0) {
                        clearInterval(x);
                    }
                }, 0)
            }());
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
@endsection