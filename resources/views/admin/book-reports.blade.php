@extends('admin.layout.index')
@section('content')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Book Reports</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Book Reports</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row page-titles">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Filter By</h4>
            </div>
            <form id="basic-validation" action="{{ route('admin.book-reports') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form row col-md-12">
                        <div class="col-xl-4 mb-3">
                            <div class="example">
                                <p class="mb-1">Date Range Pick</p>
                                <input class="form-control input-daterange-datepicker" id="cal" type="text" name="range" value="{{ date('m/d/Y', strtotime($filter['start_date'])) }} - {{ date('m/d/Y', strtotime($filter['end_date'])) }}">
                            </div>
                        </div>
                        <div class="col-xl-4 mb-3">
                            <div class="example">
                                <p class="mb-1">Users</p>
                                <select class="form-control" name="user" value="">
                                    <option selected value="" disabled>---Please select User---</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" <?php if($user->id == $filter['user']){echo 'selected';} ?> >{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-3">
                            <div class="example">
                                <p class="mb-1">Status</p>
                                <select class="form-control" name="status" value="">
                                    <option selected value="" disabled>---Please select Status---</option>
                                        <option value="1" <?php if(1 == $filter['status']){echo 'selected';} ?> >Approved</option>
                                        <option value="0" <?php if(0 == $filter['status']){echo 'selected';} ?> >Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('admin.book-reports') }}" class="btn btn-info">Reset</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Book Reports</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>View Detail</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>User Role</th>
                                <th>Price</th>
                                <th>Total Purchased</th>
                                <th>Total Reviews</th>
                                <th>Average  Ratings</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($books as $book)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.view-book-detail',$book->book_id) }}" class="btn btn-info shadow btn-xs sharp" title="Vide Detail"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->name }}</td>
                                <td><span class="badge light badge-info">{{ $book->role }}</span></td>
                                <td>{{ $book->price }}</td>
                                <td>{{ $book->book_purchased }}</td>
                                <td>{{ $book->total_reviews }}</td>
                                @if($book->total_reviews != 0)
                                <td>{{ round(($book->total_ratings / $book->total_reviews)) }}</td>
                                @else
                                    <td>0</td>
                                @endif
                                <td>
                                    @if($book->status == 1)
                                        <span class="badge light badge-success">Approved</span>
                                    @else
                                        <span class="badge light badge-info">Pending</span>
                                    @endif
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
<script src='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'></script>
<script>
    var dates = [];
    $(document).ready(function() {
        $("#cal").daterangepicker();
    })

</script>
@endsection