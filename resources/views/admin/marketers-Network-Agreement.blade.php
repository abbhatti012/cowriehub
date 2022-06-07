@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Marketers Network Agreement</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Marketers Network Agreement</h4>
                    </div>
                    <div class="card-body custom-ekeditor">
                        <div id="ckeditor"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
