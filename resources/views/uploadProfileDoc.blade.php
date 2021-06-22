<form action="{{ route('profile.uploadDocument') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">
      <input type="hidden" class="form-control-file" name="profileid" id="txtProfileIDUpload" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Example file input</label>
      <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" multiple="multiple" required>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-block bg-gradient-primary col-5">
    </div>
    <div class="form-group img-form">
      <!-- <img src="" id="profile-img-tag" width="200px" /> -->
    </div>
  </form>

  

  <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
          for (i=0; i < input.files.length;i++){
            var reader = new FileReader();
            // console.log(input.files);
            // console.log(input.files.length);
              reader.onload = function (e) {
                // console.log(e);
                  $('.img-form').append('<img src="' +  e.target.result + '" width="200px" /><p>"'+ input.files[0].name +'"</p>')
              }
              reader.readAsDataURL(input.files[i]);
          }
        }
    }
    $("#exampleFormControlFile1").change(function(){
        readURL(this);
    });
  </script>