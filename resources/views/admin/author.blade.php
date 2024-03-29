@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Authors</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Authors</li>
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
                <h4 class="card-title">Authors</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Profile</th>
                            <th>Phone</th>
                            <th>Payment Details</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse($authors as $author)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                @if($author)
                                <td>
                                    <a href="{{ asset($author->cover) }}" target="_blank"><img width="100" src="{{ asset($author->cover) }}" alt=""></a>
                                </td>
                                <td>{{ $author->user->phone }}</td>
                                <td>
                                    @if($author->payment)
                                        <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                        data-payment = "{{ $author->payment }}"
                                        data-account_name = "{{ $author->account_name }}"
                                        data-account_number = "{{ $author->account_number }}"
                                        data-networks = "{{ $author->networks }}"
                                        data-bank_account_name = "{{ $author->bank_account_name }}"
                                        data-bank_account_number = "{{ $author->bank_account_number }}"
                                        data-branch = "{{ $author->branch }}"
                                        data-bank_name = "{{ $author->bank_name }}"
                                        title="View Payment Details">View</a>
                                    @endif
                                </td>
                                @else
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                @endif
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>
                                    @if($author)
                                    <a href="{{ route('admin.edit.author', $author->id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Update Author"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.delete-author', $author->user_id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want delete author permanently?')" title="Delete Author"><i class="fa fa-trash"></i></a>
                                    @if($author->status == 0)
                                        <a href="{{ route('admin.approve-author', $author->id) }}" class="btn btn-info shadow btn-xs sharp" title="Approve Author"><i class="fa fa-check"></i></a>
                                    @endif
                                    @endif
                                    <a href="{{ route('author-detail', $author->user_id) }}" target="_blank" class="btn btn-warning shadow btn-xs sharp me-1" title="View Author"><i class="fa fa-eye"></i></a>
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