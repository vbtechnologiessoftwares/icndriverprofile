
          <div class="modal-header">
            <h5 class="modal-title" id="commonModalLabel">Edit Driver</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="driver-edit-form" action="{{route('dashboard.updatedriver')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 flash"></div>
            </div>
            @if($already_in_queue_to_approve==0)
            <div class="row" style="margin-bottom: 10px">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">First Name</label>
                  <input  class="form-control" type="text" name="firstname" value="{{$driver_query->firstname}}"/>
                  <span class="invalid-feedback" id="firstname"></span>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Last Name</label>
                  <input  class="form-control" type="text" name="lastname" value="{{$driver_query->lastname}}"/>
                  <span class="invalid-feedback" id="lastname"></span>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Contact</label>
                  <input  class="form-control" type="text" name="phone" value="{{$driver_query->phone}}"/>
                  <span class="invalid-feedback" id="phone"></span>
                </div>
              </div>	
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input  class="form-control" type="text" name="email" value="{{$driver_query->email}}"/>
                  <span class="invalid-feedback" id="email"></span>
                </div>
              </div>	
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Business URL</label>
                  <input  class="form-control" type="text" name="businessurl" value="{{$driver_query->businessurl}}"/>
                  <span class="invalid-feedback" id="businessurl"></span>
                </div>
              </div>	
               <h4 style="margin-top:10px">Address</h4>
               <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Address Line 1</label>
                  <input  class="form-control" type="text" name="addressline1" value="{{$driver_query->addressline1}}"/>
                  <span class="invalid-feedback" id="addressline1"></span>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Address Line 2</label>
                  <input  class="form-control" type="text" name="addressline2" value="{{$driver_query->addressline2}}"/>
                  <span class="invalid-feedback" id="addressline2"></span>
                </div>
              </div>
               <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Town</label>
                  <input  class="form-control" type="text" name="town" value="{{$driver_query->town}}"/>
                  <span class="invalid-feedback" id="town"></span>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">County</label>
                  <input  class="form-control" type="text" name="county" value="{{$driver_query->county}}"/>
                  <span class="invalid-feedback" id="county"></span>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label class="form-label">Post Code</label>
                  <input  class="form-control" type="text" name="postcode" value="{{$driver_query->postcode}}"/>
                  <span class="invalid-feedback" id="postcode"></span>
                </div>
              </div>
            </div>
			     </div>
           <div class="row">
             <div class="col-12">
                <div class="form-group">
                  <label class="form-label">About</label>
                  <textarea class="form-control" name="description" rows="5">{{$driver_query->description}}</textarea>
                  <span class="invalid-feedback" id="description"></span>
                </div>
              </div>
           </div>
           <h4 style="margin-top:10px">Vehicle details</h4>
           <div class="row">
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="4seatervehicle" value="1" id="check_four_seater_vehicle" {{($driver_query->{"4seatervehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_four_seater_vehicle">
                    Up to 4 passengers
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="6seatervehicle" value="1" id="6seatervehicle" {{($driver_query->{"6seatervehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="6seatervehicle">
                    Up to 6 Passengers
                  </label>
                </div>
             </div>


             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="8seatervehicle" value="1" id="check_eight_seater_vehicle" {{($driver_query->{"8seatervehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_eight_seater_vehicle">
                    Up to 8 passengers
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="longdistance" value="1" id="longdistance" {{($driver_query->{"longdistance"}==1)?'checked':''}}>
                  <label class="form-check-label" for="longdistance">
                    Long Distance
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="estatevehicle" value="1" id="check_estate_vehicle" {{($driver_query->{"estatevehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_estate_vehicle">
                    Estate vehicle
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="courier" value="1" id="check_courier_vehicle" {{($driver_query->{"courier"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_courier_vehicle">
                    Courier vehicle
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="easyaccessvehicle" value="1" id="check_easy_access_vehicle" {{($driver_query->{"easyaccessvehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_easy_access_vehicle">
                    Easy Access vehicle
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="airportruns" value="1" id="check_airport_runs" {{($driver_query->{"airportruns"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_airport_runs">
                    Airport Runs
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="wheelchairfriendly" value="1" id="check_wheelchair_friendly" {{($driver_query->{"wheelchairfriendly"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_wheelchair_friendly">
                    Wheel Chair Friendly
                  </label>
                </div>
             </div>
           </div>
           @else
           <div class="alert alert-warning">
             <p>To ensure data correctness and improve user experience, our internal team will be reviewing your change application. Once change is approved, your profile will be automatically updated. You can track the <a href="{{route('edit_history',array('tab'=>'driver'))}}">pending application</a> to get current status</p>
           </div>
           @endif
           
           
           
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Close</button>
            @if($already_in_queue_to_approve==0)
            <button type="submit" class="btn btn-primary">Save changes</button>
            @endif
          </div>
          </form>
        
