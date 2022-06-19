@extends('consultant.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
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
                        <h4 class="card-title">All Jobs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Job ID</th>
                                        <th>Author Detail</th>
                                        <th>Author Page</th>
                                        <th>Author Stat</th>
                                        <th>Service</th>
                                        <th>Marketing Detail</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($jobs as $job)
                                    <tr>
                                        <td>JOB-{{ $job->marketing->id }}</td>
                                        <td><a class="text-primary viewAuthorDetail" data-id="{{ $job->marketing->user_id }}" data-bs-toggle="modal" data-bs-target="#viewAuthorDetail" href="javascript:void(0)" title="Author Detail">View Detail</a></td>
                                        <td><a href="{{ route('author-detail', $job->marketing->user_id) }}" target="_blank" class="text-primary">View Detail</a></td>
                                        <td><a class="text-primary"  href="{{ route('consultant.stat') }}?id={{ $job->marketing->user_id }}" title="User Stat">View author Stat</a></td>
                                        <td>
                                        @if($job->marketing->job_type == 2 || $job->marketing->job_type == 1)
                                            <a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ asset($job->marketing->prove_document) }}" target="_blank" title="View Uploaded Document"><span class="fa fa-eye"></span></a>
                                        @else
                                            ---
                                        @endif
                                        </td>
                                        <td><a class="text-primary viewMarketingDetail" data-id="{{ $job->marketing->id }}" data-bs-toggle="modal" data-bs-target="#viewMarketingDetail" href="javascript:void(0)" title="Marketing Detail">View Detail</a></td>
                                        <td>
                                            @if($job->marketing)
                                                @if($job->marketing->job_type == 1)
                                                    @php $market = DB::table('marketing')->where('id',$job->marketing->marketing_id)->first(); @endphp
                                                    GHS {{ round(($market->price / 100)*$setting->consultant_commission, 2) }} | 
                                                    <a href="javascript:void(0)" class="text-danger">PENDING</a>
                                                @else
                                                    
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if($job->marketing->job_status == 0)
                                                    <a class="text-primary" href="{{ route('consultant.approve-marketing-status', [$job->marketing->id, 1]) }}" onclick="return confirm('Are you sre you want to approve the job?')">Approve </a>&nbsp;|&nbsp;
                                                    <a class="text-danger" href="{{ route('consultant.approve-marketing-status', [$job->marketing->id, 2]) }}" onclick="return confirm('Are you sre you want to reject the job?')"> Reject</a>
                                                @else
                                                    @if($job->marketing->job_type == 0 || $job->marketing->job_type == 2)
                                                        <a class="btn btn-primary shadow btn-xs sharp me-1 uploadJob" href="javascript:void(0)" data-id="{{ $job->marketing->id }}" title="Upload Document" data-bs-toggle="modal" data-bs-target="#uploadJob" ><span class="fa fa-upload"></span></a>
                                                    @endif
                                                    
                                                    @if($job->marketing->job_type == 1)
                                                        <a class="text-primary" href="javascript:void(0)">Completed</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="uploadJob">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <form id="basic-validation" action="{{ route('consultant.upload-document', $job->marketing->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Upload Job</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <fieldset class="mb-3 hard_allow_preorders">
                                                                <div class="row">
                                                                    <label class="col-form-label col-sm-3 pt-0">Job Status?</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="job_status" id="completed" value="1" required>
                                                                            <label class="form-check-label" for="completed">
                                                                                Completed
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" id="partial" name="job_status" value="2" required>
                                                                            <label class="form-check-label" for="partial">
                                                                                Partial
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="basic-form">
                                                                        <div class="mb-3">
                                                                            <label for="prove_document">Upload Document</label>
                                                                            <input class="form-control form-control-lg" name="prove_document" type="file" id="prove_document" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary light">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
<div class="modal fade" id="viewAuthorDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Author Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless authorDetailHere" style="min-width: 845px">
                            
                        </table>
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
                <h5 class="modal-title">Marketing Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless marketingDetailHere" style="min-width: 845px">
                            
                        </table>
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
        $('.viewAuthorDetail').on('click',function(){
            var id = $(this).data('id');
            $.ajax({
                type : 'GET',
                url : "{{ route('get-author-detail') }}?id="+id,
                success : function(data){
                    var html = '<tbody>'+
                                    '<tr>'+
                                        '<th>Name</th>'+
                                        '<th>Email</th>'+
                                        '<th>Biography</th>'+
                                    '</tr>'+
                                    '<tr>'+
                                    '<td>'+data.name+'</td>'+
                                    '<td>'+data.email+'</td>'+
                                    '<td>'+data.author_detail.biography+'</td>'+
                                '</tr>'+
                                '</tbody>';
                    
                    $('.authorDetailHere').html(html);
                }
            });
        });
        $('.viewMarketingDetail').on('click',function(){
            var id = $(this).data('id');
            $.ajax({
                type : 'GET',
                url : "{{ route('get-marketing-detail') }}?id="+id,
                success : function(data){
                    var html = '<tbody>'+
                                    '<tr>'+
                                        '<th>User Name</th>'+
                                        '<th>User Email</th>'+
                                        '<th>Package Name</th>'+
                                        '<th>Package Price</th>'+
                                        '<th>Package Duration</th>'+
                                    '</tr>'+
                                    '<tr>'+
                                    '<td>'+data.first_name+'</td>'+
                                    '<td>'+data.last_name+'</td>'+
                                    '<td>'+data.marketing_detail.package+'</td>'+
                                    '<td>'+data.marketing_detail.price+'</td>'+
                                    '<td>'+data.marketing_detail.duration+'</td>'+
                                '</tr>'+
                                '</tbody>';
                    
                    $('.marketingDetailHere').html(html);
                }
            });
        });
    });
</script>
@endsection