@extends('layout/main')
@section('title','ACA INSURANCE | User Information')

@section('maincontent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"></div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section cass="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Personal Information</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form class="form-horizontal form-save" id="needs-validation" action="#" method="post">
                <div class="form-group row">
                    <div class="col">
                        <div class="float-right">
                            
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <p for="RefID" class="col-sm-3 col-form-label">Reference User ID / Name</p>
                    <div class="col-sm-2">
                        <input class="form-control" id="RefID" name="RefID" type="text" readonly="readonly">
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" id="RefName" name="RefName" type="text" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">User ID</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="ID" name="ID" type="text" readonly>
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="FirstName" name="FirstName" type="text" required>
                    </div>            
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Middle Name</p>
                    <div class="col-sm-6">
                        <input class="form-control" id="MidName" name="MiddleName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Last Name</p>
                    <div class="col-sm-6">
                        <input class="form-control" id="LastName" name="LastName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="Name" name="Name" type="text" minlength="3" style="text-transform:uppercase" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ID Number / Name</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="ID_No" name="ID_No" type="text" required>
                    </div> 
                    <div class="col-sm-4">
                        <input class="form-control" id="ID_Name" name="ID_Name" type="text" required>
                    </div>                    
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Salutation</p>
                    <div class="col-sm-2">
                        <select class="form-control select2bs4" id="Salutation" name="Salutation"> 
                            <option value="" selected></option>
                            <option value="APOTIK">APOTIK</option>
                            <option value="BALKESMAS">BALKESMAS</option>
                            <option value="BIDAN">BIDAN</option>
                            <option value="BP">BP</option>
                            <option value="CV">CV</option>
                            <option value="KLINIK">KLINIK</option> 
                            <option value="Miss">Miss</option>
                            <option value="Mr">Mr</option> 
                            <option value="Mrs">Mrs</option>
                            <option value="N/A">N/A</option> 
                            <option value="Nn">Nn</option>
                            <option value="Ny">Ny</option>
                            <option value="OPTIK">OPTIK</option> 
                            <option value="PD">PD</option>
                            <option value="PT">PT</option> 
                            <option value="PUSKESMAS">PUSKESMAS</option>
                            <option value="RB">RB</option>
                            <option value="RS">RS</option> 
                            <option value="RSIA">RSIA</option>
                            <option value="RSUD">RSUD</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Initial</p>
                    <div class="col-sm-2">
                        <input class="form-control" id="Initial" name="Initial" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="Email" name="Email" type="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mobile Phone</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="Mobile" name="Mobile" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Phone</p>
                    <div class="col-sm-3">
                        <input class="form-control" id="Phone" name="Phone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address 1</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="Address_1" name="Address1" type="text" required>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Address 2</p>
                    <div class="col-sm-6">
                        <input class="form-control" id="Address_2" name="Address2" type="text"">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Address 3</p>
                    <div class="col-sm-6">
                        <input class="form-control" id="Address_3" name="Address3" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Country / City</p>
                    <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Country" name="Country"></select>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" id="City" name="City" style="text-transform:uppercase" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">ZipCode</p>
                    <div class="col-sm-3">
                        <input class="form-control" id="ZipCode" name="ZipCode" type="text" maxlength="10">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">Gender</p>
                    <div class="col-sm-3">
                        <select class="form-control select2bs4" id="Gender" name="Gender" required> 
                            <option value="" selected></option>
                            <option value="FEMALE">Female</option>
                            <option value="MALE">Male</option>
                        </select>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('scriptpage')
<script>
</script>
@endsection