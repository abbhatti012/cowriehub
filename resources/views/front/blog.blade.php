@extends('front.layout.index')
@section('content')
<main id="content">
        <div class="mb-5 mb-lg-8 pb-xl-1">
            <div class="mb-5 mb-lg-8 pb-xl-1">
                <div class="page-header border-bottom">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center py-4">
                            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Blog List</h1>
                            <nav class="woocommerce-breadcrumb font-size-2">
                                <a href="{{ url('/') }}" class="h-primary">Home</a>
                                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                                <span>Blog List</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mb-5 mb-lg-9 pb-xl-1">
                    <div class="col-lg-4 col-xl-3">
                        <div id="SidebarAccordion">
                            <div id="Search" class="widget p-4 border">
                                <div id="Heading21">
                                    <a class="d-flex align-items-center justify-content-between collapse-link text-dark" href="#"
                                        data-toggle="collapse"
                                        data-target="#Collapse21"
                                        aria-expanded="true"
                                        aria-controls="Collapse21">

                                        <h3 class="title mb-0 font-weight-medium font-size-3">Search</h3>

                                        <svg class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                        </svg>

                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                        </svg>
                                    </a>
                                </div>

                                <div id="Collapse21" class="mt-4 collapse show"
                                    aria-labelledby="Heading21"
                                    data-parent="#SidebarAccordion">
                                    <form class="form-inline my-2 my-xl-0 overflow-hidden">
                                        <div class="input-group flex-nowrap w-100">
                                            <div class="input-group-prepend">
                                                <i class="glph-icon flaticon-loupe py-2d75 bg-white-100 border-white-100 text-dark pl-3 pr-0 rounded-0"></i>
                                            </div>
                                            <input class="form-control bg-white-100 py-2d75 height-4 border-white-100 rounded-0" type="search" placeholder="Search" aria-label="Search">
                                        </div>
                                        <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>

                            <div id="Categories" class="widget p-4 border">
                                <div id="Heading22">
                                    <a class="d-flex align-items-center justify-content-between collapse-link text-dark" href="#"
                                        data-toggle="collapse"
                                        data-target="#Collapse22"
                                        aria-expanded="false"
                                        aria-controls="Collapse22">

                                        <h3 class="title mb-0 font-weight-medium font-size-3">Categories</h3>

                                        <svg class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                        </svg>

                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                        </svg>
                                    </a>
                                </div>

                                <div id="Collapse22" class="mt-4 collapse"
                                    aria-labelledby="Heading22"
                                    data-parent="#SidebarAccordion">
                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">

                                            <span class="text-dark">Arts & Photography</span>
                                            <small class="text-gray-600">1</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Biographies & Memoirs</span>
                                            <small class="text-gray-600">5</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Children's Books</span>
                                            <small class="text-gray-600">9</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Education & Teaching</span>
                                            <small class="text-gray-600">12</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Health, Fitness & Dieting</span>
                                            <small class="text-gray-600">74</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Romance</span>
                                            <small class="text-gray-600">23</small>
                                        </a>

                                        <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                            <span class="text-dark">Sports & Outdoors</span>
                                            <small class="text-gray-600">98</small>
                                        </a>

                                        <!-- View More - Collapse -->
                                        <div class="collapse" id="collapseBrand">
                                            <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                                <span class="text-dark">Outdoors</span>
                                                <small class="text-gray-600">5</small>
                                            </a>
                                            <a class="form-group d-flex align-items-center justify-content-between font-size-2 text-lh-md mb-3" href="{{ route('blog-detail') }}">
                                                <span class="text-dark">Travel</span>
                                                <small class="text-gray-600">55</small>
                                            </a>
                                        </div>
                                        <!-- End View More - Collapse -->

                                        <!-- Link -->
                                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                                            <span class="link__icons">
                                                <span class="link__icon-inner font-size-2">+</span>
                                            </span>
                                          <span class="link-collapse__default font-size-2">Shop more</span>
                                        </a>
                                        <!-- End Link -->
                                </div>
                            </div>

                            <div id="RecentPosts" class="widget p-4 border">
                                <div id="Heading23">
                                    <a class="d-flex align-items-center justify-content-between collapse-link text-dark" href="#"
                                        data-toggle="collapse"
                                        data-target="#Collapse23"
                                        aria-expanded="false"
                                        aria-controls="Collapse23">

                                        <h3 class="title font-weight-medium font-size-3 mb-0">Recent Posts</h3>

                                        <svg class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                        </svg>

                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                        </svg>
                                    </a>
                                </div>

                                <div id="Collapse23" class="mt-6 collapse"
                                    aria-labelledby="Heading23"
                                    data-parent="#SidebarAccordion">

                                        <div class="d-flex mb-5">
                                            <a class="d-block" href="{{ route('blog-detail') }}">
                                                <img src="{{ asset('assets/img/books/80x80.jpg') }}" class="img-fluid height-80 max-width-80" alt="Image_desiption">
                                            </a>
                                            <div class="ml-3">
                                                <h6 class="font-size-2 mb-1">
                                                    <a href="{{ route('blog-detail') }}">Homemade Clabatta donuts</a>
                                                </h6>
                                                <span class="font-size-2 text-secondary-gray-700">April 10, 2020</span>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <a class="d-block" href="{{ route('blog-detail') }}">
                                                <img src="{{ asset('assets/img/books/80x80.jpg') }}" class="img-fluid height-80 max-width-80" alt="Image_desiption">
                                            </a>
                                            <div class="ml-3">
                                                <h6 class="font-size-2 mb-1">
                                                    <a href="{{ route('blog-detail') }}">5 basic tips for colors</a>
                                                </h6>
                                                <span class="font-size-2 text-secondary-gray-700">April 10, 2020</span>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-0">
                                            <a class="d-block" href="{{ route('blog-detail') }}">
                                                <img src="{{ asset('assets/img/books/80x80.jpg') }}" class="img-fluid height-80 max-width-80" alt="Image_desiption">
                                            </a>
                                            <div class="ml-3">
                                                <h6 class="font-size-2 mb-1">
                                                    <a href="{{ route('blog-detail') }}">Create your adventure</a>
                                                </h6>
                                                <span class="font-size-2 text-secondary-gray-700">April 10, 2020</span>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div id="Tags" class="widget p-4 border">
                                <div id="Heading24">
                                    <a class="d-flex align-items-center justify-content-between collapse-link text-dark" href="#"
                                        data-toggle="collapse"
                                        data-target="#Collapse24"
                                        aria-expanded="false"
                                        aria-controls="Collapse24">

                                        <h3 class="title font-weight-medium font-size-3 mb-0">Tags</h3>

                                        <svg class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                        </svg>

                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                        </svg>
                                    </a>
                                </div>

                                <div id="Collapse24" class="mt-5 collapse"
                                    aria-labelledby="Heading24"
                                    data-parent="#SidebarAccordion">
                                    <div class="d-flex flex-wrap">
                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-80"
                                        href="{{ route('shop') }}">Books</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-80"
                                        href="{{ route('shop') }}">read</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-110"
                                        href="{{ route('shop') }}">Romance</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-70"
                                        href="{{ route('shop') }}">Art</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-185"
                                        href="{{ route('shop') }}">Education & Teaching</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-59"
                                        href="{{ route('shop') }}">Love</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 mb-2 height-38 width-70"
                                        href="{{ route('shop') }}">Advice</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-0 mb-2 height-38 width-59"
                                        href="{{ route('shop') }}">Kids</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="row row-cols-md-2">
                            <div class="col">
                                <div class="mb-5">
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">Signficant reading has a more info number</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">Activities of the Frankfurt Book International</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">The London Book Fair is to be packed with exciting</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">Should You Feel Embarrassed for Reading Kids Books?</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">Books with Horrible Dating Advice</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <a class="d-block mb-3" href="{{ route('blog-detail') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/books/5220x350.jpg') }}" alt="Image-Description">
                                    </a>
                                    <div class="mb-2">
                                        <a class="font-size-2" href="{{ route('blog-detail') }}">Romance</a>
                                    </div>
                                    <h6 class="font-size-7 crop-text-2 font-weight-medium text-lh-1dot4">
                                        <a href="{{ route('blog-detail') }}">A New Restaurant & Bookshop Opens in Raleigh</a>
                                    </h6>
                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>10 November, 2020</span>
                                        <span class="ml-3">0 comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination__custom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble mb-0">
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">1</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">2</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item active" aria-current="page"><a class="page-link" href="#">3</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">4</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">5</a></li>
                        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
@endsection