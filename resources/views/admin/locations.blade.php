@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Banks</a></li>
            </ol>
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
                        <h4 class="card-title">Add Location</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-location', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3 mb-0">
                                    <label class="radio-inline me-3"><input type="radio" name="type" value="standard" required>  Standard</label>
                                    <label class="radio-inline me-3"><input type="radio" name="type" value="express" required>  Express</label>
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
                                    <label for="location">Location</label>
                                    <input class="form-control form-control-lg" name="location" type="text" id="location" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="price">Price</label>
                                    <input class="form-control form-control-lg" name="price" type="number" id="price" required>
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
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Weight (KG)</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Type</th>
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
                                            <div class="d-flex">
                                                <a href="{{ route('admin.delete-location', $location->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Location"><i class="fa fa-trash"></i></a>
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