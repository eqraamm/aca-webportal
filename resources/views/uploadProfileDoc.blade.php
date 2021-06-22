<form action="{{ route('profile.uploadDocument') }}" method="post" enctype="multipart/form-data" style="width: 100%; padding-left:5%; text-align:center;">
@csrf
    
                    <div class="form-group" style="width: 100%; padding-left:5%; text-align: center;">
                      <label for="exampleFormControlFile1"> *Allowed extension : JPG,JPEG,PNG,PDF 
                        *Max Pic Size : 300 KB/File, Max Doc Size : 3000 KB/File</label>
                        <table style="width: 100%; padding-left:5%; text-align: center;">
                          <tr>
                           <td><input type="file" class="form-control" name="image" id="exampleFormControlFile1" multiple="multiple" required></td>
                          </tr>
                        </table>                        
                     </div>
                        <div class="form-group" align="center">
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
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody id="body">
                </tbody>
            </table>
  </div>
 

  <script>
    function readURL(input) {
      console.log(input.files.length);
         if(input.files && input.files[0]) {
           for (i=0; i<input.files.length;i++){
             var name = input.files[i].name;
             console.log(name);
            var reader = new FileReader();
            reader.onload = function (e) { 
                $('#body').append('<tr><td id="preview"><img src="' +  e.target.result + '" width="110px" /></td><td>'+ name +'</td><td>KTP</td><td>1/03/2021</td><td><h5><span class="badge badge-warning">pending</span></h5></td><td><a href="#" class="nav-icon fas fa-trash" style="font-size:25px;color:red;"></a> <a href="#" class="nav-icon fas fa-edit" style="font-size:25px;color:green;"></a></td></tr>');
            }
            reader.readAsDataURL(input.files[i]);
           }            
        }
    }
    $("#exampleFormControlFile1").change(function(){
        readURL(this);
    });
  </script>
   <!-- <script>
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
        "searching": false,
        "info": false,
        
    });
  }
  );
  </script> -->