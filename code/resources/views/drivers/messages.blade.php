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
        .unseen-row{
          background-color:#ffdede;
        }
    </style>
@endpush

@section('title', 'All Messages')
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
                                All Messages

                                <a href="{{route('dashboard')}}" class="btn btn-primary" style="float: right;">Back to Dashboard</a>
                        </h5>
                       
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="example" class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Message</th>
                                        <th class="v-hide">Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                
                            </table>
                          </div>
                        </div><!--col-6-->
                      </div><!--row-->
                        

                        
                        
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
        var table=$('#example').DataTable({
               //"dom": '<"lengthwrapper"flp><"clear">',
               "processing": true,
               "serverSide": true,
               "searching": false,
               "ajax": {
                  "url" : '{{route('messages.listing')}}',
                  "type" : "POST"
                },
               "info":false,
               "order":[[3,'desc']],
               "bLengthChange": false,
               "lengthMenu": [ [10,25], [10, 25] ],
               "columnDefs": [ {
                  "orderable": false,
                  "searchable": false,
                  "sortable": false,
                  "targets": "no-sort",
               },{
                  "orderable": false,
                  "searchable": false,
                  "sortable": false,
                  "visible": false,
                  "targets": "v-hide",
               }],
               "createdRow": function( row, data, dataIndex){
                  if( data[2] == '0'){
                    $(row).addClass('unseen-row');
                  }
                }
              });
        
        $(document).ready(function(){
           
        });//ready

        
        

        
    </script>
@endpush
