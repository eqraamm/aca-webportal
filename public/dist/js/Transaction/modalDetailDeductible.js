
var deductible = ($('#Deductible' + data['orderno']).val() == '' || $('#Deductible' + data['orderno']).val() == 0) ? data['fixedmin'] : $('#Deductible' + data['orderno']).val();
var pcttsi = ($('#DEDPCTTSI' + data['orderno']).val() == '' || $('#Deductible' + data['orderno']).val() == 0) ? data['pcttsi'] : $('#DEDPCTTSI' + data['orderno']).val();
var pctcl = ($('#DEDPCTCL' + data['orderno']).val() == '' || $('#Deductible' + data['orderno']).val() == 0) ? data['pctcl'] : $('#DEDPCTCL' + data['orderno']).val();
var remarks = $('#deductible-remarks' + data['orderno']).html();
var fixedmax = data['fixedmax'];

$('#deductible-code').val(data['dcode']);
$('#deductible-remarks').val(remarks);

var EditableF = data['editableF'];
if (EditableF == 'true'){
    $('#FixedMin').val(number_format(deductible,2));
    $('#PCTTSI').val(pcttsi);
    $('#PCTCL').val(pctcl);
    $('#FixedMin').removeAttr('readonly');
    $('#PCTTSI').removeAttr('readonly');
    $('#PCTCL').removeAttr('readonly');
}else{
    $('#FixedMin').val(number_format(data['fixedmin'],2));
    $('#PCTTSI').val(data['pcttsi']);
    $('#PCTCL').val(data['pctcl']);
}

$('.btn-save').on('click',async function(){
    var fixedmin = Math.floor($('#FixedMin').val().replace(/\,/g,''));
    var pcttsi = Math.floor($('#PCTTSI').val());
    var pctcl = Math.floor($('#PCTCL').val());
    
    // console.log(fixedmin);
    // fixedmin = fixedmin.replace(/\,/g,'');
    // console.log(fixedmin)
    // console.log(Math.floor(fixedmin));

    var url = urlGetDeductibleRemarks + "?topro=" + $('#CoverageID').val() + "&dcode=" + data['dcode'] + "&fixedmin=" + fixedmin + "&pcttsi=" + pcttsi + "&pctcl=" + pctcl + "&fixedmax=" + fixedmax;
    // console.log(url);
    
    var response = await getDataNew(url,true);
    // console.log(response);
    if (response.code == '200'){
        $('#deductible-remarks').val(response.Data[0]['Deductibles']);
        $('#deductible-remarks' + data['orderno']).html(response.Data[0]['Deductibles']);
        $('#Deductible' + data['orderno']).val(fixedmin);
        $('#DEDPCTTSI' + data['orderno']).val(pcttsi);
        $('#DEDPCTCL' + data['orderno']).val(pctcl);
        $("#modal-general").modal("hide");
    }else{
        toastMessage('400',response.message);
    }

    

    // $("#modal-general").modal("hide");
});