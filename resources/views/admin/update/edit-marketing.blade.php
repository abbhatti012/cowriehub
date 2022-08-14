@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Marketing Packages</a></li>
            </ol>
        </div>
      
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <form id="basic-validation" action="{{ route('admin.update-marketing', $marketing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Package</h4>
                        </div>
                        <div class="card-body row">
                            <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="package">Package Type</label>
                                    <input class="form-control form-control-lg" name="package" type="text" id="package" value="{{ $marketing->package }}" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="biography">Price</label>
                                    <input class="form-control form-control-lg" name="price" type="number" id="price" value="{{ $marketing->price }}" required>
                                </div>
                            </div>
                            <!-- <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="">Duration</label>
                                    <input class="form-control form-control-lg" name="duration" type="text" id="duration" value="{{ $marketing->duration }}" required>
                                </div>
                            </div> -->
                            @foreach(unserialize($marketing->point) as $point)
                            <div class="form-group row remove_parent_fields">
                                <div class="basic-form col-lg-11">
                                    <div class="mb-3">
                                        <label>Additional Point</label>
                                        <input class="form-control form-control-lg" name="point[]" type="text" value="{{ $point }}">
                                    </div>
                                </div>
                                <div class="basic-form col-lg-1">
                                    <div style="margin-top: 30px;" class="mb-3">
                                        <div class="d-flex">
                                            <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp me-1 remove_fields" title="Remove Field"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div id="save_end_fields"></div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="javascript:void(0)" class="btn btn-primary" title="Add Field" id="add_end_detail_fields">Add Field</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#add_end_detail_fields").click(function () {
                var html = 
                '<div id="remove_end_course">'+
                    '<div class="form-group row">'+
                        '<div class="basic-form col-lg-11">'+
                            '<div class="mb-3">'+
                                '<label for="email">Additional Point</label>'+
                                '<input class="form-control form-control-lg" name="point[]" type="text">'+
                            '</div>'+
                        '</div>'+
                        '<div class="basic-form col-lg-1">'+
                            '<div style="margin-top: 30px;" class="mb-3">'+
                                '<div class="d-flex">'+
                                    '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp me-1" title="Remove Field" id="remove_end_fields"><i class="fa fa-trash"></i></a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#save_end_fields').append(html);
            });
            $(document).on('click', '#remove_end_fields', function () {
                $(this).closest('#remove_end_course').remove();
            });
            $(document).on('click', '.remove_fields', function () {
                $(this).closest('.remove_parent_fields').remove();
            });
        })
    </script>
@endsection