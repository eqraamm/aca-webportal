@extends('layout/main')
@section('title','ACA INSURANCE | Transaction')

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
      <div class="modal fade" id="modal-sm">
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
            <div class="modal-footer justify-content-between">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#inquiry" data-toggle="tab">Inquiry</a></li>
                <li class="nav-item"><a class="nav-link" href="#policy" data-toggle="tab">Policy</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="inquiry">
                  <div class="card-header">
                    <form class="form-horizontal">
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
                          <select class="form-control" id="LstAType">
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
                          <select class="form-control" id="LstPStatus">
                            <option value=""></option>
                            <option value="R">Request</option>
                            <option value="P">Process</option>
                            <option value="T">Temporarily Process</option>
                            <option value="C">Closed</option>
                            <option>Submit Confirmation</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>RefNo</th>
                          <th>Type</th>
                          <th>Policy Status</th>
                          <th>Name</th>
                          <th>Product</th>
                          <th>Coverage</th>
                          <th>Period</th>
                          <th>TSI 1</th>
                          <th>Premium</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="policy">
                        <div class="icon mt-3 mb-3 " align="center">
                          <p img src="../../dist/img/floppy-disk.png" id="save"  width="40" height="40" type="button" value="simpan"></p>
                          <!-- <img src="../../dist/img/calculator.png" id="premi-cal" width="40" height="40" type="button" > -->
                          <img src="../../dist/img/upload.svg" id="send" width="40" height="40" type="button">
                          <img src="../../dist/img/file.svg" id="search" width="40" height="40" type="button">
                          <img src="../../dist/img/edit.svg" id="edit" width="40" height="40" type="button">
                          <img src="../../dist/img/button.png" id="download"  width="40" height="40" type="button">
                          <img src="../../dist/img/remove.png" id="delete" width="40" height="40" type="button">               
                         </div>
                  <div class="bs-stepper">
                    <form action="" method="post">
                      <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#policy-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="policy-part" id="policy-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Policy Information</span>
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
                        <!--<form class="form-horizontal">-->
                        <!-- your steps content here -->
                        <div id="policy-part" class="content" role="tabpanel" aria-labelledby="policy-part-trigger">
                          <div class="card">
                          <h2 class="card-header">Product & Coverage</h2>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                              <div class="form-group row">
                                <label for="LstProduct" class="col-sm-2 col-form-label">Product  </label>
                                <div class="col-sm-3">
                                  <select class="form-control" id="LstProduct" onchange="Product_OnChange(this.value)">
                                    <!-- <option selected></option> -->
                                    @foreach($product['Data'] as $dataProduct)
                                    <option value="{{ $dataProduct['ProductID'] }}" selected>{{ $dataProduct['Description'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <p for="LstDownloadProduct" class="col-sm-2 col-form-label">Product Info  </p>
                                <div class="col-sm-3">
                                  <select class="form-control" id="LstDownloadProduct">
                                    <option value="" selected></option>
                                  </select>
                                </div>
                                <div class="col-sm-2">
                                  <button type="button" id="BtnDownloadProduct" class="btn btn-block btn-outline-primary">Download</button>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="LstCoverage" class="col-sm-2 col-form-label">Coverage  </label>
                                <div class="col-sm-3">
                                  <select class="form-control" id="LstCoverage" onchange="setSI_RC(this.value)">
                                    <!-- <option selected></option> -->
                                    @foreach($coverage['Data'] as $dataCoverage)
                                    <option value="{{ $dataCoverage['CoverageID'] }}" selected>{{ $dataCoverage['Description'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <label for="LstPayment" class="col-sm-2 col-form-label">Payment  </label>
                                <div class="col-sm-3">
                                  <select class="form-control" id="LstPayment">
                                    <option value="" selected></option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="LstSType" class="col-sm-2 col-form-label">Policy Status  </label>
                                <div class="col-sm-3">
                                  <select class="form-control" id="LstSType">
                                    <option value="" selected></option>
                                    <option value="S">Individual</option>
                                    <option value="M">Master Policy</option>
                                    <option value="O">Master Open Cover</option>
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
                                <p for="TxtPStatus" class="col-sm-3 col-form-label">Policy Status  </p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPStatus" type="text" disabled>
                                </div>
                                <p for="TxtPID" class="col-sm-1 col-form-label">&nbsp;◦ PID</p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPID" type="text" disabled>
                                </div>
                                <p for="TxtPPID" class="col-sm-1 col-form-label">&nbsp;◦ PPID</p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPPID" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtPStatus" class="col-sm-3 col-form-label">Registration Date  </p>
                                <div class="input-group date col-sm-4" id="reservationdate" data-target-input="nearest">
                                  <input type="date" class="form-control" id="TxtRegDate" />
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtQuotationNo" class="col-sm-3 col-form-label">Quotation No</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtQuotationNo" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtRefNo" class="col-sm-3 col-form-label">Reference No  </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtRefNo" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtPolicyNo" class="col-sm-3 col-form-label">Policy No  </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtPolicyNo" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <button type="button" id="BtnPolicyNo" class="btn btn-block btn-outline-primary">Get Policy No.</button>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="LstPHolder" class="col-sm-3 col-form-label">Policy Holder  </label>
                                <div class="col-sm-4">
                                  <select class="form-control" id="LstPHolder" required>
                                    <option value="" selected></option>
                                    @foreach($profile['Data'] as $dataProfile)
                                    <option value="{{ $dataProfile['ID'] }}">{{ $dataProfile['Name'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="LstInsured" class="col-sm-3 col-form-label">Insured  </label>
                                <div class="col-sm-4">
                                  <select class="form-control" id="LstInsured" required>
                                    <option value="" selected></option>
                                    @foreach($profile['Data'] as $dataProfile)
                                    <option value="{{ $dataProfile['ID'] }}">{{ $dataProfile['Name'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="TxtName" class="col-sm-3 col-form-label">Long Insured Name  </label>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtName" type="text" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="TxtName" class="col-sm-3 col-form-label">Insurance Period  </label>
                                <div class="input-group date col-sm-2" id="reservationdate" data-target-input="nearest">
                                  <input type="date" class="form-control" id="TxtSDate" required />
                                </div>_
                                <div class="input-group date col-sm-2" id="reservationdate" data-target-input="nearest">
                                  <input type="date" class="form-control" id="TxtEdate" required />
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Segment : </p>
                                <div class="col-sm-3">
                                  <input class="form-control" id="TxtSegment" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtSegmentDesc" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Marketing Officer  </p>
                                <div class="col-sm-4">
                                  <select class="form-control" id="LstMO">
                                    <option selected></option>
                                    @foreach($mo['Data'] as $dataMO)
                                    <option value="{{ $dataMO['ID'] }}">{{ $dataMO['Name'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Branch  </p>
                                <div class="col-sm-4">
                                  <select class="form-control" id="LstBranch">
                                    <option selected></option>
                                    @foreach($branch['Data'] as $dataBranch)
                                    <option value="{{ $dataBranch['Branch'] }}">{{ $dataBranch['Name'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Voyage :</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxVoyage">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtDepartDate" class="col-sm-3 col-form-label">Estimate Time Depature </p>
                                <div class="input-group date col-sm-4" id="TxtDepartDate" data-target-input="nearest">
                                  <input type="date" class="form-control" id="TxtDepartDate" />
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtArrivalDate" class="col-sm-3 col-form-label">Estimate Time Arrival</p>
                                <div class="input-group date col-sm-4" id="TxtArrivalDate" data-target-input="nearest">
                                  <input type="date" class="form-control id=" TxtArrivalDate" />
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Voyage From </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtVoyageFromID" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtVoyageFromDesc" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Port From </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtPortFromID" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPortFromDesc" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Voyage To </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtVoyageToID" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtVoyageToDesc" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Port To </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtPortToID" type="text">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPortToDesc" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Consignee Name </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtConsigneeName" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Consignee Address </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtConsigneeAddress" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Transhipment </p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxTranshipment">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p for="TxtTransDate" class="col-sm-3 col-form-label">Transhipment Date </p>
                                <div class="input-group date col-sm-4" id="TxtTransDate" data-target-input="nearest">
                                  <input type="date" class="form-control" id="TxtTransDate" />
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">At and From </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtTransAtAndFrom" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">To </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtTransTo" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Conveyance </p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtTransConveyence" type="text">
                                </div>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="card">
                            <h2 class="card-header">Object Information</h2>
                            <div class="card-body" id="cbObjectInfo">

                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="risk-part" class="content" role="tabpanel" aria-labelledby="risk-part-trigger">
                          <h2>Risk Coverage</h2>
                          <div class="card card-info">
                            <div class="card-body" id="cbRC">
                              <table id="tblRiskCoverage" class="table table-condensed responsive table-striped">

                              </table>
                            </div>
                          </div>
                          <h2>Sum Insured</h2>
                          <div class="card card-info">
                            <div class="card-body" id="cbSI">

                            </div>
                          </div>
                          <div class="card">
                            <h2 class="card-header">Premium Simulation</h2>
                            <div class="card-body">
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Discount :</p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtDiscount" type="number" placeholder="0">
                                </div>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtDiscountPCT" type="number" placeholder="0">
                                </div>
                                <div class="col-sm-2">
                                  <button type="button" id="BtnPremiumSimulation" class="btn btn-block btn-outline-primary">Calculate</button>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Premium :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtPremium" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Administration Fee :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtAdmFee" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Stamp Duty :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtStampDuty" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total :</label>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtTotal" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Premium Calculation :</p>
                                <div class="col-sm-6">
                                  <textarea class="form-control" rows="3" id="TxtViewPremium"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="payor-part" class="content" role="tabpanel" aria-labelledby="payor-part-trigger">
                          <div class="card">
                            <h2 class="card-header">Payor</h2>
                            <div class="card-body" id="cbPayor">
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Payor : </p>
                                <div class="col-sm-4">
                                  <select class="form-control" id="LstPayor">
                                    <option value="" selected></option>
                                    <option value="PHOLDER">Policy Holder</option>
                                    <option value="SOURCE">Source</option>
                                    <option value="INSURED">Insured</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">WPC : </p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtWPC" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Grace Period : </p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtGrace" type="number" placeholder="0">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Prorata Period :</p>
                                <div class="col-sm-2">
                                  <input class="form-control" id="TxtPPeriod" type="number" placeholder="0">
                                </div>
                                <div class="col-sm-6">
                                  <label> &nbsp; *(0 : Default, 1 : Daily Basis, 2 : Monthly Basis)</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Policy Holder's Address :</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxPHolderAddressF">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Correspondence Name :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtAttention" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Correspondence Address :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtCorAddress" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Correspondence Email :</p>
                                <div class="col-sm-4">
                                  <input class="form-control" id="TxtCorEmail" type="text">
                                </div>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="others-part" class="content" role="tabpanel" aria-labelledby="others-part-trigger">
                          <div class="card">
                            <h3 class="card-header">Business Source</h3>
                              <div class="card-body" id="cbBusinessSource">
                                <div class="form-group row">
                                  <p for="TxtName" class="col-sm-3 col-form-label">Business Source 1 : </p>
                                  <div class="col-sm-5">
                                    <select class="form-control" id="LstAID_1">
                                      <option value="" selected></option>
                                    </select>
                                  </div>
                                  <div class="col-sm-2">
                                    <select class="form-control" id="LstBSType_1">
                                      <option value="" selected></option>
                                      <option value="A">Agent</option>
                                      <option value="B">Brokerage</option>
                                      <option value="O">Others</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Fee : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtFee" type="number" placeholder="0">
                                  </div>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtFeeAmount" type="number" placeholder="0">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Fee 1 : </p>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtFee_1" type="number" placeholder="0">
                                  </div>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtFeeAmount_1" type="number" placeholder="0">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Business Source 2 : </p>
                                  <div class="col-sm-5">
                                    <select class="form-control" id="LstAID_2">
                                      <option value="" selected></option>
                                    </select>
                                  </div>
                                  <div class="col-sm-2">
                                    <select class="form-control" id="LstBSType_2">
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
                                    <input class="form-control" id="TxtFee_2" type="number" placeholder="0">
                                  </div>
                                  <div class="col-sm-2">
                                    <input class="form-control" id="TxtFeeAmount_2" type="number" placeholder="0">
                                  </div>
                                </div>
                              </div>
                          </div>
                          <h3>Beneficiaries</h3>
                          <div class="card card-info">
                            <div class="card-body" id="cbBeneficiaries">
                              <table>
                                <tr>
                                  <th><button type="button" id="AddRow_Beneficiaries" class="btn btn-block btn-outline-primary">Add</button></th>
                                  <!-- <th><button type="button" id="DelRow_Beneficiaries" class="btn btn-block btn-outline-danger">Delete</button></th> -->
                                </tr>
                              </table>
                              <table id="tbl_beneficiaries" class="table table-condensed responsive table-striped">

                              </table>
                            </div>
                          </div>
<<<<<<< HEAD
                          <h3>Interested Party</h3>
                          <div class="card card-info">
                            <div class="card-body" id="cbInterestedParty">
                              <table>
                                <tr>
                                  <th><button type="button" id="AddRow_IP" class="btn btn-block btn-outline-primary">Add</button></th>
                                  <!-- <th><button type="button" id="DelRow_IP" class="btn btn-block btn-outline-danger">Delete</button></th> -->
                                </tr>
                              </table>
                              <table id="tbl_interestedparty" class="table table-condensed responsive table-striped">

                              </table>
                            </div>
                          </div>
                          <h3>Default Clausula</h3>
                          <div class="card card-info">
                            <div class="card-body">
                            </div>
                          </div>
                          <h3>Default Deductible</h3>
                          <div class="card card-info">
                            <div class="card-body" id="cbCD">
=======
                          <div class="card">
                            <h2 class="card-header">Interested Party</h2>
                            <div class="card-body">
                            </div>
                          </div>
                          <div class="card">
                            <h2 class="card-header">Default Clausula</h2>
                            <div class="card-body">
                            </div>
                          </div>
                          <div class="card">
                            <h2 class="card-header">Default Deductible</h2>
                            <div class="card-body" id="cbDeductible">
>>>>>>> refs/remotes/origin/master
                              <table id="tbl_covDeductible" class="table table-condensed responsive table-striped">

                              </table>
                            </div>
                          </div>
<<<<<<< HEAD
                          <h3>Policy/Document List</h3>
                          <div class="card card-info">
                            <div class="card-body">
                            </div>
                          </div>
                          <h3>Submission</h3>
                          <div class="card card-info">
=======
                          <div class="card">
                            <h2 class="card-header">Policy/Document List</h2>
                            <div class="card-body">
                            </div>
                          </div>
                          <div class="card">
                            <h2 class="card-header">Submission</h2>
>>>>>>> refs/remotes/origin/master
                            <div class="card-body">
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Immediate Inforce</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxAutoInforce">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Document Upload</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxPolicyUpload" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Auto Email</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxAutoEmail">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Hardcopy Policy</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxHardcopyPolicy">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Not Apply Rate Loading</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxNotApplyRateLoading">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Submit Date</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxSubmitDate">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Billing by Policy Year</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="cbxPolicyYearF">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Need e-Sign</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxNeedEsignF">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">e-Sign</p>
                                <div class="col-form-label">
                                  <input type="checkbox" class="form-check-input col-sm-1" id="CbxeESign">
                                </div>
                              </div>
                              <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Document SPPA Status</p>
                                <div class="col-form-label col-sm-4">
                                  <label id="LblDocStatus" style="padding-left:2%;">No Document SPPA</label>
                                </div>
                              </div>
                              <div class="form-group row" style="width: 100%; padding-left:5%; text-align: center;">
                                <table>
                                  <tr>
                                    <td style="text-align: center;">
                                      <button class="btn btn-primary" id="BtnSave">Save</button>
                                      <button class="btn btn-primary" id="BtnValidate">Validate</button>
                                      <button class="btn btn-primary" id="BtnAddCert">Add Certificate</button>
                                      <button class="btn btn-primary" id="BtnCompliance">Complience</button>
                                      <button class="btn btn-primary" id="BtnPayment">Payment</button>
                                      <button class="btn btn-primary" id="BtnTSubmit">Quotation</button>
                                      <button class="btn btn-primary" id="BtnRevise">Revise</button>
                                      <button class="btn btn-primary" id="BtnsubmitConfirmation">Send Confirmation</button>
                                      <button class="btn btn-primary" id="BtnSubmit">Submit</button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><button class="btn btn-primary" id="BtnDocList">Document Checklist</button></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <!--<button class="btn btn-primary" onclick="">Submit</button>-->
                        </div>
                      </div>
                    </form>
                  </div>
                  <!--</form>-->
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
</section>
<!-- /.content -->
</div>
@endsection
@section('scriptpage')
<script>
  $( document ).ready(function() {
      Product_OnChange($('#LstProduct').val());
      setSI_RC($('#LstCoverage').val());
  });
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
  $('#LstPHolder').on('change', function() { 
    qq($(this).find('option').filter(':selected').text(), $('#LstInsured').find('option').filter(':selected').text());
  });
  $('#LstInsured').on('change', function() {
    qq($('#LstPHolder').find('option').filter(':selected').text(), $(this).find('option').filter(':selected').text());
  });

  function qq(LstPHolder, LstInsured) {
    if (LstPHolder == LstInsured) {
      $('#TxtName').val(LstPHolder);
    } else if (LstPHolder != '' && LstInsured != '') {
      $('#TxtName').val(LstPHolder + " QQ " + LstInsured);
    } else if (LstPHolder == '') {
      $('#TxtName').val(LstInsured);
    } else {
      $('#TxtName').val(LstPHolder);
    }
  }

  function setSI_RC(Coverage) {
    var bsCoverage = @json($coverage['Data']);
    var bsCurrency = @json($currency['Data']);
    const faCoverageDet = bsCoverage.filter(asd => asd.CoverageID == Coverage);
    //create SUM INSURED and Risk Coverage
    var divGrpSI = document.getElementById("cbSI");
    while (divGrpSI.firstChild) {
      divGrpSI.removeChild(divGrpSI.firstChild);
    }
    //$('#tblRiskCoverage').empty();
    if (faCoverageDet.length > 0) {
      for (i = 0; i < faCoverageDet.length; i++) {
        let CovDet = faCoverageDet[i].CoverageDetail;
        let CovDeduc = faCoverageDet[i].CoverageDeductible;
        var tblRC = $("#tblRiskCoverage").DataTable({
          "data": CovDet,
          "columns": [{
              "title": "",
              "className": "select-checkbox",
              "defaultContent": ""
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
              "title": "Rate",
              "defaultContent": "0",
              "data": null
            }
          ],
          // "columnDefs": [{
          //   "targets": []
          // }],
          "select": {
            "style": "multi",
            "selector": "td:first-child"
          },
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "destroy": true,
        });
        var tblDeductible = $("#tbl_covDeductible").DataTable({
          "data": CovDeduc,
          "columns": [
            {
              "title": "No",
              "data": "OrderNo"
            },
            {
              "title": "Deductible Remarks",
              "data": "Description"
            },
            {
              "title": "Fixed Min",
              "defaultContent": "0"
            },
            {
              "title": "PCT TSI (%)",
              "defaultContent": "0"
            },
            {
              "title": "PCT Claim (%)",
              "defaultContent": "0"
            }
          ],
          "pageLength" : 5,
          "lengthMenu": [[5, 10, -1], [5, 10, 'All']],
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "destroy": true,
        });
        $('#tblRiskCoverage tbody tr').on('click', 'td', function() {
          var data = tblRC.row(this).data();
          $("#modal-sm").modal('show');
          $('#TxtRate').val(data.PolicyYear);
        });
      }
      const SI = createSI(faCoverageDet);
      let SIF = SI.SiF;
      let SIDefault = SI.SiDefault;
      let SiLabel = SI.SiLabel;
      // for (j = 0; j < bsCurrency.length; j++) {
      //   //create currency beside sum insured
      //   var LstCurrency = document.createElement("Select");
      //   var optionCurrency = document.createElement("OPTION");
      //   LstCurrency.className = "form-control";
      //   LstCurrency.id = "LstCurrencyTSI" + (j + 1);
      //   LstCurrency.name = "CurrencyTSI" + (j + 1);
      //   optionCurrency.value = bsCurrency[j].Currency;
      //   optionCurrency.innerHTML = bsCurrency[j].Description;
      //   LstCurrency.appendChild(optionCurrency);
      // }
      for (i = 0; i < SIF.length; i++) {
        if (SIF[i] != false && SiLabel[i] != '') {
          var divGrpSI = document.getElementById("cbSI");
          var divFrm = document.createElement("div");
          divFrm.className = "form-group row";
          var label = document.createElement("P");
          label.className = "col-sm-4 col-form-label";
          var divTxt = document.createElement("div");
          divTxt.className = "col-sm-4";
          var txt = document.createElement("INPUT");
          txt.className = "form-control";
          txt.type = "number";
          txt.id = "TxtSI" + (i + 1);
          txt.name = "SI" + (i + 1);
          txt.value = 0;
          label.innerHTML = SiLabel[i];
          divGrpSI.appendChild(divFrm);
          divFrm.appendChild(label);
          divFrm.appendChild(divTxt);
          divTxt.appendChild(txt);
          // divTxt.appendChild(LstCurrency);
        }
      }
    }
  }

  function spreadObjInfo(ValueID, FLDID, ProductID, rowno){
    var bsProduct = @json($product['Data']);
    var gendtabs = @json($gendtab['Data']);
    const faProduct = bsProduct.filter(i => i.ProductID == ProductID);
    const ObjInfo = createArrFLDTAG(faProduct);
    if (ObjInfo.arSLFLDID[parseInt(rowno) + 1] == FLDID){
      const nextgendtab = gendtabs.filter(gendtabtemp => gendtabtemp.SLValueID == ValueID)
      // console.log(nextgendtab)
      $('#FLDID' + (parseInt(rowno) + 2)).empty();
      var selectElement = document.getElementById("FLDID" + (parseInt(rowno) + 2))
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
    gendtab = createArrGENDTAB(gendtabtemp);
    console.log(gendtab);
    for (i=parseInt(rowno) + 1; i < 15; i++){
      console.log(ObjInfo.arFLDID[i]);
      if (ObjInfo.arFLDID[i] != ''){
        for (j=0; j < 15; j++){
          if (ObjInfo.arFLDID[i] == gendtab.arFLDID[j]){
            if (gendtab.arValueID[j] != ''){
              console.log(gendtab.arValueID[j]);
              $('#FLDID' + (i + 1)).val(gendtab.arValueID[j]);
            }else{
              console.log(gendtab.arValueDesc[j]);
              $('#FLDID' + (i + 1)).val(gendtab.arValueDesc[j]);
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
                        $('#FLDID' + (k + 1)).val(gendtab2.arValueID[l]);
                      }else{
                        $('#FLDID' + (k + 1)).val(gendtab2.arValueDesc[l]);
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
  }

  function addOptionItem(selectElement, data, LblValue, LblDescription, withBlankItem = true){
    if (withBlankItem){
      var option = document.createElement("OPTION");
      option.value = '';
      option.innerHTML = '';
      selectElement.appendChild(option);
    }
    for (j = 0; j < data.length; j++) {
        var option = document.createElement("OPTION");
        option.value = data[j][LblValue];
        option.innerHTML = data[j][LblDescription];
        selectElement.appendChild(option);
    }
  }

  function Product_OnChange(Product) {
    var bsCoverage = @json($coverage['Data']);
    var bsProduct = @json($product['Data']);
    var gendtabs = @json($gendtab['Data']);
    const faCoverage = bsCoverage.filter(asd => asd.ProductID == Product);
    const faProduct = bsProduct.filter(i => i.ProductID == Product);
    document.getElementById("LstCoverage").options.length = 0;
    var listBox = document.getElementById("LstCoverage");
    addOptionItem(listBox,faCoverage, 'CoverageID','Description', false);
    setSI_RC($('#LstCoverage').val());
    var divGrp = document.getElementById("cbObjectInfo");
    var divGrpSI = document.getElementById("cbSI");
    //create object information from product
    while (divGrp.firstChild) {
      divGrp.removeChild(divGrp.firstChild);
    }
    // while (divGrpSI.firstChild) {
    //   divGrpSI.removeChild(divGrpSI.firstChild);
    // }
    // $('#tblRiskCoverage').empty();
    if (faProduct.length > 0) {
      const ObjInfo = createArrFLDTAG(faProduct);
      let arrFLDTAG = ObjInfo.arFLDTAG;
      let arrFLDTAB = ObjInfo.arFLDTAB;
      let arrFLDCOM = ObjInfo.arFLDCOM;
      let arrFLDID = ObjInfo.arFLDID;
      let arrSLFLDID = ObjInfo.arSLFLDID;
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
            objinfoValue.setAttribute("id", "FLDID" + (i + 1));
            objinfoValue.setAttribute("name", "FLDID" + (i + 1));
            objinfoValue.setAttribute("class", "form-control");
            objinfoValue.setAttribute("onchange","spreadObjInfo(this.value,'"+ arrFLDID[i] +"','"+ Product +"','"+ i +"')");
            const gendtab = gendtabs.filter(gendtabtemp => gendtabtemp.FLDID == arrFLDID[i]);
            addOptionItem(objinfoValue,gendtab, 'ValueID','Description');
          }else{
            var objinfoValue = document.createElement("INPUT");
            objinfoValue.setAttribute("id", "FLDID" + (i + 1));
            objinfoValue.setAttribute("name", "FLDID" + (i + 1));
            objinfoValue.setAttribute("class", "form-control");
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
          divTxt.appendChild(objinfoValue);
        }
      }
    }
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

    return {
      arFLDTAG,
      arFLDTAB,
      arFLDCOM,
      arFLDID,
      arSLFLDID
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
    // console.log(SiDefault);
    // console.log(SiLabel);
    // console.log(SiF);
    return {
      SiF,
      SiDefault,
      SiLabel
    };
  }
</script>
@endsection