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
        <form id="basic-validation" action="{{ route('admin.add-marketing') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Marketing Packages</h4>
                        </div>
                        <div class="card-body row">
                            <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="package">Package Type</label>
                                    <input class="form-control form-control-lg" name="package" type="text" id="package" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="biography">Price</label>
                                    <input class="form-control form-control-lg" name="price" type="number" id="price" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-4">
                                <div class="mb-3">
                                    <label for="">Duration</label>
                                    <input class="form-control form-control-lg" name="duration" type="text" id="duration" required>
                                </div>
                            </div>
                            <div class="basic-form col-lg-11">
                                <div class="mb-3">
                                    <label for="email">Additional Point</label>
                                    <input class="form-control form-control-lg" name="point[]" type="text">
                                </div>
                            </div>
                            <div class="basic-form col-lg-1">
                                <div style="margin-top: 30px;" class="mb-3">
                                    <div class="d-flex">
                                        <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1" title="Add Field" id="add_end_detail_fields"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="save_end_fields"></div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-{{session('message')['type']}}">
                        {{session('message')['text']}}
                    </div>
                @endif
                    <div class="card-header">
                        <h4 class="card-title">Author</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Points</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($marketing as $point)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $point->package }}</td>
                                        <td>{{ $point->price }}</td>
                                        <td>{{ $point->duration }}</td>
                                        <td>
                                            @foreach(unserialize($point->point) as $sub)
                                            <li>{{ $sub }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.delete-marketing', $point->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Marketign"><i class="fa fa-trash"></i></a>
                                            </div>
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
        })
    </script>
@endsection