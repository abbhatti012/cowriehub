@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Coupons</a></li>
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
                        <h4 class="card-title">Add Coupon</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-coupon', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control form-control-lg" name="start_date" type="date" value="{{ old('start_date') }}" id="start_date" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input class="form-control form-control-lg" name="end_date" type="date" value="{{ old('end_date') }}" id="end_date" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="code">Code</label>
                                    <input class="form-control form-control-lg" name="code" type="text" value="{{ old('code') }}" id="code" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="off">Off (%)</label>
                                    <input class="form-control form-control-lg" name="off" type="number" min="1" max="100" value="{{ old('off') }}" id="off" required>
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
                        <h4 class="card-title">All Coupons</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Code</th>
                                        <th>Off(%)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $coupon->start_date }}</td>
                                        <td>{{ $coupon->end_date }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->off }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.delete-coupon', $coupon->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Coupon"><i class="fa fa-trash"></i></a>
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