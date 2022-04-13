/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  console.log(basedata);
  var labels = [];
  var dataGWP = [];
  var sumPremium = 0;
  for (var i=0; i < basedata.length; i++){
    labels[i] = basedata[i]['Labels'];
    dataGWP[i] = basedata[i]['GrossPremium'];
    sumPremium += basedata[i]['GrossPremium'];
  }
  $('#span-totalgwp').html('Rp ' + number_format(sumPremium,2,',','.'));
  console.log(labels);
  console.log(sumPremium);
  
  var $salesChart = $('#GWP-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: dataGWP
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return 'Rp ' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

  var $salesChart1 = $('#sales-chart1')
  // eslint-disable-next-line no-unused-vars
  var salesChart1 = new Chart($salesChart1, {
    type: 'bar',
    data: {
      labels: ['APR', 'MAY', 'JUN', 'JUL', 'AUG', 'OCT', 'NOV', 'DES', 'JAN', 'FEB', 'MAR', 'APR'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000, 2000, 3000, 2500, 2700, 2500, 3000]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
})
