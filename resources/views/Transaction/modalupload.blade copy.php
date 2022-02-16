<div id="actions" class="row">
    <div class="col-sm-7">
        <div class="btn-group w-100">
            <span class="btn btn-success col fileinput-button">
                <i class="fas fa-plus"></i>
                <span>Add files</span>
            </span>
            <button type="submit" class="btn btn-primary col start">
                <i class="fas fa-upload"></i>
                <span>Start upload</span>
            </button>
            <button type="reset" class="btn btn-warning col cancel">
                <i class="fas fa-times-circle"></i>
                <span>Cancel upload</span>
            </button>
        </div>
    </div>
    <div class="col-sm-4 d-flex align-items-center">
        <div class="fileupload-process w-100">
            <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
            </div>
        </div>
    </div>
</div>
<div class="table table-striped files" id="previews">
  <div id="template" class="row mt-2">
    <div class="col-auto">
      <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
    </div>
    <div class="col-sm-4 d-flex align-items-center">
      <p class="mb-0">
      <span class="lead" data-dz-name></span>
      (<span data-dz-size></span>)
      </p>
      <strong class="error text-danger" data-dz-errormessage></strong>
    </div>
    <div class="col-sm-4 d-flex align-items-center">
      <div class="col-sm-16">
        <input class="form-control" id="remarks-file" name="remarks-file" type="text" placeholder="Remarks">
      </div>
      <!-- <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
      </div> -->
    </div>
    <div class="col-auto d-flex align-items-center">
      <div class="btn-group">
        <button class="btn btn-primary start">
          <i class="fas fa-upload"></i>
        </button>
        <button data-dz-remove class="btn btn-warning cancel">
          <i class="fas fa-times-circle"></i>
        </button>
        <button data-dz-remove class="btn btn-danger delete">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone('div#actions', { // Make the whole body a dropzone
      url: "{{route('policy.savepolicydocument')}}", // Set the url
      thumbnailWidth: 100,
      thumbnailHeight: 100,
      // parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      uploadMultiple: false,
      parallelUploads:10,
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });
    // console.log(myDropzone);

    myDropzone.on("addedfile", function(file) {
      // console.log(file);
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
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
          $(".progress-bar").text(progress + "%")
      }
    });

    // sending
    // sendingmultiple
    myDropzone.on("sending", function(file, xhr, formData) {
      // console.log(file);
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      // file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      var remarks = file.previewElement.querySelector("#remarks-file").value;
      console.log(remarks);
      formData.append("_token", "{{ csrf_token() }}");
      formData.append("PID", $('#PID').val());
      formData.append("Remarks", remarks);
    });

    // success
    // successmultiple
    
    myDropzone.on("success", function(file, response){
      console.log(response);
      // console.log(file.previewElement);
      // console.log(file);
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
        toastMessage(response.code,response.message);
      }else{
        $("#modal-general").modal("hide");
        toastMessage('400',response.message);
      }
    });

    // complete
    // completemultiple
    myDropzone.on("complete", function(file) {
      // console.log(file);
      // console.log('complete multiple biasa nih bos');
      // this.removeAllFiles(true); 
    })

    // error
    // errormultiple
    myDropzone.on("error", function(file, response){
      // console.
      console.log(response);
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>