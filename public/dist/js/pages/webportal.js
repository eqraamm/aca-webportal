function toastMessage(responseCode, responseMessage){
    var Toast = Swal.mixin(
        {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
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