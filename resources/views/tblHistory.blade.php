<div class="card-body">
<table id="tblModalHistory" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th>Action</th>
        <th>Name</th>
        <th>Old Value</th>
        <th>New Value</th>
        <th>Last Operator</th>
        <th>Last Update</th>
        <th>Last Time</th>
        </tr>
    </thead>
    <tbody>
    @if ($responseCodeHistory == '200')
    @foreach($dataHistory['Data'] as $datas)
        <tr>
        <td>{{ $datas['Action'] }}</td>
        <td>{{ $datas['ColName'] }}</td>
        <td>{{ $datas['ColValueOld'] }}</td>
        <td>{{ $datas['ColValueNew'] }}</td>
        <td>{{ $datas['Last_Opr'] }}</td>
        <td>{{ $datas['Last_Update'] }}</td>
        <td>{{ $datas['Last_Time'] }}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>
<script>
  $(function () {
    $("#tblModalHistory").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
  }
  );
</script>