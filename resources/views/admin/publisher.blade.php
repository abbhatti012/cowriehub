@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Publishers</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Publishers</h4>
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
    <script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>
@endsection