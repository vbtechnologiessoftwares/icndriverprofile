
          <div class="modal-header">
            <h5 class="modal-title" id="commonModalLabel">Edit Profile Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="profile-edit-form" action="{{route('dashboard.updateprofile')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 flash"></div>
            </div>
            
            <div class="row" style="margin-bottom: 10px">
              <div class="col-12">
                
                
                <div class="form-group">
                  <label class="form-label">Profile Image</label>
                  <input id="profileimage" class="form-control" type="file" name="profilephoto"/>
                  <span class="invalid-feedback" id="profilephoto"></span>
                </div>
              </div>
              
                   				
			     </div>
           <div class="row">
             <div class="col-12">
                <div class="form-group">
                  @isset($driver_query->photo->driversphoto)
                    <img id="profileimage_show" src="data:image/png;base64,{{ chunk_split(base64_encode($driver_query->photo->driversphoto)) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />
                    @else
                    <img id="profileimage_show" alt="" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />
                  @endisset
                </div>
              </div>
           </div>
           
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        
