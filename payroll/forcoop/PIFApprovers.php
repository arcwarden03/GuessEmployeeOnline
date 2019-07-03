<?php
session_start();
//include('Auth.php');
include('DBConnect4.php');
  $eid = 0;

//need for encryption from sir raymir
include('MirFunctions.php');

  $Approve = Mir('encrypt', "APPROVED");
  $Reject = Mir('encrypt', "REJECTED");

  $vdept = $_SESSION['SESS_vDepartment'];

?>
<!DOCTYPE html>
<html>
<!--START OF HEAD-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Payroll Inquiry Form | Guess Employee Online System</title>
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
      <i class="fa fa-calculator"></i> <strong> Payroll</strong>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>





    <!-- TOP HEADER LINKS -->
    <div class="navbar-custom-menu">
    <?php include('Header.php'); ?>
     </section>

    </aside>
 <!--END OF SIDEBAR MENU-->   

 
<!-- <body class="hold-transition skin-blue sidebar-mini fixed" onload="LoadOTdetails()" > -->
<body class="hold-transition skin-blue sidebar-mini fixed">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1><i class ="fa fa-file-powerpoint-o"></i> Payroll Inquiry Form Approval</h1>
    <ol class="breadcrumb">
    <li><a href="../../../mainpage.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#">Payroll Inquiry Form</a></li>
        <li class="active">PIF Approval for COOP</li>
    </ol>
    </section>


  <section class="content" id="sectionID">
  <!--left box -->
    





<div class="box box-primary col-md-12">

      
        <div class="box-header"><h3 class="box-title"><i class="fa fa-file-text-o"></i> Pending for Approval</h3>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>Department / Store</center></th>
                  <th><center>Request Date</center></th>
                  <th><center>Options</center></th>
                </tr>
              </thead>
              <tbody>

                <?php
                  

                  $functionqry = "select distinct(dRequestDate),(vDepartment) from cooptblpayroll where cControlNumber in (select cControlNumber from tblappcoop where vAppName = '" . trim($_SESSION['SESS_vName']) . "' and cStatus = 'PENDING' ) order by dRequestDate desc ";

                  $result = mysql_query($functionqry) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($rowAz = mysql_fetch_array($result))   

                    {
                        
                        $vDepartment= $rowAz['vDepartment'];
                        //$dRequestDate = substr(trim($rowAz['dRequestDate']), 0, 10);

                        $dRequestDate = $rowAz['dRequestDate'];

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
                  <th>System ID</th>
                  <th>Date of PIF</th>
                  <th>Employee Name</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody id="tblOTProcess">

              <?php
                  include('DBConnect4.php');
                  session_start();
                  
                  $dDatex = $_SESSION['OT_Date'];
                  $dDept = $_SESSION['OT_Dept'];

                  $functionqry2 = "SELECT * from cooptblpayroll where dRequestDate='". $dDatex ."' and vDepartment='". $dDept ."' and cCurrentLocation='Approver' ";
                  $result = mysql_query($functionqry2) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = trim($row['id']);
                      $cControlNumber = $row['cControlNumber'];
                      $vName= $row['vName'];
                      $vDepartment= $row['vDepartment'];
                      $vDesignation= $row['vDesignation'];
                      $dRequestDate = $row['dRequestDate'];
                      $dDate= $row['dDate'];
                      $dMonth= $row['dMonth'];
                      $dYear= $row['dYear'];
                      $dCutoff= $row['dCutoff'];
                      $dReason= $row['dReason'];
                      $cApproverName= $row['cApproverName'];
                      $cApprover1= $row['cApprover1'];

                    //$cApprover1 = $row['cApprover1Status'];
                     
                    $vName = $row['vName'];
                      
                     $e = Mir('encrypt', $vAgency);  
                     $x = Mir('encrypt', $cControlNumber);   
                     $o = Mir('encrypt', $vName); 

                    $vDept = Mir('encrypt', $vDepartment); 
                    $vDate = Mir('encrypt', $dDate); 
                    $vMonth = Mir('encrypt', $dMonth);
                    $vYear = Mir('encrypt', $dYear);  
                    $vCutoff = Mir('encrypt', $dCutoff); 
                    $vReason = Mir('encrypt', $dReason); 
                    $vAddRemarks = Mir('encrypt', $dAddRemarks); 
                    $vApproverName = Mir('encrypt', $cApproverName); 
                    $vApprover1 = Mir('encrypt', $cApprover1); 
                     

                        //check current level of approval
                    $CurrentLevel=0;
                    $flvl = "SELECT * from tblappcoop where cControlNumber = '" . trim($cControlNumber) . "' and vAppName = '" . $_SESSION['SESS_vName'] . "'";
                    $rlvl = mysql_query($flvl) or die(mysql_error());
                    while ($rowlvl = mysql_fetch_array($rlvl))
                      {
                        $CurrentLevel = $rowlvl['nLevel'];
                         $vAppName = $rowlvl['vAppName'];

                          $vAppNamex= Mir('encrypt', $vAppName); 

                      } 
                            echo '<tr>';
                            echo '<td>' . $cControlNumber . '</td>';
                            echo '<td>' . $dDate . '</td>';
                            echo '<td>' . $vName . '</td>';
                          
                    $flvlx = "SELECT * from cooptblpayroll where cControlNumber = '" . trim($cControlNumber) . "' and cCurrentLocation='Approver' ";
                    $rlvlx = mysql_query($flvlx) or die(mysql_error());
                    while ($rowlvlx = mysql_fetch_array($rlvlx))
                      {
                        $dReason = $rowlvlx['dReason'];
                        $vAgency = $rowlvlx['vAgency'];
                     
                     $d = Mir('encrypt', $dReason);  

                     $e = Mir('encrypt', $vAgency);  
                     $x = Mir('encrypt', $cControlNumber);   
                     $o = Mir('encrypt', $vName); 
                       
                      } 

                            echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . trim($cControlNumber)  . '">
                            <i class="fa fa-file-text-o"></i> View Details</button>';
 
                            echo '<div id="message' . trim($cControlNumber) . '" class="modal fade" role="dialog">
                            <div class="modal-dialog"  style="width:1000px">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">PAYROLL INQUIRY REQUEST DETAILS</h4>
                            </div>
                            <div class="modal-body">
                              <strong>PIF Control Number: </strong> ' . $cControlNumber  . '<br>
                              <strong>Name: </strong> ' . $vName  . '<br>
                              <strong>Department: </strong> ' . $vDepartment  . '<br>
                              <strong>Designation: </strong> ' . $vDesignation  . '<br><br>
                            
                              ';


                             include ('ViewDetails.php');
                            
                              echo '<br><br>';
                              echo '<div class="modal-footer">';
                              if ($CurrentLevel==0)
                              {
                                echo '<p style="color:red">System cannot find your current level of approval. Please call IT for assistance!</p>';
                              }
                              else
                              {
                                echo '<table>';
                                echo '<tr><td>';
                                echo '<form method="GET" action="ApproveNRejectCoop.php">';
                                echo '<input type="hidden" value="' . $Approve  . '" name="x">';
                                echo '<input type="hidden" value="' . $x  . '" name="y">';
                                echo '<input type="hidden" value="' . $d  . '" name="c">';
                                echo '<input type="hidden" value="' . $e  . '" name="f">';
                                echo '<input type="hidden" value="' . $o  . '" name="p">';
                                echo '<input type="hidden" value="' . $vDept  . '" name="xDept">';
                                echo '<input type="hidden" value="' . $vDate  . '" name="xDate">';
                                echo '<input type="hidden" value="' . $vMonth  . '" name="xMonth">';
                                echo '<input type="hidden" value="' . $vYear . '" name="xYear">';
                                echo '<input type="hidden" value="' . $vCutoff . '" name="xCutoff">';
                                echo '<input type="hidden" value="' . $vReason . '" name="xReason">';
                                echo '<input type="hidden" value="' . $vAddRemarks . '" name="xAddRemarks">';
                                echo '<input type="hidden" value="' . $vApproverName . '" name="xApproverName">';
                                echo '<input type="hidden" value="' . $vApprover1 . '" name="xApprover1">';
                                echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
                                echo '</form></td>';
                                echo '<td>';
                                echo '<form method="GET" action="ApproveNRejectCoop.php">';
                               
                                echo '<input type="hidden" value="' . $Reject  . '" name="x">';
                                echo '<input type="hidden" value="' . $x  . '" name="y">';
                                echo '<input type="hidden" value="' . $d  . '" name="c">';
                                echo '<input type="hidden" value="' . $e  . '" name="f">';
                                echo '<input type="hidden" value="' . $o  . '" name="p">';
                                echo '<input type="hidden" value="' . $vDept  . '" name="xDept">';
                                echo '<input type="hidden" value="' . $vDate  . '" name="xDate">';
                                echo '<input type="hidden" value="' . $vMonth  . '" name="xMonth">';
                                echo '<input type="hidden" value="' . $vYear . '" name="xYear">';
                                echo '<input type="hidden" value="' . $vCutoff . '" name="xCutoff">';
                                echo '<input type="hidden" value="' . $vReason . '" name="xReason">';
                                echo '<input type="hidden" value="' . $vAddRemarks . '" name="xAddRemarks">';
                                echo '<input type="hidden" value="' . $vApproverName . '" name="xApproverName">';
                                echo '<input type="hidden" value="' . $vApprover1 . '" name="xApprover1">';
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
                  
                ?>
              </tbody>
            </table>
          </div>
    </div>
  </div> 
 
        


    
          

  


  
  

<!--alertify js -->

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






<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<!--date picker js -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
 

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


  


</body>
</html>
