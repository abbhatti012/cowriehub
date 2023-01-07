@extends($role.'.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Wishlist</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Wishlist</li>
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
                <h5 class="card-title mb-0">All Wishlist</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                </th>
                                <th>#</th>
                                <th>Image</th>
                                <th>Typpe</th>
                                <th>Title</th>
                                <th>Publisher</th>
                                <th>Publication Date</th>
                                <th>Reviews</th>
                                <th>Price</th>
                                <th>Remove Wishlist</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($wishlist as $book)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="{{ route('product', $book->slug) }}" class="d-block"><img src="{{ asset($book->hero_image) }}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a></td>
                                        <td>
                                            @if($book->is_paperback)
                                                Paperback
                                            @elseif($book->is_hardcover)
                                                , Hardcover
                                            @elseif($book->is_digital)
                                                , Digital
                                            @endif
                                        </td>
                                        <td><a href="{{ route('product', $book->slug) }}" target="_blank">{{ $book->title }}</a></td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->publication_date }}</td>
                                        <td>
                                            @if($book->total_reviews != 0)
                                                @php $avg_rating = round($book->total_ratings / $book->total_reviews) @endphp
                                            @else
                                                @php $avg_rating = 0; @endphp
                                            @endif
                                            <span class="text-yellow-darker">
                                            @if($avg_rating < 5)
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                                @for($i = 0; $i < 5 - $avg_rating; $i++)
                                                    <small class="far fa-star"></small>
                                                @endfor
                                            @else
                                                @for($i = 0; $i < $avg_rating; $i++)
                                                    <small class="fas fa-star"></small>
                                                @endfor
                                            @endif
                                            </span>
                                        </td>
                                        <td>
                                            GHS</span>{{ $book->price }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="removeWishlist h-p-bg btn btn-outline-primary border-0" data-id="{{ $book->wish_id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- inventory add Details Modal -->
        <div id="userdetails" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Assign A Job</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0);">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="ForminputState" class="form-label">Consultant</label>
                                        <select id="ForminputState" class="form-select">
                                            <option selected>Choose...</option>
                                            <option> </option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="ForminputState" class="form-label">Job</label>
                                        <select id="ForminputState" class="form-select">
                                            <option selected>Choose...</option>
                                            <option> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Add Note</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter code" id="code"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Assign</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click','.removeWishlist',function(){
                var id = $(this).data('id');
                $.ajax({
                    type : 'GET',
                    url : '{{ route("remove-wishlist") }}',
                    data : {
                        id : id
                    },
                    success : function(data){
                        $.notify('Product removed from the wishlist successfully!', 'success');
                        setTimeout(function(){
                            location.reload();
                        },800);
                    }
                })
            });
        });
    </script>
@endsection