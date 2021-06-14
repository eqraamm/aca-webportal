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
@if ($responseCode == '200')
@foreach($datasync['Data'] as $datas)
<tr>
    <td>{{ $datas['ID'] }}</td>
    <td>{{ $datas['Name'] }}</td>
    <td>{{ $datas['Email'] }}</td>
    <td>{{ $datas['Mobile'] }}</td>
    <td>{{ $datas['ID_No'] }}</td>
    <td>{{ $datas['BirthDate'] }}</td>
    <td>
        <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetailSync('{{$datas['ID']}}')">Detail</a>
    </td>
</tr>
@endforeach
@endif
</tbody>
</table>
<script>
  $(function () {
    $("#tblModalSync").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
  }
  );
</script>
<script>
function viewDetailSync(ID){
  var basedata = @json($datasync['Data']);
  console.log(basedata);
  const filterarray = basedata.filter(asd => asd.ID == ID);
  console.log(filterarray);
  document.getElementById("TxtProfileRefID").value = filterarray[0]['ID'];
  document.getElementById("TxtProfileRefDesc").value = filterarray[0]['Name'];
  document.getElementById("TxtProfileID").value = filterarray[0]['ID'];
  document.getElementById("TxtFirstName").value = filterarray[0]['FirstName'];
  document.getElementById("TxtMiddleName").value = filterarray[0]['MiddleName'];
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
  document.getElementById("TxtOwnerID").value = {{ Session::get('ID')}}
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
    if (filterarray[0]['Corporatef'] == true) {
        document.getElementById("CbxCorporateF").setAttribute("checked", "");
    }else{
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

  document.getElementById("tabinquiry").className = "nav-link";
  document.getElementById("tabprofile").className = "nav-link active";
  document.getElementById("inquiry").className = "tab-pane";
  document.getElementById("profile").className = "active tab-pane";
  $("#modal-sync").modal('hide');
}
</script>
