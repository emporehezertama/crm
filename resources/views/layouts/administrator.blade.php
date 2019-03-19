
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="{{ get_setting('description') }}">
  <meta name="keywords" content="{{ get_setting('title') }}">
  <meta name="author" content="{{ get_setting('author') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - {{ get_setting('title') }}</title>
  <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/animate/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-modal.css') }}?{{date('YmdHis')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-callout.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style-custom.css') }}?{{date('YmdHis')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/pickers/daterange/daterange.css') }}">

  
  <!-- END Page Level CSS-->
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark bg-primary navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      
      @include('layouts.nav')

    </div>
  </nav>
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow menu-border"
  data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="app-content content">
   @yield('content')
  </div>

  <div class="modal animated slideInRight text-left custom_modal" id="custom_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel76" aria-hidden="true">
    <div class="modal-dialog mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title" id="myModalLabel76">@yield('custom_modal_title')</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @yield('custom_modal_content')
        </div>
      </div>
    </div>
  </div>

  <div class="modal animated slideInRight text-left custom_modal" id="custom_modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel76" aria-hidden="true">
    <div class="modal-dialog mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title" id="myModalLabel76">@yield('custom_modal_title_edit')</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @yield('custom_modal_content_edit')
        </div>
      </div>
    </div>
  </div>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">{{ get_setting('footer_description') }}</span>
    </p>
  </footer>
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/jquery.priceformat.min.js') }}"></script>
  <script src="{{ asset('app-assets/vendors/js/bootbox.min.js') }}"></script>

  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}" type="text/javascript"></script>

  <script src="{{ asset('js/general.js') }}?ran={{date('YmdHis')}}" type="text/javascript"></script>
  
  @include('layouts.alert')
  
  @yield('js')

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</body>
</html>