<?php
  session_start();
  include ('../../Auth.php');
?>
<!DOCTYPE html>
<html>
<!--START OF HEAD-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Overtime Application Form | Guess Employee Online System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Alertify -->
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="../../../plugins/alertify/alertify.js"></script>
  <script src="../../../plugins/alertify/alertify.min.js"></script>
 
</head>
<!--END OF HEAD-->

<!--START OF BODY-->

<body class="hold-transition skin-blue sidebar-mini" onload="loadReasonT()">
<div class="wrapper">

<!--START OF TOP HEADEAR-->
  <header class="main-header">

    <!-- Logo -->
    <a href="../../../mainpage.php" class="logo">
      <i class="fa fa-building"></i> DII eSystem
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- TOP HEADER LINKS -->
    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

    <li class="dropdown tasks-menu">
            <a href="../../../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Employee Relations</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown tasks-menu">
            <a href="../../../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown tasks-menu">
            <a href="../../../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../../../dist/img/user2-160x160.png" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
      </a>
    <ul class="dropdown-menu">
          
    <li class="user-header">
    <img src="../../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

     <p>
      <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
      <small><?php echo $_SESSION['SESS_cIDNumber']?></small> 
      </p>
      </li>

      </li>
       <li class="user-footer">
   
      <div class="pull-right">
      <a href="../../../Logout.php" class="btn btn-default btn-flat">Sign out</a>
      </div>
      </li>
      </ul>
      </li>
         
        </ul>
      </div>
    </nav>
  </header>
<!-- END OF TOP HEADER-->

<!--START OF SIDEBAR NAVIGATION-->
<aside class="main-sidebar">
<section class="sidebar">
   
  <div class="user-panel">
  <div class="pull-left image">
  <img src="../../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
  </div>
   <div class="pull-left info">
   <p><b><small><marquee scrolldelay="150"><?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
   
   <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
   </div>
   </div>
 

      <ul class="sidebar-menu" data-widget="tree">
        <center><li class="header">MAIN NAVIGATION</li></center>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../../../Mainpage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-history"></i> <span>Change Password</span></a></li>
        <li><a href="../../../views/GlobalApprovals.php"><i class="fa fa-check-circle-o"></i> <span>Online Approval(s)</span></a></li>

          <li class="treeview">
          <a href="#"><i class="fa fa-calculator"></i> <span>Payroll Inquiry</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
          <li title="Payroll History"><a href="../../../views/PayrollHistory.php"><i class="fa fa-share-square-o"></i>Payroll History</a></li>

          <li class="treeview">
          <a href="#"><i class="fa fa-clock-o"></i> <span>Overtime Form</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
          <li title="Overtime Form"><a href="OTPasscode.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>
          <li title="Overtime Form"><a href="OTPendArcHO.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li></ul>


          <li class="treeview">
          <a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          
          <ul class="treeview-menu">
          <li title="Payroll Inquiry Form"><a href="../../../payroll/rankandfile/PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>
          <li title="Payroll Inquiry Form"><a href="../../../payroll/rankandfile/PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>


          </ul>
          </li>

      </ul>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed"  >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<!-- Breadcrumb -->
    <section class="content-header">
    <h1><i class ="fa fa-gears"></i> Overtime Reason Encoder</h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Reason Encoder</li>
    </ol>
    </section>
<!-- Breadcrumb -->

  <section class="content" id="sectionID">
  <!--left box -->
 
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reason Details</h3>
            </div>
            <div class="box-body">

              <div class="col-md-7">
              <label>Department / Store : </label>
                    <div class="form-group">
                      <select class="form-control select" id="rSelectx" name="rSelect">
                      <?php include('../model/getDepts.php') ?>
                      </select>
                    </div>
              </div>

              <div class="col-md-12">
              <label>Reason : </label>
                    <div class="form-group">
                          <input id="tReasonx" name="tPosx" type="text" class="form-control">
                    </div>
              </div>

              <div class="col-md-12">
            
                  <br>
                  <div class="col-md-12 pull-left">
                    <input type="input" style="display:none;" id="isValid" name="isValidx" >
                    <button type="button" class="btn btn-block btn-primary btn-sm" onclick="SubmitReason()" id="btnaddDet"><i class="fa fa-plus"></i> Add Reason</button>
                  </div>

                  <br>
                  <br>
                  <br>
                  </div>  
           

            </div>  
        </div>  
    </div>  
 
 

<div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Reason Table</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
          </div>
 
          <div class="box-body">
            <table id="tblReasonx" class="table table-bordered table-hover"> 
              <thead>  
                <tr> 
                  <th>Department</th> 
                  <th>Reason</th> 
                </tr> 
              </thead>     
              <tbody id="tblReason"></tbody>
       
             </table>
 
          </div>

        </div>  
      </div>
      

 


      </section>

      <!-- end section left -->
     </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved.
</footer>



 

<!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../../bower_components/moment/min/moment.min.js"></script>
<script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 
 <!-- time picker -->
<script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>

 <!-- DataTables -->
 <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function (){
    //Date picker
    $('#reservation').datepicker({
      autoclose: true
    })
  })

  $(function (){
      $('.timepicker').timepicker({
        showInputs: false
      });
 
  });
 

  function loadReasonT(){
    $('#tblReason').load('../model/getReasonx.php');
  }

   

  function SubmitReason(){
    var Deptx = $('#rSelectx').val();
    var Reasonx = $('#tReasonx').val();

      if (Deptx==''){
            alertify.success('No selected department!');
            return;
      }

      if (Reasonx==''){
            alertify.success('No reason been entered!');
            return;
      }


      $.ajax({
              type: "post",
              url :"../model/AddReason.php", //dito ka magsave ng date
              data: { 
                  Deptz: Deptx,
                  Reasonz: Reasonx,
                    },
               success: function(isOK){ 
                          if(MirTrim(isOK)=='Reason Successfully Added!')
                          {
                            alertify.success(isOK);
                            loadReasonT();
                            $('#tReasonx').val('');
                          }
                          else
                          {
                            alertify.error(isOK);
                          }
                
                },
               error: function(){ 
                alert('Unable to save leave. please call IT for support');}
            })

  }

  function MirTrim(x) {
          return x.replace(/^\s+|\s+$/gm,'');
  }

 


</script>

</body>
</html>
