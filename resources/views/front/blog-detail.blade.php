@extends('front.layout.index')
@section('content')
    <section class="blog-single padding-top-30 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-post">
                        <article> <img style="width: 100%;" class="img-responsive margin-bottom-20" src="{{ asset($blog->image) }}" alt=""> 
                            <span><i class="fa fa-bookmark-o"></i>{{ date("F d Y",strtotime($blog->created_at)) }}</span>
                            <h5>{{ $blog->title }}</h5>
                            <p>{{ substr($blog->description,0,50) }}</p>
                        </article>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="shop-side-bar">
                        <div class="search">
                            <form>
                                <label>
                                    <input type="email" placeholder="Search here">
                                </label>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <h6>Recent Posts</h6>
                        <div class="recent-post">

                        @foreach($recent_blogs as $blog)
                            <div class="media">
                                <div class="media-left"> <a href="{{ route('blog-detail',$blog->id) }}"><img class="img-responsive" src="{{ asset($blog->image) }}" alt=""> </a> </div>
                                <div class="media-body"> <a href="{{ route('blog-detail',$blog->id) }}">{{ $blog->title }}</a> <span>{{ date("F d Y",strtotime($blog->created_at)) }} </span></div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection