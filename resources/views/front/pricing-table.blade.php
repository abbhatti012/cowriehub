@extends('front.layout.index')
@section('content')
    <main id="content">
        <div class="container">
            <div class="py-4 py-lg-8">
                <h6 class="font-weight-medium font-size-7 text-center">Pricing Table</h6>
            </div>
            <div class="space-bottom-1 space-bottom-lg-3 pricing-table">
                <div class="row no-gutters-xl pb-lg-3">
                    @forelse($marketing as $point)
                    <div class="col-md-6 col-xl-3">
                        <div class="border border-sh-hover transition-3d-hover space-top-2 px-3 px-wd-7 pb-6 text-center mb-5 mb-xl-0">
                            <div class="mb-5 mb-lg-10 pt-lg-3 pb-lg-1">
                                <h6 class="font-weight-medium font-size-7 mb-3">{{ $point->package }}</h6>
                                <div class="d-flex flex-column">
                                    <div class="mb-3">
                                        <sup class="font-size-2">GHS</sup>
                                        <sub class="font-size-7">{{ $point->price }}</sub>
                                    </div>
                                    <span class="font-size-2 text-gray-600">{{ $point->duration }}</span>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-6 pb-1">
                                @foreach(unserialize($point->point) as $sub)
                                    <li class=" mb-2 pb-1">{{ $sub }}</li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('buy-marketing-package', $point->id) }}" class="btn btn-block btn-dark text-white rounded-0 transition-3d-hover height-60">Get Started</a>
                            </div>
                        </div>
                    </div>
                    @empty
                   @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection