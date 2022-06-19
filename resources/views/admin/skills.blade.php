@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Skills</a></li>
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
                            <table id="example5" class="display" style="min-width: 845px">
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
                                            <div class="d-flex">
                                                <a href="{{ route('admin.delete-skill', $skill->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Skill"><i class="fa fa-trash"></i></a>
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