@extends('layouts.driver')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">User Profile /</span> Profile
        </h4>


        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('/assetss/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('/assetss/img/avatars/download.jpg') }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>lukewilliams</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item fw-semibold">
                                            <i class='bx bx-pen'></i> Driver
                                        </li>
                                        <li class="list-inline-item fw-semibold">
                                            <i class='bx bx-map'></i> Vatican City
                                        </li>
                                        <li class="list-inline-item fw-semibold">
                                            <i class='bx bx-calendar-alt'></i> Joined April 2021
                                        </li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                                    <i class='bx bx-user-check'></i> Connected
                                </a>
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
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user'></i>
                            Profile</a></li>
                    {{--   <li class="nav-item"><a class="nav-link" href="pages-profile-teams.html"><i class='bx bx-group'></i> Teams</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i class='bx bx-grid-alt'></i> Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='bx bx-link-alt'></i> Connections</a></li> --}}
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">About</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                    class="fw-semibold mx-2">Full Name:</span> <span>Luke</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                    class="fw-semibold mx-2">Last Name:</span> <span>Williams</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                    class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                    class="fw-semibold mx-2">Payment Status:</span> <span>Yes</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                    class="fw-semibold mx-2">4 Seater Vehicle:</span> <span>Yes</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                    class="fw-semibold mx-2">8 Seater Vehicle:</span> <span>Yes</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                    class="fw-semibold mx-2">Estate Vehicle:</span> <span>No</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                    class="fw-semibold mx-2">AirPort Runs:</span> <span>Yes</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                    class="fw-semibold mx-2">Wheel Chair Friendly:</span> <span>Yes</span></li>
                        </ul>
                        <small class="text-muted text-uppercase">Contacts</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                    class="fw-semibold mx-2">Contact:</span> <span>07123456789</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                    class="fw-semibold mx-2">Admin Approved:</span> <span>Yes</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                    class="fw-semibold mx-2">Email:</span> <span>lukescabs@gmail.com</span></li>
                        </ul>
                        <small class="text-muted text-uppercase">Teams</small>
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="d-flex align-items-center mb-3"><i class="bx bxl-github text-primary me-2"></i>
                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Backend
                                        Developer</span><span>(126 Members)</span></div>
                            </li>
                            <li class="d-flex align-items-center"><i class="bx bxl-react text-info me-2"></i>
                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">React Developer</span><span>(98
                                        Members)</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">Overview</small>
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                    class="fw-semibold mx-2">Task Compiled:</span> <span>13.5k</span></li>
                            <li class="d-flex align-items-center mb-3"><i class='bx bx-customize'></i><span
                                    class="fw-semibold mx-2">Projects Compiled:</span> <span>146</span></li>
                            <li class="d-flex align-items-center"><i class="bx bx-user"></i><span
                                    class="fw-semibold mx-2">Connections:</span> <span>897</span></li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i class='bx bx-list-ul bx-sm me-2'></i>Call History</h5>
                        <div class="card-action-element btn-pinned">
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
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="timeline ms-2">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-warning"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">Stowmarket, Suffolk</h6>
                                        <small class="text-muted">Today</small>
                                    </div>
                                    <p class="mb-2">09/18/2023 12:58 PM</p>

                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-info"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">Stowmarket, Suffolk</h6>
                                        <small class="text-muted">2 Day Ago</small>
                                    </div>
                                    <p class="mb-0">09/14/2023 03:59 PM</p>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">Stowmarket, Suffolk</h6>
                                        <small class="text-muted">08/18/2023 03:16 PM</small>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-success"></span>
                                <div class="timeline-event pb-0">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">Stowmarket, Suffolk</h6>
                                        <small class="text-muted">10 Day Ago</small>
                                    </div>
                                    <p class="mb-0">07/27/2023 03:10 PM</p>
                                </div>
                            </li>
                            <li class="timeline-end-indicator">
                                <i class="bx bx-check-circle"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Activity Timeline -->
                <div class="row">
                    <!-- Connections -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-4">
                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">Driver Locations</h5>
                                <div class="card-action-element btn-pinned">
                                    <div class="dropdown">
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
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Acton, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Acton Place, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Acton Place, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Aldham, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Allwood Green, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Almshouse Green, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Alpheton, Suffolk</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                        class="bx bx-map"></i></button>
                                            </div>
                                        </div>
                                    </li>



                                    <li class="text-center">
                                        <a href="javascript:;">View all teams</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Connections -->
                    <!-- Teams -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-4">
                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">Payment History</h5>
                                <div class="card-action-element btn-pinned">
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">50.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">530.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">540.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">550.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">650.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">150.00</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-start">
                                                <div class="me-2">
                                                    <h6 class="mb-0">06/15/2023 17:06 PM</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;"><span
                                                        class="badge bg-label-danger">350.00</span></a>
                                            </div>
                                        </div>
                                    </li>



                                    <li class="text-center">
                                        <a href="javascript:;">View all teams</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Teams -->
                </div>
                <!-- Projects table -->
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="datatables-projects border-top table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th>Team</th>
                                    <th class="w-px-200">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--/ Projects table -->
            </div>
        </div>
        <!--/ User Profile Content -->


    </div>
    <!-- / Content -->
@endsection
