@extends('admin.layout.index')
@section('content')
@php
    $setting = DB::table('settings')->first();
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">About Us Content</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">About Us Content</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Upload Banner</h4>
            </div>
            <form id="basic-validation" action="{{ route('admin.update-about-banner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form row col-md-12">
                        <div class="mb-3 col-md-6">
                            <label for="about_banner">Upload Banner</label>
                            <input class="form-control form-control-lg" name="about_banner" type="file" id="instagram_followers">
                        </div>
                        <div class="mb-3 col-md-6">
                            <a href="{{ asset($setting->about_banner) }}" target="_blank"><img width="300" src="{{ asset($setting->about_banner) }}" alt=""></a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Us Content</h4>
                    </div>
                    @csrf
                    <div class="card-body row">
                        <div class="basic-form custom_file_input col-xl-12">
                            <div class="input-group mb-3">
                                <div class="card-body custom-ekeditor">
                                    <textarea name="about_us" id="ckeditor">{{ $setting->about_us }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>   
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Followers Content</h4>
            </div>
            <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form row col-md-12">
                        <div class="mb-3 col-md-6">
                            <label for="instagram_followers">Instagram Followers</label>
                            <input class="form-control form-control-lg" name="instagram_followers" value="{{ $setting->instagram_followers }}" type="text" id="instagram_followers" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="facebook_followers">Facebook Followers</label>
                            <input class="form-control form-control-lg" name="facebook_followers" value="{{ $setting->facebook_followers }}" type="text" id="facebook_followers" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="youtube_followers">Youtube Followers</label>
                            <input class="form-control form-control-lg" name="youtube_followers" type="text" value="{{ $setting->youtube_followers }}" id="youtube_followers" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tumbler_followers">Tumbler Followers</label>
                            <input class="form-control form-control-lg" name="tumbler_followers" type="text" value="{{ $setting->tumbler_followers }}" id="tumbler_followers" required>
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
                <h4 class="card-title">Why We Content</h4>
            </div>
            <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form row col-md-12">
                        <div class="mb-3 col-md-6">
                            <label for="free_delivery">Free Delivery</label>
                            <input class="form-control form-control-lg" name="free_delivery" value="{{ $setting->free_delivery }}" type="text" id="free_delivery" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="secure_payment">Secure Payments</label>
                            <input class="form-control form-control-lg" name="secure_payment" value="{{ $setting->secure_payment }}" type="text" id="secure_payment" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="money_back">Money Back</label>
                            <input class="form-control form-control-lg" name="money_back" value="{{ $setting->money_back }}" type="text" id="money_back" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="support">Support</label>
                            <input class="form-control form-control-lg" name="support" value="{{ $setting->support }}" type="text" id="support" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection