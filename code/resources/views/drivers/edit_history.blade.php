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
                                View Edit History

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
                                        <th>License photo</th>
                                        <th>Approved Date</th>
                                        <th>Status</th>
                                        <th>Submission Date</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                          </div>
                        </div><!--col-6-->
                        <div class="col-12" style="margin-top:15px">
                          <div class="table-responsive">
                            <table id="example1" class="table">
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
        var table1=$('#example1').DataTable({
               //"dom": '<"lengthwrapper"flp><"clear">',
               "processing": true,
               "serverSide": true,
               "searching": false,
               "ajax": {
                  "url" : '{{route('edit_history.listing2')}}',
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
          $('body').on('click', '.change-status-btn', function(e) {
                e.preventDefault();
                var $this = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    html: "You want to revoke!",
                    icon: 'warning',
                    showCancelButton: true,
                    //confirmButtonColor: '#3085d6',
                    //cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                  
                  if (result.isConfirmed) {
                    changeStatus($this);
                  }else{
                    //return false;
                  }
                });                
            }); 
        });//ready

        function changeStatus($this){
          var licenseeditid=$this.data('licenseeditid');
          var status=$this.data('status');
          var data={licenseeditid:licenseeditid,status:status};
          $.ajax({
            url: '{{route('edit_history.change_status')}}',
            method: 'POST',
            dataType: 'json',
            data: data, //4
            //contentType: false,
            //cache: false,
            //processData: false,
          }).done(function(response) {
              console.log(response);
              $(".invalid-feedback").html('');
              $(".invalid-feedback").css('display', 'none');
              if (response.status == 1) {
                  //$(".closeModal").trigger('click');
                  Swal.fire({
                      html:response.alert_message,
                      icon: 'success',
                      confirmButtonText: 'Close',
                  }).then((result) => {
                    
                    if (result.isConfirmed) {
                      table.ajax.reload(null,false);
                      table1.ajax.reload(null,false);
                    } else if (result.isDenied) {
                      
                    }
                  })
              }

              if (response.status == 2) {
                  //$(".closeModal").trigger('click');
                  Swal.fire({
                      html:response.alert_message,
                      icon: 'error',
                      confirmButtonText: 'Close',
                  }).then((result) => {
                    
                    if (result.isConfirmed) {
                      //table.ajax.reload(null,false);
                    } else if (result.isDenied) {
                      
                    }
                  })
              }

              if (response.alert_class && response.alert_message) {
                  var alertdata = '<div class="alert ' + response.alert_class + '">' +
                      response.alert_message + '</div>';
                  $('.flash').html(alertdata);
              }
                
            });//done
          }//changeStatus
        

        
    </script>
@endpush
