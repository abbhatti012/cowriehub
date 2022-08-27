@extends('admin.layout.index')
@section('content')
@php
    $setting = DB::table('settings')->first();
@endphp
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Affiliate Network Agreement</a></li>
            </ol>
        </div>
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Affiliate Network Agreement</h4>
                        </div>
                        @csrf
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-12">
                                <div class="input-group mb-3">
                                    <div class="card-body custom-ekeditor">
                                        <textarea name="affiliate_network_agreement" id="ckeditor">{{ $setting->affiliate_network_agreement }}</textarea>
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