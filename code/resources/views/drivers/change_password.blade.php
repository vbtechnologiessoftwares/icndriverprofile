@extends('layouts.driver')

@push('head_tags')
    <link rel="stylesheet" href="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.css') }}">
    <link rel='stylesheet' href="{{ asset('/assetss/css/pages/profile.css') }}" data-name="driver" />
    <style type="text/css">
        .card-body.call-history {
            unicode-bidi: bidi-override;
            direction: ltr;
            overflow: scroll;
            overflow-x: hidden !important;
            max-height: 408px;
        }

        .card-body.driver-locations {
            unicode-bidi: bidi-override;
            direction: ltr;
            overflow: scroll;
            overflow-x: hidden !important;
            max-height: 408px;
        }
        .layout-wrapper, .layout-container{
            display:block;
        }
    </style>
@endpush

@section('title', 'View Edit History')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 breadcrumb-wrapper mb-4">
        </h4>


        <!-- Header -->
        
        <!--/ Header -->

       

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-12 col-lg-5 col-md-5 mb-3">
                <!-- Driver Messages -->
                <div class="card card-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class='bx bx-list-ul bx-sm me-2'></i>
                                Change Password

                                <a href="{{route('dashboard')}}" class="btn btn-primary" style="float: right;">Back to Dashboard</a>
                        </h5>
                       
                    </div>
                    <div class="card-body">
                      @if(session()->has('message'))
                        <div class="alert alert-success">
                          {{ session()->get('message') }}
                        </div>
                      @endif
                      @if(session()->has('error_message'))
                        <div class="alert alert-danger">
                          {{ session()->get('error_message') }}
                        </div>
                      @endif
                      <form action="{{route('change_password.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">                        
                            <div class="col-6">
                              <div class="form-group">
                                <label class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="old_password" value="{{old('old_password')}}" />
                                @if ($errors->has('old_password'))
                                  <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" value="{{old('new_password')}}"/>
                                @if ($errors->has('new_password'))
                                  <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif                                
                              </div>
                              <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" />
                                @if ($errors->has('new_password_confirmation'))
                                  <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                                @endif
                              </div>
                              <div class="form-group" style="margin-top:10px">
                                <button class="btn btn-primary">Update Password</button>
                              </div>
                            </div>           
                        </div><!--row-->
                      </form>
                        

                        
                        
                    </div>
                </div>
               
               
            </div>
        </div>
        <!--/ User Profile Content -->


    </div>
    <!-- / Content -->
@endsection


@push('body_scripts')
    <script src="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        
        $(document).ready(function(){
          
        });//ready

        
        

        
    </script>
@endpush
