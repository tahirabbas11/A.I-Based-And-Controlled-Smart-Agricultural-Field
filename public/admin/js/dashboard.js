//[Dashboard Javascript]

//Project:	Riday - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)
$(function() {

    'use strict';

    var options = {
        series: [{
            name: 'Revenue',
            data: [31, 50, 28, 70, 45, 90, 140]
        }],
        chart: {
            height: 350,
            type: 'area',
            zoom: {
                enabled: false
            },
        },
        colors: ["#fd683e"],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Set", "Sun"]
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$" + val + " thousands"
                }
            },
        },
    };
    if ($('#chart').length != 0) {
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }



    var options = {
        chart: {
            height: 325,
            type: 'bar',
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                endingShape: 'rounded',
                columnWidth: '65%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 5,
            colors: ['transparent']
        },
        colors: ["#fd683e", "#2d9bda"],
        series: [{
            name: 'In Restaurant',
            data: [70, 45, 51, 58, 59, 58, 61]
        }, {
            name: 'Online Order',
            data: [55, 71, 80, 100, 89, 98, 110]
        }, ],
        xaxis: {
            categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Set", "Sun"],
            axisBorder: {
                show: true,
                color: '#bec7e0',
            },
            axisTicks: {
                show: true,
                color: '#bec7e0',
            },
        },
        legend: {
            show: false,
        },
        fill: {
            opacity: 1

        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.2
            },
            borderColor: '#f1f3fa'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$" + val + "k"
                }
            }
        }
    }

    if ($('#yearly-comparis').length != 0) {
        var chart = new ApexCharts(
            document.querySelector("#yearly-comparison"),
            options
        );

        chart.render();
    }




}); // End of use strict