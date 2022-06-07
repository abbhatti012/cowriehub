(function($) {
    "use strict"

    var dzMorris = function() {

        var screenWidth = $(window).width();

        var lineChart2 = function() {
            //Area chart
            Morris.Area({
                element: 'line_chart_2',
                data: [{
                        period: '2001',
                        smartphone: 0,
                        windows: 0,
                        mac: 0
                    }, {
                        period: '2002',
                        smartphone: 90,
                        windows: 60,
                        mac: 25
                    }, {
                        period: '2003',
                        smartphone: 40,
                        windows: 80,
                        mac: 35
                    }, {
                        period: '2004',
                        smartphone: 30,
                        windows: 47,
                        mac: 17
                    }, {
                        period: '2005',
                        smartphone: 150,
                        windows: 40,
                        mac: 120
                    }, {
                        period: '2006',
                        smartphone: 25,
                        windows: 80,
                        mac: 40
                    }, {
                        period: '2007',
                        smartphone: 10,
                        windows: 10,
                        mac: 10
                    }


                ],
                xkey: 'period',
                ykeys: ['smartphone', 'windows', 'mac'],
                labels: ['Phone', 'Windows', 'Mac'],
                pointSize: 3,
                fillOpacity: 0,
                pointStrokeColors: ['#EE3C3C', '#ED3CB1', '#1362FC'],
                behaveLikeLine: true,
                gridLineColor: 'transparent',
                lineWidth: 3,
                hideHover: 'auto',
                lineColors: ['rgb(238, 60, 60)', 'rgb(0, 171, 197)', '#1362FC'],
                resize: true

            });
        }

        /* Function ============ */
        return {
            init: function() {
                lineChart2();
            },


            resize: function() {
                screenWidth = $(window).width();
                lineChart2();
            }
        }

    }();

    jQuery(document).ready(function() {
        dzMorris.init();
        //dzMorris.resize();

    });

    jQuery(window).on('load', function() {
        //dzMorris.init();
    });

    jQuery(window).resize(function() {
        //dzMorris.resize();
        //dzMorris.init();
    });

})(jQuery);