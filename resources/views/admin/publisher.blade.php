@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Publishers</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Publishers</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Publishers</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Company Email</th>
                                <th>Company Phone</th>
                                <th>Business Certification</th>
                                <th>Number of authors</th>
                                <th>Number of publishers</th>
                                <th>Name of CEO</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($publishers as $publisher)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $publisher->company_name }}</td>
                                <td>{{ $publisher->company_email }}</td>
                                <td>{{ $publisher->company_phone }}</td>
                                <td><a class="btn btn-success shadow btn-xs sharp me-1 viewDocument" data-bs-toggle="modal" data-bs-target="#viewDocument" href="" data-url="{{ asset($publisher->business_certificate) }}"><span class="fa fa-download"></span></a></td>
                                <td>{{ $publisher->number_of_authors }}</td>
                                <td>{{ $publisher->number_of_publishers }}</td>
                                <td>{{ $publisher->name_of_ceo }}</td>
                                <td>
                                    @if($publisher->status == 0)
                                        <span class="badge light badge-danger">No</span> 
                                    @else
                                        <span class="badge light badge-success">Yes</span> 
                                    @endif
                                </td>
                                <td>
                                    @if($publisher->status == 1)
                                        <a href="{{ route('admin.delete-publisher', $publisher->id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want delete publisher permanently?')" title="Delete Publisher"><i class="fa fa-trash"></i></a>
                                        <a href="{{ route('admin.edit-publisher', $publisher->id) }}" class="btn btn-info shadow btn-xs sharp" title="Edit Publisher"><i class="fa fa-pencil"></i></a>
                                    @else
                                        <a href="{{ route('admin.update-publisher-status', [$publisher->id,1]) }}" class="text-info" onclick="return confirm('Are you sure you want activate publisher permanently?')" title="Active Publisher"> Approve </a>
                                        | <a href="{{ route('admin.update-publisher-status', [$publisher->id,0]) }}" class="text-danger" onclick="return confirm('Are you sure you want reject publisher permanently?')" title="Reject Publisher"> Reject </a>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.viewDocument').on('click',function(){
                var url = $(this).data('url');
                $('.iframeHere').html('<iframe style="width:100%; height: 400px;" src="'+url+'"></iframe>');
                $('.downloadDocument').attr('href',url);
            });
        });
    </script>
    
@endsection