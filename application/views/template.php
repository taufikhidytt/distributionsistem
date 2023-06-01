
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logo.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amali's Shoes | <?= $title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/skins/_all-skins.min.css">

  <!-- jQuery 3 -->
  <script src="<?= base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="<?= base_url()?>assets/logo/logo.png" alt="logo" width="30px">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="<?= base_url()?>assets/logo/logo.png" alt="logo" width="30px">
        <b>Amali's</b> Shoes
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if($this->checkusers->users_login()->photo == null){?>
                <img src="<?= base_url()?>assets/upload/users/nophoto.png" class="user-image" alt="User Image">
              <?php }else{?>
                <img src="<?= base_url('assets/upload/users/'.$this->checkusers->users_login()->photo)?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?= $this->checkusers->users_login()->nama_lengkap;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if($this->checkusers->users_login()->photo == null){?>
                  <img src="<?= base_url()?>assets/upload/users/nophoto.png" class="user-image" alt="User Image">
                <?php }else{?>
                  <img src="<?= base_url('assets/upload/users/'.$this->checkusers->users_login()->photo)?>" class="user-image" alt="User Image">
                <?php } ?>
                <p>
                  <span class="text-bold"><?= $this->checkusers->users_login()->nama_lengkap;?></span>
                  <small><?= $this->checkusers->users_login()->level;?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?= base_url('auth/logout')?>" class="btn btn-danger btn-flat">
                    <i class="fa fa-sign-out"></i> Logout
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($this->checkusers->users_login()->photo == null){?>
            <img src="<?= base_url()?>assets/upload/users/nophoto.png" class="user-image" alt="User Image">
          <?php }else{?>
            <img src="<?= base_url('assets/upload/users/'.$this->checkusers->users_login()->photo)?>" class="user-image" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p>
            <?= $this->checkusers->users_login()->nama_lengkap;?><br>
            Tim <?= $this->checkusers->users_login()->level;?>
          </p>
            <i class="fa fa-circle text-success"></i> Online
        </div>
      </div><br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : null?>"><a href="<?= base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li>
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <?php if($this->checkusers->users_login()->level == 'adminitrasi' OR $this->checkusers->users_login()->level == 'superadmin'){?>
          <li class="<?= $this->uri->segment(1) == 'users' ? 'active' : null?>"><a href="<?= base_url('users')?>"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $contents?>
    </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong class="">AMALI'S SHOES Copyright &copy; 2023.</strong> Build With 	&hearts; <b><a href="https://taufikhidytt.com/" target="_blank">Taufik Hidayat</a></b>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url()?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/admin/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
