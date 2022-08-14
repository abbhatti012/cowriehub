@extends('publisher.layout.index')
@section('content')
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Create Author</a></li>
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
    <form id="basic-validation" action="{{ route('publisher.register-author') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="name">Author Name</label>
                                    <input class="form-control form-control-lg" name="name" type="text" id="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="company_email">Author Email</label>
                                    <input class="form-control form-control-lg" name="email" type="email" id="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control form-control-lg" name="password" type="password" id="password" value="{{ old('password') }}" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
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
                        <h4 class="card-title">Authors</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @if(isset($users) && !empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('admin.delete-user', $user->id) }}" class="btn btn-danger shadow btn-xs sharp me-1" title=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
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
