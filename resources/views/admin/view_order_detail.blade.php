@extends('admin.layout.index')
@section('content')
<style>
    .outCampaign{
        display: none;
    }
    .labelBarCode div:first-child{
        left: 50%;
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
                <div class="col-6">
                    <h4 class="text-primary"><i class="fas fa-book"></i> Payment Details</h4>
                    <p class="text-muted"></p>
                    <div class="post">                     
                        <p><b>Transaction ID:&emsp;</b>{{ $payment->transaction_id }}</p>
                        <p><b>Location:&emsp;</b>{{ $payment->location }}</p>
                        <p><b>Precise Location:&emsp;</b>{{ $payment->precise_location }}</p>
                        <p><b>Post Code:&emsp;</b>{{ $payment->post_code }}</p>
                        <p><b>Subtotal:&emsp;</b>{{ $payment->subtotal }}</p>
                        <p><b>Shipping Price:&emsp;</b>{{ $payment->shipping_price }}</p>
                        <p><b>Total Amount:&emsp;</b>{{ $payment->total_amount }}</p>
                        <p><b>Amount Paid:&emsp;</b>{{ $payment->amount_paid }}</p>
                        <p><b>Status:&emsp;</b>@if($payment->status == '') Pending @else {{ $payment->status }} @endif</p>
                        <p><b>Fraud?:&emsp;</b>@if($payment->fraud == 0) No Fraud @else Fraud Detected @endif</p>
                        <p><b>Payment Method:&emsp;</b>{{ $payment->payment_method }}</p>
                    </div>
                </div>
                @php
                    $billing = unserialize($payment->billing_detail);
                    $shipping = unserialize($payment->shipping_detail);
                @endphp
                <div class="col-6">
                    <div class="card">
                        <h4 class="text-primary"><i class="fas fa-book"></i> Shipping Label</h4>
                        <div class="body" id="labelPrint">
                            <div class="row clearfix" style="margin: 5px; font-weight: bolder">
                            <div style="text-align: center; margin-bottom: 0px;">
                                <h3 class="boxFont">CowrieHub</h3>
                            </div>
                            <div class="table-responsive" style="margin: 0px; padding: 0px; font-size: 16px;">
                                <table class="table table-bordered" style="padding: 0px;">
                                <tbody><tr>
                                    <td><b>Name:</b></td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Address:</b></td>
                                    <td>{{ $payment->precise_location }}</td>
                                </tr>
                                <tr>
                                    <td><b>Phone:</b></td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email:</b></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Cost (GHS):</b></td>
                                    <td>{{ $payment->total_amount }}</td>
                                </tr>
                                </tbody></table>
                                @if(!empty($payment->transaction_id))
                                    <div class="mb-3 labelBarCode">
                                        <center>{!! DNS1D::getBarcodeSVG($payment->transaction_id, 'C39',0.9,50,'black',true) !!}</center>
                                    </div>
                                @endif
                            </div>
                            </div>  
                        </div>
                        <div class="footer">
                            <button type="button" onclick="pdf('#labelPrint', '85TC5MXFVSWMPBFW.pdf')" class="btn btn-xs btn-info waves-effect" style="margin: 15px;">
                                <i class="fa fa-print"></i>
                            </button>
                        </div>
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
                                    <th>Book Type</th>
                                    <th>Book Original Price</th>
                                    <th>Book Type Price</th>
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
            
                <div class="row col-12">
                    @if($billing)
                    <div class="col-4">
                        <h4 class="text-primary"><i class="fas fa-book"></i> Billing Address</h4>
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
                    @endif
                    @if($shipping)
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
                    @endif
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
    <script>
        function pdf(selector, filename){
            $('body').css({ display: 'none' });
            $('#printButton').css({ display: 'none' });
            let content = $(selector).clone();
            $('body').before(content);
            window.print();
            $(selector).first().remove();
            $('body').css({ display: '' });
            $('#printButton').css({ display: '' })
        }
    </script>
@endsection