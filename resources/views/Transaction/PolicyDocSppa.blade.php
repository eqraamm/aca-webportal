@extends('layout/mainDocSPPA')
@section('scriptpage')
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
      console.log(@json($payload));
      var payload = @json($payload);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      // signatureCapture();
      var signaturePad;

      // $('#btnTestFrame').click(function(event){
      //   var windo = window.open("", "_blank"); 
      //   var objbuilder = '<iframe width="100%" height="100%" src="data:application/pdf;base64,'+ base64 +'"></iframe>';
      //   // var objbuilder = '<object width="100%" height="100%" src="data:application/pdf;base64,"></object>';
      //   windo.document.write(objbuilder); 
      //   windo.focus();
      // });

      $('#btnSubmit').click(function(event){
        event.preventDefault();

        try{
          // var imgttd = document.getElementById("img-ttd").src;
          var name = $('#lblNamaTtd').text();
          var refno = $('#span-sppano').text();
          var pilihansengketa = $('input[name="pilihansengketa"]:checked').val();
          var kondisikendaraan = $('input[name="kondisikendaraan"]:checked').val();
          var tempatsurvey = $('#tempatsurvey').val();
          let _token = $('meta[name="csrf-token"]').attr('content');
          if (pilihansengketa == '' || pilihansengketa == undefined){
            throw 'Pilihan sengketa harus dipilih.'
          }
          if (kondisikendaraan == '' || kondisikendaraan == undefined){
            throw 'Pilihan kondisi kendaraan harus dipilih.'
          }
          if (tempatsurvey == ''){
            throw 'Tempat survey harus di isi.'
          }
          // if (imgttd == ''){
          //   throw 'Tanda tangan terlebih dahulu.';
          // }

          var htmlview;

          Swal.fire({
            title: 'Do you want to save the changes?',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise(function(resolve, reject) {
                // console.log(_token)
                $.ajax({
                  type: "POST",
                  url: "{{ route('submitsppadoc') }}", 
                  data: {
                    AID: '{{ $payload["AID"] }}',
                    payload: payload,
                    Name: name,
                    RefNo: refno,
                    pilihansengketa: pilihansengketa,
                    kondisikendaraan: kondisikendaraan,
                    tempatsurvey: tempatsurvey,
                    alreadySign: false
                  },
                  }).done(function(msg) {
                    console.log(msg);
                    // var url= '"<iframe width="100%" height="100%" src="data:application/pdf;base64, ' + msg.Data + '"></iframe>"';
                    var url='"'+ msg.Data +'"';
                    htmlview = "<a href='#' onclick='openInNewTab("+ url +");'>Klik disini untuk melihat dokumen.</a>";
                    // htmlview = "<a target='_blank' href='data:application/pdf;base64," + msg.Data + "'>Klik disini untuk melihat dokumen.</a>"
                    resolve({
                      htmlview : htmlview
                    });
                  }).fail(function(xhr, status, error) {
                    console.log(xhr);
                    // $("#loadMe").modal("hide");
                    var message = xhr.responseJSON['message'];
                    reject(new Error(message));
                    // toastMessage('400',message)
                });
              }).catch(error => {
                Swal.showValidationMessage(
                  `Request failed: ${error}`
                )
              })
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
              var link = result.value.htmlview;
              Swal.fire({
                html: link,
                title: 'Document SPPA Ready to Sign',
                icon: 'success',
                allowOutsideClick: false,
                confirmButtonText: "Sign Document",
              }).then((result) => {
                if (result.isConfirmed) {
                  // var canvas = '<div id="canvas"><canvas class="roundCorners" id="newSignature" style="border:1px solid #c4caac"></canvas></div><div><button>Clear sign</button></div><br><div><input id="namattd" name="namattd" style="text-align:center"></div>';
                  var canvas = '<div id="canvas"><canvas class="roundCorners" id="newSignature" style="border:1px solid #c4caac"></canvas></div><div></div><br><div><input id="namattd" name="namattd" style="text-align:center" placeholder="Signer Name"></div>';
                  Swal.fire({
                    title: "<i>Signature</i>", 
                    html: canvas,
                    confirmButtonText: "Save",
                    // cancelButtonText: "Clear Signature", 
                    // showCancelButton: true,
                    showLoaderOnConfirm: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    allowEnterKey: false,
                    reverseButtons: true,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                      return new Promise(function(resolve, reject) {
                        var name = $('#namattd').val();
                        var imgttd = signaturePad.toDataURL("image/png");

                        $.ajax({
                          type: "POST",
                          url: "{{ route('submitsppadoc') }}", 
                          data: {
                            AID: '{{ $payload["AID"] }}',
                            Imgttd: imgttd,
                            payload: payload,
                            Name: name,
                            RefNo: refno,
                            pilihansengketa: pilihansengketa,
                            kondisikendaraan: kondisikendaraan,
                            tempatsurvey: tempatsurvey,
                            alreadySign: true
                          },
                          }).done(function(msg) {
                            console.log(msg);
                            resolve();
                          }).fail(function(xhr, status, error) {
                            console.log(xhr);
                            // $("#loadMe").modal("hide");
                            var message = xhr.responseJSON['message'];
                            reject(new Error(message));
                            // toastMessage('400',message)
                        });
                      }).catch(error => {
                        Swal.showValidationMessage(
                          `Request failed: ${error}`
                        )
                      })
                    }
                  }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed){
                      var titleee = 'Successfully Sign';
                      Swal.fire({
                        // html: "<a target='_blank' href='http://www.care.co.id'>Klik disini untuk melihat dokumen.</a>",
                        title: titleee,
                        icon: 'success',
                      }).then((result) => {
                        if (result.isConfirmed){
                          window.location.href = "http://www.aca.co.id";  
                        }
                      })
                    }else if(result.dismiss === Swal.DismissReason.cancel){
                      console.log('haha');
                      signaturePad.clear();
                    }
                  });
                  signatureCapture();
                }
              })
            }
          })
        }catch(err){
          toastMessage('400',err);
        }
      });

      function openInNewTab(url) {
        // console.log(url);
        let pdfWindow = window.open("");
        // console.log(url);
        var baseurl = "<iframe width='100%' height='100%' src='data:application/pdf;base64,"+ url +"'></iframe>";
        pdfWindow.document.write(baseurl, '_blank');
        // var win = window.open(url, '_blank');
        // win.focus();
     }

      $('#btnSign').on('click', function(event){
        event.preventDefault();
        var canvas = '<div id="canvas"><canvas class="roundCorners" id="newSignature" style="border: 1px solid #c4caac;"></canvas></div><br><div><input id="namattd" name="namattd" style="text-align:center;"/> </div>';
        Swal.fire({
          title: "<i>Signature</i>", 
          html: canvas,  
          showCloseButton: true,
          confirmButtonText: "Save",
          denyButtonText: "Clear Signature", 
          showCancelButton: true,
          showLoaderOnConfirm: false,
          allowEscapeKey: false,
          allowOutsideClick: false,
          allowEnterKey: false,
          reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed){
            console.log(signaturePad.toDataURL());
            document.getElementById("img-ttd").src = signaturePad.toDataURL();
            $('#lblNamaTtd').text($('#namattd').val());
            // console.log( $('#lblNamaTtd').text());
            $('#btnClearSign').removeAttr('style');
          }
        });
        signatureCapture();
      });

      $('#btnClearSign').on('click', function(event){
        event.preventDefault();
        $('#lblNamaTtd').text('');
        document.getElementById("img-ttd").src = '';
        signaturePad.clear();
        $(this).attr('style','display:none;')
      })

      function signatureCapture(){
        signaturePad = new SignaturePad(document.getElementById('newSignature'), {
          backgroundColor: 'rgba(255, 255, 255, 0)',
          penColor: 'rgb(0, 0, 0)'
        });
      }

      function GetFormattedDate(datestring) {
        var d = new Date(datestring);
        var month = d.getMonth() + 1;
        // if (month < 10) {
        //   month = '0' + month;
        // }
        var day = d.getDate();
        // if (day < 10) {
        //   day = '0' + day;
        // }
        var year = d.getFullYear();
        return day + " " + GetMonthDesc(month) + " " + year;
      }

      function GetMonthDesc(month){
        var monthdesc;
        switch(month){
          case 1:
            monthdesc = 'Januari';
            break;
          case 2:
            monthdesc = 'Februari';
            break;
          case 3:
            monthdesc = 'Maret';
            break;
          case 4:
            monthdesc = 'April';
            break;
          case 5:
            monthdesc = 'Mei';
            break;
          case 6:
            monthdesc = 'Juni';
            break;
          case 7:
            monthdesc = 'Juli';
            break;
          case 8:
            monthdesc = 'Agustus';
            break;
          case 9:
            monthdesc = 'September';
            break;
          case 10:
            monthdesc = 'Oktober';
            break;
          case 11:
            monthdesc = 'November';
            break;
          case 12:
            monthdesc = 'Desember';
            break;
        }
        return monthdesc;
      }

      function number_format(number, decimals, dec_point, thousands_sep) {
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
    </script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- General For Web Portal MW -->
    <script src="{{asset('dist/js/pages/webportal.js')}}"></script>
  @endsection