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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Support Setting</a></li>
            </ol>
        </div>
       
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Support Setting</h4>
                </div>
                <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="basic-form row col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="support_address">Address</label>
                                <input class="form-control form-control-lg" name="support_address" value="{{ $setting->support_address }}" type="text" id="support_address" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="support_email">Email</label>
                                <input class="form-control form-control-lg" name="support_email" value="{{ $setting->support_email }}" type="text" id="support_email" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="support_phone">Phone</label>
                                <input class="form-control form-control-lg" name="support_phone" value="{{ $setting->support_phone }}" type="text" id="support_phone" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Social Links</h4>
                </div>
                <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="basic-form row col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="instagram_link">Instagram</label>
                                <input class="form-control form-control-lg" name="instagram_link" value="{{ $setting->instagram_link }}" type="text" id="instagram_link">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="facebook_link">Facebook</label>
                                <input class="form-control form-control-lg" name="facebook_link" value="{{ $setting->facebook_link }}" type="text" id="facebook_link">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="youtube_link">Youtube</label>
                                <input class="form-control form-control-lg" name="youtube_link" value="{{ $setting->youtube_link }}" type="text" id="youtube_link">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="twitter_link">Twitter</label>
                                <input class="form-control form-control-lg" name="twitter_link" value="{{ $setting->twitter_link }}" type="text" id="twitter_link">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pinterest_link">Pinterest</label>
                                <input class="form-control form-control-lg" name="pinterest_link" value="{{ $setting->pinterest_link }}" type="text" id="pinterest_link">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection