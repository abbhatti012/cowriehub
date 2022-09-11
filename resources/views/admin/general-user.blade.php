@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">General Users</a></li>
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
                        <h4 class="card-title">General Users</h4>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Referral Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @if(isset($users) && !empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if($user->affiliates)
                                                {{ $user->code }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.delete-user', $user->id) }}" class="btn btn-danger shadow btn-xs sharp me-1" title=""><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.update-general-user', $user->id) }}" class="btn btn-info shadow btn-xs sharp me-1" title=""><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>
@endsection