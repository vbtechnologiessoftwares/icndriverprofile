@extends('layouts.driver')


@push('head_tags')
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

        .tabb.show {
            display: block;
        }

        .tabb {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/assetss/vendor/libs/select2/select2.css') }} " />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@section('title', 'Profile')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 breadcrumb-wrapper mb-4">
        </h4>
        @if ($driver->adminapproved == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        Your account is being reviewed by our admins. Until the account is approved, some operations on the
                        driver dashboard will be restricted
                    </div>
                </div>
            </div>
        @endif
        @if ($driver->password_reset_required == 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        We strongly recommend that you change your password for security reasons.
                        <a href="{{ route('change_password') }}">Click here to change your password.</a>
                    </div>
                </div>
            </div>
        @endif
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    {{-- <div class="user-profile-header-banner ">
                        <img class="w-100" src="{{ asset('/assetss/img/pages/profile-banner.png') }}" alt="Banner image"
                            class="rounded-top">
                    </div> --}}
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            @isset($driver->photo->driversphoto)
                                <img src="data:image/png;base64,{{ htmlspecialchars($driver->photo->driversphoto) }}"
                                    alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />
                            @endisset
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ $driver->full_name }}
                                        <a href="javascript:void(0)" class="edit-profile-image-btn"><i class="fa fa-pencil"
                                                title="Edit profile picture"></i></a>
                                        {{-- <a href="{{route('edit_history')}}"><i class="fa fa-clock" title="Edit History"></i></a> --}}
                                    </h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        {{--  <li class="list-inline-item fw-semibold">
                                            <i class='bx bx-pen'></i> Driver
                                        </li> --}}

                                        <li class="list-inline-item fw-semibold w-100">
                                            <i class='bx bx-calendar-alt'></i> Joined on
                                            {{ isset($driver->signupdate) ? $driver->signupdate->toFormattedDateString() : '' }}
                                        </li>

                                        <li class="list-inline-item fw-semibold w-100">
                                            You are <span
                                                id="duty-status-text"><b>{{ $driver->dutystatus ? 'on' : 'off' }}</b></span>
                                            duty
                                            @if ($driver->adminapproved == 1)
                                                <label class="switch switch-lg switch-success">
                                                    <input type="checkbox" class="switch-input change-duty-status-input"
                                                        @checked($driver->dutystatus) onclick="changeDutyStatus()" />
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on">
                                                            <i class="bx bx-check"></i>
                                                            On Duty
                                                        </span>
                                                        <span class="switch-off">
                                                            <i class="bx bx-x"></i> Off duty
                                                        </span>
                                                    </span>
                                                </label>
                                            @else
                                                <label class="switch switch-lg switch-success">
                                                    <input type="checkbox"
                                                        class="switch-input change-duty-disabled-input" />
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on">
                                                            <i class="bx bx-check"></i>
                                                            On Duty
                                                        </span>
                                                        <span class="switch-off">
                                                            <i class="bx bx-x"></i> Off duty
                                                        </span>
                                                    </span>
                                                </label>
                                            @endif


                                        </li>
                                        <li class="list-inline-item fw-semibold w-100 off-duty-time-div">
                                            @if ($driver->offtime_timestamp != null && $driver->dutystatus == 1)
                                                Auto off duty at
                                                {{ date('d M h:i A', strtotime($driver->offtime_timestamp)) }}
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    {{-- <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user'></i>
                            Profile</a></li> --}}
                    {{--   <li class="nav-item"><a class="nav-link" href="pages-profile-teams.html"><i class='bx bx-group'></i> Teams</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i class='bx bx-grid-alt'></i> Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='bx bx-link-alt'></i> Connections</a></li> --}}
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 mb-3">
                <!-- Driver Messages -->
                <div class="card card-action mb-4">


                    <h2 class="accordion-header">
                        <button type="button"
                            class="accordion-button {{ $driver->messages->count() == 0 ? 'collapsed' : '' }}"
                            data-bs-toggle="collapse" data-bs-target="#driver-messages" aria-expanded="false">
                            Driver Messages
                        </button>
                    </h2>


                    {{-- Card Actions --}}
                    {{-- <div class="card-action-element btn-pinned">
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="bx bx-dots-vertical-rounded"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                </ul>
                            </div>
                        </div> --}}

                    <div id="driver-messages"
                        class="accordion-collapse collapse {{ $driver->messages->count() == 0 ? '' : 'show' }}"
                        data-bs-parent="#driver-messages-parent">

                        <div class="card-body driver-messages">

                            <div class="table-actions-jsn mb-2" style="text-align:right">
                                {{-- <div class="form-check mt-3">
                                <input class="form-check-input bg-primary-checkbox" type="checkbox" value=""
                                    id="defaultCheck1" onchange="toggleUnreadMessages()" />
                                <label class="form-check-label" for="defaultCheck1">
                                    Show only unread messages
                                    <a href="#">Show all Messages</a>
                                </label>
                            </div> --}}
                                <a href="{{ route('messages') }}" class="btn btn-primary">Show Message Archive</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Datetime</th>

                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody class="driver-messages-tbody">

                                        @foreach ($driver->messages as $driverMessage)
                                            <tr
                                                class="{{ $driverMessage->messagestatus ? 'seen-message' : 'table-danger unseen-message' }}">
                                                <td class="col-3 p-1">
                                                    <div class="row">
                                                        <div>{{ $driverMessage->messagedatetime->toFormattedDateString() }}
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="col-9">{{ $driverMessage->message->messagetext }}@if ($driverMessage->messagestatus == 0)
                                                        <div>

                                                            <button type="button" class="btn btn-primary"
                                                                onclick="markMessageAsSeen(this, {{ $driverMessage->drivermessageid }})">
                                                                <span class="">Mark as read</span>

                                                            </button>
                                                        </div>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                        @if ($driver->messages->count() == 0)
                                            <tr>
                                                <td colspan="2" style="text-align: center"> No unread messages ! </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>

                            </div>
                            {{-- <ul class=" ms-2">
                            @foreach ($driver->messages as $message)
                            <li class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        {{ $message->message->messagetext }}
                                    </div>
                                    <div class="col-2">
                                        {{ $message->messagedatetime->toDayDateTimeString() }}
                                    </div>
                                </div>
                            </li>
                            <hr>
                            @endforeach
                        </ul> --}}
                        </div>
                    </div>

                </div>
                <!--/ Driver Message End -->
                <!-- Driver Locations -->
                <div class="col-lg-12 ">
                    <div class="card card-action mb-4">
                        <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#driver-info" aria-expanded="flase">
                                Driver Locations
                            </button>
                        </h2>


                        <div id="driver-info" class="accordion-collapse collapse" data-bs-parent="#user-details-parent">

                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">
                                    {{ count($driver->locations) > 0 ? '' : 'No Locations Yet' }}</h5>
                                <div class="card-action-element btn-pinned">

                                    {{-- <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bx bx-dots-vertical-rounded"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                    </ul>
                                </div> --}}
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addLocationModal">
                                    Add Location
                                </button>
                            </div>
                            <div class="card-body driver-locations">
                                <div class="form-check form-check-inline my-3 w-50">
                                    @if (count($driver->locations) > 0)
                                        <div class="row">
                                            <div class="col-6">

                                                <input class="form-check-input" type="checkbox"
                                                    id="toggle-all-driver-locations" value="option1" />
                                                <label class="form-check-label" for="toggle-all-driver-locations">Select
                                                    All</label>
                                            </div>
                                            <div class="col-6" id="delete-locations-container" style="display: none">
                                                <button type="button" class="btn btn-danger mb-3"
                                                    onclick="confirmDeleteLocations()">Delete</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <ul class="list-unstyled mb-0" id="locationsList">

                                    <form action="/jsn">
                                        @foreach ($driver->locations as $location)
                                            <li class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="d-flex align-items-start">
                                                        <div class="me-2"><input name="selectedLocations[]"
                                                                class="form-check-input" type="checkbox"
                                                                value="{{ $location->locationid }}"
                                                                onchange="onLocationCheckboxChange()"></div>
                                                        <div class="me-2">
                                                            <h6 class="mb-0">{{ $location->town }},
                                                                {{ $location->county }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <a target="_blank"
                                                            href="http://www.google.com/maps/place/{{ $location->latitude }},{{ $location->longitude }}"
                                                            class="btn btn-label-primary p-1 btn-sm"><i
                                                                class="bx bx-map"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </form>

                                    {{-- <li class="text-center">
                                    <a href="javascript:;">View all teams</a>
                                </li> --}}

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Driver Locations -->


                </div>
            </div>


            <div class="col-xl-8 col-lg-7 col-md-7">


                <div class="card card-action mb-4">
                    {{-- <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class='bx bx-list-ul bx-sm me-2'></i>{{ $driver->calls->count() ? 'Call History' : 'No Calls Yet' }}
                        </h5>
                        
                    </div> --}}
                    <!-- Accordion -->

                    <div class="accordion accordion-header" id="user-details-parent">
                        <div class="accordion-item card">
                            <h2 class="accordion-header">

                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#personal-info" aria-expanded="false">
                                    Driver Info
                                </button>
                            </h2>

                            <div id="personal-info" class="accordion-collapse collapse collapse"
                                data-bs-parent="#user-details-parent">
                                <div class="accordion-body">
                                    <!-- About User -->
                                    <div class="card mb-4 shadow-none">
                                        <div class="card-body p-0">
                                            <ul class="list-unstyled mb-4 mt-3">


                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-phone"></i><span
                                                        class="fw-semibold mx-2">Contact:</span>
                                                    <span>{{ $driver->phone }}</span>
                                                </li>

                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-envelope"></i><span
                                                        class="fw-semibold mx-2">Email:</span>
                                                    <span>{{ $driver->email }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-detail"></i><span
                                                        class="fw-semibold mx-2">URL:</span>
                                                    <span>{{ $driver->businessurl }}</span>
                                                </li>


                                            </ul>
                                            <hr
                                                style="
                                                margin-right: auto;
                                                width: 80%;
                                                margin-left: auto;
                                            ">
                                            <h5>Address</h5>
                                            <ul class="list-unstyled mb-4 mt-3">
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-home'></i></i><span class="fw-semibold mx-2">Address
                                                        Line 1:</span>
                                                    <span>{{ $driver->addressline1 }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-home'></i></i><span class="fw-semibold mx-2">Address
                                                        Line 2:</span>
                                                    <span>{{ $driver->addressline2 }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-home'></i></i><span
                                                        class="fw-semibold mx-2">Town:</span>
                                                    <span>{{ $driver->town }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-home'></i></i><span
                                                        class="fw-semibold mx-2">County:</span>
                                                    <span>{{ $driver->county }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-home'></i></i><span class="fw-semibold mx-2">Post
                                                        Code:</span>
                                                    <span>{{ $driver->postcode }}</span>
                                                </li>
                                            </ul>
                                            <hr
                                                style="
                                                margin-right: auto;
                                                width: 80%;
                                                margin-left: auto;
                                            ">

                                            <h5>About</h5>
                                            <ul class="list-unstyled mb-4 mt-3">
                                                {{ $driver->description }}
                                            </ul>
                                            <hr
                                                style="
                                                margin-right: auto;
                                                width: 80%;
                                                margin-left: auto;
                                            ">

                                            <h5>Vehicle Details</h5>

                                            <ul class="list-unstyled mb-4 mt-3">

                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i></i><span class="fw-semibold mx-2">Up to
                                                        4 Passengers:</span>
                                                    <span>{{ $driver->{"4seatervehicle"} ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Up to 6
                                                        Passengers:</span>
                                                    <span>{{ $driver->{"6seatervehicle"} ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Up to 8
                                                        Passengers:</span>
                                                    <span>{{ $driver->{"8seatervehicle"} ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Long
                                                        Distance:</span>
                                                    <span>{{ $driver->{"longdistance"} ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Estate
                                                        Vehicle:</span>
                                                    <span>{{ $driver->estatevehicle ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Courier
                                                        Vehicle:</span>
                                                    <span>{{ $driver->courier ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span class="fw-semibold mx-2">Executive
                                                        Vehicle:</span>
                                                    <span>{{ $driver->executivevehicle ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span
                                                        class="fw-semibold mx-2">Airport/Seaport:</span>
                                                    <span>{{ $driver->airportruns ? 'Yes' : 'No' }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class='bx bx-car'></i></i><span
                                                        class="fw-semibold mx-2">Wheelchair Friendly:</span>
                                                    <span>{{ $driver->wheelchairfriendly ? 'Yes' : 'No' }}</span>
                                                </li>



                                            </ul>
                                            <ul class="list-unstyled mb-4 mt-3">


                                                <li class="d-flex align-items-center ">
                                                    {{--  <span>{{ $driver->username }}</span> --}}

                                                    <a href="javascript:void(0)"
                                                        class="btn rounded-pill btn-primary edit-driver-btn"
                                                        data-driverid="{{ $driver->driverid }}">
                                                        <small class="list-inline-item fw-semibold">Edit Driver <i
                                                                class="bx bx-pen"></i>
                                                        </small>
                                                    </a>

                                                    {{--  <a href="javascript:void(0)"  style="padding-left:5px"><i class="fa fa-pencil" title="Edit driver"></i></a> --}}
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <!--/ About User -->
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Accordion end -->


                </div>

                <div class="card card-action mb-4">
                    {{-- <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class='bx bx-list-ul bx-sm me-2'></i>{{ $driver->calls->count() ? 'Call History' : 'No Calls Yet' }}
                        </h5>
                        
                    </div> --}}
                    <!-- Accordion -->

                    <div class="accordion accordion-header" id="driver-license-parent">
                        <div class="accordion-item card">
                            <h2 class="accordion-header">

                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#driver-license-info" aria-expanded="false">
                                    Driver License
                                </button>
                            </h2>

                            <div id="driver-license-info" class="accordion-collapse collapse collapse"
                                data-bs-parent="#driver-license-parent">
                                <div class="accordion-body">
                                    <!-- About User -->
                                    <div class="card mb-4 shadow-none">
                                        <div class="card-body p-0">
                                            <ul class="list-unstyled mb-4 mt-3">
                                                <li class="d-flex align-items-center mb-3">

                                                    <img style="width: 40%; height: auto"
                                                        src="data:image/png;base64,{{ htmlspecialchars($driver->license->licensephoto) }}"
                                                        alt="">
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-detail"></i><span
                                                        class="fw-semibold mx-2">Number:</span>
                                                    <span>{{ $driver->license->licensenumber }}</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-detail"></i><span
                                                        class="fw-semibold mx-2">Expiry:</span>
                                                    @if (isset($driver->license->licenseexpiry) && $driver->license->licenseexpiry != '')
                                                        <span>{{ $driver->license->licenseexpiry }}</span>
                                                    @else
                                                    @endif
                                                </li>
                                                <li class="d-flex align-items-center mb-3"><i
                                                        class="bx bx-detail"></i><span class="fw-semibold mx-2">Assigning
                                                        Authority:</span>
                                                    @if (isset($driver->license->licenseauthority) &&
                                                            $driver->license->licenseauthority != '')
                                                        <span>{{ $driver->license->licenseauthority }}</span>
                                                    @endif
                                                </li>

                                            </ul>
                                            <ul class="list-unstyled mb-4 mt-3">

                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="btn rounded-pill btn-primary license-edit-btn"
                                                        data-driverid="{{ $driver->driverid }}">
                                                        <small class="list-inline-item fw-semibold">Edit Licence <i
                                                                class="bx bx-pen"></i>
                                                        </small>
                                                    </a>
                                                </li>
                                            </ul>




                                        </div>
                                    </div>
                                    <!--/ About User -->
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Accordion end -->


                </div>

                <div class="card card-action mb-4">
                    <div class="accordion-item card">
                        <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#payment-history" aria-expanded="false">
                                {{ $driver->payments->count() ? 'Payment History' : 'No Payment History yet' }}
                            </button>
                        </h2>
                        <div id="payment-history" class="accordion-collapse collapse"
                            data-bs-parent="#user-details-parent">
                            <div class="accordion-body">

                                <!-- Payment History -->
                                <div class="card card-action mb-4 payment-history-mobile d-block  shadow-none">

                                    <div class="card-body payment-history p-0">
                                        <ul class="list-unstyled mb-0">

                                            @foreach ($driver->payments as $payment)
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center" style="padding: 10px">
                                                        <div class="d-flex align-items-start">
                                                            <div class="me-2">
                                                                <h6 class="mb-0">
                                                                    {{ $payment->paymentdatetime->toDayDateTimeString() }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:;"><span
                                                                    class="badge bg-label-danger">{{ $payment->paymentamount }}</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                                <!--/ Payment History -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/ User Profile Content -->


    </div>
    <!-- / Content -->




    <!-- Add Location Modal -->
    <div class="modal fade" id="addLocationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Locations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    {{-- <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link location-nav-link" data-section="tab1"
                                href="javascript:void(0)">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link location-nav-link active" data-section="tab2" href="javascript:void(0)">By
                                Radius</a>
                        </li>

                    </ul> --}}
                    {{-- <form action="{{ route('locations.store') }}" onsubmit="saveLocations()" method="POST">
                        @csrf
                        <section id="tab1" class="tabb">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="mb-3">
                                        <label for="select2Basic" class="form-label">Locations</label>
                                        <select id="selectNewLocation" class="select2 form-select form-select-lg"
                                            data-allow-clear="true" multiple>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary" disabled id="saveLocationsButton"
                                style="float: right;">Save
                                Locations</button>
                        </section>

                    </form> --}}
                    <form action="{{ route('locations.store') }}" onsubmit="saveLocationsNear()" method="POST">
                        @csrf
                        {{-- <section id="tab2" class="tabb show"> --}}
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="mb-3">
                                        <label for="select2Basic" class="form-label">Search A Location</label>
                                        <select id="selectNewLocationNear" class="select2 form-select form-select-lg"
                                            data-allow-clear="true">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Distance</label>
                                        <input type="range" name="distance" class=" location-distance-input"
                                            min="0" max="15" value="0" />
                                        <p id="show-range-text">0</p>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 within-distance-location-div">



                                </div>

                                {{-- <div class="col-12 mb-3">
                                    <div class="mb-3">
                                        <label for="select2Basic" class="form-label">select Location</label>
                                        <select id="selectNewLocationWithinDistance" class="select2 form-select form-select-lg"
                                            data-allow-clear="true" multiple>

                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-primary" disabled
                                id="saveLocationsWithinDistanceButton" style="float: right;">Save
                                Locations</button>
                        {{-- </section> --}}

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>
    <!--/ Add Location Modal -->
@endsection


@push('body_scripts')
    <script src="{{ asset('/assetss/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/assetss/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {





            $('.license-edit-btn').on('click', function(e) {
                e.preventDefault();
                var driverid = $(this).data('driverid');
                var url = '{{ route('license.edit', 'tempid') }}';
                url = url.replace('tempid', driverid);
                $.ajax({
                    url: url,
                    type: "GET",
                    datatype: 'html',
                    data: {},
                    success: function(response) {
                        console.log(response);
                        $('#commonModal .modal-content').html(response);
                        $('#commonModal').modal('show');
                    },

                    error: function(err) {
                        console.log(err);
                    }
                });
            });

            //open popup on profile button click STARTS here
            $('.edit-profile-image-btn').on('click', function(e) {
                e.preventDefault();
                var url = '{{ route('dashboard.editprofileimage') }}';
                $.ajax({
                    url: url,
                    type: "GET",
                    datatype: 'html',
                    data: {},
                    success: function(response) {
                        console.log(response);
                        $('#commonModal .modal-content').html(response);
                        $('#commonModal').modal('show');
                    },

                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            //open popup on profile button click ENDS here

            //profile image form submit STARTS here
            $('body').on('submit', '#profile-edit-form', function(e) {
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
                            html: 'Application has been received, we will review it and your profile will be updated once it is approved internally.<br><br>You can track the pending application to get current status by <a href="{{ route('edit_history',array('tab'=>'profile_image')) }}">clicking here</a>',
                            icon: 'success',
                            confirmButtonText: 'Close',
                        }).then((result) => {

                            if (result.isConfirmed) {
                                //Swal.fire('Saved!', '', 'success')
                                $(".closeModal").trigger('click');
                                location.reload();
                            } else if (result.isDenied) {
                                $(".closeModal").trigger('click');
                            }

                        })
                    }
                    if (response.alert_class && response.alert_message) {
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
                    }
                });
            });
            //profile image form submit ENDS here

            $('body').on('change', '#licenseimage', function() {
                readURL(this, 'licenseimage_show');
            });
            $('body').on('change', '#profileimage', function() {
                readURL(this, 'profileimage_show');
            });

            $('body').on('submit', '#license-edit-form', function(e) {
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
                            html: 'Application has been received, we will review it and your profile will be updated once it is approved internally.<br><br>You can track the pending application to get current status by <a href="{{ route('edit_history',array('tab'=>'license')) }}">clicking here</a>',
                            icon: 'success',
                            confirmButtonText: 'Close',
                        }).then((result) => {

                            if (result.isConfirmed) {
                                //Swal.fire('Saved!', '', 'success')
                                $(".closeModal").trigger('click');
                            } else if (result.isDenied) {
                                $(".closeModal").trigger('click');
                            }
                        })
                    }
                    if (response.alert_class && response.alert_message) {
                        var alertdata = '<div class="alert ' + response.alert_class + '">' +
                            response.alert_message + '</div>';
                        $('.license-flash').html(alertdata);
                    }
                    if (response.status == 2) {

                        $.each(response.errors, function(key, error) {
                            $("#license-edit-form #" + key + "").css('display',
                                'inline-block');
                            $("#license-edit-form #" + key + "").html('<strong>' + error[
                                0] + '</strong>');
                        });
                    }
                });
            });

            //license-edit-form

            $('body').on('click', '.off-duty-close-btn', function(e) {
                $.ajax({
                    url: '{{ route('duty.get_driver_duty_status') }}',
                    method: 'GET',
                    dataType: 'json'
                }).done(function(response) {
                    if (response.dutystatus == 1) {
                        $('.change-duty-status-input').prop('checked', true);
                        $('#duty-status-text').text('on');
                    } else if (response.dutystatus == 0) {
                        Swal.fire({
                            html: "You are not marked as On Duty because you haven't updated Off Hours ",
                            icon: 'error',
                            confirmButtonText: 'Close',
                        }).then((result) => {
                            showHideOffTimeInDiv();
                            if (result.isConfirmed) {
                                //Swal.fire('Saved!', '', 'success')
                                //$(".closeModal").trigger('click');
                            } else if (result.isDenied) {
                                //$(".closeModal").trigger('click');
                            }
                        })
                        $('.change-duty-status-input').prop('checked', false);
                        $('#duty-status-text').text('off');
                    }
                });

            });


            $('body').on('submit', '#off-duty-form', function(e) {
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
                            html: response.alert_message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                        }).then((result) => {

                            if (result.isConfirmed) {
                                //Swal.fire('Saved!', '', 'success')
                                $(".closeModal").trigger('click');
                                showHideOffTimeInDiv();

                            } else if (result.isDenied) {
                                $(".closeModal").trigger('click');
                                showHideOffTimeInDiv();
                            }
                        })
                    }
                    /*if (response.alert_class && response.alert_message) {
                        var alertdata = '<div class="alert ' + response.alert_class + '">' +
                            response.alert_message + '</div>';
                        $('.license-flash').html(alertdata);
                    }*/
                    if (response.status == 2) {

                        $.each(response.errors, function(key, error) {
                            $("#off-duty-form #" + key + "").css('display',
                                'inline-block');
                            $("#off-duty-form #" + key + "").html('<strong>' + error[
                                0] + '</strong>');
                        });
                    }
                });
            });

            //open popup on driver edit button click STARTS here
            $('.edit-driver-btn').on('click', function(e) {
                e.preventDefault();
                var url = '{{ route('dashboard.editdriver') }}';
                $.ajax({
                    url: url,
                    type: "GET",
                    datatype: 'html',
                    data: {},
                    success: function(response) {
                        console.log(response);
                        $('#commonModal .modal-content').html(response);
                        $('#commonModal').modal('show');
                    },

                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            //open popup on driver edit button click ENDS here

            $('body').on('submit', '#driver-edit-form', function(e) {
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
                            html: 'Application has been received, we will review it and your profile will be updated once it is approved internally.<br><br>You can track the pending application to get current status by <a href="{{ route('edit_history',array('tab'=>'driver')) }}">clicking here</a>',
                            icon: 'success',
                            confirmButtonText: 'Close',
                        }).then((result) => {

                            if (result.isConfirmed) {
                                //Swal.fire('Saved!', '', 'success')
                                $(".closeModal").trigger('click');
                                location.reload();
                            } else if (result.isDenied) {
                                $(".closeModal").trigger('click');
                            }

                        })
                    }
                    if (response.alert_class && response.alert_message) {
                        var alertdata = '<div class="alert ' + response.alert_class + '">' +
                            response.alert_message + '</div>';
                        //$('.license-flash').html(alertdata);
                    }
                    if (response.status == 2) {

                        $.each(response.errors, function(key, error) {
                            $("#driver-edit-form #" + key + "").css('display',
                                'inline-block');
                            $("#driver-edit-form #" + key + "").html('<strong>' + error[
                                0] + '</strong>');
                        });
                    }
                });
            });

            $('.change-duty-disabled-input').change(function(e) {
                Swal.fire({
                    html: 'Sorry, you cannot change duty status until your account is approved by an admin.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                })
                $(this).prop('checked', false);
            })

        }); //ready
        function toggleUnreadMessages() {
            $('.driver-messages-tbody .seen-message').toggle()

        }

        function changeDutyStatus() {
            let dutyStatus = event.target.checked ? "on" : "off";
            if (dutyStatus == 'on') {
                openHoursModal();
                //alert('test');
                $('#duty-status-text').text(dutyStatus);
            } else {
                changeDutyStatusAjax(dutyStatus);
                $('#duty-status-text').text(dutyStatus);
            }
        }

        function openHoursModal() {
            var url = '{{ route('duty.hours') }}';
            $.ajax({
                url: url,
                type: "GET",
                datatype: 'html',
                data: {},
                success: function(response) {
                    console.log(response);
                    $('#commonModal .modal-content').html(response);
                    $('#commonModal').modal('show');
                },

                error: function(err) {
                    console.log(err);
                }
            });
        }

        function changeDutyStatusAjax(dutyStatus) {
            $.ajax({
                url: "{{ route('duty.changeStatus') }}",
                /*     url: "/change-duty-status",*/
                type: "POST",
                data: {
                    action: dutyStatus,
                },
                success: function(response) {
                    showHideOffTimeInDiv();
                    console.log(response);
                },

                error: function(err) {
                    console.log(err);
                }
            })
        }

        function showHideOffTimeInDiv() {
            $.ajax({
                url: '{{ route('dashboard.get_off_time') }}',
                type: 'GET',
                data: {},
                success: function(response) {
                    $('.off-duty-time-div').empty();
                    if (response != '') {
                        $('.off-duty-time-div').html(response);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        }

        function markMessageAsSeen(buttonElem, driverMessageId) {
            let url = "{{ route('messages.mark-as-seen', ['driver_message' => 'replaceMeWithId']) }}";
            url = url.replace('replaceMeWithId', driverMessageId);
            $.ajax({
                url,
                type: 'get',
                success: (response) => {
                    console.log('response>>', response);
                    let messageDiv = $(buttonElem).closest('.unseen-message');
                    messageDiv.removeClass('table-danger unseen-message');
                    messageDiv.addClass('seen-message');
                    messageDiv.css('display', 'none');
                    buttonElem.remove();
                },
                error: (err) => console.log(err),
            })
        }

        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function parseLocationsForSelect2(locations) {
            let results = locations.data.map((location) => {
                return {
                    id: location.locationid,

                    text: location.town + ', ' + location.county

                };
            });
            console.log('results', results);

            let more = locations.current_page < locations.last_page;

            return {
                results,
                pagination: {
                    more
                }
            };
        }



        function saveLocations() {
            event.preventDefault();

            let locationIds = $("#selectNewLocation").select2('data').map((option) => {
                return option.id;
            });

            let data = {
                locations: locationIds,
            };

            $.ajax({
                url: "{{ route('locations.store') }}",
                type: 'post',
                data,
                success: (response) => {
                    $("#addLocationModal").modal('hide')
                    window.location.reload();
                },
                error: (err) => console.log(err),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            // console.log('this is event: ', event);
        }

        function saveLocationsNear() {
            event.preventDefault();

            /*let locationIds = $("#selectNewLocationWithinDistance").select2('data').map((option) => {
                return option.id;
            });*/

            /*let locationIds =$('input[name=location_checkbox]:checked').map(function(option){
                return option.value;
            });*/
            /*let locationIds =$('input[name=location_checkbox]:checked').map((index,value)=>{
                return value.value;
            });*/
            var locationIds = [];
            $('input[name=location_checkbox]:checked').each((index, value) => {
                console.log(value.value);
                locationIds.push(value.value);
            });

            //console.log($('input[name=location_checkbox]:checked'));

            let data = {
                locations: locationIds,
            };

            $.ajax({
                url: "{{ route('locations.store') }}",
                type: 'post',
                data,
                success: (response) => {
                    $("#addLocationModal").modal('hide')
                    window.location.reload();
                },
                error: (err) => console.log(err),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            // console.log('this is event: ', event);
        }


        function onLocationCheckboxChange() {
            let checkedLocations = $("input[name='selectedLocations[]']:checked");

            if (checkedLocations.length) {
                $("#delete-locations-container").show();
                return;
            }

            $("#delete-locations-container").hide();
            return;
        }


        function confirmDeleteLocations() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteDriverLocations();

                }
            })
        }

        function deleteDriverLocations() {
            let checkedLocations = $("input[name='selectedLocations[]']:checked")
            let locationIds = [];
            checkedLocations.each(function() {
                locationIds.push($(this).val());
            });

            $.ajax({
                url: "{{ route('locations.delete') }}",
                type: 'post',
                data: {
                    locations: locationIds
                },
                success: (response) => {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: "Locations Deleted"
                    }).then(() => window.location.reload());
                    // window.location.reload();
                },
                error: (err) => console.log(err),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        }


        $(document).ready(() => {

            $("#selectNewLocation").select2({
                dropdownParent: $('#addLocationModal'),
                ajax: {
                    url: "{{ route('locations.list') }}",
                    data: function(params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: (data) => {
                        data = parseLocationsForSelect2(data);
                        return data;

                    },
                }
            });
            $("#selectNewLocationNear").select2({
                dropdownParent: $('#addLocationModal'),
                ajax: {
                    url: "{{ route('locations.list') }}",
                    data: function(params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: (data) => {
                        data = parseLocationsForSelect2(data);
                        return data;

                    },
                }
            });




            //triggerNewLocationWithinDistance();

            $('.location-distance-input').change(function(e) {
                console.log('t');
                var location_near_id = $('#selectNewLocationNear').find('option:selected').val();
                var distance = $('.location-distance-input').val();
                //alert(distance);
                $('#show-range-text').html(distance);
                var url = '{{ route('locations.listnear') }}?';
                url = url + 'distance=' + distance;
                url = url + '&';
                url = url + 'location_near_id=' + location_near_id;
                triggerNewLocationWithinDistance(url);
            });
            $("#selectNewLocationNear").change(function(e) {
                console.log('t1');
                var location_near_id = $('#selectNewLocationNear').find('option:selected').val();
                var distance = $('.location-distance-input').val();
                //alert(distance);
                $('#show-range-text').html(distance);
                var url = '{{ route('locations.listnear') }}?';
                url = url + 'distance=' + distance;
                url = url + '&';
                url = url + 'location_near_id=' + location_near_id;
                triggerNewLocationWithinDistance(url);
            })
            // sell.ajax

            $('#selectNewLocation').on('change', function() {
                if ($(this).select2('data').length > 0) {
                    $('#saveLocationsButton').attr('disabled', false);
                    return;
                }
                $('#saveLocationsButton').attr('disabled', true);

            });

            /*$('#selectNewLocationWithinDistance').on('change', function() {
                if ($(this).select2('data').length > 0) {
                    $('#saveLocationsWithinDistanceButton').attr('disabled', false);
                    return;
                }
                $('#saveLocationsWithinDistanceButton').attr('disabled', true);

            });*/

            $("#toggle-all-driver-locations").on('change', function() {

                let isChecked = $(this).is(":checked");
                console.log(isChecked);
                $("input[name='selectedLocations[]']").prop('checked', isChecked);
                onLocationCheckboxChange();

            });

            $('.location-nav-link').click(function(e) {
                var section = $(this).data('section');

                $('.location-nav-link').removeClass('active');
                $(this).addClass('active');

                $('.tabb').removeClass('show');
                $('#' + section).addClass('show');
            });


            $('body').on('change', '.location-checkbox', function() {
                if ($('.location-checkbox:checked').length > 0) {
                    $('#saveLocationsWithinDistanceButton').attr('disabled', false);
                    return;
                }
                $('#saveLocationsWithinDistanceButton').attr('disabled', true);
            })



        });

        function triggerNewLocationWithinDistance(url = "{{ route('locations.list') }}") {
            /*$("#selectNewLocationWithinDistance").select2({
                dropdownParent: $('#addLocationModal'),
                ajax: {
                    url: url,
                    data: function(params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: (data) => {
                        data = parseLocationsForSelect2(data);
                        return data;

                    },
                }
            });*/
            $('.within-distance-location-div').empty().html('loading locations...');
            $.ajax({
                url: url,
                method: 'GET',
                data: {},
                dataType: 'json',
            }).done(function(response) {

                if (typeof response.data !== 'undefined') {
                    var results = response.data.map((location) => {
                        return {
                            id: location.locationid,
                            text: location.town + ', ' + location.county
                        };
                    });
                } else {
                    var results = [];
                }


                console.log(results);

                var checkboxes_html = '';
                $(response.data).each(function(index, value) {

                    checkboxes_html += '<div class="form-check form-check-inline">';
                    checkboxes_html +=
                        '<input class="form-check-input location-checkbox" type="checkbox" name="location_checkbox"  id="inlineCheckbox' +
                        value.locationid + '" value="' + value.locationid + '" >';
                    checkboxes_html += '<label class="form-check-label" for="inlineCheckbox' + value
                        .locationid + '">' + value.town + ', ' + value.county + '</label>';
                    checkboxes_html += '</div>';




                });
                //$('.location-checkbox').find('.location-checkbox').prop('checked',true);

                //$('#saveLocationsWithinDistanceButton').attr('disabled', false);

                $('.within-distance-location-div').empty().html(checkboxes_html);
                $('.location-checkbox').prop('checked', true);

                if ($('.location-checkbox:checked').length > 0) {
                    $('#saveLocationsWithinDistanceButton').attr('disabled', false);
                    return;
                }
                $('#saveLocationsWithinDistanceButton').attr('disabled', true);

                //console.log(results);
            });
        }
    </script>
@endpush
