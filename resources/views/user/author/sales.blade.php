@extends($role.'.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sales</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="h-100">
<div class="card-body border border-dashed border-end-0 border-start-0">
    <form action="{{ route('author.sales') }}" method="get">
        <div class="row g-3">
            <div class="col-xxl-2 col-sm-6">
                <div class="input-group input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Start Date</span>
                    <input type="date" id="date-range" name="min_date" class="form-control">
                </div>
            </div>
            <div class="col-xxl-2 col-sm-6">
                <div class="input-group input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">End Date</span>
                    <input type="date" class="form-control" name="max_date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="col-xxl-1 col-sm-4">
                <div>
                    <button type="submit" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                        Filters
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
        
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Marketing Purchases</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Amount to be paid</th>
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

<!-- <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0 pb-2">
                <div class="w-100">
                    <div id="customer_impression_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
</div> -->

</div>
@endsection
@section('scripts')
<script>
    (function($) {
    var dzChartlist = function() {

        var screenWidth = $(window).width();

        var radialChart = function() {
            var options = {
                series: [70],
                chart: {
                    height: 150,
                    type: 'radialBar',
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: '35%',
                        },
                        dataLabels: {
                            show: false,
                        }
                    },
                },
                labels: [''],
            };

            var chart = new ApexCharts(document.querySelector("#radialChart"), options);
            chart.render();
        }

        var reservationChart = function() {
            var options = {
                series: [{
                    name: 'Total Orders',
                    data: [
                        <?php foreach($graph_data['orderCountArr'] as $count): ?>
                            "<?php echo $count; ?>",
                        <?php endforeach; ?>
                    ]
                }, {
                    name: 'Earning',
                    data: [
                        <?php foreach($graph_data['orderNetArr'] as $net): ?>
                            "<?php echo $net; ?>",
                        <?php endforeach; ?>
                    ]
                }],
                chart: {
                    height: 400,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                colors: ["#1362FC", "#FF6E5A"],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 6,
                    curve: 'smooth',
                },
                legend: {
                    show: false
                },
                grid: {
                    borderColor: '#EBEBEB',
                    strokeDashArray: 6,
                },
                markers: {
                    strokeWidth: 6,
                    hover: {
                        size: 15,
                    }
                },
                yaxis: {
                    labels: {
                        offsetX: -12,
                        style: {
                            colors: '#787878',
                            fontSize: '13px',
                            fontFamily: 'Poppins',
                            fontWeight: 400

                        }
                    },
                },
                xaxis: {
                    categories: [
                        <?php foreach($graph_data['label'] as $label): ?>
                            "<?php echo $label; ?>",
                        <?php endforeach; ?>
                    ],
                    labels: {
                        style: {
                            colors: '#787878',
                            fontSize: '13px',
                            fontFamily: 'Poppins',
                            fontWeight: 400

                        },
                    }
                },
                fill: {
                    type: "solid",
                    opacity: 0.1
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#reservationChart"), options);
            chart.render();
        }

        var donutChart = function() {
                $("span.donut").peity("donut", {
                    width: 150,
                    height: 150
                });
                if ($(window).width() <= 1600) {
                    $("span.donut").peity("donut", { width: '110', height: '110' });
                } else {
                    $("span.donut").peity("donut", { width: '150', height: '150' });
                }
                $(window).resize(function() {
                    if ($(window).width() <= 1600) {
                        $("span.donut").peity("donut", { width: '110', height: '110' });
                    } else {
                        $("span.donut").peity("donut", { width: '150', height: '150' });
                    }
                })
            }
            /* Function ============ */
        return {
            init: function() {},
            load: function() {
                radialChart();
                reservationChart();
                donutChart();
            },
            resize: function() {}
        }
    }();
    jQuery(window).on('load', function() {
        setTimeout(function() {
            dzChartlist.load();
        }, 1000);
    });
})(jQuery);
</script>
@endsection