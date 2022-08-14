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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Update User</a></li>
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
    <form id="basic-validation" action="{{ route('admin.update-general-users', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Detail</h4>
                    </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input class="form-control form-control-lg" name="name"  value="{{ $user->name }}" type="text" id="name">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control form-control-lg" name="email"  value="{{ $user->email }}" type="text" id="email">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   </div>
</div>
@endsection