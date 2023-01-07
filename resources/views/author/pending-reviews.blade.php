@extends($role.'.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .btn-lg, .btn-group-lg>.btn{
        padding: 0.5rem 2rem !important;
    }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Reviews</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Reviews</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                        <th>Review Now</th>
                                        <th>View Detail</th>
                                        <th>Title</th>
                                        <th>Sub-Title</th>
                                        <th>Genre</th>
                                        <th>Publisher</th>
                                        <th>Publication Date</th>
                                        <th>Country</th>
                                    </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                                    <tr>
                                        <td>
                                            <a href="{{ route('product',$book->slug) }}#customers-review" class="text-danger" target="_blank">review</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-info shadow btn-xs sharp viewDetail" data-id="{{ $book->id }}" data-bs-toggle="modal" data-bs-target="#viewDetail" title="Vide Detail"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td><a href="{{ route('product', $book->slug) }}" target="_blank">{{ $book->title }}</a></td>
                                        <td>{{ $book->subtitle }}</td>
                                        <td>{{ $book->sub_genre->title }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->publication_date }}</td>
                                        <td>{{ $book->country }}</td>
                                    </tr>
                                @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body bookDetailHere">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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