<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('/assetss/vendor/libs/select2/select2.css') }} " />
    <link rel="stylesheet" href="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.css') }}">
    <title>cdsintdev</title>

    <!-- Favicon -->
  <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset('images/apple-touch-icon.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('images/favicon-32x32.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('images/favicon-16x16.png')}}"
    />
    <link rel="manifest" href="images/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script
      type="text/javascript"
      src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"
    ></script>
    <script
      type="text/javascript"
      src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
    href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
    rel="stylesheet">

    <!-- External Css file -->
       <link rel="stylesheet" href="{{ asset('style.css')}}" />

    <style>
      .progress-bar {
        width: 100%;
        height: 20px;
        background-color: #b3b3df;
        border-radius: 15px;
        position: relative;
        margin-bottom: 20px;
      }

      .progress-bar__steps {
        display: flex;
        justify-content: space-between;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
        height: 100%;
        padding: 0 10px;
      }

      .progress-bar__step {
        width: 20px;
        height: 20px;
        background-color: #384fe9;
        border-radius: 50%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        color: #fff;
      }

      .progress-bar__step.active {
        background-color: rgb(8, 17, 44);
      }

      .progress-bar__step i {
        font-size: 12px;
      }

      .progress-bar__progress {
        height: 100%;
        background-color: rgb(99, 117, 198);
        border-radius: 15px;
        width: 0;
        transition: width 0.8s ease;
      }

      a.btn.btn-primary.next {
        color: #fff;
        background-color: #102870;
        border-color: #0a1a4d;
      }

      a.btn.btn-primary.previous {
        color: #fff;
        background-color: #102870;
        border-color: #0a1a4d;
      }

      select.form-control {
        background-image: linear-gradient(45deg, transparent 50%, gray 50%),
          linear-gradient(135deg, gray 50%, transparent 50%),
          radial-gradient(#ddd 70%, transparent 72%);
        background-position: calc(100% - 20px) calc(1em + 2px),
          calc(100% - 15px) calc(1em + 2px), calc(100% - 0.5em) 0.5em;
        background-size: 5px 5px, 5px 5px, 1.5em 1.5em;
        background-repeat: no-repeat;
      }

      label.col-lg-12.control-label {
        text-align: left;
        margin-bottom: 14px;
        margin-top: 14px;
      }

      form#myform {
        background: #fafafaeb;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative;
      }

      label.col-lg-4.control-label {
        float: left;
      }

      #personal_information,
      #coverage_information,
      #driver_information {
        display: none;
      }

      .navbar-expand-sm .navbar-collapse {
        display: contents !important;
        flex-basis: auto;
      }

      * {
        margin: 0;
        padding: 0;
      }

      html {
        height: 100%;
      }

      #heading {
        text-transform: uppercase;
        color: #673ab7;
        font-weight: normal;
      }

      #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
      }

      #msform fieldset {
        background: #fafafaeb;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        /*stacking fieldsets above each other*/
        position: relative;
      }

      .form-card {
        text-align: left;
      }

      /*Hide all except first fieldset*/
      #msform fieldset:not(:first-of-type) {
        display: none;
      }

      .cc {
        font-size: 60px;
        color: #0e2052;
        font-weight: 700;
        text-align: center;
      }

      .fs-title {
        font-size: 23px;
        color: #000000ad !important;
        margin-bottom: 15px;
        font-weight: 500;
      }

      .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right;
      }

      #auto_coverage_background {
        background-image: url("{{ asset('image/bg-auto.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        padding-top: 1rem;
        max-width: 100%;
        background-size: 100% 100%;
      }
      .help-block {
          color: red;
      }
    </style>
  </head>

  <body>
    <!-- Section one Navbar -->
 
   

    <!-- Section three -->
    <div class="container-fluid" id="auto_coverage_background">
      <div class="row justify-content-center pt-3">
        <div class="col-md-12">
          <h1 class="cc">Driver Details</h1>
        </div>
        <div class="col-md-10">
          <div id="progressBar" class="progress-bar">
            <div class="progress-bar__steps"></div>
            <div class="progress-bar__progress" style="width: 0%"></div>
          </div>

          <form
            class="form-horizontal"
            method="POST"
            id="myform"
            action="{{ route('driver_signup.store') }}" enctype="multipart/form-data"
          >
           @csrf 
            <fieldset id="account_information" class="">
              <div class="row d-flex justify-content-evenly py-4 px-3">
                <div class="col-md-8">
                  <h2 class="fs-title">
                    Personal Info:
                  </h2>
                </div>
                <div class="col-md-4">
                  <h2 class="steps">Step 1 - 4</h2>
                </div>
              </div>

              <div class="col-md-12 px-3">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label
                      for="relationship_to_applicant"
                      class="col-lg-12 control-label"
                      >User Name</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="username"
                      name="username"
                      required
                      placeholder="username"
                    />

                  </div>
                  <div class="col-md-6">
                    <label for="password" class="col-lg-12 control-label"
                      >Contact</label
                    >
                    <input
                      type="number"
                      class="form-control"
                      id="number"
                      name="phone_number"
                      required
                      placeholder="Contact number"
                    />
                  
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="password" class="col-lg-12 control-label"
                      >Email</label
                    >
                    
                      <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      required
                      placeholder="email"
                    />

                  </div>

                  <div class="col-md-6">
                    <label for="conf_password" class="col-lg-12 control-label"
                      >Business URL</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="business_url"
                      name="business_url"
                      required
                      placeholder="Business URL"
                    />
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="conf_password" class="col-lg-12 control-label"
                      >Password</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      name="password"
                      required
                      placeholder="Password"
                    />
                  </div>
                </div>
                <br />

                <div class="row g-3" style="margin-top: 30px">
                  <br /><br />
                  <p class="col-md-12 text-center">
                    <a class="btn btn-primary next">
                      Continue
                      <i class="fa fa-arrow-right" aria-hidden="true"></i
                    ></a>
                  </p>
                </div>
              </div>
            </fieldset>

            <fieldset id="driver_information" class="">
              <div class="row d-flex justify-content-evenly py-4 px-3">
                <div class="col-md-8">
                  <h2 class="fs-title">Vehicle Details:</h2>
                </div>
                <div class="col-md-4">
                  <h2 class="steps">Step 2 - 4</h2>
                </div>
              </div>

              <div class="col-md-12 px-3">
                <div id="field">
                  <div id="field0">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label
                          for="relationship_to_applicant"
                          class="col-lg-12 control-label"
                          >4 Seater Vehicle</label
                        >

                        <select
                          class="form-control"
                          name="4_seater_vehicle"
                          required
                        >
                          <option disabled selected value>
                            -- 4 Seater Vehicle --
                          </option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label
                          for="marital_status"
                          class="col-lg-12 control-label"
                          >8 Seater Vehicle</label
                        >
                        <select
                          class="form-control"
                          name="8_seater_vehicle"
                          required
                        >
                          <option disabled selected value>
                            -- 8 Seater Vehicle --
                          </option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                          
                        </select>
                      </div>
                    </div>

                    <div class="row g-3">
                      <div class="col-md-6">
                        <label
                          for="marital_status"
                          class="col-lg-12 control-label"
                          >Estate Vehicle</label
                        >
                        <select
                          class="form-control"
                          name="estate_vehicle"
                          required
                        >
                          <option disabled selected value>
                            -- Select Estate Vehicle --
                          </option>
                         <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label
                          for="marital_status"
                          class="col-lg-12 control-label"
                          >Courier Vehicle</label
                        >
                        <select
                          class="form-control"
                          name="courier_vehicle"
                          required
                        >
                          <option disabled selected value>
                            -- Courier Vehicle --
                          </option>
                         <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                 

                    <div class="row g-3">
                      <div class="col-md-6">
                        <label
                          for="marital_status"
                          class="col-lg-12 control-label"
                          >Easy Access Vehicle</label
                        >
                        <select
                          class="form-control"
                          name="easy_access_vehicle"
                          required
                        >
                          <option disabled selected value>
                            -- Easy Access Vehicle --
                          </option>
                         <option value="1">yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label
                          for="marital_status"
                          class="col-lg-12 control-label"
                          >AirPort Runs</label
                        >
                        <select
                          class="form-control"
                          name="airport_runs"
                          required
                        >
                          <option disabled selected value>
                            -- AirPort Runs --
                          </option>
                         <option value="1">yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
             
                 

                    <div class="row g-3">
                      
                      
                    </div>
                  </div>
                </div>

                <br /><br />
              </div>
              <div class="row g-3" style="margin-top: 30px">
                <div class="col-md-12 text-center">
                  <p>
                    <a class="btn btn-primary previous">
                      <i class="fa fa-arrow-left" aria-hidden="true"></i>
                      Previous</a
                    >
                  </p>
                </div>
                <div class="col-md-12 text-center">
                  <p>
                    <a class="btn btn-primary next">
                      Continue
                      <i class="fa fa-arrow-right" aria-hidden="true"></i
                    ></a>
                  </p>
                </div>
              </div>
            </fieldset>

            <!-- {{-- +++++++++++++++++++++++++++++++++++++++++start++++++++++++++++++++++++++ --}} -->

            <fieldset id="coverage_information" class="">
              <div class="d-flex justify-content-evenly py-4 px-3">
                <div class="col-md-8">
                  <h2 class="fs-title">Driver Photo / Driver Licence:</h2>
                </div>
                <div class="col-md-4">
                  <h2 class="steps">Step 3 - 4</h2>
                </div>
              </div>

              <div class="col-md-12 px-3">
                <div id="field">
                  <div id="field0">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label
                          for="relationship_to_applicant"
                          class="col-lg-12 control-label"
                          >Driver Photo</label
                        >
                        
                      <input
                      type="file"
                      class="form-control"
                      id="driver_photo"
                      name="driver_photo"
                      required
                      placeholder="driver photo"
                    />
                      </div>
                      <div class="col-md-6">
                        <label
                          for="relationship_to_applicant"
                          class="col-lg-12 control-label"
                          >Driver Licence</label
                        >
                        
                      <input
                      type="file"
                      class="form-control"
                      id="driver_licence"
                      name="driver_licence_photo"
                      required
                      placeholder="driver Licence"
                    />
                      </div>
                    </div>

                   </div>
                </div>

                <br /><br />
              </div>
              <div class="row g-3" style="margin-top: 30px">
                <div class="col-md-12 text-center">
                  <p>
                    <a class="btn btn-primary previous">
                      <i class="fa fa-arrow-left"></i> Previous</a
                    >
                  </p>
                </div>
                <div class="col-md-12 text-center">
                  <p>
                    <a class="btn btn-primary next">
                      Continue <i class="fa fa-arrow-right"></i
                    ></a>
                  </p>
                </div>
              </div>
            </fieldset>

            <!-- {{-- +++++++++++++++++++++++++++++++++++++++++End ++++++++++++++++++++++++++++ --}} -->

            <fieldset id="personal_information" class="">
              <div class="d-flex justify-content-evenly py-4 px-3">
                <div class="col-md-8">
                  <h2 class="fs-title">
                    Location.
                  </h2>
                </div>
                <div class="col-md-4">
                  <h2 class="steps">Step 4 - 4</h2>
                </div>
              </div>

              <div class="col-md-12 px-3">
                <div id="fielda">
                  <div id="fielda0">
                    <!-- Text input-->
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="first_name" class="col-lg-12 control-label"
                          >Locations</label
                        >
                        <select id="selectNewLocation" class="select2 form-select form-select-lg" data-allow-clear="true" name="locations[]" multiple>
                          @foreach($locations as $key =>$value)
                          <option value="{{$value->locationid}}">{{$value->town}},{{$value->country}}</option>
                          @endforeach
                        </select>
                      </div>
                     {{--  <div class="col-md-6">
                        <label for="last_name" class="col-lg-12 control-label"
                          >Last Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="last_name"
                          required
                          name="last_name"
                          placeholder="Last Name"
                        />
                      </div> --}}
                    </div>
                    

                  


                    <hr />
                  </div>
                </div>
                <br /><br />
              </div>
              <div class="row g-3" style="margin-top: 30px">
                <div class="col-md-12 text-center">
                  <p>
                    <a class="btn btn-primary previous">
                      <i class="fa fa-arrow-left" aria-hidden="true"></i>
                      Previous</a
                    >
                  </p>
                </div>
                <div class="col-md-12 text-center">
                  <p>
                    <input
                      class="btn btn-success"
                      type="submit"
                      value="Submit"
                    />
                  </p>
                </div>
              </div>
            </fieldset>
            <!-- <div class="col-lg-8"> -->
          </form>
        </div>
      </div>

      <!-- Section Two -->
      
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('/assetss/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script type="text/javascript">
      
      $(document).ready(function () {
        $('.select2').select2();
        $.validator.addMethod(
          "usernameRegex",
          function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
          },
          "Username must contain only letters, numbers"
        );

        $(".next").click(function () {
          var form = $("#myform");
          form.validate({
            errorElement: "span",
            errorClass: "help-block",
            highlight: function (element, errorClass, validClass) {
              $(element).closest(".form-group").addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).closest(".form-group").removeClass("has-error");
            },
            rules: {
              username: {
                required: true,
                usernameRegex: true,
               
              },
              password: {
                required: true,
              },
              conf_password: {
                required: true,
                equalTo: "#password",
              },
              company: {
                required: true,
              },
              url: {
                required: true,
              },
              name: {
                required: true,
                minlength: 3,
              },
              email: {
                required: true,
                minlength: 3,
              },
            },
            messages: {
              username: {
                required: "Username required",
              },
              /* password: {
                           required: "Password required"
                         },
                         conf_password: {
                           required: "Password required",
                           equalTo: "Password don't match"
                         },*/
              name: {
                required: "Name required",
              },
              email: {
                required: "Email required",
              },
            },
          });
          if (form.valid() === true) {
            if ($("#account_information").is(":visible")) {
              current_fs = $("#account_information");
              next_fs = $("#driver_information");
            } else if ($("#driver_information").is(":visible")) {
              current_fs = $("#driver_information");
              next_fs = $("#coverage_information");
            } else if ($("#coverage_information").is(":visible")) {
              current_fs = $("#coverage_information");
              next_fs = $("#personal_information");
            }

            next_fs.show();
            current_fs.hide();
            if (currentStepIndex < steps.length - 1) {
              currentStepIndex++;
              updateProgressBar(currentStepIndex);
            }
          }
        });

        $(".previous").click(function () {
          console.log("Previous called");
          if ($("#driver_information").is(":visible")) {
            console.log("driver page visible");
            current_fs = $("#driver_information");
            next_fs = $("#account_information");
          } else if ($("#coverage_information").is(":visible")) {
            console.log("coverage page visible");

            current_fs = $("#coverage_information");
            next_fs = $("#driver_information");
          } else if ($("#personal_information").is(":visible")) {
            console.log("personal page visible");

            current_fs = $("#personal_information");
            next_fs = $("#coverage_information");
          }
          console.log(next_fs);
          next_fs.show();
          current_fs.hide();

          if (currentStepIndex > 0) {
            currentStepIndex--;
            updateProgressBar(currentStepIndex);
          }
        });

        var progressBar = document.getElementById("progressBar");
        var stepsContainer = progressBar.querySelector(".progress-bar__steps");
        var progressBarProgress = progressBar.querySelector(
          ".progress-bar__progress"
        );

        var steps = [
          {
            icon: "fas fa-car fa-4x",
          },
          {
            icon: "fas fa-car",
          },
          {
            icon: "fas fa-car",
          },
          {
            icon: "fas fa-car",
          },
        ];

        steps.forEach(function (step, index) {
          var stepElement = document.createElement("div");
          stepElement.className = "progress-bar__step";
          stepElement.innerHTML = `<i class="${step.icon}"></i>`;

          stepsContainer.appendChild(stepElement);
        });

        var currentStepIndex = 0;
        updateProgressBar(currentStepIndex);

        function updateProgressBar(currentStepIndex) {
          var stepElements = stepsContainer.querySelectorAll(
            ".progress-bar__step"
          );

          stepElements.forEach(function (stepElement, index) {
            if (index < currentStepIndex) {
              stepElement.classList.add("active");
              stepElement.innerHTML = `<i class="fas fa-check-circle fa-2x"></i>`;
            } else {
              stepElement.classList.remove("active");
              stepElement.innerHTML = `<i class="fas fa-car fa-2x"></i>`;
            }
          });

          var progressPercentage =
            (currentStepIndex / (steps.length - 1)) * 100;
          progressBarProgress.style.width = progressPercentage + "%";
        }


        $('#myform').submit(function(e) {
                e.preventDefault();
                var $this = $(this);

                $.ajax({
                    url: $this.prop('action'),
                    method: $this.prop('method'),
                    dataType: 'json',
                    data: new FormData(this), //4
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(response) {
                    console.log(response);
                    $(".invalid-feedback").html('');
                    $(".invalid-feedback").css('display', 'none');
                    if (response.status == 1) {
                        //$(".closeModal").trigger('click');
                        Swal.fire({
                            title:response.alert_message,
                            html:'You will be redirected to login page. Please login with your credentials',
                            icon: 'success',
                            confirmButtonText: 'Close',
                        }).then((result) => {
                          
                          if (result.isConfirmed) {
                            window.location.replace("{{route('login')}}");
                            //Swal.fire('Saved!', '', 'success')
                            //$(".closeModal").trigger('click');
                          } else if (result.isDenied) {
                            //$(".closeModal").trigger('click');
                          }
                        })
                    }
                    if (response.status == 2) {
                        //$(".closeModal").trigger('click');
                        Swal.fire({
                            title: response.alert_message,
                            //html: "You want to revoke!",
                            icon: 'warning',
                            showCancelButton: true,
                            //confirmButtonColor: '#3085d6',
                            //cancelButtonColor: '#d33',
                            confirmButtonText: 'Close'
                        }).then((result) => {
                          
                          if (result.isConfirmed) {
                            //changeStatus($this);
                          }else{
                            //return false;
                          }
                        }); 
                    }
                    /*if (response.alert_class && response.alert_message) {
                        var alertdata = '<div class="alert ' + response.alert_class + '">' +
                            response.alert_message + '</div>';
                        //$('.license-flash').html(alertdata);
                    }
                    if (response.status == 2) {

                        $.each(response.errors, function(key, error) {
                            $("#profile-edit-form #" + key + "").css('display',
                                'inline-block');
                            $("#profile-edit-form #" + key + "").html('<strong>' + error[
                                0] + '</strong>');
                        });
                    }*/
                });
            });

      });//ready













    </script>

   

  </body>
</html>
