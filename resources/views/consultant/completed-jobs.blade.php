@extends('consultant.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
            </ol>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Completed Jobs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Job No</th>
                                        <th>Author Name</th>
                                        <th>Author Page</th>
                                        <th>Author Stat</th>
                                        <th>Service</th>
                                        <th>Amount</th>
                                        <th>Payment Note</th>
                                        <th>Payment Proof</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($jobs as $job)
                                    <tr>
                                        <td>JOB-{{ $job->id }}</td>
                                        <td><a class="text-primary" href="javascript:void(0)" title="{{ $job->user->name }}">{{$job->user->name}}</a></td>
                                        <td><a href="{{ route('author-detail', $job->user_id) }}" target="_blank" class="text-primary">View Detail</a></td>
                                        <td><a class="text-primary"  href="{{ route('consultant.stat') }}?id={{ $job->user_id }}" title="User Stat">View author Stat</a></td>
                                        
                                        <td>
                                            <a href="javascript:void(0)" class="text-primary viewMarketingDetail" data-bs-toggle="modal" data-bs-target="#viewMarketingDetail"
                                                data-package = "{{ $job->marketing->package }}"
                                                data-price = "{{ $job->marketing->price }}"
                                                data-duration = "{{ $job->marketing->duration }}"
                                                title="View User Detail">View</a>
                                        </td>
                                        <td>
                                            @php $market = DB::table('marketing')->where('id',$job->marketing_id)->first(); @endphp
                                            GHS {{ round(($market->price / 100)*$setting->consultant_commission, 2) }} | 
                                            @if($job->payment_proof == '')
                                                <a href="javascript:void(0)" class="text-danger">PENDING</a>
                                            @else
                                                <a href="javascript:void(0)" class="text-success viewPaymentProof" data-bs-toggle="modal" data-bs-target="#viewPaymentProof" data-proof="{{ asset($job->marketing->payment_proof) }}" data-note="{{ $job->marketing->payment_note }}">PAID</a>
                                            @endif
                                        </td>
                                        @if($job->payment_proof != '')
                                            <td>
                                                {{ $job->payment_note }}
                                            </td>
                                            <td><a href="{{ asset($job->payment_proof) }}" target="_blank" class="text-success">View</a></td>
                                        @else
                                            <td>---</td>
                                            <td>---</td>
                                        @endif
                                        <td><a href="javascript:void(0)" class="text-success">COMPLETED</a></td>
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
<div class="modal fade" id="viewMarketingDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Marketing Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                        <div class="mb-3">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Marketing Packages</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                    </tr>
                                    <tr>
                                        <th>Job Package Detail</th>
                                        <td class="package"></td>
                                        <td class="price"></td>
                                        <td class="duration"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        $('.viewMarketingDetail').on('click',function(){
            var package = $(this).data('package');
            var price = $(this).data('price');
            var duration = $(this).data('duration');
            $('.package').html(package);
            $('.price').html(price);
            $('.duration').html(duration);
        });
    });
</script>
@endsection