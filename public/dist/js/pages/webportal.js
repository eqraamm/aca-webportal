function toastMessage(responseCode, responseMessage){
    var Toast = Swal.mixin(
        {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
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

function popupToast(inputtype, inputLabel, inputPlaceholder,elementID, readonly){
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
          inputOptions: {
              sppa: 'SPPA Document',
              quotation: 'Quotation'
          },
          confirmButtonColor: '#0d6efd',
          inputValue: $('#' + elementID).val(),
          inputAttributes: attributes,
          showCancelButton: true
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
    console.log(date);
    if (date === undefined){
        var d = new Date();
    }else{
        var d = new Date(date);
    }
    console.log(d);

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

//   function getformatedDate(date){
//     var d = new Date(date);

//     var month = d.getMonth()+1;
//     var day = d.getDate();
//     var year = d.getFullYear();

//     var output = (month<10 ? '0' : '') + month + '/' +  (day<10 ? '0' : '') + day + '/' + year ;
//     return output;
//   }