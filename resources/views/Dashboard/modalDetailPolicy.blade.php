<!-- General Policy Information -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <!-- <i class="fas fa-text-width"></i> -->
                General Policy Information
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">PID</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['PID'] }}</dd>
                <dt class="col-sm-3">Policy Status</dt>
                <dd class="col-sm-3">
                    @switch($data['Data'][0]['PStatus'])
                        @case('R')
                            Request
                        @break
                        @case('P')
                            Process
                        @break
                        @case('C')
                            Closed
                        @break
                        @case('S')
                            Submit Confirmation
                        @break
                        @case('T')
                            Temporary Process
                        @break
                        @default
                            $data['Data'][0]['PStatus']
                    @endswitch
                </dd>
                <dt class="col-sm-3">Registration Date</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['RegDate'] }}</dd>
                <dt class="col-sm-3">Coverage</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['ProductDesc'] }}</dd>
                <dt class="col-sm-3">Reference Number</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['RefNo'] }}</dd>
                <dt class="col-sm-3">Product</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['CoverageDesc'] }}</dd>
                <dt class="col-sm-3">Quotation Number</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['CREFNO'] }}</dd>
                <dt class="col-sm-3">Segment</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['Segment'] }}</dd>
                <dt class="col-sm-3">Branch</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['Branch'] }}</dd>
                <dt class="col-sm-3">Profit Cost Center</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['CT'] == '' ? '-' : $data['Data'][0]['CT'] }}</dd>
                <dt class="col-sm-3">Policy Number</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['PolicyNo'] == '' ? '-' : $data['Data'][0]['PolicyNo'] }}</dd>
                <dt class="col-sm-3">Policy Holder</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['PolicyHolder'] == '' ? '-' : $data['Data'][0]['PolicyHolder'] }}</dd>
                <dt class="col-sm-3">Insured</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['InsuredID'] == '' ? '-' : $data['Data'][0]['InsuredID'] }}</dd>
                <dt class="col-sm-3">Long Insured Name</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['InsuredName'] == '' ? '-' : $data['Data'][0]['InsuredName'] }}</dd>
                <dt class="col-sm-3">Insurance Period</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['InceptionDate'] }} - {{ $data['Data'][0]['ExpiryDate'] }}</dd>
                <dt class="col-sm-3">Premium</dt>
                <dd class="col-sm-3">{{ $data['Data'][0]['Premium'] }}</dd>
                </dd>
            </dl>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- Object Information -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <!-- <i class="fas fa-text-width"></i> -->
                Object Information
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                    @for ($i=1; $i < 30; $i++)
                        @if ( $dataproduct['Data'][0]['FLDID'.$i] != '')
                            <dt class="col-sm-3">{{ $dataproduct['Data'][0]['FLDTAG'.$i] }}</dt>
                            <dd class="col-sm-3">{{ $data['Data'][0]['ValueDesc'.$i] == '' ? '-' : $data['Data'][0]['ValueDesc'.$i] }}</dd>
                        @else
                            @break
                        @endif
                    @endfor
                </dl>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

