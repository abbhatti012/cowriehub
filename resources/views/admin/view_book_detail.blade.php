@extends('admin.layout.index')
@section('content')
<style>
    .outCampaign{
        display: none;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Book Details</a></li>
            </ol>
        </div>
            <div class="col-12">
            <div class="card">
        <div class="card-header">
          <h3 class="card-title">Book Details</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Hard Cover</span>
                      <span class="info-box-number text-center text-muted mb-0">ISBN:  {{ $book->hard_isbn }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Paper Back</span>
                      <span class="info-box-number text-center text-muted mb-0">ISBN:  {{ $book->paper_isbn }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Digital</span>
                      <span class="info-box-number text-center text-muted mb-0">ISBN:  {{ $book->digital_isbn }}</span>
                    </div>
                  </div>
                </div>                
              </div>
              <div class="row">
                <div class="col-12"><hr>
                <h4 class="text-primary"><i class="fas fa-book"></i> Book Details</h4>
                    <p class="text-muted"></p>
                    <div class="post">                     
                        <p><b>Book Title:&emsp;</b>{{ $book->title }}</p>
                        <p><b>Book Slug:&emsp;</b>{{ $book->slug }}</p>
                        <p><b>Book Price:&emsp;</b>{{ $book->price }}</p>
                        <p><b>Book Subtitle:&emsp;</b>{{ $book->subtitle }}</p>
                        <p><b>Book synopsis:&emsp;</b>{{ $book->synopsis }}</p>
                        <p><b>Book Genre:&emsp;</b>{{ $genre->title }}</p>
                        <p><b>Publisher:&emsp;</b>{{ $book->publisher }}</p>
                        <p><b>Publication Date:&emsp;</b>{{ $book->publication_date }}</p>
                        <p><b>Country:&emsp;</b>{{ $book->country }}</p>
                    </div>
                </div> 
                <div class="col-12"><hr>
                <div class="table-responsive mb-4">
                    <h4 class="text-primary"><i class="fas fa-plus"></i> Book Extras</h4>
                    <p class="text-muted"></p>
              
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Hardcover</th>
                                    <th>Paperback</th>
                                    <th>Digital</th>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_price }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_price }}@else --- @endif</td>
                                    <td>@if($book->is_digital){{ $book->digital_price }}@else --- @endif</td>
                                </tr>
                                <tr>
                                    <th>Page Count:</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_page }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_page }}@else --- @endif</td>
                                    <td>@if($book->is_digital){{ $book->digital_page }}@else --- @endif</td>
                                </tr>
                                <tr>
                                    <th>ISBN:</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_isbn }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_isbn }}@else --- @endif</td>
                                    <td>@if($book->is_digital){{ $book->digital_isbn }}@else --- @endif</td>
                                </tr>
                                <tr>
                                    <th>Weight:</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_weight }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_weight }}@else --- @endif</td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <th>Shipped to cowriehub?</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_ship }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_ship }}@else --- @endif</td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <th>Number In Stock?</th>
                                    <td>@if($book->is_hardcover){{ $book->hard_stock }}@else --- @endif</td>
                                    <td>@if($book->is_paperback){{ $book->paper_stock }}@else --- @endif</td>
                                    <td>---</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h4 class="text-primary"><i class="fas fa-clock"></i> Hardcover Preorder Shipment Date</h4>
              <p class="text-muted"></p>
              <hr>
              @if($book->hard_expected_shipment != null && $book->hard_expected_shipment > date('Y-m-d'))
              <div class="countdown-timer mb-5">
                    <div class="d-flex align-items-stretch justify-content-between">
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 days"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 hours"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 minutes"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 seconds"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                        </div>
                    </div>
                </div>   
                @endif   
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h4 class="text-primary"><i class="fas fa-clock"></i> Paperback Preorder Shipment Date</h4>
              <p class="text-muted"></p>
              <hr>
              @if($book->paper_expected_shipment != null && $book->paper_expected_shipment > date('Y-m-d'))
              <div class="countdown-timer mb-5">
                    <div class="d-flex align-items-stretch justify-content-between">
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 days1"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Days</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 hours1"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Hours</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 minutes1"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Mins</span>
                        </div>
                        <div class="border-left pr-3 pr-md-0">&nbsp;</div>
                        <div class="py-2d75">
                            <span class="font-weight-medium font-size-3 seconds1"></span>
                            <span class="font-size-2 ml-md-2 ml-xl-0 ml-wd-2 d-xl-block d-wd-inline">Secs</span>
                        </div>
                    </div>
                </div>   
                @endif   
            </div>

            <div class="col-12">
                <div class="table-responsive mb-4">
                    <h4 class="text-primary"><i class="fas fa-plus"></i>Additional Form Fields</h4>
                    <p class="text-muted"></p>
                        <a href="{{ route('book-field-detail',$book->id) }}?param=xmlExport" target="_blank" class="btn btn-primary">Export to XML</a>
                        <a href="{{ route('book-field-detail',$book->id) }}?param=csvExport" target="_blank" class="btn btn-primary">Export to CSV</a>
                        <a href="{{ route('book-field-detail',$book->id) }}?param=jsonExport" target="_blank" class="btn btn-primary">Export to JSON</a>
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                                @foreach($extras as $extra)
                                    <tr>
                                        <th>{{ $extra->label }}</th>
                                        <td>{{ $extra->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            var end_date = "<?= date('Y-m-d') ?>";
            let today = new Date(end_date),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "<?= $book->hard_expected_shipment ?>",
                birthday = dayMonth;
            
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
            
            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {

                    const now = new Date().getTime(),
                    distance = countDown - now;
                    
                    $('.days').html(Math.floor(distance / (day)));
                    $('.hours').html(Math.floor((distance % (day)) / (hour)));
                    $('.minutes').html(Math.floor((distance % (hour)) / (minute)));
                    $('.seconds').html(Math.floor((distance % (minute)) / second));
                    
                    if (distance < 0) {
                        clearInterval(x);
                    }
                }, 0)
            }());
    </script>
    <script>
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            var end_date = "<?= date('Y-m-d') ?>";
            let today = new Date(end_date),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "<?= $book->paper_expected_shipment ?>",
                birthday = dayMonth;
            
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
            
            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {

                    const now = new Date().getTime(),
                    distance = countDown - now;
                    
                    $('.days1').html(Math.floor(distance / (day)));
                    $('.hours1').html(Math.floor((distance % (day)) / (hour)));
                    $('.minutes1').html(Math.floor((distance % (hour)) / (minute)));
                    $('.seconds1').html(Math.floor((distance % (minute)) / second));
                    
                    if (distance < 0) {
                        clearInterval(x);
                    }
                }, 0)
            }());
    </script>
@endsection