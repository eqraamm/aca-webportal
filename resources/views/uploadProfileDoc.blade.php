<form action="{{ route('profile.uploadDocument') }}" method="post" enctype="multipart/form-data" style="width: 100%; padding-left:5%; text-align: center;">
@csrf
    
                    <div class="form-group">
                        <label for="exampleFormControlFile1"> *Allowed extension : JPG,JPEG,PNG,PDF 
                          *Max Pic Size : 300 KB/File, Max Doc Size : 3000 KB/File</label>
                          <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" onchange="previewFiles()" multiple="multiple" required>
                     </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-block bg-gradient-primary col-3">
                      </div>

</form>
  <div class="card-body">
            <table id="tblModalUpload" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>file</th>
                    <th>Name</th>
                    <th>title</th>                                                                                                                                                                                                                                                                                                                                                    
                    <th>uploaded date</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td id="preview"></td>
                    <td>calvin</td>
                    <td>KTP</td>
                    <td>1/03/2021</td>
                    <td><h5><span class="badge badge-warning">pending</span></h5>
                    <a href="#" i class="nav-icon fas fa-trash"></i>
                    </td>
                  
                    </tr>
                  
                </tbody>
            </table>
  </div>

  

  <script>
    function readURL(input) {
         if(input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                $('.img-form').append('<img src="' +  e.target.result + '" width="200px" />')
                // $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#exampleFormControlFile1").change(function(){
        readURL(this);
    });
  </script>
   <script>
            function previewFiles() {
                
                var preview = document.querySelector('#preview');
                var files   = document.querySelector('input[type=file]').files;
                
                function readAndPreview(file) {
                    
                    // Make sure `file.name` matches our extensions criteria
                    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
                        document.getElementById('preview').innerHTML ="";
                        var reader = new FileReader();
                        reader.addEventListener("load", function () {
                            var image = new Image();
                            image.height = 100;
                            image.title = file.name;
                            image.src = this.result;
                            preview.appendChild( image );
                        }, false);
                        
                        reader.readAsDataURL(file);
                    }
                    
                }
                
                if (files) {
            [].forEach.call(files, readAndPreview);
        }
        
}
</script>
<script>
  $(function () {
    $("#tblModalUpload").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
  }
  );
  </script>