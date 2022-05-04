@extends('layout/main')
@section('title','ACA INSURANCE | Profile')

@section('maincontent')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"></div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                  <a id="tabinquiry" class="{{ empty($tabname) || $tabname == 'inquiry' ? 'nav-link active' : 'nav-link' }}" href="#inquiry" data-toggle="tab">Inquiry</a>
                </li>
                <li class="nav-item">
                  <a id="tabprofile" class="{{ empty($tabname) || $tabname == 'profile' ? 'nav-link active' : 'nav-link' }}" href="#profile" data-toggle="tab">Client</a>
                </li>
                <!-- <a href="{{route('profile.uploadDocument')}}" type="delete" class="btn btn-outline-danger btn-sm btn-upload">Upload File</a> -->
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="{{ empty($tabname) || $tabname == 'inquiry' ? 'tab-pane fade show active' : 'tab-pane fade' }}" id="inquiry">
                  <div class="card-body">
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Name</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchName" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Email</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchEmail" type="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">ID Number</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchID_No" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Mobile Number</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchMobileNo" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label"></p>
                      <div class="col-sm-4">
                      <button type="button" id="btn-search-profile" class="btn btn-outline-primary">Search</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <table id="example1" class="table table-striped dt-responsive nowrap" width="100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Client ID</th>
                            <th>Reference Profile ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>ID Number</th>
                            <th>Birth Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!-- <tbody> 
                          @if($data['code'] == '200') 
                          @foreach($data['Data'] as $datas) 
                          <tr>
                            <td>{{ $datas['RefID'] }}</td>
                            <td>{{ $datas['Name'] }}</td>
                            <td>{{ $datas['Email'] }}</td>
                            <td>{{ $datas['Mobile'] }}</td>
                            <td>{{ $datas['ID_No'] }}</td>
                            <td>{{ $datas['BirthDate'] }}</td>
                            <td>
                              <img src="{{asset('dist/img/edit.svg')}}" width="25" height="25" type="button" value="detail" onclick="viewDetail('{{ $datas['ID'] }}')">
                              <img src="{{asset('dist/img/file.svg')}}" width="25" height="25" a href="{{ route('profile.history', ['id' =>$datas['ID']]) }}" type="button" id="btn-history" class="history-profile">
                              </a>
                              <img src="{{asset('dist/img/trash.svg')}}" width="25" height="25" a href="{{ route('profile.drop', ['id' =>$datas['ID']]) }}" type="delete" class="btn-del-row-profile">
                              </a>
                            </td>
                          </tr> 
                          @endforeach 
                          @endif 
                        </tbody> -->
                      </table>
                    </div>
                    <!-- Modal History -->
                    <div class="modal fade" id="modal-history">
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
                    </div>
                    <!-- /.Modal History -->
                  </div>
                </div>
                <div class="{{ empty($tabname) || $tabname == 'profile' ? 'tab-pane fade show active' : 'tab-pane fade' }}" id="profile">
                  <!-- modal sync -->
                  <div class="modal fade" id="modal-sync" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form class="form-horizontal form-sync" action="{{ route('profile.sync') }}" method="post"> 
                          <div id="div-overlay"></div>
                          <div class="modal-header">
                            <h4 class="modal-title" id="titleModalSync">Profile Inquiry</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            @csrf 
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Profile ID</label>
                              <div class="col-sm-6">
                                <input class="form-control" id="TxtProfileIDModal" type="text" name="ProfileID">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Name</label>
                              <div class="col-sm-6">
                                <input class="form-control" id="TxtProfileNameModal" name="Name" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">Email</p>
                              <div class="col-sm-6">
                                <input class="form-control" id="TxtProfileEmailModal" name="Email" type="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">Address</p>
                              <div class="col-sm-6">
                                <input class="form-control" id="TxtPAddress_1Modal" name="Address1" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">City</p>
                              <div class="col-sm-6">
                                <input class="form-control" id="ModalTxtCity" name="CityModal" style="text-transform:uppercase;" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">ZipCode</p>
                              <div class="col-sm-3">
                                <input class="form-control" id="TxtProfileZipCodeModal" name="ZipCode" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">ID Number</p>
                              <div class="col-sm-6">
                                <input class="form-control" id="ID_NumberModal" name="ID_Number" type="text" maxlength="16">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">Mobile Phone</p>
                              <div class="col-sm-3">
                                <input class="form-control" id="TxtProfileMobileModal" name="MobilePhone" type="text">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">Tax ID</p>
                              <div class="col-sm-6">
                                <input class="form-control" id="TxtTaxIDModal" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="TaxModal">
                              </div>
                            </div>
                            <div class="form-group row">
                              <p class="col-sm-3 col-form-label">Birth Date</p>
                              <div class="input-group date col-sm-3" id="div-group-modalbirthdate" data-target-input="nearest">
                                <input type="text" id="ModalTxtBirthDate" name="ModalBirthDate" class="form-control datetimepicker-input" data-target="#div-group-modalbirthdate" />
                                <div class="input-group-append" data-target="#div-group-modalbirthdate" data-toggle="datetimepicker">
                                  <div class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Clear All</button>
                            <Button type="submit" class="btn btn-primary sync-profile" id="search" name="search">search </button>
                          </div>
                          <div class="card-body" id="cardbodyModalSync">
                            <table id="tblSync" class="table table-bordered table-striped" style="width:100%"></table>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <form class="form-horizontal form-save" id="needs-validation" action="{{ route('profile.save') }}" method="post"> 
                    @csrf 
                    <div class="form-group row" style="display:none;">
                      <div class="col-md-2 ml-auto">
                        <button type="delete" id="Btn-Upload" class="btn btn-block btn-outline-info btn-upload">Upload Document</button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2 ml-auto">
                        <button type="delete" id="btn-sync" class="btn btn-block btn-outline-info btn-upload" disabled>Synchronize Data</button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <a class="col-sm-3 col-form-label" type="button" data-toggle="modal" data-target="#modal-sync">Reference Profile ID</a>
                      <!-- <p for="TxtRefNo" class="col-sm-3 col-form-label">Reference Profile ID</p> -->
                      <div class="col-sm-6">
                        <input class="form-control" id="RefID" name="RefID" type="text" readonly="readonly">
                      </div>
                      <div class="col-sm-4" style="display:none;">
                        <input class="form-control" id="RefName" name="RefName" type="text">
                      </div>
                      <!-- <div class="col-sm-2">
                        <button type="button" id="BtnSync" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-sync">Inquiry From Core</button>
                      </div> -->
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Client ID</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="ID" type="text" name="ProfileID" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="FirstName" type="text" name='FirstName' minlength="3" style="text-transform:uppercase" onchange="Construct_ProfileName();" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Middle Name</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="MidName" name="MiddleName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Last Name</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="LastName" name="LastName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="Name" name="Name" type="text" minlength="3" style="text-transform:uppercase" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Corporate</p>
                      <div class="col-form-label col-sm-2">
                        <input type="checkbox" class="form-check-inputs" id="Corporatef" name="Corporate" value="true" onclick="corporateF_chekcked()">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Salutation</p>
                      <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Salutation" name="Salutation"> 
                          <option value="" selected></option>
                          <option value="APOTIK">APOTIK</option>
                          <option value="BALKESMAS">BALKESMAS</option>
                          <option value="BIDAN">BIDAN</option>
                          <option value="BP">BP</option>
                          <option value="CV">CV</option>
                          <option value="KLINIK">KLINIK</option> 
                          <option value="Miss">Miss</option>
                          <option value="Mr">Mr</option> 
                          <option value="Mrs">Mrs</option>
                          <option value="N/A">N/A</option> 
                          <option value="Nn">Nn</option>
                          <option value="Ny">Ny</option>
                          <option value="OPTIK">OPTIK</option> 
                          <option value="PD">PD</option>
                          <option value="PT">PT</option> 
                          <option value="PUSKESMAS">PUSKESMAS</option>
                          <option value="RB">RB</option>
                          <option value="RS">RS</option> 
                          <option value="RSIA">RSIA</option>
                          <option value="RSUD">RSUD</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Initial</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="Initial" name="Initial" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Title</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="Title" name="Title" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Address</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="Email" name="Email" type="email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile Phone</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="Mobile" name="MobilePhone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Phone</p>
                      <div class="col-sm-3">
                        <input class="form-control" id="Phone" name="Phone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">User Owner</p>
                      <div class="col-sm-3">
                        <input class="form-control" id="OwnerID" type="text" name="UserOwner" value="{{ Session::get('ID')}}" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 1</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="Address_1" name="Address1" type="text" required>
                      </div>
                    </div>
                    @if (config('app.DETAILADDRESSF'))
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-2">
                          <label for="RT">RT</label>
                          <input class="form-control" id="SOI" name="SOI" type="text" required>
                        </div>
                        <div class="col-sm-2">
                          <label for="RW">RW</label>
                          <input class="form-control" id="MOO" name="MOO" type="text" required>
                        </div>
                        <div class="col-sm-2">
                          <label for="Province">Province</label>
                          <select class="form-control select2bs4" id="Province" name="Province" required> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-2">
                          <label for="District">District</label>
                          <select class="form-control select2bs4" id="District" name="District" required> 
                          </select>
                        </div>
                        <div class="col-sm-2">
                          <label for="SubDistrict">Sub District</label>
                          <select class="form-control select2bs4" id="SubDistrict" name="SubDistrict" required>
                          </select>
                        </div>
                        <div class="col-sm-2">
                          <label for="Village">Village</label>
                          <select class="form-control select2bs4" id="Village" name="Village" required>
                          </select>
                        </div>
                      </div>
                    @endif
                    <!-- <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                      
                    </div> -->
                    <div class="form-group row" style=>
                      <p class="col-sm-3 col-form-label">Address 2</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="Address_2" name="Address2" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Address 3</p>
                      <div class="col-sm-6">
                        <input class="form-control" id="Address_3" name="Address3" type="text">
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Country / City</p>
                      <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Country" name="Country"> 
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" id="City" name="City" style="text-transform:uppercase" type="text">
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Country" name="Country" required> 
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Profile Type</label>
                      <div class="col-sm-3">
                        <select class="form-control select2bs4" id="PType" name="PType" required> 
                          <option value="" selected></option>
                          <option value="C">Captive</option>
                          <option value="D">Direct Business</option>
                          <option value="I">Inward Business</option>
                          <!-- <option value="M">Intermediaries</option> -->
                          <option value="O">Outward Business</option>
                          <option value="T">Others</option>
                        </select>
                      </div>
                    </div>
                    @if (!config('app.DETAILADDRESSF'))
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Province</label>
                        <div class="col-sm-3">
                          <select class="form-control select2bs4" id="Province" name="Province" required> 
                          </select>
                        </div>
                      </div>
                    @endif
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">ZipCode</p>
                      <div class="col-sm-3">
                        <input class="form-control" id="ZipCode" name="ZipCode" type="text" maxlength="10">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Line of Business</label>
                      <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Occupation" name="Occupation" required> 
                        </select>
                      </div>
                    </div>
                    @if (config('app.SHOWPALIAS'))
                      <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Correspondence Name</p>
                        <div class="col-sm-6">
                          <input class="form-control" id="Correspondence_Attention" name="CoName" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Correspondence Address</p>
                        <div class="col-sm-6">
                          <input class="form-control" id="Correspondence_Address" name="CoAddress" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Correspondence Phone</p>
                        <div class="col-sm-3">
                          <input class="form-control" id="Correspondence_Phone" name="CoPhone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                      </div>
                      <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Correspondence Email</p>
                        <div class="col-sm-6">
                          <input class="form-control" id="Correspondence_Email" name="CoEmail" type="email">
                        </div>
                      </div>
                    @endif
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Syncronize Profile</p>
                      <div class="col-form-label col-sm-2">
                        <input type="checkbox" class="form-check-inputs" id="ForceSyncF" name="Sync" value="true">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <p class="col-sm-3 col-form-label">Dump</p>
                      <div class="col-form-label col-sm-2">
                        <input type="checkbox" class="form-check-inputs" id="DumpF" name="Dump" value="true">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Restricted</p>
                      <div class="col-form-label col-sm-2">
                        <input type="checkbox" class="form-check-inputs" id="Restrictedf" name="Restricted" value="true" disabled>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <span class="col-sm-3 col-form-label">Created By</span>
                      <div class="col-form-label col-sm-4">
                        <p id="Created" name="owner"></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-3 col-form-label">Last Updated</p>
                      <div class="col-form-label col-sm-4">
                        <p id="LastUpdate" name="owner"></p>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card card-primary card-outline card-tabs">
                          <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="profile-detail-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="profile-tabs-company-tab" data-toggle="pill" href="#profile-tabs-company" role="tab" aria-controls="profile-tabs-company" aria-selected="false">Company Info</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tabs-personal-tab" data-toggle="pill" href="#profile-tabs-personal" role="tab" aria-controls="profile-tabs-personal" aria-selected="false">Personal Info</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tabs-tax-tab" data-toggle="pill" href="#profile-tabs-tax" role="tab" aria-controls="profile-tabs-tax" aria-selected="false">Taxation</a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-body">
                            <div class="tab-content" id="profile-detail-tab-Content">
                              <div class="tab-pane fade active show" id="profile-tabs-company" role="tabpanel" aria-labelledby="profile-tabs-company-tab">
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblPicName">PIC Name</p>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="Contact" minlength="3" name="Contact" type="text">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">PIC Address</p>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="ContactAddress" name="ConAddress" type="text" >
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">PIC Phone</p>
                                  <div class="col-sm-3">
                                    <input class="form-control" id="ContactPhone" name="ConPhone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblCType">Company Type</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="CompanyType" name="CompanyType"> 
                                      <option value="" selected></option>
                                      <option value="BUMN">BUMN</option>
                                      <option value="BUMD">BUMD</option>
                                      <option value="CAPTIVE">CAPTIVE</option>
                                      <option value="Direct Business (Ex.">Direct Business (Ex.</option>
                                      <option value="GOVERNMENT">GOVERNMENT</option>
                                      <option value="J.VENTURE">J.VENTURE</option>
                                      <option value="JOINT VENTURE">JOINT VENTURE</option>
                                      <option value="OVERSEAS">OVERSEAS</option>
                                      <option value="SWASTA">SWASTA</option>
                                      <option value="PRIVATE">PRIVATE</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblCGroup">Company Group</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="CGroup" name="CGroup" onchange="CGroup_OnChange(this.value)"> 
                                  </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblSCGroup">Sub Company Group</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="SCGroup" name="SubCompanyGroup">
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-personal" role="tabpanel" aria-labelledby="profile-tabs-personal-tab">
                                <div class="row">
                                  <div class="col-md-12">
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblGender">
                                          Gender
                                        </p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Gender" name="Gender" required> 
                                          <option value="" selected></option>
                                          <option value="FEMALE">Female</option>
                                          <option value="MALE">Male</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="col-form-label">Citizenship</label>
                                      </div>
                                      <div class="col-sm-3">
                                        <input type="checkbox" class="form-check-inputs" name="Citizen" id="WNIF" value="true" checked>
                                        <label class="form-check-label" for="WNIF">Local</label>
                                      </div>
                                    </dl>
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblIDType">ID Type</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="ID_Type" name="IDType" onchange="LstIDType_Change()" required>
                                          <option value="" selected></option> 
                                          <option value="Driving License">Driving License</option>
                                          <option value="ID Card">ID Card</option>
                                          <option value="KIMS">KIMS</option>
                                          <option value="KITAS(P)">KITAS(P)</option>                          
                                          <option value="KTP">KTP</option>
                                          <option value="OTHERS">OTHERS</option>
                                          <option value="Passport">Passport</option>
                                          <option value="SIM">SIM</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblBirthPlace">Birth Place</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <input class="form-control" id="BirthPlace" name="BirthPlace" style="text-transform:uppercase" type="text" >
                                      </dd>
                                    </dl>
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblID_Number">ID Number</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <input class="form-control" id="ID_No" name="ID_Number" type="text" required>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblBirthDate">Birth Date</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="input-group date" id="div-group-birthdate" data-target-input="nearest">
                                          <input type="text" id="BirthDate" name="BirthDate" class="form-control datetimepicker-input" data-target="#div-group-birthdate" placeholder="mm/dd/yyyy" />
                                          <div class="input-group-append" data-target="#div-group-birthdate" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </dl>
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label" id="LblID_Name">ID Name</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <input class="form-control" id="ID_Name" name="ID_Name" type="text" style="text-transform:uppercase" required>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="col-form-label">Marital Status</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Marital" name="Marital"> 
                                          <option value="" selected></option>
                                          <option value="SINGLE">Single</option>
                                          <option value="MARRIED">Married</option>
                                          <option value="DIVORCE(D)">Divorce To Death</option>  
                                        </select>
                                      </div>
                                    </dl>
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label">ID Date</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="input-group date" id="div-group-iddate" data-target-input="nearest">
                                          <input type="text" id="ID_Date" name="IDDate" class="form-control datetimepicker-input" data-target="#div-group-iddate" placeholder="mm/dd/yyyy" />
                                          <div class="input-group-append" data-target="#div-group-iddate" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="col-form-label">Religion</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Religion" name="Religion"> 
                                          <option value="" selected></option>
                                          <option value="BUDDHA">BUDDHA</option>
                                          <option value="CATHOLIC">CATHOLIC</option>
                                          <option value="CHRISTIAN">CHRISTIAN</option>
                                          <option value="HINDU">HINDU</option>
                                          <option value="KONGHUCU">KONGHUCU</option>
                                          <option value="MOSLEM">MOSLEM</option>
                                          <option value="OTHERS">OTHERS</option>
                                        </select>
                                      </div>
                                    </dl>
                                    <dl class="row">
                                      <div class="col-sm-3">
                                        <p class="col-form-label">Employment</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Employment" name="Employment">
                                          <option value="" selected></option>
                                          <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                          <option value="Karyawan Swasta">Karyawan Swasta</option>
                                          <option value="Lainnya">Lainnya</option>
                                          <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                          <option value="PNS">PNS</option>
                                          <option value="TNI/POLRI">TNI/POLRI</option>
                                          <option value="Wiraswasta">Wiraswasta</option>
                                          <option>
                                        </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="col-form-label">Income</p>
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Income" name="Income">
                                          <option value="" selected></option>
                                          <option value="1-10 juta">1-10 juta</option>
                                          <option value="> 10-25 juta">> 10-25 juta</option>
                                          <option value="> 25-50 juta">> 25-50 juta</option>
                                          <option value="> 50-100 juta">> 50-100 juta</option>
                                          <option value="> 100 juta">> 100 juta</option>
                                        </select>
                                      </div>
                                    </dl>
                                  </div>
                                </div>

                                <!-- <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblGender">Gender</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="Gender" name="Gender" required> 
                                      <option value="" selected></option>
                                      <option value="FEMALE">Female</option>
                                      <option value="MALE">Male</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblBirthDate">Birth Place</p>
                                  <div class="col-sm-3">
                                    <input class="form-control" id="BirthPlace" name="BirthPlace" style="text-transform:uppercase" type="text" >
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblBirthDate">Birth Date</p>
                                  <div class="input-group date col-sm-3" id="div-group-birthdate" data-target-input="nearest">
                                    <input type="text" id="BirthDate" name="BirthDate" class="form-control datetimepicker-input" data-target="#div-group-birthdate" placeholder="mm/dd/yyyy" />
                                    <div class="input-group-append" data-target="#div-group-birthdate" data-toggle="datetimepicker">
                                      <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Marital Status</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="Marital" name="Marital"> 
                                      <option value="" selected></option>
                                      <option value="SINGLE">Single</option>
                                      <option value="MARRIED">Married</option>
                                      <option value="DIVORCE(D)">Divorce To Death</option>  
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Religion</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="Religion" name="Religion"> 
                                      <option value="" selected></option>
                                      <option value="BUDDHA">BUDDHA</option>
                                      <option value="CATHOLIC">CATHOLIC</option>
                                      <option value="CHRISTIAN">CHRISTIAN</option>
                                      <option value="HINDU">HINDU</option>
                                      <option value="KONGHUCU">KONGHUCU</option>
                                      <option value="MOSLEM">MOSLEM</option>
                                      <option value="OTHERS">OTHERS</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblIDType">ID Type</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="ID_Type" name="IDType" onchange="LstIDType_Change()">
                                      <option value="" selected></option> 
                                      <option value="Driving License">Driving License</option>
                                      <option value="ID Card">ID Card</option>
                                      <option value="KIMS">KIMS</option>
                                      <option value="KITAS(P)">KITAS(P)</option>                          
                                      <option value="KTP">KTP</option>
                                      <option value="OTHERS">OTHERS</option>
                                      <option value="Passport">Passport</option>
                                      <option value="SIM">SIM</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblID_Number">ID Number</p>
                                  <div class="col-sm-3">
                                    <input class="form-control" id="ID_No" name="ID_Number" type="text" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblID_Name">ID Name</p>
                                  <div class="col-sm-3">
                                    <input class="form-control" id="ID_Name" name="ID_Name" type="text" style="text-transform:uppercase" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">ID Date</p>
                                  <div class="input-group date col-sm-3" id="div-group-iddate" data-target-input="nearest">
                                    <input type="text" id="ID_Date" name="IDDate" class="form-control datetimepicker-input" data-target="#div-group-iddate" placeholder="mm/dd/yyyy" />
                                    <div class="input-group-append" data-target="#div-group-iddate" data-toggle="datetimepicker">
                                      <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Citizenship</label>
                                  <div class="col-form-label col-sm-2">
                                    <input type="checkbox" class="form-check-inputs" name="Citizen" id="WNIF" value="true" checked>
                                    <label class="form-check-label" for="exampleCheck2">Local</label>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Employment</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="Employment" name="Employment">
                                      <option value="" selected></option>
                                      <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                      <option value="Karyawan Swasta">Karyawan Swasta</option>
                                      <option value="Lainnya">Lainnya</option>
                                      <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                      <option value="PNS">PNS</option>
                                      <option value="TNI/POLRI">TNI/POLRI</option>
                                      <option value="Wiraswasta">Wiraswasta</option>
                                      <option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label">Income</p>
                                  <div class="col-sm-3">
                                    <select class="form-control select2bs4" id="Income" name="Income">
                                      <option value="" selected></option>
                                      <option value="1-10 juta">1-10 juta</option>
                                      <option value="> 10-25 juta">> 10-25 juta</option>
                                      <option value="> 25-50 juta">> 25-50 juta</option>
                                      <option value="> 50-100 juta">> 50-100 juta</option>
                                      <option value="> 100 juta">> 100 juta</option>
                                    </select>
                                  </div>
                                </div> -->
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-tax" role="tabpanel" aria-labelledby="profile-tabs-tax-tab">
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblTaxID">Tax ID</p>
                                  <div class="col-sm-3">
                                    <input class="form-control" id="TaxID" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="Tax">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblTaxName">Tax Name</p>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="TaxName" type="text" name="TaxName">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <p class="col-sm-3 col-form-label" id="LblTaxAddress">Tax Address</p>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="TaxAddress" type="text" name="TaxAddress">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                    <div class="form-group row justify-content-center">
                      <div class="col-sm-4">
                        <button type="submit" id="clickbtn" class="btn btn-block bg-gradient-primary col-5">Save</button>
                      </div>
                      <div class="col-sm-4">
                        <button type="submit" id="clearbtn" class="btn btn-block bg-gradient-danger col-5">Clear</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('scriptpage')
<script>
  let arrSCGroup;
  $(document).ready(function() {
    getcountry();
    getprovince();
    getcgroup();
    getscgroup();
    getoccupation();
    corporateF_chekcked();
    $('.select2bs4').select2({
      theme: 'bootstrap4',
	  });

    //get data option country
    async function getcountry() {
      try {
        const res = await getData('{{ route("listcountry") }}')
        var listbox = document.getElementById("Country");
        addOptionItem(listbox,res.Data,'Country','Description',true);
      } catch(err) {
        console.log(err);
      }
    }
    
    //get data option province
    async function getprovince() {
      try {
        const res = await getData('{{ route("listprovince") }}')
        var listbox = document.getElementById("Province");
        addOptionItem(listbox,res.Data,'PROVINCE','DESCRIPTION',true);
      } catch(err) {
        console.log(err);
      }
    }

    //get data option company group
    async function getcgroup() {
      try {
        const res = await getData('{{ route("listcgroup") }}')
        var listbox = document.getElementById("CGroup");
        addOptionItem(listbox,res.Data,'CGROUP','DESCRIPTION',true);
      } catch(err) {
        console.log(err);
      }
    }

    //get data option sub company group
    async function getscgroup() {
      try {
        const res = await getData('{{ route("listscgroup") }}')
        var listbox = document.getElementById("SCGroup");
        addOptionItem(listbox,res.Data,'SCGROUP','DESCRIPTION',true);
        arrSCGroup = res;
      } catch(err) {
        console.log(err);
      }
    }

    //get data option occupation
    async function getoccupation() {
      try {
        const res = await getData('{{ route("listoccupation") }}')
        var listbox = document.getElementById("Occupation");
        addOptionItem(listbox,res.Data,'Occupation','DESCRIPTION',true);
      } catch(err) {
        console.log(err);
      }
    }

    $('#div-group-modalbirthdate').datetimepicker({
      format: 'L'
    });
    $('#div-group-iddate').datetimepicker({
      format: 'L'
    });
    $('#div-group-birthdate').datetimepicker({
      format: 'L'
    });

  });

  // function addOptionItem(selectElement, data, LblValue, LblDescription, withBlankItem = true){
  //   if (withBlankItem){
  //     var option = document.createElement("OPTION");
  //     option.value = '';
  //     option.innerHTML = '';
  //     selectElement.appendChild(option);
  //   }
  //   for (j = 0; j < data.length; j++) {
  //       var option = document.createElement("OPTION");
  //       option.value = data[j][LblValue];
  //       option.innerHTML = data[j][LblDescription];
  //       selectElement.appendChild(option);
  //   }
  // }

  function CGroup_OnChange(CGroup) {
    var basedata = arrSCGroup.Data;
    var filterarray;
    if (CGroup == ''){
      filterarray = basedata;
    }else{
      filterarray = basedata.filter(asd => asd.CGROUP == CGroup);
    }
    // console.log(filterarray);

    // console.log(filterarray);

    document.getElementById("SCGroup").options.length = 0;
    var listBox = document.getElementById("SCGroup");
    var option = document.createElement("OPTION");
    option.value = '';
    option.innerHTML = '';
    listBox.appendChild(option);
    for (i = 0; i < filterarray.length; i++) {
      var listBox = document.getElementById("SCGroup");
      var option = document.createElement("OPTION");
      option.value = filterarray[i].SCGROUP;
      option.innerHTML = filterarray[i].DESCRIPTION;
      listBox.appendChild(option);
    }
  }

  var basedata = @json($data['Data']);
  // var tblProfile = $("#example1").DataTable({
  //   "processing": true,
  //   "serverSide": false,
  //   "ajax": {
  //       "url": "{{ route('listprofile') }}",
  //       "type": "GET"
  //   },
  //   "columns": [
  //         { "data": "ID" },
  //   ],

  // });
  // var asd = [];
  // var asd1 = ["image","dsjakdljsakjd"];
  // // asd[0].push = arrtest;
  // console.log(asd1);
  // console.log(basedata);

  var tblProfile = $("#example1").DataTable({
    "data": basedata,
    "columns": [
      {
        "defaultContent": ""
      },
      {
        "data":"ID"
      },
      {
        "data":"RefID"
      },
      {
        "data":"Name"
      },
      {
        "data":"Email"
      },
      {
        "data":"Mobile"
      },
      {
        "data":"ID_No"
      },
      {
        "data":"BirthDate"
      },
      {
        "defaultContent": "",
        render: function(data, type, row, meta) {
          var fn = "viewDetail('"+ row['ID'] +"')"
          var fn_history = "viewHistory('"+ row['ID'] +"')"
          var fn_delete = "showModalDel('"+ row['ID'] +"')"
          return '<img src="{{asset("dist/img/edit.svg")}}" width="25" height="25" type="button" title="Detail Profile" onclick="' + fn + '">' + 
          '<img src="{{asset("dist/img/file.svg")}}" width="25" height="25" onclick="'+ fn_history +'" type="button" id="btn-history" class="history-profile">' + 
          '<img src="{{asset("dist/img/trash.svg")}}" width="25" height="25" onclick="'+ fn_delete +'" type="button" class="btn-del-row-profile">';
        } 
      }
    ],
    "order": [[ 1, 'asc' ]],
    "responsive": true,
    "autoWidth": false,
    "searching": false,
  });

  tblProfile.on('order.dt search.dt', function () {
    tblProfile.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      cell.innerHTML = i+1;
    });
  }).draw();

  function corporateF_chekcked() {
    var cbxCorporate = document.getElementById("Corporatef");
    console.log(cbxCorporate.checked);
    if (cbxCorporate.checked == true) {
      // tidak wajib
      $('#LblIDType').css('font-weight','normal');
      $('#ID_Type').removeAttr('required');
      $('#LblID_Number').css('font-weight','normal');
      $('#ID_No').removeAttr('required');
      $('#LblID_Name').css('font-weight','normal');
      $('#ID_Name').removeAttr('required');
      $('#LblBirthPlace').css('font-weight','normal');
      $('#BirthPlace').removeAttr('required');
      $('#LblBirthDate').css('font-weight','normal');
      $('#BirthDate').removeAttr('required');
      $('#LblID_Name').css('font-weight','normal');
      $('#ID_Name').removeAttr('required');
      $('#LblGender').css('font-weight','normal');
      $('#Gender').removeAttr('required');

      // wajib
      $('#LblTaxID').css('font-weight','bold');
      $('#TaxID').attr('required','required');
      $('#LblCType').css('font-weight','bold');
      $('#CType').attr('required','required');
      $('#LblCGroup').css('font-weight','bold');
      $('#CGroup').attr('required','required');
      $('#LblSCGroup').css('font-weight','bold');
      $('#SCGroup').attr('required','required');
      $('#LblTaxName').css('font-weight','bold');
      $('#TxtTaxName').attr('required','required');
      $('#LblTaxAddress').css('font-weight','bold');
      $('#TxtTaxAddress').attr('required','required');
      $('#LblPicName').css('font-weight','bold');
      $('#Contact').attr('required','required');
    } else {
      // wajib
      $('#LblIDType').css('font-weight','bold');
      $('#ID_Type').attr('required','required');
      $('#LblID_Number').css('font-weight','bold');
      $('#ID_No').attr('required','required');
      $('#LblID_Name').css('font-weight','bold');
      $('#ID_Name').attr('required','required');
      $('#LblBirthPlace').css('font-weight','bold');
      $('#BirthPlace').attr('required','required');
      $('#LblBirthDate').css('font-weight','bold');
      $('#BirthDate').attr('required','required');
      $('#LblID_Name').css('font-weight','bold');
      $('#ID_Name').attr('required','required');
      $('#LblGender').css('font-weight','bold');
      $('#Gender').attr('required','required');

      // tidak wajib
      $('#LblTaxID').css('font-weight','normal');
      $('#TaxID').removeAttr('required');
      $('#LblCType').css('font-weight','normal');
      $('#CType').removeAttr('required');
      $('#LblCGroup').css('font-weight','normal');
      $('#CGroup').removeAttr('required');
      $('#LblSCGroup').css('font-weight','normal');
      $('#SCGroup').removeAttr('required');
      $('#LblTaxName').css('font-weight','normal');
      $('#TxtTaxName').removeAttr('required');
      $('#LblTaxAddress').css('font-weight','normal');
      $('#TxtTaxAddress').removeAttr('required');
      $('#LblPicName').css('font-weight','normal');
      $('#Contact').removeAttr('required');
    }
  }

  function LstIDType_Change() {
    var lstIDType = document.getElementById("ID_Type").value;
    if (lstIDType == 'KTP') {
      $("#ID_No").attr("minlength", "16");
      $("#ID_No").attr("maxlength", "16");
      $("#ID_No").attr("oninput", "this.value = this.value.replace(/[^0-9.]/g, '');");
    } else {
      $("#ID_No").removeAttr("maxlength");
      $("#ID_No").removeAttr("minlength");
      $("#ID_No").removeAttr("oninput");
    }

  }
  $("#clearbtn").click(function(event) {
    event.preventDefault();

    var form = event.currentTarget.form;
    var inputs = form.querySelectorAll('input');
    var selects = form.querySelectorAll('select');
    var checkboxs = form.querySelectorAll('input[type="checkbox"]');
    // console.log(checkbox);
    inputs.forEach(function(input, index) {
      if (input.type != 'checkbox') {
        if (input.name != 'UserOwner' && input.name != '_token') {
          input.value = null;
        }
      } else {
        input.removeAttribute('checked');
      }
    });

    selects.forEach(function(selects, index) {
      selects.value = null;
    });
    checkboxs.forEach(function(checkbox, index) {
      checkbox.checked = false;
    });
    $('.select2bs4').trigger('change');
    corporateF_chekcked();
    $('#FirstName').focus();
    $('#btn-sync').attr('disabled','disabled');
  });



  function Construct_ProfileName() {
    document.getElementById("Name").value = document.getElementById("FirstName").value + ((document.getElementById("MidName").value == "") ? "" : " " + document.getElementById("MidName").value) + ((document.getElementById("LastName").value == "") ? "" : " " + document.getElementById("LastName").value);
  }

  async function viewDetail(ID) {
      var data = tblProfile.rows().data();
      // var basedata = @json($data['Data']);
      // console.log(data);
      const filterarray = data.filter(asd => asd.ID == ID);
      // console.log('filterarray');
      // console.log(filterarray);
      parseDataToInput(filterarray);
      $('.select2bs4').trigger('change');
      corporateF_chekcked();
      $('#SCGroup').val(filterarray[0]['SCGroup']);
      $('#SCGroup').trigger('change');
      if ("{{config('app.DETAILADDRESSF')}}"){
        await getDistrict(filterarray[0]['Province'], filterarray[0]['District']);
        await getSubDistrict(filterarray[0]['District'],filterarray[0]['Province'], filterarray[0]['SubDistrict']);
        await getVillage(filterarray[0]['SubDistrict'],filterarray[0]['District'],filterarray[0]['Province'], filterarray[0]['Village']);
      }

      $('#btn-sync').removeAttr('disabled');

      $('#tabinquiry').attr('class','nav-link');
      $('#tabprofile').attr('class','nav-link active');
      $('#inquiry').attr('class','tab-pane');
      $('#profile').attr('class','active tab-pane');
      toastMessage('200','Data Successfully Retrivied');
  }

  function parseDataToInput(filterarray){
    // $('#WNIF').attr('checked','checked');
    for (var key in filterarray[0]){
      if($('#' + key).attr('type') == 'checkbox'){
        var cbx = document.getElementById(key);
        cbx.checked = filterarray[0][key];
        // if (filterarray[0][key] === true){
        //   $('#' + key).attr('checked','checked');
        // }else{
        //   $('#' + key).removeAttr('checked');
        // }
      }else{
        $('#' + key).val(filterarray[0][key]);
        // console.log ('Key : ' + key + ' Value : ' + filterarray[0][key]);
      }
    }
    $('#OwnerID').val("{{ session('ID') }}")
  }

  function GetFormattedDate(datestring) {
    var d = new Date(datestring);
    var month = d.getMonth() + 1;
    if (month < 10) {
      month = '0' + month;
    }
    var day = d.getDate();
    if (day < 10) {
      day = '0' + day;
    }
    var year = d.getFullYear();
    return month + "/" + day + "/" + year;
  }

  function viewHistory(ID){  
    var url = "{{ route('profile.history', ['id' => ':id']) }}";
    url = url.replace(':id',ID);
    console.log(url);
    $('#loadMe').modal('show');

    $.ajax({
      type: "GET",
      url: url,
      dataType: 'html'
    }).done(function(response) {
      console.log(response);
      $('#loadMe').modal('hide');
      $('#bodyHistory').html(response);
      $("#modal-history").modal('show');
    });
  }

  $(".form-save").submit(function(event) {
    event.preventDefault();
    $("#loadMe").modal('show');
    try{
      var a_href = $(this).attr('action');

      $.ajax({
        type: "POST",
        url: a_href, // This is what I have updated
        data: $(".form-save").serialize(),
      }).done(function(response) {
        // console.log(response);
        if (response.code == '200') {
          tblProfile.clear().rows.add(response.listprofile.Data).draw();
          viewDetail(response.Data[0]['ID'])
        }
        // $("#loadMe").modal("hide");
        toastMessage(response.code, response.message);
        if (response.code == '402') {
          $('#modal-sync').modal('show');
          setTimeout(() => {
            $('#cardbodyModalSync').html(response.html);
          }, 1000);
        }
        $("#loadMe").modal("hide");
      }).fail(function(xhr, status, error){
        console.log(xhr);
        throw error;
      });
    }catch(err){
      toastMessage('400',err);
      $("#loadMe").modal("hide");
      console.log('catch');
    }finally{
      // $("#loadMe").modal("hide");
      // console.log('finally');
    }
    
    
  });


  $(".form-sync").submit(function(event) {
    event.preventDefault();

    $('#div-overlay').empty();
    $('#div-overlay').append('<div class="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>');

    let ProfileID = $("input[name=ProfileID]").val();
    let Name = $("input[name=Name]").val();
    let email = $("input[name=email]").val();
    let Address = $("input[name=Address1]").val();
    let City = $("input[name=CityModal]").val();
    let ZipCode = $("input[name=ZipCode]").val();
    let ID_NO = $("input[name=ID_Number]").val();
    let Mobile = $("input[name=MobilePhone]").val();
    let Tax = $("input[name=TaxModal]").val();
    let BirthDate = $("input[name=ModalBirthDate]").val();
    let _token = $('meta[name="csrf-token"]').attr('content');
    var a_href = $(this).attr('action');
    console.log(_token);

    $.ajax({
      type: "POST",
      url: a_href, // This is what I have updated
      data: {
        ID: ProfileID,
        Name: Name,
        Email: email,
        Address: Address,
        City: City,
        ZipCode: ZipCode,
        ID_NO: ID_NO,
        Mobile: Mobile,
        BirthDate: BirthDate,
        TaxID: Tax,
        _token: _token
      },
    }).done(function(msg) {
      // $("#loadMe").modal("hide");
      console.log(msg);
      $('#cardbodyModalSync').html(msg);
      $('#div-overlay').empty();
    }).fail(function(msg) {
      console.log(msg);
      // $("#loadMe").modal("hide");
      $('#div-overlay').empty();
    });
  });


  function showModalDel(ID){
    url = "{{ route('profile.drop', ['id' => ':id']) }}"
    url = url.replace(':id',ID);

    $('#modaltitle').text('Delete Profile');

    $('#modalbody').empty();
    $('#modalbody').append('<p>Do you want to proceed?</p>');

    $('#modalfooter').empty();
    $('#modalfooter').append('<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>');
    $('#modalfooter').append('<a href="' + url + '" class="btn btn-danger btn-ok" id="btnDel">Delete</a>');

    $("#modal-general").modal({
      backdrop: "static", //remove ability to close modal with click
      keyboard: false, //remove option to close with keyboard
      show: true //Display loader!
    });
  }

  // $(".btn-del-row-profile").click(function(event) {
  // 	event.preventDefault();
  // 	var a_href = $(this).attr('href');

  // 	$('#modaltitle').text('Delete Profile');

  // 	$('#modalbody').empty();
  // 	$('#modalbody').append('<p>Do you want to proceed?</p>');

  // 	$('#modalfooter').empty();
  // 	$('#modalfooter').append('<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>');
  // 	$('#modalfooter').append('<a href="' + a_href + '" class="btn btn-danger btn-ok" id="btnDel">Delete</a>');

  // 	$("#modal-general").modal({
  // 		backdrop: "static", //remove ability to close modal with click
  // 		keyboard: false, //remove option to close with keyboard
  // 		show: true //Display loader!
  // 	});
  // });

  $(".btn-upload").click(function(event) {
    event.preventDefault();

    $('#modaltitle').text('Upload Profile Document');

    $('#modalbody').empty();
    $.ajax({
      type: "GET",
      url: '{{route("profile.uploadDocument")}}',
      dataType: 'html'
    }).done(function(msg) {
      $('#modal-body').html(msg);
      $("#modal-Doc").modal({
        backdrop: "true", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
    });
  });

  $("#btn-search-profile").click(async function(event){
    event.preventDefault();
    try{
      var ID = '';
      var name = $('#SearchName').val();
      var email = $('#SearchEmail').val();
      var id_no = $('#SearchID_No').val();
      var mobile = $('#SearchMobileNo').val();
      var url = "{{ route('profile.search') }}?ID=" + ID + "&name=" + name + "&email=" + email + "&id_no=" + id_no + "&mobile=" + mobile;
      // console.log(url);

      var response = await getDataNew(url);
      // console.log(response);
      if (response.code == '200'){
        drawDataTable(tblProfile,response.Data);
      }
      toastMessage(response.code,response.message);
    }catch(err){
      toastMessage('400','Whoops, Something Went Wrong, please contact your Administrator.');
    }
  });
  
  // document.getElementById('btn-search-profile').addEventListener("click", myFunction);  

  async function drawDataTable(table,data){
    table.clear().draw();
    table.rows.add(data);
    table.columns.adjust().draw();
    // await sleep(1);
    table.columns.adjust().draw(); 
  }

  async function getDistrict(province, value = '') {
    try {
      var url = "{{ route('listDistrict') }}?province=" + province
      const res = await getData(url)
      var listbox = document.getElementById("District");
      $('#District').empty();
      addOptionItem(listbox,res.Data,'District','Description',true);
      if (value != ''){
        $('#District').val(value);
        $('#District').trigger('change');
      }
    } catch(err) {
      console.log(err);
    }
  }

  $("#Province").on("select2:select", function () {
    getDistrict(this.value);
  });

  async function getSubDistrict(district,province, value = '') {
    try {
      var url = "{{ route('listSubDistrict') }}?district=" + district + "&province=" + province
      const res = await getData(url)
      var listbox = document.getElementById("SubDistrict");
      $('#SubDistrict').empty();
      addOptionItem(listbox,res.Data,'SubDistrict','Description',true);
      if (value != ''){
        $('#SubDistrict').val(value);
        $('#SubDistrict').trigger('change')
      }
    } catch(err) {
      console.log(err);
    }
  }

  $("#District").on("select2:select", function () {
    getSubDistrict(this.value,$('#Province').val());
  });

  async function getVillage(subdistrict,district,province, value = '') {
    try {
      var url = "{{ route('listVillage') }}?subdistrict=" + subdistrict + "&district=" + district + "&province=" + province
      const res = await getData(url)
      var listbox = document.getElementById("Village");
      $('#Village').empty();
      addOptionItem(listbox,res.Data,'Village','Description',true);
      if (value != ''){
        $('#Village').val(value);
        $('#Village').trigger('change');
      }
    } catch(err) {
      console.log(err);
    }
  }

  $("#SubDistrict").on("select2:select", function () {
    getVillage(this.value,$('#District').val(),$('#Province').val());
  });

  $('#btn-sync').on('click', function(){
    // console.log('haha');
    $('.form-save').trigger('submit');
  });

  // $('#SOI').on('change', function(event){
  //   if (this.value)
  // });
</script>
@endsection