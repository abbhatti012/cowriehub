@extends('front.layout.index')
<style>
    .author-cover-image{
        width: 1350px;
        height: 500px;
        object-fit: cover;
    }
</style>
@section('content')
<main id="content">
        <div class="space-bottom-2 space-bottom-lg-3">
            <div class="pb-lg-1">
                <div class="page-header border-bottom">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center py-4">
                            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Authors</h1>
                            <nav class="woocommerce-breadcrumb font-size-2">
                                <a href="{{ url('/') }}" class="h-primary">Home</a>
                                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                                <span>Authors Detail</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <img class="author-cover-image" src="https://cowriehub.s3.amazonaws.com/sliders/a072ea80-1fc9-4c57-b364-ba99425ad866.png" alt="">
                <section class="space-bottom-2 space-bottom-lg-3">
                    <div class="bg-gray-200 space-bottom-2 space-bottom-md-0">
                        <div class="container space-top-2 space-top-wd-3 px-3">
                            <div class="row">
                                <div class="col-lg-4 col-wd-3 d-flex">
                                    <img class="img-fluid mb-5 mb-lg-0 mt-auto" src="{{ asset('assets/img/books/400x759.jpg') }}" alt="Image-Description">
                                </div>
                                <div class="col-lg-8 col-wd-9">
                                    <div class="mb-8">
                                        <span class="text-gray-400 font-size-2">AUTHOR OF THE MONTH</span>
                                        <h6 class="font-size-7 ont-weight-medium mt-2 mb-3 pb-1">
                                            Jessica Simpson
                                        </h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                    <ul class="products list-unstyled row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-wd-4 my-0 mb-md-8 mb-wd-12">
                                        <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                    <div class="woocommerce-loop-product__thumbnail">
                                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/120x180.jpg') }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                    </div>
                                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover d-flex align-items-center">
                                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                            <span class="product__add-to-cart">ADD TO CART</span>
                                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg" tabindex="0">
                                                            <i class="flaticon-switch"></i>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="h-p-bg" tabindex="0">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                    <div class="woocommerce-loop-product__thumbnail">
                                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/120x180.jpg') }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                    </div>
                                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover d-flex align-items-center">
                                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                            <span class="product__add-to-cart">ADD TO CART</span>
                                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg" tabindex="0">
                                                            <i class="flaticon-switch"></i>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="h-p-bg" tabindex="0">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                    <div class="woocommerce-loop-product__thumbnail">
                                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/120x180.jpg') }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                    </div>
                                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover d-flex align-items-center">
                                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                            <span class="product__add-to-cart">ADD TO CART</span>
                                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg" tabindex="0">
                                                            <i class="flaticon-switch"></i>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="h-p-bg" tabindex="0">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-md-none d-wd-block product product__no-border col border-0 mb-2 mb-lg-0">
                                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                    <div class="woocommerce-loop-product__thumbnail">
                                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/120x180.jpg') }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                    </div>
                                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover d-flex align-items-center">
                                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                            <span class="product__add-to-cart">ADD TO CART</span>
                                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg" tabindex="0">
                                                            <i class="flaticon-switch"></i>
                                                        </a>
                                                        <a href="{{ route('product', 4) }}" class="h-p-bg" tabindex="0">
                                                            <i class="flaticon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <header class="mb-5">
                        <h2 class="font-size-7 mb-0">Author's Books</h2>
                    </header>
                    <ul class="js-slick-carousel products list-unstyled my-0 border-right products border-top border-left"
                        data-arrows-classes="d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y"
                        data-arrow-left-classes="fas flaticon-back u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas flaticon-next u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
                        data-slides-show="4"
                        data-responsive='[{
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
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product__inner overflow-hidden p-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', 4) }}" class="d-block"><img src="{{ asset('assets/img/books/150x227.jpg') }}" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{ route('product', 4) }}">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{ route('product', 4) }}">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', 4) }}" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                        <div class="product__rating d-flex align-items-center font-size-2">
                                            <div class="text-yellow-darker mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                            <div class="">(3,714)</div>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="{{ route('product', 4) }}" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="mr-1 h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="{{ route('product', 4) }}" class="h-p-bg border-0 btn btn-outline-primary">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection