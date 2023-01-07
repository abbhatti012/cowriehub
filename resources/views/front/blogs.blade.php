@extends('front.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
</style>
<div class="linking">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Blog</li>
        </ol>
    </div>
</div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <section class="blog-page padding-top-30 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                @foreach($blogs as $blog)
                    <div class="blog-post">
                        <article class="row">
                            <div class="col-xs-7"> <img class="img-responsive" src="{{ asset($blog->image) }}" alt=""> </div>
                            <div class="col-xs-5 details"> <span><i class="fa fa-bookmark-o"></i> {{ date("F d Y",strtotime($blog->created_at)) }}</span>
                                <a href="{{ route('blog-detail',$blog->id) }}" class="tittle">{{ $blog->title }}</a>
                                <p>{{ substr($blog->description,0,50) }}</p>
                                <a href="{{ route('blog-detail',$blog->id) }}">Read more</a>
                            </div>
                        </article>
                    </div>
                @endforeach
                    <!-- pagination -->
                    <!-- <ul class="pagination">
                        <li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
                    </ul> -->
                </div>

                <!-- Side Bar -->
                <div class="col-md-3">
                    <div class="shop-side-bar">

                        <!-- Search -->
                        <div class="search">
                            <form>
                                <label>
                                    <input type="email" placeholder="Search here">
                                </label>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Recent Posts -->
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
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection