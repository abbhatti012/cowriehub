@extends('pos.layout.index')
@section('content')
<style>
    #payUserCommission .table-responsive{
        height: 100px !important;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Book Orders</a></li>
            </ol>
        </div>
        <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pending Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="#!" class="btn btn-primary btn-csv">CSV</a>
                            <a href="#!" class="btn btn-primary btn-excel">Excel</a>
                            <a href="#!" class="btn btn-primary btn-pdf">PDF</a>
                            <a href="#!" class="btn btn-primary btn-print">Print</a>
                            <table id="datatables" class="display" style="min-width: 845px">
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
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        
        });
</script>

    <script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>
@endsection