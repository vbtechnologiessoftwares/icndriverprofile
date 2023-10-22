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
                        <div class="d-flex flex-md-row flex-column justify-content-around">
                          {{-- <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                          <strong>Login With Google</strong> --}}
                          <a href="{{ url('auth/google') }}"
                            class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                          <i class="bx bxl-google font-medium-3"></i><span
                            class="pl-50 d-block text-center">Google</span></a>
                          <a href="{{ route('register') }}" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                          <i class='bx bx-user font-medium-3'></i><span
                            class="pl-50 d-block text-center">Signup</span></a>
                        </div>
                        <div class="divider">
                          <div class="divider-text text-uppercase text-muted"><small>or login with
                            username</small>
                          </div>
                        </div>

						@if ($errors->has('invalid'))
							<span class="text-danger">
								<strong>{{ $errors->first('invalid') }}</strong>
							</span>
						@endif
                        
                        <form method="POST" action="{{ route('login.post') }}">
                          @csrf
                          <div class="form-group mb-50">
                            <label class="text-bold-600" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="User Name" value="{{ old('username') }}" autocomplete="username" autofocus>
                           @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
						  
						  </div>
                          <div class="form-group">
                            <label class="text-bold-600" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="current-password">
                             @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                             @endif
						  </div>
                          <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                            <div class="text-left">
                              <div class="checkbox checkbox-sm">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
                                in</small></label>
                              </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="text-right">
                              <a href="{{ route('password.request') }}"
                                class="card-link">
                              <small>Forgot Password?</small>
                              </a>
                            </div>
                            @endif
                          </div>
                          <button type="submit" class="btn btn-primary glow w-100 position-relative">Login
                          <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                          </button>
                        </form>
                        <hr>
                        <div class="text-center"><small class="mr-25">Don't have an account?</small><a
                          href="{{ route('register') }}"><small>Sign up</small></a></div>
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