@extends('layout/main')
@section('title','ACA INSURANCE | Profile')

@section('maincontent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <main>
        <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header p-2">
                              <ul class="nav nav-pills mb-3">
                                <li class="nav-item"><a id="tabinquiry" class="{{ empty($tabname) || $tabname == 'inquiry' ? 'nav-link active' : 'nav-link' }}" href="#inquiry" data-toggle="tab">Inquiry</a></li>
                                <li class="nav-item"><a id="tabprofile" class="{{ empty($tabname) || $tabname == 'profile' ? 'nav-link active' : 'nav-link' }}" href="#profile" data-toggle="tab">Profile</a></li>
                                
                                <!-- <a href="{{route('profile.uploadDocument')}}" type="delete" class="btn btn-outline-danger btn-sm btn-upload">Upload File</a> -->
                              </ul>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="{{ empty($tabname) || $tabname == 'inquiry' ? 'tab-pane fade show active' : 'tab-pane fade' }}" id="inquiry">
                                      <div class="card-body">
                                          <table id="example1" class="table table-bordered table-striped">
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
                                              <tbody>
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
                                                          <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetail('{{ $datas['ID'] }}')">Detail</a>
                                                          <a href="{{ route('profile.history', ['id' =>$datas['ID']]) }}" type="button" id="btn-history" class="btn btn-outline-info btn-sm history-profile" >history</a>
                                                          <a href="{{ route('profile.drop', ['id' =>$datas['ID']]) }}" type="delete" class="btn btn-outline-danger btn-sm btn-del-row-profile">Delete</a>
                                                          <!-- <a href="{{ route('profile.drop', ['id' =>$datas['ID']]) }}" type="delete" class="btn btn-outline-danger btn-sm" id="btnDel" data-toggle="modal" data-target="#modal-general" data-message="You are about to delete profile data, this procedure is irreversible." data-id="{{$datas['ID']}}" data-backdrop="static">Delete</a> -->
                                                          
                                                      </td>
                                                  </tr>
                                              @endforeach
                                              @endif
                                              </tbody>
                                          </table>
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
                                                    <div class="modal-body" id="bodyHistory">
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /.Modal History -->
                                                        
                                        </div>
                                    </div>
                                    </div>

                                  <div class="{{ empty($tabname) || $tabname == 'profile' ? 'tab-pane fade show active' : 'tab-pane fade' }}" id="profile">
                                    <div class="modal fade" id="modal-sync" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            <div id="div-overlay">
                                                            
                                                            </div>
                                                                <div class="modal-header">
                                                                <h4 class="modal-title" id="titleModalSync">Profile Inquiry</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <form class="form-horizonta form-sync" action="{{ route('profile.sync') }}" method="post"> 
                                                                @csrf
                                                                    <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Profile ID / Name</label>
                                                                            <div class="col-sm-6">
                                                                            <input class="form-control" id="TxtProfileIDModal" type="text" name="ProfileID" required>
                                                                            </div>
                                                                    </div>
                                                                    <!-- <div class="form-group row">
                                                                        <p class="col-sm-3 col-form-label">Name</p>
                                                                            <div class="col-sm-6">
                                                                                <input class="form-control" id="TxtProfileNameModal" name="Name" type="email">
                                                                            </div>
                                                                    </div> -->
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
                                                                                <input class="form-control" id="TxtProfileMobileModal" name="MobilePhone" type="number">

                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <p class="col-sm-3 col-form-label">Tax ID</p>
                                                                            <div class="col-sm-6">
                                                                                <input class="form-control" id="TxtTaxIDModal" type="text" name="TaxModal">
                                                                    </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <p class="col-sm-3 col-form-label">Birth Date</p>
                                                                            <div class="input-group date col-sm-6" id="reservationdate" data-target-input="nearest">
                                                                                <input type="date" class="form-control datetimepicker-input" data-target="#TxtBirthDate" id="ModalTxtBirthDate" name="ModalBirthDate" />
                                                                                    <div class="input-group-append" data-target="#ModalTxtBirthDate" data-toggle="datetimepicker"></div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-secondary">Clear All</button>
                                                                        <!-- <Button type="button" class="btn btn-primary sync-profile" id="search" name="search">search</button> -->
                                                                        <Button type="submit" class="btn btn-primary sync-profile" id="search" name="search">search</button>
                                                                        <!-- <a href="{{ route('profile.sync') }}" type="button" class="btn btn-primary sync-profile">Search</a> -->
                                                                    </div>
                                                                </form>
                                                                
                                                                <div class="card-body" id="cardbodyModalSync">
                                                                <table id="tblSync" class="table table-bordered table-striped" style="width:100%">
                                                                </table>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                 </div>
                                                            <!-- /.modal-dialog -->
                                </div>
                                                        <!-- /.modal -->
                                    <form class="form-horizontal form-save" id="needs-validation" action="{{ route('profile.save') }}" method="post">
                                    @csrf
                                                          <div class="form-group row">
                                                              <p for="TxtRefNo" class="col-sm-3 col-form-label">Profile ID</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileRefID" name="RefID" type="text" value="{{old('RefID')}}" readonly="readonly">
                                                              </div>
                                                              <div class="col-sm-4" style="display:none;">
                                                                  <input class="form-control" id="TxtProfileRefDesc" name="RefName" type="text" value="{{old('RefName')}}">
                                                              </div>
                                                              <div class="col-sm-2">
                                                              <button type="button" id="BtnSync" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-sync">Sync</button>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row" style="display:none;">
                                                                <label class="col-sm-3 col-form-label">Profile ID</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control" id="TxtProfileID" type="text" name="ProfileID" value="{{ old('ProfileID') }}" >
                                                                </div>
                                                           </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">First Name</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtFirstName" type="text" name='FirstName' style="text-transform:uppercase" value="{{ old('FirstName') }}" onchange="Construct_ProfileName();" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Middle Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtMiddleName" name="MiddleName" type="text"  style="text-transform:uppercase" value="{{ old('MiddleName') }}" onchange="Construct_ProfileName();">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Last Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtLastName" name="LastName" type="text"  style="text-transform:uppercase" value="{{ old('LastName') }}" onchange="Construct_ProfileName();">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Full Name</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileName" name="Name" type="text"  style="text-transform:uppercase" value="{{ old('Name') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Corporate</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxCorporateF" name="Corporate" value="true" onclick="corporateF_chekcked()" {{ (old('Corporate') == 'true') ? 'checked' : '' }}>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblIDType">ID Type</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstIDType" name="IDType" onchange="LstIDType_Change()">
                                                                  <!-- <select class="form-control" id="LstIDType" name="IDType" > -->
                                                                      @if (old('IDType') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      
                                                                      @if (old('IDType') == 'KIMS')
                                                                      <option value="KIMS" selected>KIMS</option>
                                                                      @else
                                                                      <option value="KIMS">KIMS</option>
                                                                      @endif

                                                                      @if (old('IDType') == 'KITAS')
                                                                      <option value="KITAS" selected>KITAS</option>
                                                                      else
                                                                      <option value="KITAS">KITAS</option>
                                                                      @endif

                                                                      @if (old('IDType') == 'KTP')
                                                                      <option value="KTP" selected>KTP</option>
                                                                      @else
                                                                      <option value="KTP">KTP</option>
                                                                      @endif

                                                                      @if (old('IDType') == 'OTHERS')
                                                                      <option value="OTHERS" selected>OTHERS</option>
                                                                      @else
                                                                      <option value="OTHERS">OTHERS</option>
                                                                      @endif

                                                                      @if (old('IDType') == 'PASSPORT')
                                                                      <option value="PASSPORT" selected>PASSPORT</option>
                                                                      @else
                                                                      <option value="PASSPORT">PASSPORT</option>
                                                                      @endif

                                                                      @if (old('IDType') == 'SIM')
                                                                      <option value="SIM" selected>SIM</option>
                                                                      @else
                                                                      <option value="SIM">SIM</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblID_Number">ID Number</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="ID_Number" name="ID_Number" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('ID_Number') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblID_Name">ID Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="ID_Name" name="ID_Name" type="text"  style="text-transform:uppercase" value="{{ old('ID_Name') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">ID Date</p>
                                                              <div class="input-group date col-sm-3" id="reservationdate" data-target-input="nearest">
                                                                  <input type="date" class="form-control datetimepicker-input" data-target="#TxtIDDate" id="TxtIDDate" name="IDDate" value="{{ old('IDDate') }}" />
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">ID Salutation</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstSalutation" name="Salutation" >
                                                                      @if (old('Salutation') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'PD')
                                                                      <option value="PD" selected>PD</option>
                                                                      @else
                                                                      <option value="PD">PD</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'PT')
                                                                      <option value="PT" selected>PT</option>
                                                                      @else
                                                                      <option value="PT">PT</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'CV')
                                                                      <option value="CV" selected>CV</option>
                                                                      @else
                                                                      <option value="CV">CV</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Mr')
                                                                      <option value="Mr" selected>Mr</option>
                                                                      @else
                                                                      <option value="Mr">Mr</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Mrs')
                                                                      <option value="Mrs" selected>Mrs</option>
                                                                      @else
                                                                      <option value="Mrs">Mrs</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Miss')
                                                                      <option value="Miss" selected>Miss</option>
                                                                      @else
                                                                      <option value="Miss">Miss</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Tn')
                                                                      <option value="Tn" selected>Tn</option>
                                                                      @else
                                                                      <option value="Tn">Tn</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Ny')
                                                                      <option value="Ny" selected>Ny</option>
                                                                      @else
                                                                      <option value="Ny">Ny</option>
                                                                      @endif

                                                                      @if (old('Salutation') == 'Nn')
                                                                      <option value="Nn" selected>Nn</option>
                                                                      @else
                                                                      <option value="Nn">Nn</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Initial</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileInitial" name="Initial" type="text" value="{{ old('Initial') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Title</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtTitle" name="Title" type="text" value="{{ old('Title') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Email Address</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileEmail" name="Email" type="email" value="{{ old('Email') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Mobile Phone</label>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileMobile" name="MobilePhone" type="number" value="{{ old('MobilePhone') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Phone</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfilePhone" name="Phone" type="number" value="{{ old('Phone') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">User Owner</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtOwnerID" type="text" name="UserOwner" value="{{ Session::get('ID')}}" readonly="readonly">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Address 1</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_1" name="Address1" type="text" value="{{ old('Address1') }}" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Address 2</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_2" name="Address2" type="text" value="{{ old('Address2') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Address 3</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_3" name="Address3" type="text" value="{{ old('Address3') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Country / City</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstCountry" name="Country">
                                                                      @if (old('Country') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      @if ($Country['code'] == '200')
                                                                      @foreach ($Country['Data'] as $dataCountry)
                                                                      @if (old('Country') == $dataCountry['Country'])
                                                                      <option value="{{$dataCountry['Country']}}" selected>{{$dataCountry['Description']}}</option>
                                                                      @else
                                                                      <option value="{{$dataCountry['Country']}}">{{$dataCountry['Description']}}</option>
                                                                      @endif
                                                                      @endforeach
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtCity" name="City"  style="text-transform:uppercase" type="text" value="{{ old('City') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Profile Type</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstPType" name="PType">
                                                                      @if (old('PType') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('PType') == 'C')
                                                                      <option value="C" selected>Captive</option>
                                                                      @else
                                                                      <option value="C">Captive</option>
                                                                      @endif
                                                                      
                                                                      @if (old('PType') == 'DIRECT BUSINESS')
                                                                      <option value="D" selected>Direct Business</option>
                                                                      @else
                                                                      <option value="D">Direct Business</option>
                                                                      @endif
                                                                      
                                                                      @if (old('PType') == 'I')
                                                                      <option value="I" selected>Inward Business</option>
                                                                      @else
                                                                      <option value="I">Inward Business</option>
                                                                      @endif

                                                                      @if (old('PType') == 'M')
                                                                      <option value="M" selected>Intermediaries</option>
                                                                      @else
                                                                      <option value="M">Intermediaries</option>
                                                                      @endif

                                                                      @if (old('PType') == 'O')
                                                                      <option value="O" selected>Outward Business</option>
                                                                      @else
                                                                      <option value="O">Outward Business</option>
                                                                      @endif

                                                                      @if (old('PType') == 'T')
                                                                      <option value="T" selected>Others</option>
                                                                      @else
                                                                      <option value="T">Others</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                            </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Province</label>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstProvince" name="Province" required>
                                                                      @if (old('Province') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      @if ($Province['code'] == '200')
                                                                      @foreach ($Province['Data'] as $dataProvince)
                                                                      @if (old('Province') == $dataProvince['PROVINCE'])
                                                                      <option value="{{$dataProvince['PROVINCE']}}" selected>{{$dataProvince['DESCRIPTION']}}</option>
                                                                      @else
                                                                      <option value="{{$dataProvince['PROVINCE']}}">{{$dataProvince['DESCRIPTION']}}</option>
                                                                      @endif
                                                                      @endforeach
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                            </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">ZipCode</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileZipCode" name="ZipCode" type="text" value="{{ old('ZipCode') }}" maxlength="10">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblGender">Gender</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstGender" name="Gender">
                                                                      @if (old('Gender') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('Gender') == 'F')
                                                                      <option value="F" selected>Female</option>
                                                                      @else
                                                                      <option value="F">Female</option>
                                                                      @endif

                                                                      @if (old('Gender') == 'M')
                                                                      <option value="M" selected>Male</option>
                                                                      @else
                                                                      <option value="M">Male</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                          <p class="col-sm-3 col-form-label" id="LblBirthDate">Birth Place / Birth Date</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtBirthPlace" name="BirthPlace" style="text-transform:uppercase" type="text" value="{{ old('BirthPlace') }}">
                                                              </div>
                                                              <div class="input-group date col-sm-3" id="reservationdate" data-target-input="nearest">
                                                                  <input type="date" class="form-control datetimepicker-input" data-target="#TxtBirthDate" id="TxtBirthDate" name="BirthDate" value="{{ old('BirthDate') }}" />
                                                                  <div class="input-group-append" data-target="#TxtBirthDate" data-toggle="datetimepicker">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Line of Business</label>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstOccupation" name="Occupation" value="{{ old('Occupation') }}" required>
                                                                      @if (old('Occupation') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      @if ($Occupation['code'] == '200')
                                                                        @foreach ($Occupation['Data'] as $dataOccupation)
                                                                            @if (old('Occupation') == $dataOccupation['Occupation'])
                                                                            <option value="{{$dataOccupation['Occupation']}}" selected>{{$dataOccupation['DESCRIPTION']}}</option>
                                                                            @else
                                                                            <option value="{{$dataOccupation['Occupation']}}">{{$dataOccupation['DESCRIPTION']}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCName" name="CoName" type="text" value="{{ old('CoName') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Address</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCAddress" name="CoAddress" type="text" value="{{ old('CoAddress') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Phone</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtCPhone" name="CoPhone" type="number" value="{{ old('CoPhone') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Email</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCEmail" name="CoEmail"type="email" value="{{ old('CoEmail') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblTaxID">Tax ID</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtTaxID" type="number" name="Tax" value="{{ old('Tax') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblTaxName">Tax Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtTaxName" type="text" name="TaxName" value="{{ old('TaxName') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblTaxAddress">Tax Address</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtTaxAddress" type="text" name="TaxAddress" value="{{ old('TaxAddress') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblCType">Company Type</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstComType" name="CompanyType" value="CAPTIVE">
                                                                      @if (old('CompanyType') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'BUMN')
                                                                      <option value="BUMN" selected>BUMN</option>
                                                                      @else
                                                                      <option value="BUMN">BUMN</option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'CAPTIVE')
                                                                      <option value="CAPTIVE" selected>CAPTIVE</option>
                                                                      @else
                                                                      <option value="CAPTIVE">CAPTIVE</option>
                                                                      @endif
                                                                      
                                                                      @if (old('CompanyType') == 'DIRECT BUSINESS')
                                                                      <option value="DIRECT BUSINESS" selected>DIRECT BUSINESS</option>
                                                                      @else
                                                                      <option value="DIRECT BUSINESS">DIRECT BUSINESS</option>
                                                                      @endif
                                                                      
                                                                      @if (old('CompanyType') == 'GOVERMENT')
                                                                      <option value="GOVERMENT" selected>GOVERMENT</option>
                                                                      @else
                                                                      <option value="GOVERMENT">GOVERMENT</option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'J.VENTURE')
                                                                      <option value="J.VENTURE" selected>J.VENTURE</option>
                                                                      @else
                                                                      <option value="J.VENTURE">J.VENTURE</option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'JOINT VENTURE')
                                                                      <option value="JOINT VENTURE" selected>JOINT VENTURE</option>
                                                                      @else
                                                                      <option value="JOINT VENTURE">JOINT VENTURE</option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'OVERSEAS')
                                                                      <option value="OVERSEAS" selected>OVERSEAS</option>
                                                                      @else
                                                                      <option value="OVERSEAS">OVERSEAS</option>
                                                                      @endif
                                                                      
                                                                      @if (old('CompanyType') == 'SWASTA')
                                                                      <option value="SWASTA" selected>SWASTA</option>
                                                                      @else
                                                                      <option value="SWASTA">SWASTA</option>
                                                                      @endif

                                                                      @if (old('CompanyType') == 'PRIVATE')
                                                                      <option value="PRIVATE" selected>PRIVATE</option>
                                                                      @else
                                                                      <option value="PRIVATE">PRIVATE</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                            </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label"id="LblCGroup">Company Group</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstComGroup" name="CGroup" onchange="CGroup_OnChange(this.value)">
                                                                      @if (old('CGroup') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      @if ($CGroup['code'] == '200')
                                                                        @foreach ($CGroup['Data'] as $dataCGroup)
                                                                            @if (old('CGroup') == $dataCGroup['CGROUP'])
                                                                            <option value="{{$dataCGroup['CGROUP']}}" selected>{{$dataCGroup['DESCRIPTION']}}</option>
                                                                            @else
                                                                            <option value="{{$dataCGroup['CGROUP']}}">{{$dataCGroup['DESCRIPTION']}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                            </div>
                                                            <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label" id="LblSCGroup">Sub Company Group</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstSubComGroup" name="SubCompanyGroup">
                                                                      @if (old('SubCompanyGroup') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif
                                                                      @if ($SCGroup['code'] == '200')
                                                                        @foreach ($SCGroup['Data'] as $dataSCGroup)
                                                                            @if (old('SubCompanyGroup') == $dataSCGroup['SCGROUP'])
                                                                            <option value="{{$dataSCGroup['SCGROUP']}}" selected>{{$dataSCGroup['DESCRIPTION']}}</option>
                                                                            @else
                                                                            <option value="{{$dataSCGroup['SCGROUP']}}">{{$dataSCGroup['DESCRIPTION']}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                            </div>
                                                            <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">PIC Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtContact" name="Contact" type="text" value="{{ old('Contact') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">PIC Address</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtContactAddress" name="ConAddress" type="text" value="{{ old('ConAddress') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">PIC Phone</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtContactPhone" name="ConPhone" type="number" value="{{ old('ConPhone') }}">
                                                              </div>
                                                          </div>
                                                            <div class="form-group row" style="display:none;">
                                                              <p class="col-sm-3 col-form-label">PIC Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPICName_1" name="PICName_1" type="text" value="{{ old('PICName') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row" style="display:none;">
                                                              <p class="col-sm-3 col-form-label">PIC Title</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPICTitle_1" name="PICTitle_1" type="text" value="{{ old('PICTitle') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Religion</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="religion" name="Religion"> 
                                                                      @if (old('Religion') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('Religion') == 'BUDDHA')
                                                                      <option value="BUDDHA" selected>BUDDHA</option>
                                                                      @else
                                                                      <option value="BUDDHA">BUDDHA</option>
                                                                      @endif

                                                                      @if (old('Religion') == 'CATHOLIC')
                                                                      <option value="CATHOLIC" selected>CATHOLIC</option>
                                                                      @else
                                                                      <option value="CATHOLIC">CATHOLIC</option>
                                                                      @endif

                                                                      @if (old('Religion') == 'CHRISTIAN')
                                                                      <option value="CHRISTIAN" selected>CHRISTIAN</option>
                                                                      @else
                                                                      <option value="CHRISTIAN">CHRISTIAN</option>
                                                                      @endif

                                                                      @if (old('Religion') == 'HINDU')
                                                                      <option value="HINDU" selected>HINDU</option>
                                                                      @else
                                                                      <option value="HINDU">HINDU</option>
                                                                      @endif

                                                                      @if (old('Religion') == 'MOSLEM')
                                                                      <option value="MOSLEM" selected>MOSLEM</option>
                                                                      @else
                                                                      <option value="MOSLEM">MOSLEM</option>
                                                                      @endif

                                                                      @if (old('Religion') == 'OTHERS')
                                                                      <option value="OTHERS" selected>OTHERS</option>
                                                                      @else
                                                                      <option value="OTHERS">OTHERS</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Income</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstIncome" name="Income">
                                                                      @if (old('Income') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('Income') == '1-10 juta')
                                                                      <option value="1-10 juta" selected>1-10 juta</option>
                                                                      @else
                                                                      <option value="1-10 juta">1-10 juta</option>
                                                                      @endif

                                                                      @if (old('Income') == '> 10-25 juta')
                                                                      <option value="> 10-25 juta" selected>> 10-25 juta</option>
                                                                      @else
                                                                      <option value="> 10-25 juta">> 10-25 juta</option>
                                                                      @endif

                                                                      @if (old('Income') == '> 25-50 juta')
                                                                      <option value="> 25-50 juta" selected>> 25-50 juta</option>
                                                                      @else
                                                                      <option value="> 25-50 juta">> 25-50 juta</option>
                                                                      @endif

                                                                      @if (old('Income') == '> 50-100 juta')
                                                                      <option value="> 50-100 juta" selected>> 50-100 juta</option>
                                                                      @else
                                                                      <option value="> 50-100 juta">> 50-100 juta</option>
                                                                      @endif

                                                                      @if (old('Income') == '> 100 juta')
                                                                      <option value="> 100 juta" selected>> 100 juta</option>
                                                                      @else
                                                                      <option value="> 100 juta">> 100 juta</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Employment</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtEmployment" name="Employment" type="text" value="{{ old('Employment') }}">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Citizenship</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" name="Citizen" id="CbxWNIF" value="true" {{ (old('Citizen') == 'true') ? 'checked' : '' }}>
                                                                  <label class="form-check-label" for="exampleCheck2">Local</label>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Martial Status</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstMarital" name="Marital" >
                                                                      @if (old('Marital') == '')
                                                                      <option value="" selected></option>
                                                                      @else
                                                                      <option value=""></option>
                                                                      @endif

                                                                      @if (old('Marital') == 'Single')
                                                                      <option value="Single" selected>Single</option>
                                                                      @else
                                                                      <option value="Single">Single</option>
                                                                      @endif

                                                                      @if (old('Marital') == 'Married')
                                                                      <option value="Married" selected>Married</option>
                                                                      @else
                                                                      <option value="Married">Married</option>
                                                                      @endif

                                                                      @if (old('Marital') == 'Divorce To Death')
                                                                      <option value="Divorce To Death" selected>Divorce To Death</option>
                                                                      @else
                                                                      <option value="Divorce To Death">Divorce To Death</option>
                                                                      @endif
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Syncronize Profile</p>
                                                              <div class="col-form-label col-sm-2"> 
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxForceSyncF" name="Sync" value="true" {{ (old('Sync') == 'true') ? 'checked' : '' }}>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row" style="display:none;">
                                                              <p class="col-sm-3 col-form-label">Dump</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxDumpF" name="Dump" value="true" {{ (old('Dump') == 'true') ? 'checked' : '' }}>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Restricted</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxRestrictedF" name="Restricted" value="true" {{ (old('Restricted') == 'true') ? 'checked' : '' }} disabled>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row justify-content-center">
                                                            <div class="col-sm-4">
                                                              <button type="submit" id="clickbtn" class="btn btn-block bg-gradient-primary col-5">Save</button>
                                                            </div>
                                                            <div class="col-sm-4">
                                                              <button type="submit" id="clearbtn" class="btn btn-block bg-gradient-danger col-5" >Clear</button>
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
          <!-- cobain modal delete -->
          <div class="modal fade" id="modal-general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h4 class="modal-title" id="modaltitle"></h4>
                </div>
            
                <div class="modal-body" id="modalbody">
                </div>
                
                <div class="modal-footer" id="modalfooter">
                </div>
            </div>
        </div>
    </div>
    <!-- batas bawah -->
        </main>
    </section>
      
      </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Modal -->
<div class="modal" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <!-- <div class="modal-content"> -->
      <div class="modal-body text-center">
      <div class="spinner-border text-info" style="width: 4rem; height: 4rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      </div>
    <!-- </div> -->
  </div>
</div>


      
@endsection

@section('scriptpage')

<script>
$( document ).ready(function() {
    console.log('{{session("errors")}}');
    corporateF_chekcked();
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
function corporateF_chekcked(){
    var cbxCorporate = document.getElementById("CbxCorporateF")
    if (cbxCorporate.checked == true) {
        // tidak wajib
        document.getElementById("LblIDType").style.fontWeight = "normal";
        document.getElementById("LstIDType").removeAttribute("required");
        document.getElementById("LblID_Number").style.fontWeight = "normal";
        document.getElementById("ID_Number").removeAttribute("required");
        document.getElementById("LblID_Name").style.fontWeight = "normal";
        document.getElementById("ID_Name").removeAttribute("required");
        document.getElementById("LblBirthDate").style.fontWeight = "normal";
        document.getElementById("TxtBirthPlace").removeAttribute("required");
        document.getElementById("TxtBirthDate").removeAttribute("required");
        document.getElementById("LblID_Name").style.fontWeight = "normal";
        document.getElementById("ID_Name").removeAttribute("required");
        document.getElementById("LblGender").style.fontWeight = "normal";
        document.getElementById("LstGender").removeAttribute("required");

        // wajib
        document.getElementById("LblTaxID").style.fontWeight = "bold";
        document.getElementById("TxtTaxID").setAttribute("required", "");
        document.getElementById("LblCType").style.fontWeight = "bold";
        document.getElementById("LstComType").setAttribute("required", "");
        document.getElementById("LblCGroup").style.fontWeight = "bold";
        document.getElementById("LstComGroup").setAttribute("required", "");
        document.getElementById("LblCGroup").style.fontWeight = "bold";
        document.getElementById("LstComGroup").setAttribute("required", "");
        document.getElementById("LblSCGroup").style.fontWeight = "bold";
        document.getElementById("LstSubComGroup").setAttribute("required", "");
        document.getElementById("LblTaxName").style.fontWeight = "bold";
        document.getElementById("TxtTaxName").setAttribute("required", "");
        document.getElementById("LblTaxAddress").style.fontWeight = "bold";
        document.getElementById("TxtTaxAddress").setAttribute("required", "");
    }else{
        // wajib
        document.getElementById("LblIDType").style.fontWeight = "bold";
        document.getElementById("LstIDType").setAttribute("required", "");
        document.getElementById("LblID_Number").style.fontWeight = "bold";
        document.getElementById("ID_Number").setAttribute("required", "");
        document.getElementById("LblID_Name").style.fontWeight = "bold";
        document.getElementById("ID_Name").setAttribute("required", "");
        document.getElementById("LblBirthDate").style.fontWeight = "bold";
        document.getElementById("TxtBirthPlace").setAttribute("required", "");
        document.getElementById("TxtBirthDate").setAttribute("required", "");
        document.getElementById("LblGender").style.fontWeight = "bold";
        document.getElementById("LstGender").setAttribute("required", "");

        // tidak wajib
        document.getElementById("LblTaxID").style.fontWeight = "normal";
        document.getElementById("TxtTaxID").removeAttribute("required");
        document.getElementById("LblCType").style.fontWeight = "normal";
        document.getElementById("LstComType").removeAttribute("required");
        document.getElementById("LblCGroup").style.fontWeight = "normal";
        document.getElementById("LstComGroup").removeAttribute("required");
        document.getElementById("LblSCGroup").style.fontWeight = "normal";
        document.getElementById("LstSubComGroup").removeAttribute("required");
        document.getElementById("LblTaxName").style.fontWeight = "normal";
        document.getElementById("TxtTaxName").removeAttribute("required");
        document.getElementById("LblTaxAddress").style.fontWeight = "normal";
        document.getElementById("TxtTaxAddress").removeAttribute("required");
    }
}
function LstIDType_Change(){
    var lstIDType = document.getElementById("LstIDType").value;
    console.log(lstIDType);
    if (lstIDType == 'KTP') {
        document.getElementById("ID_Number").setAttribute("minlength", "16");
        document.getElementById("ID_Number").setAttribute("maxlength", "16");
    }else{
        document.getElementById("ID_Number").removeAttribute("minlength");
        document.getElementById("ID_Number").removeAttribute("maxlength");
    }
}
$("#clearbtn").click(function(event){
        event.preventDefault();

    var form = event.currentTarget.form;
    var inputs = form.querySelectorAll('input');
    var selects = form.querySelectorAll('select');
    inputs.forEach(function(input, index){
    if (input.type != 'checkbox'){
        if (input.name != 'UserOwner' && input.name != '_token') {
            input.value = null;
        }
    }else{
        input.checked = false;
    }
    });

    selects.forEach(function(selects, index){
        selects.value = null;
    });
    corporateF_chekcked();
    $('#TxtFirstName').focus();
});
function CGroup_OnChange(CGroup){
    var basedata = @json($SCGroup['Data']);
    const filterarray = basedata.filter(asd => asd.CGROUP == CGroup);

    document.getElementById("LstSubComGroup").options.length = 0;
    var listBox = document.getElementById("LstSubComGroup");
    var option = document.createElement("OPTION");
    option.value = '';
    option.innerHTML = '';
    listBox.appendChild(option);
    for (i = 0; i < filterarray.length; i++) {
        var listBox = document.getElementById("LstSubComGroup");
        var option = document.createElement("OPTION");
        option.value = filterarray[i].SCGROUP;
        option.innerHTML = filterarray[i].DESCRIPTION;
        listBox.appendChild(option);
    }
}

function Construct_ProfileName() {
    document.getElementById("TxtProfileName").value = document.getElementById("TxtFirstName").value + ((document.getElementById("TxtMiddleName").value == "") ? "": " " + document.getElementById("TxtMiddleName").value) + ((document.getElementById("TxtLastName").value == "") ? "": " " + document.getElementById("TxtLastName").value);
}
function viewDetail(ID){
  var basedata = @json($data['Data']);
  console.log(basedata);
  const filterarray = basedata.filter(asd => asd.ID == ID);
  console.log(filterarray);
  parseDataToInput(filterarray);

  document.getElementById("tabinquiry").className = "nav-link";
  document.getElementById("tabprofile").className = "nav-link active";
  document.getElementById("inquiry").className = "tab-pane";
  document.getElementById("profile").className = "active tab-pane";
}
function parseDataToInput(filterarray){
    console.log(filterarray);
  document.getElementById("TxtProfileRefID").value = (typeof filterarray[0]['RefID']) === 'undefined' ? filterarray[0]['ID'] : filterarray[0]['RefID'];
  document.getElementById("TxtProfileRefDesc").value = (typeof filterarray[0]['RefName']) === 'undefined' ? filterarray[0]['Name'] : filterarray[0]['RefName'];
  document.getElementById("TxtProfileID").value = filterarray[0]['ID'];
  document.getElementById("TxtFirstName").value = filterarray[0]['FirstName'];
  document.getElementById("TxtMiddleName").value = (typeof filterarray[0]['MidName']) == 'undefined' ? filterarray[0]['MiddleName'] : filterarray[0]['MidName'];
  document.getElementById("TxtLastName").value = filterarray[0]['LastName'];
  document.getElementById("TxtProfileName").value = filterarray[0]['Name'];
  document.getElementById("LstIDType").value = filterarray[0]['ID_Type'];
  document.getElementById("ID_Number").value = filterarray[0]['ID_No'];
  document.getElementById("ID_Name").value = filterarray[0]['ID_Name'];
  document.getElementById("TxtIDDate").value = GetFormattedDate(filterarray[0]['ID_Date']);
  document.getElementById("LstSalutation").value = filterarray[0]['Salutation'];
  document.getElementById("TxtProfileInitial").value = filterarray[0]['Initial'];
  document.getElementById("TxtTitle").value = filterarray[0]['Title'];
  document.getElementById("TxtProfileEmail").value = filterarray[0]['Email'];
  document.getElementById("TxtProfileMobile").value = filterarray[0]['Mobile'];
  document.getElementById("TxtProfilePhone").value = filterarray[0]['Phone'];
  document.getElementById("TxtOwnerID").value = '{{ Session::get('ID')}}';
  document.getElementById("TxtPAddress_1").value = filterarray[0]['Address_1'];
  document.getElementById("TxtPAddress_2").value = filterarray[0]['Address_2'];
  document.getElementById("TxtPAddress_3").value = filterarray[0]['Address_3'];
  document.getElementById("LstCountry").value = filterarray[0]['Country'];
  document.getElementById("TxtCity").value = filterarray[0]['City'];
  document.getElementById("TxtProfileZipCode").value = filterarray[0]['ZipCode'];
  document.getElementById("LstGender").value = filterarray[0]['Gender'];
  document.getElementById("TxtBirthPlace").value = filterarray[0]['BirthPlace'];
  document.getElementById("TxtBirthDate").value = GetFormattedDate(filterarray[0]['BirthDate']);
  document.getElementById("LstOccupation").value = filterarray[0]['Occupation'];
  document.getElementById("TxtCAddress").value = filterarray[0]['Correspondence_Address'];
  document.getElementById("TxtCPhone").value = filterarray[0]['Correspondence_Phone'];
  document.getElementById("TxtCEmail").value = filterarray[0]['Correspondence_Email'];
    if (filterarray[0]['Corporatef'] === true) {
        console.log('bisa bos');
        document.getElementById("CbxCorporateF").setAttribute("checked", "");
        corporateF_chekcked();
    }else{
        console.log('ga bisa bos');
        document.getElementById("CbxCorporateF").removeAttribute("checked");
    }
  document.getElementById("TxtTaxID").value = filterarray[0]['TaxID'];
  document.getElementById("religion").value = filterarray[0]['Religion'];
  document.getElementById("LstIncome").value = filterarray[0]['Income'];
  document.getElementById("TxtEmployment").value = filterarray[0]['Employment'];
  if (filterarray[0]['WNIF'] == true) {
        document.getElementById("CbxWNIF").setAttribute("checked", "");
    }else{
        document.getElementById("CbxWNIF").removeAttribute("checked");
    }
  document.getElementById("LstMarital").value = filterarray[0]['Marital'];
  document.getElementById("TxtContact").value = filterarray[0]['Contact'];
  document.getElementById("TxtContactAddress").value = filterarray[0]['ContactAddress']; 
  document.getElementById("TxtContactPhone").value = filterarray[0]['ContactPhone'];
  document.getElementById("LstComType").value = filterarray[0]['CompanyType'];
  document.getElementById("LstComGroup").value = filterarray[0]['CGroup'];
  document.getElementById("LstSubComGroup").value = filterarray[0]['SCGroup']; 
  document.getElementById("LstProvince").value = filterarray[0]['Province'];
    if (filterarray[0]['ForceSyncF'] == true) {
        document.getElementById("CbxForceSyncF").setAttribute("checked", "");
    }else{
        document.getElementById("CbxForceSyncF").removeAttribute("checked");
    }
    if (filterarray[0]['DumpF'] == true) {
        document.getElementById("CbxDumpF").setAttribute("checked", "");
    }else{
        document.getElementById("CbxDumpF").removeAttribute("checked");
    }
    if (filterarray[0]['Restricted'] == true) {
        document.getElementById("CbxRestrictedF").setAttribute("checked", "");
    }else{
        document.getElementById("CbxRestrictedF").removeAttribute("checked");
    }
    document.getElementById("LstPType").value = filterarray[0]['PType'];
    document.getElementById("TxtCName").value = filterarray[0]['Correspondence_Attention'];
    document.getElementById("TxtPICName_1").value = filterarray[0]['PIC_NAME_1'];
    document.getElementById("TxtPICTitle_1").value = filterarray[0]['PIC_TITLE_1'];
    document.getElementById("TxtTaxName").value = filterarray[0]['TaxName'];
    document.getElementById("TxtTaxAddress").value = filterarray[0]['TaxAddress'];
}

function GetFormattedDate(datestring) {
    var d = new Date(datestring);
    var month = d.getMonth()+ 1;
    if (month < 10){
        month = '0' + month;
    }
    var day = d.getDate();
    if (day < 10){
        day = '0' + day;
    }
    var year = d.getFullYear();
    return year + "-" + month + "-" + day;
   
}
$(".history-profile").click(function(event){
    event.preventDefault();
    var a_href = $(this).attr('href');

    $('#loadMe').modal('show');
    
    $.ajax({
    type: "GET",
    url: a_href,
    dataType: 'html'
    }).done(function( response ) {
        console.log(response);
        $('#loadMe').modal('hide');
        $('#bodyHistory').html(response);
        $("#modal-history").modal('show');
    });
});

function toastMessage(responseCode, responseMessage){
    var Toast = Swal.mixin(
        {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        }
    );
    if (responseCode == "200"){
        Toast.fire(
            {
                icon: 'success',
                title: responseMessage
            }
        )
    }else if (responseCode == "400" || responseCode == "401"){
        Toast.fire(
            {
                icon: 'error',
                title: responseMessage
            }
        )
    }
}

$(".form-save").submit(function(event){
    event.preventDefault();
    var a_href = $(this).attr('action');

    $("#loadMe").modal('show');

    $.ajax({
    type: "POST",
    url: a_href, // This is what I have updated
    data: $(".form-save").serialize(),
    }).done(function( response ) {
        console.log(response);
        $("#loadMe").modal("hide");
        toastMessage(response.code,response.message);
        if (response.code == '401'){
            $('#modal-sync').modal('show');
            setTimeout(() => {
                $('#cardbodyModalSync').html(response.html);
            }, 1000);
        }
    }).fail(function(msg){
        console.log(msg);
        $("#loadMe").modal("hide");
    });
});


$(".form-sync").submit(function(event){
    event.preventDefault();

    $('#div-overlay').empty();
    $('#div-overlay').append('<div class="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>');

    let ProfileID = $("input[name=ProfileID]").val();
    let Name = $("input[name=ProfileID]").val();
    let email = $("input[name=email]").val();
    let Address = $("input[name=Address1]").val();
    let City = $("input[name=CityModal]").val();
    let ZipCode = $("input[name=ZipCode]").val();
    let ID_NO = $("input[name=ID_Number]").val();
    let Mobile = $("input[name=MobilePhone]").val();
    let Tax = $("input[name=TaxModal]").val();
    let BirthDate = $("input[name=ModalBirthDate]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');
    var a_href = $(this).attr('action');
    console.log(_token);

    $.ajax({
    type: "POST",
    url: a_href, // This is what I have updated
    data:{
          ID:ProfileID,
          Name:Name,
          Email:email,
          Address:Address,
          City:City,
          ZipCode:ZipCode,
          ID_NO:ID_NO,
          Mobile:Mobile,
          BirthDate:BirthDate,
          TaxID:Tax,
          _token: _token
        },
    }).done(function( msg ) {
        // $("#loadMe").modal("hide");
        console.log(msg);
        $('#cardbodyModalSync').html(msg);
        $('#div-overlay').empty();
    }).fail(function(msg){
        console.log(msg);
        // $("#loadMe").modal("hide");
        $('#div-overlay').empty();
    });
});
$(".btn-del-row-profile").click(function(event){
    event.preventDefault();
    var a_href = $(this).attr('href');

    $('#modaltitle').text('Delete Profile');
    
    $('#modalbody').empty();
    $('#modalbody').append('<p>Do you want to proceed?</p>');

    $('#modalfooter').empty();
    $('#modalfooter').append('<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>');
    $('#modalfooter').append('<a href="' + a_href + '" class="btn btn-danger btn-ok" id="btnDel">Delete</a>');

    $("#modal-general").modal({
      backdrop: "static", //remove ability to close modal with click
      keyboard: false, //remove option to close with keyboard
      show: true //Display loader!
    });
});

$(".btn-upload").click(function(event){
    event.preventDefault();

    $('#modaltitle').text('Upload Profile Document');
    
    $('#modalbody').empty();
    $.ajax({
    type: "GET",
    url: '{{route("profile.uploadDocument")}}',
    dataType: 'html'
    }).done(function( msg ) {
        $('#modalbody').html(msg);
        $("#modal-general").modal({
            backdrop: "true", //remove ability to close modal with click
            keyboard: false, //remove option to close with keyboard
            show: true //Display loader!
        });
    });
});
</script>
@endsection