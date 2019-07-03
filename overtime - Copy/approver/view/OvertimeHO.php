<?php
  session_start();
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

  <!-- Alertify -->
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="../../../plugins/alertify/alertify.js"></script>
  <script src="../../../plugins/alertify/alertify.min.js"></script>
 
</head>
<!--END OF HEAD-->

<!--START OF BODY-->

<body class="hold-transition skin-blue sidebar-mini">
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
          <li title="Overtime Form"><a href="OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>
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
    <h1><i class ="fa fa-clock-o"></i> Overtime Application Form</h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Overtime Application</li>
    </ol>
    </section>
<!-- Breadcrumb -->

  <section class="content" id="sectionID">
  <!--left box -->
    <div class="row">
      <div class="col-md-6" >
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Fill up the Information</h3>
            <div class="box-tools pull-right">
                <!-- <button type="btnRef" onclick="myFunction();" title="Refresh Application Form"class="btn btn-box-tool"><i class="fa fa-refresh"></i>  Refresh -->
                <!-- </button> -->
            </div>
          </div>
      
       <form method="POST"  action="../model/AddOTDetails.php">
            <!-- alertift div -->
              <div class="box-body">
              <div id="alert" style="display:none;" class="alert alert-success text-center alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>
                  <span id="alertID"></span></h4>
              </div>

              <div id="errI" style="display:none;" class="alert alert-danger text-center alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-times"></i>
                  <span id="errID"></span></h4>
              </div>
      

              <!-- Date time today -->
              <div class="col-md-6">
              <div class="form-group">
                <label>Date Today:  <?php echo date("m/d/Y"); ?></label>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label for="dlastf">Date Last Filed: <span id="dLFiled">
                    <!--php include (getLastFiled.php)  --></span></label>
              </div>
              </div>

            
              <!-- Date range -->
              <div id="LDetails" name="LDetails">
              <div class="col-md-6">

              <div class="form-group">
                <label>Overtime Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name="datepickapp">
                </div>
              </div>  

              </div>

              <!-- From time -->
              <div class="col-md-12">
              <label>From:</label>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <label>To:</label>
              </div>
              <div class="col-md-6">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                      
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="tFrom" name="tFromx" type="text" class="form-control timepicker">                 
                            </div>
                        </div>
                    </div>
              </div>

              
              <!-- To time -->
              
              <div class="col-md-6">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                          
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="tTo" name="tTo" type="text" class="form-control timepicker">
                            </div>
                        </div>
                    </div>
              </div>
    

              <div class="col-md-12">
              <label>Reason: </label>
              </div>

              <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control select" id="rSelectx" name="rSelect" onchange="onChangeR(this.value);">
                      <?php include('../model/getReasons.php') ?>
                      </select>
                    </div>
              </div>
                
          
              <!-- Other Reason -->
              
              <div id="tReasonx" class="col-md-12" style="display:none;">
                <div class="form-group">
                      <label>Other Reason:</label>
                      <textarea id ="reasonT" name ="reasonTx" type="text" class="form-control" rows="4"
                      placeholder="[Enter your other reason regarding your overtime application]"></textarea>
                </div>
              </div>
              </div>
              
              <div id="LApprover" name="LApprover">

              </div>
              
              <div class="box box-footer pull-right">
                  <div class="col-md-3 pull-right">
                    <button type="submit" class="btn btn-block btn-primary btn-sm" id="btnaddDet">Add Details</button>
                  </div>
              </div>
              </div>

       </form>
      </div>
     </div>
    

  <!--right box -->
    
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Overtime Details</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
          </div>
 
          <div class="box-body">
            <table id="tblleaveinfoID" class="table table-bordered table-hover"> 
              <thead>  
                <tr> 
                  <th>Filing Date</th> 
                  <th>OT Date</th> 
                  <th>Time Covered</th> 
                  <th>Option</th> 
                </tr> 
              </thead>     
              <?php include('../model/getOTDetails.php') ?>
             </table>
          </div>

        </div>
        
      </div>
      
      <div class="col-md-6" id="aView">
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Approver Details</h3>
          </div>

          <div class="box-body">
              <table id="tblleaveApproverID" class="table table-bordered table-hover"> 
                <thead> 
                  <tr> 
                    <th>Approver Name</th> 
                  </tr>
                </thead>
                <?php include('../model/getApprover.php') ?>
              </table>
          </div>

          <div class="box box-footer pull-right" id="sFooter">
              <div class="col-md-3 pull-right"   id="btnsubshow">
                <form action="../model/SubmitOTDetails.php">
                 <button id="btnsubmit" type="submit" class="btn btn-block btn-primary btn-sm">
                   <i class="fa fa-paper-plane"></i> Submit</button>
                </form>
              </div>
          </div>

      </div>
      </div>

      <div class="col-md-6 pull-right" id="dView">
        
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Application Notes</h3>
          </div>

          <div class="box-body">
            1.) Please ensure that Overtime Application be <b>APPROVED</b> by <b>ALL APPROVER(s)</b> before <i>5PM</i> 
                on the day application is being filed. 
                <br><br><i>
                ** This is to ensure that OT Application will reflect on HRD's extraction for OT Authorization**
                </i><br><br>
            2.) Always check the <b>List of Approver(s)</b> before submitting the Overtime Application.
          </div>  
        </div>
      </div>

          <?php
                if (isset($_SESSION['U_ErrorMessage']))
                {
                  echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>';
                  echo '<p style="color:red">';
                  //echo $_SESSION['U_ErrorMessage']; enable if you want to show text instead of modal
                  unset($_SESSION['U_ErrorMessage']);
                  echo '</p>';
                }
              

                if (isset($_SESSION['U_ValidMessage']))
                {
                  echo '<p style="color:green">';
                // echo $_SESSION['U_ValidMessage'];
                  echo '<script>alertify.success(\'' . $_SESSION['U_ValidMessage'] . '\');</script>';
                  unset($_SESSION['U_ValidMessage']);
                  echo '</p>';
                }
          ?>

      </section>

      <!-- end section left -->
     </div>
  <!-- /.content-wrapper -->

<!--alertify js -->

         


<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Raymir Kristoffer A. Pedrique
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

  function onChangeR(str){
    if(str == "Others"){
      $('#tReasonx').show();
    } else {
      $('#tReasonx').hide();
    }
  };

</script>

</body>
</html>
