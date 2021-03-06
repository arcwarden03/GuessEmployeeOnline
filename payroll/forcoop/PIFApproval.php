<?php
  session_start();
  $cIDNumberx = $_SESSION['SESS_cIDNumber'];
  $vAppNamex = $_SESSION['SESS_vName'];
 include('DBConnect4.php');
  //include ('../../Auth.php');
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
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

 <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Alertify -->
  <link rel="stylesheet" href="../../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../../plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="../../plugins/alertify/alertify.js"></script>
  <script src="../../plugins/alertify/alertify.min.js"></script>
 
</head>
<!--END OF HEAD-->

<!--START OF BODY-->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!--START OF TOP HEADEAR-->
  <header class="main-header">

    <!-- Logo -->
    <a href="../../mainpage.php" class="logo">
      <i class="fa fa-building"></i> DII eSystem
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- TOP HEADER LINKS -->
    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

 S

    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../../dist/img/user2-160x160.png" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
      </a>
    <ul class="dropdown-menu">
          
    <li class="user-header">
    <img src="../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

     <p>
      <?php echo trim($vAppNamex) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
      <small><?php echo $_SESSION['SESS_cIDNumber']?></small> 
      </p>
      </li>

      </li>
       <li class="user-footer">
   
      <div class="pull-right">
      <a href="../../Logout.php" class="btn btn-default btn-flat">Sign out</a>
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
  <img src="../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
  </div>
   <div class="pull-left info">
   <p><b><small><marquee scrolldelay="150"><?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
   
   <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
   </div>
   </div>
 

      <ul class="sidebar-menu" data-widget="tree">
        <center><li class="header">MAIN NAVIGATION</li></center>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../../Mainpage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-history"></i> <span>Change Password</span></a></li>
        <li><a href="../../views/GlobalApprovals.php"><i class="fa fa-check-circle-o"></i> <span>Online Approval(s)</span></a></li>

          <li class="treeview">
          <a href="#"><i class="fa fa-calculator"></i> <span>Payroll Inquiry</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
          <li title="Payroll History"><a href="../../views/PayrollHistory.php"><i class="fa fa-share-square-o"></i>Payroll History</a></li>

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
          <li title="Payroll Inquiry Form"><a href="../../payroll/rankandfile/PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>
          <li title="Payroll Inquiry Form"><a href="../../payroll/rankandfile/PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>


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
    <h1><i class ="fa fa-clock-o"></i> Overtime Application Approval</h1>
    <ol class="breadcrumb">
    <li><a href="../../mainpage.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Overtime Approval</li>
    </ol>
    </section>
<!-- Breadcrumb -->
  <section class="content" id="sectionID">
 
  <div class="box box-primary col-md-12">

      
        <div class="box-header"><h3 class="box-title"><i class="fa fa-file-text-o"></i> Pending for Approval</h3>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>Department / Store</center></th>
                  <th><center>Overtime Date</center></th>
                  <th><center>Options</center></th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $vAppN = $_SESSION['SESS_vName'];

                  $functionqry = "select distinct(dRequestDate),(vDepartment)  from cooptblpayroll";

                  $result = mysql_query($functionqry) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($rowAz = mysql_fetch_array($result))   

                    {
                        
                        $vDepartment= $rowAz['vDepartment'];
                        $dRequestDate = trim($rowAz['dRequestDate']);

                    echo '<tr>
                          <td><center>' . $vDepartment . '</center></td>
                          <td><center>' . $dRequestDate . '</center></td>';
            
                          echo '<td>
                                <form method="GET" action="ViewPIFDetails.php">
                                <input type="hidden" value="' . $dRequestDate  . '" name="OTDatex">
                                <input type="hidden" value="' . $vDepartment  . '" name="OTDeptx">
                   
                                <center> <button type="submit" name="btnview" class="btn btn-primary btn-xs">
                                <i class="fa fa-file-text-o"></i> &nbspView All</button>
                                </form>

                                ';

                        echo '</tr>';   
                  }
                ?>

              </tbody>
            </table>
          </div>
        </div>


        <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Date Filed</th>
                  
                </tr>
              </thead>
              <tbody id="tblOTProcess">

              <?php
                  include('DBConnect4.php');
                  session_start();
                  
                  $dDatex = $_SESSION['OT_Date'];
                  $dDept = $_SESSION['OT_Dept'];

                  if (isset($_SESSION['OT_Date']) && isset($_SESSION['OT_Dept']))
                  {
                 
                  $functionqry2 = "SELECT * from cooptblpayroll where dRequestDate='". $dDatex ."' and vDepartment='". $dDept ."' ";
                  $result2 = mysql_query($functionqry2) or die(mysql_error());
                  $maxi=mysql_num_rows($result2);
                  while ($rowAz2 = mysql_fetch_array($result2))  
                    {
                        
                            $cSysIDx = trim($rowAz2['cSysID']);
                            $vName= $rowAz2['vName'];
                            $vDepartment= $rowAz2['vDepartment'];
                            

                            echo '<tr>';
                            echo '<td>' . $vName . '</td>';
                            echo '<td>' . $vDepartment . '</td>';
                           

                        /*--------------------------------------Editable Time-----------------------------*/
                          /*
                                echo'<form method="GET" action="../model/updateTime.php" role="form">';

                                echo '<td>';
                                  echo '<div class="bootstrap-timepicker">';
                                    echo '<div class="form-group">';   
                                    echo '<div class="input-group">';
                                      echo '<div class="input-group-addon">';
                                      echo '<i class="fa fa-clock-o"></i>';
                                      echo '</div>';
                                        echo '<input id="tFrom" name="tFromx" type="text" class="form-control timepicker" value="'. $dFrom .'">';              
                                      echo '</div>';
                                      echo '</div>';
                                    echo '</div>';
                                echo'</td>';

                                echo '<td>';
                                  echo '<div class="bootstrap-timepicker">';
                                    echo '<div class="form-group">';   
                                    echo '<div class="input-group">';
                                      echo '<div class="input-group-addon">';
                                      echo '<i class="fa fa-clock-o"></i>';
                                      echo '</div>';
                                        echo '<input id="tTo" name="tTox" type="text" class="form-control timepicker" value="'. $dTo .'">';              
                                      echo '</div>';
                                      echo '</div>';
                                    echo '</div>';       
                                echo'</td>';

                                echo'<input type="text" style="display:none;" name="hID" value="' . $cSysIDx . '">';
                                
                                echo '<td><button type="submit" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil-square-o"></i> Update</button>';
                                echo'</form>';
                          */
                        /*---------------------------------Editable Time Done-----------------------------*/

                              echo '<td><button type="button" class="btn btn-primary btn-xs" 
                              data-toggle="modal" data-target="#message' . $cSysIDx  . '">
                              <i class="fa fa-file-text-o"></i> &nbspReview</button>';

                        /*--------------------------BEGIN MODAL----------------------------------------*/
                        /*--------------------------this handles the pop up message--------------------*/
                          echo '<div id="message' . $cSysIDx . '" class="modal fade" role="dialog">
                                    <div class="modal-dialog"  style="width:750px">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title"><center>Overtime Application Details</center></h4>
                                        </div>
                                        <div class="modal-body">
                            
                                          <strong>Name: </strong> ' . $vName  . '<br>
                                          <strong>Department: </strong> ' . $vDepartment  . '<br>
                                          <strong>Date Filed: </strong> ' . $dFDate  . '<br><br>
                                          <strong>Overtime Date: </strong> ' . $dDate  . '<br>
                                          <strong>Time Coverage: </strong> ' . $dFrom .' to '. $dTo . '<br><hr>';

                                          if(trim($vReason2)==''){
                                            echo '<strong>Reason: </strong> ' . $vReason1 .'<br><hr>';
                                          } else {
                                            echo '<strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';
                                          }
                                          
                                        
                                          include ('../model/ViewDetails.php');
                                        
                                          echo '<br><br>';
                                          echo '<div class="modal-footer">';
                                          
                                  
                                          //check approver max lvl
                                            $nMaxz=0;
                                            $qryApproverEz = "SELECT max(nLevel) as 'nMax' from tApprover where cSysID = '" . $cSysIDx . "'"; 
                                            $rsltv = sqlsrv_query($conn, $qryApproverEz);
                                            while ($rowAxv = sqlsrv_fetch_array($rsltv))  
                                                {
                                                    $nMaxz = trim($rowAxv['nMax']);
                                                }

                                            
                                            //check approver max lvl
                                            if(trim($_SESSION['SESS_vDesignation'])=='Sales Operation Manager' || trim($_SESSION['SESS_vDesignation'])=='Assistant Area Sales Manager' || trim($_SESSION['SESS_vDesignation'])=='Area Sales Manager')
                                            {
                                              $nLvl=0;
                                              $qryApproverEx = "SELECT * from tApprover where vAppName = '". $vAppNamex ."' and cSysID = '". $cSysIDx ."'"; 
                                              $rsltz = sqlsrv_query($conn, $qryApproverEx);
                                              while ($rowAxc = sqlsrv_fetch_array($rsltz))  
                                                  {
                                                      $nLvl = trim($rowAxc['nLevel']);
                                                  }
                                                
                                        
                                                  echo '<table>';
                                                  echo '<tr><td>';
                                                  echo '<form method="GET" action="../../response/approveXrejectST.php">';
                                                  echo '<input type="hidden" value="APPROVED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                                  echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
        
                                                
        
                                                  echo '</form></td>';
                                                  echo '<td>';
                                                  echo '<form method="GET" action="../../response/approveXrejectST.php">';
                                                  echo '<input type="hidden" value="REJECTED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                                  echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                                                  
                                              
                                                  echo '</form></td></table>';
                                            } else {
                                                    $nLvl=0;
                                                    $qryApproverEx = "SELECT * from tApprover where vAppName = '". $vAppNamex ."' and cSysID = '". $cSysIDx ."'"; 
                                                    $rsltz = sqlsrv_query($conn, $qryApproverEx);
                                                    while ($rowAxc = sqlsrv_fetch_array($rsltz))  
                                                        {
                                                            $nLvl = trim($rowAxc['nLevel']);
                                                        }
                                                      
                                              
                                                        echo '<table>';
                                                        echo '<tr><td>';
                                                        echo '<form method="GET" action="../../response/approveXrejectHR.php">';
                                                        echo '<input type="hidden" value="APPROVED" name="x">';
                                                        echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                        echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
              
                                                      
              
                                                        echo '</form></td>';
                                                        echo '<td>';
                                                        echo '<form method="GET" action="../../response/approveXrejectHR.php">';
                                                        echo '<input type="hidden" value="REJECTED" name="x">';
                                                        echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                        echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                                                        
                                                    
                                                        echo '</form></td></table>';
                                            }

      
                        echo '</div>
                              </div>
                              </div>
                              </div>
                              </td>';
                        echo '</tr>';   
                    }

                  }
                ?>
              </tbody>
            </table>
          </div>
    </div>
  </div> 
 
        


    
          

  


  
    <!-- /.content -->
  </section>
  <!-- /.content-wrapper -->

         

 
        <?php
                if (isset($_SESSION['U_ErrorMessage']))
                {
                  echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>';
                  echo '<p style="color:red">';
                  unset($_SESSION['U_ErrorMessage']);
                  echo '</p>';
                }
              

                if (isset($_SESSION['U_ValidMessage']))
                {
                  echo '<p style="color:green">';
                  echo $_SESSION['U_ValidMessage'];
                  echo '<script>alertify.success(\'' . $_SESSION['U_ValidMessage'] . '\');</script>';
                  unset($_SESSION['U_ValidMessage']);
                  echo '</p>';
                }

          ?>

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

  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })

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

  function loadOTdets(){
    $('#tblOTProcess').load('../model/getOTForApproval.php');
  }


 
   


</script>

</body>
</html>
