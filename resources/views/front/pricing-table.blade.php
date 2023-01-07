@extends('front.layout.index')
@section('content')
<div id="generic_price_table">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        <h1>Pricing Table</h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @forelse($marketing as $point)
                <div class="col-md-3">
                    <div class="generic_content clearfix bronze">
                        <div class="generic_head_price clearfix">
                            <div class="generic_head_content clearfix">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>{{ $point->package }}</span>
                                </div>
                            </div>
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">GHS</span>
                                    <span class="currency">{{ $point->price }}</span>
                                    <!-- <span class="cent">.99</span> -->
                                    <span class="month">/{{ $point->duration }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="generic_feature_list">
                            <ul>
                                @foreach(unserialize($point->point) as $sub)
                                    <li>{{ $sub }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="generic_price_btn clearfix">
                            <a href="{{ route('buy-marketing-package', $point->id) }}">Get Started</a>
                        </div>
                    </div>
                </div>
                @empty
            @endforelse
            </div>
        </div>
    </section>
</div>
@endsection