@extends('pos.layout.index')
@section('content')
<style>
    #payUserCommission .table-responsive{
        height: 100px !important;
    }
</style>
<div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Pending Invoices</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active">Pending Invoices</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">All Pending Invoices</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                        <thead>
                                    <tr>
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
                                            @if($payment->is_pos_payment == 0)
                                                <a href="javascript:void(0)" 
                                                onclick="window.open('<?= route('pos.pay-now', $payment->id) ?>','popUpWindow','position=absolute,height=600,width=600,left=50%,top=50%,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');"
                                                class="text-info" title="Pay Now">PAY NOW</a>
                                            @elseif($payment->is_pos_payment === 1)
                                            <span class="badge light badge-success">Payment Made</span>
                                            @elseif($payment->is_pos_payment === 2)
                                            <span class="badge light badge-danger">Cancelled</span>
                                            @endif
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

@endsection
@section('scripts')


@endsection