@php 
    $genres = DB::table('genres')->get();
    $setting = DB::table('settings')->first();
@endphp
<section class="light-gry-bg clients-img">
    <div class="container">
        <ul>
            <li><img src="{{asset('assets/images/c-img-1.png')}}" alt=""></li>
            <li><img src="{{asset('assets/images/c-img-2.png')}}" alt=""></li>
            <li><img src="{{asset('assets/images/c-img-3.png')}}" alt=""></li>
            <li><img src="{{asset('assets/images/c-img-4.png')}}" alt=""></li>
            <li><img src="{{asset('assets/images/c-img-5.png')}}" alt=""></li>
        </ul>
    </div>
</section>
<section class="newslatter">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="web">Subscribe our Newsletter <span>Get <strong>25% Off first purchase!</strong></span></h3>
                <h3 class="mobile">Subscribe our Newsletter <span><br>Get <strong>25% Off first purchase!</strong></span></h3>
            </div>
            <div class="col-md-6">
                <form>
                    <input type="email" name="name" id="signupSrName" placeholder="Your email address here...">
                    <button type="button" class="subscribeNow">Subscribe!</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="line"></div>
</div>
<!-- End Content -->

<footer>
    <div class="container">

        <!-- Footer Upside Links -->
        <div class="foot-link">
            <ul>
                <li><a href="{{ route('login') }}"> Sign in/Join </a></li>
                <li><a href="{{ route('about-us') }}"> About us </a></li>
                <li><a href="{{ route('blogs') }}"> Blogs </a></li>
                <li><a href="{{ route('front.privacy-policy') }}"> Privacy Policy </a></li>
                <li><a href="{{ route('faq') }}"> FAQ's </a></li>
                <li><a href="{{ route('contact-us') }}"> Store Keep </a></li>
                <li><a href="{{ route('terms-conditions') }}"> Terms Of Use </a></li>
                <li><a href="{{ route('contact-us') }}"> Contact Us</a></li>
            </ul>
        </div>
        <div class="row">

            <!-- Contact -->
            <div class="col-md-4">
                <h4>Contact Cowriehub!</h4>
                <p>Address: {{ $setting->support_address }}</p>
                <p>Phone: {{ $setting->support_phone }}</p>
                <p>Email: i{{ $setting->support_email }}</p>
                <div class="social-links"> 
                  @if(!empty($setting->instagram_link))
                      <a class="link-black-100" href="{{ $setting->instagram_link }}" target="_blank">
                          <span class="fa fa-instagram"></span>
                      </a>
                  @endif
                  @if(!empty($setting->facebook_link))
                      <a class="link-black-100" href="{{ $setting->facebook_link }}" target="_blank">
                          <span class="fa fa-facebook-f"></span>
                      </a>
                  @endif
                  @if(!empty($setting->youtube_link))
                      <a class="link-black-100" href="{{ $setting->youtube_link }}" target="_blank">
                          <span class="fa fa-youtube"></span>
                      </a>
                  @endif
                  @if(!empty($setting->twitter_link))
                      <a class="link-black-100" href="{{ $setting->twitter_link }}" target="_blank">
                          <span class="fa fa-twitter"></span>
                      </a>
                  @endif
                  @if(!empty($setting->pinterest_link))
                      <a class="link-black-100" href="{{ $setting->pinterest_link }}" target="_blank">
                          <span class="fa fa-pinterest"></span>
                      </a>
                  @endif
                </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Categories</h4>
                <ul class="links-footer">
                  @forelse($genres as $genre)
                    <li><a href="#."> {{ $genre->title }}</a></li>
                  @empty
                  @endforelse
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Policy  & Agreements</h4>
                <ul class="links-footer">
                    <li class="pb-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.privacy-policy') }}">Privacy Policy</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.content-policy') }}">Content Privacy</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.affiliate-network-agreement') }}">Affiliate Network Agreement</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.authors-contract') }}">Authors Contract</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.marketers-network-agreement') }}">Marketers Network Agreement</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.customer-agreement') }}">Referred Customer Agreement</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.contract-for-authors') }}">Sellers Contract For Authors</a>
                    </li>
                    <li class="pt-2">
                        <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{ route('front.contract-for-publishers') }}">Sellers Contract For Publishers</a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h4>Information</h4>
                <ul class="links-footer">
                    <li><a href="{{ route('blogs') }}">Our Blog</a></li>
                    <!-- <li><a href="{{ route('about-us') }}"> About Our Shop</a></li> -->
                    <!-- <li><a href="#."> Delivery infomation</a></li> -->
                    <li><a href="{{ route('contact-us') }}"> Store Locations</a></li>
                    <li><a href="{{ route('faq') }}"> FAQs</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Rights -->
<div class="rights">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright © 2022 <a href="#." class="ri-li"> Cowriehub </a>. All rights reserved</p>
            </div>
            <div class="col-sm-6 text-right"> <img src="{{asset('assets/images/card-icon.png')}}" alt=""> </div>
        </div>
    </div>
</div>