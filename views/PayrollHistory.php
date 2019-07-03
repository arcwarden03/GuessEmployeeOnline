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
      <i class="fa fa-calculator"></i><strong> Payroll</strong>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
       

    <?php include('Header.php') ?>

    
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <strong>Payroll History</strong>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Payroll History</a></li>
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
              <h3 class="box-title">Payroll Inquiry</h3>
            </div>


              <div class="box-body">
                 Select Cutoff:
              <select id="cMonth" onchange="LoadPayrollDetails()">
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
              </select>   
              <select id="Cutoff" onchange="LoadPayrollDetails()">
                <option>First Half</option>
                <option>Second Half</option>
              </select>      
              <select id="cYear" onchange="LoadPayrollDetails()">
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
              </select>     
              <br><br>

              <div id="PayrollDetails">
              </div>

              </div>
              <!-- /.box-body -->


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

  <script>
    function LoadPayrollDetails()
    {
      var cMonth= $('#cMonth').val();
      var Cutoff= $('#Cutoff').val();
      var cYear= $('#cYear').val();

      cMonth= cMonth.substring(0,3);
      if(Cutoff=='First Half')
      {
        Cutoff = '1Pay';
      }
      else
        {if (Cutoff=='Second Half')
            {
              Cutoff = '2Pay';
            }}

     $('#PayrollDetails').load('../model/s_LoadCutoff.php', {CutOff: cMonth+Cutoff+cYear});
    }
  </script>
</body>
</html>