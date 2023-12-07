"use strict";

console.log(alternatif);

var statistics_chart = document.getElementById("nilai").getContext('2d');
var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: alternatif,
    datasets: [{
      label: 'Nilai',
      data: [52, 84, 66, 93, 76, 91, 75, 68, 70, 79, 55, 88, 75, 70, 97, 92, 69, 63, 88, 99],
      borderWidth: 1,
      borderColor: '#0F2C56',
      backgroundColor: 'rgba(0, 123, 255, .5)',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#0F2C56',
      pointRadius: 3
    }]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    hover: {
      mode: 'nearest',
      intersect: true
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 5
        }
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
