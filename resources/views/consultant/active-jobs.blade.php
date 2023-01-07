@extends('consultant.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Active Jobs</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Active Jobs</li>
                </ol>
            </div>

        </div>
    </div>
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
                <h4 class="card-title">Active Jobs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Job No</th>
                                <th>Author Name</th>
                                <th>Author Page</th>
                                <th>Author Stat</th>
                                <th>Service</th>
                                <th>Admin Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>JOB-{{ $job->id }}</td>
                                <td><a class="text-primary" href="javascript:void(0)" title="{{ $job->user->name }}">{{$job->user->name}}</a></td>
                                <td><a href="{{ route('author-detail', $job->user_id) }}" target="_blank" class="text-primary">View Detail</a></td>
                                <td><a class="text-primary"  href="{{ route('consultant.stat') }}?id={{ $job->user_id }}" title="User Stat">View author Stat</a></td>
                                
                                <td>
                                    <a href="javascript:void(0)" class="text-primary viewMarketingDetail" data-bs-toggle="modal" data-bs-target="#viewMarketingDetail"
                                        data-package = "{{ $job->marketing->package }}"
                                        data-price = "{{ $job->marketing->price }}"
                                        data-duration = "{{ $job->marketing->duration }}"
                                        title="View User Detail">View</a>
                                </td>
                                <td>{{ $job->admin_note }}</td>
                                <td>
                                    <a class="btn btn-primary shadow btn-xs sharp me-1 uploadJob" href="javascript:void(0)" data-id="{{ $job->marketing->id }}" title="Upload Document" data-bs-toggle="modal" data-bs-target="#uploadJob" ><span class="fa fa-upload"></span></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="uploadJob">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <form id="basic-validation" action="{{ route('consultant.upload-document', $job->id) }}" method="POST" enctype="multipart/form-data">
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
                                                                    <input class="form-check-input" type="radio" id="partial" name="job_status" value="0" required>
                                                                    <label class="form-check-label" for="partial">
                                                                        Partial
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label for="prove_document">Upload Document</label>
                                                                    <input class="form-control form-control-lg" name="prove_document[]" type="file" id="prove_document" multiple required>
                                                                </div>
                                                            </div>
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label for="document_note">Note</label>
                                                                    <textarea class="form-control form-control-lg" name="document_note" id="document_note" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="confirmation" id="confirmation" value="1" required>
                                                                    <label class="form-check-label" for="confirmation">
                                                                        I confirm that this job has been completed as per the requirements and standards of Cowriehub
                                                                    </label>
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
                                        <th>Marketing Packages</th>
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

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.viewMarketingDetail').on('click',function(){
            var package = $(this).data('package');
            var price = $(this).data('price');
            var duration = $(this).data('duration');
            $('.package').html(package);
            $('.price').html(price);
            $('.duration').html(duration);
        });
    });
</script>
@endsection