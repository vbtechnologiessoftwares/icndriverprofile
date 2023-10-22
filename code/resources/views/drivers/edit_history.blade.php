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
        .layout-wrapper, .layout-container{
            display:block;
        }
    </style>
@endpush

@section('title', 'Edit History')
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
                                Edit History

                                <a href="{{route('dashboard')}}" class="btn btn-primary" style="float: right;">Back to Dashboard</a>
                        </h5>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>License photo</th>
                                        <th>Approved Date</th>
                                        <th>Status</th>
                                        <th>Submission Date</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                        
                    </div>
                </div>
               
               
            </div>
        </div>
        <!--/ User Profile Content -->


    </div>
    <!-- / Content -->
@endsection


@push('body_scripts')

    <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        var table=$('#example').DataTable({
               //"dom": '<"lengthwrapper"flp><"clear">',
               "processing": true,
               "serverSide": true,
               "searching": false,
               "ajax": {
                  "url" : '{{route('edit_history.listing')}}',
                  "type" : "POST"
                },
               "info":false,
               "order":[[2,'desc']],
               "bLengthChange": false,
               "lengthMenu": [ [10,25], [10, 25] ],
               "columnDefs": [ {
                  "orderable": false,
                  "searchable": false,
                  "sortable": false,
                  "targets": "no-sort",
               }],
              });
        $(document).ready(function(){

        });//ready
        

        
    </script>
@endpush
