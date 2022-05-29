@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Book Orders</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Book Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>View Detail</th>
                                        <th>Transaction ID</th>
                                        <th>Location</th>
                                        <th>Precise Location</th>
                                        <th>Email</th>
                                        <th>Subtotal</th>
                                        <th>Shipping Price</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Is Fraud?</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>
                                        <a href="{{ route('admin.view-order-detail', $payment->id) }}" class="btn btn-warning shadow btn-xs sharp me-1" title="View Detail"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ $payment->location }}</td>
                                        <td>{{ $payment->precise_location }}</td>
                                        <td>{{ $payment->email }}</td>
                                        <td>{{ $payment->subtotal }}</td>
                                        <td>{{ $payment->shipping_price }}</td>
                                        <td>{{ $payment->total_amount }}</td>
                                        <td>
                                            @if($payment->status == 'cancelled')
                                                <span class="badge light badge-danger">{{ $payment->status }}</span>
                                            @elseif($payment->status == '')
                                                <span class="badge light badge-warning">Pending</span>
                                            @else
                                                <span class="badge light badge-info">{{ $payment->status }}</span>
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
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp" title="Delete Consultant"><i class="fa fa-trash"></i></a>
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