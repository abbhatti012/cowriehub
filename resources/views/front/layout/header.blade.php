@php
    $currencies = DB::table('currencies')->orderBy('id','desc')->get();
@endphp
@if(!empty(Session::get('currenct_currency')))
    @php 
        $rate_id = Session::get('currenct_currency');
    @endphp
@else
    @php 
        $rate_id = 1;
    @endphp
@endif
@php
    $currency = DB::table('currencies')->where('id',$rate_id)->first();
    $genres = DB::table('genres')->get();
@endphp
<?php $setting = DB::table('settings')->first(); ?>
<!-- Newslatter -->
 <section class="newslatter">
     <div class="container text-center">
         <!-- <marquee behavior="" direction="right"> -->
         <a href="coupon_details.php">
             <h6 class="text-light">Free Shipping on Orders of $40 or More</h6>
         </a>
         <!-- </marquee> -->
     </div>
 </section>
 <!-- Top bar -->
 <div class="top-bar">
     <div class="container">
         <p>Welcome to Cowriehub!</p>
         <div class="right-sec">
             <ul style="margin-top: -10px;">
                @if(Auth::guest())
                 <li><a href="{{ route('login') }}">Login/Register </a></li>
                @else
                 <li><a href="{{ route('logout') }}">Logout </a></li>
                 <li><a href="{{ route('save-address') }}?role=author">{{ auth()->user()->name }} Account </a></li>
                @endif
                 <li><a href="{{ route('user.wishlist') }}?role=author"><i class="fa fa-heart"></i> My Wishlist</a></li>
                 <li><a href="{{ route('faq') }}">FAQ </a></li>
                 <li>
                    <div class="selectpicker" id="google_translate_element"></div>
                 </li>
                 <style>
                    iframe.goog-te-banner-frame {
                        display: none !important;
                    }

                    .goog-logo-link {
                        display: none !important;
                    }
                    .goog-te-gadget {
                        height: 30px !important;
                        overflow: hidden !important;
                    }

                    .goog-te-gadget .goog-te-combo {
                        background: #f8f8f8 !important;
                        padding: 2px 4px !important;
                        font-weight: 300 !important;
                        outline: none !important;
                        color: #161619 !important;
                        width: 100% !important;
                        border: none !important;
                        height: 38px !important;
                        font-size: 18px;
                        color: #4e4e4e !important;
                    }

                    .goog-te-gadget .goog-te-combo {
                        bottom: 9px;
                        margin-top: 0px;
                    }

                    #google_translate_element {
                        position: relative !important;
                        top: 5px !important;
                    }

                    .our-fleet .our-fleet-slider .fleet-item .fleet-item-footer .price h3 {
                        font-size: 13px !important;
                    }

                    .goog-te-gadget .goog-te-combo option {
                        color: black !important;
                    }
                </style>
                <script>
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en',
                            includedLanguages: 'fr,en',
                        }, 'google_translate_element');
                    }
                </script>
                <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                 <li>
                     <select class="selectpicker change-currency">
                        @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}" <?php if($rate_id == $currency->id){echo 'selected';} ?>>{{ $currency->currency_code }}</option>
                        @endforeach
                     </select>
                 </li>
             </ul>
             <div class="social-top">
                 
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
     </div>
 </div>

 <!-- Header -->
 <header class="header-style-3">
     <div class="container">
         <div class="logo"> <a href="/"><img src="{{asset('assets/images/cowriehub.png')}}" alt=""></a> </div>

         <!-- Nav Header -->
         <nav class="navbar ownmenu">

             <!-- Categories -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
             </div>

             <!-- NAV -->
             <div class="collapse navbar-collapse" id="nav-open-btn">
                 <ul class="nav">
                     <li> <a href="{{ url('/') }}">Home </a></li>
                     <li> <a href="{{ route('shop') }}">Book Store </a></li>
                    @if(isset(Auth::user()->role))
                        @if(Auth::user()->role == 'author')
                            <li> <a href="{{ route('pricing-table') }}">Marketing Store </a></li>
                        @endif
                    @endif
                     <!-- Mega Menu Nav -->
                     <li> <a href="{{ route('authors-list') }}">Authors </a></li>
                     <!-- Mega Menu Nav -->
                     <li class="dropdown megamenu cat"> <a href="/" class="dropdown-toggle" data-toggle="dropdown">Our Categories </a>
                         <div class="dropdown-menu animated-2s fadeInUpHalf">
                             <div class="mega-inside">
                                 <div class="top-lins">
                                     <ul>
                                        @forelse($genres as $genre)
                                         <li><a href="#."> {{ $genre->title }}</a></li>
                                        @empty
                                        @endforelse
                                     </ul>
                                 </div>
                                 <div class="row">
                                     @foreach($genres as $genre)
                                        <?php $sub_genres = DB::table('sub_genres')->where('genre_id',$genre->id)->get(); ?>
                                     <div class="col-sm-3">
                                         <h6>{{ $genre->title }}</h6>
                                         <ul>
                                            @foreach($sub_genres as $sub)
                                                <li><a href="#."> {{ $sub->title }} </a></li>
                                            @endforeach
                                         </ul>
                                     </div>
                                    @endforeach
                                 </div>
                             </div>
                         </div>
                     </li>
                     <li> <a href="blog.php">Blog</a></li>
                     <li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                         <ul class="dropdown-menu multi-level animated-1s fadeInUpHalf">
                            <li><a href="{{ route('author.profile.edit') }}?role=author">Author Account</a></li>
                            <li><a href="{{ route('user.publisher-account') }}?role=publisher">Publisher Account</a></li>
                            <li><a href="{{ route('affiliate') }}?role=affiliate">Affiliate Account</a></li>
                            <li><a href="{{ route('user.consultant-account') }}?role=consultant">Consultant Account</a></li>
                            @if(Auth::check() && \App\Models\User::IsUserExists('pos'))
                                <li><a href="{{ route('pos') }}?role=pos">POS Account</a></li>
                            @elseif(!Auth::check())
                                <li><a href="{{ route('register') }}?role=pos">POS Account</a></li>
                            @else
                                <li><a href="{{ route('pos') }}?role=pos">POS Account</a></li>
                            @endif
                         </ul>
                     </li>
                 </ul>
             </div>
         </nav>


     </div>


     <div class="nav-uder-bar">
         <div class="line"></div>
         <section class="newslatter">
             <a href=""><img src="{{asset('assets/images/PROD-24522_HGG_2022_Global_Nav_Banner.jpg')}}" alt=""></a>
         </section>
         <div class="line"></div>
         <section class="newslatter">
             <div class="container text-center">
                 <a href="coupon_details.php">
                     <h6 class="text-light">10% Off 2 or More Books, eBooks, or Audiobooks* | With Code: COWRIEHUB2022 <u class="right">See Details</u></h6>
                 </a>
             </div>
         </section>
         <div class="line"></div>
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="search-cate">
                         <select class="selectpicker searchGenre">
                            @forelse($genres as $genre)
                                <option value="{{ $genre->id }}"> {{ $genre->title }}</option>
                            @empty
                            @endforelse
                         </select>
                         <input class="web typeahead" type="search" placeholder="Search by Title or Author">
                         <input class="mobile typeahead" type="search" placeholder="Title/Author">
                         <button class="submit searchIcon" type="submit"><i class="icon-magnifier"></i></button>
                     </div>
                 </div>
                 
                 <div class="col-md-3">
                     <ul class="nav navbar-right cart-pop text-light">
                         <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont text-light">
                                    @if(session('cart'))
                                        {{ count(session()->get('cart')) }}
                                    @else
                                        0
                                    @endif
                         </span> <i class="flaticon-shopping-bag"></i> <strong class="text-light">My Cart</strong> <br>
                                 <span class="text-light">
                                 (<span class="cartItemsLength">
                                    @if(session('cart'))
                                        {{ count(session()->get('cart')) }}
                                    @else
                                        0
                                    @endif
                                </span>)
                                 item(s)</span></a>
                            @php $subtotal = 0; @endphp
                            <ul class="dropdown-menu">
                                 @if(session('cart'))
                                @forelse(session()->get('cart') as $cart)

                                @if($cart['is_preorder'] == 1)
                                    @php 
                                        $singlePrice = round((((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'])/100 )* 10), 2);
                                        $subtotal = $subtotal +  $singlePrice;
                                    @endphp
                                @else
                                    @php 
                                        $singlePrice = ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'];
                                        $subtotal = $subtotal +  $singlePrice;
                                    @endphp
                                @endif
                                    <li>
                                        <div class="media-left"> <a href="{{ route('product', $cart['id']) }}" class="thumb"> <img src="{{ $cart['image'] }}" class="img-responsive" alt=""> </a> </div>
                                        <div class="media-body"> <a href="{{ route('product', $cart['id']) }}" class="tittle">{{ $cart['title'] }}</a> <span>{{ $cart['quantity'] }} x <span>{{ $cart['currency'] }} {{ $singlePrice }}</span></div>
                                    </li>
                                @empty
                                @endforelse
                                @endif
                                <li class="btn-cart"> <a href="{{ route('cart') }}" class="btn-round">View Cart</a> </li>
                            </ul>
                         </li>
                     </ul>
                 </div>
                 <div class="col-md-3">
                     <!-- NAV RIGHT -->
                     <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> <a class="text-light" href="tel:{{ $setting->support_phone }}">{{ $setting->support_phone }}</a></span> </div>
                 </div>
             </div>
         </div>
         <div class="line"></div>
     </div>
 </header>