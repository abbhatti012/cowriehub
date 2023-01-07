@extends('admin.layout.index')
@section('content')
@php
    $setting = DB::table('settings')->first();
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Authors Contracts</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Authors Contract</li>
                </ol>
            </div>
        </div>
    </div>
</div>
        <form id="basic-validation" action="{{ route('admin.update-setting') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Authors Contract</h4>
                        </div>
                        @csrf
                        <div class="card-body row">
                            <div class="basic-form custom_file_input col-xl-12">
                                <div class="input-group mb-3">
                                    <div class="card-body custom-ekeditor">
                                        <textarea name="authors_contract" id="ckeditor">{{ $setting->authors_contract }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-xl-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
    
@endsection