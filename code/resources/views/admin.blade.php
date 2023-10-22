<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  use App\AddOns;
  $live_cdn = AddOns::where('name', 'live_cdn')->value('status');
  
  use App\callback_tbl;
  $callback_user_id = callback_tbl::where('added_by', Auth::id())->get('id');
  
  use App\Version;
  $version = Version::where('id', '>', '0')->value('version');
  
  use App\CampaignsForm;
  $crm_campaign = CampaignsForm::where('name', 'CRM')->value('name');
  ?>

  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Aycent</title>

  @if ($live_cdn == 0)
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
  @elseif($live_cdn == 1)
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
  @endif
  
  <link href="{{ asset('assets/packages/noty/noty.css') }}" rel="stylesheet" />
  <link rel="preload" href="{{ asset('assets/vendors/css/vendors.min.css') }}" as="style"
    onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
  </noscript>

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.min.css') }}">
  
  @if ($live_cdn == 0)
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/select.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dataTables.dateTime.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  @elseif($live_cdn == 1)
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css" rel="stylesheet" />
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" />
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
  @endif
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/semi-dark-layout.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.min.css') }}">

  {{-- Bootstrap 4 css --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}

  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

  {{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}

  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/dashboard-ecommerce.min.css') }}"> --}}
  


  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-chat.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-email.min.css') }}">

  <!-- BEGIN: Custom CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/did.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/outbound.css') }}">
  <!-- END: Custom CSS -->
  @yield('styles')
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon//favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  {{-- Toast css --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toast.css') }}">

  {{-- admin css file added here by sourav --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">

  {{-- 16-Dec-2022 by Sourav --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/libs/spinkit/spinkit.css') }}">
  
  {{-- ======================= --}}

   <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/rtl/core.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme-default.css') }}">

  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo.css') }}"> --}}

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/libs/bs-stepper/bs-stepper.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/libs/bootstrap-select/bootstrap-select.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/libs/select2/select2.css') }}"> --}}

  {{-- Bootstrap 5 css --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- <script type="text/javascript" src="{{ asset('assets/js/helper.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('assets/js/template-customizer.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('assets/js/config.js') }}"></script> --}}

</head>
<style>
  .modal-backdrop.show {
    opacity: .1 !important;
  }

  #navbarNavDropdown_ul>li>a {
    padding: 3px 12px 10px 12px !important;
  }

  #navbarDropdown_ul {
    display: flex !important;
  }

  #Dialpad {
    font-size: 25px;
    color: #001D6E;
    background-color: #fff;
    border-radius: 5px;
    padding: 5px;
    margin-left: -10px;
  }

  #Dialpad:hover {
    background-color: #5A8DEE;
  }

  #navbar-mobile>ul:nth-child(4)>li.dropdown.dropdown-user.nav-item.show {
    width: auto !important;
  }

  #break_li {
    margin-left: 8px !important;
    font-size: 21px;
    position: relative;
    margin-top: 7px;
  }

  /* 16-August-2022 */
  #break_dropdown_div {
    position: absolute !important;
  }

  .notification-title {
    font-size: 15px !important;
  }

  @media only screen and (max-width: 615px) {
    #DataTables_Table_0_wrapper>div.dt-buttons {
      display: contents;
    }
  }

  /* 18-August-2022 */
  /* Notification */
  #crmNotiTxt>div.ps__rail-y {
    display: none;
  }

  #crmNotiTxt {
    overflow-y: auto !important;
  }

  #crmNotiTxt>a>div {
    padding: 0.9rem 1rem !important;
  }
  
  /* Global css for all index file  */
  #DataTables_Table_0>tbody>tr>td>a {
    color: #5A8DEE;
  }

  #DataTables_Table_0>tbody>tr>td>a:hover {
    color: #0808b1;
    text-decoration: underline;
  }

  /* Pagination */
  .page-link:hover {
    background-color: darkturquoise !important;
    color: #fff !important;
  }
  /* Global CSS for all index file  */
  
  #allnotify>div {
    margin-bottom: 25px !important;
  }

  /* Scroll bar */
  /* width */
  body::-webkit-scrollbar {
    width: 12px !important;
  }

  /* Track */
  body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px rgb(214, 212, 212);
    border-radius: 10px;
  }

  /* Handle */
  body::-webkit-scrollbar-thumb {
    background: #a4a2b6;
    border-radius: 10px;
  }

  /* Handle on hover */
  body::-webkit-scrollbar-thumb:hover {
    background: #7d7b92;
  }
  /* Scroll bar */

  .bxs-bell {
    font-size: 1.4rem;
  }

  /* 15-Dec-2022 */
  #notification {
    font-size: 1.4rem;
    font-weight: 600;
  }

  #allnotify>a>div {
    margin-bottom: 1.4rem !important;
  }

  #allnotify>a>div>p {
    margin-bottom: 5px !important;
  }

  /* media querry for responsive */
  /* admin login logout */
  #drop-login-logout{
    width: 180px;
    right: 0 !important;
  }
  
  @media only screen and (max-width: 766px){
     #drop-login-logout{
      width: 200px;
      position: absolute;
      right: 15px;
     }

    #profile_drop::before{
      position: fixed;
      right: 24px;
      top: 22px;
    }

    #navbarDropdown_ul > li:nth-child(2),
    #navbarDropdown_ul > li:nth-child(4){
      display: none !important;
    }
  }

  /* 9-Dec-2022 */
  #zoom-meet {
    box-shadow: 2px 2px 5px rgb(0 0 0 / 30%);
    font-weight: 600;
  }

  /* For CK editor */
  .ck.ck-editor__main>div {
    min-height: 180px !important;
  }

  /* 03-Jan-2023 */
  /* login user web RTC  */
  .login_style {
    color: #003865;
    font-size: 16px;
  }

  #logout_user {
    background-color: red !important;
  }

  #log_out {
    color: #fff;
    font-size: 16px;
  }

  .bxs-circle {
    color: #0cc53f !important;
    position: relative;
    top: 3px;
    margin-right: 5px;
  }

  /*For Call Navbar CSS */
  #call_from {
    display: flex;
    flex-direction: row;
    padding-left: 33px;
    font-size: 14px;
    color: #fff;
  }

  #connected_btn {
    font-size: 14px;
  }

  #connected_btn .btn {
    font-size: 14px;
    padding: 6px 12px;
    box-shadow: inset 0px 1px 9px 0px rgb(92 92 101) !important;
  }

  #queue_name {
    font-size: 14px;
    color: #fff;
  }

  #extension {
    font-size: 14px;
    color: #fff;
  }

  @media only screen and (max-width: 800px) {
    #navbarDropdown_ul {
        display: none !important;
    }
}

  /* Dialpad dropdown CSS */
  #dial::after {
    display: none;
  }

  /* offcanvas css for side notification */
  div.side-slide {
    background-color: #fff;
    top: 115px;
    right: -550px;
    height: 100%;
    position: fixed;
    width: 450px;
    max-width: 100%;
    z-index: 9999;
    border-radius: 10px 0 0 10px;
  }

  #crossbox {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
  }

  #cross {
    color: rgb(229 37 37);
    top: 0px;
    right: 0px;
    font-size: 2rem !important;
    cursor: pointer;
  }

  #cross:hover {
    background-color: rgb(221, 220, 218);
    border-radius: 4px;
  }

  #side_notify {
    height: 66vh;
    padding: 10px 20px;
    overflow-y: auto;
  }

  #allnotify {
    margin-top: 5px;
  }

  #notify-bell {
    color: #ffffff;
    background-color: #39DA8A;
    padding: 5px;
    border-radius: 25px;
  }

  #notification {
    font-size: 1.4rem;
    font-weight: 600;
    color: #003865;
    border-radius: 25px;
  }

  @media only screen and (max-width: 520px){
    div.side-slide{
     top: 75px;
    }
  }

  #read_all_noti>a {
    font-size: 16px;
    color: white
  }

  #read_all_noti {
    background-color: #014493;
    padding: 10px 0;
    border-radius: 5px;
    margin: -5px 30px 0px 20px !important;
    text-align: center;
    position: relative;
    z-index: 99999;
  }

  #read_all_noti:hover {
    background-color: #3c5fc0;
    color: #313030;
  }

  /* 13-March-2023 */
  #readnotification {
    background: no-repeat;
  }

  .primary_message {
    background-color: #DEFCE6 !important;
    color: #3B3C3B !important;
    font-weight: 500 !important;
    border: 1px solid #B1E5C0 !important;
    padding: 7px 10px;
    box-shadow: 0px 0px 2px 0px rgba(158, 147, 201, 1);
  }

  .primary_message>p {
    text-decoration: underline;
  }

  .primary_message>p:hover {
    text-decoration: none;
  }

  /* Dialpad responsive */
  @media only screen and (max-width: 768px){
    #navbarDropdown_ul > div.dropdown.dialPadDropdown.show > div{
      width: 300px !important;
      max-width: 100%;
      position: absolute !important;
      left: 20px !important;
      min-height: 350px;
    }
  }
  
  /* Content wrapper padding Global CSS */
  @media only screen and (max-width: 500px){
    body > div.app-content.content > div.content-wrapper{
    padding: 1rem 1rem !important;
   }
  }

  /* Loader CSS */
  /* body > div > div{
    margin: 0 !important;
    border-color: rgb(84 134 216) rgb(225, 225, 225) rgb(225, 225, 225) !important;
  } */

   /* Global padding */
   html .navbar-sticky .app-content .content-wrapper{
    padding: 1.5rem 1rem 0;
  }
  
  /* Global Content wrapper margin */
  body>div.app-content.content>div.content-wrapper {
    margin-top: 7rem !important;
  }

  /* Media Querry for mobile responsive */
  /* Navbar */
 @media only screen and (max-width: 992px) {
    #web_navbar {
        display: none;
    }

    body>div.app-content.content>div.content-wrapper {
        margin-top: 4.5rem !important;
    }
}

@media only screen and (max-width: 485px) {
    #navbarNavDropdown > ul:nth-child(1) {
          margin-left: -10px !important;
      }
}

@media only screen and (max-width: 415px) {
    #navbarNavDropdown > ul:nth-child(1) {
          margin-left: 0 !important;
      }
}

@media only screen and (max-width: 500px) {
    body>div.app-content.content>div.content-wrapper {
        margin-top: 5rem !important;
    }
}

#navbar-mobile{
  margin-top: -4px;
}

*{
 text-decoration: none !important;
}

body{
  font-size: .95rem !important;
}

.table thead th {
  font-size: .75rem !important;
}

#showUp > div > div > div > div.tab-content{
  padding: 0 !important;
}

.btn-default {
    color: #23282c;
    background-color: #f0f3f5;
    border-color: #f0f3f5;
    border-radius: 0;
}

#drop-login-logout{
  font-size: .8rem !important;
}

div.content-header.row > div > div > div > ol > li{
  padding-left: 1rem !important;
}

#messageTime{
   font-size: 14px;
    display: flex;
    justify-content: end;
    font-weight: 400;
}

table.dataTable tbody td.select-checkbox:before{
  left: 30% !important;
}

table.dataTable tr.selected td.select-checkbox:after{
  left: 14px !important;
}

#btn-scroll-top {
  display: none;
  cursor: pointer;
  position: fixed; 
  bottom: 20px;
  right: 30px;
  z-index: 99;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #0d6efd;
  color: white;
  border: none;
}

/* .main-menu{
       width:260px !important;
      } */

.dataTables_scrollHeadInner{
      width: 100% !important;
}

.bx-select-multiple{
  font-size: 1.3rem;
}

.flatpickr-prev-month > svg{
    position: relative;
    top: -7px;
}

.flatpickr-next-month > svg{
    position: relative;
    top: -7px;
}

div.dataTables_scroll > div.dataTables_scrollHead{
  width: 100% !important;
}

div.dataTables_scroll > div.dataTables_scrollHead > div > table{
  width: 100% !important;
}

#drop-login-logout > a{
  text-transform: capitalize !important;
  font-size: .85rem !important
}

#drop-login-logout > a{
  padding: 0.5rem 1rem !important;
}

</style>

<body
  class="vertical-layout vertical-menu-modern 2-columns calendar-application email-application  navbar-sticky footer-static"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- BEGIN: Header-->
  <div class="header-navbar-shadow"></div>
  <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                  class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i
                    class="ficon bx bx-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons mt-50" id="navbarDropdown_ul">

              <div id="sound"></div>

              {{-- <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="{{ route('workspace.index') }}" data-toggle="tooltip"
                  data-placement="top" title="Workspace"><i class='bx bx-desktop' style="font-size: 1.5rem"></i>
                </a>
              </li> --}}

              {{-- <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="{{ route('agent.to.agent.chat') }}" data-toggle="tooltip"
                  data-placement="top" title="Chat">
                  <div class="position-relative d-inline-block"><i class="ficon bx bx-chat"></i><span
                      id="client_count"></span></div>
                </a>
              </li> --}}

              {{-- <li class="nav-item d-none d-lg-block" style="display: none;"><a class="nav-link"
                  href="{{ route('workspace.workspace_page') }}" data-toggle="tooltip" data-placement="top"
                  title="Callback"><i class='bx bx-phone-call' style="font-size: 1.5rem"></i></a>
              </li> --}}

              <li class="nav-item ml-50 call_btn">
                <a class="nav-link call-control"
                  style="background-color: #0cc53f;border-radius: 5px;padding: 0px 13px 13px 13px;" href="#"
                  onclick="ari_Channel('Answer')" title="Auto Answer is off, Click to Activate."><i
                    class="ficon fa fa-phone fa-flip-horizontal"></i></a>
              </li>
              <li class="nav-item ml-50 call_btn">
                <a class="nav-link call-control"
                  style="background-color: red;border-radius: 5px;padding: 0px 13px 13px 13px;" href="javascript:;"
                  onclick="ari_Channel('Delete')" title="Click to Hangup the Call"><i
                    class="ficon fa fa-times"></i></a>
              </li>

              <li class="nav-item d-none d-lg-block ml-50 call_btn">
                <a class="nav-link call-control callpanel-buttons call_btn_hover" style="padding: 0px 13px 13px 13px;"
                  href="javascript:;" onclick="ari_Channel('Mute')" id="mute_btn" title="Click to Mute the Call"><i
                    class="ficon fa fa-microphone"></i></a>
              </li>

              <li class="nav-item d-none d-lg-block ml-50 call_btn">
                <a class="nav-link call-control callpanel-buttons call_btn_hover" style="padding: 0px 13px 13px 13px;"
                  href="javascript:;" onclick="ari_Channel('Hold')" id="hold_btn" title="Click to hold the call"><i
                    class="ficon fa fa-pause"></i></a>
              </li>

              {{-- Dialpad --}}
              <div class="dropdown dialPadDropdown" style="margin-left: 1.2rem; margin-top: -.2rem;">
                <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" id="dial"
                  aria-expanded="false" title="Dialpad" style="display: contents;"
                  onclick="$('#telNumber').val('')">
                  <i class='bx bx-dialpad' id="Dialpad"></i></a>

                <div class="dropdown-menu dialPadDropdown" style="width: 300px; position: absolute; left: -108px;">
                  <div class="row">
                    <div id="workspace_dialpad" class="col-md-12 col-sm-12">
                      <div class="num-pad" id="num_pad_id" style="padding: 1rem;">
                        <input type="tel" name="dailpad_name" id="telNumber" placeholder="Enter the number."
                          class="form-control tel" value="" />
                        <div class="row">
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="1">1</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="2">2
                                  <span class="small">
                                    <p>ABC</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="3">3
                                  <span class="small">
                                    <p>DEF</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="4">4
                                  <span class="small">
                                    <p>GHI</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="5">5
                                  <span class="small">
                                    <p>JKL</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="6">6
                                  <span class="small">
                                    <p>MNO</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="7">
                                  7 <span class="small">
                                    <p>
                                      PQRS</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="8">
                                  8 <span class="small">
                                    <p>TUV</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="9">
                                  9 <span class="small">
                                    <p>
                                      WXYZ</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="*">*</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="0">0
                                  <span class="small">
                                    <p>+</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4 col-4 text-center">
                            <div class="span4">
                              <div class="num">
                                <div class="txt" data-num="#">#</div>
                              </div>
                            </div>
                          </div>
                          <div id="btn_div" class="row" style="margin-left: -20px;">
                            <div class="col-md-12" style="text-align: center;">
                              <blink id="event_op" style="color: green;"> &nbsp; &nbsp;</blink>
                              <blink id="event" style="color: red;"> </blink>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4 text-center">
                              <a id="dailpad_call_btn"
                                style="background-color: #0cc53f;border-radius: 5px;padding: 4px 12px 7px 12px;color: #fff;"
                                title="Click to Dial."><i class="ficon fa fa-phone fa-flip-horizontal"
                                  style="font-size: 0.7rem; color: #fff;"></i></a>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4 text-center">
                              <a href="javascript:;" id="dailpad_call_hangup"
                                style="background-color: red;border-radius: 5px;padding: 4px 12px 7px 12px;color: #fff;"
                                title="Click to Hangup the Call">{{-- HANGUP --}}<i class="ficon fa fa-times"
                                  style="font-size: 0.7rem; color: #fff;"></i></a>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4 text-center">
                              <a href="javascript:;" id="dailpad_call_conferance"
                                style="background-color: #014493;border-radius: 5px;padding: 4px 12px 7px 12px;color: #fff;"
                                title="Conference Call"><i class="fa fa-users"
                                  style="font-size: 0.7rem; color: #fff;"></i>{{-- CONFERENCE --}}</a>
                            </div>

                            <div class="row mt-2 pl-1 pr-1">
                              <div class="col-md-8 form-group">
                                <input type="text" id="conference_input" name="conference_input"
                                  class="form-control" style="height: 33px;">
                              </div>

                              <div class="col-md-4">
                                <button class="btn btn-sm btn-outline-success" onclick="validate('','conference_input')" id="sub">Submit</button>
                              </div>
                            </div>

                            <div class="row col-md-12 mt-1" id="transfer_event_div" style="display: none;">
                              <div class="col-md-4 col-sm-4 col-4" style="text-align: center; margin-left: 5px;">
                                <a href="javascript:;" id="dailpad_call_transfer"
                                  style="background-color: #014493;border-radius: 5px;padding: 4px 12px 7px 12px;color: #fff;"
                                  title="Call Transfer">
                                  <i class="bx bx-transfer" style="font-size: 0.7rem; color: #fff;"></i>
                                  {{-- TRANSFER --}}
                                </a>
                              </div>
                              <div class="col-md-4 col-sm-4 col-4" style="display: none; text-align: end;">
                                <a href="javascript:;" id="dailpad_call_transfer_now"
                                  style="background-color: #014493;border-radius: 5px;padding: 4px 12px 7px 12px;color: #fff;"><i
                                    class="bx bxs-phone-outgoing" style="font-size: 0.7rem;"></i></a>
                              </div>
                              <div class="col-md-12 mt-1" style=" margin-left: 15px;">
                                <input type="text" id="trans_ext" name=""
                                  title="Please Enter The Extension Number" placeholder="Extension"
                                  class="form-control" style="width: auto;">
                              </div>
                              <div class="col-md-12 mt-25">
                                <blink id="transfer_event" style="color:green;"></blink>
                              </div>
                            </div>
                          </div>
                          <div class="row" style="display: none;">
                            <div class="col-md-4 col-sm-4 col-4">
                              <div class="spanicons">
                                <i class="fa fa-star"></i>
                                <span class="small">
                                  <p class="small">Favorites</p>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                              <div class="spanicons">
                                <i class="fa fa-phone"></i>
                                <span class="small">
                                  <p class="small">Calls</p>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                              <div class="spanicons">
                                <i class="far fa-contact"></i>
                                <span class="small">
                                  <p class="small">Contacts</p>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                              <div class="spanicons">
                                <i class="fa fa-keyboard-o"></i>
                                <span class="small">
                                  <p class="small">Keyboard</p>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                              <div class="spanicons">
                                <i class="fa fa-microphone"></i>
                                <span class="small">
                                  <p class="small">Voice mail</p>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Dialpad --}}
            </ul>

            <ul class="nav navbar-nav bookmark-icons" id="navbarNavDropdown_ul"
              style="display:none; margin-top: 0.2rem;">
              <li class="nav-item d-none d-lg-block ml-50 call_btn" id="break_li">
                <a class="dropdown-toggle nav-link dropdown-user-link call-control callpanel-buttons call_btn_hover userbutton"
                  style="" id="break_dropdown" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="true" title="Please Select Break" href="javascript:;" data-placement="top"><i
                    class='fa fa-coffee'></i></a>

                <ul class="nav navbar-nav float-right">
                  <li class="dropdown nav-item call_btn">
                    <div id="break_dropdown_div" class="dropdown-menu dropdown-menu-right pb-0"
                      aria-labelledby="break_dropdown">
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item" style="display: none;">
                <a id="heading_txt" href="javascript:void();" style="color:#fff;">
                  {{-- Waiting For Call...! --}}
                </a>
              </li>
            </ul>

             {{-- Complete search box --}}
             <div class="complete_search_box">
             	    <input id="typesearchclass" class="form-control" type="text" placeholder="Search...">
            </div>

              <!-- ChatGpt Button trigger -->
              {{-- <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#chatGptModal">
                ChatGPT
              </button> --}}
          </div>

          <ul class="nav navbar-nav float-right">
            @if ($crm_campaign == 'CRM')
            @else
              <li class="nav-item" id="idle_workspace" style="display: none;">
                <label id="idle_lable" class="stopwatch_label idle_span" style="color: #fff;">Idle Time</label>
                <div class="stopwatch_class idle_span" id="idlewatch" style="padding:0px 10px 0px 0px;color: #fff;">
                  00:00:00
                </div>
              </li>
            @endif

            <!-- Toast Message -->
            <li class="float-right" style="margin-top: 15px;">
              <button type="button" class="btn btn-primary" id="liveToastBtn"></button>

              <div class="position-fixed bottom-0 right-0 p-1" style="z-index: 5; right: 0; bottom: 0;"
                id="toast">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                  data-delay="5000">
                  <p id="popupclick"></p>
                </div>
              </div>
            </li>
            <!-- Toast Message -->
           
            {{-- <li class="nav-item" style="padding: 10px; margin-top: 5px;">
							<label class="stopwatch_label" style="color: #fff;">Current Login Time</label>
							<div class="stopwatch_class" id="stopwatch" style="color: #fff;text-align: center;">
								00:00:00
							</div>
						</li> --}}

            {{-- Login --}}
            <li id="login_user"
              style="background-color: aliceblue; padding: 5px 10px; border-radius: 3px; margin-right: 7px; display: none;">
              <a href="#" class="login_style" id="log_in">Login</a>
            </li>

            {{-- Logout --}}
            <li id="logout_user"
              style="background-color: aliceblue; padding: 5px 10px; border-radius: 3px; margin-right: 7px; display: none;">
              <a href="#" id="log_out">Logout</a>
            </li>

          </ul>
          {{-- <ul class="nav navbar-nav float-right" id="navbarDropdown_lang" style="margin-top: 5px;">
						<li class="dropdown dropdown-language nav-item">

							<a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-flag">
								<a class="dropdown-item" href="javascript:void(0);" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i> English</a>
							</div>
						</li>
					</ul> --}}
          <ul class="nav navbar-nav float-right" style="margin-top: 5px;">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                  class="ficon bx bx-fullscreen"></i></a></li>

            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link dropdown-item p-50 justify-content-center" href="javascript:void(0);"
                onclick="allnotification()" data-toggle="modal" data-target="" id="readnotification"><i
                  class="ficon bx bx-bell bx-tada bx-flip-horizontal bellbutton" id="crmNoti"></i></a>
              {{-- <span class="badge badge-pill badge-danger badge-up">5</span> --}}


              {{-- <li class="dropdown-menu-footer">
									<a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0);" onclick="allnotification()" data-toggle="modal" data-target="" id="readnotification"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal bellbutton" id="crmNoti"></i></a>
								</li>
                          --}}
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <div class="dropdown-header px-1 py-75 d-flex justify-content-between">
                    <span class="notification-title">Notification</span>
                    <!-- <span class="text-bold-400 cursor-pointer">Mark all as read</span> -->

                    <!-- code by sourav -->
                    <a href="{{ route('readall') }}" class="dropdown-notifications-all text-body"
                      data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"
                      data-bs-original-title="Mark all as read" aria-label="Mark all as read"><i
                        class="bx fs-4 bx-envelope-open"></i></a>
                    <!-- code by sourav -->
                  </div>
                </li>
                <li class="scrollable-container media-list" id="crmNotiTxt">
                  {{-- <a class="d-flex justify-content-between" href="quoteIndex">
										<div class="media d-flex align-items-center">
											<div class="media-left pr-0">
												<div class="avatar mr-1 m-0">
													<i class='bx bxs-bell'></i>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading">
													<span class="text-bold-500">Congratulate Socrates Itumay for work anniversaries
														<i class='bx bx-x'></i>
													</span>
												</h6>
											</div>
										</div>
									</a> --}}

                  <a class="d-flex justify-content-between read-notification cursor-pointer"
                    href="javascript:void(0);">
                </li>
                <li class="dropdown-menu-footer">
                  <a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0);"
                    onclick="allnotification()" data-toggle="modal" data-target="" id="readnotification">Read all
                    notifications</a>
                </li>
              </ul>
            </li>

            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link profileButton" href="javascript:void(0);"
                data-toggle="dropdown" id="profile_drop">
                <div class="user-nav d-sm-flex d-none"><span class="user-name">{{ Auth::user()->name }}</span><span
                    class="user-status">Available</span></div>
                <span></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right pb-0" id="drop-login-logout">
                {{-- 03-Jan-2023 --}}
                <a class="dropdown-item" href="{{ route('profile') }}" title="Profile"><i
                    class="bx bx-user mr-50"></i>
                  {{ Auth::user()->name }}
                </a>

                <?php
                  $checkWebRtc = checkUserWebrtc();
                  if ($checkWebRtc != 0) { ?>
                <div class="dropdown-divider mb-0 mt-0"></div>
                <a class="dropdown-item" href="#" title="User Login" style="padding-left: 28px;"
                  id="webrtc" data-id="{{ $checkWebRtc }}">
                  <i class='bx bx-user-circle mr-50' style="font-size: 1.2rem"></i> WebRTC User
                </a>
                <?php }
                ?>
                <div class="dropdown-divider mb-0 mt-0"></div>

                <a class="dropdown-item" href="{{ url('/help') }}" title="Help" target="parent">
                  <i class='bx bx-help-circle mr-50'></i>
                  Help
                </a>
                <div class="dropdown-divider mb-0 mt-0"></div>

                <input type="hidden" id="contact_id" name="" value="{{ Session::get('contact_id') }}">
                <input type="hidden" id="logout_id" name="{{ Auth::user()->id }}" value="{{ Auth::user()->id }}">

                <a id="logout" class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="bx bx-power-off mr-50"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

              </div>
            </li>
          </ul>
        </div>

        {{-- Navbar by Sourav ======== --}}
        <div class="row" id="web_navbar">
          <div class="col-md-3 col-sm-12">
            <p id="call_from" style="margin: 0;">Call To : <blink id="call_number"> No Calls</blink>
            </p>
          </div>

          <div class="col-md-5 col-sm-12">
            <span id="queue_name" style="margin:0;">
              <blink id="queue_name"></blink>
            </span>
          </div>

          <div class="col-md-2 col-sm-12" style="display: none;">
            <input type="hidden" name="auto_search" id="auto_search" value="">
            <span id="connected_btn" style="">
              <a href="#" class="btn btn-sm"
                style="background-color: red; color:#fff; border-radius:30px;">Connected</a>
            </span>
          </div>

          <div class="col-md-2 col-sm-12">
            <span id="extension">Extension No:-
              {{ str_replace(',sip_pbx', '', Session::get('extension')) }}
            </span>
          </div>
        </div>
        {{-- ========================= --}}
      </div>
    </div>
    </div>
    </div>
  </nav>


  {{-- offcanvas for side notification --}}
  <div class="side-slide" id="notice_box">
    <div id="crossbox">
      <i class='bx bx-x' id="cross"></i>
      <div style="padding-right: 10px;">
        <i class="bx bxs-bell" id="notify-bell"></i>
        <span id="notification">Notifications</span>
      </div>
    </div>
    <div style="border-bottom: 2px solid #003865; margin: 8px 20px;"></div>
    <div id="side_notify">
      <p id="allnotify"></p>
    </div>
    <div id="read_all_noti">
      <a href="#">Read All Notifications</a>
    </div>
  </div>


<!-- ChatGpt Modal -->
{{-- <div class="modal fade" id="chatGptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">ChatGpt</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="chatGptBody">
        <div class="row justify-content-center mt-1">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header"><h6 class="fw-bold">Ask Something To ChatGPT</h6></div>
                  <div class="card-body">
                      <form method="POST" action="{{ route('chatgpt.ask') }}" class="pt-3">
                          @csrf

                          <div class="form-group">
                              <input type="text" class="form-control text-center" name="prompt" placeholder="Ask something...">
                          </div>

                          <button type="submit" class="btn gptSend">Send</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
      
        <div class="row justify-content-center mt-1">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h6 class="fw-bold">ChatGPT Answer</h6> <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to copy"><i class='bx bxs-copy'></i></a></div>
                    <div class="card-body">
                     @if(isset($response))
                        <pre>{{ $response }}</pre>
                        @endif
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- ChatGpt Modal End -->


  <!-- END: Header-->
  @include('partials.menu')
  <!-- BEGIN: Content-->
  <div class="app-content content">
    @yield('content')
  </div>
  {{-- @include('layouts.chats') --}}
  <footer class="footer footer-light">
    <p class="clearfix">
      {{--
		<div class="col-md-12"> --}}
      <!-- code edit by sourav 28-6-2022 -->
    <div class="col-md-12 row m-0 pb-1">
      <div class="col-md-4 col-sm-4 text-left" id="copy">Copyright © 2010 - 2023</div>
      <div class="col-md-4 col-sm-4 text-center" id="aycent">Aycent Call Centre Software</div>
      <div class="col-md-4 col-sm-4 text-right" id="version">Version {{ $version }}</div>
    </div>
    <!-- code edit by sourav 28-6-2022 -->
    {{--
		</div> --}}
    </p>
    {{-- <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt" style="right: 5px; top: 0;"></i></button> --}}

    <button id="btn-scroll-top"><i class="bx bx-up-arrow-alt" style="font-size: 1.4rem;
      position: relative;
      top: 2px;"></i></button>

    <!-- Modal for reminder -->
    <div class="modal fade show" id="exampleModalReminder" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: -3px -3px 20px 14px rgba(25,42,70,.13);">
          <div class="modal-header" style="padding: 0.7rem 2.3rem;">
            {{-- <img src="{{ asset('assets/images/zoom.png')}}" alt="" width="120px;" height="auto;"> --}}
            <h5 class="modal-title" style="color: #001D6E; font-weight: 600;" id="modal_content_header"></h5>
          </div>
          <div class="modal-body">
            <input type="hidden" id="reminder_id" value="">
            <p style="color: #003865" id="modal_body_content"></p>
          </div>
          <div class="modal-footer row" style="padding: 0.7rem 2.3rem;">

            <select class="form-control snoozer_select" id="name" name="user_id"
              style="width: 32% !important;">
              <option value="">Snooze reminder</option>
              <option value="5">5 Minutes</option>
              <option value="10">10 Minutes</option>
              <option value="15">15 Minutes</option>
              <option value="20">20 Minutes</option>
              <option value="25">25 Minutes</option>
              <option value="30">30 Minutes</option>
            </select>

            <button type="button" data-dismiss="modal" class="btn btn-success"
              id="reminder_close_button">OK</button>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="{{ asset('assets/js/quill.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/packages/noty/noty.js') }}"></script>
  <script type="text/javascript"
    src="{{ asset('assets/packages/backpack/base/js/bundle.js?v=4.1.46@4bb96f8e34289b858e482ad9c9bf3ea51cb8b7c0') }}">
  </script>
  <!-- BEGIN: Vendor JS-->
  <script type="text/javascript" src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
  <!-- BEGIN Vendor JS-->
  <!-- BEGIN: Page Vendor JS-->
  <script type="text/javascript" src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
  <!-- END: Page Vendor JS-->
  <!-- BEGIN: Theme JS-->
  <script type="text/javascript" src="{{ asset('assets/js/scripts/configs/vertical-menu-light.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/app-menu.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/app.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts/components.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts/footer.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts/customizer.min.js') }}"></script>
  <!-- END: Theme JS-->
  <!-- BEGIN: Page JS-->
  <script type="text/javascript" src="{{ asset('assets/js/scripts/forms/select/form-select2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts/datatables/datatable.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts/pages/app-email.min.js') }}"></script>
  @if ($live_cdn == 0)
    {{-- <script type="text/javascript" src="{{ asset('assets/js/ckeditor.js') }}"></script> --}}
    <!-- END: Page JS-->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.flash.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.dateTime.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.rowReorder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scripts/pages/bootstrap-toast.min.js') }}"></script>
    {{-- ========= BELOW JS ATTACH FOR EMOJIS ON AYCENT============= --}}
    <script type="text/javascript" src="{{ asset('assets/dist/emojionearea.js') }}"></script>
    {{-- ====================== --}}
  @elseif($live_cdn == 1)
    {{-- <script type="text/javascript" src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
    <!-- END: Page JS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bpampuch/pdfmake@0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bpampuch/pdfmake@0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
    <script type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js">
    </script>
  @endif
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

  {{-- Start of reminder script --}}
  <script>
    $('.snoozer_select').change(function(e) {
      $('#exampleModalReminder').hide();
      var reminderId = $('#reminder_id').val();
      var snoozeAfter = e.target.value;
      $.ajax({
        method: 'GET',
        url: '{{ route('snoozeReminder') }}',
        data: {
          reminderId: reminderId,
          snoozeAfter: snoozeAfter,
        },
      }).done(function(done) {
        // console.log(done);
      })
    })

    $('#reminder_close_button').click(function() {
      var reminderId = $('#reminder_id').val();
			$('#exampleModalReminder').hide();
      $.ajax({
        method: 'GET',
        url: '{{ route('deleteReminder') }}',
        data: {
          reminderId: reminderId,
        },
      }).done(function(data) {
        console.log(data);
      })
    });

    Echo.join('ReminderChannel').listen('ReminderEvent', (e) => {
      let object = e.reminderData;
      if (object.user_tasks.user_id == '{{ Auth::user()->id }}') {
        $('#reminder_id').val(object.id);
        $('#modal_body_content').html('Your ' + object.reminder_for + ' (' + object.user_tasks.title +
          ') is due in ' + object.user_tasks.remind_before + ' minutes.');
        $('#modal_content_header').html(object.user_tasks.title + ' due in ' + object.user_tasks.remind_before +
          ' minutes.');
        $('#exampleModalReminder').show();
      }
    });

    Echo.join('MeetingReminderChannel').listen('MeetingReminderEvent', (e) => {
      let object = e.reminderData;
      if (object.user_tasks.user_id == '{{ Auth::user()->id }}') {
        $('#reminder_id').val(object.id);
        $('#modal_body_content').html('Your ' + object.reminder_for + ' (' + object.user_tasks.title +
          ') is due in ' + object.user_tasks.remind_before + ' minutes.');
        $('#modal_content_header').html(object.user_tasks.title + ' due in ' + object.user_tasks.remind_before +
          ' minutes.');
        $('#exampleModalReminder').show();
      }
    });

    // Echo.join('OpportunityReminderChannel').listen('OpportunityReminderEvent', (e) => {
    // 	// console.log(e);
    // });
  </script>
  {{-- End of reminder script --}}

  <script type="text/javascript">
    $(document).ready(function() {
      /*==================*/
      // $('#user-logout-dropdown').trigger('click');
      var extension_type = "{{ Session::get('extension_type') }}";
      if (extension_type == "WS_PBX") {
        $('#dialpad_li div').hide();
        // $('#break_li a').hide();
        // $('#workspace_dialpad').hide();
      }

      /*==================*/
      $('#logout').on('click', function() {
        console.log($('#logout_id').val());
      });

      $('.num-pad .txt').on('click', function(e) {
        e.stopPropagation();
        //e.preventDefault();
        let num = $('#telNumber').val();
        num += $(this).data('num');
        $('#telNumber').val(num);
        // setTimeout(function () {
        //   $('.dialPadDropdown').each(function () {
        //     console.log($(this))
        //     $(this).removeClass('show');
        //     $(this).addClass('show');
        //   })
        // }, 0.0001)
      })
    });
  </script>
  {{-- <script type="text/javascript">
		$('.card-header').click(function() {
          $(this).find('i').toggleClass('bx bx-plus bx bx-minus');
      });
      
      $(document).ready(function(){
      $('[data-toggle="popover"]').popover({
              placement : 'right',
              trigger: 'hover'
          });
      });
      const timer = document.getElementById('stopwatch');
      var hr = 0;
      var min = 0;
      var sec = 0;
      var stoptime = true;
      function startTimer() {
        if (stoptime == true) {
              stoptime = false;
              timerCycle();
          }
      }
      function stopTimer() {
        if (stoptime == false) {
          stoptime = true;
        }
      }
      function timerCycle() {
          if (stoptime == false) {
          sec = parseInt(sec);
          min = parseInt(min);
          hr = parseInt(hr);
          sec = sec + 1;
          if (sec == 60) {
            min = min + 1;
            sec = 0;
          }
          if (min == 60) {
            hr = hr + 1;
            min = 0;
            sec = 0;
          }
          if (sec < 10 || sec == 0) {
            sec = '0' + sec;
          }
          if (min < 10 || min == 0) {
            min = '0' + min;
          }
          if (hr < 10 || hr == 0) {
            hr = '0' + hr;
          }
          timer.innerHTML = hr + ':' + min + ':' + sec;
          setTimeout("timerCycle()", 1000);
        }
      }
      function resetTimer() {
          timer.innerHTML = '00:00:00';
      }
	</script> --}}
  {{-- <script type="text/javascript">
		var myVar = setInterval(myTimer, 9000);
      function myTimer() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var url ="{{ url('chats-management/chats-index-count')}}";
          var formData ="";
          $.ajax({
          type:'POST',
          url: url,
              data: formData,
              cache:false,
              contentType: false,
              processData: false,
              success: (data) => {
                  console.log(data.sumofarray);
                  $('#client_count').text('')
                  if(data.sumofarray != "0"){
                      $('#client_count').html('<span class="badge badge-pill badge-primary badge-up badge-round chat-count">'+data.sumofarray+'</span>');
                  }
              }
          });
      }
	</script> --}}
  <script>
    $(function() {
      var val = Math.floor(1000 + Math.random() * 9000);
      var today = new Date();
      var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + '-' + val;
      let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
      let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
      let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
      let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
      let printButtonTrans = '{{ trans('global.datatables.print') }}'
      let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
      // let languages = {
      //     'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
      // };
      $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
        className: 'btn btn-sm'
      })
      $.fn.dataTable.ext.errMode = 'none';
      $.extend(true, $.fn.dataTable.defaults, {
        // language: {
        //     url: languages['{{ app()->getLocale() }}']
        // },
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            defaultContent: '0',
            targets: 0
          },
          {
            orderable: false,
            searchable: false,
            targets: -1
          }
        ],
        select: {
          style: 'multi+shift',
          selector: 'td:first-child'
        },
        order: [],
        scrollX: true,
        pageLength: 10,
        dom: 'QBlfrtip',
        lengthMenu: [
          [10, 25, 50, 100, 10000000000],
          [10, 25, 50, 100, 'All']
        ],
        stateSave: false,
        buttons: [{
            extend: 'copy',
            className: 'btn-default',
            text: copyButtonTrans,
            exportOptions: {
              columns: ':not(:first-child):not(:last-child)'
            }
          },
          {
            extend: 'csv',
            title: date,
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
              columns: ':not(:first-child):not(:last-child)'
            }
          },
          {
            extend: 'excel',
            title: date,
            className: 'btn-default',
            text: excelButtonTrans,
            exportOptions: {
              columns: ':not(:first-child):not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            title: date,
            className: 'btn-default',
            text: pdfButtonTrans,
            exportOptions: {
              columns: ':not(:first-child):not(:last-child)'
            }
          },
          {
            extend: 'print',
            title: date,
            className: 'btn-default',
            text: printButtonTrans,
            exportOptions: {
              columns: ':not(:first-child):not(:last-child)'
            }
          },
          {
            extend: 'colvis',
            className: 'btn-default',
            text: colvisButtonTrans,
            exportOptions: {
              columns: ':visible'
            }
          }
        ]
      });
      $.fn.dataTable.ext.classes.sPageButton = '';
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.userbutton').trigger("click");
      $('.userbutton').trigger("click");
      $('.profileButton').trigger("click");
      $('.profileButton').trigger("click");
      //   $('.bellbutton').trigger("click");
      //   $('.bellbutton').trigger("click");


      // $('.num').click(function () {
      //     var num = $(this);
      //     var text = $.trim(num.find('.txt').clone().children().remove().end().text());
      //     var telNumber = $('#telNumber');
      //     $(telNumber).val(telNumber.val() + text);
      // });
      // if("{{ Session::get('channel_status') }}" == 1) {
      //     $('#navbarNavDropdown_ul').css('display','flex');
      //     $('#navbarDropdown_ul').css('display','none');
      //     $('#navbarDropdown_lang').css('display','none');
      //     $('#idle_workspace').css('display','block');
      // }else{
      //     $('#navbarNavDropdown_ul').css('display','none');
      //     $('#idle_workspace').css('display','none');
      // }
      // check_session();
    });
    /*=========  start watch code  ==============*/
    function check_session() {
      var url = "{{ route('workspace.workspacecheck_session') }}";
      var conference_num = "{{ Session::get('conference_num') }}";
      $.ajax({
        type: "POST",
        headers: {
          'x-csrf-token': '{!! csrf_token() !!}'
        },
        dataType: "json",
        data: {
          conference_num: conference_num
        },
        url: url,
        success: function(data) {
          // console.log(data);
        }
      });
    }
    /*=========  end watch code  ==============*/
  </script>
  {{-- ========= Chat code (vedant) ============== --}}
  <script type="text/javascript">
    function auto_save() {
      var auto_save_phone = $('#auto_search').val();
      if (flag_auto_save == "1") {
        $.ajax({
          type: "GET",
          dataType: "json",
          data: {
            "auto_search": auto_save_phone
          },
          url: "{{ route('workspace.workspace_auto_save') }}",
        });
      }
    }

    /*function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }*/
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    $("a.download").click(function() {
      $("#dlDropDown").dropdown("toggle");
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var url = "{{ url('chat_management/chatcount') }}";
      var formData = "";
      $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
          $('#client_count').text('')


          if (data.chatcount != "0") {
            /*    console.log("sound");*/
            var mp3 =

              '<source src="{{ asset('/assets/juntos-607.mp3') }}" type="audio/mpeg">';

            document.getElementById("sound").innerHTML =
              '<audio autoplay="autoplay">' + mp3 + "</audio>";

            /*console.log("+++++++++++++hello4545++++++++++");*/
            $('#client_count').html(
              '<span class="badge badge-pill badge-primary badge-up badge-round chat-count" style="display: none;"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i></span>'
            );
          }


        }
      });

    });
  </script>
 {{-- ========= End Chat code (vedant) ============== --}}
 

{{-- code start by Pratibha --}}
<script type="text/javascript">
  function callbackNotify() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = "{{ url('commonnotifications') }}";
    var formData = "";
    $.ajax({
      type: 'get',
      url: url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: (data) => {
        console.log(data);

        $('#crmNoti').text('')
        console.log("++++++ Callback Notification ++++++");

        var mp3 = '<source src="{{ asset('/assets/juntos-607.mp3') }}" type="audio/mpeg">';
        document.getElementById("sound").innerHTML =
          '<audio autoplay="autoplay">' + mp3 + "</audio>";

        $('#crmNoti').html('<span class="badge badge-pill badge-danger badge-up">!</span>');

        $("#liveToastBtn").trigger("click");
        $('#popupclick').html(
          '<div class="toast-body"><p>' +
          data.commonnocountfirst.message + '</p></div>');

        $('#crmNotiTxt').append(
          '<a class="d-flex justify-content-between" href="{{ route('workspace.workspace_page') }}"><div class="media d-flex align-items-center"><div class="media-left pr-0"><div class="avatar mr-1 m-0"><i class="bx bxs-bell"></i></div></div><div class="media-body"><h6 class="media-heading"><span class="text-bold-500 bellbutton"><p>' +
          data.commonnocountfirst.message + '</p></span></h6></div></div></a>');


      }
    });
  }
</script>
{{-- code end by Pratibha --}}

  {{-- ========= Tickets code (vedant) ============== --}}
  <script type="text/javascript">
    Echo.join('workspacebroadcastjoin')
      .listen('WorkspaceBroadcast', (e) => {
        console.log(e);
        // console.log("its working ok or not");
      });
  </script>
  {{-- ========= End Tickets code (vedant) ============== --}}


  @yield('scripts')
  {{-- Bootstrap 4 Js --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}


  <script>
    var toastTrigger = document.getElementById("liveToastBtn");
    var toastLiveExample = document.getElementById("liveToast");
    if (toastTrigger) {
      toastTrigger.addEventListener("click", function() {
        var toast = new bootstrap.Toast(toastLiveExample);

        toast.show();
      });
    }
  </script>


<script type="text/javascript">
  function allnotification() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = "{{ url('allnotifications') }}";
    var formData = "";
    $.ajax({
      type: 'get',
      url: url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: (data) => {
        console.log(data);
        // console.log(data.invoice_id);
        $('#allnotify').text('')



        $.each(data.commonnocountfirst, function(index, commonnocountfirst) {
          console.log(commonnocountfirst);
          let newDate =  moment.utc(commonnocountfirst.created_at).format('MMMM Do YYYY, h:mm:ss a');


          $('#allnotify').append(`
            <a href="{{ URL::asset('/allnotifications/') }}/` + commonnocountfirst.id + `">
              <div class="primary_message" role="alert">
                <p>` + commonnocountfirst.message + `<hr class="mt-2 mb-2"> <span id="messageTime">` + newDate + `</span> </p>
              </div>
            </a>`);
        });
      }
    });
  }
</script>
  

  {{-- 16-Sept-2022 by Sourav --}}
  <script>
    $('.dropdown-toggle').dropdown()
    $('#myDropdown').on('show.bs.dropdown', function() {
      show.dropdown()
    })

    // 23-Jan-2023
    // offcanvas js for notification
    $("#readnotification").click(function() {
      $(".side-slide").animate({
        right: "0px"
      }, 200);
    });

    $("#cross").click(function() {
      $(".side-slide").animate({
        right: "-550px"
      }, 200);
    });

    document.getElementById("notice_box").style.boxShadow = "10px 20px 30px blue";
  </script>

  <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
  <?php
  $firebaseKey = getFirebaseKeys();
  if ($firebaseKey != 'settings_not_found') {
      $firebaseKey = explode(',', $firebaseKey);
      foreach ($firebaseKey as $key) {
          if (!trim($key)) {
              $firebaseKey = [];
              break;
          }
      }
  } else {
      $firebaseKey = [];
  }
  ?>

  <?php if(count($firebaseKey) > 1) { ?>
  <script>
    var firebaseConfig = {
      apiKey: "{{ $firebaseKey[0] }}",
      authDomain: "{{ $firebaseKey[1] }}",
      projectId: "{{ $firebaseKey[2] }}",
      storageBucket: "{{ $firebaseKey[3] }}",
      messagingSenderId: "{{ $firebaseKey[4] }}",
      appId: "{{ $firebaseKey[5] }}"
    };

    // const firebaseConfig = {
    //   apiKey: "AIzaSyBx_iJeNAFF7QheizyqFSN9Apajm5emlEs",
    //   authDomain: "aycent.firebaseapp.com",
    //   projectId: "aycent",
    //   storageBucket: "aycent.appspot.com",
    //   messagingSenderId: "848722884861",
    //   appId: "1:848722884861:web:39220dec10020dac4a2694"
    // };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
      console.log(window.location.origin + '/firebase-messaging-sw.js')
      navigator.serviceWorker.register(window.location.origin + '/firebase-messaging-sw.js')
        .then((registration) => {
          messaging.useServiceWorker(registration);
          messaging
            .requestPermission()
            .then(function() {
              return messaging.getToken()
            })
            .then(function(response) {
              console.log(response)
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url: '{{ route('store.token') }}',
                type: 'POST',
                data: {
                  token: response
                },
                dataType: 'JSON',
                success: function(response) {
                  //alert('Token stored.');
                },
                error: function(error) {
                  //alert(error);
                },
              });
            }).catch(function(error) {
              //alert(error);
            });
          // Request permission and get token.....
        });



      //startFCM();
    }
    startFCM();

    messaging.onMessage(function(payload) {
      let isTabActive;
      let url = (window.location.href).split('/');

      window.onfocus = function() {
        isTabActive = true;
      };

      window.onblur = function() {
        isTabActive = false;
      };

      if (window.isTabActive == false && url[url.length - 1] == 'agent-to-agent-chat') {
        const title = payload.notification.title;
        const options = {
          body: payload.notification.body,
          icon: payload.notification.icon,
        };
        let notification = new Notification(title, options);
        notification.onclick = function() {
          window.open(payload.notification.click_action, '_self');
        };
        console.log(payload)
      } else if (url[url.length - 1] != 'agent-to-agent-chat') {
        const title = payload.notification.title;
        const options = {
          body: payload.notification.body,
          icon: payload.notification.icon,
        };
        let notification = new Notification(title, options);
        notification.onclick = function() {
          window.open(payload.notification.click_action, '_self');
        };
        console.log(payload)
      }
    });
  </script>
  <?php } ?>

  {{-- 03-Jan-2023 by Sourav --}}
  @if (checkUserWebrtc() != 0)
    <script>
      const webrtc = document.getElementById("webrtc");
      window.ext_num = '0';
      window.login = document.getElementById("login_user");
      window.log_in = document.getElementById("log_in");
      window.logout = document.getElementById("logout_user");
      window.log_out = document.getElementById("log_out");

      webrtc.addEventListener("click", () => {
        login_user.style.display = "block";
      });

      $(function() {
        // $('.call_btn .call-control').each(function () {
        //   $(this).css('display', 'none')
        // })
        //
        // $('.dialPadDropdown .btn').css('display', 'none')
      })
    </script>
  @endif

  <div class="modal fade" tabindex="-1" id="jsSIPCallModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header"> --}}
        {{-- <h5 class="modal-title">Modal title</h5> --}}
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
        {{-- <span aria-hidden="true">&times;</span> --}}
        {{-- </button> --}}
        {{-- </div> --}}
        <div class="modal-body">
          <p class="text-center" style="font-size: 20px">Incoming Call.</p>
          <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-success mr-1" onclick="callResponse('answer')">Accept</button>
            <button class="btn btn-danger mr-1" onclick="callResponse('reject')">Reject</button>
            <button class="btn btn-warning" onclick="$('.transferDiv').removeClass('d-none')">Transfer</button>
          </div>
          <div class="d-none text-center transferDiv">
            <input type="number" class="form-control w-100 mb-1" id="transferNum">
            <button class="btn btn-primary w-100" onclick="callResponse('transfer')">Transfer Call</button>
          </div>
        </div>
        {{-- <div class="modal-footer"> --}}
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        {{-- </div> --}}
      </div>
    </div>
  </div>

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  {{-- <script type="module" src="https://aycentn7.aycent.com:5067/jssip/node_modules/jssip/lib/JsSIP.js"></script> --}}
  {{-- <script src="https://aycentn7.aycent.com:5067/jssip/public/assets/jssip/jsSIP.js"></script> --}}
  @if (checkUserWebrtc() > 0 && 1 == 0)
    <script type="module">
		//import JsSIP from "https://aycentn7.aycent.com:5067/jssip/node_modules/jssip/lib/JsSIP.js";
    let socket = new JsSIP.WebSocketInterface('wss://{{ trim(getWebrtcExtensionDetails($checkWebRtc)->domain_name) }}:8089/ws');
    console.log(socket)
    let configuration = {
      sockets  : [ socket ],
      uri      : 'sip:{{ getWebrtcExtensionPort($checkWebRtc) }}@'+'{{ trim(getWebrtcExtensionDetails($checkWebRtc)->domain_name) }}',
      password : '{{ trim(getWebrtcExtensionDetails($checkWebRtc)->password) }}',
      register: true
    };
    let coolPhone = new JsSIP.UA(configuration);

    log_in.addEventListener("click", () => {
      coolPhone.start();
      coolPhone.register()
    });

    log_out.addEventListener("click", ()=>{
      coolPhone.unregister()
      coolPhone.stop();
    })

    window.jsSIPLoginClicked = function () {
      coolPhone.start();
      coolPhone.register()
    }

    //log_out.addEventListener('click',function(){location.reload()});

    // coolPhone.start();
    // coolPhone.register()
    // console.log(coolPhone)
    // console.log('Is Registered ' + coolPhone.isRegistered())

    coolPhone.on('registered', function(e){
      console.log('REGISTERED')
      login.innerHTML = "<i class='bx bxs-circle'></i> <span>Extension No:- {{ getWebrtcExtensionPort($checkWebRtc) }} </span>"
      login.setAttribute("class", "login_style");
      login.style.backgroundColor = "#fff";
      login.style.color = "#003865";
      logout.style.display = "block";

      $('.call_btn .call-control').each(function () {
        $(this).css('display', 'block')
      })

      $('.dialPadDropdown .btn').css('display', 'contents')
    });

    coolPhone.on('disconnected', function(e){
      console.log('NOT CONNECTED')
      login.innerHTML = '<a href="#" class="login_style" id="log_in" onclick="jsSIPLoginClicked">Login</a>';
      logout.style.display = "none";


      $('.call_btn .call-control').each(function () {
        $(this).css('display', 'none')
      })

      $('.dialPadDropdown .btn').css('display', 'none')
    });

    window.rtcSession = 'invalid';
    coolPhone.on('newRTCSession', function(e)
    {
      window.rtcSession = e;
      let session = e.session;
      if(window.rtcSession.originator == 'remote') {
        //window.rtcSession.session.answer(options);
      }

      if(window.rtcSession.originator == 'local') {
        window.rtcSession = e;
      }

      if(session.direction === 'incoming') {
        if(!$('.transferDiv').hasClass('d-none')) {
          $('.transferDiv').addClass('d-none')
        }
        $('#transferNum').val('')
        $('#jsSIPCallModal').modal()
      }

      console.log(session)
      console.log(session.request)
    });

    // callButton.onclick = function() {
    //   var sipStr = 'sip:' + callToAddressStr.value;
    //   coolPhone.call(sipStr,options);
    // };
    // endButton.onclick = function() {
    //   rtcSession.session.terminate();
    //
    // };


    // Register callbacks to desired call events
    let eventHandlers = {
      'progress':   function(data){
        console.log('progress')
      },
      'failed':     function(data){ console.log(data) },
      'confirmed':  function(data){ console.log('confirmed') },
      'ended':      function(data){ console.log('ended') }
    };

    $('#dailpad_call_btn').on('click', function () {
      let options = {
        'eventHandlers'    : eventHandlers,
        'mediaConstraints' : { 'audio': true, 'video': false }
      };

      let session = coolPhone.call($('#telNumber').val(), options);
      console.log(session)
    })

    window.mute = false;
    window.hold = false;
    // window.ari_Channel = function (type) {
    //   if (type === 'Delete') {
    //     if(window.rtcSession != 'invalid') {
    //       console.log('Delete')
    //       window.rtcSession.session.terminate();
    //       window.rtcSession = 'invalid';
    //     }
    //   } else if (type === 'Mute') {
    //     if(window.rtcSession != 'invalid') {
    //       if(window.mute == false) {
    //         window.mute = true;
    //         $('#mute_btn i').removeClass('fa-microphone')
    //         $('#mute_btn i').addClass('fa-microphone-slash')
    //         window.rtcSession.session.mute();
    //       } else {
    //         window.mute = false;
    //         $('#mute_btn i').removeClass('fa-microphone-slash')
    //         $('#mute_btn i').addClass('fa-microphone')
    //         window.rtcSession.session.unmute();
    //       }
    //       console.log(window.rtcSession.session.isMuted());
    //     }
    //     //window.rtcSession.session.terminate();
    //   } else if (type === 'Hold') {
    //     if(window.rtcSession != 'invalid') {
    //       if(window.mute == false) {
    //         window.hold = true;
    //         $('#hold_btn i').removeClass('fa-pause')
    //         $('#hold_btn i').addClass('fa-play')
    //         window.rtcSession.session.hold();
    //       } else {
    //         window.hold = false;
    //         $('#hold_btn i').removeClass('fa-play')
    //         $('#hold_btn i').addClass('fa-pause')
    //         window.rtcSession.session.unhold();
    //       }
    //       console.log(window.rtcSession.session.isOnHold());
    //       //window.rtcSession.session.terminate();
    //     }
    //   }
    // }

    window.callResponse = function (type) {
      let callOptions = {
        mediaConstraints: {
          audio: true, // only audio calls
          video: false
        }
      };

      if(type === 'answer') {
        console.log('answer')
        console.log(window.rtcSession)
        let test = window.rtcSession.session.answer(callOptions);
        console.log(test)
      } else if(type === 'transfer') {
        let transferNum = $('#transferNum').val();

        let eventHandlers = {
          requestSucceeded: function (e) {
            console.log("Transfer Successful", e);
          },
          requestFailed: function (e) {
            console.log("Transfer Failed", e);
          },
          trying: function (e) {
            console.log("trying", e);
          },
          progress: function (e) {
            console.log("progress", e);
          },
          accepted: function (e) {
            console.log("accepted", e);
          },
          failed: function (e) {
            console.log("failed", e);
          },
        };
        try {
          window.rtcSession.session.refer(transferNum, {
            eventHandlers,
            mediaConstraints: {
              audio: true, // only audio calls
              video: false
            },
          });
        } catch (err) {
          console.log("Error " + err);
        }
      } else {
        console.log(window.rtcSession.session.terminate());
      }

      $('#jsSIPCallModal').modal('hide')
    }

	</script>
  @endif
  @stack('scripts')  

  {{-- Loader --}}
  {{-- <script src="https://cdn.jsdelivr.net/gh/AmagiTech/JSLoader/amagiloader.js"></script>
  <script>
    AmagiLoader.show();
    setTimeout(() => {
      AmagiLoader.hide();
    }, 3000);
  </script> --}}
  
  <script type="text/javascript">
    var namesearch1 = "";
    var path1 = "{{ route('indexsearch') }}";
   
    $('input#typesearchclass').typeahead({
      source: function(name1, process) {
        console.log(name1);
        return $.get(path1, {
            name1: name1
        }, function(data) {
            namesearch1 = data;
            return process(data);
        });
      },
      highlighter: function(items1, data) {
       var parts1 = items1.split('#'),
          html = '<span id class="sapceing" onclick=mysearchbynamesv("' + String(data.route) + '") data_id ="' + data
              .route + '">' +
              data.name +  '  -  ' + data.mainmenu + '</span>';
       return html;
      }
    });
    function mysearchbynamesv(mysearchbynamevalsv) {
      var url = '{{url('/')}}';
      var pathurl = url +'/'+ mysearchbynamevalsv;
      window.open(pathurl);
    }
</script>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
  tooltip.show()
})
</script>

{{-- Scroll to top button --}}
<script>
  const scrollTop = document.querySelector('#btn-scroll-top');

const displayButton = () => {
  window.addEventListener('scroll', () => {
    // console.log(window.scrollY);
  
    if (window.scrollY > 120) {
      scrollTop.style.display = "block";
    } else {
      scrollTop.style.display = "none";
    }
  });
};

const scrollToTop = () => {
  scrollTop.addEventListener("click", () => {
    window.scroll({
      top: 0,
      left: 0,
      behavior: 'smooth'
    }); 
    console.log(event);
  });
};

displayButton();
scrollToTop();
</script>

{{-- Bootstrap 5 Js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
{{-- <script src="{{ asset('assets/vendors/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendors/libs/i18n/i18n.js') }}"></script> --}}
<script src="{{ asset('assets/vendors/libs/typeahead-js/typeahead.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/menu.js') }}"></script>

<script src="{{ asset('assets/vendors/libs/bs-stepper/bs-stepper.js') }}"></script>
{{-- <script src="{{ asset('assets/vendors/libs/bootstrap-select/bootstrap-select.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/vendors/libs/select2/select2.js') }}"></script> --}}

<script type="text/javascript" src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>


 </body>
</html>
