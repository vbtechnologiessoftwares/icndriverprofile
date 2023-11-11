
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
            
            <div class="row" style="margin-bottom: 10px">
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Contact</label>
                  <input  class="form-control" type="text" name="phone" value="{{$driver_query->phone}}"/>
                  <span class="invalid-feedback" id="phone"></span>
                </div>
              </div>	
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input  class="form-control" type="text" name="email" value="{{$driver_query->email}}"/>
                  <span class="invalid-feedback" id="email"></span>
                </div>
              </div>	
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Business URL</label>
                  <input  class="form-control" type="text" name="businessurl" value="{{$driver_query->businessurl}}"/>
                  <span class="invalid-feedback" id="businessurl"></span>
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
                    4 Seater vehicle
                  </label>
                </div>
             </div>
             <div class="col-6">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="8seatervehicle" value="1" id="check_eight_seater_vehicle" {{($driver_query->{"8seatervehicle"}==1)?'checked':''}}>
                  <label class="form-check-label" for="check_eight_seater_vehicle">
                    8 Seater vehicle
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
                    East Access vehicle
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
           
           
           
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        
