@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">POS</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">POS</li>
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
                <h4 class="card-title">Pos</h4>
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
                                <th>Referred Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                @if($user->user)
                                <td>{{ $user->company_phone }}</td>
                                <td>
                                    @if($user->payment)
                                        <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                        data-payment = "{{ $user->payment }}"
                                        data-account_name = "{{ $user->account_name }}"
                                        data-account_number = "{{ $user->account_number }}"
                                        data-networks = "{{ $user->networks }}"
                                        data-bank_account_name = "{{ $user->bank_account_name }}"
                                        data-bank_account_number = "{{ $user->bank_account_number }}"
                                        data-branch = "{{ $user->branch }}"
                                        data-bank_name = "{{ $user->bank_name }}"
                                        title="View Payment Details">View</a>
                                    @endif
                                </td>
                                @else
                                <td>N/A</td>
                                <td>N/A</td>
                                @endif
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>
                                    {{ $user->referrel_code }}
                                </td>
                                <td>
                                    @if($user)
                                            <a href="{{ route('admin.delete-pos', $user->user_id) }}" onclick="return confirm('Are you sure you want delete POS?')" class="btn btn-danger shadow btn-xs sharp" title="Delete POS"><i class="fa fa-trash"></i></a>
                                        @if($user->status == 0)
                                            <a href="{{ route('admin.approve-pos', $user->id) }}" class="btn btn-info shadow btn-xs sharp" title="Approve POS"><i class="fa fa-check"></i></a>
                                        @endif
                                        @if($user->status == 1)
                                            <a href="{{ route('admin.disapprove-pos', $user->id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want disable POS?')" title="Disapprove POS"><i class="fa fa-times"></i></a>
                                        @endif
                                        <a href="{{ route('admin.edit-pos', $user->id) }}" class="btn btn-success shadow btn-xs sharp" title="Update POS Account"><i class="fa fa-pencil"></i></a>
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
    
@endsection