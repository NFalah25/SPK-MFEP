"use strict";

var ctx = document.getElementById("nilai").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan', 'Amanda Nababan'],
    datasets: [{
      label: 'Nilai',
      data: [85, 78, 92, 88, 95, 85, 78, 92, 88, 95],
      borderWidth: 2,
      backgroundColor: 'rgba(0, 123, 255, .8)',
      borderWidth: 0,
      borderColor: 'transparent',
      pointBorderWidth: 0,
      pointRadius: 0,
      pointBackgroundColor: 'rgba(0, 123, 255, .8)',
      pointHoverBackgroundColor: 'rgba(0, 123, 255, .8)',
    }]
  },
  options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
      }
    },

    maintainAspectRatio: true,
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true
    },
    legend: {
      display: false,
      position: 'bottom'
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 20,
          callback: function(value, index, values) {
            return value;
          }
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
          tickMarkLength: 25,
        }
      }]
    },
  }
});