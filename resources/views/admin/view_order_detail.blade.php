@extends('admin.layout.index')
@section('content')
<style>
    .outCampaign{
        display: none;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Order Details</a></li>
            </ol>
        </div>
            <div class="col-12">
            <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order Details</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
             
              <div class="row">
                <div class="col-12">
                <h4 class="text-primary"><i class="fas fa-book"></i> Payment Details</h4>
                    <p class="text-muted"></p>
                    <div class="post">                     
                        <p><b>Transactio ID:&emsp;</b>{{ $payment->transaction_id }}</p>
                        <p><b>Location:&emsp;</b>{{ $payment->location }}</p>
                        <p><b>Precise Location:&emsp;</b>{{ $payment->precise_location }}</p>
                        <p><b>post code:&emsp;</b>{{ $payment->post_code }}</p>
                        <p><b>Subtotal:&emsp;</b>{{ $payment->subtotal }}</p>
                        <p><b>Shipping Price:&emsp;</b>{{ $payment->shipping_price }}</p>
                        <p><b>Total Amount:&emsp;</b>{{ $payment->total_amount }}</p>
                        <p><b>Amount Paid:&emsp;</b>{{ $payment->amount_paid }}</p>
                        <p><b>Status:&emsp;</b>@if($payment->status == '') Pending @else {{ $payment->status }} @endif</p>
                        <p><b>Fraud?:&emsp;</b>@if($payment->fraud == 0) No Fraud @else Fraud Detected @endif</p>
                        <p><b>Payment Method:&emsp;</b>{{ $payment->payment_method }}</p>
                    </div>
                </div> 
                <div class="col-12"><hr>
                <div class="table-responsive mb-4">
                    <h4 class="text-primary"><i class="fas fa-plus"></i> Book Order Detail</h4>
                    <p class="text-muted"></p>
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th>
                                    <a href="javascript:void(0)" class="btn btn-warning shadow btn-xs sharp me-1" title="View Detail"><i class="fa fa-eye"></i></a>
                                    </th>
                                    <th>Is Pre Order?</th>
                                    <th>Extra Type</th>
                                    <th>Book Original Price</th>
                                    <th>Extra Price</th>
                                    <th>Shipping Price</th>
                                    <th>Amount Paid</th>
                                    <th>Remaining Price</th>
                                    <th>Currency</th>
                                    <th>Exchange Rate</th>
                                    <th>Quantity</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.view-book-detail',$order->book_id) }}" class="btn btn-info shadow btn-xs sharp" target="_blank" title="Vide Detail"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                    <td>@if($order->is_preorder == 0) No @else Yes @endif</td>
                                    <td>{{ $order->extra_type }}</td>
                                    <td>{{ $order->book_price }}</td>
                                    <td>{{ $order->extra_price }}</td>
                                    <td>{{ $payment->shipping_price }}</td>
                                    <td>{{ $order->amount_paid }}</td>
                                    <td>{{ $order->remaining_price }}</td>
                                    <td>{{ $order->currency }}</td>
                                    <td>{{ $order->exchange_rate }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <!-- <td>
                                        @if($order->remaining_price > 0)
                                        <div class="d-flex">
                                            <a href="javascript:void(0)" class="btn btn-info shadow sharp" title="Ask to pay">Ask to pay</a>
                                        </div>
                                        @else
                                            ---
                                        @endif
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </div><hr>
            @php
                $billing = unserialize($payment->billing_detail);
                $shipping = unserialize($payment->shipping_detail);
            @endphp
                <div class="row col-12">
                    <div class="col-4">
                        <h4 class="text-primary"><i class="fas fa-book"></i> Billing Details</h4>
                        <p class="text-muted"></p>
                        <div class="post">                     
                            <p><b>Billing First Name:&emsp;</b>{{ $billing['first_name'] }}</p>
                            <p><b>Billing Last Name:&emsp;</b>{{ $billing['last_name'] }}</p>
                            <p><b>Billing Address:&emsp;</b>{{ $billing['billing_address'] }}</p>
                            <p><b>Country:&emsp;</b>{{ $billing['country'] }}</p>
                            <p><b>Billing Email:&emsp;</b>{{ $billing['email'] }}</p>
                            <p><b>Billing Phone:&emsp;</b>{{ $billing['phone'] }}</p>
                            <p><b>Additional Comments:&emsp;</b>{{ $billing['notes'] }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <h4 class="text-primary"><i class="fas fa-book"></i> Shipping Details</h4>
                        <p class="text-muted"></p>
                        <div class="post">                     
                            <p><b>Shipping First Name:&emsp;</b>{{ $shipping['first_name'] }}</p>
                            <p><b>Shipping Last Name:&emsp;</b>{{ $shipping['last_name'] }}</p>
                            <p><b>Shipping Address:&emsp;</b>{{ $shipping['shipping_address'] }}</p>
                            <p><b>Country:&emsp;</b>{{ $shipping['country'] }}</p>
                            <p><b>Shipping Email:&emsp;</b>{{ $shipping['email'] }}</p>
                            <p><b>Shipping Phone:&emsp;</b>{{ $shipping['phone'] }}</p>
                            <p><b>Additional Comments:&emsp;</b>{{ $shipping['notes'] }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <h4 class="text-primary"><i class="fas fa-user"></i> User Details</h4>
                        <p class="text-muted"></p>
                        <div class="post">
                            @if($user)
                            <p><b>User Name:&emsp;</b>{{ $user->name }}</p>
                            <p><b>User Email:&emsp;</b>{{ $user->email }}</p>
                            <p><b>User Role:&emsp;</b>{{ $user->role }}</p>
                            @else
                            <p><b>Guest</b></p>
                            @endif
                        </div>
                    </div> 
                </div>
            </div>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts') 

@endsection