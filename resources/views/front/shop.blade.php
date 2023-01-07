@extends('front.layout.index')
<style>
    .checkbox-primary input[type="checkbox"]:indeterminate + label::before, .checkbox-primary input[type="radio"]:indeterminate + label::before{
        background-color: transparent !important;
    }
</style>
@section('content')
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Book Store</li>
            </ol>
        </div>
    </div>
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
        <div class="container">
            <div class="row">
                <!-- Shop Side Bar -->
                <div class="col-md-3">
                    <div class="shop-side-bar">
                        <!-- Categories -->
                        <h6>Categories</h6>
                        <div class="checkbox checkbox-primary">
                            <ul class="product-categories">
                            @foreach($genres as $genre)
                                <b>{{ $genre->title }}</b>
                                @foreach($genre->subgenres as $sub_genre)
                                <!-- <li class="cat-item subcat-items cat-item-45 genreSelector" data-class="genre" data-value="{{ $sub_genre->id }}"><a href="javascript:void(0)">{{ $sub_genre->title }}</a></li> -->
                                <li>
                                    <input id="cate{{ $sub_genre->id }}" class="styled genreSelector" data-class="genre" name="category" data-value="{{ $sub_genre->id }}" type="radio">
                                    <label for="cate{{ $sub_genre->id }}"> {{ $sub_genre->title }} </label>
                                </li>
                                @endforeach
                            @endforeach
                            </ul>
                        </div>

                        <!-- Categories -->
                        <h6>Price</h6>
                        <!-- PRICE -->
                        <div class="cost-price-content">
                            <div id="price-range" class="price-range"></div>
                            <span id="price-min" class="price-min">20</span> <span id="price-max" class="price-max">80</span> <a href="javascript:void(0)" class="btn-round filter-price">Filter</a>
                        </div>


                        <!-- Colors -->
                        <h6>Rating</h6>
                        <div class="rating">
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input common_selector reviews" value="5" id="rating5">
                                    <label class="custom-control-label" for="rating5">
                                        <span class="d-block text-yellow-darker mt-plus-3">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input common_selector reviews" value="4" id="rating4">
                                    <label class="custom-control-label" for="rating4">
                                        <span class="d-block text-yellow-darker mt-plus-3">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input common_selector reviews" value="3" id="rating3">
                                    <label class="custom-control-label" for="rating3">
                                        <span class="d-block text-yellow-darker mt-plus-3">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input common_selector reviews" value="2" id="rating2">
                                    <label class="custom-control-label" for="rating2">
                                        <span class="d-block text-yellow-darker mt-plus-3">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="common_selector reviews custom-control-input" value="1" id="rating1">
                                    <label class="custom-control-label" for="rating1">
                                        <span class="d-block text-yellow-darker mt-plus-3">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <h6>Authors</h6>
                        <!-- <div class="search">
                        <label>
                            <input type="email" class="searchAuthor" placeholder="Search Author">
                        </label> -->
                        <div class="checkbox checkbox-primary">
                            <ul class="product-categories">
                                @foreach($users as $user)
                                <li>
                                    <input id="author{{ $user->id }}" class="styled authorSelector" data-class="user_id" name="authors" data-value="{{ $user->id }}" type="radio">
                                    <label style="color: black;" for="author{{ $user->id }}"> {{ $user->name }} </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    <!-- </div> -->
                        <br>

                        <!-- Colors -->
                        <h6>Format</h6>
                        <div class="checkbox checkbox-primary">
                            <ul>
                                <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_hardcover" data-value="1">
                                    <input id="colr1" class="styled" name="format" type="radio">
                                    <label for="colr1"> Hardcover </label>
                                </li>
                                <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_paperback" data-value="1">
                                    <input id="colr2" class="styled" name="format" type="radio">
                                    <label for="colr2"> Paperback </label>
                                </li>
                                <li class="cat-item cat-item-9 cat-parent singleSelector" data-class="is_digital" data-value="1">
                                    <input id="colr3" class="styled" name="format" type="radio">
                                    <label for="colr3"> E-Book </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-md-9">

                    <!-- Short List -->
                    <div class="short-lst">
                        <h2>Book Store</h2>
                        <ul>
                            <!-- Short List -->
                            <li>
                            <p>Showing 1–12 of <span id="books_length"></span> results</p>
                            </li>
                            <!-- Short  -->
                            <li>
                                <select class="selectpicker orderby" name="orderby">
                                    <option value="12" selected>Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                    <option value="48">Show 48</option>
                                    <option value="60">Show 60</option>
                                </select>
                            </li>
                            <!-- by Default -->
                            <!-- <li>
                                <select class="selectpicker">
                                    <option>Sort by Default </option>
                                    <option>Low to High </option>
                                    <option>High to Low </option>
                                </select>
                            </li> -->

                            <!-- Grid Layer -->
                            <!-- <li class="grid-layer"> <a href="#."><i class="fa fa-list margin-right-10"></i></a> <a href="#." class="active"><i class="fa fa-th"></i></a> </li> -->
                        </ul>
                    </div>

                    <!-- Items -->
                    <div class="item-col-4">
                       <div id="filter_grid_data"></div>

                        <!-- pagination -->
                        <ul class="pagination">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
        <div class="container">

            <!-- heading -->
            <div class="heading">
                <h2>Featured Items For You</h2>
                <hr>
            </div>
            <!-- Items Slider -->
            <div class="item-slide-5 with-nav">
            @forelse($featured as $book)
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
                        </span> <a href="{{ route('product', $book->slug) }}" class="tittle">{{ $book->title }}</a> 
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
<div id="minimum_price"></div>
<div id="maximum_price"></div>
@endsection
@section('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
    <script src="js/vendors/jquery.nouislider.min.js"></script>
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
        $("#price-range").noUiSlider({
            range: {
                'min': [0],
                'max': [3000]
            },
            start: [40, 940],
            connect: true,
            serialization: {
                lower: [
                    $.Link({
                        target: $("#price-min")
                    })
                ],
                upper: [
                    $.Link({
                        target: $("#price-max")
                    })
                ],
                format: {
                    decimals: 0,
                    prefix: 'GHS'
                }
            }
        })
        $('.filter-price').on('click',function(){
            var max = $("#price-max").text().replace(/[^0-9]/gi, '');
            var min = $("#price-min").text().replace(/[^0-9]/gi, '');
            $('#maximum_price').val(max);
            $('#minimum_price').val(min);
            show_filtered_data(1);
        })

        $('.common_selector').on('click',function(){
            show_filtered_data(1);
        })
        
        $('.singleSelector').on('click',function(){
            formatField = $(this).data('class');
            formatValue = $(this).data('value');
            show_filtered_data(1);
        })
        $('.genreSelector').on('click',function(){
            // $('.genreSelector').removeAttr('checked');
            // $(this).attr('checked','checked');
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