@extends('admin.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
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
        </div><br/>
    @endif
    <div class="col-xl-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Blog Detail</h4>
        </div>
        <form id="basic-validation" action="{{ route('admin.add-blog') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="weight">Title</label>
                        <input class="form-control form-control-lg" name="title" type="text" id="title" value="{{ old('title') }}" required>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="description">Short Description</label>
                        <textarea class="form-control form-control-lg" name="description" id="description" value="{{ old('description') }}" required></textarea>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="ckeditor">Long Description</label>
                        <textarea class="form-control form-control-lg" name="long_description" id="ckeditor" value="{{ old('long_description') }}" required></textarea>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="image">Blog Image</label>
                        <input class="form-control form-control-lg" name="image" type="file" id="image" required>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Blogs</h4>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img width="150" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"></td>
                                    <td><a href="{{ route('blog-detail',$blog->id) }}" target="_blank">{{ $blog->title }}</a></td>
                                    <td>{{ $blog->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.delete-blog', $blog->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Blog"><i class="fa fa-trash"></i></a>
                                        <a href="{{ route('admin.edit-blog', $blog->id) }}" class="btn btn-info shadow btn-xs sharp" title="Edit Blog"><i class="fa fa-pencil"></i></a>
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
@section('scripts')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection