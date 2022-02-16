
<html>
  <head>
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
    <style>
      .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <div class="form-group">
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <label for="Title">Title</label>
            <select class="form-control document-select" id="Title">
              <!-- <option value=""></option>
              <option value="Identitas">Identitas</option>
              <option value="Bagian Depan">Bagian Depan</option>
              <option value="Bagian Belakang">Bagian Belakang</option> -->
            </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <label for="Title">Remarks</label>
            <input type="text" class="form-control" id="Remarks" name="remarks"></input> 
        </div>
      </div>
    </div>
    <div class="form-group">
      <form action="" class="dropzone" id="my-great-dropzone">
        <!-- <div class="dz-message">
          <div class="mb-4">
            <span class="d-block h5 mb-1">Choose files to upload</span>
            <span class="d-block text-secondary mb-1">or</span>
            <span class="d-block">Drag n' drop</span>
          </div>
          <span class="btn btn-sm btn-primary">Browse files</span>
        </div> -->
        <!-- <div id="dropzoneItemTemplate" style="display: none;">
          <div class="col h-100 mb-5">
            <div class="dz-preview dz-file-preview">
              <div class="d-flex justify-content-end dz-close-icon">
                <small class="fa fa-times" data-dz-remove></small>
              </div>
              <div class="dz-details media">
                <div class="dz-img">
                  <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                </div>
                <div class="media-body">
                  <h6 class="dz-filename">
                    <span class="dz-title" data-dz-name></span>
                  </h6>
                  <div class="dz-size" data-dz-size></div>
                </div>
              </div>
              <div class="dz-progress progress" style="height: 4px;">
                <div class="dz-upload progress-bar bg-success" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
              </div>
              <div class="d-flex align-items-center">
                <div class="dz-success-mark">
                  <span class="fa fa-check-circle"></span>
                </div>
                <div class="dz-error-mark">
                  <span class="fa fa-times-circle"></span>
                </div>
                <div class="dz-error-message">
                  <small data-dz-errormessage></small>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <div class="dz-message">
          <div class="mb-4">
            <span class="d-block h5 mb-1">Drag n' drop</span>
            <span class="d-block text-secondary mb-1">or</span>
            <span class="d-block">Choose files to upload</span>
          </div>
          <span class="btn btn-sm btn-primary file-input">Browse files</span>
        </div>
        <!-- <div id="dropzoneItemTemplate" style="display: none;">
          <img src="data:," alt="" data-dz-thumbnail alt="test" />
        </div> -->
      </form>
    </div>
    <div style="display:none" class="card card-preview">
      <div class="card-body">
        <div class="form-group">
          <div class="col-sm-12">
            <img id="img-preview" style="max-width: 100%; max-height:100%;" src=""/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button class='btn btn-sm btn-danger btn-block btn-remove'>Remove</button>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button class='btn btn-sm btn-primary btn-block btn-upload' disabled>Upload</button>
    </div>
  </body>
  <script>
    $('.document-select').select2({
      theme: 'bootstrap4',
    });
    var dropzone = document.getElementById('my-great-dropzone');
    var cardPreview = document.querySelector('.card-preview');
    var imgpreview = document.getElementById('img-preview');

    var myDropzone = new Dropzone('#my-great-dropzone', { // Make the whole body a dropzone
      url: "{{route('policy.savepolicydocument')}}", // Set the url
      thumbnailWidth: 100,
      thumbnailHeight: 100,
      maxFiles: 1,
      // parallelUploads: 20,
      //  previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      // previewsContainer: "#previews", // Define the container to display the previews
      // previewElement: "#img-preview", // Define the container to display the previews
      // uploadMultiple: false,
      // parallelUploads:1,
      clickable: ".file-input" // Define the element that should be used as click trigger to select files.
    });
    myDropzone.on("addedfile", function(file) {
      $('.btn-upload').removeAttr('disabled');
      dropzone.style.display = "none";
      cardPreview.style.display = "block";
      document.querySelector(".btn-upload").onclick = function() { 
        $('#div-overlay-modal').empty();
	      $('#div-overlay-modal').append('<div style="position:absolute;" class="overlay"><i style="position:absolute; left:50%; top:50%; margin-top:-25px; margin-left:-25px;" class="fas fa-2x fa-sync fa-spin"></i></div>');
        myDropzone.enqueueFile(file);
      };
      document.querySelector(".btn-remove").onclick = function(){
        dropzone.style.display = "block";
        cardPreview.style.display = "none";
        imgpreview.src = "";
        myDropzone.removeAllFiles(true);
      }
    })
    myDropzone.on('thumbnail', function(file, dataURL) {
      imgpreview.src = file.dataURL;
    });
    myDropzone.on("maxfilesexceeded", function(file) {
      alert("No more files please!");
      this.removeFile(file);
      // this.addFile(file);
      // Hookup the start button
      // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })
    myDropzone.on("sending", function(file, xhr, formData) {
      // console.log(file);
      // Show the total progress bar when upload starts
      // document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      // file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      // var remarks = file.previewElement.querySelector("#remarks-file").value;
      // console.log(remarks);
      formData.append("_token", "{{ csrf_token() }}");
      formData.append("PID", $('#PID').val());
      formData.append("Title", $('#Title').val());
      formData.append("Remarks", $('#Remarks').val());
      // formData.append("Remarks", remarks);
    });
    myDropzone.on("totaluploadprogress", function(progress) {
      // document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      // console.log(progress);
    })
    myDropzone.on('uploadprogress',function(file, progress, bytesSent){
      // console.log(file);
      if (file.previewElement) {
        // console.log(progress);
        // console.log(file);
        // console.log(bytesSent);
        // console.log(file.upload.bytesSent);
          // var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
          // progressElement.style.width = progress + "%";
          // progressElement.querySelector(".progress-bar").value = progress + "%";
          // $(".progress-bar").text(progress + "%")
      }
    });
    myDropzone.on("success", function(file, response){
      console.log(response);
      // console.log(file.previewElement);
      // console.log(file);
      $('#div-overlay-modal').empty();
      if (response.code == '200'){
        drawDataTablePolDoc(response.listpolicydoc.Data);
        // var tblDoc = $('#tblPolDocUpload').DataTable();
        // // for (i=0; i < file.length; i++){
        //   tblDoc.row.add([
        //     '-',
        //     '<span class="preview"><img class"preview-doc-policy" src="' + file.dataURL + '" alt="' + file.name + '" style="width:80px;height:80px;"></span></td>',
        //     file.type,
        //     file.name,
        //     file.name,
        //     '<a href="#"><img src="{{asset("dist/img/trash.svg")}}"  width="30" height="30" type="button" class="btn-del-row"></a>'
        //   ]).draw(); 
        // }
        $("#modal-general").modal("hide");
        toastMessage(response.code,'SPPA Photo / Document Successfully Uploaded.');
      }else{
        $("#modal-general").modal("hide");
        toastMessage('400',response.message);
      }
    });
    // console.log($('#ProductID').val());
    var datas;
    if ($('#ProductID').val() == '0202'){
      datas = [
        {
          id : "Identitas",
          text : "Identitas"
        },
        {
          id : "Bagian Depan",
          text : "Bagian Depan"
        },
        {
          id : "Bagian Belakang",
          text : "Bagian Belakang"
        },
        {
          id : "Bagian Kanan",
          text : "Bagian Kanan"
        },
        {
          id : "Bagian Kiri",
          text : "Bagian Kiri"
        },
        {
          id : "Rangka/Mesin",
          text : "Rangka/Mesin"
        },
        {
          id : "Ruang Mesin",
          text : "Ruang Mesin"
        },
        {
          id : "Lain-lain",
          text : "Lain-lain"
        }
      ];
    }else{
      datas = [
        {
          id : "Identitas",
          text : "Identitas"
        },
        {
          id : "Bagian Depan",
          text : "Bagian Depan"
        },
        {
          id : "Bagian Dalam",
          text : "Bagian Dalam"
        },
        {
          id : "Bagian Kanan",
          text : "Bagian Kanan"
        },
        {
          id : "Bagian Kiri",
          text : "Bagian Kiri"
        },
        {
          id : "Lain-lain",
          text : "Lain-lain"
        }
      ];
    }
    
    datas.forEach(function (data) {
      var newOption = new Option(data.text, data.id, false, false);
      $('.document-select').append(newOption).trigger('change');
    });
    
  </script>
</html>