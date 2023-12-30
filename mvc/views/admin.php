<?php
if((int)$_SESSION['user']['gr_id'] != 1){
  redirectTo();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | <?= $data['title'] ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= _PUBLIC_PATH . '/admin/' ?>plugins/summernote/summernote-bs4.min.css">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= _PUBLIC_PATH . '/admin/' ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= _WEB_ROOT_PATH ?>" class="nav-link">Về trang người dùng</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= _WEB_ROOT_PATH . '/admin' ?>" class="brand-link">
      <img src="<?= _PUBLIC_PATH . '/admin/' ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản lý</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://png.pngtree.com/png-vector/20190629/ourmid/pngtree-office-work-user-icon-avatar-png-image_1527655.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/admin' ?>" class="nav-link <?php if($data['page'] == 'dashboard/list') echo 'active' ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Thống kê</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/group' ?>" class="nav-link <?php if($data['page'] == 'groups/list') echo 'active' ?>">
              <i class="fas fa-users nav-icon"></i>
              <p> Nhóm người dùng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/user' ?>" class="nav-link <?php if($data['page'] == 'users/list') echo 'active' ?>">
              <i class="fas fa-user nav-icon"></i>
              <p> Người dùng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/category' ?>" class="nav-link <?php if($data['page'] == 'category/list') echo 'active' ?>">
              <i class="fab fa-elementor nav-icon"></i>
              <p>Danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/product' ?>" class="nav-link <?php if($data['page'] == 'product/list') echo 'active' ?>">
            <i class="fas fa-boxes  nav-icon"></i>
              <p>Sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo _WEB_ROOT_PATH . '/bill/show_bill' ?>" class="nav-link <?php if($data['page'] == 'bill/list') echo 'active' ?>">
            <i class="fas fa-tasks nav-icon"></i>
              <p>Đơn hàng</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $data['title'] ?? ''?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH ?>">Home</a></li>
              <li class="breadcrumb-item active"><a class="text-capitalize" href="<?= _WEB_ROOT_PATH . '/' . $data['title'] ?>"><?= $data['title'] ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           <?php 
            if(file_exists(VIEW_PATH.'pages/admin/'.$data['page'].'.php')){
                require_once './mvc/views/pages/admin/'.$data['page'].'.php';
            }else{
                echo '<h1>khong co duong dan '.VIEW_PATH.'pages/admin/'.$data['page'].'.php'.' <h1>';
            }
           ?> 
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/moment/moment.min.js"></script>
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= _PUBLIC_PATH . '/admin/' ?>dist/js/pages/dashboard.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<?php
  if (isset($data['js'])) {

    foreach ($data['js'] as $item) {
  ?>
      <script src="<?php echo _PUBLIC_PATH . '/admin/assets/js/' . $item . '.js' ?>"></script>
  <?php
    }
  }

  ?>
  <script>
    setTimeout(function() {
      document.getElementById("toast-success").classList.add("d-none");
    }, 3000);
  </script>
</body>
</html>
