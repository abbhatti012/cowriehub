@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Subscribed Users</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subscribed Users</h4>
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
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Phone</th>
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
                                        <td>test@gmail.com</td>
                                        <td>1234567890</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-warning shadow btn-xs sharp" title=""><i class="fa fa-user"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp" title="Delete Consultant"><i class="fa fa-trash"></i></a>
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