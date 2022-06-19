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
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Payment Detail</th>
                                        <th>Phone</th>
                                        <th>Skill</th>
                                        <th>Skill Certificate</th>
                                        <th>Institution</th>
                                        <th>Years of completion</th>
                                        <th>ID Type</th>
                                        <th>Identity Card</th>
                                        <th>About Consultant</th>
                                        <th>Portfolio</th>
                                        <th>Description</th>
                                        <th>Job Status</th>
                                        <th>Amount to be pay</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($consultants as $consultant)
                                    <tr>
                                        <td>
                                            @if($consultant->payment)
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1 viewPaymentDetail" data-bs-toggle="modal" data-bs-target="#viewPaymentDetail"
                                                data-payment = "{{ $consultant->payment }}"
                                                data-account_name = "{{ $consultant->account_name }}"
                                                data-account_number = "{{ $consultant->account_number }}"
                                                data-networks = "{{ $consultant->networks }}"
                                                data-bank_account_name = "{{ $consultant->bank_account_name }}"
                                                data-bank_account_number = "{{ $consultant->bank_account_number }}"
                                                data-branch = "{{ $consultant->branch }}"
                                                data-bank_name = "{{ $consultant->bank_name }}"
                                                title="View Payment Detail"><i class="fa fa-eye"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $consultant->phone_number }}</td>
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
                                        <td id="viewMore{{ $consultant->id }}">{{ substr($consultant->description,0,60) }}... <span><a href="javascript:void(0)" class="text-primary  viewMore" data-id="{{ $consultant->id }}">More</a></span></td>
                                        <td style="display:none;" id="viewLess{{ $consultant->id }}">{{ $consultant->description }}...<span><a href="javascript:void(0)" class="text-primary viewLess" data-id="{{ $consultant->id }}">Less</a></span></td>
                                        <td>
                                            @if($consultant->marketing)
                                                @if($consultant->marketing->job_type == 2)
                                                    <a href="javascript:void(0)" class="text-primary"> Partial </a> | <a class="btn btn-warning shadow btn-xs sharp me-1" href="{{ asset($consultant->marketing->prove_document) }}" target="_blank" title="View Document"><span class="fa fa-eye"></span></a>
                                                @endif
                                                @if($consultant->marketing->job_type == 1)
                                                    <a href="javascript:void(0)" class="text-success">Completed from consultalt</a> | <a class="btn btn-warning shadow btn-xs sharp me-1" href="{{ asset($consultant->marketing->prove_document) }}" target="_blank" title="View Document"><span class="fa fa-eye"></span></a>
                                                @endif
                                            @else
                                                <a href="javascript:void(0)" class="text-danger"> Pending </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($consultant->marketing)
                                                @if($consultant->marketing->job_type == 1)
                                                    @php $market = DB::table('marketing')->where('id',$consultant->marketing->marketing_id)->first(); @endphp
                                                    GHS {{ round(($market->price / 100)*$setting->consultant_commission, 2) }} | 
                                                    <a href="javascript:void(0)" class="text-success">PAY</a>
                                                @else
                                                    
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if($consultant->status == 0)
                                                    <a href="{{ route('consultant.update-consultant-status', [$consultant->id, 1]) }}" onclick="return confirm('Are you sure you want to approve as consultant?')" class="btn btn-success shadow btn-xs sharp me-1" title="Approve Consultant"><i class="fa fa-check"></i></a>
                                                @else
                                                    <a href="{{ route('consultant.update-consultant-status', [$consultant->id, 0]) }}" onclick="return confirm('Are you sure you want the disapprove as consultant?')" class="btn btn-danger shadow btn-xs sharp me-1" title="Disapprove Consultant"><i class="fa fa-times"></i></a>
                                                @endif
                                                @if($consultant->status == 1)
                                                    @if($consultant->job_id == '')
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#assignJobModal" class="btn btn-primary shadow btn-xs sharp me-1 assignJob" data-id="{{ $consultant->id }}" title="Assign Job"><i class="fa fa-tasks"></i></a>
                                                    @endif
                                                @endif
                                                <a href="{{ route('consultant.delete-consultant', $consultant->id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want delete consultant?')" title="Delete Consultant"><i class="fa fa-trash"></i></a>
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