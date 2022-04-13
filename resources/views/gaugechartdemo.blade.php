@extends('layout/main')
@section('title','ACA INSURANCE | Profile')
  <!-- <div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Charts by ZingChart</a></div> -->
@section('head-linkrel')
  <style>
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal-img {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-img-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-img-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close-img {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close-img:hover,
.close-intl_get_error_message:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-img-content {
    width: 100%;
  }
}
  </style>
@endsection
@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"></div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section cass="content">
    <div class="container-fluid">
      <!-- <input class="form-control" id="test-input2" type="text"> -->
      <input class="form-control" id="test-input" type="text">
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Looks not good!
      </div>
      <button type="button" id="test-button">test</button>
      <form id='form-1'>
        <table id="example1" class="table table-striped dt-responsive nowrap" width="100%">
          <thead>
            <tr>
              <th></th>
              <th>No</th>
              <th>Profile ID</th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="ekram"></input>
              </td>
              <td>1</td>
              <td>ekram</td>
              <td>Ekram Ganteng</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="fitri"></input>
              </td>
              <td>2</td>
              <td>fitri</td>
              <td>Fitri Andre Ina</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="Alesha"></input>
              </td>
              <td>3</td>
              <td>Alesha</td>
              <td>Alesha Chayrah Azzahra</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="fitrialesha"></input>
              </td>
              <td>4</td>
              <td>fitrialesha</td>
              <td>futri Alesha Chayrah Azzahra</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="Aleshachay"></input>
              </td>
              <td>5</td>
              <td>Aleshachay</td>
              <td>Alesha Chayrah Azzahra</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="cbx[]" value="abrisam"></input>
              </td>
              <td>6</td>
              <td>abrisam</td>
              <td>abrisam</td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" id="test" name="test" />
        <input type="hidden" id="test1" name="test1" />
        <button type="submit" id="refresh">Refresh</button>
      </form>
      <div class="form-group">
        <input type="text" id="test1"></input>
      </div>
      <div class="form-group">
        <input type="text" id="test1"></input>
      </div>
      <button type="button" id="test-find">Refresh</button>
      <div class="col-md-6">
        <select class="form-control js-data-example-ajax"></select>
      </div>
      <div class="col-md-6">
        <select class="form-control select2bs4">
          <option id=""></option>
          <option id="a">a</option>
        </select>
      </div>
    </div>
    <form action="/target" class="dropzone" id="my-great-dropzone"></form>
    <div class="row">
      <div class="col-sm-12">
        <button id="btn-modal" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-overlay">Browse files</button>
      </div>
    </div>
    <div class="modal fade" id="modal-overlay">
      <div class="modal-dialog">
        <div class="modal-content">
          <div style="position:absolute; top:0.1%; left:0.1%;" class="overlay"><i style="position:absolute; left:50%; top:50%; margin-top:-25px; margin-left:-25px;" class="fas fa-2x fa-sync fa-spin"></i></div>
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <button id="btn-sweetalert" type="button">Sweet Alert</button>
    <button id="btn-loop" type="button">btn loop get data by PID</button>
    <button id="btn-ajax" type="button">btn get data by ajax</button>
    <input type="checkbox" id="test-disable"></input>
  </section>
</div>


@endsection
  <!-- jQuery -->
  <!-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <!-- <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->
  <!-- General For Web Portal MW -->
  <!-- <script src="{{asset('dist/js/pages/webportal.js')}}"></script> -->
@section('scriptpage')
  <script>
    $('.js-data-example-ajax').select2({
      ajax: {
        url: 'http://localhost/api/MiddlewareApi/GetProvince',
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      },
      theme: 'bootstrap4',
    });

    console.log($('#test-disable').attr("disabled"));


    $('.select2bs4').select2({
        theme: 'bootstrap4',
        // templateSelection: function(result) {
        //     return result;
        // },
    });
    $('#btn-loop').on('click', async function(){
      var url = "{{ route('policy.getdetail') }}?PID=419"
      for (i=0; i < 3; i++){
        console.log('loop - ' + i);
        var res = await getData(url);
        var jobPolicy = res.Data[0].PolicyJob;
        if (jobPolicy[0].ANO != -1){
          console.log(jobPolicy);
          break;
        }
      }
    });

    async function getprovince() {
      try {
        const res = await getData('{{ route("listprovince") }}')
        console.log(res);
        // var listbox = document.getElementById("Province");
        // addOptionItem(listbox,res.Data,'PROVINCE','DESCRIPTION',true);
      } catch(err) {
        console.log(err);
      }
    }

    $('#btn-ajax').on('click', async function(){
      getprovince();
    });

    $('#btn-sweetalert').on('click', function(){
      Swal.fire({
        // input: 'checkbox',
        title: 'Are you sure to submit the data?',
        // inputPlaceholder: inputPlaceholder,
        // inputPlaceholder: 'Submit Date',
        confirmButtonColor: '#0d6efd',
        // inputValue: SubmitDateF.checked,
        // inputAttributes: attributes,
        showCancelButton: true,
        showLoaderOnConfirm: true,
        preConfirm: (value) => {
          return new Promise(async function(resolve, reject) {
            await sleep(5000);
            resolve();
            
          }).catch(error => {
            Swal.showValidationMessage(
              `${error}`
            )
          })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        console.log(result);
        var html = '<table style="width:100%"><tbody><tr><td style="text-align:left;padding-left:10%">Policy Number</td><td>:</td><td style="text-align:left;padding-left:5%">48329843928409284</td></tr><tr><td style="text-align:left;padding-left:10%">Reference Number</td><td>:</td><td style="text-align:left;padding-left:5%">43248320948</td></tr></tbody></table>'
        Swal.fire({
          icon: 'success',
          title: 'SPPA Successfully Submitted.',
          text: 'Waiting Approval SPPA From Core System',
          // html: html,/
          didOpen: () => {
            Swal.showLoading();
            // await sleep(5000);
            return new Promise(async function(resolve, reject) {
              await sleep(5000);
              console.log('haha');
              var html = '<table style="width:100%"><tbody><tr><td style="text-align:left;padding-left:10%">Policy Number</td><td>:</td><td style="text-align:left;padding-left:5%">48329843928409284</td></tr><tr><td style="text-align:left;padding-left:10%">Reference Number</td><td>:</td><td style="text-align:left;padding-left:5%">43248320948</td></tr></tbody></table>'
              Swal.fire({
                icon: 'success',
                title: 'SPPA Successfully Submitted and Approved.',
                // text: 'Policy Number : ' + policyno,
                html: html,
              })
            }).catch(error => {
              Swal.showValidationMessage(
                `${error}`
              )
            })
          },
        })
      })
    });
    // $('#btn-modal').on('click', function(){
    //   $("#modal-overlay").modal('show');
    // })
    $('#test-find').on('click',function(){
      var key = 'test1';
      var x = document.querySelectorAll('#' + key);
      console.log(x);
      // $('#test1').val('haha');
      // for (i = 0; i < x.length; i++) {
      //   x[i].value = "red";
      // }
    });
    var basedata = [
      {
        RefID : "asd",
        Name : "ekram",
        Email : "ekram@care.co.id",
        Mobile : "02929292",
        ID_No : "8391832",
        BirthDate : "<input type='text'></input>",
        ID : "ekk",

      },
      {
        RefID : "asd",
        Name : "ekram",
        Email : "ekram@care.co.id",
        Mobile : "02929292",
        ID_No : "8391832",
        BirthDate : "<input type='text'></input>",
        ID : "ekk",

      }
    ];
    console.log(basedata);

    var tblProfile = $('#example1').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [1,2,3]
        }],
        "pageLength": 5,
    });
 
    $('#form-1').submit(function (event){
      event.preventDefault();
      // console.log('haha');
      // console.log(this.serialize());
      // var data = tblProfile.$('input').serialize();
      // console.log(data);
      console.log($(this).serialize());

    });

    $('#refresh').on('click',function(){
      console.log('haha');
      var arr = {
        RefID : "asd",
        Name : "ekram",
        Email : "ekram@care.co.id",
        Mobile : "02929292",
        ID_No : "8391832",
        BirthDate : "<input type='text'></input>",
        ID : "ekk"
      }
      console.log(arr);
      basedata.push(arr);
      console.log(basedata);
      tblProfile.clear().draw();
      tblProfile.rows.add(basedata).draw(); // Add new data
      // var data = tblProfile.$('input').serialize();
      // console.log(data);
      
    })
    // var globalvar = 'ekram';
    $('#test-button').on('click', function(){
      var num = '12,000,000.00';
      $('#test-input').val(Math.round(num.replace(/\,/g, '')));
      // $('#test-input').val(Math.round(num));
    });
    $('#test-input').on('keyup',function(){
      console.log($(this).val());
      var exp = "^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$"
      if (checkRegex($(this).val(),exp)){
        $(this).removeClass("is-invalid").addClass("is-valid");
      }else{
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
    // function onInputRegex(text){
    //   console.log(text);
    // }
    // ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    // window.feed = function(callback) {
    //     // console.log(callback);
    //   var tick = {};
    //   tick.plot0 = Math.ceil(350 + (Math.random() * 500));
    // //   console.log(tick);
    // console.log()
    //   callback(JSON.stringify(tick));
    // };
 
    var myConfig = {
      type: "gauge",
      globals: {
        fontSize: 25
      },
      plotarea: {
        marginTop: 80
      },
      plot: {
        size: '100%',
        valueBox: {
          placement: 'center',
          text: '%v', //default
          fontSize: 35,
          rules: [{
              rule: '%v >= 700',
              text: '%v<br>EXCELLENT'
            },
            {
              rule: '%v < 700 && %v > 640',
              text: '%v<br>Good'
            },
            {
              rule: '%v < 640 && %v > 580',
              text: '%v<br>Fair'
            },
            {
              rule: '%v <  580',
              text: '%v<br>Bad'
            }
          ]
        }
      },
      tooltip: {
        borderRadius: 5
      },
      scaleR: {
        aperture: 180,
        minValue: 300,
        maxValue: 850,
        step: 50,
        center: {
          visible: false
        },
        tick: {
          visible: false
        },
        item: {
          offsetR: 0,
          rules: [{
            rule: '%i == 9',
            offsetX: 15
          }]
        },
        labels: ['300', '', '', '', '', '', '580', '640', '700', '750', '', '850'],
        ring: {
          size: 50,
          rules: [{
              rule: '%v <= 580',
              backgroundColor: '#E53935'
            },
            {
              rule: '%v > 580 && %v < 640',
              backgroundColor: '#EF5350'
            },
            {
              rule: '%v >= 640 && %v < 700',
              backgroundColor: '#FFA726'
            },
            {
              rule: '%v >= 700',
              backgroundColor: '#29B6F6'
            }
          ]
        }
      },
    //   refresh: {
    //     type: "feed",
    //     transport: "js",
    //     url: "feed()",
    //     interval: 1500,
    //     resetTimeout: 1000
    //   },
      series: [{
        values: [400], // starting value
        backgroundColor: 'black',
        indicator: [10, 10, 10, 10, 0.75],
        animation: {
          effect: 2,
          method: 1,
          sequence: 4,
          speed: 900
        },
      }]
    };
 
    // zingchart.render({
    //   id: 'myChart',
    //   data: myConfig,
    //   height: 500,
    //   width: '100%'
    // });
  </script>
@endsection