<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TATC ActivitesCheck System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <?php echo link_tag('asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
    <!-- Font Awesome -->
    <?php echo link_tag('asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>
    <!-- Ionicons -->
    <?php echo link_tag('asset/bower_components/Ionicons/css/ionicons.min.css'); ?>
    <!-- DataTables -->
    <?php echo link_tag('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>
    <!-- Theme style -->
    <?php echo link_tag('asset/dist/css/AdminLTE.min.css'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <?php echo link_tag('asset/dist/css/skins/_all-skins.min.css'); ?>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/dist/js/app.min.js" type="text/javascript">
    </script>
    <!-- Google Font -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- sweet alert-->
      
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <style type="text/css">
      .fr{color: red;}
      input[type=radio] {
      border: 0px;
      width: 70%;
      height: 1.5em;
      }
      </style>
      
    </head>
    <body class="hold-transition skin-red sidebar-mini">
      <div class="wrapper">
        <!-- devbanban.com -->
        <header class="main-header">
          <!-- Logo -->
          <a href="<?php echo site_url('');?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>TATC</b> ActivitiesCheck</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>TATC</b> ActivitiesCheck</span>
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
                    <!-- <img src="<?php // echo base_url('uploads/'.$_SESSION['img']);?>" class="user-image" alt="User Image"> -->
                    <span class="hidden-xs"><?php // echo $_SESSION['mem_name'];?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <!--  <img src="<?php // echo base_url('uploads/'.$_SESSION['img']);?>" class="img-circle" alt="User Image"> -->
                      <p>
                        <?php //echo $_SESSION['mem_name'];?>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="" class="btn btn-primary btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่??');" class="btn btn-danger btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <!-- <img src="<?php // echo base_url('uploads/'.$_SESSION['img']);?>" class="img-circle" alt="User Image"> -->
              </div>
              <div class="pull-left info">
                <p><?php // echo $_SESSION['mem_name'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>

              <?php if(empty($_SESSION['teacher_id'])){ ?>
                <li><a href="<?php echo site_url('');?>"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
              <li><a href="<?php echo site_url('login');?>"><i class="fa fa-sign-in"></i> <span>เข้าสู่ระบบ</span></a></li>
            <?php }else{ ?>

              <li><a href="<?php echo site_url('teacher');?>"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>

              <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-line-chart"></i> <span>รายงาน</span></a></li>

              <li><a href="<?php echo site_url('teacher/updateprofile');?>"><i class="fa fa-edit"></i> <span>แก้ไขโปรไฟล์</span></a></li>

              <li><a href="<?php echo site_url('teacher/updatepassword');?>"><i class="fa fa-edit"></i> <span>แก้ไขรหัสผ่าน</span></a></li>

              <li><a href="<?php echo site_url('login/logout');?>" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่??');"><i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span></a></li>
            <?php } ?>
            </ul>
          </section>
          <!-- /.sidebar -->
          <!-- devbanban.com -->
        </aside>