@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Skills</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Skills</li>
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
                <h4 class="card-title">Add Skills</h4>
            </div>
            <form id="basic-validation" action="{{ route('admin.add-skills') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form row col-md-12">
                        <div class="mb-3 col-md-12">
                            <label for="skill">Add Skill</label>
                            <input class="form-control form-control-lg" name="skill" type="text" id="skill" required>
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
                <h4 class="card-title">All Skills</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Added By</th>
                                <th>Role</th>
                                <th>Skills</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($skills as $skill)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $skill->users->name }}</td>
                                <td>{{ $skill->users->role }}</td>
                                <td>{{ $skill->skill }}</td>
                                <td>
                                    <a href="{{ route('admin.delete-skill', $skill->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Skill"><i class="fa fa-trash"></i></a>
                                    <a href="{{ route('admin.edit-skill', $skill->id) }}" class="btn btn-info shadow btn-xs sharp" title="Edit Skill"><i class="fa fa-pencil"></i></a>
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
@endsection
@section('scripts')
@endsection