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
        <form id="basic-validation" action="{{ route('admin.update-blog',$blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="weight">Title</label>
                        <input class="form-control form-control-lg" name="title" type="text" id="title" value="{{ $blog->title }}" required>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="description">Short Description</label>
                        <textarea class="form-control form-control-lg" name="description" id="description" required>{{ $blog->description }}</textarea>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="ckeditor">Long Description</label>
                        <textarea class="form-control form-control-lg" name="long_description" id="ckeditor" required><?php echo $blog->long_description ?></textarea>
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <img width="400" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                </div>
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-12">
                        <label for="image">Blog Image</label>
                        <input class="form-control form-control-lg" name="image" type="file" id="image">
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection