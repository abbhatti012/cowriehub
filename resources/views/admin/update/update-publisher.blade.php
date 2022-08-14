@extends('admin.layout.index')
@section('content')
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Update pblisher</a></li>
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
        </div><br />
    @endif
    <form id="basic-validation" action="{{ route('publisher-register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 for="instagram">Signup Details</h3>
                        <hr>
                        <div class="mobile_money_fields">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control form-control-lg" name="company_name" type="text" id="company_name" value="{{ $user->company_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="company_email">Company Email</label>
                                    <input class="form-control form-control-lg" name="company_email" type="email" id="company_email" value="{{ $user->company_email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="company_phone">Company Phone</label>
                                    <input class="form-control form-control-lg" name="company_phone" type="text" id="company_phone" value="{{ $user->company_phone }}" required>
                                </div>
                                <div class="basic-form custom_file_input">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Company Business Certificate</span>
                                        <div class="form-file">
                                            <input type="file" name="business_certificate" class="form-file-input form-control">
                                        </div>
                                    </div>
                                    <iframe width="400" src="{{ asset($user->business_certificate) }}" frameborder="0"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label for="number_of_authors">Number of authors</label>
                                    <input class="form-control form-control-lg" name="number_of_authors" type="number" id="number_of_authors" value="{{ $user->number_of_authors }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="number_of_publishers">Number of publishers</label>
                                    <input class="form-control form-control-lg" name="number_of_publishers" type="number" id="number_of_publishers" value="{{ $user->number_of_publishers }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name_of_ceo">Name of CEO</label>
                                    <input class="form-control form-control-lg" name="name_of_ceo" type="text" id="name_of_ceo" value="{{ $user->name_of_ceo }}" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   </div>
</div>
@endsection
