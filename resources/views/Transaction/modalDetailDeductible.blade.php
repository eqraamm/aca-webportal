<div class="form-group">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <label for="deductible-code">Deductible Code</label>
            <input type="text" class="form-control" id="deductible-code" name="deductible-code" readonly></input> 
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <label for="deductible-remarks">Deductible Remarks</label>
            <textarea type="text" class="form-control" id="deductible-remarks" name="deductible-remarks" readonly></textarea> 
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label for="FixedMin">By Amount</label>
            <input type="text" class="form-control" id="FixedMin" name="FixedMin" onkeyup="onhange_number_format($(this));" readonly></input> 
        </div>
        <div class="col-sm-4">
            <label for="PCTTSI">By % of TSI</label>
            <input type="text" class="form-control" id="PCTTSI" name="PCTTSI" readonly></input> 
        </div>
        <div class="col-sm-4">
            <label for="PCTCL">By % of Claim</label>
            <input type="text" class="form-control" id="PCTCL" name="PCTCL" readonly></input> 
        </div>
    </div>
</div>
<div class="form-group">
    <button class='btn btn-sm btn-primary btn-block btn-save' >Save</button>
</div>
<script>
    var data = @json($data);
    var urlGetDeductibleRemarks = "{{ route('policy.getDeductibleRemarks') }}";
</script>
<script src="{{asset('dist/js/Transaction/modalDetailDeductible.js')}}"></script>