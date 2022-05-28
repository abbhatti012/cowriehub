@extends('user.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Marketing Orders</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Marketing Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->package }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->duration }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->notes }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-warning shadow btn-xs sharp me-1" title=""><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp" title="Delete Order"><i class="fa fa-trash"></i></a>
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