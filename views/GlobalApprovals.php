<?php
session_start();
include('Auth.php');
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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Alertify -->
  <link rel="stylesheet" href="../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="../plugins/alertify/alertify.js"></script>
  <script src="../plugins/alertify/alertify.min.js"></script>
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
    <a href="../mainpage.php" class="logo">
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
                <a href="../../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_vDepartment'])=='HHR: HRD') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_cJobClass'])=='Executive') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';

             } elseif(trim($_SESSION['SESS_vSection'])=='Payroll, Planning & Budget' && trim($_SESSION['SESS_cJobClass'])=='Supervisory') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
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
            <a href="../Mainpage_Payroll.php" class="dropdown-toggle"><i class="fa fa-calculator"></i><span> Payroll
            </span></a>
            <ul class="dropdown-menu"></ul>
          </li>

        <!-- 
          <li class="dropdown tasks-menu">
            <a href="../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-laptop"></i><span> Employees PO</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
            <ul class="dropdown-menu"></ul>
          </li> 
        -->

         <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
                  <small><?php echo $_SESSION['SESS_cIDNumber']?></small>
                </p>
              </li>

              <!-- Menu Body 
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="../Logout.php" class="btn btn-default btn-flat">Sign out</a>
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

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
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
          <li><a href="../Mainpage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
          
          <li><a href="ChangePassword.php"><i class="fa fa-history"></i> <span>Change Password</span></a></li>
          
          <li><a href="GlobalApprovals.php"><i class="fa fa-check-circle-o"></i> <span>Online Approval(s)</span></a></li>

          <li  title="How To Use EMS"><a href="../documents/EMS_Manual.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>
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
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Global Approvals</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Department approver options</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start  <select class="form-control" onchange="GetQTY(this.value); GetSize(this.value);">-->
            <form method="POST" action="../model/s_SaveApprovers.php" role="form">
              <div class="box-body">
                
                <?php
                include('../config/dbconfig-SQL.php');
                $i = 1;
                while ($i <= $_SESSION['SESS_nU_MaxApprovers'])
                {
                $qryApprovers = "SELECT distinct FullName from vOnlineGlobalApprover where vDesignation = '" . trim($_SESSION['SESS_vDesignation']) . "' and cdeptcode = left('" . $_SESSION['SESS_vDepartment'] . "',3) and nLevel = " . $i; 
                      echo '<div class="form-group">';
                      echo '<label>Approver ' . $i . '</label>';
                      echo '<select class="form-control" name="App' . $i . '">';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $AppName  = $rowA['FullName'];

                          $qryCheckifDefault = "select * from tOnlineGlobalApproval where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' and nLevel = " . $i ;
                          echo $qryCheckifDefault;
                          $rsltCheckifDefault=sqlsrv_query($conn, $qryCheckifDefault);
                          if (sqlsrv_has_rows($rsltCheckifDefault))
                          {
                            $rowCheckifDefault = sqlsrv_fetch_array($rsltCheckifDefault);
                            if (trim($rowCheckifDefault['vAppName'])==trim($AppName))
                                {
                                  echo '<option selected="selected">' . $AppName . '</option>';
                                }
                            else
                               {
                                  echo '<option>' . $AppName . '</option>';
                               }
                          }
                          else
                          {
                            echo '<option>' . $AppName . '</option>';
                          }

                        }
                      echo '</select>';
                      echo '</div>';
                      $i = $i + 1;
                }
                ?>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
            <button type="submit" class="btn btn-primary">Save Approvers</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
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
    <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->
          <?php
          if (isset($_SESSION['U_ErrorMessage']))
          {
            echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>'; 
            unset($_SESSION['U_ErrorMessage']);
          }
          if (isset($_SESSION['U_ValidMessage']))
          {
            echo '<script>alertify.success(\'' . $_SESSION['U_ValidMessage'] . '\');</script>'; 
            unset($_SESSION['U_ValidMessage']);
          }

          ?>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>