<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
  <meta name="mobile-web-app-capable" content="yes">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- font icon goggle API -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.cs')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css"> -->
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- <script src="sweetalert2.min.js"></script> -->
  <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- BStepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <!-- Animate Css -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/animate-css/animate.css')}}"> -->
  <!-- Icon Font css -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/fonts/Pe-icon-7-stroke.css')}}"> -->
  <!-- Themify icon Css -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/themify/css/themify-icons.css')}}"> -->
  <!-- Slick Carousel CSS -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}"> -->

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>
  <!-- <script src="/capture.js"></script> -->

  <!-- web streams API polyfill to support Firefox -->
  <script src="https://unpkg.com/@mattiasbuelens/web-streams-polyfill/dist/polyfill.min.js"></script>

  <!-- ../libs/DBML.js to fix video seeking issues -->
  <script src="https://www.webrtc-experiment.com/EBML.js"></script>

  <!-- for Edge/FF/Chrome/Opera/etc. getUserMedia support -->
  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <script src="https://www.webrtc-experiment.com/DetectRTC.js"></script>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}""></script>

  <!-- video element -->
  <link href="https://www.webrtc-experiment.com/getHTMLMediaElement.css" rel="stylesheet" />
  <script src="https://www.webrtc-experiment.com/getHTMLMediaElement.js"></script>
  <!-- <link href="styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css"> -->
  <!-- style modal footer -->
  <style>
    body {
      background-color: #211f1f;
    }

    .rectangle {
      height: 100%;
      width: 100%;
      /* background-color: rgb(255, 0, 0); */
      /* border-radius:7px; */
      display: flex;
      justify-content: center;
      /* align-items: center; */
      border: 1px;
    }

    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-60%);
      /* background-color: royalblue; */
      width: 99%;
    }

    #user-video {
      -moz-transform: scale(-1, 1);
      -webkit-transform: scale(-1, 1);
      transform: scale(-1, 1);
      transition: opacity 1s;
    }

    #peer-video {
      -moz-transform: scale(-1, 1);
      -webkit-transform: scale(-1, 1);
      transform: scale(-1, 1);
      transition: opacity 1s;
    }

    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      text-align: center;
      margin-bottom: 2%;
    }

    @media screen and (max-width: 767px) {
      .mobile-space {
        margin-top: 10px;
      }
    }
  </style>
</head>

<body onload="genLink()">
<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="nav navbar-right">
              <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item dropdown">
                  <li class="nav-item">
                    <a class="nav-link" style="color: rgb(255, 255, 255)" id="timer">00:00</a>
                  </li>
                </li>
              </ul>
              <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                  <button class="btn btn-block btn-success" style="margin-right: 5px;" onclick="Preview()"><i
                      class="fas fa-check">&nbsp</i>Finish Survey
                  </button>
                </li>
                  <li class="nav-item">
                    <button class="btn btn-block btn-danger" style="margin-left: 5px;" id="Btn_Cancel"><i
                        class="fas fa-phone-slash fa-flip-horizontal">&nbsp</i>Cancel Survey
                    </button>
                  </li>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section> -->
  
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="nav navbar-right">
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item dropdown">
            <li class="nav-item">
              <a class="nav-link" style="color: rgb(255, 255, 255)" id="timer">00:00</a>
            </li>
          </li>
        </ul>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <button class="btn btn-block btn-success" style="margin-right: 5px;" onclick="Preview()"><i
                class="fas fa-check">&nbsp</i>Finish Survey
            </button>
          </li>
            <li class="nav-item">
              <button class="btn btn-block btn-danger" style="margin-left: 5px;" id="Btn_Cancel"><i
                  class="fas fa-phone-slash fa-flip-horizontal">&nbsp</i>Cancel Survey
              </button>
            </li>
          </li>
        </ul>
      </div>
    </nav>
    <div class="vertical-center">
      <div class="row">
        <div class="col-md-6">
          <div class="rectangle">
            <video id="user-video" style="max-width:100%; max-height:100%; border-radius:10px;" muted></video>
          </div>
        </div>
        <div class="col-md-6">
          <div class="rectangle">
            <video id="peer-video" style="max-width:100%; max-height:100%; border-radius:10px;"></video>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <ul class="nav justify-content-center">
      <!-- swtiching camera -->
      <li class="nav-item dropdown" style="display: none;">
        <a class="nav-link" data-toggle="dropdown">
          <i class="fas fa-toggle-off fa-2x" type="button" style="color: grey" id="Btn_Switch"></i>
        </a>
      </li>
      <!-- mute microphone -->
      <li class="nav-item">
        <a class="nav-link">
          <i class="fas fa-microphone fa-2x" type="button" style="color: grey" id="Btn_Mute"></i>
        </a>
      </li>
      <!-- camera on/off -->
      <li class="nav-item">
        <a class="nav-link">
          <i class="fas fa-video fa-2x" type="button" style="color: grey" id="Btn_Hide"></i>
        </a>
      </li>
      <!-- record & captured Menu -->
      <li class="nav-item" id="icn-ss">
        <a class="nav-link">
          <i class="fas fa-camera fa-2x" type="button" style="color: grey" id="startbutton" onclick="takeScreenshot()">
          </i>
        </a>
      </li>

      <!-- record button ( video record) -->
      <!-- <li class="nav-item" id="icn-recording" style="display: flex;">
        <a class="nav-link">
          <i class="fas fa-record-vinyl fa-2x" type="button" style="color :red;display: flex;"
            id="btn-start-recording"></i>
        </a>
        <a class="nav-link"><i class="fas fa-pause fa-2x" type="button" style="color: red; display: none;"
            id="btn-pause-recording"></i></a>
      </li> -->
    </ul>
  </div>

  <!-- The Modal Datatable -->
  <div class="modal fade" id="modal-Datatable">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <label class="modal-title">Detail Datatable</label>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="body-datatable">
          <table id="tblsurvey" class="table table-bordered table-striped dt responsive" style="width:100%"></table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="Btn_Finish">Save & Finish</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal preview photo -->
  <div class="modal fade" id="modal-validation">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <label class="modal-title">Preview Photo</label>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="body-widget">
          <center>
            <img id="validation" style="width: 60%; height: 60%;">
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal preview video -->
  <div class="modal fade" id="modal-video">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <label class="modal-title">Preview Video</label>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="body-widget">
          <center>
            <div class="" id="recording-player1" style="align-content: center;">
              <canvas id="canvas" style="display: none;"></canvas>
            </div>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save-to-disk">Save To Disk</button>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-top: 10px; display: none;" id="recording-player">
    <section class="experiment recordrtc">
      <h2 class="header" style="margin: 0">
        <select class="recording-media">
          <option value="record-audio-plus-video">Microphone+Camera</option>
          <option value="record-audio">Microphone</option>
          <option value="record-screen" >Full Screen</option>
          <option value="record-audio-plus-screen" selected>Microphone+Screen</option>
        </select>

        <span style="font-size: 15px; color: #000000">into</span>

        <select class="media-container-format">
          <option>default</option>
          <option>vp8</option>
          <option>vp9</option>
          <option>h264</option>
          <option>mkv</option>
          <option>opus</option>
          <option>ogg</option>
          <option>pcm</option>
          <option>gif</option>
          <option>whammy</option>
          <option>WebAssembly</option>
        </select>

        <!-- <button id="btn-start-recording">Start Recording</button>
      <button id="btn-pause-recording" style="display: none; font-size: 15px">
        Pause
      </button> -->
        <input type="checkbox" id="chk-timeSlice" style="margin:0;width:auto;" title="Use intervals based recording">
        <label for="chk-timeSlice"
          style="font-size: 15px;margin:0;width: auto;cursor: pointer;-webkit-user-select:none;user-select:none;"
          title="Use intervals based recording">Use timeSlice?</label>

        <div style="display: inline-block">
          <input type="checkbox" id="chk-fixSeeking" style="margin: 0; width: auto" title="Fix video seeking issues?" />
          <label for="chk-fixSeeking" style="
              font-size: 15px;
              margin: 0;
              width: auto;
              cursor: pointer;
              -webkit-user-select: none;
              user-select: none;
              color: #000000;
            " title="Fix video seeking issues?">Fix Seeking Issues?</label>
        </div>
    </section>
    <select class="media-resolutions">
      <option value="default">Default resolutions</option>
      <option value="1920x1080">1080p</option>
      <option value="1280x720">720p</option>
      <option value="640x480">480p</option>
      <option value="3840x2160">4K Ultra HD (3840x2160)</option>
    </select>

    <select class="media-framerates">
      <option value="default">Default framerates</option>
      <option value="5">5 fps</option>
      <option value="15">15 fps</option>
      <option value="24">24 fps</option>
      <option value="30">30 fps</option>
      <option value="60">60 fps</option>
    </select>

    <select class="media-bitrates">
      <option value="default">Default bitrates</option>
      <option value="8000000000">1 GB bps</option>
      <option value="800000000">100 MB bps</option>
      <option value="8000000">1 MB bps</option>
      <option value="800000">100 KB bps</option>
      <option value="8000">1 KB bps</option>
      <option value="800">100 Bytes bps</option>
    </select>
    </h2>
    </section>
  </div>
</body>

<!-- <script src="{{asset('plugins/RTC/RecordRTC.js')}}"></script> -->
<script src="https://cdn.socket.io/4.3.2/socket.io.min.js"
  integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://www.webrtc-experiment.com/commits.js" async></script> -->
<!-- <script src="https://apis.google.com/js/client:plusone.js"></script> -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- SweetAlert2 -->
<!-- <script src="plugins/sweetalert2/sweetalert2.min.js"></script> -->
<!-- <script src="sweetalert2.all.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('dist/js/Survey/ConferenceCall.js')}}"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script>
  var urlDocument = "{{ route('SaveSurveyDocument') }}";  
  (function () {
    var params = {},
      r = /([^&=]+)=?([^&]*)/g;

    function d(s) {
      return decodeURIComponent(s.replace(/\+/g, ' '));
    }

    var match, search = window.location.search;
    while (match = r.exec(search.substring(1))) {
      params[d(match[1])] = d(match[2]);

      if (d(match[2]) === 'true' || d(match[2]) === 'false') {
        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
      }
    }

    window.params = params;
  })();

  function addStreamStopListener(stream, callback) {
    stream.addEventListener('ended', function () {
      callback();
      callback = function () {};
    }, false);
    stream.addEventListener('inactive', function () {
      callback();
      callback = function () {};
    }, false);
    stream.getTracks().forEach(function (track) {
      track.addEventListener('ended', function () {
        callback();
        callback = function () {};
      }, false);
      track.addEventListener('inactive', function () {
        callback();
        callback = function () {};
      }, false);
    });
  }
</script>


</html>