
<div class="table-responsive">
    <table id="example5" class="display" style="min-width: 845px">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Amount to be paid</th>
                <th>Payment Status</th>
                <th>Amount Paid</th>
                <th>Pay</th>
            </tr>
        </thead>
        <tbody>
        
        @forelse($revenues as $revenue)
            <tr>
                <td>{{ $revenue->user->name }}</td>
                <td>{{ $revenue->user->email }}</td>
                <td>{{ $revenue->user_amount }}</td>
                <td>
                    @if($revenue->admin_payment_status == 0)
                    <span class="badge light badge-warning">PENDING</span>
                    @else
                    <span class="badge light badge-success">PAID</span>
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
                