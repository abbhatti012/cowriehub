@extends('publisher.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
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
                            <a href="#!" class="btn btn-primary btn-csv">CSV</a>
                            <a href="#!" class="btn btn-primary btn-excel">Excel</a>
                            <a href="#!" class="btn btn-primary btn-pdf">PDF</a>
                            <a href="#!" class="btn btn-primary btn-print">Print</a>
                            <table id="datatables" class="display" style="min-width: 845px">
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
@section('scripts')
    <script>
        $(document).ready(function(){
           $('.viewDetail').on('click',function(){
                var id = $(this).data('id');
                $.ajax({
                    type : 'GET',
                    url : '{{ route("view-book-detail") }}?id='+id,
                    async : true,
                    dataType : 'JSON',
                    success : function(data){
                        $('.bookDetailHere').html(data);
                    }
                })
           }) 
        });
    </script>
    <script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
    <script src='http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
    <script src='http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>
@endsection