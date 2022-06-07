@extends('admin.layout.index')
@section('content')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Order Reports</a></li>
            </ol>
        </div>
        <div class="row page-titles">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter By</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.order-reports') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Date Range Pick</p>
                                        <input class="form-control input-daterange-datepicker" id="cal" type="text" name="range" value="{{ date('m/d/Y', strtotime($filter['start_date'])) }} - {{ date('m/d/Y', strtotime($filter['end_date'])) }}">
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Users</p>
                                        <select class="form-control" name="user" value="">
                                            <option selected value="" disabled>---Please select User---</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" <?php if($user->id == $filter['user']){echo 'selected';} ?> >{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Location</p>
                                        <select class="form-control" name="location" value="">
                                            <option selected value="" disabled>---Please select Location---</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->location }}" <?php if($location->location == $filter['location']){echo 'selected';} ?> >{{ $location->location }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Payment Method</p>
                                        <select class="form-control" name="payment" value="">
                                            <option selected value="" disabled>---Please select Payment Method---</option>
                                            <option value="flutterwave" <?php if($filter['payment'] == 'flutterwave'){echo 'selected';} ?> >Flutterwave</option>
                                            <option value="cod" <?php if($filter['payment'] == 'cod'){echo 'selected';} ?> >COD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Is Fraud?</p>
                                        <select class="form-control" name="fraud" value="">
                                            <option selected value="" disabled>---Please select One---</option>
                                            <option value="1" <?php if($filter['fraud'] == '1'){echo 'selected';} ?> >Yes</option>
                                            <option value="0" <?php if($filter['fraud'] == '0'){echo 'selected';} ?> >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Is PreOrder?</p>
                                        <select class="form-control" name="pre_order" value="">
                                            <option selected value="" disabled>---Please select One---</option>
                                            <option value="1" <?php if($filter['pre_order'] == '1'){echo 'selected';} ?> >Yes</option>
                                            <option value="0" <?php if($filter['pre_order'] == '0'){echo 'selected';} ?> >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Payment Status</p>
                                        <select class="form-control" name="status" value="">
                                            <option selected value="" disabled>---Please select One---</option>
                                            <option value="cancelled" <?php if($filter['status'] == 'cancelled'){echo 'selected';} ?> >Cancelled</option>
                                            <option value="pending" <?php if($filter['status'] == 'pending'){echo 'selected';} ?> >Pending</option>
                                            <option value="successfull" <?php if($filter['status'] == 'successfull'){echo 'selected';} ?> >Successfull</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('admin.order-reports') }}" class="btn btn-info">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Reports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>View Detail</th>
                                        <th>Transaction ID</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Role</th>
                                        <th>Subtotal</th>
                                        <th>Shipping Price</th>
                                        <th>Amount Paid</th>
                                        <th>Amount to be pay</th>
                                        <th>Status</th>
                                        <th>Is Fraud?</th>
                                        <th>Pay Now</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>
                                        <a href="{{ route('admin.view-order-detail', $payment->payment_id) }}" class="btn btn-warning shadow btn-xs sharp me-1" title="View Detail"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->user_email }}</td>
                                        <td><span class="badge light badge-info">{{ $payment->role }}</span></td>
                                        <td>{{ $payment->subtotal }}</td>
                                        <td>{{ $payment->shipping_price }}</td>
                                        <td>{{ $payment->total_amount }}</td>
                                        <td>{{ round(($payment->total_amount / 100)*$admin_commission, 2) }}</td>
                                        <td>
                                            @if($payment->status == 'cancelled')
                                                <span class="badge light badge-danger">{{ $payment->status }}</span>
                                            @elseif($payment->status == '')
                                                <span class="badge light badge-warning">Pending</span>
                                            @else
                                                <span class="badge light badge-success">{{ $payment->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($payment->is_fraud == 0)
                                                <span class="badge light badge-info">No</span>
                                            @else
                                                <span class="badge light badge-danger">Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if($payment->role == 'admin')
                                                    ---
                                                @else
                                                    @if($payment->status == 'successfull')
                                                        <a href="#" class="btn btn-info shadow btn-xs sharp" title="Pay Now"><i class="fa fa-credit-card"></i></a>
                                                        @else
                                                        ---
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'></script>
<script>
    var dates = [];
    $(document).ready(function() {
        $("#cal").daterangepicker();
    })

</script>
@endsection