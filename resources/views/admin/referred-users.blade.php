@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">All Referred Users</a></li>
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
                        <h4 class="card-title">All Referred Users</h4>
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <!-- <th>Affiliate Phone</th>
                                        <th>Affiliate Email</th> -->
                                        <th>Total Purchases</th>
                                        <th>Successful Orders/Payments</th>
                                        <th>Pending Orders/Payments</th>
                                        <th>Cancelled Orders/Payments</th>
                                        <th>User Purchases</th>
                                        <th>Affiliate Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($referred_users as $user)
                                <?php 
                                    $affiliateUser = DB::table('users')->where('id',$user->referrer_id)->first();
                                    $posUser = DB::table('pos')->where('user_id',$user->current_user_id)->first();
                                ?>
                                    <tr>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($posUser)
                                                POS
                                            @else
                                                general user
                                            @endif
                                        </td>
                                        <!-- @if($user->affiliate_user)
                                            <td>{{ $affiliateUser->phone }}</td>
                                            <td>{{ $affiliateUser->email }}</td>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif -->
                                        <td>{{ $user->total_orders }}</td>
                                        <td>{{ $user->successful_orders }}/{{ $user->successful_payments }}</td>
                                        <td>{{ $user->pending_orders }}/{{ $user->pending_payment }}</td>
                                        <td>{{ $user->cancelled_orders }}/{{ $user->cancelled_payment }}</td>
                                        <td>
                                            @if($user->total_orders > 0)
                                            <a href="{{ route('get-purchases') }}?id={{ $user->current_user_id }}" target="_blank" class="text-primary" data-id="{{ $user->current_user_id }}"
                                                title="View User Purchases">view</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($affiliateUser)
                                            <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                            data-name = "{{ $affiliateUser->name }}"
                                            data-email = "{{ $affiliateUser->email }}"
                                            data-phone = "{{ $affiliateUser->phone }}"
                                            data-code = "{{ $affiliateUser->code }}"
                                            title="View Details">View</a>
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
<div class="modal fade" id="viewPaymentDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Affiliate Detail</h5>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Code</th>
                                    </tr>
                                    <tr>
                                        <td class="name"></td>
                                        <td class="email"></td>
                                        <td class="phone"></td>
                                        <td class="code"></td>
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
<div class="modal fade" id="viewUserPurchases">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Purchases</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body iframeHere">
                    
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
                var name = $(this).data('name');
                var email = $(this).data('email');
                var phone = $(this).data('phone');
                var code = $(this).data('code');
                $('.name').html(name);
                $('.email').html(email);
                $('.phone').html(phone);
                $('.code').html(code);
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