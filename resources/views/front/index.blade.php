@extends('front.layout.index')
@section('content')
    <section class="slid-sec with-bg-wide">
      <div class="tp-banner-container">
        <div class="tp-banner-full">
          <ul>
            @foreach($data['banners'] as $banner)
              <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                  <a href="javascript:void(0)"><img src="{{ asset($banner->banner) }}" alt="slider" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat"></a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>

    <br>

    <!-- Content -->
    <div id="content">

      <!-- Banner -->
      <section class="disply-sec slid-sec margin-bottom-0 padding-bottom-60">
        <div class="container">
          <div class="row">

            <!-- Smartphone -->
            <div class="col-md-6">
              <div class="product">
                <div class="like-bnr ultra">
                  <div class="position-center-center">
                    <h5>Trending Books</h5>
                    <h4>All Genres</h4>
                    <span class="price">All Editions</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Sport -->
            <div class="col-md-6">
              <div class="product">
                <div class="like-bnr ultra-1">
                  <div class="position-center-center">
                    <h5>Discover New Authors</h5>
                    <span class="price">New Books To</span>
                    <span class="price">Check Out</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @if(isset($data['best_selling']) && count($data['best_selling']) > 0)
      <section class="padding-bottom-60">
        <div class="container">

          <!-- heading -->
          <div class="heading">
            <h2>Top Selling Books</h2>
            <hr>
          </div>
          <!-- Items Slider -->
          <div class="item-slide-5 with-nav">
            @forelse($data['best_selling'] as $book)
                <div class="product">
                  <article> 
                    <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                    @if($book->is_new)
                    <span class="new-tag">New</span>
                    @endif
                    <span class="tag">
                    @if($book->role != 'admin')
                      <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                      @else 
                      <a href="javascript:void(0)">{{ $book->name }}</a>
                    @endif
                    (
                      @if($book->is_paperback)
                          Paperback
                      @elseif($book->is_hardcover)
                          Hardcover
                      @elseif($book->is_digital)
                          Digital
                      @endif
                    )
                    </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                    <p class="rev">
                      @if($book->total_reviews != 0)
                          @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                      @else
                          @php $avg_rating = 0; @endphp
                      @endif

                      @if($avg_rating < 5)
                          @for($i = 0; $i < $avg_rating; $i++)
                              <i class="fa fa-star"></i>
                          @endfor
                          @for($i = 0; $i < 5 - $avg_rating; $i++)
                              <i class="fa fa-star-o"></i>
                          @endfor
                      @else
                          @for($i = 0; $i < $avg_rating; $i++)
                              <i class="fa fa-star"></i>
                          @endfor
                      @endif

                    <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                    <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                    <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                  </article>
                </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      <!-- Wide Sale Banner -->
      <!-- <section>
        <div class="container">
          <div class="wide-bnr">
            <h5>Saving up to <span class="color-primary"> 75% OFF </span>all items first purchase!</h5>
            <div class="btn">Use Code: Z381aC3</div>
          </div>
        </div>
      </section> -->

      @if(isset($data['featured']) && count($data['featured']) > 0)
      <section class="padding-bottom-60">
        <div class="container">

          <!-- heading -->
          <div class="heading">
            <h2>Featured Books</h2>
            <hr>
          </div>
          <!-- Items Slider -->
          <div class="item-slide-5 with-nav">
            @forelse($data['featured'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      @if(isset($data['new_release']) && count($data['new_release']) > 0)
      <section class="padding-bottom-60">
        <div class="container">

          <!-- heading -->
          <div class="heading">
            <h2>Latest Books</h2>
            <hr>
          </div>
          <!-- Items Slider -->
          <div class="item-slide-5 with-nav">
            @forelse($data['new_release'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      @if(isset($data['marketer_picks']) && count($data['marketer_picks']) > 0)
      <section class="padding-bottom-60">
        <div class="container">
          <div class="heading">
            <h2>Marketer Picks</h2>
            <hr>
          </div>
          <div class="item-slide-5 with-nav">
            @forelse($data['marketer_picks'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      @if(isset($data['preorder']) && count($data['preorder']) > 0)
      <section class="padding-bottom-60">
        <div class="container">
          <div class="heading">
            <h2>Preorder Books</h2>
            <hr>
          </div>
          <div class="item-slide-5 with-nav">
            @forelse($data['preorder'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      
      @if(isset($data['viewed']) && count($data['viewed']) > 0)
      <section class="padding-bottom-60">
        <div class="container">
          <div class="heading">
            <h2>Most Viewed Books</h2>
            <hr>
          </div>
          <div class="item-slide-5 with-nav">
            @forelse($data['viewed'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      
      @if(isset($data['biographies']) && count($data['biographies']) > 0)
      <section class="padding-bottom-60">
        <div class="container">
          <div class="heading">
            <h2>Biographies Books</h2>
            <hr>
          </div>
          <div class="item-slide-5 with-nav">
            @forelse($data['biographies'] as $book)
              <div class="product">
                <article> 
                  <img class="img-responsive" src="{{ asset($book->hero_image) }}" alt="" > 
                  @if($book->is_new)
                  <span class="new-tag">New</span>
                  @endif
                  <span class="tag">
                  @if($book->role != 'admin')
                    <a href="{{ route('author-detail', $book->author_id) }}">{{ $book->name }}</a>
                    @else 
                    <a href="javascript:void(0)">{{ $book->name }}</a>
                  @endif
                  (
                    @if($book->is_paperback)
                        Paperback
                    @elseif($book->is_hardcover)
                        Hardcover
                    @elseif($book->is_digital)
                        Digital
                    @endif
                  )
                  </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ substr($book->title,0,20) }}...</a> 
                  <p class="rev">
                    @if($book->total_reviews != 0)
                        @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                    @else
                        @php $avg_rating = 0; @endphp
                    @endif

                    @if($avg_rating < 5)
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < 5 - $avg_rating; $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    @else
                        @for($i = 0; $i < $avg_rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    @endif

                  <span class="margin-left-10">{{ $book->total_reviews }} Review(s)</span></p>
                  <div class="price">{{ $currency->currency_symbol }}</span>{{ $book->price * $currency->exchange_rate }} </div>
                  <a href="javascript:void(0)" class="cart-btn addToCart" data-id="{{ $book->book_id }}"><i class="icon-basket-loaded"></i></a> 
                </article>
              </div>
            @empty
            @endforelse
          </div>
        </div>
      </section>
      @endif
      <!-- featured authors -->
      @if(isset($data['authors']) && count($data['authors']) > 0)
      <section class="padding-bottom-60">
        <div class="container">

          <!-- heading -->
          <div class="heading">
            <h2>Featured Authors</h2>
            <hr>
          </div>
          <!-- Items Slider -->
          <div class="item-slide-4 with-nav">
          @foreach($data['authors'] as $author)
            <div class="product author">
              <article> <img class="img-responsive auth" src="{{ asset($author->profile) }}" alt="">
                <div class="text-center">
                  <a href="{{ route('author-detail', $author->id) }}" class="tittle ">{{ $author->name }}</a>
                </div>
              </article>
            </div>
          @endforeach
          </div>
        </div>
      </section>
      @endif

      <!-- Book Trailers -->
      <section class="padding-bottom-60">
        <div class="container">

          <!-- heading -->
          <div class="heading">
            <h2>Book Trailers</h2>
            <hr>
          </div>
          <!-- Items Slider -->
          <div class="item-slide-5 with-nav">
            <!-- Product -->
            <div class="product">
              <a data-toggle="modal" data-target="#exampleModal" href="#.">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/9780062882769.jpg')}}" alt=""> <span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Elizabeth Avecido</span> <a href="book_details.php" class="tittle">Clap When You Land</a>
                  <!-- Reviews -->
                </article>
              </a>
            </div>
            <!-- Product -->
            <div class="product">
              <a data-toggle="modal" data-target="#exampleModal" href="#.">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/9780063071636.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Adam Silvera</span> <a href="book_details.php" class="tittle">Here's To us </a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a data-toggle="modal" data-target="#exampleModal" href="#.">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/9780345806406.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Christina Henriquez</span> <a href="book_details.php" class="tittle">TThe Book Of Unknown Americans</a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a data-toggle="modal" data-target="#exampleModal" href="#.">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/9780399592683.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Karla Cornejo</span> <a href="book_details.php" class="tittle">The Undocumented Americans</a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a href="https://www.youtube.com/watch?v=nw59Nt5Hqhc">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/9780547636474.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Pati Jinich</span> <a href="book_details.php" class="tittle">Pati's Mexican Table</a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a target="_blank" href="https://www.youtube.com/watch?v=nw59Nt5Hqhc">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/The-House-of-Broken-Angels-Urrea-Luis-Alberto-9780316154895.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">luis Alberto Urrea</span> <a href="book_details.php" class="tittle">The House of Broken Angels</a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a target="_blank" href="https://www.youtube.com/watch?v=nw59Nt5Hqhc">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/Separate-Is-Never-Equal-Tonatiuh-Duncan-9781419710544.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Duncan Tonatiuh</span> <a href="book_details.php" class="tittle">Seperate Is Never Equal</a>
                </article>
              </a>
            </div>

            <!-- Product -->
            <div class="product">
              <a target="_blank" href="https://www.youtube.com/watch?v=nw59Nt5Hqhc">
                <article> <img class="img-responsive" src="{{asset('assets/images/books/Enrique-s-Journey-The-Young-Adult-Adaptation-Nazario-Sonia-9780385743280.jpg')}}" alt=""><span class="play-tag"><i class="fa fa-play"></i></span>
                  <!-- Content -->
                  <span class="tag">Sonia Nazario</span> <a href="book_details.php" class="tittle">Enrique's Journey</a>
                </article>
              </a>
            </div>
          </div>
        </div>

        <!-- trailer Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center text-success" id="exampleModalLabel">Book Trailer</h5>
              </div>
              <div class="modal-body">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/nw59Nt5Hqhc" title="EVERLESS by Sara Holland | Official Book Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Shipping Info -->
      <section class="shipping-info">
        <div class="container">
          <ul>

            <!-- Free Shipping -->
            <li>
              <div class="media-left"> <i class="fa fa-book"></i> </div>
              <div class="media-body">
                <h5>Cowrie Author</h5>
                <span>Sign up as a Cowrie Author</span>
              </div>
            </li>
            <!-- Money Return -->
            <li>
              <div class="media-left"> <i class="fa fa-users"></i> </div>
              <div class="media-body">
                <h5>Consultant for Authors</h5>
                <span>Become a Cowrie Consultant for Authors</span>
              </div>
            </li>
            <!-- Support 24/7 -->
            <li>
              <div class="media-left"> <i class="fa fa-book"></i> </div>
              <div class="media-body">
                <h5>Bulk Order Purchase</h5>
                <span>Register Your School for Textbook Deals for Bulk Orders</span>
              </div>
            </li>
            <!-- Safe Payment -->
            <li>
              <div class="media-left"> <i class="fa fa-file"></i> </div>
              <div class="media-body">
                <h5>Coupons and Deals</h5>
                <span>Sign up to Cowriehub to Grab Coupons and Deals</span>
              </div>
            </li>
          </ul>
        </div>
      </section>

      @if(isset($data['biographies']) && count($data['biographies']) > 0)
      <section class="padding-top-60 padding-bottom-60">
        <div class="container">
          <div class="heading">
            <h2>From our Blog</h2>
            <hr>
          </div>
          
          <div id="blog-slide" class="with-nav"> 
            @forelse($data['blogs'] as $blog)
            <div class="blog-post">
              <article> <img class="img-responsive" src="{{ asset($blog->image) }}" alt="" > <span><i class="fa fa-bookmark-o"></i> {{ date("F d Y",strtotime($blog->created_at)) }}</span> <a href="#." class="tittle">{{ $blog->title }}</a>
                <p>{{ substr($blog->description,0,50) }}</p>
                <a href="{{ route('blog-detail',$blog->id) }}">Read More</a> </article>
            </div>
            @empty
            @endforelse
        </div>
        </div>
      </section>
      @endif
@endsection