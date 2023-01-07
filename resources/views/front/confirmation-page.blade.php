@extends('front.layout.index')
@section('content')
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
    </div>
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Shipping Details</h6>
                    </div>
                </li>
                <li class="col-sm-3 current">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 3</span>
                        <h6>Confirmation</h6>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 4</span>
                        <h6>Payment Methods</h6>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <section class="padding-bottom-60">
        <div class="container">
            <div class="pay-method check-out">
                <div class="heading">
                    <h2>Shopping Cart</h2>
                    <hr>
                </div>
                @foreach($orders as $order)
                <?php $book = DB::table('books')->where('id',$order->book_id)->first(); ?>
                <ul class="row check-item">
                    <li class="col-xs-5">
                        <a href="javascript:void(0)" class="thumb"> <img width="100" src="{{ asset($book->hero_image) }}" class="img-responsive" alt="" width="100px"> </a>
                        <span>{{ $book->title }}</span>
                    </li>
                    <li class="col-xs-3 text-center">
                        <p>{{ $order->currency }} {{ $order->total_price }}</p>
                    </li>
                    
                    <li class="col-xs-2 text-center">
                        <p>{{ $order->quantity }} Items</p>
                    </li>
                    <li class="col-xs-2 text-center web">
                        <p>{{ $order->currency }} {{ $order->total_price * $order->quantity }}</p>
                    </li>
                </ul>
                @endforeach
              
                <div class="heading margin-top-50">
                    <h2>Shipping Details</h2>
                    <hr>
                </div>
                <ul class="row check-item infoma">
                    @foreach(unserialize($payment->shipping_detail) as $key => $value)
                    <li class="col-sm-3">
                        <h6>{{ $key }}</h6>
                        <span>{{ $value }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="heading margin-top-50">
                    <h2>Billing Details</h2>
                    <hr>
                </div>
                <ul class="row check-item infoma">
                    @foreach(unserialize($payment->billing_detail) as $key => $value)
                    <li class="col-sm-3">
                        <h6>{{ $key }}</h6>
                        <span>{{ $value }}</span>
                    </li>
                    @endforeach
                </ul>
                
                <div class="totel-price">
                    <tr>
                        <td><p><small> Subtotal with format: </small> {{ $order->currency }} {{ $payment->subtotal }}</p></td>
                        <td><p><small> Shipping Price: </small> {{ $order->currency }} {{ $payment->shipping_price }}</p></td>
                        <td><p><small> Discounted Price: </small> {{ $order->currency }} {{ $payment->discounted_amount }}</p></td>
                        <td><h6><small> Total Amount: </small> {{ $order->currency }} {{ $payment->total_amount }}</h6></td>
                    </tr>
                    
                </div>
            </div>
            <div class="pro-btn">
            @if(Auth::check() && Auth::user()->role == 'pos') 
                <a href="{{ route('pos_payment_success', $payment->id) }}" class="btn-round">Proceed to Payment</a> 
            @else
                <a href="{{ route('payment-method') }}?token=<?= $_GET['token'] ?>" class="btn-round">Proceed to Payment</a> 
            @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
