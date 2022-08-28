@extends('admin.layout.index')
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Book Orders</h4>
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
                                        <th>View Detail</th>
                                        <th>Transaction ID</th>
                                        <th>Location</th>
                                        <th>Precise Location</th>
                                        <th>Email</th>
                                        <th>Subtotal</th>
                                        <th>Shipping Price</th>
                                        <th>Total Amount</th>
                                        <th>Is POS Order?</th>
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
                                            @if($payment->is_pos)
                                            <span class="badge light badge-success">Yes</span>
                                            @else
                                            <span class="badge light badge-info">No</span>
                                            @endif
                                        </td>
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
                                            @if($payment->is_pos == 1 && $payment->is_pos_payment == 0)
                                                <a href="javascript:void(0)" class="text-primary payUserCommission" data-id="{{ $payment->id }}" data-is_pos="1"  data-bs-toggle="modal" data-bs-target="#payUserCommission">View Order Detail</a>
                                            @elseif($payment->is_pos == 1 && $payment->is_pos_payment == 2)
                                                <span class="badge light badge-danger">Cancelled</span>
                                            @elseif($payment->is_pos == 1 && $payment->is_pos_payment == 1)
                                                <a href="javascript:void(0)" class="text-primary payUserCommission" data-id="{{ $payment->id }}" data-is_pos="0" data-bs-toggle="modal" data-bs-target="#payUserCommission">Pay User Comission</a>
                                            @else
                                                @if($payment->status == 'pending' || $payment->status == '')
                                                    <a href="{{ route('admin.update-payment-status', $payment->id) }}" onclick="return confirm('Are you sure you want to approve the payment?')" class="btn btn-info shadow btn-xs sharp" title="Approve Payment"><i class="fa fa-check"></i></a>
                                                @elseif($payment->status == 'successfull')
                                                    <a href="javascript:void(0)" class="text-primary payUserCommission" data-id="{{ $payment->id }}" data-is_pos="0" data-bs-toggle="modal" data-bs-target="#payUserCommission">Pay User Comission</a>
                                                @endif
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

<div class="modal fade" id="payUserCommission">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pay Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="reveneuModel"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="payNow">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="basic-validation" action="{{ route('admin.submit-author-payment-proof') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form custom_file_input">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Payment Proof Screenshot</span>
                            <div class="form-file">
                                <input type="file" name="payment_proof" class="form-file-input form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="basic-form custom_file_input">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Additional Note</span>
                            <div class="form-file">
                                <textarea name="payment_note" class="form-file-input form-control"  required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="0" name="revenueId" id="revenueId">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitProof">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.payUserCommission').on('click',function(){
            var id = $(this).data('id');
            var is_pos = $(this).data('is_pos');
            $.ajax({
                type : 'GET',
                url : '{{ route("admin.get-revenue-per-order") }}?id='+id+'&is_pos='+is_pos,
                success : function(data){
                    $('.reveneuModel').html(data);
                }
            });
        });
        $(document).on('click','.paymentProof',function(){
            var id = $(this).data('id');
            $('#revenueId').val(id);
        })
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