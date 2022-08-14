@extends('admin.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Update Location</a></li>
         </ol>
      </div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <div class="col-xl-6 col-lg-6">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Location</h4>
        </div>
        <form id="basic-validation" action="{{ route('admin.update-location', $location->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="basic-form">
                    <div class="mb-3 mb-0">
                        <label class="radio-inline me-3" for="standard"><input type="radio" name="type" <?php if($location->type == 'standard'){echo 'checked';} ?> id="standard" value="standard" required>  Standard</label>
                        <label class="radio-inline me-3" for="express"><input type="radio" name="type" <?php if($location->type == 'express'){echo 'checked';} ?> id="express" value="express" required>  Express</label>
                    </div>
                </div>
                @php 
                    $weight  = explode('-',$location->weight);
                @endphp
                <div class="basic-form row col-md-12">
                    <div class="mb-3 col-md-6">
                        <label for="weight">Minimum Weight (KG)</label>
                        <input class="form-control form-control-lg" name="min_weight" type="number" id="weight" value="{{ $weight[0] }}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="weight">Maximum Weight (KG)</label>
                        <input class="form-control form-control-lg" name="max_weight" type="number" id="weight" value="{{ $weight[1] }}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="location">Location</label>
                        <input class="form-control form-control-lg" name="location" type="text" id="location" value="{{ $location->location }}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="price">Price</label>
                        <input class="form-control form-control-lg" name="price" type="number" id="price" value="{{ $location->price }}" required>
                    </div>
                </div>
                <div class="basic-form">
                    <div class="mb-3 mb-0">
                        <label class="radio-inline me-3" for="is_cod"><input type="checkbox" id="is_cod" name="is_cod" <?php if($location->is_cod){echo 'checked';} ?> value=1>  Enable COD for that location?</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection