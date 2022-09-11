<div class="col-12">
  <div class="card">
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
                      <p><b>Total Reviews:&emsp;</b>{{ $book->total_reviews }}</p>
                      @if($book->total_reviews > 0)
                      <p><b>Average Rating:&emsp;</b>{{ round($book->total_ratings / $book->total_reviews, 2) }}</p>
                      @else 
                      <p><b>Average Rating:&emsp;</b>0</p>
                      @endif
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