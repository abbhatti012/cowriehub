@extends('user.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Book</a></li>
         </ol>
      </div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Books</h4>
                        <div class="d-flex">
                            <a href="{{ route('add-book') }}" class="btn btn-primary shadow btn-xs sharp" title="Add Book"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(isset($books) && !empty($books))
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div> -->
                                        </th>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sub-Title</th>
                                        <th>Genre</th>
                                        <th>Publisher</th>
                                        <th>Publication Date</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($books as $book)
                                    <tr>
                                        <!-- <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td> -->
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ route('product', $book->id) }}" target="_blank">{{ $book->title }}</a></td>
                                        <td>{{ $book->subtitle }}</td>
                                        <td>{{ $book->genre_title }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->publication_date }}</td>
                                        <td>{{ $book->country }}</td>
                                        <td>@if($book->status == 1) <span class="badge light badge-info">Approved</span> @else <span class="badge light badge-danger">Pending</span> @endif</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit-book',$book->id) }}" class="btn btn-primary shadow btn-xs sharp" title="Edit Book"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('delete-book',$book->id) }}" onclick="if (! confirm('Are you sure you want to delete book?')) { return false; }" class="btn btn-danger shadow btn-xs sharp" title="Delete Book"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection