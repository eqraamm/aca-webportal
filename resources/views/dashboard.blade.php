<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ACA ASURANSI | Dashboard</title>

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
<!-- /.navbar -->=
      


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
          <li class="nav-item menu-open">
            <a href="dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nasabah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sppa" class="nav-link">
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

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Dashboard Marketing</h2>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
              <div class="card-new" align="right">
              <a href="profile">Create New Profile</a>
              </div>
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
                      <td><input type="button" action="search" value="Search Profile"></td>
                  </tr>
                </table> 
              </div>
          <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table mr-1"></i>
                  Tabel Data Nasabah
              </div>
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
                                                        <a href="" type="button" class="btn btn-warning btn-sm" >Detail</a>
                                                        <a href="" type="button" class="btn btn-danger btn-sm" >Delete</a>
                                                        <a href="" type="button" class="btn btn-secondary btn-sm" >history</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
          </div>
      </div>
    </div>           
  </div>
</div>
<!-- div wrapper -->
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
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
