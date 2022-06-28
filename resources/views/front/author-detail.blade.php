@extends('front.layout.index')
<style>
    .author-cover-image{
        width: 1350px;
        height: 500px;
        object-fit: cover;
    }
    .ml-auto, .mx-auto{
        height: 200px !important;
        object-fit: cover !important;
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
                @if($user->author_detail)
                    <img class="author-cover-image" src="{{ asset($user->author_detail->cover) }}" alt="">
                @endif
                <section class="space-bottom-2 space-bottom-lg-3">
                    <div class="bg-gray-200 space-bottom-2 space-bottom-md-0">
                        <div class="container space-top-2 space-top-wd-3 px-3">
                            <div class="row">
                                <div class="col-lg-4 col-wd-3 d-flex">
                                    @if($user->author_detail)
                                    <img class="img-fluid mb-5 mb-lg-0" src="{{ asset($user->author_detail->profile) }}" alt="Image-Description">
                                    @else
                                    <img class="img-fluid mb-5 mb-lg-0 mt-auto" src="{{ asset('assets/img/books/400x759.jpg') }}" alt="Image-Description">
                                    @endif
                                </div>
                                <div class="col-lg-8 col-wd-9">
                                    <div class="mb-8">
                                        <h6 class="font-size-7 ont-weight-medium mt-2 mb-3 pb-1">
                                            {{ $user->name }}
                                        </h6>
                                        @if($user->author_detail)
                                        <p class="mb-0">{{ $user->author_detail->biography }}</p>
                                        @endif
                                    </div>
                                    <ul class="products list-unstyled row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-wd-4 my-0 mb-md-8 mb-wd-12">
                                        @forelse($books as $book)
                                        <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                    <div class="woocommerce-loop-product__thumbnail">
                                                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
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
                                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}" class="text-gray-700">
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
                                                        </a></div>
                                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover d-flex align-items-center">
                                                        <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                                            <span class="product__add-to-cart">ADD TO CART</span>
                                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                        </a>
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
                        @forelse($books as $book)
                        <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
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
                                        <div class="font-size-2  mb-1 text-truncate"><a href="{{ route('product', $book->slug) }}" class="text-gray-700">
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
                                        </a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="javascript:void(0)" class="addToCart text-uppercase text-dark h-dark font-weight-medium mr-auto" data-id="{{ $book->book_id }}">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
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
    </main>
@endsection