@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Authors</a></li>
            </ol>
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
                            <a href="#!" class="btn btn-primary btn-csv">CSV</a>
                            <a href="#!" class="btn btn-primary btn-excel">Excel</a>
                            <a href="#!" class="btn btn-primary btn-pdf">PDF</a>
                            <a href="#!" class="btn btn-primary btn-print">Print</a>
                            <table id="datatables" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Profile</th>
                                        <th>Phone</th>
                                        <th>Bank Details</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($authors as $author)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        @if($author->author_detail)
                                        <td>
                                            <a href="{{ asset($author->author_detail->cover) }}" target="_blank"><img width="100" src="{{ asset($author->author_detail->cover) }}" alt=""></a>
                                        </td>
                                        <td>{{ $author->author_detail->phone }}</td>
                                        <td>
                                            @if($author->author_detail->payment)
                                                <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                                data-payment = "{{ $author->author_detail->payment }}"
                                                data-account_name = "{{ $author->author_detail->account_name }}"
                                                data-account_number = "{{ $author->author_detail->account_number }}"
                                                data-networks = "{{ $author->author_detail->networks }}"
                                                data-bank_account_name = "{{ $author->author_detail->bank_account_name }}"
                                                data-bank_account_number = "{{ $author->author_detail->bank_account_number }}"
                                                data-branch = "{{ $author->author_detail->branch }}"
                                                data-bank_name = "{{ $author->author_detail->bank_name }}"
                                                title="View Payment Detail">View</a>
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
                                            <div class="d-flex">
                                                @if($author->author_detail)
                                                    <a href="{{ route('admin.edit.author', $author->author_detail->id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Update Author"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.delete-author', $author->author_detail->user_id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Author"><i class="fa fa-trash"></i></a>
                                                @endif
                                                <a href="{{ route('author-detail', $author->id) }}" target="_blank" class="btn btn-warning shadow btn-xs sharp me-1" title="View Author"><i class="fa fa-eye"></i></a>
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
<div class="modal fade" id="viewPaymentDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Detail</h5>
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
                                        <th>Bank Info</th>
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