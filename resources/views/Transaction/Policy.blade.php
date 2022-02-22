@extends('layout/main')
@section('title','ACA INSURANCE | Transaction')
@section('head-linkrel')
<!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
<link rel="stylesheet" href="{{asset('dist/css/transaction.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/modal-preview-image.css')}}">
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <!-- <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div> -->
        <!-- /.col -->
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align: center;">
              <div class="form-group row">
                <p class="col-sm-2">Rate</p>
                <p class="col-sm-2">:</p>
                <div class="col-sm-7">
                  <input class="form-control" id="TxtRate" type="text">
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between"> -->
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
          </div> -->
          <!-- /.modal-content -->
        <!-- </div> -->
        <!-- /.modal-dialog -->
      <!-- </div> -->
      <!-- /.modal -->
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills" id="ul-tab-sppa">
                <li class="nav-item"><a id="tabinquiry" class="nav-link active" href="#inquiry" data-toggle="tab">Inquiry</a></li>
                <li class="nav-item"><a id="tabpolicy" class="nav-link" href="#policy" data-toggle="tab">SPPA</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="inquiry">
                  <div class="card-header">
                    <h2>List SPPA</h2>
                    <!-- <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="TxtName_Inquiry" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Reference No</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="TxtRefNo_Inquiry" placeholder="Ref No">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                          <select class="form-control 'select2bs4'" id="LstAType">
                            <option value=""></option>
                            <option value="New">New</option>
                            <option value="Endorse">Endorse</option>
                            <option value="Cancel">Cancel</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select class="form-control select2bs4" id="LstPStatus">
                            <option value=""></option>
                            <option value="R">Request</option>
                            <option value="P">Process</option>
                            <option value="T">Temporarily Process</option>
                            <option value="C">Closed</option>
                            <option value="S">Submit Confirmation</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="btnInquiryPolicy" class="btn btn-danger">Search</button>
                        </div>
                      </div>
                    </form> -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <!-- <button id="btntest">button test</button> -->
                      <!-- <table id="tblInquiryPolicy" class="table table-condensed responsive table-striped display nowrap" width="100%" > -->
                      <table id="tblInquiryPolicy" class="table table-striped dt-responsive nowrap" cellspacing="0" style="width:100%" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>PID</th>
                            <th>Reference Number</th>
                            <th>Policy Number</th>
                            <th>Type</th>
                            <th>SPPA Status</th>
                            <th>Name</th>
                            <th>Coverage</th>
                            <th>Product</th>
                            <th>Period</th>
                            <th>Total Sum Insured</th>
                            <th>Premium</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane fade" id="policy">
                  <div class="overlay-wrapper">
                    <div class="overlay" id="div-overlay" style="display : none;">
                      <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                      <div class="text-bold pt-2">Loading...</div>
                    </div>
                    <form id="form-policy" class="needs-validation" onSubmit="return false" novalidate>
                      @csrf
                      <div class="icon mt-3 mb-3" style="width: 100%; text-align: center; border:1px;">
                        <button id="img-btn-save" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="Save">
                          <i class="fas fa-save fa-2x"></i>
                          <!-- <caption style="width: auto;">record</caption> -->
                        </button>
                        <!-- <a class="btn btn-app" id="img-btn-save" data-toggle="tooltip" data-placement="top" title="Save Data">
                          <i class="fas fa-save"></i>
                          Save
                        </a> -->
                        <button id="img-btn-preview" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="preview" disabled>
                          <i class="fas fa-file-pdf fa-2x"></i>
                        </button>
                        <button id="img-btn-send" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="Send Confirmation">
                          <i class="far fa-paper-plane fa-2x"></i>
                        </button>
                        <button id="img-btn-revise" href="#" class="btn" style="overflow:hidden; color: #ffac54;" data-toggle="tooltip" data-placement="top" title="Revise">
                          <i class="fas fa-edit fa-2x"></i>
                        </button>
                        <button id="img-btn-submit" href="#" class="btn" style="overflow:hidden; color: #57a63f;" data-toggle="tooltip" data-placement="top" title="Submit">
                          <i class="fas fa-check fa-2x"></i>
                        </button>
                        <button id="img-btn-clear" href="#" class="btn float-right" style="overflow:hidden; color: #ff1100;" data-toggle="tooltip" data-placement="top" title="Clear All">
                          <i class="fas fa-times-circle fa-2x"></i>
                        </button>
                        <!-- <button id="img-btn-save" href="#" class="btn" style="overflow:hidden;" data-toggle="tooltip" data-placement="top" title="Save">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" fill="#60e314" class="bi bi-save-fill" viewBox="0 0 16 16">
                            <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                          </svg> -->
                        <!-- </button> -->
                        <!-- <button class="btn" id="img-btn-save" style="width:40px; height:40px; background-image: url('{{asset('dist/img/floppy-disk.png')}}'); background-repeat: no-repeat; background-size: 100%; top center;" data-toggle="tooltip" data-placement="top" title="Save"></button> -->
                        <!-- <img src="{{asset('dist/img/floppy-disk.png')}}" style="width:30px; height:30px;"> -->
                        <!-- <img src="{{asset('dist/img/floppy-disk.png')}}" id="img-btn-save" type="button" style="width:4.5%; height:4.5%; padding-left:1%;" data-toggle="tooltip" title="Save"> -->
                        <!-- <button class="btn" id="img-btn-search" style="width:40px; height:40px; padding-left: 1em; background-image: url('{{asset('dist/img/file.svg')}}'); background-repeat: no-repeat; background-size: 100%; top center;" data-toggle="tooltip" data-placement="top" title="Preview" ></button> -->
                        <!-- <button id="img-btn-preview" href="#" class="btn" style="overflow:hidden;" data-toggle="tooltip" data-placement="top" title="Preview">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" fill="#1088eb" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                          </svg>
                        </button> -->
                        <!-- <button class="btn" id="img-btn-search" style="width:40px; height:40px; margin-left: 1em; background-image: url('{{asset('dist/img/paper-plane.svg')}}'); background-repeat: no-repeat; background-size: 100%; top center;" data-toggle="tooltip" data-placement="top" title="Send Confirmation"></button> -->
                        <!-- <button id="img-btn-send" href="#" class="btn" style="overflow:hidden;" data-#deeffc="tooltip" data-placement="top" title="Send Confirmation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        </button> -->
                        <!-- <img src="{{asset('dist/img/paper-plane.svg')}}" id="img-btn-send" type="button" style="width:4.5%; height:4.5%; padding-left:1%;" data-toggle="tooltip" title="Send Confirmation"> -->
                        <!-- <img src="{{asset('dist/img/edit.svg')}}" id="edit" type="button" style="width:4.5%; height:4.5%; padding-left:1%;"> -->
                        <!-- <button id="img-btn-revise" href="{{ route('policy.revisepolicy') }}" class="btn" style="overflow:hidden;" data-toggle="tooltip" data-placement="top" title="Revise">
                          <svg xmlns="http://www.w3.org/2000/svg" style="width:35px; height:35px;" fill="#ffac54" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                          </svg>
                        </button> -->
                        <!-- <a href="{{ route('policy.revisepolicy') }}" id="img-btn-revise" data-toggle="tooltip" title="Revise">
                          <svg xmlns="http://www.w3.org/2000/svg" style="width:4%; height:4%; padding-left:1%;" fill="#ffac54" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                          </svg>
                        </a> -->
                        <!-- <img src="{{asset('dist/img/check-solid.svg')}}" id="download" type="button" style="width:4.5%; height:4.5%; padding-left:1%;"> -->
                        <!-- <button id="img-btn-submit" href="{{ route('policy.submitpolicy') }}" class="btn" style="overflow:hidden;" data-toggle="tooltip" data-placement="top" title="Submit">
                          <svg xmlns="http://www.w3.org/2000/svg" style="width:35px; height:35px;" fill="#57a63f" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                          </svg>
                        </button> -->
                        <!-- <a href="{{ route('policy.submitpolicy') }}" id="img-btn-submit" data-toggle="tooltip" title="Submit">
                          <svg xmlns="http://www.w3.org/2000/svg" style="width:4%; height:4%; padding-left:1%;" fill="#57a63f" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                          </svg>
                        </a> -->
                        <!-- <button class="btn" id="img-btn-closed" style="width:40px; height:40px; padding-left:1%; background-image: url('{{asset('dist/img/remove.png')}}'); background-repeat: no-repeat; background-size: 100%; top center;" data-toggle="tooltip" data-placement="top" title="Save"></button> -->
                        <!-- <img src="{{asset('dist/img/remove.png')}}" id="img-btn-closed" type="button" style="width:4.5%; height:4.5%; padding-left:1%;" data-toggle="tooltip" title="Cancel">                -->
                      </div>
                      <div id="stepper-policy" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                          <!-- your steps here -->
                          <div class="step" data-target="#policy-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="policy-part" id="policy-part-trigger">
                              <span class="bs-stepper-circle">1</span>
                              <span class="bs-stepper-label">SPPA Information</span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                              <span class="bs-stepper-circle">2</span>
                              <span class="bs-stepper-label">Object Information</span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#risk-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="risk-part" id="risk-part-trigger">
                              <span class="bs-stepper-circle">3</span>
                              <span class="bs-stepper-label">Risk</span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#payor-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="payor-part" id="payor-part-trigger">
                              <span class="bs-stepper-circle">4</span>
                              <span class="bs-stepper-label">Payor</span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#others-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="others-part" id="others-part-trigger">
                              <span class="bs-stepper-circle">5</span>
                              <span class="bs-stepper-label">Others</span>
                            </button>
                          </div>
                        </div>
                        <div class="bs-stepper-content">
                          <!-- your steps content here -->
                          <div id="policy-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="policy-part-trigger">
                            <div class="card">
                              <h2 class="card-header">Product & Coverage</h2>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <div class="card-body">
                                <div class="form-group row">
                                  <label for="ProductID" class="col-sm-2 col-form-label">Coverage</label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="ProductID" name="LstProduct" onchange="Product_OnChange(this.value)">
                                    </select>
                                  </div>
                                  <label for="CoverageID" class="col-sm-2 col-form-label" style="margin-left: 5em">Product</label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="CoverageID" name="LstCoverage" onchange="setSI_RC(this.value)">
                                    </select>
                                  </div>
                                  <!-- <p for="LstDownloadProduct" class="col-sm-2 col-form-label">Product Info</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="LstDownloadProduct">
                                      <option value="" selected></option>
                                    </select>
                                  </div>
                                  <div class="col-sm-2">
                                    <button type="button" id="BtnDownloadProduct" class="btn btn-block btn-outline-primary">Download</button>
                                  </div> -->
                                </div>
                                <div class="form-group row">
                                  <!-- <label for="LstCoverage" class="col-sm-2 col-form-label">Coverage  </label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="LstCoverage" name="LstCoverage" onchange="setSI_RC(this.value)">
                                    </select>
                                  </div> -->
                                  <!-- <label for="LstPayment" class="col-sm-2 col-form-label">Payment  </label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="LstPayment" name="LstPayment">
                                      <option value="" selected></option>
                                    </select>
                                  </div> -->
                                </div>
                                <div class="form-group row">
                                  <label for="SType" class="col-sm-2 col-form-label">Policy Status  </label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="SType" name="LstSType">
                                      <!-- <option value="" selected></option> -->
                                      <!-- <option value="S" selected>Individual</option> -->
                                      <!-- <option value="M">Master Policy</option>
                                      <option value="O">Master Open Cover</option> -->
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <!-- /.card-footer -->
                            </div>
                            <div class="card">
                              <h2 class="card-header">Policy Data</h2>
                              <div class="card-body">
                                <div class="form-group row">
                                  <p for="PStatus" class="col-sm-3 col-form-label">Policy Status  </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="PStatus" type="text" name="TxtPStatus" readonly>
                                  </div>
                                  <p for="TxtPID" class="col-sm-1 col-form-label">&nbsp;◦ PID</p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="PID" type="text" name="TxtPID" readonly>
                                  </div>
                                  <!-- <p for="TxtPPID" class="col-sm-1 col-form-label">&nbsp;◦ PPID</p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtPPID" type="text" name="TxtPPID" disabled>
                                  </div> -->
                                </div>
                                <div class="form-group row">
                                  <p for="RegDate" class="col-sm-3 col-form-label">Registration Date  </p>
                                  <div class="input-group date col-sm-3" id="regdate" data-target-input="nearest">
                                    <input type="text" id="RegDate" name="TxtRegDate" class="form-control datetimepicker-input" data-target="#regdate" disabled/>
                                    <div class="input-group-append" data-target="#regdate" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p for="TxtQuotationNo" class="col-sm-3 col-form-label">Quotation No</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="CREFNO" name="TxtQuotationNo" type="text">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p for="TxtRefNo" class="col-sm-3 col-form-label">Reference No  </p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="RefNo" name="TxtRefNo" type="text">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  @if (config('app.MANDATORYBRANCH'))
                                    <label for="Segment" class="col-sm-3 col-form-label">Segment</label>
                                  @else
                                    <p class="col-sm-3 col-form-label">Segment</p>
                                  @endif
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="Segment" name="LstSegment" {{ config('app.MANDATORYSEGMENT') === true ? 'required' : '' }}>
                                    </select>
                                    <div class="invalid-feedback">
                                      Segment Required !
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row" id="divLstMO">
                                  <p class="col-sm-3 col-form-label">Marketing Officer  </p>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="MO" name="LstMO">
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  @if (config('app.MANDATORYBRANCH'))
                                    <label for="Branch" class="col-sm-3 col-form-label">Branch</label>
                                  @else
                                    <p class="col-sm-3 col-form-label">Branch</p>
                                  @endif
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="Branch" name="LstBranch" {{ config('app.MANDATORYBRANCH') === true ? 'required' : '' }}>
                                    </select>
                                    <div class="invalid-feedback">
                                      Branch Required !
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Profit Cost Center</p>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="CT" name="LstCT">
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p for="PolicyNo" class="col-sm-3 col-form-label">Policy Number</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="PolicyNo" name="TxtPolicyNo" type="text" readonly>
                                  </div>
                                  @if (config('app.SHOWBUTTONGETPOLICYNO'))
                                    <div class="col-sm-2">
                                      <button type="button" id="BtnPolicyNo" class="btn btn-block btn-outline-primary">Get Policy No.</button>
                                    </div>
                                  @endif
                                </div>
                                <div class="form-group row">
                                  <label for="LstPHolder" class="col-sm-3 col-form-label">Policy Holder</label>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="PolicyHolder" name="LstPHolder" required>
                                    </select>
                                    <div class="invalid-feedback">
                                      Policy Holder Required !
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="LstInsured" class="col-sm-3 col-form-label">Insured</label>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="InsuredID" name="LstInsured" required>
                                    </select>
                                    <div class="invalid-feedback">
                                      Insured Required !
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="TxtName" class="col-sm-3 col-form-label">Long Insured Name</label>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="InsuredName" name="TxtName" type="text" required>
                                    <div class="invalid-feedback">
                                      Long Insured Name Required !
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Submit Date</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="SubmitDateF" name="CbxSubmitDate" onclick="SubmitDateF_Checked()">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label id="lblInsurancePeriod" for="TxtName" class="col-sm-3 col-form-label">Insurance Period </label>
                                  <div class="input-group date col-sm-2" id="sdate" data-target-input="nearest">
                                    <input type="text" id="InceptionDate" name="TxtSDate" class="form-control datetimepicker-input" data-target="#sdate" placeholder="mm/dd/yyyy" required/>
                                    <div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div class="invalid-feedback">
                                      Inception Date Required !
                                    </div>
                                  </div>
                                  <!-- <div class="input-group date col-sm-2" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control" id="TxtSDate" required />
                                  </div> -->
                                  _
                                  <div class="input-group date col-sm-2" id="edate" data-target-input="nearest">
                                    <input type="text" id="ExpiryDate" name="TxtEDate" class="form-control datetimepicker-input" data-target="#edate" placeholder="mm/dd/yyyy" required/>
                                    <div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div class="invalid-feedback">
                                      Inception Date Required !
                                    </div>
                                  </div>
                                  <!-- <div class="input-group date col-sm-2" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control" id="TxtEdate" required />
                                  </div> -->
                                  <!-- <div class="col-form-label col-sm-4">
                                    <input type="checkbox" class="form-check-input col-sm-2" id="SubmitDateF" name="CbxSubmitDate" onclick="SubmitDateF_Checked()">
                                    <label class="form-check-label" for="SubmitDateF">Submit Date</label>
                                  </div> -->
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Prorata Period</p>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4" id="PPeriod" name="LstPPeriod">
                                      <option value="0" selected>Default</option>
                                      <option value="1">Daily</option>
                                      <option value="2">Monthly</option>
                                    </select>
                                    <!-- <input class="form-control" id="TxtPPeriod" name="TxtPPeriod" type="number" placeholder="0"> -->
                                  </div>
                                  <!-- <div class="col-sm-6">
                                    <label> &nbsp; *(0 : Default, 1 : Daily Basis, 2 : Monthly Basis)</label>
                                  </div> -->
                                </div>
                                <!-- <input type="checkbox" class="form-check-input col-sm-1" id="SubmitDateF" name="CbxSubmitDate"> -->
                                <div style="display:none;">
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Voyage :</p>
                                    <div class="col-form-label">
                                      <input type="checkbox" class="form-check-input col-sm-1" id="CbxVoyage" name="CbxVoyage">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p for="TxtDepartDate" class="col-sm-3 col-form-label">Estimate Time Depature </p>
                                    <div class="input-group date col-sm-4" id="TxtDepartDate" data-target-input="nearest">
                                      <input type="date" class="form-control" id="TxtDepartDate" name="TxtDepartDate" />
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p for="TxtArrivalDate" class="col-sm-3 col-form-label">Estimate Time Arrival</p>
                                    <div class="input-group date col-sm-4" id="TxtArrivalDate" data-target-input="nearest">
                                      <input type="date" class="form-control" id="TxtArrivalDate" name="TxtArrivalDate" />
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Voyage From </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtVoyageFromID" name="TxtVoyageFromID" type="text">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="TxtVoyageFromDesc" name="TxtVoyageFromDesc" type="text" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Port From </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtPortFromID" name="TxtPortFromID" type="text">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="TxtPortFromDesc" name="TxtPortFromDesc" type="text" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Voyage To </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtVoyageToID" name="TxtVoyageToID" type="text">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="TxtVoyageToDesc" name="TxtVoyageToDesc" type="text" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Port To </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtPortToID" name="TxtPortToID" type="text">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="TxtPortToDesc" name="TxtPortToDesc" type="text" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Consignee Name </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtConsigneeName" name="TxtConsigneeName" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Consignee Address </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtConsigneeAddress" name="TxtConsigneeAddress" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Transhipment </p>
                                    <div class="col-form-label">
                                      <input type="checkbox" class="form-check-input col-sm-1" id="CbxTranshipment" name="CbxTranshipment">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p for="TxtTransDate" class="col-sm-3 col-form-label">Transhipment Date </p>
                                    <div class="input-group date col-sm-4" id="TxtTransDate" data-target-input="nearest">
                                      <input type="date" class="form-control" id="TxtTransDate" name="TxtTransDate" />
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">At and From </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtTransAtAndFrom" name="TxtTransAtAndFrom" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">To </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtTransTo" name="TxtTransTo" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Conveyance </p>
                                    <div class="col-sm-4">
                                      <input class="form-control" id="TxtTransConveyence" name="TxtTransConveyence" type="text">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary btn-next-form">Next</button>
                          </div>
                          <div id="information-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="card">
                              <h2 class="card-header">Object Information</h2>
                              <div class="card-body" id="cbObjectInfo">

                              </div>
                            </div>
                            <button class="btn btn-primary btn-prev-form">Previous</button>
                            <button class="btn btn-primary btn-next-form">Next</button>
                          </div>
                          <div id="risk-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="risk-part-trigger">
                            <div class="card">
                              <h2 class="card-header">Risk Coverage</h2>
                              <div class="card-body" id="cbRC">
                                <table id="tblRiskCoverage" class="table table-condensed responsive table-striped">

                                </table>
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Sum Insured</h2>
                              <div class="card-body">
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Currency</label>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4 select2bs4-getapi" id="Currency" name="LstCurrency" required>
                                    </select>
                                    <div class="invalid-feedback">
                                      Currency Required !
                                    </div>
                                  </div>
                                </div>
                                <div id="cbSI">

                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Premium Simulation</h2>
                              <div class="card-body">
                              @if (config('app.SHOWNOTAPPLYRATELOADING'))
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Not Apply Rate Loading :</p>
                                  <div class="col-sm-4">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="NotApplyRateLoadingF" name="CbxNotApplyRateLoading" value="true" onclick="NotApplyRateLoading_Checked()"/>
                                  </div>
                                </div>
                              @endif
                              <input type="checkbox" style="display:none;" class="form-check-input col-sm-1" id="IncludeExtCoverF" name="IncludeExtCoverF"/>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Discount :</p>
                                  <div class="col-sm-2">
                                    <input class="form-control num-format" id="Discount" name="TxtDiscount" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onkeyup="onhange_number_format($(this));">
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="input-group mb-3">
                                      <input class="form-control" id="DiscPCT" name="TxtDiscountPCT" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                      <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <button type="button" id="BtnPremiumSimulation" class="btn btn-block btn-outline-primary">Calculate</button>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Premium :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control num-format" id="Premium" name="TxtPremium" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onkeyup="onhange_number_format($(this));"> 
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Administration Fee :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="ADMFee" name="TxtAdmFee" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onkeyup="onhange_number_format($(this));">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Stamp Duty :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="StampDuty" name="TxtStampDuty" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onkeyup="onhange_number_format($(this));">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Total :</label>
                                  <div class="col-sm-4">
                                    <input class="form-control num-format" id="TxtTotalPremium" name="TxtTotalPremium" type="text" placeholder="0" readonly> 
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Premium Calculation :</p>
                                  <div class="col-sm-7">
                                    <textarea class="form-control" rows="3" id="SPremium" name="TxtSPremium" style="height:200px;" readonly></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary btn-prev-form">Previous</button>
                            <button class="btn btn-primary btn-next-form">Next</button>
                          </div>
                          <div id="payor-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="payor-part-trigger">
                            <div class="card">
                              <h2 class="card-header">Payor</h2>
                              <div class="card-body" id="cbPayor">
                              <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Payor : </p>
                                  <div class="col-sm-4">
                                    <select class="form-control select2bs4" id="DefaultPayor" name="LstPayor">
                                      <option value="PHOLDER">Policy Holder</option>
                                      <option value="SOURCE">Source</option>
                                      <option value="INSURED">Insured</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Warranty Premium Clause : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="WPC" name="TxtWPC" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Grace Period : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="Grace" name="TxtGrace" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                  </div>
                                </div> -->
                                @if (config('app.SHOWBILLINGBYPOLICYYEAR'))
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Billing by Policy Year</p>
                                    <div class="col-form-label">
                                      <input type="checkbox" class="form-check-input col-sm-1" id="PolicyYearF" name="cbxPolicyYearF">
                                    </div>
                                  </div>
                                @endif
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Policy Holder's Address :</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="CbxPHolderAddressF" name="CbxPHolderAddressF">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Correspondence Name :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="Correspondence_Attention" name="TxtAttention" type="text">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Correspondence Address :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="Correspondence_Address" name="TxtCorAddress" type="text">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Correspondence Email :</p>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="Correspondence_Email" name="TxtCorEmail" type="text">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Premium Payment Procedure</h2>
                              <div class="card-body" id="cbInstallment">
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Grace Period : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="Grace" name="TxtGrace" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Warranty Premium Clause : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="WPC" name="TxtWPC" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Period Term : </p>
                                  <div class="col-sm-2">
                                    <select class="form-control select2bs4" id="Payment_Term" name="LstPayment_Term">
                                      <option value="0">Daily</option>
                                      <option value="1">Monthly</option>
                                      <option value="3">Quarterly</option>
                                      <option value="6">Half Yearly</option>
                                      <option value="12">Annualy</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Payment Tenor : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="Payment_Tenor" name="TxtPayment_Tenor" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                  </div>
                                  <div class="col-sm-2">
                                    <button id="detailInstallment" type="button" class="btn btn-default btn-block" disabled>
                                      <i class="fas fa-calculator"></i>
                                      Simulation
                                    </button>
                                  </div>
                                  <!-- <a href='' id="detailInstallment" style="margin-top: 8px;">View Detail Installment</a> -->
                                </div>
                                <div class="form-group row">
                                  
                                </div>
                                @if (config('app.SHOWBILLINGBYPOLICYYEAR'))
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Billing by Policy Year</p>
                                    <div class="col-form-label">
                                      <input type="checkbox" class="form-check-input col-sm-1" id="PolicyYearF" name="cbxPolicyYearF">
                                    </div>
                                  </div>
                                @endif
                              </div>
                            </div>
                            <button class="btn btn-primary btn-prev-form">Previous</button>
                            <button class="btn btn-primary btn-next-form">Next</button>
                          </div>
                          <div id="others-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="others-part-trigger">
                            <div class="card" id="card-business-source">
                              <h3 class="card-header">Business Source</h3>
                                <div class="card-body" id="cbBusinessSource">
                                  <div class="form-group row">
                                    <p for="TxtName" class="col-sm-3 col-form-label">Business Source : </p>
                                    <div class="col-sm-5">
                                      <select class="form-control select2bs4 select2bs4-getapi" id="AID_1" name="LstAID_1">
                                      </select>
                                    </div>
                                    <div class="col-sm-2">
                                      <select class="form-control select2bs4" id="BSTYPE_1" name="LstBSType_1">
                                        <option value="" selected></option>
                                        <option value="A">Agent</option>
                                        <option value="B">Brokerage</option>
                                        <option value="O">Others</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p for="TxtName" class="col-sm-3 col-form-label">Commission By : </p>
                                    <div class="col-sm-2">
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-primary custom-control-input-outline" value="CommAmount" type="radio" id="CommByAmount" name="CommBy">
                                        <label for="CommByAmount" class="custom-control-label">Amount</label>
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-primary custom-control-input-outline" value="CommPercent" type="radio" id="CommByPercent" name="CommBy">
                                        <label for="CommByPercent" class="custom-control-label">Percentage</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Commission : </p>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="Fee" name="TxtFee" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="FeeAmount" name="TxtFeeAmount" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                    </div>
                                  </div> -->
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Commission : </p>
                                    <div class="col-sm-2">
                                      <input class="form-control num-format" id="FeeAmount_1" name="TxtFeeAmount_1" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" onkeyup="onhange_number_format($(this));">
                                    </div>
                                    <div class="col-sm-2">
                                      <div class="input-group mb-3">
                                        <input class="form-control" id="Fee_1" name="TxtFee_1" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                        <div class="input-group-append">
                                          <span class="input-group-text">%</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Business Source 2 : </p>
                                    <div class="col-sm-5">
                                      <select class="form-control select2bs4" id="AID_2" name="LstAID_2">
                                        <option value="" selected></option>
                                      </select>
                                    </div>
                                    <div class="col-sm-2">
                                      <select class="form-control select2bs4" id="BSTYPE_2" name="LstBSType_2">
                                        <option value="" selected></option>
                                        <option value="A">Agent</option>
                                        <option value="B">Brokerage</option>
                                        <option value="O">Others</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Fee 2 : </p>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="Fee_2" name="TxtFee_2" type="number" placeholder="0">
                                    </div>
                                    <div class="col-sm-2">
                                      <input class="form-control" id="FeeAmount_2" name="TxtFeeAmount_2" type="number" placeholder="0">
                                    </div>
                                  </div> -->
                                </div>
                            </div>
                            <!-- <div class="modal fade" id="modal-general" tabindex="-1" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="modaltitle"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" id="modalbody">
                                  </div>
                                  <div class="modal-footer" id="modalfooter">
                                  </div>
                                </div>
                              </div>
                            </div> -->
                            <div class="card" style="display:none;">
                              <div class="card-header container-fluid"> 
                                <div class="row">
                                  <div class="col-md-9">
                                    <h2>Beneficiaries</h2>
                                  </div>
                                  <div class="col-md-3 float-right">
                                    <button class="btn btn-primary" style="margin-left: 6em" data-toggle="modal" data-target="#modal-beneficiaries">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                      <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                      Add New
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="card-body">
                                <table id="tblBeneficiaries" class="table table-condensed responsive table-striped">
                                  <thead>
                                    <tr>
                                        <th>Profile ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>ID Number</th>
                                        <th>Birth Date</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                </table>
                              </div>
                            </div>
                            <div class="card" style="display:none;">
                              <h2 class="card-header">Interested Party</h2>
                              <div class="card-body">
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Default Term & Conditions</h2>
                              <div class="card-body" id="cbClausula">
                                <table id="tbl_covClausula" class="table table-condensed responsive table-striped">

                                </table>
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Default Deductible</h2>
                              <div class="card-body" id="cbDeductible">
                                <table id="tbl_covDeductible" class="table table-condensed responsive table-striped">

                                </table>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header container-fluid">
                                <div class="row">
                                  <div class="col-md-7">
                                    <h2>Photo/Document List</h2>
                                    <button class="btn btn-primary btn-upload">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                      <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                      Upload
                                    </button>
                                  </div>
                                  <!-- <div class="col-md-5">
                                    <button class="btn btn-primary btn-upload">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                      <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                      Upload
                                    </button>
                                  </div> -->
                                </div>
                              </div>
                              <div class="card-body">
                                <table id="tblPolDocUpload" class="table table-condensed responsive table-striped">
                                  <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th></th>
                                        <th>FileType</th>
                                        <th>Title</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tblPolDocUpload-body">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card">
                              <h2 class="card-header">Submission</h2>
                              <div class="card-body">
                                <div style="display:none;" class="form-group row">
                                  <p class="col-sm-3 col-form-label">Immediate Inforce</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="InforceF" name="CbxAutoInforce">
                                  </div>
                                </div>
                                <div class="form-group row" style="display:none;">
                                  <p class="col-sm-3 col-form-label">Document Upload</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="CbxPolicyUpload" name="CbxPolicyUpload" disabled>
                                  </div>
                                </div>
                                @if (config('app.AUTOEMAILCHECKBOXF'))
                                  <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Auto Email</p>
                                    <div class="col-form-label">
                                      <input type="checkbox" class="form-check-input col-sm-1" id="NeedEmailF" name="CbxAutoEmail">
                                    </div>
                                  </div>
                                @endif
                                <div class="form-group row" style="display:none;">
                                  <p class="col-sm-3 col-form-label">Hardcopy Policy</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="CbxHardcopyPolicy" name="CbxHardcopyPolicy">
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Not Apply Rate Loading</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="CbxNotApplyRateLoading" name="CbxNotApplyRateLoading"/>
                                  </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Submit Date</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="SubmitDateF" name="CbxSubmitDate">
                                  </div>
                                </div> -->
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Need e-Sign</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="NeedESignF" name="CbxNeedEsignF">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="DisabledNeedESignF" name="DisabledCbxNeedEsignF" checked=true disabled>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">e-Sign</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="EsignF" name="CbxESign" disabled>
                                  </div>
                                </div>
                                <div class="form-group row" id="div-needsurveyf">
                                  <p class="col-sm-3 col-form-label">Need Survey</p>
                                  <div class="col-form-label">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="NeedSurveyF" name="CbxNeedSurveyF">
                                    <input type="checkbox" class="form-check-input col-sm-1" id="DisabledNeedSurveyF" name="DisabledNeedSurveyF" checked=true disabled>
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Document SPPA Status</p>
                                  <div class="col-form-label col-sm-4">
                                    <label id="DocStatus" style="padding-left:2%;">No Document SPPA</label>
                                  </div>
                                </div> -->
                                <!-- <div class="form-group row" style="width: 100%; padding-left:5%; text-align: center;">
                                  <div class="col text-center">
                                    <button class="btn btn-primary" id="BtnSave">Save</button>
                                    <button class="btn btn-primary" id="BtnValidate">Validate</button>
                                    <button class="btn btn-primary" id="BtnAddCert">Add Certificate</button>
                                    <button class="btn btn-primary" id="BtnCompliance">Complience</button>
                                    <button class="btn btn-primary" id="BtnPayment">Payment</button>
                                    <button class="btn btn-primary" id="BtnTSubmit">Quotation</button>
                                    <button class="btn btn-primary" id="BtnRevise">Revise</button>
                                    <button class="btn btn-primary" id="BtnSubmitConfirmation">Send Confirmation</button>
                                    <button class="btn btn-primary" id="BtnSubmit">Submit</button>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                            <button class="btn btn-primary btn-prev-form">Previous</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
        <!-- /.card -->
      </div>
    </div>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<!-- Modal Loading-->
<!-- <div class="modal" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-body text-center">
        <div class="spinner-border text-info" style="width: 4rem; height: 4rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
      </div>
  </div>
</div> -->

<div class="modal" id="img-modal" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <!-- <div class="modal-content"> -->
      <div class="modal-body text-center">
        <span class="close">&times;</span>
        <img class="modal-img-content" id="img01">
        <div id="caption"></div>
      </div>
    <!-- </div> -->
  </div>
</div>

<!-- <div class="modal fade" id="modal-view">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title">History Profile</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyHistory"></div>
    </div>
  </div>
</div> -->

<!-- <div class="modal fade" id="modal-general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div id="class-modal-dialog" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modaltitle"></h4>
      </div>
      <div class="modal-body" id="modalbody"></div>
      <div class="modal-footer" id="modalfooter"></div>
    </div>
  </div>
</div> -->
</section>
<!-- /.content -->
</div>
@endsection
@section('scriptpage')
<!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->
<script>
  // function functionOne(_callback){
  //   console.log('function one');
  //   // do some asynchronus work 
  //   _callback();
  // }

  // function functionTwo(){
  //     // do some asynchronus work 
  //     console.log('fucntion two');
  //     functionOne(()=>{
  //       setTimeout(()=>{
  //           console.log("inside timeout");
  //       },5000);
  //     });
  // }

  // functionTwo();
  
  let arrCurrency,arrCoverage,arrProduct,arrGendtab, cbProduct, cbCoverage, cbGendtab, arrProfile, privilegesByPassESign, callback_PID;
  let arrPolicy = [];
  let getMasterDataF = false;
  let masterDataF = false;
  let viewDetailF = false;
  let _token   = $('meta[name="csrf-token"]').attr('content');
  let tblDeductible;
  let tblClausula;
  // let arrCoverage;
  // let arrProduct;
  // let arrGendtab;
  

  async function getDataMaster(url) {
    try {
      return new Promise(resolve => {
        const res = getData(url);
        resolve(res);
      });
    } catch(err) {
    }
  }

  function checkPrivilegesByPassESign(){
    console.log(privilegesByPassESign);
    document.getElementById('NeedESignF').checked = !privilegesByPassESign;
    if (privilegesByPassESign){
      if (arrPolicy.length > 0){
        document.getElementById('NeedESignF').checked = arrPolicy[0]['NeedESignF'];
      }
    }
    $('#NeedESignF').css('display',(privilegesByPassESign) ? 'normal' : 'none');
    $('#DisabledNeedESignF').css('display',(privilegesByPassESign) ? 'none' : 'normal');
  }
  
  async function main(){
    getMasterDataF = true;
    masterDataF = true;
    console.time('main');
    const resArray = await Promise.all([
      getDataMaster('{{ route("listproduct") }}'),
      getDataMaster('{{ route("listcoverage") }}'),
      getDataMaster('{{ route("listgendtab") }}'),
      getDataMaster('{{ route("listmo") }}'),
      getDataMaster('{{ route("listbranch") }}'),
      getDataMaster('{{ route("listcurrency") }}'),
      getDataMaster('{{ route("listprofile") }}'),
      getDataMaster('{{ route("listsegment") }}'),
      getDataMaster('{{ route("listct") }}'),
      getDataMaster('{{ route("listagent") }}'),
      getDataMaster('{{ route("getprivileges") }}?FName=ALLOWPASSESIGN')
    ]);

    getMasterDataF = false;
    
    if (resArray[10].code == '200'){
      privilegesByPassESign = true;
      checkPrivilegesByPassESign();
    }else{
      privilegesByPassESign = false;
      checkPrivilegesByPassESign();
    }
    
    //Product
    if (resArray[0].code == '200'){
      var listbox = document.getElementById("ProductID");
      addOptionItem(listbox,resArray[0].Data,'ProductID','Description',false);
      arrProduct = resArray[0];
      arrCoverage = resArray[1];
      arrGendtab = resArray[2];
      Product_OnChange($('#ProductID').val());
    }

    //MO
    if (resArray[3].code == '200'){
      var listbox = document.getElementById("MO");
      addOptionItem(listbox,resArray[3].Data,'ID','Name',true);
    }

    //Branch
    if (resArray[4].code == '200'){
      var listbox = document.getElementById("Branch");
      addOptionItem(listbox,resArray[4].Data,'Branch','Name',true);
    }

    //Currency
    if (resArray[5].code == '200'){
      var listbox = document.getElementById("Currency");
      addOptionItem(listbox,resArray[5].Data,'Currency','Description',true);
      $('#Currency').val('IDR');
      $('#Currency').trigger('change');    
    }

    //Profile
    if (resArray[6].code == '200'){
      const faProfile = resArray[6].Data.filter(base => base.Restrictedf === false);
      var listbox1 = document.getElementById("PolicyHolder");
      addOptionItem(listbox1,faProfile,'ID','Name',true,true);
      var listbox2 = document.getElementById("InsuredID");
      addOptionItem(listbox2,faProfile,'ID','Name',true,true);
      arrProfile = faProfile;
    }

    //Segment
    if (resArray[7].code == '200'){
      var listbox = document.getElementById("Segment");
      addOptionItem(listbox,resArray[7].Data,'Segment','Description',true);
    }

    //CT
    if (resArray[8].code == '200'){
      var listbox = document.getElementById("CT");
      addOptionItem(listbox,resArray[8].Data,'CT','Description',true);
    }

    //Agent
    if (resArray[9].code == '200'){
      // const faAgent = resArray[9].Data.filter(base => base.Restrictedf === false);
      // console.log(faAgent);
      var listbox = document.getElementById("AID_1");
      addOptionItem(listbox, resArray[9].Data,'ID','Name',true);
    }
    
    console.timeEnd('main')
    // console.log(callback_PID);
    // if (callback_PID != ''  && callback_PID != undefined){
    //   console.log('callback');
    // }else{
    //   console.log('not callback');
    // }
  }
  
  // main();

  $( document ).ready(function() {
    // console.time('main');
    // getproduct();
    // getcoverage();
    // getgendtab();
    // // getmo();
    // getbranch();
    // getcurrency();
    // getprofile();
    // getsegment();
    // getct();
    // getagent();
    // console.timeEnd('main');

    
    
    var Role = '{{session("Role")}}';
    if (Role == 'MARKETING OFFICER'){
      $('#divLstMO').attr('style','display:none;');
    }
    $('#RegDate').val(getformatedDate());
    if ($('#PStatus').val() == ''){
      $('#PStatus').val('Request');
      // $('#PStatus').val($('#PStatus').val().toUpperCase());
    }
    if ($('#PID').val() == '' || $('#PID').val() == '-1'){
      $('#PID').val('-1');
      refreshButton(false);
      $('#img-btn-clear').attr('disabled','disabled');
    }
    // console.log(Role);
    // Product_OnChange($('#ProductID').val());
    // setSI_RC($('#LstCoverage').val());
    //Date time picker dynamic

    // Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      // placeholder: "Retrive Data..."
    });

    $(".select2bs4-getapi").select2({
      theme: 'bootstrap4',
      placeholder: "Retrieving Data..."
    });
    
    $('#regdate').datetimepicker({
      ignoreReadonly: false,
      format: 'L'
    });
    $('#sdate').datetimepicker({
      format: 'L'
    });
    $('#edate').datetimepicker({
      format: 'L'
    });

    // $('#sdate').on('dp.change', function(e){ console.log(e.date); })

    var tblBeneficiaries = $("#tblBeneficiaries").DataTable({
      // "paging": true,
      // "lengthChange": false,
      // "searching": true,
      // "ordering": false,
      // "info": false,
      // "autoWidth": false,
      // "responsive": true,
      // "destroy": true,
      "responsive": true,
      "autoWidth": false,
    });

    $('#CommByAmount').trigger('click');
    
  });

  var tblDoc = $("#tblPolDocUpload").DataTable({
      // "paging": true,
      // "lengthChange": true,
      // "pageLength" : 5,
      // "lengthMenu": [5,10,25,50],
      // "searching": false,
      // "ordering": false,
      // "info": false,
      // "autoWidth": false,
      // "responsive": true,
      // "destroy": true,
      "responsive": true,
      "autoWidth": false,
    });
    tblDoc.on( 'order.dt search.dt', function () {
      tblDoc.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
  } ).draw();

  $('.preview-doc-policy').click(function(event){
    event.preventDefault();
  });

  function callback(){
    if (cbProduct && cbCoverage && cbGendtab){
      Product_OnChange($('#ProductID').val());
    }
  }

  // console.log(policy);
  var tblInquiry = $('#tblInquiryPolicy').DataTable( {
    "processing": true,
    "serverSide": false,
    // "language": {
    //   "processing": "<img src='{{asset('/dist/img/loadertable.gif')}}'>",
    //   // "processing": "<img style='width:50px; height:50px;' src='D:\Middleware\Client\ACA\Satria Web\aca-webportal\public\dist\img\aca.jpg'>",
    // },
    // drawCallback: function () {
    //   console.log( 'Table redrawn '+new Date() );
    // },
    "ajax": {
        "url": "{{ route('policy.listPolicy') }}",
        "type": "GET"
    },
    // "data": policy,
    "columns": [
      { "defaultContent": "" },
      {"data":"PID"},
      { "data": "RefNo" },
      { "defaultContent": "",
        render: function(data, type, row) {
          // console.log(row);
          // if (row['PStatus'] == 'P'){
          //   return row['PolicyJob']['PolicyNo'];
          // }else{
            return row['PolicyNo'];
          // }
        } 
      },
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
          if (row['ProductID'] == '0114'){
            return row['Currency'] + ' ' + 
            // number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
            number_format(row['SI_1'] + row['SI_2'],2,',','.');
          }else{
            return row['Currency'] + ' ' + 
            // number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
            number_format(row['SI_1'],2,',','.');
          }
        }
      },
      { "defaultContent": "",
        render: function(data, type, row) {
          return row['Currency'] + ' ' + 
          number_format(row['Premium'],2,',','.');
        }
      },
      { 
        "defaultContent": "",
        render: function(data, type, row, meta) {
          return '<img src="{{asset("dist/img/edit.svg")}}" width="30" height="30" type="button" value="detail" onclick="viewPolicy(' + row['PID'] + ')"><img src="{{asset("dist/img/trash.svg")}}" class="btn-del" width="30" height="30" type="button" onclick="dropPolicy(' + row['PID'] + ')"></a>';
        } 
      }
    ],
    "columnDefs": [
      {
        "targets": [ 1 ],
        "visible": false,
        "searchable": false
      }
    ],
    "order": [[ 1, 'desc' ]],
    "responsive": true,
    "autoWidth": false,
  });

  $('#btntest').click(function (event){
    event.preventDefault();
    var str="Policy Number : 12345678\n" +
      "Reference Number : statusCode\n";
      var pstr = '<table style="width:100%"><tbody><tr><td style="text-align:left;padding-left:10%">Policy Number</td><td>:</td><td style="text-align:left;padding-left:5%">372378738237829</td></tr><tr><td style="text-align:left;padding-left:10%">Reference Number</td><td>:</td><td style="text-align:left;padding-left:5%">372378738237829</td></tr></tbody></table>'
    Swal.fire({
      icon: 'success',
      title: 'Policy Successfully Submitted.',
      html: pstr,
      // text : 'Policy Number : asd'
    })
  });
  
  function removeRowTable(table, value){
    table.rows( function ( idx, data, node ) {
      // console.log(data);
      return data.PID == value;
    }).remove().draw();
  }

  //add number increment
  tblInquiry.on( 'order.dt search.dt', function () {
    tblInquiry.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
  } ).draw();

  $(window).bind('resize', function () {
    // if ($(this).width() >= 786) {
    //   $('#stepper-policy').attr('class','bs-stepper');
    // } else {
    //   $('#stepper-policy').attr('class','bs-stepper vertical');
    // }
  });

  var stepperpolicy = document.querySelector('#stepper-policy')
  window.stepperForm = new Stepper(stepperpolicy, {
    linear: false,
    animation: true
  })
  var btnPrevList = [].slice.call(document.querySelectorAll('.btn-prev-form'));
  var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'));
  var stepperPanList = [].slice.call(document.querySelectorAll('.bs-stepper-pane'));
  var form = document.querySelector('#form-policy ');

  btnPrevList.forEach(function (btn) {
    btn.addEventListener('click', function () {
      window.stepperForm.previous()
    })
  })
  btnNextList.forEach(function (btn) {
    btn.addEventListener('click', function () {
      window.stepperForm.next()
    })
  })

  // $('#PolicyHolder').on('blur',function(){
  //   console.log('focus out');
  // })

  $("#PolicyHolder").on("select2:select", function () {
    // console.log('haha');
    var Pholder = '';
    var InsuredID =''; 
    // if ($(this).val() != ''){
      // console.log($(this).val());
      const faPHolder = arrProfile.filter(base => base.ID === $(this).val());
      // console.log(faPHolder);
      if (faPHolder.length > 0){
        Pholder = faPHolder[0]['Name'];
      }
      // console.log($('#InsuredID').val());
      if ($('#InsuredID').val() != '') {
        const faInsured = arrProfile.filter(base => base.ID === $('#InsuredID').val());
        InsuredID = faInsured[0]['Name'];
      }
      qq_Pholder(Pholder, InsuredID);
      // $('#PolicyHolder option:contains("123456789012345")').text('ekram');
      // $('#PolicyHolder').trigger('change');
    // }
  });

  $("#InsuredID").on("select2:select", function () {
    // if ($(this).val() != ''){
      var Pholder = '';
      var InsuredID =''; 
      const faInsured = arrProfile.filter(base => base.ID === $(this).val());
      if (faInsured.length > 0){
        InsuredID = faInsured[0]['Name'];
      }
      
      if ($('#PolicyHolder').val() != '') {
        const faPHolder = arrProfile.filter(base => base.ID === $('#PolicyHolder').val());
        Pholder = faPHolder[0]['Name'];
      }
      qq_Insured(Pholder, InsuredID);
    // }
  });

  $('#Branch').on('change',function(){
    // console.log($(this + 'option:contains("00")').text('asd'));
  });	

  function qq_Pholder(LstPHolder, LstInsured) {
    if (LstPHolder == LstInsured) {
      $('#InsuredName').val(LstPHolder);
    } else if (LstPHolder != '' && LstInsured != '') {
      $('#InsuredName').val(LstPHolder + " QQ " + LstInsured);
    } else {
      $('#InsuredID').val($('#PolicyHolder').val());
      $('#InsuredID').trigger('change');
      $('#InsuredName').val(LstPHolder);
    }
  }

  function qq_Insured(LstPHolder, LstInsured) {
    if (LstPHolder == LstInsured) {
      $('#InsuredName').val(LstPHolder);
    } else if (LstPHolder != '' && LstInsured != '') {
      $('#InsuredName').val(LstPHolder + " QQ " + LstInsured);
    } else {
      $('#PolicyHolder').val($('#InsuredID').val());
      $('#PolicyHolder').trigger('change');
      $('#InsuredName').val(LstInsured);
    }
  }

  function qq(LstPHolder, LstInsured) {
    if (LstPHolder == LstInsured) {
      $('#InsuredName').val(LstPHolder);
    } else if (LstPHolder != '' && LstInsured != '') {
      $('#InsuredName').val(LstPHolder + " QQ " + LstInsured);
    } else if (LstPHolder == '') {
      $('#PHolder').val(LstInsured);
      $('#Pholder').trigger('change');
      $('#InsuredName').val(LstInsured);
    } else {
      $('#InsuredID').val(LstPHolder);
      $('#InsuredID').trigger('change');
      $('#InsuredName').val(LstPHolder);
    }
  }

  function setSI_RC(Coverage) {
    var bsCoverage = arrCoverage['Data'];
    const faCoverageDet = bsCoverage.filter(coveragedet => coveragedet.CoverageID == Coverage);
    var bsCurrency = arrCurrency;
    var aStatus = faCoverageDet[0]['AStatus'];
    var cbxInforceF = document.getElementById('InforceF');
    var NotApplyRateLoadingF = document.getElementById('NotApplyRateLoadingF');
    // console.log(NotApplyRateLoadingF.checked);
    if (aStatus != 'C'){
      cbxInforceF.checked = true;
      $('#InforceF').attr('disabled','disabled');
    }else{
      cbxInforceF.checked = false;
      $('#InforceF').removeAttr('disabled');
    }
    Segment_OnChange($('#Segment').val());
    //Hardcode for default grace period ambil dari MW_COVERAGE
    $('#Grace').val(faCoverageDet[0]['Grace']);
    // $('#Segment').trigger('change');
    $('#cbSI').empty();
    $('#tblRiskCoverage').empty();
    $("#tbl_covDeductible").empty();
    $("#tbl_covClausula").empty();
    if (faCoverageDet.length > 0) {
      var IncludeExtCoverF = faCoverageDet[0]['IncludeExtCoverF'];
      // console.log(IncludeExtCoverF);
      document.getElementById('IncludeExtCoverF').checked = IncludeExtCoverF
      for (i = 0; i < faCoverageDet.length; i++) {
        let CovDet = faCoverageDet[i].CoverageDetail;
        let CovDeduc = faCoverageDet[i].CoverageDeductible;
        let CovClausula = faCoverageDet[i].CoverageClauses;
        var tblRC = $("#tblRiskCoverage").DataTable({
          "data": CovDet,
          "columns": [{
              "title": "",
              "className": "select-checkbox",
              "defaultContent": "",
              render: function(data, type, row) {
                // console.log(IncludeExtCoverF);
                if (row['OrderNo'] == '1'){
                  return '<input class="form-control CoverageCode" id="CoverageCode' + row['OrderNo'] + ' " name="CoverageCode[]" type="checkbox" value="' + row['RefCode'] + '" disabled checked><input type="hidden" type="text" id="TxtCoverageCode' + row['OrderNo'] + ' " name="CoverageCode[]" value="' + row['RefCode'] + '" >';
                }else{
                  if (IncludeExtCoverF) {
                    return '<input class="form-control CoverageCode" id="CoverageCode' + row['OrderNo'] + ' " name="CoverageCode[]" type="checkbox" value="' + row['RefCode'] + '" disabled checked><input type="hidden" type="text" id="TxtCoverageCode' + row['OrderNo'] + ' " name="CoverageCode[]" value="' + row['RefCode'] + '" >';
                  }else{
                    return '<input class="form-control CoverageCode" id="CoverageCode' + row['OrderNo'] + ' " name="CoverageCode[]" type="checkbox" value="' + row['RefCode'] + '">';
                  }
                }
              }
            },
            {
              "title": "No",
              "data": "OrderNo"
            },
            {
              "title": "Risk Coverage",
              "data": "Description"
            },
            {
              "title": "Rate"
            },
            {
              "title": "% of Sum Insured"
            }
          ],
          "columnDefs": [
            {
              targets: [3],
              data: 'OrderNo',
              render: function(data, type, row) {
                // if (IncludeExtCoverF) {
                  // return "<input class='form-control TxtRate' id='Rate_" + data + "' name='Rate" + data + "' type='text' value = '0' readonly>";
                // }else{
                  return "<input class='form-control TxtRate' id='RATE_" + data + "' name='Rate" + data + "' type='text' value = '0'>";
                // }
              }
            },
            {
              targets: [4],
              data: 'OrderNo',
              render: function(data, type, row) {
                // if (IncludeExtCoverF) {
                  // return "<input class='form-control TxtRate' id='Rate_" + data + "' name='Rate" + data + "' type='text' value = '0' readonly>";
                // }else{
                  // return "<input class='form-control TxtRate onkeyup_regex' onkeyup='keyup_regex(this)' id='PCTIndemnity_" + data + "' name='PCTIndemnity_" + data + "' type='text' data-regex='^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$' value = '0'><div class='invalid-feedback'>Percentage can't be greater than 100</div>";
                // }
                if (row['RefCode'] == 'EQ-0202-C' || row['RefCode'] == 'FL-0202-C'){
                  return "<input class='form-control TxtRate onkeyup_regex' onkeyup='keyup_regex(this)' id='PCTIndemnity_" + data + "' name='PCTIndemnity_" + data + "' type='text' data-regex='^0$|^10$|^100$' value = '0'><div class='invalid-feedback'>Percentage can only be 10 or 100</div>";
                }else{
                  return "<input class='form-control TxtRate onkeyup_regex' onkeyup='keyup_regex(this)' id='PCTIndemnity_" + data + "' name='PCTIndemnity_" + data + "' type='text' data-regex='^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$' value = '0'><div class='invalid-feedback'>Percentage can't be greater than 100</div>";
                }
              }
            },
            {
              "width":"4.5%",
              "targets": [0] 
            }
          ],
          "pageLength": 10,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "destroy": true,
        });

        var listTxtRate = [].slice.call(document.querySelectorAll('.TxtRate'));
        listTxtRate.forEach(function (rate) {
          rate.setAttribute('oninput',"this.value = this.value.replace(/[^0-9.]/g, '');");
        });

        // keyup_regex
        
        const CovDeducFil = CovDeduc.filter(CovDeduc => CovDeduc.NotApplyRateLoadingF == NotApplyRateLoadingF.checked);
        // console.log(CovDeducFil);
        tblDeductible = $("#tbl_covDeductible").DataTable({
          "data": CovDeducFil,
          "columns": [{
              "title": "No",
              "data": "OrderNo"
            },
            {
              "title": "Deductible Remarks",
              "data": "Description"
            },
            {
              "title": "By Amount",
              "defaultContent": "0",
              "data": "FixedMin"
            },
            {
              "title": "By % of TSI",
              "defaultContent": "0",
              "data": "PCTTSI"
            },
            {
              "title": "By % of Claim",
              "defaultContent": "0",
              "data": "PCTCL"
            }
          ],
          "columnDefs": [{
              targets: [2],
              data: "OrderNo",
              render: function(data, type, row) {
                var readonly = (row['EditableF']) ? '' : 'readonly';
                return '<input class="form-control TxtFixedMin num-format" id="Deductible' + row['OrderNo'] + '" name="FixedMin' + row['OrderNo'] + '" type="text" value = "'+ number_format(row['FixedMin']) +'" onkeyup="onhange_number_format($(this));" '+ readonly +'>';
              }
            },
            {
              targets: [3],
              data: "OrderNo",
              render: function(data, type, row) {
                var readonly = (row['EditableF']) ? '' : 'readonly';
                return '<input class="form-control TxtDEDPCTTSI" id="DEDPCTTSI' + row['OrderNo'] + '" name="DEDPCTTSI' + row['OrderNo'] + '" type="text" value = "'+ row['PCTTSI'] +'" '+ readonly +'>';
              }
            }, {
              targets: [4],
              data: "OrderNo",
              render: function(data, type, row) {
                var readonly = (row['EditableF']) ? '' : 'readonly';
                return '<input class="form-control TxtDEDPCTCL" id="DEDPCTCL' + row['OrderNo'] + '" name="DEDPCTCL' + row['OrderNo'] + '" type="text" value = "'+ row['PCTCL'] +'" '+ readonly +'>';
              }
            }
          ],
          "pageLength": 5,
          "lengthMenu": [
            [5, 10, -1],
            [5, 10, 'All']
          ],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "destroy": true,
        });
        // var listTxtFixedMin = [].slice.call(document.querySelectorAll('.TxtFixedMin'));
        // listTxtFixedMin.forEach(function (fixedmin) {
        //   fixedmin.setAttribute('oninput',"this.value = this.value.replace(/[^0-9.]/g, '');");
        // });
        // var listTxtDEDPCTTSI = [].slice.call(document.querySelectorAll('.TxtDEDPCTTSI'));
        // listTxtDEDPCTTSI.forEach(function (pcttsi) {
        //   pcttsi.setAttribute('oninput',"this.value = this.value.replace(/[^0-9.]/g, '');");
        // });
        // var listTxtDEDPCTCL = [].slice.call(document.querySelectorAll('.TxtDEDPCTCL'));
        // listTxtDEDPCTCL.forEach(function (pctcl) {
        //   pctcl.setAttribute('oninput',"this.value = this.value.replace(/[^0-9.]/g, '');");
        // });
        tblClausula = $("#tbl_covClausula").DataTable({
          "data": CovClausula,
          "columns": [
            {
              "title": "",
              "className": "",
              "defaultContent": "",
              render: function(data, type, row) {
                if (row['EditableF']){
                  return '<input class="form-control" id="Clausulacode'+ row['OrderNo'] +'" name="ClausulaCode[]" type="checkbox" value="' + row['RefCode'] + '">';
                }else{
                  return '<input class="form-control" id="Clausulacode'+ row['OrderNo'] +'" name="ClausulaCode[]" type="checkbox" value="' + row['RefCode'] + '" disabled checked>';
                }
              }
            },
            {
              "title": "No",
              "data": "OrderNo"
            },
            {
              "title": "Order No",
              "data": "RefCode"
            },
            {
              "title": "Short Desc",
              "data": "RefCodeDesc"
            },
            {
              "title": "Description",
              "data": "Description"
            }
          ],
          "columnDefs": [{
            targets: [4],
            width: "50%",
            data: "Description",
            render: function(data, type, row) {
              return '<textarea class="form-control" rows="3" placeholder="' + data + '" disabled/>';
            }
          },
          {
           "width":"4.5%",
           "targets": [0] 
          }
          ],
          "select": {
            "style": "multi"
          },
          "pageLength": 5,
          "lengthMenu": [
            [5, 10, -1],
            [5, 10, 'All']
          ],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "order": [[ 1, 'asc' ]],
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "destroy": true,
        });
      }
      const SI = createSI(faCoverageDet);
      let SIF = SI.SiF;
      let SIDefault = SI.SiDefault;
      let SiLabel = SI.SiLabel;
      for (i = 0; i < SIF.length; i++) {
        if (SIF[i] != false && SiLabel[i] != '') {
          var divGrpSI = document.getElementById("cbSI");
          //Div untuk Form Group
          var divFrm = document.createElement("div");
          divFrm.className = "form-group row";
          var label = document.createElement("P");
          label.className = "col-sm-4 col-form-label";
          //Div Untuk Input
          var divTxt = document.createElement("div");
          divTxt.className = "col-sm-4";
          var txt = document.createElement("INPUT");
          txt.className = "form-control num-format";
          txt.type = "text";
          txt.id = "SI_" + (i + 1);
          txt.name = "SI" + (i + 1);
          txt.value = number_format(SIDefault[i],0,',','.');
          txt.setAttribute('oninput',"this.value = this.value.replace(/[^0-9.]/g, '');");
          txt.setAttribute('onkeyup',"onhange_number_format($(this));")
          // txt.setAttribute('onchange',"onchange_number(this)");
          // //Div untuk listbox currency
          // var divList = document.createElement("div");
          // divList.className = "col-sm-3";
          // //Create Listbox currency
          // var LstCurrency = document.createElement("Select");
          // LstCurrency.className = "form-control";
          // LstCurrency.id = "LstCurrencyTSI" + (i + 1);
          // LstCurrency.name = "CurrencyTSI" + (i + 1);
          // addOptionItem(LstCurrency,bsCurrency, 'Currency','Description', false);
          
          label.innerHTML = SiLabel[i];
          divGrpSI.appendChild(divFrm);
          divFrm.appendChild(label);
          // divFrm.appendChild(divList);
          // divList.appendChild(LstCurrency);
          divFrm.appendChild(divTxt);
          divTxt.appendChild(txt);
        }
      }
    }
  }

  function spreadObjInfo(ValueID, FLDID, ProductID, rowno){
    if (ValueID != ''){
      var listValueID = [];
      var bsProduct = arrProduct['Data'];
      var gendtabs = arrGendtab['Data'];
      const faProduct = bsProduct.filter(i => i.ProductID == ProductID);
      const ObjInfo = createArrFLDTAG(faProduct);
      if (ObjInfo.arSLFLDID[parseInt(rowno) + 1] == FLDID){
        const nextgendtab = gendtabs.filter(gendtabtemp => gendtabtemp.SLValueID == ValueID)
        $('#ValueID' + (parseInt(rowno) + 2)).empty();
        var selectElement = document.getElementById("ValueID" + (parseInt(rowno) + 2))
        addOptionItem(selectElement,nextgendtab, 'ValueID','Description');
      }
      
      var filter = {
        FLDID: FLDID,
        ValueID: ValueID
      };
      gendtabtemp = gendtabs.filter(function(item) {
        for (var key in filter) {
          if (item[key] === undefined || item[key] != filter[key])
            return false;
        }
        return true;
      });
      $('#ValueDesc' + (parseInt(rowno) + 1)).val(gendtabtemp[0]['Description']);
      gendtab = createArrGENDTAB(gendtabtemp);
      for (i=parseInt(rowno) + 1; i < 15; i++){
        if (ObjInfo.arFLDID[i] != ''){
          for (j=0; j < 15; j++){
            if (ObjInfo.arFLDID[i] == gendtab.arFLDID[j]){
              if (gendtab.arValueID[j] != ''){
                $('.FLDID' + (i + 1)).val(gendtab.arValueID[j]);
                listValueID.push('FLDID' + (i + 1));
              }else if (gendtab.arValueDesc[j] != ''){
                $('.FLDID' + (i + 1)).val(gendtab.arValueDesc[j]);
              }
              if (ObjInfo.arFLDTAB[i]){
                var filter = {
                  FLDID: ObjInfo.arFLDID[i],
                  ValueID: gendtab.arValueID[j]
                };
                gendtabtemp2 = gendtabs.filter(function(item) {
                  for (var key in filter) {
                    if (item[key] === undefined || item[key] != filter[key])
                      return false;
                  }
                  return true;
                });
                gendtab2 = createArrGENDTAB(gendtabtemp2);
                for (k = i + 1; k < 15; k++){
                  if (ObjInfo.arFLDID[k] != ''){
                    for (l=0; l < 15; l++){
                      if (ObjInfo.arFLDID[k] == gendtab2.arFLDID[l]){
                        if (gendtab2.arValueID[l] != ''){
                          $('.FLDID' + (k + 1)).val(gendtab2.arValueID[l]);
                          listValueID.push('FLDID' + (i + 1));
                        }else if (gendtab2.arValueDesc[l] != ''){
                          $('.FLDID' + (k + 1)).val(gendtab2.arValueDesc[l]);
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
      $.each(listValueID, function( index, value ) {
        $('.' + value).trigger('change');
        $('.' + value).trigger('select2:select');
      });
    }else{
      $('#ValueDesc' + (parseInt(rowno) + 1)).val('');
      // console.log($('#ValueDesc' + (rowno + 1)).val());
    }
  }


  function addOptionItem(selectElement, data, LblValue, LblDescription, withBlankItem = true, descriptionWithID = false){
    if (withBlankItem){
      var option = document.createElement("OPTION");
      option.value = '';
      option.innerHTML = '';
      selectElement.appendChild(option);
    }
    for (j = 0; j < data.length; j++) {
        var option = document.createElement("OPTION");
        option.value = data[j][LblValue];
        if (descriptionWithID){
          option.innerHTML = data[j][LblValue] + ' - ' + data[j][LblDescription];
        }else{
          option.innerHTML = data[j][LblDescription];
        }
        selectElement.appendChild(option);
    }
  }

  function Product_OnChange(Product) {
    var bsCoverage = arrCoverage['Data'];
    var bsProduct = arrProduct['Data'];
    var gendtabs = arrGendtab['Data'];
    const faCoverage = bsCoverage.filter(asd => asd.ProductID == Product);
    const faProduct = bsProduct.filter(i => i.ProductID == Product);
    //hardcode sementara default grace
    if (Product == '0114'){
      $('#Grace').val('30');
    }else{
      $('#Grace').val('14');
    }
    document.getElementById("CoverageID").options.length = 0;
    var listBox = document.getElementById("CoverageID");
    addOptionItem(listBox,faCoverage, 'CoverageID','Description', false);
    // console.log(faProduct);
    $('#WPC').val(faProduct[0]['WPC']);
    // $('#CoverageID').trigger('change');
    var divGrp = document.getElementById("cbObjectInfo");
    var divGrpSI = document.getElementById("cbSI");

    //Initialize Policy Status, di hardcode sementara, kedepannya akan dibuat settingan per Product nya
    var dataPStatus = new Array();
    if (Product == '0114'){
      dataPStatus = [
        {
          "Value":"S",
          "Description":"Individual Policy"
        }
      ];
    }else{
      dataPStatus = [
        {
          "Value":"S",
          "Description":"Individual Policy"
        },
        {
          "Value":"M",
          "Description":"Multiple Policy"
        }
      ];
    }
    $('#SType').empty();
    var STye_elemnt = document.getElementById('SType');
    addOptionItem(STye_elemnt,dataPStatus, 'Value','Description', false);

    //create object information from product
    while (divGrp.firstChild) {
      divGrp.removeChild(divGrp.firstChild);
    }
    while (divGrpSI.firstChild) {
      divGrpSI.removeChild(divGrpSI.firstChild);
    }
    $('#tblRiskCoverage').empty();
    setSI_RC($('#CoverageID').val());
    if (faProduct.length > 0) {
      const ObjInfo = createArrFLDTAG(faProduct);
      // console.log(ObjInfo);
      let arrFLDTAG = ObjInfo.arFLDTAG;
      let arrFLDTAB = ObjInfo.arFLDTAB;
      let arrFLDCOM = ObjInfo.arFLDCOM;
      let arrFLDID = ObjInfo.arFLDID;
      let arrSLFLDID = ObjInfo.arSLFLDID;
      let arrFLDTYPE = ObjInfo.arFLDTYPE;
      let arrFLDREGEX = ObjInfo.arFLDREGEX;
      for (i = 0; i < arrFLDTAG.length; i++) {
        if (arrFLDTAG[i] != '') {
          var divGrp = document.getElementById("cbObjectInfo");

          //Buat div Form
          var divFrm = document.createElement("div");
          divFrm.className = "form-group row";
          var divTxt = document.createElement("div");
          divTxt.className = "col-sm-5";
          //Penentuan Listbox / Input berdasarkan FLDTAB
          if (arrFLDTAB[i]){
            var objinfoValue = document.createElement("SELECT");
            objinfoValue.setAttribute("id", "ValueID" + (i + 1));
            objinfoValue.setAttribute("name", "FLDID" + (i + 1));
            // objinfoValue.setAttribute("class", "form-control FLDID" + (i + 1));
            objinfoValue.setAttribute("class", "form-control select2bs4 spreadobjinfo FLDID" + (i + 1));
            objinfoValue.setAttribute("data-fldid",arrFLDID[i]);
            objinfoValue.setAttribute("data-product",Product);
            objinfoValue.setAttribute("data-rowno",i);
            // objinfoValue.setAttribute("onchange","spreadObjInfo(this.value,'"+ arrFLDID[i] +"','"+ Product +"','"+ i +"')");
            
            const gendtab = gendtabs.filter(gendtabtemp => gendtabtemp.FLDID == arrFLDID[i]);
            addOptionItem(objinfoValue,gendtab, 'ValueID','Description');

            var btnPopUPDesc = document.createElement("a");
            btnPopUPDesc.setAttribute("type","button");
            // console.log($('#PStatus').val());
            // btnPopUPDesc.setAttribute("onclick","popupToast('textarea','Description','Type description here...','ValueDesc" + (i + 1) +"', ("+ $('#PStatus').val() +" == '-1' ? '' : 'readonly'))");
            btnPopUPDesc.setAttribute("onclick","popupToast('textarea','Description','Type description here...','ValueDesc" + (i + 1) +"', ('"+ $('#PStatus').val() +"' == 'Request' ? '' : 'readonly'), '" + arrFLDREGEX[i] + "', '"+ arrFLDTAG[i] +"')");
            btnPopUPDesc.innerHTML = "..."

            var objValueDesc = document.createElement("INPUT");
            objValueDesc.setAttribute("id","ValueDesc" + (i + 1));
            objValueDesc.setAttribute("name","ValueDesc" + (i + 1));
            objValueDesc.setAttribute("class", "form-control");
            objValueDesc.setAttribute("style","text-transform:uppercase");
            objValueDesc.setAttribute("readonly","readonly");
            objValueDesc.setAttribute("type","hidden");
          }else{
            switch(arrFLDTYPE[i]){
              case 'D':
              case 'Y':
                divTxt.setAttribute("class","input-group date col-sm-3");
                divTxt.setAttribute("id", "valuedesc" + (i + 1));
                divTxt.setAttribute("data-target-input", "nearest");

                var objinfoValue = document.createElement("INPUT");
                objinfoValue.setAttribute("id", "ValueDesc" + (i + 1));
                objinfoValue.setAttribute("name", "FLDID" + (i + 1));
                objinfoValue.setAttribute("type", "text");
                objinfoValue.setAttribute("class", "form-control datetimepicker-input");
                objinfoValue.setAttribute("data-target", "#valuedesc" + (i + 1));
                objinfoValue.setAttribute("placeholder",(arrFLDTYPE[i] == 'D' ? "mm/dd/yyyy" : 'yyyy'));

                var divInputGroup = document.createElement("div");
                divInputGroup.setAttribute("class", "input-group-append");
                divInputGroup.setAttribute("data-target", "#valuedesc" + (i + 1));
                divInputGroup.setAttribute("data-toggle","datetimepicker");

                var divInputGroupText = document.createElement("div");
                divInputGroupText.setAttribute("class", "input-group-text");

                var iCalender = document.createElement("i");
                iCalender.setAttribute("class", "fa fa-calendar");

                divInputGroupText.appendChild(iCalender);
                divInputGroup.appendChild(divInputGroupText);
              break;
              // case 'Y':
              // break;
              default:
                var objinfoValue = document.createElement("INPUT");
                objinfoValue.setAttribute("id", "ValueDesc" + (i + 1));
                objinfoValue.setAttribute("name", "FLDID" + (i + 1));
                objinfoValue.setAttribute("class", "form-control FLDID" + (i + 1) + " onkeyup_regex");
                objinfoValue.setAttribute("style","text-transform:uppercase");
                var divInvalid = document.createElement("div");
                if (arrFLDREGEX[i] != ''){
                  objinfoValue.setAttribute("data-regex",arrFLDREGEX[i]);
                  divInvalid.setAttribute("class","invalid-feedback");
                  divInvalid.innerHTML = "The format "+ arrFLDTAG[i] +" is invalid !";
                }
            }
          }
          
          //Penentuan mandatory obj info berdasarkan FLDCOM
          if (arrFLDCOM[i]){
            var label = document.createElement("label");
            objinfoValue.setAttribute("required","");
          }else{
            var label = document.createElement("P");
          }
          label.setAttribute("class","col-sm-3 col-form-label");
          label.innerHTML = arrFLDTAG[i];

          divGrp.appendChild(divFrm);
          divFrm.appendChild(label);
          divFrm.appendChild(divTxt);

          //hardcode sementara
          if (arrFLDID[i] == 'V29' || arrFLDID[i] == 'V37'){
            objinfoValue.setAttribute("disabled","disabled");
            var objinfoValuetemp = document.createElement("INPUT");
            objinfoValuetemp.setAttribute("id","ValueID" + (i + 1));
            objinfoValuetemp.setAttribute("name","FLDID" + (i + 1));
            objinfoValuetemp.setAttribute("class", "form-control FLDID" + (i + 1));
            objinfoValuetemp.setAttribute("style","text-transform:uppercase");
            objinfoValuetemp.setAttribute("readonly","readonly");
            objinfoValuetemp.setAttribute("type","hidden");
            divTxt.appendChild(objinfoValue);
            divFrm.appendChild(objinfoValuetemp);
            divFrm.appendChild(objValueDesc);
          // }else if (arrFLDID[i] == 'V05' || arrFLDID[i] == 'V13'){
          //   objinfoValue.setAttribute("onkeyup","Nospecialcharacter($(this))");
          //   divTxt.appendChild(objinfoValue);
          }else{
            divTxt.appendChild(objinfoValue);
            if (arrFLDREGEX[i] != ''){
              divTxt.appendChild(divInvalid);
            }
            if (arrFLDTAB[i]){
              divFrm.appendChild(btnPopUPDesc);
              divFrm.appendChild(objValueDesc);
            } 
          }

          switch(arrFLDTYPE[i]){
            case 'D':
              divTxt.appendChild(divInputGroup);
              $('#valuedesc' + (i + 1)).datetimepicker({
                format: 'L'
              });
            break;
            case 'Y':
              divTxt.appendChild(divInputGroup);
              $('#valuedesc' + (i + 1)).datetimepicker({
                viewMode: 'years',
                format: 'YYYY'
              });
          }
          // if (arrFLDTYPE[i] == 'D'){
          //   divTxt.appendChild(divInputGroup);
          //   $('#valuedesc' + (i + 1)).datetimepicker({
          //         format: 'L'
          //   });
          // }
        }
      }
      $('.select2bs4').select2({
      theme: 'bootstrap4',
    });
    }
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })
    $(".spreadobjinfo").on("select2:select", function () {
      var valueid = $(this).val();
      var fldid = $(this).attr('data-fldid');
      var product = $(this).attr('data-product');
      var rowno = $(this).attr('data-rowno');
      spreadObjInfo(valueid,fldid,product,rowno)
    });

    $(".onkeyup_regex").on("keyup", function () {
      // console.log($(this).val());
      var exp = $(this).attr('data-regex');
      var value = $(this).val();
      if ($(this).attr('style') == 'text-transform:uppercase'){
        value = value.toUpperCase();
      }
      if (exp != '' && exp != undefined){
        // var
        if (checkRegex(value,exp)){
          $(this).removeClass("is-invalid");
        }else{
          $(this).addClass("is-invalid");
        }
      }
    });
  }

  function keyup_regex(element){
    console.log(element.getAttribute('data-regex'));
    var exp = element.getAttribute('data-regex');
    var value = element.value;
    if (exp != '' && exp != undefined){
      // var
      if (checkRegex(value,exp)){
        // $(this).removeClass("is-invalid");
        element.classList.remove("is-invalid");
      }else{
        // $(this).addClass("is-invalid");
        element.classList.add("is-invalid");
      }
    }
  }

  // $("#ValueID1").on("select2:select", function () {
  //   console.log('haha');
  //   console.log($(this).attr("data-fldid"));
  // });

  function Nospecialcharacter(a){
    var c = a[0].selectionStart,
      r = /[^a-z0-9 .]/gi,
      v = a.val();
    if(r.test(v)) {
      a.val(v.replace(r, ''));
      c--;
    }
    a[0].setSelectionRange(c, c);
  }

  function createArrFLDTAG(faProduct) {

    var arFLDTAG = new Array(29);
    arFLDTAG[0] = faProduct[0].FLDTAG1;
    arFLDTAG[1] = faProduct[0].FLDTAG2;
    arFLDTAG[2] = faProduct[0].FLDTAG3;
    arFLDTAG[3] = faProduct[0].FLDTAG4;
    arFLDTAG[4] = faProduct[0].FLDTAG5;
    arFLDTAG[5] = faProduct[0].FLDTAG6;
    arFLDTAG[6] = faProduct[0].FLDTAG7;
    arFLDTAG[7] = faProduct[0].FLDTAG8;
    arFLDTAG[8] = faProduct[0].FLDTAG9;
    arFLDTAG[9] = faProduct[0].FLDTAG10;
    arFLDTAG[10] = faProduct[0].FLDTAG11;
    arFLDTAG[11] = faProduct[0].FLDTAG12;
    arFLDTAG[12] = faProduct[0].FLDTAG13;
    arFLDTAG[13] = faProduct[0].FLDTAG14;
    arFLDTAG[14] = faProduct[0].FLDTAG15;
    arFLDTAG[15] = faProduct[0].FLDTAG16;
    arFLDTAG[16] = faProduct[0].FLDTAG17;
    arFLDTAG[17] = faProduct[0].FLDTAG18;
    arFLDTAG[18] = faProduct[0].FLDTAG19;
    arFLDTAG[19] = faProduct[0].FLDTAG20;
    arFLDTAG[20] = faProduct[0].FLDTAG21;
    arFLDTAG[21] = faProduct[0].FLDTAG22;
    arFLDTAG[22] = faProduct[0].FLDTAG23;
    arFLDTAG[23] = faProduct[0].FLDTAG24;
    arFLDTAG[24] = faProduct[0].FLDTAG25;
    arFLDTAG[25] = faProduct[0].FLDTAG26;
    arFLDTAG[26] = faProduct[0].FLDTAG27;
    arFLDTAG[27] = faProduct[0].FLDTAG28;
    arFLDTAG[28] = faProduct[0].FLDTAG29;
    arFLDTAG[29] = faProduct[0].FLDTAG30;

    var arFLDTAB = new Array(29);
    arFLDTAB[0] = faProduct[0].FLDTAB1;
    arFLDTAB[1] = faProduct[0].FLDTAB2;
    arFLDTAB[2] = faProduct[0].FLDTAB3;
    arFLDTAB[3] = faProduct[0].FLDTAB4;
    arFLDTAB[4] = faProduct[0].FLDTAB5;
    arFLDTAB[5] = faProduct[0].FLDTAB6;
    arFLDTAB[6] = faProduct[0].FLDTAB7;
    arFLDTAB[7] = faProduct[0].FLDTAB8;
    arFLDTAB[8] = faProduct[0].FLDTAB9;
    arFLDTAB[9] = faProduct[0].FLDTAB10;
    arFLDTAB[10] = faProduct[0].FLDTAB11;
    arFLDTAB[11] = faProduct[0].FLDTAB12;
    arFLDTAB[12] = faProduct[0].FLDTAB13;
    arFLDTAB[13] = faProduct[0].FLDTAB14;
    arFLDTAB[14] = faProduct[0].FLDTAB15;
    arFLDTAB[15] = faProduct[0].FLDTAB16;
    arFLDTAB[16] = faProduct[0].FLDTAB17;
    arFLDTAB[17] = faProduct[0].FLDTAB18;
    arFLDTAB[18] = faProduct[0].FLDTAB19;
    arFLDTAB[19] = faProduct[0].FLDTAB20;
    arFLDTAB[20] = faProduct[0].FLDTAB21;
    arFLDTAB[21] = faProduct[0].FLDTAB22;
    arFLDTAB[22] = faProduct[0].FLDTAB23;
    arFLDTAB[23] = faProduct[0].FLDTAB24;
    arFLDTAB[24] = faProduct[0].FLDTAB25;
    arFLDTAB[25] = faProduct[0].FLDTAB26;
    arFLDTAB[26] = faProduct[0].FLDTAB27;
    arFLDTAB[27] = faProduct[0].FLDTAB28;
    arFLDTAB[28] = faProduct[0].FLDTAB29;
    arFLDTAB[29] = faProduct[0].FLDTAB30;

    var arFLDCOM = new Array(29);
    arFLDCOM[0] = faProduct[0].FLDCOM1;
    arFLDCOM[1] = faProduct[0].FLDCOM2;
    arFLDCOM[2] = faProduct[0].FLDCOM3;
    arFLDCOM[3] = faProduct[0].FLDCOM4;
    arFLDCOM[4] = faProduct[0].FLDCOM5;
    arFLDCOM[5] = faProduct[0].FLDCOM6;
    arFLDCOM[6] = faProduct[0].FLDCOM7;
    arFLDCOM[7] = faProduct[0].FLDCOM8;
    arFLDCOM[8] = faProduct[0].FLDCOM9;
    arFLDCOM[9] = faProduct[0].FLDCOM10;
    arFLDCOM[10] = faProduct[0].FLDCOM11;
    arFLDCOM[11] = faProduct[0].FLDCOM12;
    arFLDCOM[12] = faProduct[0].FLDCOM13;
    arFLDCOM[13] = faProduct[0].FLDCOM14;
    arFLDCOM[14] = faProduct[0].FLDCOM15;
    arFLDCOM[15] = faProduct[0].FLDCOM16;
    arFLDCOM[16] = faProduct[0].FLDCOM17;
    arFLDCOM[17] = faProduct[0].FLDCOM18;
    arFLDCOM[18] = faProduct[0].FLDCOM19;
    arFLDCOM[19] = faProduct[0].FLDCOM20;
    arFLDCOM[20] = faProduct[0].FLDCOM21;
    arFLDCOM[21] = faProduct[0].FLDCOM22;
    arFLDCOM[22] = faProduct[0].FLDCOM23;
    arFLDCOM[23] = faProduct[0].FLDCOM24;
    arFLDCOM[24] = faProduct[0].FLDCOM25;
    arFLDCOM[25] = faProduct[0].FLDCOM26;
    arFLDCOM[26] = faProduct[0].FLDCOM27;
    arFLDCOM[27] = faProduct[0].FLDCOM28;
    arFLDCOM[28] = faProduct[0].FLDCOM29;
    arFLDCOM[29] = faProduct[0].FLDCOM30;

    var arFLDID = new Array(29);
    arFLDID[0] = faProduct[0].FLDID1;
    arFLDID[1] = faProduct[0].FLDID2;
    arFLDID[2] = faProduct[0].FLDID3;
    arFLDID[3] = faProduct[0].FLDID4;
    arFLDID[4] = faProduct[0].FLDID5;
    arFLDID[5] = faProduct[0].FLDID6;
    arFLDID[6] = faProduct[0].FLDID7;
    arFLDID[7] = faProduct[0].FLDID8;
    arFLDID[8] = faProduct[0].FLDID9;
    arFLDID[9] = faProduct[0].FLDID10;
    arFLDID[10] = faProduct[0].FLDID11;
    arFLDID[11] = faProduct[0].FLDID12;
    arFLDID[12] = faProduct[0].FLDID13;
    arFLDID[13] = faProduct[0].FLDID14;
    arFLDID[14] = faProduct[0].FLDID15;
    arFLDID[15] = faProduct[0].FLDID16;
    arFLDID[16] = faProduct[0].FLDID17;
    arFLDID[17] = faProduct[0].FLDID18;
    arFLDID[18] = faProduct[0].FLDID19;
    arFLDID[19] = faProduct[0].FLDID20;
    arFLDID[20] = faProduct[0].FLDID21;
    arFLDID[21] = faProduct[0].FLDID22;
    arFLDID[22] = faProduct[0].FLDID23;
    arFLDID[23] = faProduct[0].FLDID24;
    arFLDID[24] = faProduct[0].FLDID25;
    arFLDID[25] = faProduct[0].FLDID26;
    arFLDID[26] = faProduct[0].FLDID27;
    arFLDID[27] = faProduct[0].FLDID28;
    arFLDID[28] = faProduct[0].FLDID29;
    arFLDID[29] = faProduct[0].FLDID30;

    var arSLFLDID = new Array(29);
    arSLFLDID[0] = faProduct[0].SLFLDID1;
    arSLFLDID[1] = faProduct[0].SLFLDID2;
    arSLFLDID[2] = faProduct[0].SLFLDID3;
    arSLFLDID[3] = faProduct[0].SLFLDID4;
    arSLFLDID[4] = faProduct[0].SLFLDID5;
    arSLFLDID[5] = faProduct[0].SLFLDID6;
    arSLFLDID[6] = faProduct[0].SLFLDID7;
    arSLFLDID[7] = faProduct[0].SLFLDID8;
    arSLFLDID[8] = faProduct[0].SLFLDID9;
    arSLFLDID[9] = faProduct[0].SLFLDID10;
    arSLFLDID[10] = faProduct[0].SLFLDID11;
    arSLFLDID[11] = faProduct[0].SLFLDID12;
    arSLFLDID[12] = faProduct[0].SLFLDID13;
    arSLFLDID[13] = faProduct[0].SLFLDID14;
    arSLFLDID[14] = faProduct[0].SLFLDID15;
    arSLFLDID[15] = faProduct[0].SLFLDID16;
    arSLFLDID[16] = faProduct[0].SLFLDID17;
    arSLFLDID[17] = faProduct[0].SLFLDID18;
    arSLFLDID[18] = faProduct[0].SLFLDID19;
    arSLFLDID[19] = faProduct[0].SLFLDID20;
    arSLFLDID[20] = faProduct[0].SLFLDID21;
    arSLFLDID[21] = faProduct[0].SLFLDID22;
    arSLFLDID[22] = faProduct[0].SLFLDID23;
    arSLFLDID[23] = faProduct[0].SLFLDID24;
    arSLFLDID[24] = faProduct[0].SLFLDID25;
    arSLFLDID[25] = faProduct[0].SLFLDID26;
    arSLFLDID[26] = faProduct[0].SLFLDID27;
    arSLFLDID[27] = faProduct[0].SLFLDID28;
    arSLFLDID[28] = faProduct[0].SLFLDID29;
    arSLFLDID[29] = faProduct[0].SLFLDID30;

    var arFLDTYPE = new Array(29);
    arFLDTYPE[0] = faProduct[0].FLDTYPE1;
    arFLDTYPE[1] = faProduct[0].FLDTYPE2;
    arFLDTYPE[2] = faProduct[0].FLDTYPE3;
    arFLDTYPE[3] = faProduct[0].FLDTYPE4;
    arFLDTYPE[4] = faProduct[0].FLDTYPE5;
    arFLDTYPE[5] = faProduct[0].FLDTYPE6;
    arFLDTYPE[6] = faProduct[0].FLDTYPE7;
    arFLDTYPE[7] = faProduct[0].FLDTYPE8;
    arFLDTYPE[8] = faProduct[0].FLDTYPE9;
    arFLDTYPE[9] = faProduct[0].FLDTYPE10;
    arFLDTYPE[10] = faProduct[0].FLDTYPE11;
    arFLDTYPE[11] = faProduct[0].FLDTYPE12;
    arFLDTYPE[12] = faProduct[0].FLDTYPE13;
    arFLDTYPE[13] = faProduct[0].FLDTYPE14;
    arFLDTYPE[14] = faProduct[0].FLDTYPE15;
    arFLDTYPE[15] = faProduct[0].FLDTYPE16;
    arFLDTYPE[16] = faProduct[0].FLDTYPE17;
    arFLDTYPE[17] = faProduct[0].FLDTYPE18;
    arFLDTYPE[18] = faProduct[0].FLDTYPE19;
    arFLDTYPE[19] = faProduct[0].FLDTYPE20;
    arFLDTYPE[20] = faProduct[0].FLDTYPE21;
    arFLDTYPE[21] = faProduct[0].FLDTYPE22;
    arFLDTYPE[22] = faProduct[0].FLDTYPE23;
    arFLDTYPE[23] = faProduct[0].FLDTYPE24;
    arFLDTYPE[24] = faProduct[0].FLDTYPE25;
    arFLDTYPE[25] = faProduct[0].FLDTYPE26;
    arFLDTYPE[26] = faProduct[0].FLDTYPE27;
    arFLDTYPE[27] = faProduct[0].FLDTYPE28;
    arFLDTYPE[28] = faProduct[0].FLDTYPE29;
    arFLDTYPE[29] = faProduct[0].FLDTYPE30;

    var arFLDREGEX = new Array(29);
    arFLDREGEX[0] = faProduct[0].FLDREGEX1;
    arFLDREGEX[1] = faProduct[0].FLDREGEX2;
    arFLDREGEX[2] = faProduct[0].FLDREGEX3;
    arFLDREGEX[3] = faProduct[0].FLDREGEX4;
    arFLDREGEX[4] = faProduct[0].FLDREGEX5;
    arFLDREGEX[5] = faProduct[0].FLDREGEX6;
    arFLDREGEX[6] = faProduct[0].FLDREGEX7;
    arFLDREGEX[7] = faProduct[0].FLDREGEX8;
    arFLDREGEX[8] = faProduct[0].FLDREGEX9;
    arFLDREGEX[9] = faProduct[0].FLDREGEX10;
    arFLDREGEX[10] = faProduct[0].FLDREGEX11;
    arFLDREGEX[11] = faProduct[0].FLDREGEX12;
    arFLDREGEX[12] = faProduct[0].FLDREGEX13;
    arFLDREGEX[13] = faProduct[0].FLDREGEX14;
    arFLDREGEX[14] = faProduct[0].FLDREGEX15;
    arFLDREGEX[15] = faProduct[0].FLDREGEX16;
    arFLDREGEX[16] = faProduct[0].FLDREGEX17;
    arFLDREGEX[17] = faProduct[0].FLDREGEX18;
    arFLDREGEX[18] = faProduct[0].FLDREGEX19;
    arFLDREGEX[19] = faProduct[0].FLDREGEX20;
    arFLDREGEX[20] = faProduct[0].FLDREGEX21;
    arFLDREGEX[21] = faProduct[0].FLDREGEX22;
    arFLDREGEX[22] = faProduct[0].FLDREGEX23;
    arFLDREGEX[23] = faProduct[0].FLDREGEX24;
    arFLDREGEX[24] = faProduct[0].FLDREGEX25;
    arFLDREGEX[25] = faProduct[0].FLDREGEX26;
    arFLDREGEX[26] = faProduct[0].FLDREGEX27;
    arFLDREGEX[27] = faProduct[0].FLDREGEX28;
    arFLDREGEX[28] = faProduct[0].FLDREGEX29;
    arFLDREGEX[29] = faProduct[0].FLDREGEX30;

    return {
      arFLDTAG,
      arFLDTAB,
      arFLDCOM,
      arFLDID,
      arSLFLDID,
      arFLDTYPE,
      arFLDREGEX
    };
  }
  
  function createArrGENDTAB(gendtab) {
    var arFLDID = new Array(14);
    arFLDID[0] = gendtab[0].FLDID1;
    arFLDID[1] = gendtab[0].FLDID2;
    arFLDID[2] = gendtab[0].FLDID3;
    arFLDID[3] = gendtab[0].FLDID4;
    arFLDID[4] = gendtab[0].FLDID5;
    arFLDID[5] = gendtab[0].FLDID6;
    arFLDID[6] = gendtab[0].FLDID7;
    arFLDID[7] = gendtab[0].FLDID8;
    arFLDID[8] = gendtab[0].FLDID9;
    arFLDID[9] = gendtab[0].FLDID10;
    arFLDID[10] = gendtab[0].FLDID11;
    arFLDID[11] = gendtab[0].FLDID12;
    arFLDID[12] = gendtab[0].FLDID13;
    arFLDID[13] = gendtab[0].FLDID14;
    arFLDID[14] = gendtab[0].FLDID15;

    var arValueID = new Array(14);
    arValueID[0] = gendtab[0].ValueID1;
    arValueID[1] = gendtab[0].ValueID2;
    arValueID[2] = gendtab[0].ValueID3;
    arValueID[3] = gendtab[0].ValueID4;
    arValueID[4] = gendtab[0].ValueID5;
    arValueID[5] = gendtab[0].ValueID6;
    arValueID[6] = gendtab[0].ValueID7;
    arValueID[7] = gendtab[0].ValueID8;
    arValueID[8] = gendtab[0].ValueID9;
    arValueID[9] = gendtab[0].ValueID10;
    arValueID[10] = gendtab[0].ValueID11;
    arValueID[11] = gendtab[0].ValueID12;
    arValueID[12] = gendtab[0].ValueID13;
    arValueID[13] = gendtab[0].ValueID14;
    arValueID[14] = gendtab[0].ValueID15;

    var arValueDesc = new Array(14);
    arValueDesc[0] = gendtab[0].ValueDesc1;
    arValueDesc[1] = gendtab[0].ValueDesc2;
    arValueDesc[2] = gendtab[0].ValueDesc3;
    arValueDesc[3] = gendtab[0].ValueDesc4;
    arValueDesc[4] = gendtab[0].ValueDesc5;
    arValueDesc[5] = gendtab[0].ValueDesc6;
    arValueDesc[6] = gendtab[0].ValueDesc7;
    arValueDesc[7] = gendtab[0].ValueDesc8;
    arValueDesc[8] = gendtab[0].ValueDesc9;
    arValueDesc[9] = gendtab[0].ValueDesc10;
    arValueDesc[10] = gendtab[0].ValueDesc11;
    arValueDesc[11] = gendtab[0].ValueDesc12;
    arValueDesc[12] = gendtab[0].ValueDesc13;
    arValueDesc[13] = gendtab[0].ValueDesc14;
    arValueDesc[14] = gendtab[0].ValueDesc15;
    

    return {
      arFLDID,
      arValueID,
      arValueDesc
    };
  }

  function createSI(faCoverageDet) {
    var SiDefault = new Array(9);
    var SiLabel = new Array(9);
    var SiF = new Array(9);

    SiDefault[0] = faCoverageDet[0].SI1Default;
    SiLabel[0] = faCoverageDet[0].SI1Label;
    SiF[0] = faCoverageDet[0].SI1stF;
    SiDefault[1] = faCoverageDet[0].SI2Default;
    SiLabel[1] = faCoverageDet[0].SI2Label;
    SiF[1] = faCoverageDet[0].SI2ndF;
    SiDefault[2] = faCoverageDet[0].SI3Default;
    SiLabel[2] = faCoverageDet[0].SI3Label;
    SiF[2] = faCoverageDet[0].SI3rdF;
    SiDefault[3] = faCoverageDet[0].SI4Default;
    SiLabel[3] = faCoverageDet[0].SI4Label;
    SiF[3] = faCoverageDet[0].SI4thF;
    SiDefault[4] = faCoverageDet[0].SI5Default;
    SiLabel[4] = faCoverageDet[0].SI5Label;
    SiF[4] = faCoverageDet[0].SI5thF;
    SiDefault[5] = faCoverageDet[0].SI6Default;
    SiLabel[5] = faCoverageDet[0].SI6Label;
    SiF[5] = faCoverageDet[0].SI6thF;
    SiDefault[6] = faCoverageDet[0].SI7Default;
    SiLabel[6] = faCoverageDet[0].SI7Label;
    SiF[6] = faCoverageDet[0].SI7thF;
    SiDefault[7] = faCoverageDet[0].SI8Default;
    SiLabel[7] = faCoverageDet[0].SI8Label;
    SiF[7] = faCoverageDet[0].SI8thF;
    SiDefault[8] = faCoverageDet[0].SI9Default;
    SiLabel[8] = faCoverageDet[0].SI9Label;
    SiF[8] = faCoverageDet[0].SI9thF;
    SiDefault[9] = faCoverageDet[0].SI10Default;
    SiLabel[9] = faCoverageDet[0].SI10Label;
    SiF[9] = faCoverageDet[0].SI10thF;
    return {
      SiF,
      SiDefault,
      SiLabel
    };
  }

  $("#BtnPremiumSimulation").click(function(event){
    event.preventDefault();
    try{
      $("#loadMe").modal('show');
    
      $.ajax({
      type: "POST",
      url: "{{ route('policy.premiumSimulation') }}", // This is what I have updated
      data: $("#form-policy").serialize(),
      }).done(function( response ) {
        var statuscode = response.code;
        var statusmessage = response.message;
        // console.log(response);
          if (response.code == '200'){
            // console.log(response.data[0]['SPremium']);
            var premium = 0;
            var spremium = '';
            var holdmessage = '';
            for (i=0; i < response.data.length; i++){
              if (response.data[i]['HoldMessage'] != ''){
                if (holdmessage == ''){
                  holdmessage = 'Policy is Hold : ' + response.data[i]['HoldMessage'];
                }else{
                  holdmessage = holdmessage + response.data[i]['HoldMessage'];
                }
              }

              premium = premium + response.data[i]['Premium'];
              if (spremium == ''){
                spremium = response.data[i]['Risk'] + ' : ' + response.data[i]['SPremium'];
              }else{
                spremium = spremium + '\n' + response.data[i]['Risk'] + ' : ' + response.data[i]['SPremium'];
              }

              if (response.data[i]['RATE_SOURCE'] != '') {
                $('#' + response.data[i]['RATE_SOURCE']).val(response.data[i]['Rate']); 
              }
            }
            // console.log($('#DiscPCT').val());
            if ($('#DiscPCT').val() != 0){
              var discount = (premium * $('#DiscPCT').val() / 100);
              $('#Discount').val(discount);
              var totalpremium = premium + response.data[0]['AdmFee'] + response.data[0]['StampDuty'] - discount;
            }else{
              var totalpremium = premium + response.data[0]['AdmFee'] + response.data[0]['StampDuty'];
            }
            // console.log(totalpremium);
            $('#Premium').val(number_format(premium,2,',','.'));
            $('#AdmFee').val(response.data[0]['AdmFee']);
            $('#StampDuty').val(response.data[0]['StampDuty']);
            $('#TxtTotalPremium').val(number_format(totalpremium,2,',','.'));
            $('#SPremium').val(spremium);
            // if (holdmessage != ''){
            //   statuscode = '400';
            //   statusmessage = holdmessage;
            // }
          }
          $("#loadMe").modal("hide");
          toastMessage(statuscode,statusmessage);
      }).fail(function(xhr, status, error){
        throw error;
      }); 
    }catch(err){
      $("#loadMe").modal("hide");
      toastMessage('400',err);
    }
  });

  $('#DiscPCT').change(function(event){
    if ($('#DiscPCT').val() > 100) {
      $('#DiscPCT').val(0);
      $('#Discount').val(0);
      $('#TxtTotalPremium').val($('#Premium').val());
      toastMessage('400',"Invalid discount percentage ! Discount can't be greater than 100%.");
    }else{
      if ($('#Premium').val() != '' && $('#Premium').val() != '0'){
        var premium = $('#Premium').val().replace(/\,/g,'');
        var discountPCT = $('#DiscPCT').val();
        var discount = premium * discountPCT / 100;
        $('#Discount').val(number_format(discount,2,',','.'));
        $('#TxtTotalPremium').val(number_format((parseInt(premium) - parseInt(discount)),2,',','.'));
        if($('#DiscPCT').val() == '0'){
          $('#TxtTotalPremium').val($('#Premium').val());
        }
      }
    }
  });

  $('#Discount').change(function(){
    if ($('#Premium').val() != '' && $('#Premium').val() != '0'){
      var premium = $('#Premium').val().replace(/\,/g,'');
      var discount = ($('#Discount').val()) == '' ? 0 : $('#Discount').val().replace(/\,/g,'');
      // console.log(premium);
      $('#DiscPCT').val(discount / premium * 100);
      if ($('#DiscPCT').val() > 100){
        $('#DiscPCT').val(0);
        $('#Discount').val(0);
        $('#TxtTotalPremium').val($('#Premium').val());
        toastMessage('400',"Invalid discount percentage ! Discount can't be greater than 100%.");
      }else{
        var totalpremi = $('#TxtTotalPremium').val().replace(/\,/g,'');
        $('#TxtTotalPremium').val(number_format(parseInt(totalpremi) - parseInt(discount),2,',','.'));
        if($('#Discount').val() == 0){
          $('#TxtTotalPremium').val($('#Premium').val());
        }
      }
    }
  });

  $('#Fee_1').change(function(event){
    if ($('#Fee_1').val() > 100) {
      $('#Fee_1').val(0);
      $('#FeeAmount_1').val(0);
      toastMessage('400',"Invalid commission percentage ! Commission can't be greater than 100%.");
    }else{
      if ($('#Premium').val() != '' && $('#Premium').val() != '0'){
        var premium = $('#Premium').val().replace(/\,/g,'');
        var commPct = $('#Fee_1').val();
        // console.log(premium);
        // console.log(commPct);
        $('#FeeAmount_1').val(number_format(premium * commPct / 100,2,',','.'));
      }
    }
  });

  $('#FeeAmount_1').change(function(){
    if ($('#Premium').val() != '' && $('#Premium').val() != '0'){
      var premium = $('#Premium').val().replace(/\,/g,'');
      var feeamount = ($('#FeeAmount_1').val()) == '' ? 0 : $('#FeeAmount_1').val().replace(/\,/g,'');
      console.log(premium);
      $('#Fee_1').val(feeamount / premium * 100);
      if ($('#Fee_1').val() > 100){
        $('#Fee_1').val(0);
        $('#FeeAmount_1').val(0);
        toastMessage('400',"Invalid commission percentage ! Commission can't be greater than 100%.");
      }else{
        if($('#Discount').val() == 0){
          $('#TxtTotalPremium').val($('#Premium').val());
        }
      }
    }
  });

  $('#BtnPolicyNo').click(function(event){
    event.preventDefault();

    $("#loadMe").modal('show');

    $.ajax({
    type: "POST",
    url: "{{ route('policy.getnewpolicyno') }}", 
    data: $("#form-policy").serialize(),
    }).done(function( response ) {
      console.log(response);
        $("#loadMe").modal("hide");
        $('#PolicyNo').val(response.PolicyNo);
        toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
        $("#loadMe").modal("hide");
        toastMessage('400',error);
    }); 
    // toastMessage('400','This Function Not Ready');
  });

  function validateRequired(){
    // form.classList.remove('was-validated');
    for (i=0; i < stepperPanList.length; i++){
      // console.log(stepperPanList.length);
      var flagRequired
      var flagRegex;
      var stepperPan = stepperPanList[i]
      // console.log(stepperPan);
      var fieldrequired = [].slice.call(stepperPan.querySelectorAll("[required]"));
      // console.log(fieldrequired);
      var fieldregex = [].slice.call(stepperPan.querySelectorAll("[data-regex]"));
      // console.log(fieldregex)
      fieldrequired.every(function (field) {
        if (!field.value.length){      
          window.stepperForm.to(i + 1);
          field.focus();
          event.preventDefault();
          field.classList.add('is-invalid');
          field.setAttribute('onchange','validation_check(this,this.value)')
          // form.classList.add('was-validated');
          flagRequired = true;
          return false;
        }else{
          flagRequired = false;
          return true;
        }
      });
      if (flagRequired){
        break;
      }
      //   return false;
      //   break;
      fieldregex.every(function (field) {
        var exp = field.getAttribute("data-regex");
        var value = field.value;
        if (field.getAttribute('style') == 'text-transform:uppercase'){
          value = value.toUpperCase();
        }
        if (checkRegex(value,exp)){
          // console.log('true');
          field.classList.remove('is-invalid');
          flagRegex = false;
          return true;
        }else{
          // console.log('false');
          window.stepperForm.to(i + 1);
          field.focus();
          event.preventDefault();
          field.classList.add('is-invalid');
          // form.classList.add('was-validated');
          flagRegex = true;
          return false;
        }
        // console.log(field.getAttribute("data-regex"));
      });
    }
    if (flagRequired){
      return true;
    }else{
      if (flagRegex){
        return true;
      }else{
        return false;
      }
    }
    // return true;
  }

  $('#img-btn-save').click(function(event){
    // console.log(clausula);
    try{
      event.preventDefault();
      // console.log('haha');
      $("#loadMe").modal('show');

      var asd = document.getElementById('InforceF');

      // $('#InforceF').removeAttr('disabled');
      if (validateRequired()){
        // console.log('true');
        throw '';
      }
      var deductible = tblDeductible.$('input, select').serialize();
      var clausula = tblClausula.$('input').serialize();
      var full = $("#form-policy").serialize() + '&' + deductible + '&' + clausula;
      // console.log($("#form-policy").serialize());
      
      $.ajax({
        type: "POST",
        url: "{{ route('policy.savepolicy') }}", 
        data: full,
      }).done(function( response ) {
        // console.log(response);
        if (response.code == '200'){
          // tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
          removeRowTable(tblInquiry, response.data[0]['PID']);
          tblInquiry.rows.add(response.listpolicy.Data).draw();
          $('#PID').val(response.data[0]['PID']);
          $('#TxtRefNo').val(response.data[0]['RefNo']);
          $('#PStatus').val('Request');
          refreshButton(true);
          DisableElement($('#img-btn-revise'));
          viewDetail(response.listpolicy.Data);
          DisableElement($('InforceF'));
          var cbxNeedEsignF = document.getElementById("NeedESignF");
          var cbxEsignF = document.getElementById("EsignF");
          $('#img-btn-revise').attr("disabled","disabled");
          if (cbxNeedEsignF.checked == true && cbxEsignF.checked == false) {
            DisableElement($('#img-btn-submit'));
          }else{
            // $('#img-btn-submit').removeAttr("disabled");
            EnableElement($('#img-btn-submit'));
          }
          // if (response.code == '200'){
          //   EnableElement($('#img-btn-save'));
          // }else{
          //   DisableElement($('#img-btn-save'));
          // }
          // console.log($('#NeedESignF').checked());
          // $('#tabinquiry').attr("class","nav-link active");
          // $('#tabpolicy').attr("class","nav-link");
          // $('#inquiry').attr("class","active tab-pane");
          // $('#policy').attr("class","tab-pane");
        }else{
          DisableElement($('#img-btn-submit'));
        }
        $("#loadMe").modal("hide");
        toastMessage(response.code,response.message);
      }).fail(function(xhr, status, error){
        // $('#InforceF').attr('disabled','disabled');
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        $("#loadMe").modal("hide");
        toastMessage('400',error);
      }); 
    }catch(err){
      $("#loadMe").modal("hide");
    }
    // if (validateRequired()){
    //   $("#loadMe").modal("hide");
    // }else{
      
    // }
  });

  $('#img-btn-submit').click(function(event){
    event.preventDefault();
    var SubmitDateF = document.getElementById('SubmitDateF');

    Swal.fire({
      // input: 'checkbox',
      title: 'Are you sure to submit the data?',
      confirmButtonColor: '#0d6efd',
      showCancelButton: true,
      showLoaderOnConfirm: true,
      preConfirm: (value) => {
        return new Promise(function(resolve, reject) {
          $.ajax({
            type: "POST",
            url: "{{ route('policy.submitpolicy') }}", 
            data: {
                PID: $('#PID').val(),
                SubmitDateF: SubmitDateF.checked,
                RefNo: $('#RefNo').val(),
                BookPolicyNo: false,
                _token: _token
              },
          }).done(function( response ) {
            console.log(response);
            // resolve();
            if (response.code == '200'){
              // resolve({data: response.data, listpolicy: response.listpolicy.Data}); 
              resolve();
            }else{
              reject(new Error(response.message));
            }
            // var policyno;
            // if (response.code == '200'){
            //   tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
            //   $('#PolicyNo').val(response.data[0]['PolicyNO']);
            //   policyno = response.data[0]['PolicyNO'];
            //   $('#PStatus').val('Process');
            //   refreshButton(false);
            //   disableAll();
            // }
            // $("#loadMe").modal("hide");
            // toastMessage(response.code,response.message);
            // resolve({
            //   policyno: policyno
            // });
          }).fail(function(xhr, status, error){
            var message = xhr.responseJSON['message'];
            reject(new Error(message));
            // toastMessage('400',error);
          }); 
        }).catch(error => {
          Swal.showValidationMessage(
            `${error}`
          )
        })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'SPPA Successfully Submitted.',
          text: 'The SPPA Under Review, Please Wait a Moment ...',
          // html: html,/
          didOpen: () => {
            Swal.showLoading();
            // await sleep(5000);
            return new Promise(async function(resolve, reject) {
              var url = "{{ route('policy.getdetail') }}?PID=" + $('#PID').val()
              var Policy;
              var jobPolicy;
              for (i=0; i < 5; i++){
                // console.log('loop - ' + i);
                var res = await getData(url);
                // console.log(res);
                Policy = res.Data;
                jobPolicy = res.Data[0].PolicyJob;
                if (jobPolicy[0].ANO != -1){
                  // console.log(jobPolicy);
                  break;
                }
                await sleep(4);
                // console.log('after sleep');
              }

              // var response = result.value.data;
              // var listpolicy = result.value.listpolicy;
              var message;
              var icon;
              console.log(Policy);
              if (jobPolicy[0].ANO != -1){
                if (jobPolicy[0].ASTATUS == 'I'){
                  icon = 'success';
                  message = "Approved.";  
                }else{
                  icon = 'info';
                  message = "Need Approval From Product Owner.";
                }
              }else{
                icon = 'info';
                message = "Approval Still Processing.";
              }

              var policyno = jobPolicy[0].POLICYNO;
              console.log('polis no : ' + policyno);
              if (policyno == ''){
                policyno = '-';
              }
              var RefNo = $('#RefNo').val();
              // console.log(listpolicy);
              removeRowTable(tblInquiry, Policy[0]['PID']);
              tblInquiry.rows.add(Policy).draw();
              // tblInquiry.clear().rows.add(listpolicy).draw();
              $('#PolicyNo').val(policyno);
              $('#PStatus').val('Process');
              refreshButton(false);
              disableAll();
              $('#Payment_Tenor').trigger('change');
              var html = '<table style="width:100%"><tbody><tr><td style="text-align:left;padding-left:10%">Policy Number</td><td>:</td><td style="text-align:left;padding-left:5%">'+ policyno +'</td></tr><tr><td style="text-align:left;padding-left:10%">Reference Number</td><td>:</td><td style="text-align:left;padding-left:5%">'+ $('#RefNo').val(); +'</td></tr></tbody></table>'
              Swal.fire({
                icon: icon,
                title: 'SPPA Successfully Submitted and ' + message,
                // text: 'Policy Number : ' + policyno,
                html: html,
              })
            }).catch(error => {
              Swal.showValidationMessage(
                `${error}`
              )
            })
          },
          allowOutsideClick: () => !Swal.isLoading()
        })
      }
    })
  });

  function EnableElement(element){
    // console.log('masuk ke enable');
    // console.log(btn);
    element.removeAttr('disabled');
  }

  function DisableElement(element){
    // console.log('masuk ke disable');
    // console.log(btn);
    element.attr('disabled','disabled');
  }

  function disableAll(){
    $('#form-policy').find('input,select,button').each(function(){
      if ($(this).attr('name') != '_token' && 
      $(this).attr('class') != $('.btn-next-form').attr('class') && 
      $(this).attr('class') != $('.btn-prev-form').attr('class') &&
      $(this).attr('class') != $('.page-item').attr('class') &&
      $(this).attr('class') != 'step-trigger' &&
      $(this).attr('id') != 'img-btn-clear' &&
      $(this).attr('type') != 'search' &&
      $(this).attr('id') != 'img-btn-preview'
      )
      {
        $(this).attr('disabled','disabled');
      }
    });
  }

  function enableAll(){
    $('#form-policy').find('input,select,button').each(function(){
      if (
        // $(this).attr('name') != '_token' && 
        // $(this).attr('class') != $('.btn-next-form').attr('class') && 
        // $(this).attr('class') != $('.btn-prev-form').attr('class') &&
        // $(this).attr('class') != $('.page-item').attr('class') &&
        // $(this).attr('type') != 'search'
        $(this).attr('class') != $('.CoverageCode').attr('class') &&
        $(this).attr('name') != 'TxtRegDate' &&
        $(this).attr('name') != 'CbxESign' &&
        $(this).attr('name') != 'CbxAutoInforce' &&
        $(this).attr('name') != 'DisabledNeedSurveyF' &&
        $(this).attr('name') != 'DisabledCbxNeedEsignF'
      )
      {
        $(this).removeAttr('disabled','disabled');
      }
    });
  }

  $('#img-btn-preview').click(function(event){
    // toastMessage('400','The Function Is Not Ready');
    event.preventDefault();

    // popupToast('select','Pilih Dokumen','','PolicyNo',false);

    Swal.fire({
      input: 'select',
      inputLabel: 'Pilih Dokumen',
      // inputPlaceholder: inputPlaceholder,
      inputOptions: {
          sppa: 'SPPA Document',
          quotation: 'Quotation'
      },
      confirmButtonColor: '#0d6efd',
      // inputValue: $('#' + elementID).val(),
      // inputAttributes: attributes,
      showCancelButton: true,
      showLoaderOnConfirm: true,
      preConfirm: (value) => {
        return new Promise(function(resolve, reject) {
          var PID = $('#PID').val();
          var refno = $('#RefNo').val();
          $.ajax({
            type: "POST",
            url: "{{ route('docpreview') }}", 
            data: {
              PID: PID,
              RefNo: refno,
              Document: value,
              _token: _token
            },
            }).done(function(msg) {
              console.log(msg);
              if (msg.code == '200'){
                openInNewTab(msg.Data);
                resolve({
                  msg : msg
                });
              }else{
                reject(new Error(msg.message));
              }
              // return msg;
            }).fail(function(xhr, status, error) {
              console.log(xhr);
              // $("#loadMe").modal("hide");
              var message = xhr.responseJSON['message'];
              reject(new Error(message));
              // toastMessage('400',message)
          });
        }).catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      console.log(result);
    })
  })

  function openInNewTab(url) {
    // console.log(url);
    let pdfWindow = window.open("");

    var baseurl = "<iframe width='100%' height='100%' src='data:application/pdf;base64,"+ url +"'></iframe>";
    console.log(baseurl);
    pdfWindow.document.write(baseurl, '_blank');
    // var win = window.open(url, '_blank');
    // win.focus();
  }

  $('#img-btn-clear').click(function(event){
    $("#loadMe").modal('show');
    arrPolicy = [];
    enableAll();
    $('#img-btn-send').attr("disabled","disabled");
    $('#img-btn-preview').attr("disabled","disabled");
    $('#img-btn-revise').attr("disabled","disabled");
    $('#img-btn-submit').attr("disabled","disabled");
    event.preventDefault();
    $('#form-policy').find('input').each(function(){
      if ($(this).attr('name') != '_token'){
        if ($(this).attr('type') != 'checkbox'){
          $(this).val('');
        }else{
          // console.log('key : ' + $(this).attr('id') + 'Namanya : ' + $(this).attr('name') + 'typenya : ' + $(this).attr('type'));
          // $(this).removeAttr('checked');
          if ($(this).attr('name') != 'DisabledNeedSurveyF' && $(this).attr('name') != 'DisabledCbxNeedEsignF')
          document.getElementById($(this).attr('id')).checked = false;
        }
      }
    });
    $('#PStatus').val('Request');
    $('#SPremium').val('');
    $('#form-policy').find('select').each(function(){
      $(this).prop('selectedIndex', 0);
    });
    $('#Currency').val('IDR');
    SubmitDateF_Checked();
    Product_OnChange($('#ProductID').val());
    checkPrivilegesByPassESign();
    $('#PID').val('-1');
    $('#RegDate').val(getformatedDate());
    $('#tblPolDocUpload').empty();
    $('.select2bs4').trigger('change');
    $('#CommByAmount').trigger('click');
    $("#loadMe").modal("hide");
  });

  function refreshButton(flag){
    if (flag){
      $('.btn-upload').removeAttr("disabled");
      $('#BtnAddCert').removeAttr("disabled");
      // $('#BtnPayment').removeAttr("disabled");
      // $('#img-btn-preview').removeAttr("disabled");
      $('#img-btn-send').removeAttr("disabled");
      $('#img-btn-revise').removeAttr("disabled");
      $('#img-btn-submit').removeAttr("disabled");
    }else{
      $('.btn-upload').attr("disabled","disabled");
      $('#BtnAddCert').attr("disabled","disabled");
      // $('#BtnPayment').attr("disabled","disabled");
      // $('#img-btn-preview').attr("disabled","disabled");
      $('#img-btn-send').attr("disabled","disabled");
      $('#img-btn-revise').attr("disabled","disabled");
      $('#img-btn-submit').attr("disabled","disabled");
    }
  }

  async function viewPolicy(PID){
    callback_PID = PID;
    $('#tabpolicy').tab('show');
  }

  function viewDetail(data){
    enableAll();
    arrPolicy = data;
    // var table = $('#tblInquiryPolicy').DataTable();
    // var data = table.rows().data();
    // const arrPolFilter = data.filter(pol => pol.PID == PID);
    const arrPolFilter = data;
    $('#PID').val(arrPolFilter[0]['PID']);
    $('#ProductID').val(arrPolFilter[0]['ProductID']);
    $('#ProductID').trigger('change');
    $('#CoverageID').val(arrPolFilter[0]['CoverageID']);
    $('#CoverageID').trigger('change');
    // console.log(arrPolFilter);
    parseDataToInput(arrPolFilter);
    drawDataTablePolDoc(data[0]['PolicyDocs']);

    //calculate total premium
    let Premium = parseInt(arrPolFilter[0]['Premium']);
    let AdmFee = parseInt(arrPolFilter[0]['ADMFee']);
    let StampDuty = parseInt(arrPolFilter[0]['StampDuty']);
    let Discount = parseInt(arrPolFilter[0]['Discount']);
    $('#TxtTotalPremium').val(number_format(Premium + AdmFee + StampDuty - Discount,2,',','.'));
    // $('.num-format').val(number_format($(this),2,',','.'));

    //Check status for button disable or not
    Check_CommissionBy(arrPolFilter);
    var cbxNeedEsignF = document.getElementById("NeedESignF");
    var cbxEsignF = document.getElementById("EsignF");
    var PStatus = arrPolFilter[0]['PStatus'];
    if (PStatus == 'R'){
      refreshButton(true);
      // enableAll();
      $('#img-btn-revise').attr("disabled","disabled");
      if (cbxNeedEsignF.checked == true && cbxEsignF.checked == false) {
        $('#img-btn-submit').attr("disabled","disabled");
      }else{
        // $('#img-btn-submit').removeAttr("disabled");
        DisableElement($('#img-btn-submit'));
        $('#img-btn-send').attr("disabled","disabled");
      }
      // $('#img-btn-preview').attr('disabled','disabled');
      // if (cbxNeedEsignF.checked == true) {
      //   $('#img-btn-send').removeAttr("disabled");
      //   if (cbxEsignF.checked == false){
      //     $('#img-btn-submit').attr("disabled","disabled");
      //   }
      // }else{
      //   $('#img-btn-send').attr("disabled","disabled");
      //   $('#img-btn-submit').removeAttr("disabled"); 
      // }
    }else if (PStatus == 'T'){
      disableAll();
      
      $('#img-btn-revise').removeAttr("disabled");
      // $('#img-btn-submit').removeAttr("disabled");
      $('#img-btn-send').removeAttr("disabled");
      $('#img-btn-preview').removeAttr('disabled');
      if (cbxNeedEsignF.checked == true && cbxEsignF.checked == false) {
        $('#img-btn-submit').attr("disabled","disabled");
      }else{
        // $('#img-btn-submit').removeAttr("disabled"); 
      }
    }else if (PStatus == 'S'){
      disableAll();
      if (cbxNeedEsignF.checked == true && cbxEsignF.checked == true) {
        $('#img-btn-send').attr("disabled","disabled");
      }else{
        $('#img-btn-send').removeAttr("disabled"); 
      }
      $('#img-btn-preview').removeAttr('disabled');
      $('#img-btn-clear').removeAttr("disabled");
      $('#img-btn-revise').removeAttr("disabled");
      if (cbxNeedEsignF.checked == true && cbxEsignF.checked == false) {
        DisableElement($('#img-btn-submit'));
      }else{
        EnableElement($('#img-btn-submit'))
      }
    }else{
      disableAll();
      $('#img-btn-clear').removeAttr("disabled");
      // if (cbxNeedEsignF.checked == true && cbxEsignF.checked == false) {
      //   $('#img-btn-submit').attr("disabled","disabled");
      // }else{
      //   $('#img-btn-submit').removeAttr("disabled"); 
      // }
      $('#img-btn-preview').removeAttr('disabled');
      var PolicyNo = $('#PolicyNo').val();
      if (PolicyNo == '' && arrPolFilter[0]['PStatus'] == 'P'){
        $('#PolicyNo').val(arrPolFilter[0]['PolicyJob'][0]['POLICYNO']);
      }
    }
    $('#Payment_Tenor').trigger('change');
    checkPrivilegesByPassESign();
    SubmitDateF_Checked();
    Segment_OnChange($('#Segment').val());
    checkClausulaPolicy(arrPolFilter);
    // $('#DisabledNeedESignF').attr('disabled','disabled');
    toastMessage('200','Data Successfully Retrivied');
  }

  $('.btn-upload').click(function(event){
    event.preventDefault();

    $('#class-modal-dialog').attr('class','modal-dialog modal-md');
    
    $('#modaltitle').text('Upload Document / Photo');
    
    $('#modalbody').empty();

    $('#modalfooter').empty();
    // $('#modalfooter').css("border","block");
    
    $.ajax({
    type: "GET",
    url: "{{ route('policy.modalupload') }}",
    dataType: 'html'
    }).done(function( response ) {
        // $('#loadMe').modal('hide');
        $('#modalbody').html(response);
        // $('#modalfooter').css('border','none');
        // $("#modal-general").modal('show');
        $('#modal-general').modal({
          keyboard: false,
          backdrop: 'static',
          show: true
        })
    });
  });

  function delPolDoc(PID,ImageID){
    let _token = $('meta[name="csrf-token"]').attr('content');
    // console.log(tblInquiry.cell(PID,1).data());
    // // var colIndex = tblInquiry.cell(PID).index().column;
    // // var rowIndex = tblInquiry.cell(PID).index().row;
    // // tblInquiry.row(PID).remove().draw();
        
    $("#loadMe").modal('show');

    $.ajax({
      type: "POST",
      url: "{{ route('policy.dropdocument') }}", 
      data: {
          PID: PID,
          ImageID: ImageID,
          _token: _token
        },
    }).done(function( response ) {
      console.log(response);
      if (response.code == '200'){
        drawDataTablePolDoc(response.listpolicy.Data[0]['PolicyDocs']);
      }
      // // $('#tblInquiryPolicy').DataTable().ajax.reload();
      $("#loadMe").modal("hide");
      toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
      console.log(xhr);
      $("#loadMe").modal("hide");
      toastMessage('400',error);
    }); 
  }

  function drawDataTablePolDoc(PolDoc){
    tblDoc.clear().draw();
    for (i=0; i < PolDoc.length; i++){
      tblDoc.row.add([
        // i + 1,
        '',
        '<span class="preview"><img class"preview-doc-policy" onclick="previewDoc(this)" src="data:image/png;base64,'+ PolDoc[i]['ImageString'] +'" alt="test" style="width:80px;height:80px;"></span></td>',
        PolDoc[i]['FileType'],
        PolDoc[i]['Title'],
        PolDoc[i]['Remark'],
        '<a href="#"><img src="{{asset("dist/img/trash.svg")}}" onclick="delPolDoc('+ PolDoc[i]['PID'] +','+ PolDoc[i]['ImageID'] +')"  width="30" height="30" type="button" class="btn-del-row"></a>'
      ]).draw(); 
    }
  }
  
  function previewDoc(img){
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;

    var span = document.getElementsByClassName("close-img")[0];
    console.log(span);

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      console.log("asd");
      modal.style.display = "none";
    }
  }

  function parseDataToInput(polArray){
    // console.log(polArray);
    for (var key in polArray[0]) {
      // console.log('key : ' + key + ', type : ' + $('#' + key).attr('type'));
      if (key == 'PStatus'){
        if (polArray[0][key] == 'R'){
          $('#' + key).val('Request');  
        }else if (polArray[0][key] == 'P'){
          $('#' + key).val('Process');
        }else if (polArray[0][key] == 'T'){
          $('#' + key).val('Temporarily Process');
        }else if (polArray[0][key] == 'C'){
          $('#' + key).val('Closed');
        }else if (polArray[0][key] == 'S'){
          $('#' + key).val('Submit Confirmation');
        }else{
          $('#' + key).val(polArray[0][key]);  
        }
      }else if($('#' + key).attr('type') == 'checkbox'){
        // console.log('key : ' + key + ' , Value : ' + polArray[0][key]);
        if (polArray[0][key] == true || polArray[0][key] == $('#' + key).val()){
          document.getElementById(key).checked = true;
          // $('#' + key).attr('checked','checked');
        }else{
          if (typeof $('#' + key).attr('disabled') == undefined || $('#' + key).attr('disabled') == ''){
            document.getElementById(key).checked = false;
          // $('#' + key).removeAttr('checked');
          }
        }
      }
      else if($('#' + key).is('select')){
        if ($('#' + key).val() != polArray[0][key]){
          // $('#' + key).val(polArray[0][key]);
          // var x = document.querySelectorAll('#' + key);
          for (i = 0; i < document.querySelectorAll('#' + key).length; i++) {
            document.querySelectorAll('#' + key)[i].value = polArray[0][key];
          }
          $('#' + key).trigger('change');
        }
      }else{
        if ($('#' + key).hasClass('num-format')){
          $('#' + key).val(number_format(polArray[0][key],2,',','.'));
        }else{
          $('#' + key).val(polArray[0][key]); 
        }
      }
    }
    // $('#ProductID').trigger('change');
  }

  $('#BtnAddCert').click(function(event){
    // event.preventDefault();

    // let _token   = $('meta[name="csrf-token"]').attr('content');

    // $("#loadMe").modal('show');

    // $.ajax({
    //   type: "POST",
    //   url: "{{ route('policy.submitpolicy') }}", 
    //   data: {
    //       PID: $('#PID').val(),
    //       _token: _token
    //     },
    // }).done(function( response ) {
    //   // console.log(response);
    //   if (response.code == '200'){
    //     $('#PStatus').val('Process');
    //     refreshButton(false);
    //     disableAll();
    //   }
    //   $("#loadMe").modal("hide");
    //   toastMessage(response.code,response.message);
    // }).fail(function(xhr, status, error){
    //     $("#loadMe").modal("hide");
    //     toastMessage('400',error);
    // }); 
    toastMessage('400','This Function Not Ready');
  });
  
  $('#BtnTSubmit').click(function(event){
    event.preventDefault();

    let _token   = $('meta[name="csrf-token"]').attr('content');

    $("#loadMe").modal('show');

    $.ajax({
      type: "POST",
      url: "{{ route('policy.tempsubmitpolicy') }}", 
      data: {
          PID: $('#PID').val(),
          _token: _token
        },
    }).done(function( response ) {
      // console.log(response);
      if (response.code == '200'){
        tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
        $('#PStatus').val('Temporary Submit');
        refreshButton(false);
        $('#img-btn-save').removeAttr("disabled");
        $('#img-btn-submit').removeAttr("disabled");
        $('#img-btn-send').removeAttr("disabled");
        $('#Bimg-btn-save').attr("disabled","disabled");
      }
      $("#loadMe").modal("hide");
      toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
        $("#loadMe").modal("hide");
        toastMessage('400',error);
    });
  });

  $('#img-btn-revise').click(function(event){
    event.preventDefault();

    let _token = $('meta[name="csrf-token"]').attr('content');

    $("#loadMe").modal('show');

    $.ajax({
      type: "POST",
      url: "{{ route('policy.revisepolicy') }}", 
      data: {
          PID: $('#PID').val(),
          UserName: '{{session("ID")}}',
          Password: '{{session("Password")}}',
          _token: _token
        },
    }).done(function( response ) {
      console.log(response);
      if (response.code == '200'){
        removeRowTable(tblInquiry, response.listpolicy.Data[0]['PID']);
        tblInquiry.rows.add(response.listpolicy.Data).draw();
        // tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
        viewDetail(response.listpolicy.Data);
      }
      $("#loadMe").modal("hide");
      toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
        $("#loadMe").modal("hide");
        toastMessage('400',error);
    }); 
    // toastMessage('400','This Function Not Ready');
  });

  $('#img-btn-send').click(function(event){
    event.preventDefault();

    let _token   = $('meta[name="csrf-token"]').attr('content');

    $("#loadMe").modal('show');

    $.ajax({
      type: "POST",
      url: "{{ route('policy.submitpolicyconfirmation') }}", 
      data: {
          PID: $('#PID').val(),
          RefNo: $('#RefNo').val(),
          _token: _token
        },
    }).done(function( response ) {
      console.log(response);
      if (response.code == '200'){
        removeRowTable(tblInquiry, response.listpolicy.Data[0]['PID']);
        tblInquiry.rows.add(response.listpolicy.Data).draw();
        // tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
        disableAll();
        $('#PStatus').val('Submit Confirmation');
        refreshButton(false);
        $('#img-btn-save').attr('disabled','disabled');
        $('#img-btn-send').removeAttr('disabled');
        $('#img-btn-revise').removeAttr('disabled');
        // $('#img-btn-submit').removeAttr('disabled');
      }
      $("#loadMe").modal("hide");
      toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
      console.log(xhr);
        $("#loadMe").modal("hide");
        toastMessage('400',error);
    }); 
  });

  function dropPolicy(PID){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    // console.log(PID);
    // console.log(tblInquiry.cell(PID,1).data());
    // // var colIndex = tblInquiry.cell(PID).index().column;
    // // var rowIndex = tblInquiry.cell(PID).index().row;
    // // tblInquiry.row(PID).remove().draw();
        
    $("#loadMe").modal('show');

    $.ajax({
      type: "POST",
      url: "{{ route('policy.drop') }}", 
      data: {
          PID: PID,
          _token: _token
        },
    }).done(function( response ) {
      console.log(response);
      if (response.code == '200'){
        tblInquiry.clear().rows.add(response.listpolicy.Data).draw();
      }
      // $('#tblInquiryPolicy').DataTable().ajax.reload();
      $("#loadMe").modal("hide");
      toastMessage(response.code,response.message);
    }).fail(function(xhr, status, error){
      console.log(xhr);
      $("#loadMe").modal("hide");
      toastMessage('400',error);
    }); 
  }

  function Segment_OnChange(segment){
    if (segment == 'DIRECT'){
      $('#card-business-source').attr('style','display:none;');
    }else{
      $('#card-business-source').removeAttr('style');
    }

    var Coverage = $('#CoverageID').val();
    var bsCoverage = arrCoverage['Data'];
    const faCoverageDet = bsCoverage.filter(asd => asd.CoverageID == Coverage);
    // console.log(faCoverageDet);

    var NeedSurveyF = faCoverageDet[0]['NeedSurveyF'];
    // console.log(NeedSurveyF);
    checkNeedSurveyF(NeedSurveyF);

    var bsCoverageSegment = faCoverageDet[0]['CoverageSegment'];
    const faCoverageSegment = bsCoverageSegment.filter(asd => asd.Segment == segment);
    if (faCoverageSegment.length > 0){
      NeedSurveyF = faCoverageSegment[0]['NeedSurveyF'];
      checkNeedSurveyF(NeedSurveyF);
    }
    // console.log(arrPolicy);
    if (arrPolicy.length > 0){
      // console.log(arrPolicy[0]['NeedSurveyF']);
      var NeedSurveyF = arrPolicy[0]['NeedSurveyF'];
      // console.log('Need Surveysnya : ' + NeedSurveyF);
      document.getElementById('NeedSurveyF').checked = NeedSurveyF;
      if (!NeedSurveyF && segment == arrPolicy[0]['Segment']){
        $('#NeedSurveyF').removeAttr('style');
        $('#DisabledNeedSurveyF').removeAttr('style');
        $('#NeedSurveyF').css('display','normal');
        $('#DisabledNeedSurveyF').css('display','none');
      }
    }
  }

  $("#Segment").on("select2:select", function () {
    var segment = $(this).val();
    Segment_OnChange(segment);
  })

  $('#edate').on('change.datetimepicker', function(e){ 
    try{
      var sdate = new Date($('#InceptionDate').val());
      var edate = new Date($('#ExpiryDate').val());
      var output = checkPeriodePolicy(sdate,edate);
      if (output[0]['status'] == false){
        $('#InceptionDate').val($('#ExpiryDate').val());
        throw output[0]['message'];
      }
    }catch (err){
      toastMessage('400',err);
    }
  })

  $('#sdate').on('change.datetimepicker', function(e){ 
    try{
      var sdate = new Date($('#InceptionDate').val());
      sdate.setFullYear(sdate.getFullYear()+1);
      var month = sdate.getMonth() + 1;
      if (month < 10) {
        month = '0' + month;
      }
      var day = sdate.getDate();
      if (day < 10) {
        day = '0' + day;
      }
      var year = sdate.getFullYear();
      $('#ExpiryDate').val(month + "/" + day + "/" + year);
      // var output = checkPeriodePolicy(sdate,edate);
      // if (output[0]['status'] == false){
      //   $('#InceptionDate').val($('#ExpiryDate').val());
      //   throw output[0]['message'];
      // }
    }catch (err){
      toastMessage('400',err);
    }
  })

  function checkPeriodePolicy(sdate, edate){
    var returnStatus = new Array()
    if (sdate != '' && edate != ''){
      if (sdate > edate){
        returnStatus = [{
          'status': false,
          'message': 'The start period cannot be greater than the end period.'
        }]
        // toastMessage('400',"The start period cannot be greater than the end period.");
      }else{
        returnStatus = [{
          'status': true,
          'message': ''
        }]
      }
    }
    return returnStatus;
  }

  function SubmitDateF_Checked(){
    var cbxSubmitDate = document.getElementById("SubmitDateF");
    var PStatus = $('#PStatus').val();
    if (cbxSubmitDate.checked == true){
      $('#lblInsurancePeriod').css('font-weight','normal');
      $('#InceptionDate').removeAttr('required');
      // $('#ExpiryDate').removeAttr('required');
      $('#InceptionDate').attr('readonly','readonly');
      // $('#ExpiryDate').attr('readonly','readonly');
      if (PStatus != 'Process' && PStatus != 'Closed'){
        if (arrPolicy.length > 0){
          var sdate = new Date(arrPolicy[0]['InceptionDate']);
          var edate = new Date(arrPolicy[0]['ExpiryDate']);
          var diffTime = Math.abs(sdate - edate);
          var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
          sdate = new Date();
          $('#InceptionDate').val(format_date(sdate));
          sdate.setDate(sdate.getDate() + diffDays);
          $('#ExpiryDate').val(format_date(sdate));
        }else{
          // console.log($('#ExpiryDate').val());
          var sdate = new Date();
          var edate;
          if ($('#ExpiryDate').val() != ''){
            edate = new Date($('#ExpiryDate').val());
          }else{
            edate = new Date();
            edate.setFullYear(edate.getFullYear()+1);
          }
          $('#InceptionDate').val(format_date(sdate));
          $('#ExpiryDate').val(format_date(edate));
        }
      }
    }else{
      $('#lblInsurancePeriod').css('font-weight','bold');
      $('#InceptionDate').attr('required','required');
      $('#ExpiryDate').attr('required','required');
      $('#InceptionDate').removeAttr('readonly');
      $('#ExpiryDate').removeAttr('readonly');
    }
  }

  function NotApplyRateLoading_Checked(){
    var basedata = arrCoverage['Data'];
    var NotApplyRateLoadingF = document.getElementById('NotApplyRateLoadingF');
    var Coverage = $('#CoverageID').val();
    const faCoverageDet = basedata.filter(basedata => basedata.CoverageID == Coverage);
    let CovDeduc = faCoverageDet[0].CoverageDeductible;
    const CovDeducFil = CovDeduc.filter(CovDeduc => CovDeduc.NotApplyRateLoadingF == NotApplyRateLoadingF.checked);
    tblDeductible.clear().draw();
    tblDeductible.rows.add(CovDeducFil).draw(); // Add new data
    console.log(CovDeducFil);
  }

  function format_date(date_string){
    var fomatedDate = new Date(date_string);
    var month = fomatedDate.getMonth() + 1;
      if (month < 10) {
        month = '0' + month;
      }
      var day = fomatedDate.getDate();
      if (day < 10) {
        day = '0' + day;
      }
      var year = fomatedDate.getFullYear();

      return month + "/" + day + "/" + year;
  }

  $('#detailInstallment').click(async function(event){
    event.preventDefault();
    // $('#loadMe').modal('show');
    try{

      $('#class-modal-dialog').attr('class','modal-dialog modal-xl');

      $('#modaltitle').text('Premium Installment');

      $('#modalbody').empty();

      $('#modalfooter').empty();

      var sdate = $('#InceptionDate').val();
      var payment_term = $('#Payment_Term').val();
      var payment_tenor = $('#Payment_Tenor').val();
      var premium = parseInt($('#TxtTotalPremium').val() == undefined ?  0 : $('#TxtTotalPremium').val().replace(/\,/g, ''));
      // var tsi = parseInt($('#SI_1').val()) + parseInt($('#SI_2').val()) + parseInt($('#SI_3').val() == undefined ? 0 : $('#SI_3').val());
      var tsi = 0
      

      // for (i=1; i <= 10; i++){
      //   var num = parseInt($('#SI_' + i).val() == undefined ?  0 : $('#SI_' + i).val().replace(/\,/g, ''));
      //   // console.log('SI ke ' + i + ' =  ' +  num);
      //   tsi = tsi + num;
      // }

      // tsi = parseInt($('#SI_1').val() == undefined ?  0 : $('#SI_1').val().replace(/\,/g, ''));

      // console.log("{{ route('policy.modalinstallment') }}?sdate=" + sdate + "&payment_term=" + payment_term + "&payment_tenor=" + payment_tenor + 
      // "&premium=" + premium + "&tsi=" + tsi);
      if ($('#ProductID').val() == '0114'){
        tsi = parseInt($('#SI_1').val() == undefined ?  0 : $('#SI_1').val().replace(/\,/g, '')) + parseInt($('#SI_2').val() == undefined ?  0 : $('#SI_2').val().replace(/\,/g, ''));
      }else{
        tsi = parseInt($('#SI_1').val() == undefined ?  0 : $('#SI_1').val().replace(/\,/g, ''));
      }
      const res = await getModalView("{{ route('policy.modalinstallment') }}?sdate=" + sdate + "&payment_term=" + payment_term + "&payment_tenor=" + payment_tenor + 
      "&premium=" + premium + "&tsi=" + tsi);
      $('#modalbody').html(res);
      $("#modal-general").modal('show');

    }catch(err){
      toastMessage('400','Something wrong, please contact your Administrator.');
    }
  })

  $('#Payment_Tenor').on('change',function(event){
    if ($(this).val() == '') {
      $('#detailInstallment').attr('disabled','disabled');
    }else{
      $('#detailInstallment').removeAttr('disabled');
    }
  });

  function onchange_number(element){
    element.value = number_format(element.value,2,',','.');
  }

  function onhange_number_format(_obj){
    var num = getNumber(_obj.val());
    if(num==0){
      _obj.val('0');
    }else{
      _obj.val(num.toLocaleString());
    }
  }

  function getNumber(_str){
    var arr = _str.split('');
    var out = new Array();
    for(var cnt=0;cnt<arr.length;cnt++){
      if(isNaN(arr[cnt])==false){
        out.push(arr[cnt]);
      }
    }
    return Number(out.join(''));
  }
  
  function checkNeedSurveyF(NeedSurveyF){
    document.getElementById('NeedSurveyF').checked = NeedSurveyF;
    $('#NeedSurveyF').removeAttr('style');
    $('#DisabledNeedSurveyF').removeAttr('style');
    $('#NeedSurveyF').css('display',(NeedSurveyF) ? 'none' : 'normal');
    $('#DisabledNeedSurveyF').css('display',(NeedSurveyF) ? 'normal' : 'none');
  }
  
  //function akan jalan ketika tab di ubah
  $('a[data-toggle="tab"]').on('shown.bs.tab', async function (e) {
    // console.log('status master data : ' + getMasterDataF)
    var tabid = e.target.id;
    if (tabid == 'tabpolicy'){
      if (!masterDataF){
        showOverlayTab(true);
        await main();
        if (callback_PID != ''  && callback_PID != undefined){
          // viewDetailF = true;
          var url = "{{ route('policy.getdetail') }}?PID=" + callback_PID
          var res = await getData(url)
          if (res.code == '200'){
            viewDetail(res.Data);
          }
          toastMessage(res.code,res.message);
          callback_PID = '';
          // viewDetailF = false;
        }
        showOverlayTab(false);
      }else if(!getMasterDataF && (callback_PID != ''  && callback_PID != undefined)){
        // viewDetailF = true;
        showOverlayTab(true);

        var url = "{{ route('policy.getdetail') }}?PID=" + callback_PID
          var res = await getData(url)
          if (res.code == '200'){
            viewDetail(res.Data);
          }
          toastMessage(res.code,res.message);
          showOverlayTab(false)
          callback_PID = '';
          // viewDetailF = false;
      }
      // else{
      //   var url = "{{ route('policy.getdetail') }}?PID=" + PID

      //   showOverlayTab(true);

      //   $.ajax({
      //     type: "GET",
      //     url: url, 
      //   }).done(function( response ) {
      //     console.log(response);
      //     if (response.code == '200'){
      //       viewDetail(response.Data);
      //     }
      //     showOverlayTab(false);
      //     toastMessage(response.code,response.message);
      //   }).fail(function(xhr, status, error){
      //       showOverlayTab(false);
      //       toastMessage('400',error);
      //   });
      // }
    }else{
      tblInquiry.columns.adjust().draw();
    }
  })
  
  function showOverlayTab(status){
    if (status){
      $('#div-overlay').removeAttr('style');
      $('#div-overlay').css('display','normal');
    }else{
      $('#div-overlay').removeAttr('style');
      $('#div-overlay').css('display','none');
    }
  }

  function validation_check(obj,value){
    // console.log(obj);
    // console.log(value);
    // obj.classList.add('is-invalid');
    if (value != ''){
      if (obj.classList.contains('is-invalid')){
        obj.classList.remove('is-invalid');
        obj.removeAttribute('onchange');
      }
    }
  }

  $('#CommByPercent').on('click',function(){
    DisableElement($('#FeeAmount_1'));
    EnableElement($('#Fee_1'));
  
  });
  $('#CommByAmount').on('click',function(){
    DisableElement($('#Fee_1'));
    EnableElement($('#FeeAmount_1'));
  });

  function Check_CommissionBy(data_policy){
    console.log(data_policy);
    var CommByAmount = document.getElementById('CommByAmount');
    var CommByPercent = document.getElementById('CommByPercent');

    if (data_policy[0]['Fee_1'] != 0){
      CommByPercent.click();
      $('#Fee_1').trigger('change');
    }else{
      CommByAmount.click();
      $('#FeeAmount_1').trigger('change');
    }
  }

  function checkClausulaPolicy(policydata){
    var nodeTable = tblClausula.rows().nodes();
    $(nodeTable).find('input').each(function(){
      if (!this.hasAttribute('disabled')){
        this.checked = policydata[0]['Clausulacode1'].includes(this.value);
      }
    })
  }
</script>
@endsection