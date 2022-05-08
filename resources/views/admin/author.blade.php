@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Author</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Author</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Profile</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Bank Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($authors as $author)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img width="100" src="{{ asset($author->cover) }}" alt="">
                                        </td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->work_email }}</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                ---
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.edit.author', $author->author_id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Update Author"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" title="View Author"><i class="fa fa-eye"></i></a>
                                                <!-- <a href="#" class="btn btn-info shadow btn-xs sharp me-1" title="Approve Author"><i class="fa fa-check"></i></a> -->
                                                <a href="{{ route('admin.delete-author') }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Author"><i class="fa fa-trash"></i></a>
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
@endsection