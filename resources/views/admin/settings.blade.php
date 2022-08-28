@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
   
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Campaign Setting</h4>
                        </div>
                        @csrf
                        <input type="hidden" name="post_type" value="add">
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Start Date</span>
                                    <div class="form-file">
                                        <input type="date" name="start_date" value="{{ $setting->start_date }}" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form custom_file_input col-xl-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">End Date</span>
                                    <div class="form-file">
                                        <input type="date" name="end_date" value="{{ $setting->end_date }}" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Author's/Publishers Royalties</h4>
                        </div>
                        @csrf
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">User <small>(Book Owner)</small> Comission</span>
                                    <div class="form-file">
                                        <input type="number" min="1" max="100" name="user_commission" value="{{ $setting->user_commission }}" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Affiliates Commissions</h4>
                        </div>
                        @csrf
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Affiliates Commissions</span>
                                    <div class="form-file">
                                        <input type="number" min="1" max="100" name="affiliate_commission" value="{{ $setting->affiliate_commission }}" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Consultants Commissions</h4>
                        </div>
                        @csrf
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Consultants Commissions</span>
                                    <div class="form-file">
                                        <input type="number" min="1" max="100" name="consultant_commission" value="{{ $setting->consultant_commission }}" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection