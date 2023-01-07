@extends('admin.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .btn-lg, .btn-group-lg>.btn{
        padding: 0.5rem 2rem !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">All Books</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">All Books</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Books</h4>
                        <div class="d-flex">
                            <a href="{{ route('admin.add-book') }}" class="btn btn-primary shadow btn-lg sharp" title="Add a Book">Add a Book</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(isset($books) && !empty($books))
                            <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>View Detail</th>
                                        <th>Title</th>
                                        <th>Sub-Title</th>
                                        <th>Genre</th>
                                        <th>Publisher</th>
                                        <th>Publication Date</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <!-- <th>Is Best Selling?</th> -->
                                        <th>Is Featured?</th>
                                        <th>Is OnSale?</th>
                                        <th>Is Most Viewed?</th>
                                        <th>Is New Release?</th>
                                        <th>Is Biographies?</th>
                                        <th>Promo Deals?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($books as $book)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.view-book-detail',$book->id) }}" class="btn btn-info shadow btn-xs sharp" title="Vide Detail"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td><a href="{{ route('product', $book->slug) }}" target="_blank">{{ $book->title }}</a></td>
                                        <td>{{ $book->subtitle }}</td>
                                        <td>{{ $book->sub_genre->title }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->publication_date }}</td>
                                        <td>{{ $book->country }}</td>
                                        <td>
                                        @if($book->status == 1) <span class="badge light badge-info">Approved</span> 
                                            <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                            data-id="{{ $book->id }}"
                                            data-text="Book is set as disabled!"
                                            data-sub_text="You want to disable the book?"
                                            data-column="status"
                                            data-value="0"
                                            title="Approved"><i class="fa fa-times"></i></a>
                                        @else <span class="badge light badge-danger">Pending</span> 
                                            <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                            data-id="{{ $book->id }}"
                                            data-text="Book is now puclished!"
                                            data-sub_text="You want to approve the book?"
                                            data-column="status"
                                            data-value="1"
                                            title="Pending"><i class="fa fa-check"></i></a>
                                        @endif

                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.edit-book',$book->id) }}" class="btn btn-primary shadow btn-xs sharp" title="Edit Book"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('delete-book',$book->id) }}" onclick="if (! confirm('Are you sure you want to delete book?')) { return false; }" class="btn btn-danger shadow btn-xs sharp" title="Delete Book"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            @if($book->is_best)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from Best Selling!"
                                                data-sub_text="You want to remove the book from Best Selling?"
                                                data-column="is_best"
                                                data-value="0"
                                                title="In Best Selling"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to Best Selling!"
                                                data-sub_text="You want to add the book in Best Selling?"
                                                data-column="is_best"
                                                data-value="1"
                                                title="Not In Best Selling"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td> -->
                                        <td>
                                            @if($book->is_featured)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from featured!"
                                                data-sub_text="You want to remove the book from featured?"
                                                data-column="is_featured"
                                                data-value="0"
                                                title="In Featured"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to featured!"
                                                data-sub_text="You want to add the book in featured?"
                                                data-column="is_featured"
                                                data-value="1"
                                                title="Not In Featured"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->is_sale)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from On Sale!"
                                                data-sub_text="You want to remove the book from On Sale?"
                                                data-column="is_sale"
                                                data-value="0"
                                                title="In Sale"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to On Sale!"
                                                data-sub_text="You want to add the book in On Sale?"
                                                data-column="is_sale"
                                                data-value="1"
                                                title="Not In Sale"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->is_most_viewed)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from Most Viewed!"
                                                data-sub_text="You want to remove the book from Most Viewed?"
                                                data-column="is_most_viewed"
                                                data-value="0"
                                                title="In Most Viewed"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to Most Viewed!"
                                                data-sub_text="You want to add the book in Most Viewed?"
                                                data-column="is_most_viewed"
                                                data-value="1"
                                                title="Not In Most Viewed"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->is_new)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from New Release!"
                                                data-sub_text="You want to remove the book from New Release?"
                                                data-column="is_new"
                                                data-value="0"
                                                title="In New Release"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to New Release!"
                                                data-sub_text="You want to add the book in New Release?"
                                                data-column="is_new"
                                                data-value="1"
                                                title="Not In New Release"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->is_biographies)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from Biographies!"
                                                data-sub_text="You want to remove the book from Biographies?"
                                                data-column="is_biographies"
                                                data-value="0"
                                                title="In Biographies"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to Biographies!"
                                                data-sub_text="You want to add the book in Biographies?"
                                                data-column="is_biographies"
                                                data-value="1"
                                                title="Not In Biographies"><i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($book->is_campaign)
                                                <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp takeAction" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is removed from Campaign!"
                                                data-sub_text="You want to remove the book from Campaign?"
                                                data-column="is_campaign"
                                                data-value="0"
                                                title="In Campaign"><i class="fa fa-times"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp add_to_campaign" 
                                                data-id="{{ $book->id }}"
                                                data-text="Book is added to Campaign!"
                                                data-sub_text="You want to add the book in Campaign?"
                                                data-column="is_campaign"
                                                data-value="1"
                                                title="Not In Campaign"><i class="fa fa-check"></i></a>
                                            @endif
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.takeAction').on('click',function(){
                var column = $(this).data('column');
                var value = $(this).data('value');
                var id = $(this).data('id');
                var text = $(this).data('text');
                var sub_text = $(this).data('sub_text');
                
                swal({
                    title: "Are you sure?",
                    text: sub_text,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type : 'POST',
                            url : '{{ route("admin.update-book-status") }}',
                            data : {
                                "_token": "{{ csrf_token() }}",
                                id : id,
                                value : value,
                                column : column
                            },
                            success : function(data){
                                if(data){
                                    swal(text, {
                                        icon: "success",
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },1000)
                                } else {
                                    swal("Something went wrong!");
                                }
                            }
                        })
                    
                    } else {
                        swal("Action Back!");
                    }
                });
            });
            $(document).on('click','.add_to_campaign',function(){
                var column = $(this).data('column');
                var value = $(this).data('value');
                var id = $(this).data('id');
                var text = $(this).data('text');
                var sub_text = $(this).data('sub_text');
                
                swal({
                    text: 'Please enter book old price',
                    content: "input",
                        button: {
                            text: "Add!",
                            closeModal: false,
                        },
                    })
                    .then(old_price => {
                        if (old_price) {
                        $.ajax({
                            type : 'POST',
                            url : '{{ route("admin.update-campaign-status") }}',
                            data : {
                                "_token": "{{ csrf_token() }}",
                                id : id,
                                value : value,
                                column : column,
                                old_price : old_price
                            },
                            success : function(data){
                                if(data){
                                    swal(text, {
                                        icon: "success",
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },1000)
                                } else {
                                    swal("Something went wrong!");
                                }
                            }
                        })
                    
                    } else {
                        swal("Action Back!");
                    }
                })    
            });
        });
    </script>
@endsection