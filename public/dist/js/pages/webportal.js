function toastMessage(responseCode, responseMessage){
    var Toast = Swal.mixin(
        {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        }
    );
    if (responseCode == "200"){
        Toast.fire(
            {
                icon: 'success',
                title: ' ' + responseMessage
            }
        )
    }else if (responseCode == "400" || responseCode == "401"){
        Toast.fire(
            {
                icon: 'error',
                title: ' ' + responseMessage
            }
        )
    }
}

function popupToast(inputtype, inputLabel, inputPlaceholder,elementID, readonly, regex, fldtag){
    console.log(regex);
    var attributes = new Array();
    if (readonly){
        attributes = {
            "style":"text-transform:uppercase",
            "readonly":""
        }
    }else{
        attributes = {
            "style":"text-transform:uppercase",
        }
    }
    (async () => {
        const { value: text } = await Swal.fire({
          input: inputtype,
          inputLabel: inputLabel,
          inputPlaceholder: inputPlaceholder,
          confirmButtonColor: '#0d6efd',
          inputValue: $('#' + elementID).val(),
          inputAttributes: attributes,
          showCancelButton: true,
          showLoaderOnConfirm: true,
          preConfirm: (value) => {
            return new Promise(function(resolve, reject) {
                if (!checkRegex(value.toUpperCase(),regex)){
                    reject(new Error("The format "+ fldtag +" is invalid !"));
                }
                resolve();
            }).catch(error => {
                Swal.showValidationMessage(
                  `${error}`
                )
            })
          }
        })
        if (text) {
          $('#' + elementID).val(text);
        }
    })()
}

function getData(ajaxurl) { 
    return $.ajax({
        url: ajaxurl,
        type: 'GET',
        contentType: "application/json; charset=utf-8",
    });
};

function getformatedDate(date){
    // console.log(date);
    if (date === undefined){
        var d = new Date();
    }else{
        var d = new Date(date);
    }
    // console.log(d);

    var month = d.getMonth()+1;
    var day = d.getDate();
    var year = d.getFullYear();

    var output = (month<10 ? '0' : '') + month + '/' +  (day<10 ? '0' : '') + day + '/' + year ;
    return output;
}

function getFormatedTime(date){
    var d = new Date(date);

    var hour = d.getHours();
    var minute = d.getMinutes();
    var second = d.getSeconds();

    var output = (hour<10 ? '0' : '') + hour + ':' +  (minute<10 ? '0' : '') + minute + ':' + (second<10 ? '0' : '') + second;
    return output;
}

function getModalView(url){
    return $.ajax({
      url: url,
      type: 'GET',
      dataType: 'html',
      beforeSend: function() { $('#loadMe').modal('show'); },
        complete: function() { $('#loadMe').modal('hide'); }
    });
}

function getDataNew(ajaxurl) { 
    return $.ajax({
        url: ajaxurl,
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        beforeSend: function() { $('#loadMe').modal('show'); },
        complete: function() { $('#loadMe').modal('hide'); }
    });
};

function number_format(number, decimals, thousands_sep, dec_point) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function checkRegex(input, regex_exp){
    var regex = new RegExp(regex_exp);
    // console.log(regex);
    if(regex.test(input)){
      return true;
    }else{
      return false;
    }
}

async function sleep(time = 1) {
    const sleepMilliseconds = time * 1000
    
    return new Promise(resolve => {
      setTimeout(() => {
        resolve(`Slept for: ${sleepMilliseconds}ms`)
      }, sleepMilliseconds)
    })
}

function dateDiff(interval,SDate, EDate){
    switch (interval.toUpperCase()) {
      case 'DAY':
        return Math.ceil((Math.abs(SDate - EDate))/ (1000 * 60 * 60 * 24));   
        break;
      case 'MONTH':
        var months = (EDate.getFullYear() - SDate.getFullYear()) * 12;
        months -= SDate.getMonth();
        months += EDate.getMonth();
        return months;
        break;
      case 'YEAR':
        return (EDate.getFullYear() - SDate.getFullYear());
        break;
      default:
        return (EDate.getFullYear() - SDate.getFullYear());
        break;
    }
}

function dateAdd(interval, increment, SDate){
var newdate = new Date(SDate);
switch (interval.toUpperCase()) {
    case 'DAY':
    newdate.setDate(SDate.getDate() + increment);
    return newdate;
    break;
    case 'MONTH':
    newdate.setMonth(SDate.getMonth() + increment);
    return newdate;
    break;
    case 'YEAR':
    newdate.setFullYear(SDate.getFullYear() + increment);
    return newdate;
    break;
    default:
    newdate.setFullYear(SDate.getFullYear() + increment);
    return newdate;
    break;
}
}

function refreshDataTable(table, data){
    table.clear().draw();
    table.rows.add(data).draw(); // Add new data
}