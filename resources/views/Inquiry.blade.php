<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ACA Insurance | Index</title>

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
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
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
            <a href="Inquiry" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inquiry SPPA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="survey.html" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.html" class="nav-link">
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

    <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="inquiry">
                  <div class="card-header">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="TxtName_Inquiry" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Reference No</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="TxtRefNo_Inquiry" placeholder="Ref No">
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
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">SPPA No</th>
                          <th scope="col">Policy No</th>
                          <th scope="col">Branch</th>
                          <th scope="col">Segment</th>
                          <th scope="col">Long Insured Name</th>
                          <th scope="col">Period</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                     
                      </tbody>
                    </table>
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
