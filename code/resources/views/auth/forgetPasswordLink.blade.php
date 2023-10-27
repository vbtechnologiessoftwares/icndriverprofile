@extends('layout')
  
@section('content')
         <!-- login page start -->
          <section id="auth-login" class="row flexbox-container">
            <div class="col-xl-8 col-11">
              <div class="card bg-authentication mb-0">
                <div class="row m-0">
                  <!-- left section-login -->
                  <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                      <div class="card-header pb-1 justify-content-around">
                        <div class="card-title">
                          <!--<h4 class="text-center mb-2"><img src="{{ asset('public/assets/images/aycom_logo.png') }}" height="40" width="auto"/></h4>-->
                        </div>
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
						
                        
                        <div class="divider">
                          <div class="divider-text text-uppercase text-muted"><small>Reset Password</small>
                          </div>
                        </div>

						@if ($errors->has('invalid'))
							<span class="text-danger">
								<strong>{{ $errors->first('invalid') }}</strong>
							</span>
						@endif
                        
                        <form method="POST" action="{{ route('reset.password.post') }}" >
                          @csrf
                          <div class="form-group mb-50">
                            <label class="text-bold-600" for="email_address">Email</label>
                            <input type="text" class="form-control" name="email" id="email_address" value="{{old('email')}}" autofocus>
                            @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>

                          <div class="form-group mb-50">
                            <label class="text-bold-600" for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password"  autofocus>
                            @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>

                          <div class="form-group mb-50">
                            <label class="text-bold-600" for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" autofocus>
                            @if ($errors->has('password_confirmation'))
                              <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                          </div>
                         <input type="hidden" name="token" value="{{$token}}">
                          <button type="submit" class="btn btn-primary glow w-100 position-relative">Reset Password
                          <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                          </button>
                        </form>
                        <hr>

                        <div class="text-center">
                          <a href="{{ route('login') }}"><small>Back to Login</small></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- right section image -->
                  <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="{{ asset('/assets/images/pages/login.png') }}" alt="branding logo">
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- login page ends -->
@endsection