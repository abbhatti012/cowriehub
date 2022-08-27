@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Slider</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <form id="basic-validation" action="{{ route('admin.add-banner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hero Banner Data</h4>
                        </div>
                        <div class="card-body row">
                            <div class="basic-form col-lg-6">
                                <div class="mb-3">
                                    <label for="type">Editor</label>
                                    <input class="form-control form-control-lg" name="type" type="text" id="type" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input class="form-control form-control-lg" name="title" type="text" id="title" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-6">
                                <div class="mb-3">
                                    <label for="month">Month</label>
                                    <input class="form-control form-control-lg" name="month" type="text" id="month" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-6">
                                <div class="mb-3">
                                    <label for="email">Banner Image</label>
                                    <input class="form-control form-control-lg" name="banner" type="file">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slider</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Banner</th>
                                        <th>Editor</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img width="150" src="{{ asset($banner->banner) }}" alt=""></td>
                                        <td>{{ $banner->type }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->category }}</td>
                                        <td>
                                            <a href="{{ route('admin.delete-banner', $banner->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Banner"><i class="fa fa-trash"></i></a>
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