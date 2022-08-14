@extends($role.'.layout.index')
@section('content')
<link rel="stylesheet" href="{{asset('admin_assets/vendor/select2/css/select2.min.css')}}">
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
                        <h4 class="card-title">Edit Coupon</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.update-coupon', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input class="form-control form-control-lg" name="start_date" type="date" value="{{ $coupon->start_date }}" max="{{ date('Y-m-d') }}" id="start_date" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input class="form-control form-control-lg" name="end_date" type="date" value="{{ $coupon->end_date }}" id="end_date" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="code">Coupon Code</label>
                                    <input class="form-control form-control-lg" name="code" type="text" id="code" value="{{ $coupon->code }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="off">Coupon Discount (%)</label>
                                    <input class="form-control form-control-lg" name="off" type="number" min="1" max="100" value="{{ $coupon->off }}" id="off" required>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="select2-label form-label">Select Books</label> <br>
                                    <div class="mt-4">
                                        <select class="js-example-programmatic-multi" multiple="multiple" name="bookId[]" required>
                                            @foreach($books as $book)
                                                <option value="{{ $book->id }}" 
                                                <?php foreach(unserialize($coupon->book_id) as $bk){
                                                    if($bk == $book->id){
                                                        echo 'selected';
                                                    }
                                                } ?>
                                                >{{ $book->title }}</option>
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
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('admin_assets/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection