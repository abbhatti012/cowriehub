@extends('affiliate.layout.index')
@section('content')
<link rel="stylesheet" href="{{ asset('daterange/style.css') }}">
<div class="content-body">
    <div class="container-fluid">
        <div style="display: none;" class="panel">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <form action="{{ route('affiliate.commissions') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" id="date-range" name="date" readonly class="form-control">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        <div>
                    </form>
                </ol>
            </div>
        </div>
        <p class="slide">
            <div class="pull-me">
                <p>Apply Filter!</p>
            </div>
        </p>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header border-0 d-sm-flex d-block">
                        <div class="me-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Commissions Stat</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="reservationChart" class="reservationChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('daterange/script.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".daterangepicker.ltr").css('display','none');
        $('.pull-me').click(function() {
            $('.panel').slideToggle('slow');
        });
    })
</script>
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