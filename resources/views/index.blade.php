<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title> Laravel 7</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <button class="btn btn-xs btn-info pull-right">Search</button>
        <p class="h1">test Parsing Data From API Search Profile</p><hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Phone</th>
                        <th scope="col">OwnerID</th>
                        <th scope="col">Initial</th>
                        <th scope="col">AllowedF</th>
                        <th scope="col">RefID</th><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ACA ASURANSI | Index</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
  </nav>

  
    <!-- Right navbar links -->
    <!-- Navbar Search -->
    <!-- Messages Dropdown Menu -->
<!-- /.navbar -->
      


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <img src="{{asset('dist/img/aca.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACA ASURANSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nasabah
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SPPA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inquiry SPPA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
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

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dashboard Marketing</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                      <td>Task Due </td>
                      <td>: <input type='date' name='dari tanggal'></td>
                      <td>To </td>
                      <td><input type='date' name='sampai tanggal'></td>
                  </tr>
                  <tr>
                      <td>SPPA No</td>
                      <td>: <input type="search" name="All Status" size="18px"></td>
                  </tr>
                  <tr>
                      <td><input type="button" value="Search Profile"></td>
                  </tr>
                </table> 
          </ol>
          <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table mr-1"></i>
                  Tabel Data Nasabah
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Phone</th>
                                <th scope="col">OwnerID</th>
                                <th scope="col">Initial</th>
                                <th scope="col">AllowedF</th>
                                <th scope="col">RefID</th>
                                <th scope="col">RefName</th>
                                <th scope="col">Address_1</th>
                                <th scope="col">Address_2</th>
                                <th scope="col">Address_3</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">ZipCode</th>
                                <th scope="col">Gender</th>
                                <th scope="col">ID_No</th>
                                <th scope="col">ID_Name</th>
                                <th scope="col">BirthDate</th>
                                <th scope="col">BirthPlace</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data['Data']as $datas)
                              <tr>
                                <td>{{$datas['ID']}}</td>
                                <td>{{$datas['Name']}}</td>
                                <td>{{$datas['Title']}}</td>
                                <td>{{$datas['Email']}}</td>
                                <td>{{$datas['Mobile']}}</td>
                                <td>{{$datas['Phone']}}</td>
                                <td>{{$datas['OwnerID']}}</td>
                                <td>{{$datas['Initial']}}</td>
                                <td>{{$datas['AllowedF']}}</td>
                                <td>{{$datas['RefID']}}</td>
                                <td>{{$datas['RefName']}}</td>
                                <td>{{$datas['Address_1']}}</td>
                                <td>{{$datas['Address_2']}}</td>
                                <td>{{$datas['Address_3']}}</td>
                                <td>{{$datas['City']}}</td>
                                <td>{{$datas['Country']}}</td>
                                <td>{{$datas['ZipCode']}}</td>
                                <td>{{$datas['Gender']}}</td>
                                <td>{{$datas['ID_No']}}</td>
                                <td>{{$datas['ID_Name']}}</td>
                                <td>{{$datas['BirthDate']}}</td>
                                <td>{{$datas['BirthPlace']}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
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
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Care Technologies</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

                        <th scope="col">RefName</th>
                        <th scope="col">Address_1</th>
                        <th scope="col">Address_2</th>
                        <th scope="col">Address_3</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">ZipCode</th>
                        <th scope="col">Gender</th>
                        <th scope="col">ID_No</th>
                        <th scope="col">ID_Name</th>
                        <th scope="col">BirthDate</th>
                        <th scope="col">BirthPlace</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['Data'] as $datas)   
                        <tr>
                            <td>{{$datas['ID']}}</td>
                            <td>{{$datas['Name']}}</td>
                            <td>{{$datas['Title']}}</td>
                            <td>{{$datas['Email']}}</td>
                            <td>{{$datas['Mobile']}}</td>
                            <td>{{$datas['Phone']}}</td>
                            <td>{{$datas['OwnerID']}}</td>
                            <td>{{$datas['Initial']}}</td>
                            <td>{{$datas['AllowedF']}}</td>
                            <td>{{$datas['RefID']}}</td>
                            <td>{{$datas['RefName']}}</td>
                            <td>{{$datas['Address_1']}}</td>
                            <td>{{$datas['Address_2']}}</td>
                            <td>{{$datas['Address_3']}}</td>
                            <td>{{$datas['City']}}</td>
                            <td>{{$datas['Country']}}</td>
                            <td>{{$datas['ZipCode']}}</td>
                            <td>{{$datas['Gender']}}</td>
                            <td>{{$datas['ID_No']}}</td>
                            <td>{{$datas['ID_Name']}}</td>
                            <td>{{$datas['BirthDate']}}</td>
                            <td>{{$datas['BirthPlace']}}</td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>    
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>