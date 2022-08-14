@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Consultants</h4>
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
                                        <th>Payment Detail</th>
                                        <th>User Detail</th>
                                        <th>Skill</th>
                                        <th>Skill Certificate</th>
                                        <th>Institution</th>
                                        <th>Years of completion</th>
                                        <th>ID Type</th>
                                        <th>Identity Card</th>
                                        <th>About Consultant</th>
                                        <th>Portfolio</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($consultants as $consultant)
                                    <tr>
                                        <td>
                                            @if($consultant->payment)
                                                <a href="javascript:void(0)" class="text-primary viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                                data-payment = "{{ $consultant->payment }}"
                                                data-account_name = "{{ $consultant->account_name }}"
                                                data-account_number = "{{ $consultant->account_number }}"
                                                data-networks = "{{ $consultant->networks }}"
                                                data-bank_account_name = "{{ $consultant->bank_account_name }}"
                                                data-bank_account_number = "{{ $consultant->bank_account_number }}"
                                                data-branch = "{{ $consultant->branch }}"
                                                data-bank_name = "{{ $consultant->bank_name }}"
                                                title="View Payment Detail">View</a>
                                            @else
                                            ---
                                            @endif
                                        </td>
                                        <td>
                                        <a href="javascript:void(0)" class="text-primary viewUserDetail" data-bs-toggle="modal" data-bs-target="#viewUserDetail"
                                            data-phone_number = "{{ $consultant->phone_number }}"
                                            data-country = "{{ $consultant->country }}"
                                            data-address = "{{ $consultant->address }}"
                                            title="View User Detail">View</a>
                                        </td>
                                        <td>
                                            @if($consultant->custom_skill != '')
                                            {{ $consultant->custom_skill }}
                                            @else
                                            {{ $consultant->skill }}
                                            @endif
                                        </td>
                                        <td><a class="btn btn-success shadow btn-xs sharp me-1 viewDocument" data-bs-toggle="modal" data-bs-target="#viewDocument" href="" data-url="{{ asset($consultant->skill_certificate) }}"><span class="fa fa-download"></span></a></td>
                                        <td>{{ $consultant->institution }}</td>
                                        <td>{{ $consultant->year_of_completion }}</td>
                                        <td>{{ $consultant->id_type }}</td>
                                        <td><a class="btn btn-success shadow btn-xs sharp me-1 viewDocument" data-bs-toggle="modal" data-bs-target="#viewDocument" href="" data-url="{{ asset($consultant->identity_card) }}"><span class="fa fa-download"></span></a></td>
                                        <td><a class="btn btn-success shadow btn-xs sharp me-1 viewDocument" data-bs-toggle="modal" data-bs-target="#viewDocument" href="" data-url="{{ asset($consultant->intro_viedo) }}"><span class="fa fa-download"></span></a></td>
                                        <td><a class="btn btn-success shadow btn-xs sharp me-1 viewDocument" data-bs-toggle="modal" data-bs-target="#viewDocument" href="" data-url="{{ asset($consultant->portfolio) }}"><span class="fa fa-download"></span></a></td>
                                        <td><p id="viewMore{{ $consultant->id }}">{{ substr($consultant->description,0,60) }}... <span><a href="javascript:void(0)" class="text-primary  viewMore" data-id="{{ $consultant->id }}">More</a></span>
                                            <p style="display:none;" id="viewLess{{ $consultant->id }}">{{ $consultant->description }}...<span><a href="javascript:void(0)" class="text-primary viewLess" data-id="{{ $consultant->id }}">Less</a></span></p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if($consultant->status == 0)
                                                    <a href="{{ route('consultant.update-consultant-status', [$consultant->id, 1]) }}" onclick="return confirm('Are you sure you want to approve as consultant?')" class="btn btn-success shadow btn-xs sharp me-1" title="Approve Consultant"><i class="fa fa-check"></i></a>
                                                @else
                                                    <a href="{{ route('consultant.update-consultant-status', [$consultant->id, 0]) }}" onclick="return confirm('Are you sure you want the disapprove as consultant?')" class="btn btn-danger shadow btn-xs sharp me-1" title="Disapprove Consultant"><i class="fa fa-times"></i></a>
                                                @endif
                                                <a href="{{ route('consultant.delete-consultant', $consultant->id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want delete consultant?')" title="Delete Consultant"><i class="fa fa-trash"></i></a>
                                                <a href="{{ route('admin.update-consultant', $consultant->id) }}" class="btn btn-info shadow btn-xs sharp" title="Update Consultant"><i class="fa fa-pencil"></i></a>
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
<div class="modal fade" id="paymentProof">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="basic-validation" action="{{ route('admin.submit-payment-proof') }}" method="POST" enctype="multipart/form-data">
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
                <input type="hidden" value="0" name="marketingId" id="marketingId">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitProof">Submit</button>
                </div>
            </div>
        </form>
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
            <div class="modal-body iframeHere">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><a class="downloadDocument" href="" download>Download</a></button>
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
<div class="modal fade" id="viewUserDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Consultant Detail</h5>
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
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                    </tr>
                                    <tr>
                                        <th>User Detail</th>
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
<div class="modal fade" id="assignJobModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">All Pending Jobs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div style="display: none;" class="alert alert-success newJobAssigned">
                            <p>Job has been assigned successfully!</p>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th>Package</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Total Price</th>
                                            <th>Duration</th>
                                        </tr>
                                        @forelse($jobs as $job)
                                        <tr>
                                            <td><input type="radio" name="job" id="{{ $job->market_id }}" value="{{ $job->market_id }}"></td>
                                            <td>{{ $job->package }}</td>
                                            <td>{{ $job->first_name }} / {{ $job->last_name }}</td>
                                            <td>{{ $job->email }}</td>
                                            <td>{{ $job->phone }}</td>
                                            <td>{{ $job->price }}</td>
                                            <td>{{ $job->duration }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary assignNow">Assign</button>
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
        var consultantId = 0;
        $('.viewDocument').on('click',function(){
            var url = $(this).data('url');
            $('.iframeHere').html('<iframe style="width:100%; height: 400px;" src="'+url+'"></iframe>');
            $('.downloadDocument').attr('href',url);
        });
        $('.viewMore').on('click',function(){
            var id = $(this).data('id');
            $('#viewMore'+id).hide();
            $('#viewLess'+id).show();
        });
        $('.viewLess').on('click',function(){
            var id = $(this).data('id');
            $('#viewLess'+id).hide();
            $('#viewMore'+id).show();
        });
        $('.assignJob').on('click',function(){
            consultantId = $(this).data('id');
        });
        $(document).on('click','.assignNow',function(){
            var job_id = $('input[name="job"]:checked').val();
            if(job_id == undefined){
                alert('Please select job first');
                return false;
            } else {
                $('.assignNow').prop('disabled',true);
                $.ajax({
                    type : 'POST',
                    url : "{{ route('admin.assign-job') }}",
                    data : {
                        job_id : job_id,
                        consultantId : consultantId,
                        "_token" : "{{ csrf_token() }}",
                    },
                    success : function(data){
                        if(data){
                            $('.newJobAssigned').show();
                            setTimeout(function(){
                                location.reload();
                            },800)
                        }
                    }
                });
            }
        });
        $('.paymentProof').on('click',function(){
            var id = $(this).data('id');
            $('#marketingId').val(id);
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
            var phone_number = $(this).data('phone_number');
            var country = $(this).data('country');
            var address = $(this).data('address');
            $('.phone_number').html(phone_number);
            $('.country').html(country);
            $('.address').html(address);
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