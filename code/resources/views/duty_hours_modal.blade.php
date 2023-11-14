
          <div class="modal-header">
            <h5 class="modal-title" id="commonModalLabel">On Duty Hours</h5>
            <button type="button" class="btn-close off-duty-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="off-duty-form" action="{{route('duty.hours.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 flash"></div>
            </div>
            
            
            <div class="row" style="margin-bottom: 10px">
              <p>How Long would you like to be On duty?
We will automatically mark you off duty after that.</p>
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Hours</label>
                  <select class="form-control"  id="hoursDropdown" onchange="validateDropdown()" name="hours">
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
                  <select class="form-control" id="minutesDropdown" name="minutes">
                    <option value="0">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                  </select>
                  <span class="invalid-feedback" id="minutes"></span>
                  
                </div>

              </div><!--col-6-->
             
                   				
			     </div><br>
            <p style="text-align: center;">Min: 1 hour / Max: 8 hours</p>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal off-duty-close-btn" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        
<script>
    function validateDropdown() {
        var hoursDropdown = document.getElementById("hoursDropdown");
        var minutesDropdown = document.getElementById("minutesDropdown");

        // Get the selected value from the "hours" dropdown
        var selectedHours = hoursDropdown.value;

        // Disable the "minutes" dropdown if the selected value is 8, otherwise enable it
        minutesDropdown.disabled = (selectedHours === "8");
    }
</script>