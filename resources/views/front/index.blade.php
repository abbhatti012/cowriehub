<style>
    .outCampaign{
        display: none;
    }
    .bgimg {
        height: 30%;
        background-position: center;
        background-size: cover;
        position: relative;
        font-size: 25px;
    }
    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }
    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }
    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    hr {
        margin: auto;
        width: 40%;
    }
    .deals-of-the-week{
        height: 300px !important;
    }
</style>
@extends('front.layout.index')
@section('content')

    <section class="space-bottom-3">
        <div class="bg-gray-200 space-2 space-lg-0 bg-img-hero" style="background-image: url(../../assets/img/1920x588/img1.jpg);">
            <div class="container">
                <div class="js-slick-carousel u-slick" data-pagi-classes="text-center u-slick__pagination position-absolute right-0 left-0 mb-n8 mb-lg-4 bottom-0">
                    @foreach($data['banners'] as $banner)
                        <div class="js-slide">
                            <div class="hero row min-height-588 align-items-center">
                                <div class="col-lg-7 col-wd-6 mb-4 mb-lg-0">
                                    <div class="media-body mr-wd-4 align-self-center mb-4 mb-md-0">
                                        <p class="hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">{{ $banner->type }}</p>
                                        <h2 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                            <span class="hero__title-line-1 font-weight-regular d-block">{{ $banner->title }}</span>
                                            <span class="hero__title-line-2 font-weight-bold d-block">{{ $banner->month }}</span>
                                        </h2>
                                        <a href="{{ route('shop') }}" class="btn btn-dark btn-wide rounded-0 hero__btn" data-scs-animation-in="fadeInLeft" data-scs-animation-delay="400">See More</a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-wd-6" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                    <img class="img-fluid" src="{{ asset($banner->banner) }}" alt="800x420">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Featured Categories</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">All Categories <i class="glyph-icon flaticon-next"></i></a>
            </header>
            <ul class="list-unstyled my-0 row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-wd-5">
                @foreach($data['genres'] as $genre)
                <li class="product-category col mb-4 mb-xl-0">
                    <div class="product-category__inner bg-indigo-light px-6 py-5">
                        <div class="product-category__icon font-size-12 text-primary-indigo"><i class="fas fa-atom"></i></div>
                        <div class="product-category__body">
                            <h3 class="text-truncate font-size-3">{{ $genre->title }}</h3>
                            <a href="{{ route('shop') }}" class="stretched-link text-dark">Shop Now</a>
                        </div>
                    </div>
                </li>
               @endforeach
            </ul>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Bestselling Books</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>

            <div class="js-slick-carousel products no-gutters border-top border-left border-right" data-pagi-classes="d-xl-none text-center position-absolute right-0 left-0 u-slick__pagination mt-4 mb-0" data-arrows-classes="d-none d-xl-block u-slick__arrow u-slick__arrow-centered--y"
                data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-slides-show="5" data-responsive='[{
                   "breakpoint": 1500,
                   "settings": {
                     "slidesToShow": 4
                   }
                },{
                   "breakpoint": 1199,
                   "settings": {
                     "slidesToShow": 3
                   }
                },{
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 2
                   }
                }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 1
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                @forelse($data['best_selling'] as $book)
                <div class="product">
                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                        <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{asset($book->hero_image)}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid common-card-image" alt="{{ $book->title }}"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                    @if($book->is_paperback)
                                        Paperback
                                    @elseif($book->is_hardcover)
                                        , Hardcover
                                    @elseif($book->is_digital)
                                        , Digital
                                    @endif
                                </a></div>
                                <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                <div class="font-size-2  mb-1 text-truncate">
                                    @if($book->role != 'admin')
                                        <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                    @else
                                        <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                    @endif
                                    
                                    @if($book->total_reviews != 0)
                                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                    @else
                                        @php $avg_rating = 0; @endphp
                                    @endif
                                    <span class="text-yellow-darker">
                                    @if($avg_rating < 5)
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                                            <small class="far fa-star"></small>
                                        @endfor
                                    @else
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                    @endif
                                    </span>
                                </div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                </a>
                                <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-switch"></i>
                                </a> -->
                                <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Marketer Picks</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>

            <div class="js-slick-carousel products no-gutters border-top border-left border-right" data-pagi-classes="d-xl-none text-center position-absolute right-0 left-0 u-slick__pagination mt-4 mb-0" data-arrows-classes="d-none d-xl-block u-slick__arrow u-slick__arrow-centered--y"
                data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-slides-show="5" data-responsive='[{
                   "breakpoint": 1500,
                   "settings": {
                     "slidesToShow": 4
                   }
                },{
                   "breakpoint": 1199,
                   "settings": {
                     "slidesToShow": 3
                   }
                },{
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 2
                   }
                }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 1
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                @forelse($data['marketer_picks'] as $book)
                <div class="product">
                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                        <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{asset($book->hero_image)}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid common-card-image" alt="{{ $book->title }}"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                    @if($book->is_paperback)
                                        Paperback
                                    @elseif($book->is_hardcover)
                                        , Hardcover
                                    @elseif($book->is_digital)
                                        , Digital
                                    @endif
                                </a></div>
                                <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                <div class="font-size-2  mb-1 text-truncate">
                                    @if($book->role != 'admin')
                                        <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                    @else
                                        <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                    @endif
                                    
                                    @if($book->total_reviews != 0)
                                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                    @else
                                        @php $avg_rating = 0; @endphp
                                    @endif
                                    <span class="text-yellow-darker">
                                    @if($avg_rating < 5)
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                                            <small class="far fa-star"></small>
                                        @endfor
                                    @else
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                    @endif
                                    </span>
                                </div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                </a>
                                <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-switch"></i>
                                </a> -->
                                <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Pro-Order Books</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>

            <div class="js-slick-carousel products no-gutters border-top border-left border-right" data-pagi-classes="d-xl-none text-center position-absolute right-0 left-0 u-slick__pagination mt-4 mb-0" data-arrows-classes="d-none d-xl-block u-slick__arrow u-slick__arrow-centered--y"
                data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-slides-show="5" data-responsive='[{
                   "breakpoint": 1500,
                   "settings": {
                     "slidesToShow": 4
                   }
                },{
                   "breakpoint": 1199,
                   "settings": {
                     "slidesToShow": 3
                   }
                },{
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 2
                   }
                }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 1
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                @forelse($data['preorder'] as $book)
                <div class="product">
                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                        <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                            <div class="woocommerce-loop-product__thumbnail">
                                <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{asset($book->hero_image)}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid common-card-image" alt="{{ $book->title }}"></a>
                            </div>
                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                    @if($book->is_paperback)
                                        Paperback
                                    @elseif($book->is_hardcover)
                                        , Hardcover
                                    @elseif($book->is_digital)
                                        , Digital
                                    @endif
                                </a></div>
                                <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                <div class="font-size-2  mb-1 text-truncate">
                                    @if($book->role != 'admin')
                                        <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                    @else
                                        <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                    @endif
                                    
                                    @if($book->total_reviews != 0)
                                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                    @else
                                        @php $avg_rating = 0; @endphp
                                    @endif
                                    <span class="text-yellow-darker">
                                    @if($avg_rating < 5)
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                                            <small class="far fa-star"></small>
                                        @endfor
                                    @else
                                        @for($i = 0; $i < $avg_rating; $i++)
                                            <small class="fas fa-star"></small>
                                        @endfor
                                    @endif
                                    </span>
                                </div>
                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                </div>
                            </div>
                            <div class="product__hover d-flex align-items-center">
                                <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                    <span class="product__add-to-cart">ADD TO CART</span>
                                    <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                </a>
                                <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-switch"></i>
                                </a> -->
                                <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <header class="mb-4 container">
            <h2 class="font-size-7 text-center">Featured Books</h2>
        </header>
        <div class="container">
            <ul class="nav justify-content-md-center nav-gray-700 mb-5 flex-nowrap flex-md-wrap overflow-auto overflow-md-visible" id="featuredBooks" role="tablist">
                <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link px-0 active" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">Featured</a>
                </li>
                <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link px-0" id="onsale-tab" data-toggle="tab" href="#onsale" role="tab" aria-controls="onsale" aria-selected="false">On Sale</a>
                </li>
                <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link px-0" id="mostviewed-tab" data-toggle="tab" href="#mostviewed" role="tab" aria-controls="mostviewed" aria-selected="false">Most Viewed</a>
                </li>
            </ul>
            <div class="tab-content" id="featuredBooksContent">
                <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                    <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                        @forelse($data['featured'] as $book)
                        <li class="product col">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                            @if($book->is_paperback)
                                                Paperback
                                            @elseif($book->is_hardcover)
                                                , Hardcover
                                            @elseif($book->is_digital)
                                                , Digital
                                            @endif
                                        </a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate">
                                            @if($book->role != 'admin')
                                                <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                            @else
                                                <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                            @endif

                                            @if($book->total_reviews != 0)
                                                @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                            @else
                                                @php $avg_rating = 0; @endphp
                                            @endif
                                            <span class="text-yellow-darker">
                                            @if($avg_rating < 5)
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                                @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                    <small class="far fa-star"></small>
                                                @endfor
                                            @else
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                            @endif
                                            </span>

                                        </div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-switch"></i>
                                        </a> -->
                                        <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="tab-pane fade" id="onsale" role="tabpanel" aria-labelledby="onsale-tab">
                    <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                    @forelse($data['sales'] as $book)
                        <li class="product col">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                            @if($book->is_paperback)
                                                Paperback
                                            @elseif($book->is_hardcover)
                                                , Hardcover
                                            @elseif($book->is_digital)
                                                , Digital
                                            @endif
                                        </a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate">
                                            @if($book->role != 'admin')
                                                <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                            @else
                                                <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                            @endif

                                            @if($book->total_reviews != 0)
                                                @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                            @else
                                                @php $avg_rating = 0; @endphp
                                            @endif
                                            <span class="text-yellow-darker">
                                            @if($avg_rating < 5)
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                                @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                    <small class="far fa-star"></small>
                                                @endfor
                                            @else
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                            @endif
                                            </span>

                                        </div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-switch"></i>
                                        </a> -->
                                        <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="tab-pane fade" id="mostviewed" role="tabpanel" aria-labelledby="mostviewed-tab">
                    <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                    @forelse($data['viewed'] as $book)
                        <li class="product col">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                            @if($book->is_paperback)
                                                Paperback
                                            @elseif($book->is_hardcover)
                                                , Hardcover
                                            @elseif($book->is_digital)
                                                , Digital
                                            @endif
                                        </a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate">
                                            @if($book->role != 'admin')
                                                <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                            @else
                                                <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                            @endif

                                            @if($book->total_reviews != 0)
                                                @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                            @else
                                                @php $avg_rating = 0; @endphp
                                            @endif
                                            <span class="text-yellow-darker">
                                            @if($avg_rating < 5)
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                                @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                    <small class="far fa-star"></small>
                                                @endfor
                                            @else
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                            @endif
                                            </span>

                                        </div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-switch"></i>
                                        </a> -->
                                        <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="space-top-3 space-bottom-4 bg-gray-200">
            <div class="container inCampaign">
                <header class="mb-5 d-md-flex justify-content-between align-items-center">
                    <h2 class="font-size-7 mb-3 mb-md-0">Deals of the Week</h2>
                    <a href="#" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
                </header>
                <div class="js-slick-carousel u-slick products border bg-white no-gutters" data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
                    data-pagi-classes="text-center u-slick__pagination u-slick__pagination mt-6 mb-0 position-absolute right-0 left-0" data-slides-show="2" data-responsive='[{
                       "breakpoint": 1199,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }, {
                       "breakpoint": 768,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }, {
                       "breakpoint": 554,
                       "settings": {
                         "slidesToShow": 1
                       }
                    }]'>
                    @foreach($data['campaign'] as $book)
                    <div class="product product__card border-right">
                        <div class="media p-md-6 p-4 d-block d-md-flex">
                            <div class="woocommerce-loop-product__thumbnail mb-4 mb-md-0">
                                <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="deals-of-the-week attachment-shop_catalog size-shop_catalog wp-post-image d-block mx-auto" alt="image-description"></a>
                            </div>
                            <div class="woocommerce-loop-product__body media-body ml-md-5d25">
                                <div class="mb-3">
                                    <h2 class="woocommerce-loop-product__title font-size-3 text-lh-md mb-2 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                    <div class="font-size-2 text-gray-700 mb-1 text-truncate">
                                        @if($book->role != 'admin')
                                            <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                        @else
                                            <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                        @endif

                                        @if($book->total_reviews != 0)
                                            @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                        @else
                                            @php $avg_rating = 0; @endphp
                                        @endif
                                        <span class="text-yellow-darker">
                                        @if($avg_rating < 5)
                                            @for($i = 0; $i < $avg_rating; $i++)
                                                <small class="fas fa-star"></small>
                                            @endfor
                                            @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                <small class="far fa-star"></small>
                                            @endfor
                                        @else
                                            @for($i = 0; $i < $avg_rating; $i++)
                                                <small class="fas fa-star"></small>
                                            @endfor
                                        @endif
                                        </span>

                                    </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <ins class="text-decoration-none mr-2"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span></ins>
                                        <del class="font-size-1 font-weight-regular text-gray-700"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">GHS</span>{{ $book->old_price }}</span></del>
                                    </div>
                                </div>
                                <div class="countdown-timer mb-5">
                                    <h5 class="countdown-timer__title font-size-3 mb-3 font-weight-bold">Hurry Up! <span class="font-weight-regular">Offer ends in:</span></h5>
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
                                <div class="deal-progress">
                                    <div class="d-flex justify-content-between font-size-2 mb-2d75">
                                        <span>Already Sold: 14</span>
                                        <!-- <span>Available: 3</span> -->
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:82%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="17"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container outCampaign">
                <header class="mb-5 d-md-flex justify-content-between align-items-center">
                    <h2 class="font-size-7 mb-3 mb-md-0">Deals of the Week</h2>
                </header>
                <div class="bgimg">
                    
                    <div class="middle">
                        <h1>COMING SOON</h1>
                        <hr>
                        <p>10 days left</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-3 banner-with-product">
        <div class="container">
            <!-- <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">New Releases</h2>
                <ul class="nav nav-gray-700 flex-nowrap flex-md-wrap overflow-auto overflow-md-visible" role="tablist">
                    <li class="nav-item mx-4 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link pb-1 px-0 active" id="history-tab" data-toggle="tab" href="#history-1" role="tab" aria-controls="history-1" aria-selected="true">History</a>
                    </li>
                    <li class="nav-item mx-4 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link pb-1 px-0" id="sciencemath-tab" data-toggle="tab" href="#sciencemath-1" role="tab" aria-controls="sciencemath-1" aria-selected="false">Science &amp; Math</a>
                    </li>
                    <li class="nav-item mx-4 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link pb-1 px-0" id="romance-tab" data-toggle="tab" href="#romance-1" role="tab" aria-controls="romance-1" aria-selected="false">Romance</a>
                    </li>
                    <li class="nav-item ml-4 flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link pb-1 px-0" id="travel-tab" data-toggle="tab" href="#travel-1" role="tab" aria-controls="travel-1" aria-selected="false">Travel</a>
                    </li>
                </ul>
            </header> -->
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">New Release</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>
            <div class="tab-content u-slick__tab">
                <div class="tab-pane fade show active" id="history-1" role="tabpanel" aria-labelledby="history-tab">
                    <div class="row no-gutters">
                        <div class="col-xl-4 border-right-0 border bg-gray-200 px-1">
                            <div class="banner px-lg-8 px-3 py-4 py-xl-0 d-flex h-100 align-items-center justify-content-center">
                                <div class="banner__body">
                                   
                                    <h3 class="banner_text m-0">
                                        <span class="d-block mb-1 font-size-10 font-weight-regular">Get Extra</span>
                                        <span class="d-block mb-3 font-size-12 text-primary font-weight-medium">Sale -25%</span>
                                        <span class="d-block mb-5 text-uppercase font-size-7 font-weight-regular text-gray-400">On Order Over $100</span>
                                    </h3>
                                    <a href="{{ route('shop') }}" class="btn btn-primary btn-wide rounded-0">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-wd-4 border-top border-left my-0">
                            @forelse($data['new_release'] as $book)
                                <li class="product col">
                                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                        <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                            <div class="woocommerce-loop-product__thumbnail">
                                                <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                            </div>
                                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">
                                                    @if($book->is_paperback)
                                                        Paperback
                                                    @elseif($book->is_hardcover)
                                                        , Hardcover
                                                    @elseif($book->is_digital)
                                                        , Digital
                                                    @endif
                                                </a></div>
                                                <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a></h2>
                                                <div class="font-size-2  mb-1 text-truncate">
                                                    @if($book->role != 'admin')
                                                        <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                                    @else
                                                        <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                                    @endif

                                                    @if($book->total_reviews != 0)
                                                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                                    @else
                                                        @php $avg_rating = 0; @endphp
                                                    @endif
                                                    <span class="text-yellow-darker">
                                                    @if($avg_rating < 5)
                                                        @for($i = 0; $i < $avg_rating; $i++)
                                                            <small class="fas fa-star"></small>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                            <small class="far fa-star"></small>
                                                        @endfor
                                                    @else
                                                        @for($i = 0; $i < $avg_rating; $i++)
                                                            <small class="fas fa-star"></small>
                                                        @endfor
                                                    @endif
                                                    </span>

                                                </div>
                                                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                                                </div>
                                            </div>
                                            <div class="product__hover d-flex align-items-center">
                                                <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                                    <span class="product__add-to-cart">ADD TO CART</span>
                                                    <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                </a>
                                                <!-- <a href="javascript:void(0)" class="addToCompare mr-1 h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                                    <i class="flaticon-switch"></i>
                                                </a> -->
                                                <a href="javascript:void(0)" class="addToWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->book_id }}">
                                                    <i class="flaticon-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Biographies Books</h2>
                <a href="{{ route('shop') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>
            <div class="js-slick-carousel u-slick products border" data-pagi-classes="text-center u-slick__pagination mt-md-8 mt-4 position-absolute right-0 left-0" data-slides-show="3" data-responsive='[{
                   "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 2
                   }
                }, {
                   "breakpoint": 768,
                   "settings": {
                     "slidesToShow": 1
                   }
                }, {
                   "breakpoint": 554,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                @forelse($data['biographies'] as $book)
                <div class="product product__card border-right">
                    <div class="media p-3 p-md-4d875">
                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img class="common-card-image" src="{{ asset($book->hero_image) }}" alt="{{ $book->title }}"></a>
                        <div class="media-body ml-4d875">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}">Hard Cover</a></div>
                            <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', $book->author_id) }}">{{ $book->title }}</a></h2>
                            <div class="font-size-2 mb-1 text-truncate">
                                @if($book->role != 'admin')
                                    <a href="{{ route('author-detail', $book->author_id) }}" class="text-gray-700">{{ $book->name }}</a>
                                @else
                                    <a href="javascript:void(0)" class="text-gray-700">{{ $book->name }}</a>
                                @endif

                                @if($book->total_reviews != 0)
                                    @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                @else
                                    @php $avg_rating = 0; @endphp
                                @endif
                                <span class="text-yellow-darker">
                                @if($avg_rating < 5)
                                    @for($i = 0; $i < $avg_rating; $i++)
                                        <small class="fas fa-star"></small>
                                    @endfor
                                    @for($i = 0; $i < 5 - $avg_rating; $i++)
                                        <small class="far fa-star"></small>
                                    @endfor
                                @else
                                    @for($i = 0; $i < $avg_rating; $i++)
                                        <small class="fas fa-star"></small>
                                    @endfor
                                @endif
                                </span>

                            </div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
               @endforelse
            </div>
        </div>
    </section>
    <section class="space-bottom-3">
        <div class="container">
            <header class="d-md-flex justify-content-between align-items-center mb-8">
                <h2 class="font-size-7 mb-3 mb-md-0">Favorite Authors</h2>
                <a href="{{ route('authors-list') }}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
            </header>
            <ul class="row rows-cols-5 no-gutters authors list-unstyled js-slick-carousel u-slick" data-slides-show="5" data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10"
                data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-responsive='[{
                    "breakpoint": 1025,
                    "settings": {
                        "slidesToShow": 3
                    }
                }, {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                }, {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 1
                    }
                }, {
                    "breakpoint": 554,
                    "settings": {
                        "slidesToShow": 1
                    }
                }]'>
                @forelse($data['authors'] as $author)
                <li class="author col">
                    <a href="{{ route('author-detail', $author->id) }}" class="text-reset">
                        <img src="{{ asset($author->profile) }}" class="author-img mx-auto mb-5 d-block rounded-circle" alt="{{ $author->name }}">
                        <div class="author__body text-center">
                            <h2 class="author__name h6 mb-0">{{ $author->name }}</h2>
                            <div class="text-gray-700 font-size-2">{{ count($author->books_published) }} Published Books</div>
                        </div>
                    </a>
                </li>
                @empty
                @endforelse
                
            </ul>
        </div>
    </section>
    <!-- ====== END MAIN CONTENT ====== -->
@endsection
@section('scripts') 
    <script>
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            var end_date = "<?= $data['setting']->start_date ?>";
            let today = new Date(end_date),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "<?= $data['setting']->end_date ?>",
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
                        $('.outCampaign').css('display','block');
                        $('.inCampaign').css('display','none');
                        clearInterval(x);
                    }
                }, 0)
            }());
    </script>
@endsection