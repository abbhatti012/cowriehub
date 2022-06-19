@extends('consultant.layout.index')
<style>
    .content-body{
        display: block !important;
    }
    #loader {
        display: none !important;
    }
</style>
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sales</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Average Sales</h4>
                    </div>
                    <div class="card-body">
                        <div id="morris_chart_height"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var month = [];
        var count = [];
    </script>
    @foreach($userArr as $key => $count)
        <script>
            month.push("{{ $key }}");  
            count.push("{{ $count }}");  
        </script>
    @endforeach
@endsection
@section('scripts')
  
    <script src="{{asset('js/highchart.js')}}"></script>
    <script>
        Highcharts.chart('morris_chart_height', {

        xAxis: {
        type: 'datetime'
        },

        series: [{
        name: 'Transactions',
        data: [
        {
            x: Date.UTC("{{ $filter['year'] }}", 0, 31),
            y: parseInt(count[1])
        }, {
            x: Date.UTC("{{ $filter['year'] }}", 1, 28),
            y: parseInt(count[2])
        }, {
            x: Date.UTC("{{ $filter['year'] }}", 2, 31),
            y: parseInt(count[3])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 3, 30),
            y: parseInt(count[4])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 4, 31),
            y: parseInt(count[5])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 5, 30),
            y: parseInt(count[6])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 6, 31),
            y: parseInt(count[7])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 7, 30),
            y: parseInt(count[8])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 8, 31),
            y: parseInt(count[9])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 9, 30),
            y: parseInt(count[10])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}", 10, 31),
            y: parseInt(count[11])
        },
        {
            x: Date.UTC("{{ $filter['year'] }}",11, 30),
            y: parseInt(count[0])
        },
    ]
        }]
    });
    </script>

@endsection