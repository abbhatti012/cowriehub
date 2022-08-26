<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.user-table{
    overflow-x: initial !important;
}
.modal-content{
    height: 400px !important;
}
</style>
<div class="table-responsive user-table">
    <table id="customers" class="display" style="min-width: 845px">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Amount to be paid</th>
                <th>Payment Status</th>
                <th>Is Referrer?</th>
                <th>Amount Paid</th>
                <th>Pay</th>
            </tr>
        </thead>
        <tbody>
        
        @forelse($revenues as $revenue)
            <tr>
                <td>{{ $revenue->user->name }}</td>
                <td>{{ $revenue->user->email }}</td>
                <td>
                    @if($revenue->is_referrer)
                        {{ $revenue->affiliate_amount }}
                    @else
                        {{ $revenue->user_amount }}
                    @endif
                </td>
                <td>
                    @if($revenue->admin_payment_status == 0)
                    <span class="badge light badge-warning">PENDING</span>
                    @else
                    <span class="badge light badge-success">PAID</span>
                    @endif
                </td>
                <td>
                    @if($revenue->is_referrer)
                    <span class="badge light badge-success">YES</span>
                    @else
                    <span class="badge light badge-warning">NO</span>
                    @endif
                </td>
                <td>
                    @if($revenue->admin_payment_status == 0)
                    0
                    @else
                    {{ $revenue->user_amount }}
                    @endif
                </td>
                <td>
                    @if($revenue->admin_payment_status == 0)
                        <a href="javascript:void(0)" class="text-info sharp paymentProof" data-bs-toggle="modal" data-bs-target="#payNow" data-id="{{ $revenue->id }}">Pay Now</a>
                    @else
                        ---
                    @endif
                </td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>
                