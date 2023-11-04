
          <div class="modal-header">
            <h5 class="modal-title" id="commonModalLabel">Off Duty Hours</h5>
            <button type="button" class="btn-close off-duty-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="off-duty-form" action="{{route('duty.hours.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 flash"></div>
            </div>
            
            
            <div class="row" style="margin-bottom: 10px">
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Hours</label>
                  <select class="form-control" name="hours">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                  <span class="invalid-feedback" id="hours"></span>
                </div>
              </div><!--col-6-->
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Minutes</label>
                  <select class="form-control" name="minutes">
                    <option value="0">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                  </select>
                  <span class="invalid-feedback" id="minutes"></span>
                </div>
              </div><!--col-6-->
              
                   				
			     </div>
           
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal off-duty-close-btn" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        
