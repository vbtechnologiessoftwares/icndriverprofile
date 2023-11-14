<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login Page - Aycent</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/semi-dark-layout.min.css') }}">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    {{-- 
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    --}}
    <!-- END: Custom CSS-->
    <!-- favicon -->
   
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <!-- login page start -->
          <section id="auth-login" class="row flexbox-container">
            <div class="col-xl-8 col-11">
              <div class="card bg-authentication mb-0">
                <div class="row m-0">
                  <!-- left section-login -->
                  <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                      
                      <div class="card-body">
                        @if (session('error'))
                          <div class="alert alert-danger">
                            {{ session('error') }}
                          </div>
                        @endif
                      
                        <div class="divider">
                          <a href="/"><img src="images/logo.png" alt="Logo"></a>
                          <div class="divider-text text-uppercase text-muted"><small>or login with
                            username</small>
                          </div>
                        </div>

                        @if (session('status'))
                          <div class="alert alert-success">
                            {{ session('status') }}
                          </div>
                        @endif
                        
                        <form method="POST" action="{{ route('login.post') }}">
                          @csrf
                          <div class="form-group mb-50">
                            <label class="text-bold-600" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}" autocomplete="username" autofocus>
                          </div>
                          <div class="form-group">
                            <label class="text-bold-600" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="current-password">
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
                    <img class="img-fluid" src="{{ asset('assets/images/pages/login.png') }}" alt="branding logo">
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- login page ends -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/scripts/configs/vertical-menu-light.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/components.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/footer.min.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>