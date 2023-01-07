@extends('user.layout.index')
@section('content')
<link rel="stylesheet" href="{{asset('admin_assets/vendor/select2/css/select2.min.css')}}">
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Coupons</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Coupons</li>
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
                        <h4 class="card-title">Add Coupon</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-coupon', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control form-control-lg" name="start_date" type="date" value="{{ old('start_date') }}" max="{{ date('Y-m-d') }}" id="start_date" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input class="form-control form-control-lg" name="end_date" type="date" value="{{ old('end_date') }}" id="end_date" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="code">Coupon Code</label>
                                    <input class="form-control form-control-lg" name="code" type="text" value="{{ old('code') }}" id="code" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="off">Coupon Discount (%)</label>
                                    <input class="form-control form-control-lg" name="off" type="number" min="1" max="100" value="{{ old('off') }}" id="off" required>
                                </div>
                                <div class="basic-form">
                                    <div class="mb-3 mb-0">
                                        <label class="radio-inline me-3" for="all"><input type="checkbox" id="all">Apply For All Books?</label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="select2-label form-label">Select Books</label> <br>
                                    <div class="mt-4">
                                        <select class="js-example-programmatic-multi" id="select_all" multiple="multiple" name="bookId[]" required>
                                            @foreach($books as $book)
                                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">All Marketing Purchases</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Added By</th>
                                        <th>Role</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Code</th>
                                        <th>Off(%)</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->role }}</td>
                                        <td>{{ $coupon->start_date }}</td>
                                        <td>{{ $coupon->end_date }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->off }}</td>
                                        <td>@if($coupon->is_active == 0) <span class="badge light badge-danger">Pending<span> @else <span class="badge light badge-info">Active</span>@endif</td>
                                        <td>
                                            <a href="{{ route('admin.delete-coupon', $coupon->coupon_id) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger shadow btn-xs sharp" title="Delete Coupon"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.edit-coupon', $coupon->coupon_id) }}" class="btn btn-info shadow btn-xs sharp" title="Edit Coupon"><i class="fa fa-pencil"></i></a>
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
    
@endsection

@section('scripts')
    <script src="{{asset('admin_assets/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin_assets/assets/js/plugins-init/select2-init.js')}}"></script>
    <script>
       $(document).ready(function(){
        var select_ids = [];
        $('#select_all option').each(function(index, element) {
            select_ids.push($(this).val());
        })
        $('#all').on('change',function(){
            if($('#all').is(":checked")){
                    selectAll(select_ids);
                } else {
                    deSelectAll();
                }
            })
       })
       function selectAll(select_ids){
            $('#select_all').val(select_ids);
        }
        function deSelectAll(){
            $('#select_all').val('');
        }
    </script>
@endsection