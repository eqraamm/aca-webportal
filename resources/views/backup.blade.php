<!-- ini backup sppa lama -->
<main>
            <div class="container-fluid">
               
                           
            
            <!-- tempat icon -->

            <div class="icon mt-3 mb-3 " align="center">
                <img src="{{asset('dist/img/floppy-disk.png')}}" id="save"  width="40" height="40" type="submit" value="simpan">
                <img src="{{asset('dist/img/calculator.png')}}" id="premi-cal" width="40" height="40" type="button" >
                <img src="{{asset('dist/img/mail.png')}}" id="send" width="40" height="40" type="button">
                <img src="{{asset('dist/img/loupe.png')}}" id="search" width="40" height="40" type="button">
                <img src="{{asset('dist/img/button.png')}}" id="download"  width="40" height="40" type="button">
                <img src="{{asset('dist/img/pencil.png')}}" id="edit" width="40" height="40" type="button">
                <img src="{{asset('dist/img/remove.png')}}" id="delete" width="40" height="40" type="button">
                
            </div>
<!-- bagian nav -->
 <!-- Nav tabs -->
 <form action="" method="post">
 @csrf
 <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#GeneralPolicyInformation">General Policy Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#objectinfo">Object Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Risk">Risk</a>
  </li>
</ul>
<!--isian nya-->
<div class="tab-content">
  <div id="GeneralPolicyInformation" class="container tab-pane active"><br>
      <form class="needs-validation" validate>
        <!-- field branch -->
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="branch">Branch *</label>
              <select class="custom-select" name="branch" id="Branch">
              <option value=""> </option>
              @foreach ($Branch['Data'] as $dataBranch)
                    <option value="{{$dataBranch['Branch']}}">{{$dataBranch['Name']}}</option>
                @endforeach
                </select>
            </div>
            </div>
            <!-- field CT -->
            <div class="col-md-4 mb-3">
              <label for="CT">CT *</label>
              <select class="custom-select" name="CT" id="CT">
              <option value=""> </option>
              @foreach ($CT['Data'] as $dataCT)
                    <option value="{{$dataCT['CT']}}">{{$dataCT['Description']}}</option>
                @endforeach  
                </select>
            </div>
          <!-- field class of business -->
            <div class="col-md-4 mb-3">
              <label for="class of business">Class Of Business *</label>
              <select class="custom-select" id="Class" name="Class">
                 <option value=""> </option>
                 @foreach ($Class['Data'] as $dataClass)
                    <option value="{{$dataClass['ProductID']}}">{{$dataClass['Description']}}</option>
                @endforeach
                </select> 
              </div>
              <!-- field tipe -->
                 <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tipe">Tipe *</label>
                        <select class="custom-select" name="tipe" id="Tipe">
                          <option value="ASRI">Asuransi Rumah Idaman</option>
                          <option value="OTOMATE">OTOMATE</option>  
                        </select> 
                    </div>                     
                </div> 
                <!-- field policy type -->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="policy type">Policy Type *</label>
                        <select class="custom-select" name="PolicyType" id="PolicyType">
                          <option value="New">New</option>  
                        </select> 
                    </div>       
                    <!-- field SPPA No -->
                    <div class="col-md-4 mb-3">
                        <label for="sppa no">SPPA No *</label>
                        <input type="text" class="form-control" id="SppaNo" placeholder="SPPA No" disabled>
                    </div>             
                </div>
                <!-- field segment -->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="Segment" id="Segment">Segment</label>
                        <select class="custom-select" name="segment" id="Segment">
                        <option value=""> </option>
                @foreach ($Segment['Data'] as $dataSegment)
                    <option value="{{$dataSegment['Segment']}}">{{$dataSegment['Description']}}</option>
                @endforeach 
                        </select> 
                    </div>   
                </div>    
                    <!-- field policy No -->
                    <div class="col-md-4 mb-3">
                        <label for="policy no">Policy No *</label>
                        <input type="text" class="form-control" id="PolicyNo" placeholder="Policy No" required>
                    </div>             
                
                <!-- field product -->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="product" id="product">Product *</label>
                        <select class="custom-select" name="product" id="Product">
                        <option value=""> </option>
                        @foreach ($Product['Data'] as $dataProduct)
                    <option value="{{$dataProduct['CoverageID']}}">{{$dataProduct['Description']}}</option>
                @endforeach  
                        </select> 
                    </div>                     
                </div>

                <!-- field policy holder dengan modal pop-up-->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="policy holder" class="button" type="button" data-toggle="modal" data-target="#modal-policy-holder" id="policy-holder">Policy Holder</label>
                        <select class="custom-select" name="PolicyHolder" id="HolderID" onchange="Holder()">
                      <option value=""> </option>
                      @foreach ($Profile['Data'] as $dataProfile)
                      <option value="{{$dataProfile['ID']}}">{{$dataProfile['Name']}} </option>
                      @endforeach      
                        </select> 
                    </div>                     
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              
                <!--bagian modal policy holder-->
                <div class="modal fade" id="modal-policy-holder" tabindex="-1" role="dialog" aria-labelledby="modal-policy-holder" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Policy Holder</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                    <!-- form insured dengan modal pop-up-->
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="insured" class="btn-secondry" id="insured" type="button" data-toggle="modal" data-target="#modal-insured">Insured</label>
                        <select class="custom-select" name="insured" id="InsuredID" onchange="Holder()">
                            <option selected> </option>
                          @foreach ($Profile['Data'] as $dataProfile)
                      <option value="{{$dataProfile['ID']}}">{{$dataProfile['Name']}}</option>
                      @endforeach
                        </select>
                    </div>                     
                </div>

                    <!-- bagian modal insured-->
                    <div class="modal fade" id="modal-insured" tabindex="-1" role="dialog" aria-labelledby="modal-insured" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Insured</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>

                
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="long name insured" id="long-name-insured">Long Name Insured</label>
                        <input type="text" class="form-control" id="LongInsured" placeholder="Long Insured Name" required>
                    </div>                     
                </div>

                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="insured period" id="period-date">Insured period from</label>
                        <input type="date" class="form-control" id="DatePeriodFrom">
                    </div>   
                    
                    <div class="col-md-2 mb-3">
                        <label for="insured period" id="period-date">Insured Period to</label>
                        <input type="date" class="form-control" id="DatePeriodTo">
                    </div>   

                    <div class="col-md-1 mb-1">
                        <label for="days" id="days">Days</label>
                        <input type="text" class="form-control" id="days" placeholder="Days" required>
                    </div> 

                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                          <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                          </label>
                        </div>
                      </div>
                 </div>
            </form>
    </div>

<!-- bagian object info -->
  <div id="objectinfo" class="container tab-pane fade"><br>
    <form class="needs-validation" validate>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="Brands">Brands</label>
          <select class="custom-select" name="brands" id="brands">
              <option selected> </option>
            </select>
        </div>
      </div>

      <!-- ini nantinya akan ambil dari profile dengan suggest box-->
  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="model">Model</label>
          <select class="custom-select" name="model" id="brands">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="vehicle type">Type Of Vehicle</label>
          <select class="custom-select" name="typ-vehicle" id="typ-vehicle">
              <option selected> </option>
          </select> 
      </div>               
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="cat-vehicle">Vehicle Catagory</label>
          <select class="custom-select" name="cat-vehicle" id="cat-vehicle">
              <option selected> </option>
          </select> 
      </div>                
  </div> 

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="seat">Seat Capacity</label>
          <input class="form-control" name="seat" id="seat" type="number">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="license">License Number</label>
          <input class="form-control" name="license" id="license" type="text">
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="machine">Machine Number</label>
          <input class="form-control" name="machine" id="machine-Number" type="text">
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="cahssis">Chassis Number</label>
          <input class="form-control" name="chassis" id="chassis" type="text">
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="used">The Used of Vehicle</label>
          <select class="custom-select" name="used" id="used">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="manufacture">Manufacturing Year</label>
          <input class="form-control" name="manufacture" id="manufacture" type="number">
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="colour">Colour</label>
          <input class="form-control" name="colour" id="colour" type="text">
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="condition">Vehicle Condition</label>
          <select class="custom-select" name="condition" id="condition">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="location">Location</label>
          <select class="custom-select" name="location" id="location">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="location-cat">Location Catagory</label>
          <select class="custom-select" name="location-cat" id="license">
              <option selected> </option>
          </select> 
      </div>                     
  </div>

  <div class="form-row">
      <div class="col-md-4 mb-3">
          <label for="license">The Used of Vehicle</label>
          <select class="custom-select" name="license" id="license">
              <option selected> </option>
          </select> 
      </div>                     
  </div>




  </form>
</div>
  <div id="Risk" class="container tab-pane fade"><br>
    <p>isi nya lebih ke checkbox menampilkan beberapa pilihan risk coverage</p>
  </div>
</div>
                 
                

        </main>


<!-- ini tempat profile-->

<div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Phone</th>
                                <th scope="col">RefID</th>
                                <th scope="col">RefName</th>
                                <th scope="col">ID_No</th>
                                <th scope="col">ID_Name</th>
                                <th scope="col">Address_1</th>
                                <th scope="col">Gender</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">BirthDate</th>
                                <th scope="col">BirthPlace</th>
                                <th scope="col">OwnerID</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data['Data'] as $datas)
                            <tr>
                                <td>{{$datas['ID']}}</td>
                                <td>{{$datas['Name']}}</td>
                                <td>{{$datas['Email']}}</td>
                                <td>{{$datas['Mobile']}}</td>
                                <td>{{$datas['Phone']}}</td>
                                <td>{{$datas['RefID']}}</td>
                                <td>{{$datas['RefName']}}</td>
                                <td>{{$datas['ID_No']}}</td>
                                <td>{{$datas['ID_Name']}}</td>
                                <td>{{$datas['Address_1']}}</td>
                                <td>{{$datas['Gender']}}</td>
                                <td>{{$datas['City']}}</td>
                                <td>{{$datas['Country']}}</td>
                                <td>{{$datas['BirthDate']}}</td>
                                <td>{{$datas['BirthPlace']}}</td>
                                <td>{{$datas['OwnerID']}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>