@extends('publisher.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">My Account</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Account</li>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
@if(!$user)
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
                                <input class="form-control form-control-lg" name="company_name" type="text" id="company_name" value="{{ old('company_name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_email">Company Email</label>
                                <input class="form-control form-control-lg" name="company_email" type="email" id="company_email" value="{{ old('company_email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_phone">Company Phone</label>
                                <input class="form-control form-control-lg" name="company_phone" type="text" id="company_phone" value="{{ old('company_phone') }}" required>
                            </div>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Company Business Certificate</span>
                                    <div class="form-file">
                                        <input type="file" name="business_certificate" class="form-file-input form-control"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="number_of_authors">Number of authors</label>
                                <input class="form-control form-control-lg" name="number_of_authors" type="number" id="number_of_authors" value="{{ old('number_of_authors') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="number_of_publishers">Number of publishers</label>
                                <input class="form-control form-control-lg" name="number_of_publishers" type="number" id="number_of_publishers" value="{{ old('number_of_publishers') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_of_ceo">Name of CEO</label>
                                <input class="form-control form-control-lg" name="name_of_ceo" type="text" id="name_of_ceo" value="{{ old('name_of_ceo') }}" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="0">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</form>
@elseif($user->status == 0)
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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="col-12"><hr>
    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
        <div class="row">
            <div class="table-responsive mb-4">
                <h4 class="text-primary"><i class="fa fa-plus"></i> Detail</h4>
                <p class="text-muted"></p>
            
                    <table class="table table-hover table-borderless">
                        <tbody>
                            <tr>
                                <th></th>
                                <th>Detail</th>
                            </tr>
                            <tr>
                                <th>Company Name:</th>
                                <td>{{ $user->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Company Email:</th>
                                <td>{{ $user->company_email }}</td>
                            </tr>
                            <tr>
                                <th>Business Certificate:</th>
                                <td><iframe style="width: 70%; height: 300px;" src="{{ asset($user->business_certificate) }}" frameborder="0"></iframe></td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td>{{ $user->company_phone }}</td>
                            </tr>
                            <tr>
                                <th>Number of authors:</th>
                                <td>{{ $user->number_of_authors }}</td>
                            </tr>
                            <tr>
                                <th>Number of publishers:</th>
                                <td>{{ $user->number_of_publishers }}</td>
                            </tr>
                            <tr>
                                <th>Name of CEO:</th>
                                <td>{{ $user->name_of_ceo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
   
@endsection
