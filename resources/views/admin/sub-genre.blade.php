@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sub-Genre</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <div class="row">
            @if(isset($_GET['id']) && !empty($_GET['id']))
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Sub-Genre</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-sub-genre', 'update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="genre">Genre</label>
                                    <select class="form-control form-control-lg" name="genre" id="genre">
                                        <option value="" disabled selected>---Please Select Genre---</option>
                                        @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Title</label>
                                    <input class="form-control form-control-lg" name="title" type="text" id="title" value="{{ $sub_genre->title }}" required>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $genre->id }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Sub-Genre</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-sub-genre', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="genre">Genre</label>
                                    <select class="form-control form-control-lg" name="genre" id="genre">
                                        <option value="" disabled selected>---Please Select Genre---</option>
                                        @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Title</label>
                                    <input class="form-control form-control-lg" name="title" type="text" id="title" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sub Genre's</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="#!" class="btn btn-primary btn-csv">CSV</a>
                            <a href="#!" class="btn btn-primary btn-excel">Excel</a>
                            <a href="#!" class="btn btn-primary btn-pdf">PDF</a>
                            <a href="#!" class="btn btn-primary btn-print">Print</a>
                            <table id="datatables" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Genre</th>
                                        <th>Sub Genre Title</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($sub_genres as $sub)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $sub->genre_title }}</td>
                                        <td>{{ $sub->title }}</td>
                                        <td>{{ $sub->slug }}</td>
                                        <td>{{ $sub->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="?id={{ $sub->id }}" class="btn btn-primary shadow btn-xs sharp me-1" title=""><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.delete-sub-genre', $sub->id) }}" class="btn btn-danger shadow btn-xs sharp me-1" title=""><i class="fa fa-trash"></i></a>
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
    <script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>
@endsection