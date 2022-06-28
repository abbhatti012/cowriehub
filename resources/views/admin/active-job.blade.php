@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Assign Job</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Active Jobs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>User Payment Detail</th>
                                        <th>User Detail</th>
                                        <th>Marketing Detail</th>
                                        <th>Consultant Note</th>
                                        <th>Job Status</th>
                                        <th>All Documents</th>
                                        <th>Remove Job</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($jobs as $job)
                                    <tr>
                                        <td>
                                            @if($job->consultant->payment)
                                                <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                                data-payment = "{{ $job->consultant->payment }}"
                                                data-account_name = "{{ $job->consultant->account_name }}"
                                                data-account_number = "{{ $job->consultant->account_number }}"
                                                data-networks = "{{ $job->consultant->networks }}"
                                                data-bank_account_name = "{{ $job->consultant->bank_account_name }}"
                                                data-bank_account_number = "{{ $job->consultant->bank_account_number }}"
                                                data-branch = "{{ $job->consultant->branch }}"
                                                data-bank_name = "{{ $job->consultant->bank_name }}"
                                                title="View Payment Detail">View</a>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="javascript:void(0)" class="text-primary viewUserDetail" data-bs-toggle="modal" data-bs-target="#viewUserDetail"
                                            data-name = "{{ $job->user->name }}"
                                            data-email = "{{ $job->user->email }}"
                                            data-phone_number = "{{ $job->consultant->phone_number }}"
                                            data-country = "{{ $job->consultant->country }}"
                                            data-address = "{{ $job->consultant->address }}"
                                            title="View User Detail">View</a>
                                        </td>
                                        <td>
                                        <a href="javascript:void(0)" class="text-primary viewMarketingDetail" data-bs-toggle="modal" data-bs-target="#viewMarketingDetail"
                                            data-package = "{{ $job->marketing->package }}"
                                            data-price = "{{ $job->marketing->price }}"
                                            data-duration = "{{ $job->marketing->duration }}"
                                            title="View User Detail">View</a>
                                        </td>
                                        <td><p>{{ $job->document_note }}</p></td>
                                        <td><a href="javascript:void(0)" class="text-info"> ACTIVE </a></td>
                                        <td>
                                            @forelse(unserialize($job->document) as $doc)
                                            <a href="javascript:void(0)" class="text-primary viewDocument" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#viewDocument" 
                                            data-url = "{{ asset($doc) }}"
                                            title="View User Detail"><span class="fa fa-upload"></span></a>
                                            @empty
                                            @endforelse
                                        </td>
                                        <td><a href="{{ route('admin.remove-job', $job->id) }}" class="text-danger" onclick="return confirm('Are you sure you want delete consultant?')" title="Remove Consultant">Remove</a></td>
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
                                        <th>Bank / Account Name</th>
                                        <th>Bank / Account Number</th>
                                        <th>Branch</th>
                                        <th>Bank Name / Mobile Money Networks</th>
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
                                        <th>Bank Settelments</th>
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
<div class="modal fade" id="viewUserDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User User Detail</h5>
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
                                        <th>---</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                    </tr>
                                    <tr>
                                        <th>User Detail</th>
                                        <td class="name"></td>
                                        <td class="email"></td>
                                        <td class="phone_number"></td>
                                        <td class="country"></td>
                                        <td class="address"></td>
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
<div class="modal fade" id="viewMarketingDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Marketing Detail</h5>
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
                                        <th>---</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                    </tr>
                                    <tr>
                                        <th>Job Package Detail</th>
                                        <td class="package"></td>
                                        <td class="price"></td>
                                        <td class="duration"></td>
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
<div class="modal fade" id="viewDocument">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body iframeDocumentHere">
                    
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
            $('.viewDocument').on('click',function(){
                var url = $(this).data('url');
                $('.iframeDocumentHere').html('<iframe style="width: 100%; height: 350px;" src="'+url+'"></iframe>');
            })
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
            $('.viewUserDetail').on('click',function(){
                var name = $(this).data('name');
                var email = $(this).data('email');
                var phone_number = $(this).data('phone_number');
                var country = $(this).data('country');
                var address = $(this).data('address');
                $('.name').html(name);
                $('.email').html(email);
                $('.phone_number').html(phone_number);
                $('.country').html(country);
                $('.address').html(address);
            });
            $('.viewMarketingDetail').on('click',function(){
                var package = $(this).data('package');
                var price = $(this).data('price');
                var duration = $(this).data('duration');
                $('.package').html(package);
                $('.price').html(price);
                $('.duration').html(duration);
            });
            $(document).on('change','#marketing_id',function(){
                $('#user_id').val($('#marketing_id option:selected').data('user_id'));
            });
        })
    </script>
@endsection