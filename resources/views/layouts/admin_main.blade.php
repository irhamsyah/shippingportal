<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shipping Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Logo Icon -->
  <link rel="shortcut icon" href="{{ asset('img/logo-coba-150x108.png') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Shipping Portal</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle fa-2x"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ 'Andy Bastian' }}
                </h3>
                <p class="text-sm">{{ 'Call me whenever you can...' }}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ '4 Hours Ago' }}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            <a href="/reset" class="dropdown-item dropdown-footer">Change Password</a>
          <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('img/logo-coba-white-150x108.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Shipping Portal</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2" style="font-size:13px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/adm_tracking" class="nav-link active">
              <i class="nav-icon fa fa-ship"></i>
              <p>
                List Tracking
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item" style="border-bottom:1px solid">
              <a href="/adm_customer" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Customer</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="/adm_agent" class="nav-link">
                  <i class="fa fa-male nav-icon"></i>
                  <p>Agent Daerah</p>
                </a>
              </li>
              <li class="nav-item" style="border-bottom:1px solid">
                <a href="/adm_bank_account" class="nav-link">
                  <i class="fa fa-university nav-icon"></i>
                  <p>Bank Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adm_pelayaran" class="nav-link">
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Pelayaran</p>
                </a>
              </li>
              <li class="nav-item" style="border-bottom:1px solid">
                <a href="/adm_tarif" class="nav-link">
                  <i class="fa fa-credit-card nav-icon"></i>
                  <p>Tarif</p>
                </a>
              </li>
              <li class="nav-item" style="border-bottom:1px solid">
                <a href="/adm_consignee" class="nav-link">
                  <i class="fa fa-female nav-icon"></i>
                  <p>Consignee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adm_vendor_truck" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>
              <li class="nav-item" style="border-bottom:1px solid">
                <a href="/adm_trucking" class="nav-link">
                  <i class="fa fa-truck nav-icon"></i>
                  <p>Trucking Type</p>
                </a>
              </li><li class="nav-item" style="border-bottom:1px solid">
                <a href="/adm_location" class="nav-link">
                  <i class="fa fa-location-arrow nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-newspaper"></i>
              <p>
                News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/adm_news" class="nav-link">
                <i class="fa fa-bars nav-icon"></i>
                <p>List News</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="/adm_news_category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adm_news_img" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>News Images</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-bag"></i>
              <p>
                Packages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/adm_packages" class="nav-link">
                  <i class="far fa-bars nav-icon"></i>
                  <p>List Packages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adm_packages_category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Packages Category</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-arrow-circle-left"></i>
              <p>{{ __('Logout') }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Shipping Portal</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Ckeditor -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script>

  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "responsive": true,
      "autoWidth": false,
      "lengthMenu": [ 25, 50, 100 ],
      "pageLength":50
    });
    $("#example2").DataTable({
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "autoWidth": false,
      "lengthMenu": [ 25, 50, 100 ],
      "pageLength":50
    });

    //set ckeditor
    CKEDITOR.replace( 'inputText1' );
    CKEDITOR.replace( 'inputTitle1' );
    CKEDITOR.replace( 'inputText2' );
    CKEDITOR.replace( 'inputTitle2' );
});
    $('#modal-edit-newscategory').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var category = $(e.relatedTarget).data('category');
      $(e.currentTarget).find('input[name="inputNewsCategory"]').val(category);
      $(e.currentTarget).find('input[name="inputIdCategory"]').val(id);
    });

    $('#modal-edit-news').on('show.bs.modal', function(e) {
      var NewsId = $(e.relatedTarget).data('id');
      var img_title = $(e.relatedTarget).data('img_title');
      var text = $(e.relatedTarget).data('text');
      var title = $(e.relatedTarget).data('title');
      var id_category = $(e.relatedTarget).data('id_category');

      CKEDITOR.instances['inputTitle1'].setData(title);
      CKEDITOR.instances['inputText1'].setData(text);
      $(e.currentTarget).find('select[name="inputIdCategory"]').val(id_category);
      $(e.currentTarget).find('input[name="inputImgOld"]').val(img_title);
      $(e.currentTarget).find('input[name="inputIdNews"]').val(NewsId);
    });

    $('#modal-edit-newsimage').on('show.bs.modal', function(e) {
      var imageId = $(e.relatedTarget).data('id');
      var img = $(e.relatedTarget).data('img');
      var id_news = $(e.relatedTarget).data('id_news');

      $(e.currentTarget).find('select[name="inputTitleNews"]').val(id_news);
      $(e.currentTarget).find('input[name="inputImgOld"]').val(img);
      $(e.currentTarget).find('input[name="inputIdNewsImg"]').val(imageId);
    });

    $('#modal-edit-customer').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var codecust = $(e.relatedTarget).data('codecust');
      var namecust = $(e.relatedTarget).data('namecust');
      var addressinv = $(e.relatedTarget).data('addressinv');
      var address = $(e.relatedTarget).data('address');
      var namecust = $(e.relatedTarget).data('namecust');
      var idcity = $(e.relatedTarget).data('idcity');
      var postal = $(e.relatedTarget).data('postal');
      var telp = $(e.relatedTarget).data('telp');
      var fax = $(e.relatedTarget).data('fax');
      var npwp = $(e.relatedTarget).data('npwp');
      var pkpno = $(e.relatedTarget).data('pkpno');
      var desccustomer = $(e.relatedTarget).data('desccustomer');
      var payment = $(e.relatedTarget).data('payment');
      var nameperson = $(e.relatedTarget).data('nameperson');
      var phoneperson = $(e.relatedTarget).data('phoneperson');
      var emailperson = $(e.relatedTarget).data('emailperson');
      var faxperson = $(e.relatedTarget).data('faxperson');

      $(e.currentTarget).find('input[name="inputIdCustomer"]').val(id);
      $(e.currentTarget).find('input[name="inputCostumerCode"]').val(codecust);
      $(e.currentTarget).find('input[name="inputCostumerName"]').val(namecust);
      $(e.currentTarget).find('textarea[name="inputAddressInvoice"]').val(addressinv);
      $(e.currentTarget).find('textarea[name="inputAddress"]').val(address);
      $(e.currentTarget).find('select[name="inputIdCity"]').val(idcity);
      $(e.currentTarget).find('input[name="inputPostal"]').val(postal);
      $(e.currentTarget).find('input[name="inputTelp"]').val(telp);
      $(e.currentTarget).find('input[name="inputFax"]').val(fax);
      $(e.currentTarget).find('input[name="inputNPWP"]').val(npwp);
      $(e.currentTarget).find('input[name="inputPkp"]').val(pkpno);
      $(e.currentTarget).find('textarea[name="inputCustomerDesc"]').val(desccustomer);
      $(e.currentTarget).find('input[name="inputTOP"]').val(payment);
      $(e.currentTarget).find('input[name="inputPersonName"]').val(nameperson);
      $(e.currentTarget).find('input[name="inputPersonEmail"]').val(phoneperson);
      $(e.currentTarget).find('input[name="inputPersonPhone"]').val(phoneperson);
      $(e.currentTarget).find('input[name="inputPersonFax"]').val(faxperson);
    });

    $('#modal-edit-agent').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var codeagent = $(e.relatedTarget).data('codeagent');
      var nameagent = $(e.relatedTarget).data('nameagent');
      var addressinv = $(e.relatedTarget).data('addressinv');
      var address = $(e.relatedTarget).data('address');
      var namecust = $(e.relatedTarget).data('namecust');
      var idcity = $(e.relatedTarget).data('idcity');
      var postal = $(e.relatedTarget).data('postal');
      var telp = $(e.relatedTarget).data('telp');
      var fax = $(e.relatedTarget).data('fax');
      var npwp = $(e.relatedTarget).data('npwp');
      var pkpno = $(e.relatedTarget).data('pkpno');
      var descagent = $(e.relatedTarget).data('descagent');
      var payment = $(e.relatedTarget).data('payment');
      var nameperson = $(e.relatedTarget).data('nameperson');
      var phoneperson = $(e.relatedTarget).data('phoneperson');
      var emailperson = $(e.relatedTarget).data('emailperson');
      var faxperson = $(e.relatedTarget).data('faxperson');

      $(e.currentTarget).find('input[name="inputIdAgent"]').val(id);
      $(e.currentTarget).find('input[name="inputAgentCode"]').val(codeagent);
      $(e.currentTarget).find('input[name="inputAgentName"]').val(nameagent);
      $(e.currentTarget).find('textarea[name="inputAddressInvoice"]').val(addressinv);
      $(e.currentTarget).find('textarea[name="inputAddress"]').val(address);
      $(e.currentTarget).find('select[name="inputIdCity"]').val(idcity);
      $(e.currentTarget).find('input[name="inputPostal"]').val(postal);
      $(e.currentTarget).find('input[name="inputTelp"]').val(telp);
      $(e.currentTarget).find('input[name="inputFax"]').val(fax);
      $(e.currentTarget).find('input[name="inputNPWP"]').val(npwp);
      $(e.currentTarget).find('input[name="inputPkp"]').val(pkpno);
      $(e.currentTarget).find('textarea[name="inputAgentDesc"]').val(descagent);
      $(e.currentTarget).find('input[name="inputTOP"]').val(payment);
      $(e.currentTarget).find('input[name="inputPersonName"]').val(nameperson);
      $(e.currentTarget).find('input[name="inputPersonEmail"]').val(phoneperson);
      $(e.currentTarget).find('input[name="inputPersonPhone"]').val(phoneperson);
      $(e.currentTarget).find('input[name="inputPersonFax"]').val(faxperson);
    });
</script>
</body>
</html>
