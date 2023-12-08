
          <div class="modal-header">
            <h5 class="modal-title" id="commonModalLabel">Edit license details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="license-edit-form" action="{{route('license.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 flash"></div>
            </div>
            @if($already_in_queue_to_approve==0)
            
            <div class="row" style="margin-bottom: 10px">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label">License Number</label>
                  <input type="text" class="form-control" name="licensenumber" value="{{$license_query->licensenumber}}"/>
                  <span class="invalid-feedback" id="licensenumber"></span>
                </div>
                <div class="form-group">
                  <label class="form-label">License Expiry</label>
                    
                  <input type="date" class="form-control"  name="licenseexpiry" value="{{$license_query->licenseexpiry}}"/>
                 
                  <span class="invalid-feedback" id="licenseexpiry"></span>
                </div>
                <div class="form-group">
                  <label class="form-label">Assigning Authority</label>
                    
                  <select class='form-control' name='licenseauthority'  id='licenseauthority' autocomplete="off" required>
                                                      <option value=''>Assigning Authority</option>
                                                      @foreach($licenseauthoritymaster as $licenseaut)
                                                      <option value="{{$licenseaut->rowid}}" {{$license_query->licenseauthority == $licenseaut ->rowid ? 'selected' : ''}}>{{$licenseaut->licenseauthority}}</option>
                                                      @endforeach
                                                  </select>
                 
                  <span class="invalid-feedback" id="licenseexpiry"></span>
                </div>
                <div class="form-group">
                  <label class="form-label">License Photo (Hackney/PHV License)</label>
                  <input id="licenseimage" class="form-control" type="file" name="licensephoto"/>
                  <span class="invalid-feedback" id="licensephoto"></span>
                </div>
              </div>
              
                   				
			     </div>
           <div class="row">
             <div class="col-12">
                <div class="form-group">
                  @isset($license_query->licensephoto)
                    {{-- <img id="licenseimage_show" src="data:image/png;base64,{{ chunk_split(base64_encode($license_query->licensephoto)) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" /> --}}
                    <img id="licenseimage_show" src="data:image/png;base64,{{htmlspecialchars($license_query->licensephoto) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />
                  @endisset
                </div>
              </div>
           </div>
           @else
           <div class="alert alert-warning">
             <p>To ensure data correctness and improve user experience, our internal team will be reviewing your change application. Once change is approved, your profile will be automatically updated. You can track the <a href="{{route('edit_history',array('tab'=>'license'))}}">pending application</a> to get current status</p>
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
        
