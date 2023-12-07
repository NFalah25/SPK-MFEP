"use strict";

console.log(alternatif);
console.log(nilai);

var statistics_chart = document.getElementById("nilai").getContext('2d');
var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: alternatif,
    datasets: [{
      label: 'Nilai',
      data: nilai,
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
          stepSize: 25
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
