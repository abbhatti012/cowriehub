@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Affiliate</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Affiliate</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
            <div class="card-header">
                <h4 class="card-title">Affiliates</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Phone</th>
                                <th>Payment Details</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Referral Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($affiliates as $affiliate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                @if($affiliate)
                                <td>{{ $affiliate->user->phone }}</td>
                                <td>
                                    @if($affiliate->payment)
                                        <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                        data-payment = "{{ $affiliate->payment }}"
                                        data-account_name = "{{ $affiliate->account_name }}"
                                        data-account_number = "{{ $affiliate->account_number }}"
                                        data-networks = "{{ $affiliate->networks }}"
                                        data-bank_account_name = "{{ $affiliate->bank_account_name }}"
                                        data-bank_account_number = "{{ $affiliate->bank_account_number }}"
                                        data-branch = "{{ $affiliate->branch }}"
                                        data-bank_name = "{{ $affiliate->bank_name }}"
                                        title="View Payment Details">View</a>
                                    @endif
                                </td>
                                @else
                                <td>N/A</td>
                                <td>N/A</td>
                                @endif
                                <td>{{ $affiliate->user->name }}</td>
                                <td>{{ $affiliate->user->email }}</td>
                                <td>
                                    {{ $affiliate->user->code }}
                                </td>
                                <td>
                                    @if($affiliate)
                                        <a href="{{ route('admin.delete-affiliate', $affiliate->user_id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want delete Affiliate permanently?')" title="Delete Affiliate"><i class="fa fa-trash"></i></a>
                                        @if($affiliate->status == 0)
                                            <a href="{{ route('admin.approve-affiliate', $affiliate->id) }}" class="btn btn-info shadow btn-xs sharp" title="Approve Affiliate"><i class="fa fa-check"></i></a>
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
<div class="modal fade" id="viewPaymentDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                        <div class="mb-3">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Payment Method</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Branch</th>
                                        <th>Network</th>
                                    </tr>
                                    <tr>
                                        <th>Mobile Money</th>
                                        <td class="payment"></td>
                                        <td class="account_name"></td>
                                        <td class="account_number"></td>
                                        <td class="networks"></td>
                                        <td>---</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Details</th>
                                        <td class="payment"></td>
                                        <td class="bank_account_name"></td>
                                        <td class="bank_account_number"></td>
                                        <td class="branch"></td>
                                        <td class="bank_name"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.viewPaymentDetail').on('click',function(){
                var payment = $(this).data('payment');
                var account_name = $(this).data('account_name');
                var account_number = $(this).data('account_number');
                var bank_account_number = $(this).data('bank_account_number');
                var bank_account_name = $(this).data('bank_account_name');
                var branch = $(this).data('branch');
                var bank_name = $(this).data('bank_name');
                $('.payment').html(payment);
                $('.account_name').html(account_name);
                $('.account_number').html(account_number);
                $('.bank_account_number').html(bank_account_number);
                $('.bank_account_name').html(bank_account_name);
                $('.branch').html(branch);
                $('.bank_name').html(bank_name);
            });
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