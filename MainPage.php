<?php
session_start();
include ('Auth.php');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
--> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mainpage | Guess Employee Online System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Alertify -->
  <link rel="stylesheet" href="plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="plugins/alertify/alertify.js"></script>
  <script src="plugins/alertify/alertify.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="mainpage.php" class="logo">
      <i class="fa fa-building"></i> DII eSystem
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown tasks-menu">
            <a href="../../eEmpRequests/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-laptop"></i><span> 
            Employees PO</span>
            </a>
            <ul class="dropdown-menu"></ul>
          </li>

          <?php 
            if(trim($_SESSION['SESS_cJobClass'])=='Managerial' && trim($_SESSION['SESS_cArea'])=='HO'){
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="drkopdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_vDepartment'])=='HHR: HRD') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_cJobClass'])=='Executive') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';

             } elseif(trim($_SESSION['SESS_vSection'])=='Payroll, Planning & Budget' && trim($_SESSION['SESS_cJobClass'])=='Supervisory') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            }  
          ?>

          <li class="dropdown tasks-menu">
            <a href="../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="Mainpage_Payroll.php" class="dropdown-toggle"><i class="fa fa-calculator"></i><span> Payroll
            </span></a>
            <ul class="dropdown-menu"></ul>
          </li>

         <!--  <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-calculator"></i>
              <span class="label label-warning"></span>
              Payroll
            </a>
            <ul class="dropdown-menu">
               <li class="header">You have 10 notifications</li> 
              <li>
                  
                <ul class="menu">
                  <li>
                    <a href="#">
                      <center><i class="fa fa-share-square-o"></i> 
                        Payroll History
                      </center>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <center><i class="fa fa-clock-o"></i> 
                        Overtime Form
                      </center>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <center><i class="fa fa-file-powerpoint-o"></i> 
                        Payroll Inquiry Form
                      </center>
                    </a>
                  </li>

                </ul>
              </li>
               <li class="footer"><a href="#">View all</a></li> 
            </ul>
          </li> -->

         <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
                  <small><?php echo $_SESSION['SESS_cIDNumber']?></small> 
                </p>
              </li>

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="Logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><b><small><marquee scrolldelay="150"><?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
          <!-- Status -->
          <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <center><li class="header"> <font color="white">MAIN NAVIGATION</font></li></center>
        <!-- Optionally, you can add icons to the links -->

        <li><a href="Mainpage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="views/ChangePassword.php"><i class="fa fa-history"></i> <span>Change Password</span></a></li>
        <li><a href="views/GlobalApprovals.php"><i class="fa fa-check-circle-o"></i> <span>Online Approval(s)</span></a></li>
		    <li  title="How To Use EMS"><a href="documents/EMS_Manual.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>
        <span> How To Use EMS</span></a>
        </li>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome!
        <small>Guess Employee System @2018</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    

<div >
<!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('Image/banner1.jpg') center center;">
              <h3 class="widget-user-username"><?php echo $_SESSION['SESS_vName']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $_SESSION['SESS_vDesignation']; ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/user2-160x160.png" alt="User Avatar">
            </div>

            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_cIDNumber'];?></h5>
                    <span class="description-text">ID NUMBER</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_vDepartment'];?></h5>
                    <span class="description-text">DEPARTMENT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_vDesignation'];?></h5>
                    <span class="description-text">DESIGNATION</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
        </div>            <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <h4>Reminder!</h4>
          <p>1.) Be sure to save your Approvers on Online Approval(s) page before filing!</p>
          <p>2.) Ensure that all your approvers are updated.</p>
          <!-- <p>3.) Overtime Application Module is now <b> LIVE </b>! You may file your Overtime Application under <i>Payroll Inquiry Options</i></p> -->
          <!-- <p>3.) All Employee Related Application like <b><i>Hold Notice</i></b>, <b><i>Manpower Request</i></b> and <b><i>Store Transfer</i></b> 
                  will be filed and processed on the old running system.</p> -->
        </div>
      </section>

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Raymir Kristoffer A. Pedrique
    </div>
    <!-- Default to the left -->
    <!-- <strong>Copyright &copy; <a href="../estaffmngt/accounts/usr/views/esm_dashboard.php"> -->
         <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved. 
       <!-- Guess? IT Department 2018.</a></strong> All rights reserved. -->
    <!-- <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved. -->
  </footer>


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>