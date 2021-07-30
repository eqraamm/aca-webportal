@extends('layout/main')
@section('title','ACA INSURANCE | Survey')

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
                     <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                              <div class="card-body">
                                <table id="ListSurvey" class="table table-bordered table-striped">
                                        </table>
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
    var arrPolicy = @json($data['Data']);
    var arrPolicySurvey = arrPolicy.filter(survey => survey.NeedSurveyF == true);
        var t = $("#ListSurvey").DataTable({
          "data": arrPolicySurvey,
          "columns": [
            {
              "title": "",
              "className": "select-checkbox",
              "defaultContent": "",
              render: function(data, type, row) {
                return '<input class="form-control" id="cbxsurvey[]" name="ClausulaCode[]" type="checkbox">';
              }
            },
            {
              "title": "No",
              "data": null
            },
            {
              "title": "SPPA No",
              "data": "RefNo"
            },
            {
              "title": "Long Insured Name",
              "data": "AName"
            },
            {
              "title": "Jadwal Survey",
              "defaultContent": "",
              render: function(data, type, row) {
                return row['SUserDate'] + ' - ' + row['SUserTime'];
              }
            },
          ],
          "columnDefs": [
          {
            "searchable": false,
            "orderable": false,
            "targets": 1
          },
          {
           "width":"4.5%",
           "targets": [0] 
          }
          ],
          "select": {
            "style": "multi"
          },
          "order": [[ 1, 'asc' ]],
          "autoWidth": false,
          "responsive": true,
        });
        t.on( 'order.dt search.dt', function () {
        t.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    });
  
</script>
@endsection
</body>
</html>