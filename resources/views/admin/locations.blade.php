@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">All Books</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">All Books</li>
                </ol>
            </div>
        </div>
    </div>
</div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <div class="row">
         
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Shipment</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-location', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3 mb-0">
                                    <label class="radio-inline me-3" for="standard"><input type="radio" name="type" id="standard" value="standard" required>  Standard</label>
                                    <label class="radio-inline me-3" for="express"><input type="radio" name="type" id="express" value="express" required>  Express</label>
                                </div>
                            </div>
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="weight">Minimum Weight (KG)</label>
                                    <input class="form-control form-control-lg" name="min_weight" type="number" id="weight" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="weight">Maximum Weight (KG)</label>
                                    <input class="form-control form-control-lg" name="max_weight" type="number" id="weight" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="location">Shipment</label>
                                    <input class="form-control form-control-lg" name="location" type="text" id="location" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="price">Price</label>
                                    <input class="form-control form-control-lg" name="price" type="number" id="price" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3 mb-0">
                                    <label class="radio-inline me-3" for="is_cod"><input type="checkbox" id="is_cod" name="is_cod" value=1>  Enable COD for that location?</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Locations</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Weight (KG)</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Is COD?</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($locations as $location)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $location->weight }}</td>
                                        <td>{{ $location->location }}</td>
                                        <td>{{  $location->price }}</td>
                                        <td>{{  $location->type }}</td>
                                        <td>
                                            @if($location->is_cod == "1")
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.delete-location', $location->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Location"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.edit-location', $location->id) }}" class="btn btn-info shadow btn-xs sharp" title="Edit Location"><i class="fa fa-pencil"></i></a>
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
@endsection