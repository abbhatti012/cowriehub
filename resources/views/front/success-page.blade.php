<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      table{
          margin-left: 15%;
          text-align: center;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
        <br><br>
        <div class="tab-content font-size-2 container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9 information">
                        <!-- Mockup Block -->
                        <div class="table-responsive mb-4">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="px-4 px-xl-5">Payment Method: </th>
                                        <td>{{ $payment->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Status:</th>
                                        <td>{{ $payment->status }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Total Amount:</th>
                                        <td>{{ $payment->total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Location:</th>
                                        <td>{{ $payment->precise_location }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="{{ asset('/') }}">Go Back</a>
      </div>
    </body>
</html>