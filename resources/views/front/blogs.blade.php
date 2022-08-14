@extends('front.layout.index')
@section('content')
    <div class="page-header border-bottom mb-8">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Blog</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="" class="h-primary">Blogs</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
   
    <div class="tab-content">
        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @forelse($blogs as $blog)
                <div class="col">
                    <div class="mb-5">
                        <a class="d-block mb-3" href="{{ route('blog-detail',$blog->id) }}">
                            <img class="img-fluid" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <h6 class="font-size-26 crop-text-2 font-weight-medium text-lh-1dot4">
                            <a href="{{ route('blog-detail',$blog->id) }}">{{ $blog->title }}</a>
                        </h6>
                        <p class="font-size-2 text-secondary-gray-700">{{ $blog->description }}</p>
                        <div class="font-size-2 text-secondary-gray-700">
                            <span>{{ $blog->created_at }}</span>
                        </div>
                    </div>
                </div>
                @empty
               @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
   
@endsection