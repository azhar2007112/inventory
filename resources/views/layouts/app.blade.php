<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{!empty($header_title)? $header_title : ''}} - HarvestOfHeart </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/flag-icon-css/css/flag-icons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{('assets/vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets/css/vertical-light-layout/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
@yield('style')

</head>



<div class="container-scroller">

  @include('sweetalert::alert')

  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="{{url('home.png')}}" style="height:60px;width:60px; border-radius:100%;" alt="logo" class="logo-dark" />
        Inventory
      </a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome stellar dashboard!</h5>
      <ul class="navbar-nav navbar-nav-right">
        <form class="search-form d-none d-md-block" action="#">
          <i class="icon-magnifier"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>
        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-speech"></i>
            <span class="count">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-start me-2">You have 7 unread mails </p>
              <span class="badge badge-pill badge-primary float-end">View all</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('assets/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('assets/images/faces/face12.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('assets/images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
          </div>
        </li>
      
        <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle ms-2" src="{{url('assets/images/faces/face8.jpg')}}" alt="Profile image"> <span class="font-weight-normal"> {{Auth::user()->name}} </span></a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{url('assets/images/faces/face8.jpg')}}" alt="Profile image">
              <p class="mb-1 mt-3">Henry Klein</p>
              <p class="font-weight-light text-muted mb-0">kleinhenry@gmail.com</p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
            <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>




  <div class="container-fluid page-body-wrapper">

    @include('layouts.header')

    <div class="main-panel">
    <div class="content-wrapper">
      @yield('content')
    </div>
  
  @include('layouts.footer')
</div>
<!-- main-panel ends -->
</div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{url('assets/vendors/chart.js/chart.umd.js')}}"></script>
<script src="{{url('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('assets/vendors/moment/moment.min.js')}}"></script>
<script src="{{url('assets/vendors/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('assets/vendors/chartist/chartist.min.js')}}"></script>
<script src="{{url('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{url('assets/js/jquery.cookie.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{url('assets/js/off-canvas.js')}}"></script>
<script src="{{url('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{url('assets/js/misc.js')}}"></script>
<script src="{{url('assets/js/settings.js')}}"></script>
<script src="{{url('assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{url('assets/js/dashboard.js')}}"></script>


@yield('script')

</body>
</html>
