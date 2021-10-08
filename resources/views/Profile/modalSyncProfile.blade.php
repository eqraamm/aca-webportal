<table id="tblModalSync" class="table table-bordered table-striped">
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
    @if ($datasync['code'] == '200') @foreach($datasync['Data'] as $datas) 
    <tr>
      <td>{{ $datas['ID'] }}</td>
      <td>{{ $datas['Name'] }}</td>
      <td>{{ $datas['Email'] }}</td>
      <td>{{ $datas['Mobile'] }}</td>
      <td>{{ $datas['ID_No'] }}</td>
      <td>{{ $datas['BirthDate'] }}</td>
      <td>
        <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetailSync('{{$datas['ID']}}')" data-dismiss="modal">Detail</a>
      </td>
    </tr> 
    @endforeach 
    @endif 
  </tbody>
</table>
<script>
  $(function () {
      console.log(@json($datasync['Data']));
    $("#tblModalSync").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
  });
</script>
<script>
function viewDetailSync(ID){
  var basedata = @json($datasync['Data']);
  console.log(basedata);
  const filterarray = basedata.filter(asd => asd.ID == ID);
  filterarray[0]['RefID'] = filterarray[0]['ID'];
  filterarray[0]['RefName'] = filterarray[0]['Name'];
  console.log(filterarray);
  $( "#clearbtn" ).trigger( "click" );
  parseDataToInput(filterarray);
  $('#TaxID').trigger('input');
  $('.select2bs4').trigger('change');
  corporateF_chekcked();
  $('#SCGroup').val(filterarray[0]['SCGroup']);
  $('#SCGroup').trigger('change');
}
</script>
