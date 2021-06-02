<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Create Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
</head>
<body onload="onLoadProfile()" class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login">Logout</a>
                    </div>
                </li>
            </ul>
  </nav>

  
    <!-- Right navbar links -->
    <!-- Navbar Search -->
    <!-- Messages Dropdown Menu -->
<!-- /.navbar -->
      


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/aca.jpg')}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACA ASURANSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ACA_MO_1</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="profile" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nasabah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sppa" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SPPA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Inquiry" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inquiry SPPA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="survey" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Report
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
                              <ul class="nav nav-pills">
                              <li class="nav-item"><a id="tabinquiry" class="{{ empty($tabname) || $tabname == 'inquiry' ? 'nav-link active' : 'nav-link' }}" href="#inquiry" data-toggle="tab">Inquiry</a></li>
                                  <li class="nav-item"><a id="tabprofile" class="{{ empty($tabname) || $tabname == 'profile' ? 'nav-link active' : 'nav-link' }}" href="#profile" data-toggle="tab">Profile</a></li>
                              </ul>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="{{ empty($tabname) || $tabname == 'inquiry' ? 'active tab-pane' : 'tab-pane' }}" id="inquiry">
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
                                              @foreach($data['Data'] as $datas)
                                                  <tr>
                                                      <td>{{ $datas['ID'] }}</td>
                                                      <td>{{ $datas['Name'] }}</td>
                                                      <td>{{ $datas['Email'] }}</td>
                                                      <td>{{ $datas['Mobile'] }}</td>
                                                      <td>{{ $datas['ID_No'] }}</td>
                                                      <td>{{ $datas['BirthDate'] }}</td>
                                                      <td>
                                                          <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetail('{{ $datas['ID'] }}')">Detail</a>
                                                          <a href="" type="button"  method="post" class="btn btn-outline-info btn-sm" >history</a>
                                                          <a href="{{ route('dropProfile', ['id' =>$datas['ID']]) }}" type="delete" class="btn btn-outline-danger btn-sm" >Delete</a>
                                                      </td>
                                                  </tr>
                                              @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <div class="{{ empty($tabname) || $tabname == 'profile' ? 'active tab-pane' : 'tab-pane' }}" id="profile">
                                    <form class="form-horizontal" action="{{ route('profile') }}" method="post">
                                    @csrf
                                                          <div class="form-group row">
                                                              <p for="TxtRefNo" class="col-sm-3 col-form-label">Reference Profile</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileRefID" type="text" disabled>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                  <input class="form-control" id="TxtProfileRefDesc" type="text">
                                                              </div>
                                                              <div class="col-sm-2">
                                                                  <button type="submit" id="BtnSync" class="btn btn-block btn-outline-primary">Sync</button>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Profile ID</label>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileID" type="text" name="ProfileID" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">First Name</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtFirstName" type="text" name='FirstName'required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Middle Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtMiddleName" name="MiddleName" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Last Name</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtLastName" name="LastName" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Full Name</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileName" name="Name" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">ID Type</label>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstIDType" name="IDType" required>
                                                                      <option value="" selected></option>
                                                                      <option value="KIMS">KIMS</option>
                                                                      <option value="KITAS">KITAS</option>
                                                                      <option value="KTP">KTP</option>
                                                                      <option value="OTHERS">OTHERS</option>
                                                                      <option value="PASSPORT">PASSPORT</option>
                                                                      <option value="SIM">SIM</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">ID Number</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="ID_Number" name="ID_Number" type="text" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">ID Name</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="ID_Name" name="ID_Name" type="text" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">ID Date</p>
                                                              <div class="input-group date col-sm-3" id="reservationdate" data-target-input="nearest">
                                                                  <input type="date" class="form-control datetimepicker-input" data-target="#TxtIDDate" id="TxtIDDate" name="IDDate" required />
                                                                  
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Salutation</label>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstSalutation" name="Salutation" required>
                                                                      <option value="" selected></option>
                                                                      <option value="PD">PD</option>
                                                                      <option value="PT">PT</option>
                                                                      <option value="CV">CV</option>
                                                                      <option value="Mr">Mr</option>
                                                                      <option value="Mrs">Mrs</option>
                                                                      <option value="Miss">Miss</option>
                                                                      <option value="Tn">Tn</option>
                                                                      <option value="Ny">Ny</option>
                                                                      <option value="Nn">Nn</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Initial</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileInitial" name="Initial" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Title</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtTitle" name="Title" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Email Address</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileEmail" name="Email" type="email">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Mobile Phone</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfileMobile" name="MobilePhone" type="number">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Phone</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtProfilePhone" name="Phone" type="number">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">User Owner</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtOwnerID" type="text" name="UserOwner" value="ACA_MO_1">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Address 1</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_1" name="Address1" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Address 2</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_2" name="Address2" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Address 3</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtPAddress_3" name="Address3" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Country / City</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstCountry" name="Country">
                                                                      <option value="" selected></option>
                                                                  @foreach ($Country['Data'] as $dataCountry)
                                                                       <option value="{{$dataCountry['Country']}}">{{$dataCountry['Description']}}</option>
                                                                  @endforeach
                                                                  </select>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtCity" name="City" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">ZipCode</p>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtProfileZipCode" name="ZipCode" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Gender</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstGender" name="Gender">
                                                                      <option value="" selected></option>
                                                                      <option value="F">Female</option>
                                                                      <option value="M">Male</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Birth Place / Birth Date</label>
                                                              <div class="col-sm-3">
                                                                  <input class="form-control" id="TxtBirthPlace" name="BirthPlace" type="text">
                                                              </div>
                                                              <div class="input-group date col-sm-3" id="reservationdate" data-target-input="nearest">
                                                                  <input type="date" class="form-control datetimepicker-input" data-target="#TxtBirthDate" id="TxtBirthDate" name="BirthDate" required />
                                                                  <div class="input-group-append" data-target="#TxtBirthDate" data-toggle="datetimepicker">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Occupation</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstOccupation" name="Occupation">
                                                                      <option value="1" selected>1</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Address</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCAddress" name="CoAddress" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Phone</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCPhone" name="CoPhone" type="number">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Correspondence Email</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtCEmail" name="CoEmail"type="email">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Corporate</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxCorporateF" name="Corporate">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <label class="col-sm-3 col-form-label">Tax ID</label>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtTaxID" type="text" name="tax" disabled>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Religion</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="religion" name="Religion">
                                                                      <option value="" selected></option>
                                                                      <option value="BUDDHA">BUDDHA</option>
                                                                      <option value="CATHOLIC">CATHOLIC</option>
                                                                      <option value="CHRISTIAN">CHRISTIAN</option>
                                                                      <option value="HINDU">HINDU</option>
                                                                      <option value="MOSLEM">MOSLEM</option>
                                                                      <option value="OTHERS">OTHERS</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Income</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstIncome" name="Income">
                                                                      <option value="" selected></option>
                                                                      <option value="1-10 juta">1-10 juta</option>
                                                                      <option value="> 10-25 juta">> 10-25 juta</option>
                                                                      <option value="> 25-50 juta">> 25-50 juta</option>
                                                                      <option value="> 50-100 juta">> 50-100 juta</option>
                                                                      <option value="> 100 juta">> 100 juta</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Employment</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtEmployment" name="Employment" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Citizenship</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" name="Citizen" id="CbxWNIF">
                                                                  <label class="form-check-label" for="exampleCheck2">Local</label>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Marital Status</p>
                                                              <div class="col-sm-3">
                                                                  <select class="form-control" id="LstMarital" name="martial">
                                                                      <option value="" selected></option>
                                                                      <option value="Single">Single</option>
                                                                      <option value="Married">Married</option>
                                                                      <option value="Life Divorce">Life Divorce</option>
                                                                      <option value="Divorce To Death">Divorce To Death</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Contact</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtContact" name="Contact" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Contact Address</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtContactAddress" name="ConAddress" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Contact Phone</p>
                                                              <div class="col-sm-6">
                                                                  <input class="form-control" id="TxtContactPhone" name="ConPhone" type="text">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Syncronize Profile</p>
                                                              <div class="col-form-label col-sm-2"> 
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxForceSyncF" name="Sync">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Dump</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxDumpF" name="Dump">
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                              <p class="col-sm-3 col-form-label">Restricted</p>
                                                              <div class="col-form-label col-sm-2">
                                                                  <input type="checkbox" class="form-check-inputs" id="CbxRestrictedF" name="Restricted">
                                                              </div>
                                                          </div>
                                                          <div class="row justify-content-center">
                                                              <button type="submit" id="clickbtn" class="btn btn-block bg-gradient-primary col-5 swalDefaultSuccess">Save</button>
                                                          </div>    
                                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
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

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Care Technologies</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- script js parse data in sppa -->
<script src="{{asset('dist/js/satria.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
function viewDetail(ID){
    var basedata = @json($data['Data']);
    console.log(basedata);
    const filterarray = basedata.filter(asd => asd.ID == ID);
    console.log(filterarray);
    document.getElementById("TxtProfileRefID").value = filterarray[0]['RefID'];
    document.getElementById("TxtProfileRefDesc").value = filterarray[0]['RefName'];
    document.getElementById("TxtProfileID").value = filterarray[0]['ID'];
    document.getElementById("TxtProfileName").value = filterarray[0]['Name'];
    document.getElementById("tabinquiry").className = "nav-link";
    document.getElementById("tabprofile").className = "nav-link active";
    document.getElementById("inquiry").className = "tab-pane";
    document.getElementById("profile").className = "active tab-pane";
}
</script>
<script>
    function onLoadProfile(){
    $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
        if ('{{ $responseCode }}' == "200"){
            console.log("success");
            Toast.fire({
            icon: 'success',
            title: '{{$responseMessage}}'
        })
        }else if ('{{ $responseCode }}' == "400"){
            console.log("gagal");
            Toast.fire({
            icon: 'error',
            title: '{{$responseMessage}}'
        })
        }
    })
}
    
</script>
</body>
</html>