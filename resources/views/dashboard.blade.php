@extends('layout/main')
<link href="https://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<style>
    .fa-check {
        color: green;
    }

    .fa-times-circle {
        color: red;
    }

</style>
@section('title','ACA INSURANCE | dashboard')

@section('head-linkrel')
<script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
<style>
  html,
  /* body {
    height: 100%;
    width: 100%;
  } */

  /* #myChart {
    height: 100%;
    width: 100%;
    /* min-height: 150px; */
  } */

  .zc-ref {
    display: none;
  }
</style>
@endsection


@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Transaction Perfomance</h3>
              <div class="card-tools">
                <a class="btn-tool"></a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="chart-transaction" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title premium-title">Premium Perfomance</h3>
              <div class="card-tools">
                <div class="btn-group">
                  <button type="button" class="btn btn btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" title="Status Filter">
                    <i class="fas fa-bars"></i>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" onclick="dropDownClick('Waiting')" class="dropdown-item">Waiting</a>
                    <a href="#" onclick="dropDownClick('Approve')" class="dropdown-item">Approve</a>
                    <a href="#" onclick="dropDownClick('Submit')" class="dropdown-item">Submit</a>
                    <a href="#" onclick="dropDownClick('Cancel')" class="dropdown-item">Cancel</a>
                  </div>
                </div>
                <button type="button" class="btn btn btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id='myChart'></div>
            </div>
          </div>
        </div> -->
      </div>
      
      <!-- tester -->
      <!-- <div class="row">
        <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Premium Perfomance</h3>
              <div class="card-tools">
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body"> -->
              <!-- <div id="world-map" style="height: 250px; width: 100%;"></div> -->
              <!-- <div id='myChart'></div> -->
              <!-- <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div> -->
              <!-- <div class="row">
                <div class="col-md-6">
                  <div id='myChart'></div>
                </div>
                <div class="col-md-6">
                  <div id='myChart2'></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div id='myChart3'></div>
                </div>
                <div class="col-md-6">
                  <div id='myChart4'></div>
                </div>
              </div> -->
            <!-- </div> -->
            <!-- <div class="card-body">
              <div class="row">
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="30" data-width="100" data-height="100" data-fgColor="#3c8dbc">

                  <div class="knob-label">New Visitors</div>
                </div>
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="70" data-width="90" data-height="90" data-fgColor="#f56954">

                  <div class="knob-label">Bounce Rate</div>
                </div>
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90"
                          data-height="90" data-fgColor="#00a65a">

                  <div class="knob-label">Server Load</div>
                </div>
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="40" data-width="90" data-height="90" data-fgColor="#00c0ef">

                  <div class="knob-label">Disk Space</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-md-3 text-center">
                  <input type="text" class="knob" value="90" data-width="100" data-height="100" data-fgColor="#932ab6" readonly>

                  <div class="knob-label">Bandwidth</div>
                </div>
                <div class="col-md-6 col-md-3 text-center">
                  <input type="text" class="knob" value="50" data-width="90" data-height="90" data-fgColor="#39CCCC">

                  <div class="knob-label">CPU</div>
                </div>
              </div>
            </div> -->
          <!-- </div>
        </div>
      </div> -->
      <!-- end tester -->
      
      <!-- bagian bawah -->
      <!-- <div class="row">
        <div class="col-md-3 col-sm-5 col-12">
          <div class="info-box shadow" type="button" onclick="viewDetailWidget('waiting')">
            <span class="info-box-icon bg-warning"><i class="fas fa-pencil-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Waiting</span>
                <span class="info-box-number" id="waiting"> </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-5 col-12">
          <div class="info-box shadow" type="button" onclick="viewDetailWidget('approved')">
            <span class="info-box-icon bg-success"><i class="far fa-check-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Approve</span>
                <span class="info-box-number" id="approve"> </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-5 col-12">
          <div class="info-box shadow" type="button" onclick="viewDetailWidget('submit')">
            <span class="info-box-icon bg-primary"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Submit</span>
                <span class="info-box-number" id="submit"> </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-5 col-12">
          <div class="info-box shadow" type="button" onclick="viewDetailWidget('cancel')">
            <span class="info-box-icon bg-danger"><i class="fas fa-ban"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Cancel</span>
                <span class="info-box-number" id="cancel"> </span>
            </div>
          </div>
        </div>
      </div> -->
      <div class="modal fade" id="modal-widget">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <label class="modal-title">Detail Widget</label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="body-widget"></div>
          </div>
        </div>
      </div>

          <!-- bagian datatable -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dashboard Marketing</h3>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <div class="form-group row">
                  <label for="TxtName" class="col-sm-3 col-form-label">TaskDue</label>
                  <div class="input-group date col-sm-2" id="sdate" data-target-input="nearest">
                    <input type="text" id="InceptionDate" name="TxtSDate" class="form-control datetimepicker-input" data-target="#sdate" required />
                    <div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>_
                  <div class="input-group date col-sm-2" id="edate" data-target-input="nearest">
                    <input type="text" id="ExpiryDate" name="TxtEDate" class="form-control datetimepicker-input" data-target="#edate" required />
                    <div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <table id="dashboard" class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
@endsection

@section('scriptpage')
<script>
  // refreshGaugeChart(90);
  let tblWidget;
  let status;
  var arrPolicy = @json($data['Data']);
  console.log(arrPolicy);
  
  var tempwait = arrPolicy.filter(dashboard => dashboard.PStatus != 'P');
  const waiting = tempwait.filter(dashboard => dashboard.PStatus != 'C');

  // var Wait_Esign = arrPolicy.filter(dashboard => dashboard.NeedESignF == true);
  // Wait_Esign2 = Wait_Esign.filter(dashboard => dashboard.EsignF == false);

  // var Wait_Survey = arrPolicy.filter(dashboard => dashboard.NeedSurveyF == true);
  // Wait_Survey2 = Wait_Survey.filter(dashboard => dashboard.SurveyF == false);

  // const waiting = tempwait.concat(Wait_Esign2,Wait_Survey2);

  //Approve
  var temp_approved = arrPolicy.filter(dashboard => dashboard.PStatus == 'P');
  var Approved = temp_approved.filter(dashboard => dashboard.Job_PolicyNo != '');
  //Submit
  var temp_submit = arrPolicy.filter(dashboard => dashboard.PStatus == 'P');
  var Submit = temp_submit.filter(dashboard => dashboard.Job_PolicyNo == '');
  //Decline
  var Decline = arrPolicy.filter(dashboard => dashboard.PStatus == 'C');

  function dropDownClick(status){
    var val = 0;
    switch(status){
      case 'Waiting':
        val = waiting.length;
        break;
      case 'Approve':
        val = Approved.length;
        break;
      case 'Submit':
        val = Submit.length;
        break;
      case 'Cancel':
        val = Decline.length;
        break;
      default:
        val = 0;  
    }
    refreshGaugeChart(val,status);
    // $('.premium-title').html('Premium Perfomance - ' + status);
  }
  function refreshGaugeChart(val, title){
    var myConfig = {
      gui: {
        behaviors: [
          {
            id: 'DownloadPDF',
            enabled: 'none'
          },
          {
            id: 'Reload',
            enabled: 'none'
          },
          {
            id: 'SaveAsImagePNG',
            enabled: 'none'
          },
          {
            id: 'SaveAsImagePNG',
            enabled: 'none'
          },
          {
            id: 'DownloadCSV',
            enabled: 'none'
          },
          {
            id: 'DownloadSVG',
            enabled: 'none'
          },
          {
            id: 'DownloadXLS',
            enabled: 'none'
          },
          {
            id: 'Print',
            enabled: 'none'
          },
          {
            id: 'ViewSource',
            enabled: 'none'
          }
        ]
      },
      "type": "gauge",
      "title":{
        "text": title,
        "font-size": 15
      },
      "scale-r": {
        "aperture": 200,
        // "values": "0:500000000:100000000",
        minValue: 0,
        maxValue: 500000000,
        step: 100000000,
        "center": {
          "size": 5,
          "background-color": "#66CCFF #FFCCFF",
          "border-color": "none"
        },
        "ring": {
          "size": 30,
          "rules": [{
              "rule": "%v >= 0 && %v <= 100000000",
              "background-color": "red",
              "text": "Poor"
            },
            {
              "rule": "%v >= 100000000 && %v <= 150000000",
              "background-color": "orange"
            },
            {
              "rule": "%v >= 150000000 && %v <= 300000000",
              "background-color": "yellow"
            },
            {
              "rule": "%v >= 300000000 && %v <= 400000000",
              "background-color": "green"
            },
            {
              "rule": "%v >= 400000000 && %v <= 500000000",
              "background-color": "blue"
            }
          ]
        },
        "labels": ["", "Poor", "Fair", "Good", "Great", ""], //Scale Labels
        "item": { //Scale Label Styling
          "font-color": "purple",
          "font-family": "Georgia, serif",
          "font-size": 12,
          "font-weight": "bold", //or "normal"
          "font-style": "normal", //or "italic"
          "offset-r": 0,
          "angle": "auto"
        }
      },
      "scale": {
        "size-factor": "160%" //Modify your gauge chart size.
      },
      plotarea: {
        marginTop: 110
      },
      "plot": {
        "csize": "5%",
        "size": "100%",
        "background-color": "#000000",
        // valueBox: {
        //   placement: 'center',
        //   text: '%v', //default
        //   // fontSize: 20,
        //   // rules: [{
        //   //     rule: '%v >= 700',
        //   //     text: '%v<br>EXCELLENT'
        //   //   },
        //   //   {
        //   //     rule: '%v < 700 && %v > 640',
        //   //     text: '%v<br>Good'
        //   //   },
        //   //   {
        //   //     rule: '%v < 640 && %v > 580',
        //   //     text: '%v<br>Fair'
        //   //   },
        //   //   {
        //   //     rule: '%v <  580',
        //   //     text: '%v<br>Bad'
        //   //   }
        //   // ]
        // }
      },
      // "plotarea": {
      //   "marginTop": 50
      // },
      "series": [{
        "values": [200000000],
        "animation": {
          "effect": 2,
          "method": 1,
          "sequence": 4,
          "speed": 900
        },
      }]
    };

    // zingchart.render({
    //   id: 'myChart',
    //   data: myConfig,
    //   height: 240,
    //   width: '100%'
    // });
  }

  dropDownClick('Waiting');
  

  // zingchart.render({
  //   id: 'myChart2',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });

  // zingchart.render({
  //   id: 'myChart3',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });

  // zingchart.render({
  //   id: 'myChart4',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });
  // zingchart.render({
  //   id: 'myChart2',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });
  // zingchart.render({
  //   id: 'myChart3',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });
  // zingchart.render({
  //   id: 'myChart4',
  //   data: myConfig,
  //   height: 200,
  //   width: '100%'
  // });

  // document.getElementById("waiting").innerHTML = waiting.length;
  // document.getElementById("approve").innerHTML = Approved.length;
  // document.getElementById("submit").innerHTML = Submit.length;
  // document.getElementById("cancel").innerHTML = Decline.length;

  // var areaChartData = {
  //   labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
  //   datasets: [
  //     {
  //       label               : 'Waiting',
  //       backgroundColor     : '#f39c12',
  //       borderColor         : '#f39c12',
  //       pointRadius          : false,
  //       pointColor          : '#3b8bba',
  //       pointStrokeColor    : 'rgba(60,141,188,1)',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(60,141,188,1)',
  //       data                : [28, 48, 40, 19, 86, 27, 90,500,333,500,230,101]
  //     },
  //     {
  //       label               : 'Approve',
  //       backgroundColor     : '#00a65a',
  //       borderColor         : '#00a65a',
  //       pointRadius         : false,
  //       pointColor          : 'rgba(210, 214, 222, 1)',
  //       pointStrokeColor    : '#c1c7d1',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(220,220,220,1)',
  //       data                : [65, 59, 80, 81, 56, 55, 40,400,232,124,534,333]
  //     },
  //     {
  //       label               : 'Submit',
  //       backgroundColor     : '#00c0ef',
  //       borderColor         : '#00c0ef',
  //       pointRadius         : false,
  //       pointColor          : 'rgba(210, 214, 222, 1)',
  //       pointStrokeColor    : '#c1c7d1',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(220,220,220,1)',
  //       data                : [64, 535, 323, 434, 535, 343, 232,121,434,232,434,434]
  //     },
  //     {
  //       label               : 'Cancel',
  //       backgroundColor     : '#f56954',
  //       borderColor         : '#f56954',
  //       pointRadius         : false,
  //       pointColor          : 'rgba(210, 214, 222, 1)',
  //       pointStrokeColor    : '#c1c7d1',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(220,220,220,1)',
  //       data                : [323, 434, 554, 443, 323, 434, 535,434,121,232,123,321]
  //     },
  //   ]
  // }

  //-------------
  //- BAR CHART -
  //-------------
  // var barChartCanvas = $('#barChart').get(0).getContext('2d')
  // var barChartData = $.extend(true, {}, areaChartData)
  // // var temp0 = areaChartData.datasets[0]
  // // var temp1 = areaChartData.datasets[1]
  // // barChartData.datasets[0] = temp1
  // // barChartData.datasets[1] = temp0

  // var barChartOptions = {
  //   responsive              : true,
  //   maintainAspectRatio     : false,
  //   datasetFill             : false
  // }

  // new Chart(barChartCanvas, {
  //   type: 'bar',
  //   data: barChartData,
  //   options: barChartOptions
  // })

  var transactionData = {
    labels: [
        'Waiting',
        'Approve',
        'Submit',
        'Cancel',
    ],
    datasets: [
      {
        data: [waiting.length,Approved.length,Submit.length,Decline.length],
        backgroundColor : ['#f39c12','#00a65a', '#00c0ef','#f56954'],
      }
    ]
  }
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartTransactionCanvas = $('#chart-transaction').get(0).getContext('2d')
  var pieDataTransaction       = transactionData;
  var pieTransactionOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(pieChartTransactionCanvas, {
    type: 'pie',
    data: pieDataTransaction,
    options: pieTransactionOptions
  })

  $(".knob").knob({
    readOnly: true,
  });

  /* jQueryKnob */

  // $('.knob').knob({
  //   readonly: true
  // });
    /*change : function (value) {
      //console.log("change : " + value);
      },
      release : function (value) {
      console.log("release : " + value);
      },
      cancel : function () {
      console.log("cancel : " + this.value);
      },*/
  //   draw: function () {

  //     // "tron" case
  //     // if (this.$.data('skin') == 'tron') {

  //     //   var a   = this.angle(this.cv)  // Angle
  //     //     ,
  //     //       sa  = this.startAngle          // Previous start angle
  //     //     ,
  //     //       sat = this.startAngle         // Start angle
  //     //     ,
  //     //       ea                            // Previous end angle
  //     //     ,
  //     //       eat = sat + a                 // End angle
  //     //     ,
  //     //       r   = true

  //     //   this.g.lineWidth = this.lineWidth

  //     //   this.o.cursor
  //     //   && (sat = eat - 0.3)
  //     //   && (eat = eat + 0.3)

  //     //   if (this.o.displayPrevious) {
  //     //     ea = this.startAngle + this.angle(this.value)
  //     //     this.o.cursor
  //     //     && (sa = ea - 0.3)
  //     //     && (ea = ea + 0.3)
  //     //     this.g.beginPath()
  //     //     this.g.strokeStyle = this.previousColor
  //     //     this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
  //     //     this.g.stroke()
  //     //   }

  //     //   this.g.beginPath()
  //     //   this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
  //     //   this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
  //     //   this.g.stroke()

  //     //   this.g.lineWidth = 2
  //     //   this.g.beginPath()
  //     //   this.g.strokeStyle = this.o.fgColor
  //     //   this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
  //     //   this.g.stroke()

  //     //   return false
  //     // }
  //   }
  // })
  /* END JQUERY KNOB */

  var filter = {
    NeedSurveyF: true,
    SurveyF: false
  };

  var dashboard = arrPolicy.filter(function (item) {
    for (var key in filter) {
      if (item[key] === undefined || item[key] != filter[key])
        return false;
    }
    return true;
  });

  var t = $("#dashboard").DataTable({
    "data": dashboard,
    "columns": [{
      "title": "No",
      "data": null
    },
    {
      "title": "Registration Date",
      "defaultContent": "",
      render: function (data, type, row) {
        return row['RegDate'];
        // return moment(row['RegDate']).format('DD MMMM YYYY');
      }
    },
    {
      "title": "Long Insured Name",
      "data": "InsuredName"
    },
    {
      "title": "SPPA Number",
      "data": "RefNo"
    },
    {
      "title": "Period",
      "defaultContent": "",
      render: function (data, type, row) {
        // return moment(row['InceptionDate']).format('DD MMMM YYYY') + ' - ' +
        //     moment(row['ExpiryDate']).format('DD MMMM YYYY');
        return row['InceptionDate'] + ' - ' + row['ExpiryDate'];
      }
    },
    {
      "title": "Status E-Sign",
      "defaultContent": "",
      render: function (data, type, row) {
        if (row['EsignF'] == true) {
          return '<i class="fas fa-check"> E-Sign</i>';
        } else if (row['EsignF'] == false) {
          return '<i class="far fa-times-circle"> E-Sign</i>';
        }
      }
    },
    {
      "title": "Status Survey",
      "defaultContent": "",
      render: function (data, type, row) {
        if (row['SurveyF'] == true) {
          return '<i class="fas fa-check"> Survey</i>';
        } else if (row['SurveyF'] == false) {
          return '<i class="far fa-times-circle"> Survey</i>';
        }
      }
    },
    {
      "title": "Jadwal Survey",
      "defaultContent": "",
      render: function (data, type, row) {
        // return moment(row['SUserDate']).format('DD MMMM YYYY') + ' - ' + row[
        //     'SUserTime'];
        return row['SUserDate'] + ' - ' + row['SUserTime']
      }
    },
    { 
      "defaultContent": "",
      "title":"Action",
      render: function(data, type, row, meta) {
        return '<img src="{{asset("dist/img/edit.svg")}}" width="30" height="30" type="button" value="detail" onclick="viewPolicy(' + row['PID'] + ')">';
      } 
    }
  ],
  "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 0
  }],
  "select": {
      "style": "multi"
  },
  "order": [
      [0, 'asc']
  ],
  "autoWidth": false,
  "responsive": true,
  });

  t.on('order.dt search.dt', function () {
      t.column(0, {
          search: 'applied',
          order: 'applied'
      }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();

  $('#sdate').datetimepicker({
      format: 'L'
  });
  $('#sdate').on('change.datetimepicker', function (e) {
      var dateInception = $("#InceptionDate").val();
  });
  $('#edate').datetimepicker({
      format: 'L'
  });

  $('#edate').on('change.datetimepicker', function (e) {
    // var dashboard = @json($data['Data']);
    var dateExpiry = $("#ExpiryDate").val();
    var dateInception = $("#InceptionDate").val();
    var date = dashboard.filter(function (item) {

      var stringdate = moment(item.RegDate).format('MM/DD/YYYY');
      if ((stringdate >= (dateInception)) && (stringdate <= (dateExpiry)))
        return true;
    });
    t.clear().rows.add(date).draw();
  });

  $('#test').click(function(event){
    t.columns.adjust().draw();
  });

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  $(window).bind('resize', async function () {
    console.log('resize');
    await sleep(500);
    t.columns.adjust().draw();
  });

  async function viewDetailWidget(param_status){
    status = param_status;
    try{
      $('#class-modal-dialog').attr('class','modal-dialog modal-xl');

      $('#modaltitle').text('List SPPA');

      $('#modalbody').empty();

      $('#modalfooter').empty();

      const res = await getModalView("{{ route('Dashboard.Widget') }}");
      // console.log(res);
      $('#modalbody').html(res);
      $("#modal-general").modal('show');
    }catch(err){
      // console.log('catch - ' + err);
      toastMessage('400','Whoops, Something Went Wrong, please contact your Administrator.');
    }
  }

  $('#modal-general').on('shown.bs.modal', function(event){
    tblWidget.columns.adjust().draw();
  });

  $('#modal-general').on('show.bs.modal',function(event){
    let basedata;
    switch(status){
      case 'waiting':
        basedata = waiting;
        break;
      case 'approved':
        basedata = Approved;
        break;
      case 'submit':
        basedata = Submit;
        break;
      case 'cancel':
        basedata = Decline;
        break;
      default:
        basedata = [];  
    }
    tblWidget = $('#tblWidget').DataTable( {
      "data": basedata,
      "columns": [
        { "defaultContent": "" },
        { "data": "RefNo" },
        { "data": "PolicyNo" },
        { "defaultContent": "",
          render: function(data, type, row) {
            if (row['AType'] == 'N'){
              return 'New';
            }else if (row['AType'] == 'E'){
              return 'Endorse';
            }else if (row['AType'] == 'C'){
              return 'Cancel';
            }else{
              return row['AType'];
            }
          } 
        },
        { "defaultContent": "",
          render: function(data, type, row) {
            if (row['PStatus'] == 'R'){
              return 'Request';
            }else if (row['PStatus'] == 'P'){
              return 'Process';
            }else if (row['PStatus'] == 'C'){
              return 'Closed';
            }else if (row['PStatus'] == 'E'){
              return 'Esign';
            }else if (row['PStatus'] == 'S'){
              return 'Submit Confirmation';
            }else if (row['PStatus'] == 'T'){
              return 'Temporary Process';
            }else{
              return row['PStatus'];
            }
          }
        },
        { "data": "InsuredName" },
        { "data": "ProductDesc" },
        { "data": "CoverageDesc" },
        { "defaultContent": "",
          render: function(data, type, row) {
            return row['InceptionDate'] + ' - ' + row['ExpiryDate'];
          } 
        },
        { "defaultContent": "",
          render: function(data, type, row) {
            return row['Currency'] + ' ' + 
            number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
          }
        },
        { "defaultContent": "",
          render: function(data, type, row) {
            return row['Currency'] + ' ' + 
            number_format(row['Premium']);
          }
        }
      ],
      "order": [[ 0, 'asc' ]],
      "responsive": true,
      "autoWidth": false,
    });

    tblWidget.on( 'order.dt search.dt', function () {
      tblWidget.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
        } );
    }).draw();
  });

  async function viewPolicy(PID){
    try{
      var url = "{{ route('Dashboard.ModalDetPolicy', ['pid' => ':pid']) }}";
      url = url.replace(':pid',PID);
      // console.log(url);
      $('#class-modal-dialog').attr('class','modal-dialog modal-xl');

      $('#modaltitle').text('Detail Policy');

      $('#modalbody').empty();

      $('#modalfooter').empty();

      const res = await getModalView(url);
      // console.log(res);
      $('#modalbody').html(res);
      $("#modal-general").modal('show');
    }catch(err){
      // console.log('catch - ' + err);
      toastMessage('400','Something wrong, please contact your Administrator.');
    }
  }

  // $(function () {
  //     var filter = {
  //         NeedSurveyF: true,
  //         SurveyF: false
  //     };

  //     var dashboard = arrPolicy.filter(function (item) {
  //         for (var key in filter) {
  //             if (item[key] === undefined || item[key] != filter[key])
  //                 return false;
  //         }
  //         return true;
  //     });

  //     var t = $("#dashboard").DataTable({
  //         "data": dashboard,
  //         "columns": [{
  //                 "title": "No",
  //                 "data": null
  //             },
  //             {
  //                 "title": "Registration Date",
  //                 "defaultContent": "",
  //                 render: function (data, type, row) {
  //                     return row['RegDate'];
  //                     // return moment(row['RegDate']).format('DD MMMM YYYY');
  //                 }
  //             },
  //             {
  //                 "title": "Long Insured Name",
  //                 "data": "InsuredName"
  //             },
  //             {
  //                 "title": "SPPA Number",
  //                 "data": "RefNo"
  //             },
  //             {
  //                 "title": "Period",
  //                 "defaultContent": "",
  //                 render: function (data, type, row) {
  //                     // return moment(row['InceptionDate']).format('DD MMMM YYYY') + ' - ' +
  //                     //     moment(row['ExpiryDate']).format('DD MMMM YYYY');
  //                     return row['InceptionDate'] + ' - ' + row['ExpiryDate'];
  //                 }
  //             },
  //             {
  //                 "title": "Status E-Sign",
  //                 "defaultContent": "",
  //                 render: function (data, type, row) {
  //                     if (row['EsignF'] == true) {
  //                         return '<i class="fas fa-check"> E-Sign</i>';
  //                     } else if (row['EsignF'] == false) {
  //                         return '<i class="far fa-times-circle"> E-Sign</i>';
  //                     }
  //                 }
  //             },
  //             {
  //                 "title": "Status Survey",
  //                 "defaultContent": "",
  //                 render: function (data, type, row) {
  //                     if (row['SurveyF'] == true) {
  //                         return '<i class="fas fa-check"> Survey</i>';
  //                     } else if (row['SurveyF'] == false) {
  //                         return '<i class="far fa-times-circle"> Survey</i>';
  //                     }
  //                 }
  //             },
  //             {
  //                 "title": "Jadwal Survey",
  //                 "defaultContent": "",
  //                 render: function (data, type, row) {
  //                     // return moment(row['SUserDate']).format('DD MMMM YYYY') + ' - ' + row[
  //                     //     'SUserTime'];
  //                     return row['SUserDate'] + ' - ' + row['SUserTime']
  //                 }
  //             },
  //         ],
  //         "columnDefs": [{
  //             "searchable": false,
  //             "orderable": false,
  //             "targets": 0
  //         }],
  //         "select": {
  //             "style": "multi"
  //         },
  //         "order": [
  //             [0, 'asc']
  //         ],
  //         "autoWidth": false,
  //         "responsive": true,
  //     });
  //     t.on('order.dt search.dt', function () {
  //         t.column(0, {
  //             search: 'applied',
  //             order: 'applied'
  //         }).nodes().each(function (cell, i) {
  //             cell.innerHTML = i + 1;
  //         });
  //     }).draw();

  //     $('#sdate').datetimepicker({
  //         format: 'L'
  //     });
  //     $('#sdate').on('change.datetimepicker', function (e) {
  //         var dateInception = $("#InceptionDate").val();
  //     });
  //     $('#edate').datetimepicker({
  //         format: 'L'
  //     });

  //     $('#edate').on('change.datetimepicker', function (e) {
  //         // var dashboard = @json($data['Data']);
  //         var dateExpiry = $("#ExpiryDate").val();
  //         var dateInception = $("#InceptionDate").val();
  //         var date = dashboard.filter(function (item) {

  //             var stringdate = moment(item.RegDate).format('MM/DD/YYYY');
  //             if ((stringdate >= (dateInception)) && (stringdate <= (dateExpiry)))
  //                 return true;
  //         });
  //         t.clear().rows.add(date).draw();
  //     });

  //     // var arrPolicy = @json($data['Data']);
  //     // Waiting
  //     // var tempwait = arrPolicy.filter(dashboard => dashboard.PStatus == 'R');

  //     // var Wait_Esign = arrPolicy.filter(dashboard => dashboard.NeedESignF == true);
  //     // Wait_Esign2 = Wait_Esign.filter(dashboard => dashboard.EsignF == false);

  //     // var Wait_Survey = arrPolicy.filter(dashboard => dashboard.NeedSurveyF == true);
  //     // Wait_Survey2 = Wait_Survey.filter(dashboard => dashboard.SurveyF == false);

  //     // var waiting = Wait_Esign2.length + Wait_Survey2.length + tempwait.length;

  //     // //Approve
  //     // var Approved = arrPolicy.filter(dashboard => dashboard.PStatus == 'P');

  //     // //Submit
  //     // var Submit = arrPolicy.filter(dashboard => dashboard.PStatus == 'P');

  //     // var Submit = arrPolicy.filter(dashboard => dashboard.EsignF == true);
  //     // Submit2 = Submit.filter(dashboard => dashboard.SurveyF == true);
  //     // console.log(Submit2);
  //     // console.log(Wait_Survey2);

  //     document.getElementById("waiting").innerHTML = waiting.length;
  //     document.getElementById("approve").innerHTML = Approved.length;
  //     document.getElementById("submit").innerHTML = Submit.length;
  //     document.getElementById("cancel").innerHTML = Decline.length;
  //     // document.getElementById("Jml_cancel").innerHTML = Decline.length;
  // });

  // function viewWidget(ID) {
  //   var url = "{{ route('Dashboard.Widget') }}";
  //   // $('#loadMe').modal('show');
  //   $.ajax({
  //       type: "GET",
  //       url: url,
  //       dataType: 'html'
  //   }).done(function (response) {
  //       console.log(response);
  //       $('#loadMe').modal('hide');
  //       $('#body-widget').html(response);
  //       $("#modal-widget").modal('show');
  //   });
  // }

</script>
@endsection
</body>

</html>
