<form action="{{ route('profile.uploadDocument') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">
      <input type="hidden" class="form-control-file" name="profileid" id="txtProfileIDUpload" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Example file input</label>
      <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-block bg-gradient-primary col-5">
    </div>
    <div class="form-group">
      <img src="" id="profile-img-tag" width="200px" />
    </div>
  </form>

  

  <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#exampleFormControlFile1 ").change(function(){
        readURL(this);
    });
  </script>