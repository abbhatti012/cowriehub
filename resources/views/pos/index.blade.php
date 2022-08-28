@extends('pos.layout.index')
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">My Pos Account</a></li>
         </ol>
      </div>
      @if(\App\Models\User::IsPending('pos'))
        <div class="alert alert-danger">
            <p>Cowriehub reviewing your application. You will be notified in your email on the status of your application after this review</p>
        </div>
      @endif
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
    <form id="basic-validation" action="{{ route('pos.pos-signup', Auth::id()) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_email">Company Email</label>
                                    <input type="text" name="company_email" value="{{ old('company_email') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="text" name="company_phone" value="{{ old('company_phone') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="referrel_code">Referrel Code</label>
                                    <input class="form-control form-control-lg" value="{{ old('referrel_code') }}" name="referrel_code"  value="{{ old('referrel_code') }}" type="text" id="referrel_code">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="landmark_area">Landmark Area</label>
                                    <input class="form-control form-control-lg" name="landmark_area" type="text" id="landmark_area">
                                </div>
                            </div>
                        
                            <div class="basic-form">
                                <div class="mb-3 col-md-6">
                                    <input class="form-check-input" type="checkbox" name="is_agree_policy" id="is_agree_policy" value="1" >
                                    <label class="form-check-label" for="is_agree_policy">
                                        I agree to the Default Policy <a href="">(Click to read)</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <form id="basic-validation" action="{{ route('pos.pos-signup', $user->user_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Info</h4>
                    </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="{{ $user->company_name }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_email">Company Email</label>
                                    <input type="text" name="company_email" value="{{ $user->company_email }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="text" name="company_phone" value="{{ $user->company_phone }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="referrel_code">Referrel Code</label>
                                    <input class="form-control form-control-lg" value="{{ $user->referrel_code }}" name="referrel_code" type="text" disabled id="referrel_code">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="landmark_area">Landmark Area</label>
                                    <input class="form-control form-control-lg" name="landmark_area" value="{{ $user->landmark_area }}" type="text" id="landmark_area">
                                </div>
                            </div>
                        
                            <div class="basic-form">
                                <div class="mb-3 col-md-6">
                                    <input class="form-check-input" type="checkbox" name="is_agree_policy" id="is_agree_policy" value="1"<?php if($user->is_agree_policy){echo 'checked';} ?> >
                                    <label class="form-check-label" for="is_agree_policy">
                                        I agree to the Default Policy <a href="">(Click to read)</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
   </div>
</div>
@endsection