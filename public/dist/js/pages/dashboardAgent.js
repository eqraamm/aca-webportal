/* global Chart:false */

$(function () {
  getData(urlStoredData);
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  refreshChartGWP(data_gwp);
  refreshChartLossRatio(data_lossratio)

  $('#btn-refresh').on('click',async function(event){
    event.preventDefault();
    showOverlayTab(true);
    var responseStoredData = getData(urlStoredData);
    await sleep(3);
    var responseGWP = await getData(urlGWP);
    var responselossratio = await getData(urlLossRatio);
    showOverlayTab(false);
    refreshChartGWP(responseGWP['Data']);
    refreshChartLossRatio(responselossratio['Data']);
  });

  function showOverlayTab(status){
    if (status){
      $('#div-overlay').removeAttr('style');
      $('#div-overlay').css('display','normal');
    }else{
      $('#div-overlay').removeAttr('style');
      $('#div-overlay').css('display','none');
    }
  }
  function refreshChartGWP(basedata_gwp){
    var labelsGWP = [];
    var dataGWP = [];
    var sumPremium = 0;
    for (var i=0; i < basedata_gwp.length; i++){
      labelsGWP[i] = basedata_gwp[i]['Labels'];
      dataGWP[i] = basedata_gwp[i]['GrossPremium'];
      sumPremium += basedata_gwp[i]['GrossPremium'];
    }
    var $chart_gwp = $('#GWP-chart')
    // eslint-disable-next-line no-unused-vars
    var chart_gwp = new Chart($chart_gwp, {
      type: 'bar',
      data: {
        labels: labelsGWP,
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
    $('#span-totalgwp').html('Rp ' + number_format(sumPremium,2,',','.'));
  }
  function refreshChartLossRatio(basedata_lossratio){
    var labelsLossRatio = [];
    var dataLossRatio = [];
    // var sumLossRatio = 0;
    for (var i=0; i < basedata_lossratio.length; i++){
      labelsLossRatio[i] = basedata_lossratio[i]['Labels'];
      dataLossRatio[i] = basedata_lossratio[i]['LossRatio'];
      // sumPremium += basedata_lossratio[i]['GrossPremium'];
    }
    var $chart_lossratio = $('#chart-lossratio')
    // eslint-disable-next-line no-unused-vars
    var chart_lossratio = new Chart($chart_lossratio, {
      type: 'bar',
      data: {
        labels: labelsLossRatio,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: dataLossRatio
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
              // callback: function (value) {
              //   if (value >= 1000) {
              //     value /= 1000
              //     value += 'k'
              //   }

              //   return 'Rp ' + value
              // }
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
  }
})
