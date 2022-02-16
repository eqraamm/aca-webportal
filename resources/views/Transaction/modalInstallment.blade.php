<table id="tblInstallment" class="table table-striped">
    <!-- <caption>Premium Installment</caption> -->
    <thead>
        <tr>
            <th scope="col" class="table-active"></th>
            <th scope="col" class="text-center table-primary">Installment Date</th>
            <th scope="col" class="text-center table-primary">PCT (%)</th>
            <th scope="col" class="text-center table-primary">Amount (in Base Currency)</th>
            <th scope="col" class="text-center table-primary">Sum Insured (in Base Currency)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $datas)
            <tr>
                <td><b>Installment #{{ $datas['rowno'] }}</b></td>
                <td class="text-center">{{ $datas['InstDate'] }}</td>
                <td class="text-center">{{ $datas['PCT'] }}</td>
                <td class="text-center">{{ $datas['Amount'] }}</td>
                <td class="text-center">{{ $datas['SI'] }}</td>
            </tr>
        @endforeach
        <!-- <tr>
            <th scope="row">Installment #1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">Installment #2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">Installment #3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
        </tr> -->
    </tbody>
</table>
<script>
  $(function () {
    $("#tblInstallment").DataTable({
        "pageLength": 12,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        // "info": false,
        "autoWidth": false,
        "responsive": true,
        // "destroy": true,
    });
  }
  );
</script>