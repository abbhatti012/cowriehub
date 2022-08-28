@extends('front.layout.index')
<link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
@section('content')
<style>
    .subcat-items{
        margin-left: 15px;
    }
 
    .price-range-slider .range-value input {
    width: 100%;
    background: none;
    color: #000;
    font-size: 16px;
    font-weight: initial;
    box-shadow: none;
    border: none;
    margin: 20px 0 20px 0;
    }
    .price-range-slider .range-bar {
    border: none;
    background: #000;
    height: 3px;
    width: 96%;
    margin-left: 8px;
    }
    .price-range-slider .range-bar .ui-slider-range {
    background: #06b9c0;
    }
    .price-range-slider .range-bar .ui-slider-handle {
    border: none;
    border-radius: 25px;
    background: #06b9c0;
    border: 2px solid #06b9c0;
    height: 17px;
    width: 17px;
    cursor: pointer;
    }
    .price-range-slider .range-bar .ui-slider-handle + span {
    background: #06b9c0;
    }
    .widget_price_filter .ui-slider .ui-slider-handle{
        margin-top: 0;
    }

</style>
    <div class="page-header border-bottom mb-8">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('shop') }}" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                </nav>
            </div>
        </div>
    </div>
    <div class="site-content space-bottom-3" id="content">
        <div class="container">
            <div class="row">
                <div id="primary" class="filterRight content-area order-2">
                    <div class="shop-control-bar d-lg-flex justify-content-between align-items-center mb-5 text-center text-md-left">
                        <div class="shop-control-bar__left mb-4 m-lg-0">
                            <p class="woocommerce-result-count m-0">Showing 1–12 of <span id="books_length"></span> results</p>
                        </div>
                        <div class="shop-control-bar__right d-md-flex align-items-center">
                            
                            <form class="number-of-items ml-md-4 mb-4 m-md-0 d-none d-xl-block" method="get">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select orderby" name="orderby"
                                data-style="border-bottom shadow-none outline-none py-2"
                                data-width="fit">
                                    <option value="12" selected>Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                    <option value="48">Show 48</option>
                                    <option value="60">Show 60</option>
                                </select>
                                <!-- End Select -->
                            </form>

                            <ul class="nav nav-tab ml-lg-4 justify-content-center justify-content-md-start ml-md-auto" id="pills-tab" role="tablist">
                                <li class="nav-item border">
                                    <a class="nav-link p-0 height-38 width-38 justify-content-center d-flex align-items-center active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="17px">
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,0.000 L3.000,0.000 L3.000,3.000 L-0.000,3.000 L-0.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,0.000 L10.000,0.000 L10.000,3.000 L7.000,3.000 L7.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M14.000,0.000 L17.000,0.000 L17.000,3.000 L14.000,3.000 L14.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,7.000 L3.000,7.000 L3.000,10.000 L-0.000,10.000 L-0.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,7.000 L10.000,7.000 L10.000,10.000 L7.000,10.000 L7.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M14.000,7.000 L17.000,7.000 L17.000,10.000 L14.000,10.000 L14.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,14.000 L3.000,14.000 L3.000,17.000 L-0.000,17.000 L-0.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,14.000 L10.000,14.000 L10.000,17.000 L7.000,17.000 L7.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M14.000,14.000 L17.000,14.000 L17.000,17.000 L14.000,17.000 L14.000,14.000 Z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item border">
                                    <a class="nav-link p-0 height-38 width-38 justify-content-center d-flex align-items-center" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23px" height="17px">
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,0.000 L3.000,0.000 L3.000,3.000 L-0.000,3.000 L-0.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,0.000 L23.000,0.000 L23.000,3.000 L7.000,3.000 L7.000,0.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,7.000 L3.000,7.000 L3.000,10.000 L-0.000,10.000 L-0.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,7.000 L23.000,7.000 L23.000,10.000 L7.000,10.000 L7.000,7.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M-0.000,14.000 L3.000,14.000 L3.000,17.000 L-0.000,17.000 L-0.000,14.000 Z" />
                                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)" d="M7.000,14.000 L23.000,14.000 L23.000,17.000 L7.000,17.000 L7.000,14.000 Z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                            <div id="filter_grid_data"></div>
                        </div>
                        <ul class="loader products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-wd-4 border-top border-left mb-6">
                            <?php for($i = 0; $i < 12; $i++): ?> 
                            <li class="skeleton skeleton--card product col">
                                <div class="skeleton--content product__inner overflow-hidden p-3 p-md-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="skeleton--content-wrapper">
                                            <div class="loader skeleton--title"></div>
                                            <div class="loader skeleton--hr"></div>
                                            <div class="loader skeleton--image"></div>
                                            <div class="loader skeleton--hr"></div>
                                        </div>
                                        <div class="skeleton--content-wrapper">
                                            <div class="loader skeleton--line"></div>
                                            <div class="loader skeleton--line"></div>
                                            <div class="loader skeleton--line"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endfor; ?>
                        </ul>
                        <div class="tab-pane fade" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
                            <div id="filter_list_data"></div>
                        </div>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination"></ul>
                    </nav>
                </div>
                <div id="secondary" class="filterLeft sidebar widget-area order-1" role="complementary">
                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2" class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapseOne"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapseOne">

                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories</h3>

                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapseOne" class="mt-3 widget-content collapse show"
                                aria-labelledby="widgetHeadingOne"
                                data-parent="#widgetAccordion">
                                <ul class="product-categories">
                                @foreach($genres as $genre)
                                    <b>{{ $genre->title }}</b>
                                    @foreach($genre->subgenres as $sub_genre)
                                    <li class="cat-item subcat-items cat-item-45 genreSelector" data-class="genre" data-value="{{ $sub_genre->id }}"><a href="javascript:void(0)">{{ $sub_genre->title }}</a></li>
                                    @endforeach
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div id="Authors" class="widget widget_search widget_author p-4d875 border">
                            <div id="widgetHeading21" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapse21"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapse21">

                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Author</h3>

                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapse21" class="mt-4 widget-content collapse show"
                                aria-labelledby="widgetHeading21"
                                data-parent="#widgetAccordion">
                                <form class="form-inline my-2 overflow-hidden">
                                    <div class="input-group flex-nowrap w-100">
                                        <div class="input-group-prepend">
                                            <i class="glph-icon flaticon-loupe py-2d75 bg-white-100 border-white-100 text-dark pl-3 pr-0 rounded-0"></i>
                                        </div>
                                        <input class="form-control bg-white-100 py-2d75 height-4 border-white-100 rounded-0 searchAuthor" type="search" placeholder="Search" aria-label="Search">
                                    </div>
                                </form>
                                <ul class="product-categories authorFilter">
                                    @forelse($users as $user)
                                    <li class="cat-item cat-item-9 cat-parent authorSelector" data-class="user_id" data-value="{{ $user->id }}">
                                        <a href="javascript:void(0)">{{ $user->name }}</a>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div id="Format" class="widget p-4d875 border">
                            <div id="widgetHeading23" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapse23"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapse23">

                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Format</h3>

                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapse23" class="mt-3 widget-content collapse show"
                                aria-labelledby="widgetHeading23"
                                data-parent="#widgetAccordion">
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_hardcover" data-value="1"><a href="javascript:void(0)">Hardcover</a></li>
                                    <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_paperback" data-value="1"><a href="javascript:void(0)">Paperback</a></li>
                                    <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_digital" data-value="1"><a href="javascript:void(0)">Digital</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="woocommerce_price_filter-2" class="widget p-4d875 border woocommerce widget_price_filter">
                            <div id="widgetHeadingTwo" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapseTwo"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapseTwo">

                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Filter by price</h3>

                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapseTwo" class="mt-4 widget-content collapse show"
                                aria-labelledby="widgetHeadingTwo"
                                data-parent="#widgetAccordion">
                                <div class="price_slider_wrapper">
                                    <div class="price_slider_amount">
                                        <div class="price-range-slider">
                                            <p class="range-value">
                                                <input type="text" id="amount" readonly>
                                            </p>
                                            <div id="slider-range" class="range-bar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="Review" class="widget p-4d875 border">
                            <div id="widgetHeading24" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapse24"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapse24">

                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">By Review</h3>

                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapse24" class="mt-4 widget-content collapse show"
                                aria-labelledby="widgetHeading24"
                                data-parent="#widgetAccordion">
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input common_selector reviews" value="5" id="rating5">
                                        <label class="custom-control-label" for="rating5">
                                            <span class="d-block text-yellow-darker mt-plus-3">
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 "></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input common_selector reviews" value="4" id="rating4">
                                        <label class="custom-control-label" for="rating4">
                                            <span class="d-block text-yellow-darker mt-plus-3">
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 "></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input common_selector reviews" value="3" id="rating3">
                                        <label class="custom-control-label" for="rating3">
                                            <span class="d-block text-yellow-darker mt-plus-3">
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 "></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input common_selector reviews" value="2" id="rating2">
                                        <label class="custom-control-label" for="rating2">
                                            <span class="d-block text-yellow-darker mt-plus-3">
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2"></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="common_selector reviews custom-control-input" value="1" id="rating1">
                                        <label class="custom-control-label" for="rating1">
                                            <span class="d-block text-yellow-darker mt-plus-3">
                                            <span class="fas fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2 mr-1"></span>
                                            <span class="far fa-star font-size-2"></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="Featuredbooks" class="widget p-4d875 border">
                            <div id="widgetHeading25" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                    data-toggle="collapse"
                                    data-target="#widgetCollapse25"
                                    aria-expanded="true"
                                    aria-controls="widgetCollapse25">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Featured Books</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>

                            <div id="widgetCollapse25" class="mt-5 widget-content collapse show"
                                aria-labelledby="widgetHeading25"
                                data-parent="#widgetAccordion">
                                @forelse($featured as $book)
                                <div class="mb-5">
                                    <div class="media d-md-flex">
                                        <a class="d-block" href="{{ route('product', $book->slug) }}">
                                            <img class="img-fluid-aside" src="{{asset($book->hero_image)}}" alt="Image-Description">
                                        </a>
                                        <div class="media-body ml-3 pl-1">
                                            <h6 class="font-size-2 text-lh-md font-weight-normal">
                                                <a href="{{ route('product', $book->slug) }}">{{ $book->title }}</a>
                                            </h6>
                                            <span class="font-weight-medium">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }}</span></span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="minimum_price"></div>
<div id="maximum_price"></div>
@endsection
@section('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
    <script>
        if($('#category').val() != ''){
            show_filtered_data(1);
        }
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            show_filtered_data(page);
        });
        var formatField = '';
        var formatValue = '';
        var genreField = '';
        var genreValue = '';
        var authorField = '';
        var authorValue = '';
        var sortBy = 12;
        function show_filtered_data(page){
            $('.loader').show();
            $('#filter_grid_data').html('');
            $('#filter_list_data').html('');
            var minimum_price = $('#minimum_price').val();
            var maximum_price = $('#maximum_price').val();
            var reviews = get_filter('reviews');
            $.ajax({
                type : 'get',
                url : "{{ route('get-filtered-data') }}?page="+page,
                data : {
                    minimum_price : minimum_price,
                    maximum_price : maximum_price,
                    reviews : reviews,
                    formatField : formatField,
                    formatValue : formatValue,
                    genreField : genreField,
                    genreValue : genreValue,
                    authorField : authorField,
                    authorValue : authorValue,
                    sortBy : sortBy
                    },
                success : function(data){
                    $('.loader').hide();
                    $('#filter_grid_data').html(data.filter_grid_data);
                    $('#filter_list_data').html(data.filter_list_data);
                    $('.pagination').html(data.links);
                    $('#books_length').html(data.total_count);
                    $('.pagination>li a').addClass('page-link');
                    $('.pagination>li span').addClass('page-link');
                    $('.pagination').addClass('pagination__custom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble');
                    $('.pagination>li').addClass('flex-shrink-0 flex-md-shrink-1 page-item');
                }
            })
        }
        $(document).ready(function(){
            $( function() {
                $( "#slider-range" ).slider({
                    range: true,
                    min: 1,
                    max: 1000,
                    values: [ 1, 1000 ],
                    slide: function( event, ui ) {
                        $( "#amount" ).val( "GHS " + ui.values[ 0 ] + " - GHS " + ui.values[ 1 ] );
                        $('#minimum_price').val(ui.values[0]);
                        $('#maximum_price').val(ui.values[1]);
                    },
                    change: function(event, ui) { 
                        show_filtered_data(1);
                    }                    
                });
                $( "#amount" ).val( "GHS " + $( "#slider-range" ).slider( "values", 0 ) +
                    " - GHS " + $( "#slider-range" ).slider( "values", 1 ) );
                });
        });

        $('.common_selector').on('click',function(){
            show_filtered_data(1);
        })
        
        $('.singleSelector').on('click',function(){
            formatField = $(this).data('class');
            formatValue = $(this).data('value');
            show_filtered_data(1);
        })
        $('.genreSelector').on('click',function(){
            genreField = $(this).data('class');
            genreValue = $(this).data('value');
            show_filtered_data(1);
        })
        $('.authorSelector').on('click',function(){
            authorField = $(this).data('class');
            authorValue = $(this).data('value');
            show_filtered_data(1);
        })
        $('.orderby').on('change',function(){
            sortBy = $('.orderby option:selected').val();
            show_filtered_data(1);
        })
        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
        $(".searchAuthor").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".authorFilter li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
@endsection