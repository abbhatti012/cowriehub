@extends('user.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Revenue</a></li>
            </ol>
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
                        <h4 class="card-title">All Revenues</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Amount to be pay</th>
                                        <th>Payment Status</th>
                                        <th>Amount Paid</th>
                                        <th>Payment Proof</th>
                                        <th>Payment Note</th>
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
                                            @if($revenue->payment_proof)
                                                <a href="{{ asset($revenue->payment_proof) }}" target="_blank" class="text-info sharp">View</a>
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        <td>
                                            {{ $revenue->payment_note }}
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