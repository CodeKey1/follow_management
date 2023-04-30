"use strict";
$(function() {
    var color;
    $(document).ready(function ()
    {
        color = getComputedStyle(document.documentElement).getPropertyValue('--primary_color');
        if (document.getElementById('orderChart') != null) {
            var label = JSON.parse($('input[name=years]').val());
            var data = JSON.parse($('input[name=data]').val());
            var c = document.getElementById("orderChart").getContext('2d');
            var appointment_chart = new Chart(c,
            {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Orders',
                        data: data,
                        borderColor: 'black',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: color,
                        pointBorderColor: 'black',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            });
        }

        if (document.getElementById('usersChart') != null) {
            var dataFirst = {
                label: "Patient",
                data: JSON.parse($('input[name=users]').val()),
                fillOpacity: 0.5,
                borderColor: '#1b5a90'
            };

            var dataSecond = {
                label: "Doctor",
                data: JSON.parse($('input[name=doctors]').val()),
                fillOpacity: 0.5,
                borderColor: '#ff9d00'
            };
            var ctx = document.getElementById('usersChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: JSON.parse($('input[name=month]').val()),
                    datasets: [dataFirst, dataSecond]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }


        if (document.getElementById('revenueChart') != null) {
            var label = JSON.parse($('input[name=years]').val());
            var data = JSON.parse($('input[name=data]').val());
            var c = document.getElementById("revenueChart").getContext('2d');
            var appointment_chart = new Chart(c,
            {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Orders',
                        data: data,
                        borderColor: 'black',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: color,
                        pointBorderColor: 'black',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            });
        }
    });
});