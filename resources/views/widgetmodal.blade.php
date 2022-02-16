<!-- <div class="card-body"> -->
<div class="table-responsive">
<table id="tblWidget" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
        <th>No</th>
        <th>Reference Number</th>
        <th>Policy number</th>
        <th>Type</th>
        <th>Policy Status</th>
        <th>Name</th>
        <th>Coverage</th>
        <th>Product</th>
        <th>Period</th>
        <th>Total Sum Insured</th>
        <th>Premium</th>
        </tr>
    </thead>
</table>
</div>
<!-- </div> -->
<!-- General For Web Portal MW -->
<!-- <script src="{{asset('dist/js/pages/webportal.js')}}"></script> -->
<!-- <script>
  var tblWidget = $('#tblWidget').DataTable( {
    "data": basedata,
    "columns": [
      { "defaultContent": "" },
      { "data": "RefNo" },
      { "data": "PolicyNo" },
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
          return row['Currency'] + ' ' + 
          number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
        }
      },
      { "defaultContent": "",
        render: function(data, type, row) {
          return row['Currency'] + ' ' + 
          number_format(row['Premium']);
        }
      }
    ],
    "order": [[ 0, 'asc' ]],
    "responsive": true,
    "autoWidth": false,
  });

  tblWidget.on( 'order.dt search.dt', function () {
    tblWidget.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      } );
  } ).draw();
</script> -->
