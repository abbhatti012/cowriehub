@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Main Genre</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Main Genre</li>
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
        <div class="row">
            @if(isset($_GET['id']) && !empty($_GET['id']))
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Genre</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-genre', 'update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="name">Title</label>
                                    <input class="form-control form-control-lg" name="title" type="text" id="title" value="{{ $genre->title }}" required>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $genre->id }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Genre</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-genre', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="name">Title</label>
                                    <input class="form-control form-control-lg" name="title" type="text" id="title" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Main Genre's</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($genres as $genre )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $genre->title }}</td>
                                        <td>{{ $genre->slug }}</td>
                                        <td>{{ $genre->created_at }}</td>
                                        <td>
                                            <a href="?id={{ $genre->id }}" class="btn btn-primary shadow btn-xs sharp me-1" title=""><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.delete-genre', $genre->id) }}" class="btn btn-danger shadow btn-xs sharp me-1" title=""><i class="fa fa-trash"></i></a>
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
@endsection
@section('scripts')
@endsection