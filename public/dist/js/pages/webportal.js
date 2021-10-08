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

