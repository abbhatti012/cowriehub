@extends('front.layout.index')
@section('content')
    <main id="content" role="main">
        <div class="mb-5 mb-lg-8 pb-xl-1">
            <div class="mb-5 mb-lg-8 pb-xl-1">
                <div class="page-header border-bottom">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center py-4">
                            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Blog Single</h1>
                            <nav class="woocommerce-breadcrumb font-size-2">
                                <a href="{{ url('/') }}" class="h-primary">Home</a>
                                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                                <span>Blog Detail</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div>
                    <img class="img-fluid" src="{{ asset('assets/img/books/1400x650.jpg') }}" alt="Image-Description">

                    <div class="max-width-940 mx-auto bg-white position-relative">
                        <div class=" mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-8">
                            <div class="ml-xl-4">
                                <div class="mb-5 mb-lg-7">
                                    <!-- <div class="mb-2">
                                        <span class="font-size-2 text-primary">Romance</span>
                                    </div> -->
                                    <h6 class="font-size-10 crop-text-2 font-weight-medium text-lh-1dot4">
                                        {{ $blog->title }}
                                    </h6>
                                    <div class="font-size-2 text-secondary-gray-700">
                                        <span>{{ $blog->created_at }}</span>
                                    </div>
                                </div>
                                <p class="font-weight-medium">{{ $blog->description }}
                                </p>

                                <p><?php echo $blog->long_description ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="js-slick-carousel u-slick u-slick--gutters-3 my-5 my-lg-8"
                         data-infinite="true"
                         data-slides-show="1"
                         data-slides-scroll="1"
                         data-center-mode="true"
                         data-center-padding="350px"
                         data-pagi-classes="text-center u-slick__pagination mt-5 mb-0"
                         data-responsive='[{
                           "breakpoint": 992,
                           "settings": {
                             "centerPadding": "120px"
                           }
                         }, {
                           "breakpoint": 768,
                           "settings": {
                             "centerPadding": "80px"
                           }
                         }, {
                           "breakpoint": 554,
                           "settings": {
                             "centerPadding": "50px"
                           }
                         }]'>
                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>

                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>

                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>

                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>

                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>

                        <div class="bg-img-hero min-height-350" style="background-image: url({{ asset('assets/img/books/393x350.jpg') }});">
                        </div>
                    </div>
                    <div class="col-lg-9 mx-auto">
                        <div class="px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <div class="ml-xl-4">
                                <p class="font-size-2 text-lh-1dot72 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum, leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</p>
                                <p class="font-size-2 text-lh-1dot72 mb-4">Pellentesque sodales augue eget ultricies ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sagittis ultrices condimentum.</p>
                                <div class="border-bottom mb-5 pb-5">
                                    <div class="d-flex ">
                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 height-38 width-80" href="{{ route('shop') }}">Books</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 height-38 width-110" href="{{ route('shop') }}">Romance</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-2 height-38 width-70" href="{{ route('shop') }}">Art</a>

                                        <a class="btn d-flex align-items-center justify-content-center bg-gray-200 rounded-0 transition-3d-hover font-size-2 mr-0 height-38 width-59" href="{{ route('shop') }}">Kids</a>
                                    </div>
                                </div>
                                <div class="d-md-flex align-items-center mb-5">
                                    <h6 class="font-weight-medium font-size-4 mb-5 mb-md-0 text-center text-lg-left">1923
                                        <span class="font-size-2 text-gray-600 font-weight-normal ml-1">Shares</span>
                                    </h6>
                                    <div class="ml-md-3 ml-xl-5 d-flex d-md-block  flex-column align-items-center">
                                        <a href="#" class="btn bg-facebook rounded-0 py-2 width-175 mb-3 mb-xl-0 mr-md-1 px-1">
                                            <span class="fab fa-facebook-f text-white mx-1"></span>
                                            <span class="text-white font-size-2">FACEBOOK</span>
                                        </a>
                                        <a href="#" class="btn bg-twitter rounded-0 py-2 width-175 mb-3 mb-xl-0 mr-md-1 px-1">
                                            <span class="fab fa-twitter text-white mx-1"></span>
                                            <span class="text-white font-size-2">TWITTER</span>
                                        </a>
                                         <a href="#" class="btn bg-pinterest rounded-0 py-2 width-175 mb-3 mb-md-0 mr-md-1 px-1">
                                            <span class="fab fa-pinterest text-white mx-1"></span>
                                            <span class="text-white font-size-2">PINTEREST</span>
                                        </a>

                                        <a href="#" class="btn bg-dark rounded-0 py-2 px-1">
                                            <span class="fas fa-plus text-white mx-2"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 pb-1">
                                    <div class="bg-gray-200 py-3 py-md-5 px-3 px-md-6">
                                        <div class="d-md-flex">
                                            <a class="d-block text-center text-md-left mb-3 mb-md-0" href="#">
                                                <img class="img-fluid rounded-circle max-width-120 height-120" src="{{ asset('assets/img/books/120x120.png') }}" alt="Image-Description">
                                            </a>
                                            <div class="ml-md-4 text-center text-md-left">
                                                <h6 class="font-weight-medium font-size-3">
                                                    <a href="#">Ali Tufan</a>
                                                </h6>
                                                <p class="font-size-2 mb-0">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                <ul class="list-unstyled mb-0 d-md-flex">
                                                    <li class="btn pl-0">
                                                        <a class="link-black-100" href="#">
                                                            <span class="fab fa-instagram"></span>
                                                        </a>
                                                    </li>
                                                    <li class="btn">
                                                        <a class="link-black-100" href="#">
                                                            <span class="fab fa-facebook-f"></span>
                                                        </a>
                                                    </li>
                                                    <li class="btn">
                                                        <a class="link-black-100" href="#">
                                                            <span class="fab fa-youtube"></span>
                                                        </a>
                                                    </li>
                                                    <li class="btn">
                                                        <a class="link-black-100" href="#">
                                                            <span class="fab fa-twitter"></span>
                                                        </a>
                                                    </li>
                                                    <li class="btn">
                                                        <a class="link-black-100" href="#">
                                                            <span class="fab fa-pinterest"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5 mb-md-7">
                                    <div class="d-md-flex justify-content-between">
                                        <a class="d-block mb-5 mb-md-0" href="#">
                                            <div class="d-flex">
                                                <div>
                                                    <div class="bg-gray-200 p-2 rounded-circle d-inline-block">
                                                        <i class="flaticon-left-arrow text-dark mx-1"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="font-size-2 text-secondary-gray-700">PREVIOUS POST</div>
                                                    <span class="link-black-100">Wardrobe Essentials Chinos</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="d-block" href="#">
                                            <div class="d-flex">
                                                <div>
                                                    <div class="font-size-2 text-right text-secondary-gray-700">PREVIOUS POST</div>
                                                    <span class="link-black-100">Wardrobe Essentials Chinos </span>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="bg-gray-200 p-2 rounded-circle d-inline-block">
                                                        <i class="flaticon-right-arrow text-dark mx-1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="border-bottom mb-5 pb-5">
                                    <h6 class="font-weight-medium font-size-3 mb-4">You May Also Like</h6>
                                    <div class="row row-cols-1 row-cols-lg-2">
                                        <div class="col">
                                            <div class="mb-5 mb-lg-0">
                                                <a class="d-block mb-2" href="">
                                                    <img class="img-fluid" src="{{ asset('assets/img/books/360x250.jpg') }}" alt="Image-Description">
                                                </a>

                                                <div>
                                                    <div class="mb-2">
                                                        <a class="font-size-2" href="">Romance</a>
                                                    </div>
                                                     <h6 class="font-weight-medium font-size-3 pr-lg-7 text-lh-md">
                                                        <a href="">Signficant reading has a more info number</a>
                                                    </h6>
                                                    <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                                    <div class="font-size-2 text-secondary-gray-700">
                                                        <span>10 November, 2020</span>
                                                        <span class="ml-md-3">0 comments</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a class="d-block mb-2" href="">
                                                <img class="img-fluid" src="{{ asset('assets/img/books/360x250.jpg') }}" alt="Image-Description">
                                            </a>

                                            <div>
                                                <div class="mb-2">
                                                    <a class="font-size-2" href="">Romance</a>
                                                </div>
                                                 <h6 class="font-weight-medium font-size-3 text-lh-md">
                                                    <a href="">Activities of the Frankfurt Book International</a>
                                                </h6>
                                                <p class="font-size-2 text-secondary-gray-700">It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.</p>
                                                <div class="font-size-2 text-secondary-gray-700">
                                                    <span>10 November, 2020</span>
                                                    <span class="ml-md-3">0 comments</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-size-3 mb-5 mb-md-8 font-weight-medium">Reviews (7)</h4>
                                <ul class="list-unstyled mb-5 mb-md-8">
                                    <li class="mb-4 pb-5 border-bottom">
                                        <div class="d-md-flex align-items-center mb-3">
                                            <h6 class="mb-2 mb-md-0">Amazing Story! You will LOVE it</h6>
                                            <div class="text-yellow-darker ml-md-3">
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
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                    <span class="ml-2">90</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                    <span class="ml-2">10</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-flag"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-4 pb-5 border-bottom">
                                        <div class="d-md-flex align-items-center mb-3">
                                            <h6 class="mb-2 mb-md-0">Get the best seller at a great price.</h6>
                                            <div class="text-yellow-darker ml-md-3">
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
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                    <span class="ml-2">90</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                    <span class="ml-2">10</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-flag"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="mb-4 pb-5 border-bottom">
                                        <div class="d-md-flex align-items-center mb-3">
                                            <h6 class="mb-2 mb-md-0">I read this book short...</h6>
                                            <div class="text-yellow-darker ml-md-3">
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
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                    <span class="ml-2">90</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                    <span class="ml-2">10</span>
                                                </a>
                                            </li>
                                            <li class="mr-5 mr-md-7">
                                                <a href="#" class="text-gray-600 d-flex align-items-center">
                                                    <i class="text-dark font-size-5 flaticon-flag"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <h4 class="font-size-3 mb-4">Write a Review</h4>
                                <div class="js-form-message form-group mb-4">
                                    <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details please! Your review helps other shoppers.</label>
                                    <textarea class="form-control rounded-0 p-4" rows="7" id="descriptionTextarea" placeholder="What did you like or dislike? What should other shoppers know before buying?" required="" data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="inputCompanyName" class="form-label text-dark h6 mb-3">Add a title</label>
                                    <input type="text" class="form-control rounded-0 px-4" name="companyName" id="inputCompanyName" placeholder="3000 characters remaining" aria-label="3000 characters remaining">
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">Submit Review</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
@endsection