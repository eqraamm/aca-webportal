@extends('layout/main')
@section('title','ACA INSURANCE | dashboard')

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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dashboard Marketing</h3>
              </div>
              <div class="card-body">
                <section class="content">
                  <main>
                  <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                              <table>
                                <tr>
                                    <td>Task Due </td>
                                    <td>: <input type='date' name='dari tanggal'></td>
                                    <td>To </td>
                                    <td><input type='date' name='sampai tanggal'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="button" value="Search"></td>
                                </tr>
                              </table> 
                                        <div class="tab-content">
                                                <div class="card-body">
                                                    <table id="dashboard" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>SPPA NO</th>
                                                                <th>Long Insured Name</th>
                                                                <th>Period</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          
                                                          @foreach($data['Data'] as $datas)
                                                            <tr>
                                                                <td>{{ $datas['RefNo'] }}</td>
                                                                <td>{{ $datas['AName'] }}</td>
                                                                <td>{{ $datas['InceptionDate'] }} - {{ $datas['ExpiryDate'] }}</td>
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
</div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
@endsection

@section('scriptpage')
<script>
  $(function () {
    $("#dashboard").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    console.log('huwow');
  });
</script>
@endsection
</body>
</html>
