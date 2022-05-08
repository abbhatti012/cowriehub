@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">System Users</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">System Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php for($i = 1; $i <= 30; $i++): ?>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $i }}</td>
                                        <td>Test Name</td>
                                        <td>abc@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-info shadow btn-xs sharp me-1" title=""><i class="fa fa-lock"></i></a>
                                                <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" title=""><i class="fa fa-thumbs-down"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp" title="Delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>												
                                    </tr>
                                <?php endfor; ?> 
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