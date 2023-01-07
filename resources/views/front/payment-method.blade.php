@extends('front.layout.index')
@section('content')
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Payment Method</li>
            </ol>
        </div>
    </div>
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">

                <!-- Step 1 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>

                <!-- Step 2 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Shipping Details</h6>
                    </div>
                </li>

                <!-- Step 3 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 3</span>
                        <h6>Confirmation</h6>
                    </div>
                </li>

                <!-- Step 4 -->
                <li class="col-sm-3 current">
                    <div class="media-left"> <i class="flaticon-business"></i> </div>
                    <div class="media-body"> <span>Step 4</span>
                        <h6>Payment Methods</h6>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Shopping Cart -->
    <section class="padding-bottom-60">
        <form action="{{ route('initialize-payment', $payment->id) }}" method="POST">
            @csrf
        <div class="container">
            <!-- Payout Method -->
            <div class="pay-method">
                <div class="row">
                    <h5>Select One Please</h5>
                    <div class="radio-tile-group">
                        <div class="col-md-6">
                            <!--  bank -->
                            <div class="input-container mb-5">
                                <input id="walk" class="radio-button" type="radio" name="payment_method" value="flutterwave" required />
                                <div class="radio-tile">
                                    <div class="icon walk-icon">
                                        <div class="heading">
                                            <h2>Online Payment</h2>
                                            <hr>
                                        </div>
                                    </div>
                                    <label for="walk" class="radio-tile-label">Pay for book online with Mobile money, Visa or Mastercard.</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/images/visa.png')}}" width="100">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/images/mtn.png')}}" width="100">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/images/airteltigo.png')}}" width="100">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/images/vodacash.png')}}" width="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- cash on delivery -->

                            <div class="input-container mb-5">
                                <input id="bike" class="radio-button" type="radio" name="payment_method" value="cod" required />
                                <div class="radio-tile">
                                    <div class="icon bike-icon">
                                        <div class="heading">
                                            <h2>Cash On Delivery</h2>
                                            <hr>
                                        </div>
                                    </div>
                                    <label for="bike" class="radio-tile-label">Pay with cash upon delivery. <br><br><br><span class="text-danger">Note: Cash on Delivery is restricted to only deliveries made within Greater Accra Region</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="pro-btn"> 
                <button type="submit" class="btn-round">Complete Purchase</button> 
            </div>
        </div>
    </form>
    </section>
@endsection
@section('scripts')

@endsection
