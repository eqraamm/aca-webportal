
<html>
  <body>
    <div class="form-group">
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <label for="risk-code">Risk Code</label>
            <input type="text" class="form-control" id="risk-code" name="risk-code" readonly></input> 
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <label for="risk-description">Description</label>
            <input type="text" class="form-control" id="risk-description" name="risk-description" readonly></input> 
        </div>
      </div>
    </div>
    <div id="pct-suminsured-risk">
    </div>
    <div class="form-group">
      <label for="PolicyYear">Policy Year</label>
      <div class="row">
        <div class="col-sm-2">
          <select class="form-control" id="PolicyYear" name="PolicyYear">
            
          </select>
        </div>
      </div>
    </div>
    <div id="pct-suminsured-policyyear">

    </div>
    <div id="input-hidden">
      
    </div>
    <div class="form-group">
      <button class='btn btn-sm btn-primary btn-block btn-save' >Save</button>
    </div>
  </body>
  <script>
    var basedata = @json($data);
  </script>
  <script src="{{asset('dist/js/Transaction/modalDetailRisk.js')}}"></script>
  <!-- General For Web Portal MW -->
  <script src="{{asset('dist/js/pages/webportal.js')}}"></script>
</html>