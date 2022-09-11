@extends('front.layout.index')
@section('content')
<main id="content">
        <div class="py-3 py-lg-7">
            <h6 class="font-weight-medium font-size-7 text-center my-1">Contact Us</h6>
        </div>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin" height="500" style="border:0; width:100%;" allowfullscreen=""></iframe> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.6724728896297!2d-0.092434!3d5.615289999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf856c7d794c65%3A0x3960a61f2e1c4d6e!2sCowrie%20Hub!5e0!3m2!1sen!2s!4v1661889459045!5m2!1sen!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="container">
            <div class="space-bottom-1 space-bottom-lg-2">
                <div class="pb-4">
                    <div class="col-lg-8 mx-auto">
                    @if(Session::has('message'))
                        <div class="alert alert-{{session('message')['type']}}">
                            {{session('message')['text']}}
                        </div>
                    @endif
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-3">
                            <div class="ml-xl-4">
                                <div class="mb-4 mb-lg-7">
                                    <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7">Contact Information</h6>
                                    <p class="font-weight-medium font-italic">We will answer any questions you may have about our online sales, rights or partnership service right here.
                                    </p>
                                </div>
                                <div class="mb-4 mb-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="font-weight-medium font-size-4 mb-4">Office Address</h6>
                                            <address class="font-size-2 mb-5">
                                                <span class="mb-2 font-weight-normal text-dark">
                                                    {{ $setting->support_address }}
                                                </span>
                                            </address>
                                            <div>
                                                <a href="mailto:{{ $setting->support_email }}" class="font-size-2 d-block link-black-100 mb-1">{{ $setting->support_email }}</a>
                                                <a href="tel:{{ $setting->support_phone }}" class="font-size-2 d-block link-black-100">{{ $setting->support_phone }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5 mb-xl-9 pb-xl-1">
                                    <h6 class="font-size-4 font-weight-medium">Social Media</h6>
                                    <ul class="list-unstyled mb-0 d-flex">
                                        @if(!empty($setting->instagram_link))
                                        <li class="btn pl-0">
                                            <a class="link-black-100" href="{{ $setting->instagram_link }}" target="_blank">
                                                <span class="fab fa-instagram"></span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(!empty($setting->facebook_link))
                                        <li class="btn">
                                            <a class="link-black-100" href="{{ $setting->facebook_link }}" target="_blank">
                                                <span class="fab fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(!empty($setting->youtube_link))
                                        <li class="btn">
                                            <a class="link-black-100" href="{{ $setting->youtube_link }}" target="_blank">
                                                <span class="fab fa-youtube"></span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(!empty($setting->twitter_link))
                                        <li class="btn">
                                            <a class="link-black-100" href="{{ $setting->twitter_link }}" target="_blank">
                                                <span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(!empty($setting->pinterest_link))
                                        <li class="btn">
                                            <a class="link-black-100" href="{{ $setting->pinterest_link }}" target="_blank">
                                                <span class="fab fa-pinterest"></span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="font-weight-medium font-size-10 mb-3 pb-xl-1">Get In Touch</h6>
                                     <form class="js-validate" id="basic-validation" action="{{ route('front.insert-contacts') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6 mb-5">
                                                <div class="js-form-message">
                                                    <label for="exampleFormControlInput1">Name</label>
                                                    <input id="exampleFormControlInput1" type="text" class="form-control rounded-0" name="name" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <div class="js-form-message">
                                                    <label for="exampleFormControlInput2">Email</label>
                                                    <input id="exampleFormControlInput2" type="email" class="form-control rounded-0" name="email" aria-label="john@gmail.com" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <div class="js-form-message">
                                                    <label for="exampleFormControlInput3">Subject</label>
                                                    <input id="exampleFormControlInput3" type="text" class="form-control rounded-0" name="subject" required="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-5">
                                                <div class="js-form-message">
                                                    <label for="phone">Phone Number</label>
                                                    <input id="phone" type="text" class="form-control rounded-0" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <div class="input-group flex-column">
                                                        <label for="exampleFormControlInput4">Details please! Your review helps other shoppers.</label>
                                                        <textarea id="exampleFormControlInput4" class="form-control rounded-0 pl-3 font-size-2 placeholder-color-3" rows="6" cols="77" name="detail" placeholder="What did you like or dislike? What should other shoppers know before buying?" aria-label="Hi there, I would like to ..." required="" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-lg-start">
                                                <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60">Sumbit Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection