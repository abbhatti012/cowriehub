@extends('front.layout.index')
@section('content')
    <main id="content">
        <div class="mb-5 space-bottom-lg-3">
            <div class="py-3 py-lg-7">
                <h6 class="font-weight-medium font-size-7 text-center my-1">About Us</h6>
            </div>
            <img class="img-fluid" src="{{ asset($setting->about_banner) }}" alt="Image-Description">
            <div class="container">
                <div class="mb-lg-8">
                    <div class="col-lg-9 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                            <p><?= $setting->about_us ?></p>
                        </div>
                    </div>
                </div>
                <div class="mb-5 mb-lg-7">
                    <div class="d-md-flex align-items-center justify-content-between px-xl-10">
                        <div class="text-center mb-3 mb-md-0">
                            <div class="font-size-12 font-weight-medium ml-lg-2">{{ $setting->instagram_followers }}</div>
                            <span class="font-size-4">Instagram Followers</span>
                        </div>
                        <div class="text-center mb-3 mb-md-0">
                            <div class="font-size-12 font-weight-medium ml-2">{{ $setting->facebook_followers }}</div>
                            <span class="font-size-4">Facebook Followers</span>
                        </div>
                        <div class="text-center mb-3 mb-md-0">
                            <div class="font-size-12 font-weight-medium ">{{ $setting->youtube_followers }}</div>
                            <span class="font-size-4">Youtube Followers</span>
                        </div>
                        <div class="text-center mb-0">
                            <div class="font-size-12 font-weight-medium ml-2">{{ $setting->tumbler_followers }}</div>
                            <span class="font-size-4">Tumbler Followers</span>
                        </div>
                    </div>
                </div>
                <div class="mb-5 mb-lg-10">
                    <h6 class="font-weight-medium font-size-7 mb-5 mb-lg-6">Why We</h6>
                    <ul class="list-unstyled my-0 list-features row d-md-flex">
                        <li class="list-feature mb-5 mb-lg-0 col-md-6 col-lg-3">
                            <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                                <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                    <i class="glyph-icon flaticon-delivery"></i>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <h4 class="feature__title font-size-3 text-dark">Free Delivery</h4>
                                    <p class="feature__subtitle m-0 text-dark">{{ $setting->free_delivery }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-feature  mb-5 mb-lg-0 col-md-6 col-lg-3">
                            <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                                <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                    <i class="glyph-icon flaticon-credit"></i>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <h4 class="feature__title font-size-3 text-dark">Secure Payment</h4>
                                    <p class="feature__subtitle m-0 text-dark">{{ $setting->secure_payment }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-feature  mb-5 mb-md-0 col-md-6 col-lg-3">
                            <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                                <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                    <i class="glyph-icon flaticon-warranty"></i>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <h4 class="feature__title font-size-3 text-dark">Money Back Guarantee</h4>
                                    <p class="feature__subtitle m-0 text-dark">{{ $setting->money_back }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-feature  mb-5 mb-md-0 col-md-6 col-lg-3">
                            <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                                <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                    <i class="glyph-icon flaticon-help"></i>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <h4 class="feature__title font-size-3 text-dark">24/7 Support</h4>
                                    <p class="feature__subtitle m-0 text-dark">{{ $setting->support }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="mb-10 pb-md-6 pb-lg-10">
                    <h6 class="font-weight-medium font-size-7 mb-5">Our Team</h6>
                    <div class="js-slick-carousel u-slick" data-pagi-classes="text-center u-slick__pagination mt-md-8 mt-4 position-absolute right-0 left-0"
                        data-slides-show="5"
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
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Anna Baranov</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Client Care</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Thomas Snow</h6>
                                    <span class="font-size-2 text-secondary-gray-700">CEO/Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Andre Kowalsy</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Support Boss</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Pamela Doe</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Delivery Driver</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Susan McCain</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Packaging Girl</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Andre Kowalsy</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Support Boss</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Pamela Doe</h6>
                                    <span class="font-size-2 text-secondary-gray-700">Delivery Driver</span>
                                </div>
                            </div>
                        </div>
                        <div class="product__inner overflow-hidden">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail border border-left-0 pt-5 mb-3">
                                    <a href="#" class="d-block"><img src="{{ asset('assets/img/books/deals of the week.jpg') }}" class="img-fluid mx-auto d-block attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                </div>

                                <div class="woocommerce-loop-product__body product__body">
                                    <h6 class="font-weight-regular mb-1">Thomas Snow</h6>
                                    <span class="font-size-2 text-secondary-gray-700">CEO/Founder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div>
                    <h6 class="font-weight-medium font-size-7 mb-4 mb-lg-9">Company Partners</h6>
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img1.png')}}" alt="Image-Description">
                        </div>
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img2.png')}}" alt="Image-Description">
                        </div>
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img3.png')}}" alt="Image-Description">
                        </div>
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img4.png')}}" alt="Image-Description">
                        </div>
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img6.png')}}" alt="Image-Description">
                        </div>
                        <div class="text-center mb-5 mb-lg-0">
                            <img class="img-fluid" src="{{asset('assets/img/150x32/img5.png')}}" alt="Image-Description">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </main>
@endsection