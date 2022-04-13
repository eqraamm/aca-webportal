// console.log(basedata);
var Coverage = $('#CoverageID').val();
var dsCoverage = arrCoverage['Data'].filter(dscoverage => dscoverage.CoverageID == Coverage);
// console.log(dsCoverage);
var risk = basedata['risk'];
var dsCoverageDet = dsCoverage[0]['CoverageDetail'].filter(dscoveragedet => dscoveragedet.RefCode == risk);
var dsCoverageDetByYear;
// console.log(dsCoverageDet)
var remarks = basedata['remarks'];
var orderno = basedata['orderno'];
var listbox = document.getElementById('PolicyYear')
$('#PolicyYear').select2({
    theme: 'bootstrap4',
});
$('#risk-code').val(risk);
$('#risk-description').val(remarks);

var policyYears = new Array();
var policyYear = [];
var html = '';
for (i=0; i < basedata['policyyear']; i++){
    policyYear = {
            PolicyYear: i + 1
        }
    policyYears.push(policyYear);
    var valuerate = ($('#RATE_' + dsCoverageDet[i]['OrderNo']).val() === undefined) ? 0 : $('#RATE_' + dsCoverageDet[i]['OrderNo']).val();
    var valuepctindemnity = ($('#PCTIndemnity_' + dsCoverageDet[i]['OrderNo']).val() === undefined) ? 0 : $('#PCTIndemnity_' + dsCoverageDet[i]['OrderNo']).val();
    html += '<input type="hidden" id="risk-rate_' + dsCoverageDet[i]['OrderNo'] + '" value="'+ valuerate +'" /><input type="hidden" id="risk-pctindemnity_' + dsCoverageDet[i]['OrderNo'] + '" value="'+ valuepctindemnity +'" />';
}
$('#input-hidden').empty();
$('#input-hidden').html(html);
addOptionItem(listbox,policyYears,'PolicyYear','PolicyYear',false);

// if (risk == 'EQ-0202-C' || risk == 'FL-0202-C'){
//     $('#pct-suminsured').html("<input class='form-control risk-pctindemnity onkeyup_regex' onkeyup='keyup_regex(this)' id='risk-pctindemnity' name='risk-pctindemnity' type='text' data-regex='^0$|^10$|^100$' value = '0'><div class='invalid-feedback'>Percentage can only be 10 or 100</div>");
// }else{
//     $('#pct-suminsured').html("<input class='form-control risk-pctindemnity onkeyup_regex' onkeyup='keyup_regex(this)' id='risk-pctindemnity' name='risk-pctindemnity' type='text' data-regex='^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$' value = '0'><div class='invalid-feedback'>Percentage can't be greater than 100</div>");
// }

changeRateByPolicyYear(1);

$("#PolicyYear").on("select2:select", function () {
    changeRateByPolicyYear($(this).val());
});

function changeRateByPolicyYear(policyYear){
    dsCoverageDetByYear = dsCoverage[0]['CoverageDetail'].filter(dscoveragedet => dscoveragedet.RefCode == risk && (dscoveragedet.PolicyYear == policyYear || dscoveragedet.PolicyYear == 0));
    var orderno = dsCoverageDetByYear[0]['OrderNo'];
    $('#pct-suminsured-risk').empty();
    $('#pct-suminsured-policyyear').empty();
    var pctindemnity;
    if (dsCoverageDetByYear[0]['PCTLOSS'] != 0){
        //For PCT sum Insured
        //Input Element
        var inputElement = document.createElement('input');
        inputElement.className = 'form-control risk-pctindemnity onkeyup_regex';
        inputElement.onkeyup = 'keyup_regex(this)';
        inputElement.id = 'risk-pctindemnity';
        inputElement.name = 'risk-pctindemnity';
        inputElement.type = "text";
        inputElement.setAttribute('data-regex','^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$');
        //div invalid feedback
        var divFeedback = document.createElement('div');
        divFeedback.className = 'invalid-feedback'
        divFeedback.innerHTML = "Percentage can't be greater than 100";

        //div col-sm-3
        var divColumn = document.createElement('div')
        divColumn.className = "col-sm-3";
        divColumn.appendChild(inputElement);
        divColumn.appendChild(divFeedback);

        //div Row
        var divRow = document.createElement('div');
        divRow.className = "row";
        divRow.appendChild(divColumn);

        //Label
        var label = document.createElement('Label');
        label.for = "risk-pctindemnity";
        label.innerHTML = "% Of Sum Insured";

        //div form group
        var divFormGroup = document.createElement('div');
        divFormGroup.className = "form-group";
        divFormGroup.appendChild(label);
        divFormGroup.appendChild(divRow);

        document.getElementById('pct-suminsured-risk').appendChild(divFormGroup);

        //For Rate
        //Input Element
        var inputElement = document.createElement('input');
        inputElement.type = "text";
        inputElement.className = "form-control number-format risk-rate";
        inputElement.id = "risk-rate";
        inputElement.name = "risk-rate";

        //Label
        var label = document.createElement('label');
        label.for = "risk-rate";
        label.innerHTML = "Rate";

        //Div Column
        var divColumn = document.createElement('div');
        divColumn.className = "col-sm-12";
        divColumn.appendChild(label);
        divColumn.appendChild(inputElement);

        //Div Row
        var divRow = document.createElement('div');
        divRow.className = "row justify-content-center";
        divRow.appendChild(divColumn);

        //Div Form Group
        var divFormGroup = document.createElement('div');
        divFormGroup.className = "form-group";
        divFormGroup.appendChild(divRow);

        document.getElementById('pct-suminsured-policyyear').appendChild(divFormGroup);

        pctindemnity = ($('#risk-pctindemnity_' + orderno).val() / dsCoverageDetByYear[0]['PCTLOSS']) * 100;
    }else{
        //Input Element
        var inputElementRate = document.createElement('input');
        inputElementRate.type = "text";
        inputElementRate.className = "form-control number-format risk-rate";
        inputElementRate.id = "risk-rate";
        inputElementRate.name = "risk-rate";

        //Label
        var labelRate = document.createElement('label');
        labelRate.for = "risk-rate";
        labelRate.innerHTML = "Rate";

        //Div Column Rate
        var divColumnRate = document.createElement('div');
        divColumnRate.className = "col-sm-6";
        divColumnRate.appendChild(labelRate);
        divColumnRate.appendChild(inputElementRate);

        //Input Element Sum Insured
        var inputElementSI = document.createElement('input');
        inputElementSI.className = 'form-control risk-pctindemnity';
        // inputElementSI.onkeyup = 'keyup_regex(this)';
        inputElementSI.id = 'risk-pctindemnity';
        inputElementSI.name = 'risk-pctindemnity';
        inputElementSI.type = "text";
        inputElementSI.setAttribute('data-regex','^100(\\.0{0,2})? *%?$|^\\d{1,2}(\\.\\d{1,2})? *%?$');
        
        //div invalid feedback
        var divFeedback = document.createElement('div');
        divFeedback.className = 'invalid-feedback'
        divFeedback.innerHTML = "Percentage can't be greater than 100";

        //Label Sum Insured
        var labelSI = document.createElement('label');
        labelSI.for = "risk-pctindemnity";
        labelSI.innerHTML = "% Of Sum Insured";

        //Div Column SI
        var divColumnSI = document.createElement('div');
        divColumnSI.className = "col-sm-6";
        divColumnSI.appendChild(labelSI);
        divColumnSI.appendChild(inputElementSI);
        divColumnSI.appendChild(divFeedback);

        //Div Row
        var divRow = document.createElement('div');
        divRow.className = "row";
        divRow.appendChild(divColumnRate);
        divRow.appendChild(divColumnSI);

        //Div Form Group
        var divFormGroup = document.createElement('div');
        divFormGroup.className = "form-group"
        divFormGroup.appendChild(divRow);

        document.getElementById('pct-suminsured-policyyear').appendChild(divFormGroup);

        pctindemnity = $('#risk-pctindemnity_' + orderno).val();
    }
    $('#risk-rate').val($('#risk-rate_' + orderno).val());
    $('#risk-pctindemnity').val(pctindemnity);
    if (orderno == 0){
        $('#risk-rate').attr('readonly','readonly');
        $('#risk-pctindemnity').attr('readonly','readonly');
    }

    $('.risk-rate').on('keyup',function(){
        $('#risk-rate_' + dsCoverageDetByYear[0]['OrderNo']).val($(this).val());
    });
    
    $('.risk-pctindemnity').on('keyup',function(){
        var exp = $(this).attr('data-regex');
        var value = $(this).val();
        if ($(this).attr('style') == 'text-transform:uppercase'){
            value = value.toUpperCase();
        }
        if (exp != '' && exp != undefined){
            // var
            if (checkRegex(value,exp)){
                $(this).removeClass("is-invalid");
            }else{
                $(this).addClass("is-invalid");
            }
        }

        var pctloss = dsCoverageDetByYear[0]['PCTLOSS'];
        if (pctloss != 0){
            for (i=0; i < basedata['policyyear']; i++){
                pctloss = dsCoverageDet[i]['PCTLOSS'];
                value = $(this).val()*(pctloss/100); 
                $('#risk-pctindemnity_' + dsCoverageDet[i]['OrderNo']).val(value);
            }
        }else{
            $('#risk-pctindemnity_' + dsCoverageDetByYear[0]['OrderNo']).val($(this).val());
        }
    });

    $(".onkeyup_regex").on("keyup", function () {
        // console.log($(this).val());
        var exp = $(this).attr('data-regex');
        var value = $(this).val();
        if ($(this).attr('style') == 'text-transform:uppercase'){
            value = value.toUpperCase();
        }
        if (exp != '' && exp != undefined){
            // var
            if (checkRegex(value,exp)){
                $(this).removeClass("is-invalid");
            }else{
                $(this).addClass("is-invalid");
            }
        }
    });
}

$('.btn-save').on('click', function(event){
    event.preventDefault();
    if ($('#risk-pctindemnity').hasClass('is-invalid')){
        $('#risk-pctindemnity').focus();
    }else{
        for (i=0; i < basedata['policyyear']; i++){
            var newrate = $('#risk-rate_' + dsCoverageDet[i]['OrderNo']).val();
            var newpctindemnity = $('#risk-pctindemnity_' + dsCoverageDet[i]['OrderNo']).val();
            $('#RATE_' + dsCoverageDet[i]['OrderNo']).val(newrate);
            $('#PCTIndemnity_' + dsCoverageDet[i]['OrderNo']).val(newpctindemnity);
        }
        $("#modal-general").modal("hide");
    }
});


