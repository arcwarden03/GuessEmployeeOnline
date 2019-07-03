<?php
  session_start();
  $cIDNumberx = $_SESSION['SESS_cIDNumber'];
  include ('../../../config/dbconfig-OT2.php');
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

  <!-- Alertify -->
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="../../../plugins/alertify/alertify.js"></script>
  <script src="../../../plugins/alertify/alertify.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link rel="stylesheet" type="text/css" href="js/thickbox.css" />
  <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="js/thickbox.js"></script>




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
      <?php include('OTHeaderST.php') ?>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed"  >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<!-- Breadcrumb -->
    <section class="content-header">
    <h1><i class ="fa fa-clock-o"></i> Overtime Application(s)</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Pending & Archive OT</li>
    </ol>
    </section>
<!-- Breadcrumb -->

  <section class="content" id="sectionID">
  <!--left box -->
    <div class="row">
    

  <!--right box -->
    
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Pending Application(s)</h3>
          </div>
 
          <div class="box-body">
            <table id="tblleaveinfoID" class="table table-bordered table-hover"> 
              <thead>  
                <tr> 
                  <th>Filing Date</th> 
                  <th>Employee Name</th> 
                  <th>OT Date</th> 
                  <th>Time Covered</th> 
                  <th>Action</th> 
                </tr> 
              </thead>
              <tbody>
                <?php
                         $query = "SELECT * from tOTProcess where cidnumber = '" . $cIDNumberx . "'";  
                         $rslt = sqlsrv_query($conn, $query);
                         while ($row = sqlsrv_fetch_array($rslt))  
                         {
                        
                              $cSysIDx = $row['cSysID'];
                              $cStatusx = trim($row['cStatus']);
                              $dDfiled = trim($row['dFiledDate']);
                              $dDate = trim($row['dDate']);
                              $dCovered = trim($row['dFrom']) .' - '. trim($row['dTo']);

                              $vName = trim($row['vName']);
                              $vDepartment= trim($row['vDeptStore']);
                              $vReason1 = trim($row['vReason']);
                              $vReason2 = trim($row['vOtherR']);
     
                              
                              echo '<tr>';
                              echo '<td>' . $dDfiled . '</td>';
                              echo '<td>' . $vName . '</td>';
                              echo '<td>' . $dDate . '</td>';
                              echo '<td>' . $dCovered . '</td>';
                              echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#sysid' . trim($cSysIDx)  . '">
                              <i class="fa fa-file-text-o"></i> View Details</button>';
                              //pop up message
                              echo '<div id="sysid' . trim($cSysIDx) . '" class="modal fade" role="dialog">
                                        <div class="modal-dialog"  style="width:800px">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Overtime Application Details</h4>
                                              </div>
                                              <div class="modal-body">
                                                <strong>Name: </strong> ' . $vName  . '<br>
                                                <strong>Department: </strong> ' . $vDepartment  . '<br>
                                                <strong>Date Filed: </strong> ' . $dDfiled  . '<br><hr>
                                                <strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';

                                                  //php that will pop out in the modal window
                                                  include ('../model/ViewDetailsUser.php');

                                                echo '<br><br>';
                                     
                                                if ($cStatusx=='PENDING'){
                                                  echo '<div class="modal-footer">
                                                   
                                                            <table>
                                                              <tr><td>
                                                              <form method="GET" action="../model/DelOTApp.php" role="form">
                                                                  <input type="hidden" name="hID" value="' . trim($cSysIDx) . '">
                                                              <button type="submit" class="btn btn-danger">Cancel Application</button>
                                                              </form>
                                                              </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                      Close
                                                                  </button>
                                                                </td>
                                                              </tr>
                                                            </table>
                                                     
                                                        </div>';
                                                } else {
                                                  echo '<div class="modal-footer">
         
                                                            <table>
                                                              <tr>
                                                                <td>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                      Close
                                                                    </button>
                                                                </td>
                                                              </tr>
                                                            </table>
                                                
                                                        </div>';
                                                }

                                     echo'</div>
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
          <div class="box box-footer pull-right" id="sFooter">
          </div>
        </div>
        
      </div>
      





      <div class="col-md-4" id="aView">
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Rejected Application(s)</h3>
          </div>

          <div class="box-body">
              <table id="tblleaveApproverID" class="table table-bordered table-hover"> 
                <thead> 
                  <tr> 
                    <th>Date Filed</th> 
                    <th>OT Date</th> 
                    <th>Date Filed</th> 
                    <th>Action</th> 
                  </tr>
                </thead>
                <?php
                         $query = "SELECT * from tOTProcessH where cidnumber = '" . $cIDNumberx . "' and cStatus = 'REJECTED'";  
                         $rslt = sqlsrv_query($conn, $query);
                         while ($rowz = sqlsrv_fetch_array($rslt))  
                         {
                        
                              $cSysIDx = $rowz['cSysID'];
                              $dDfiled = trim($rowz['dFiledDate']);
                              $dDate = trim($rowz['dDate']);
                              $dCovered = trim($rowz['dFrom']) .' - '. trim($rowz['dTo']);

                              $vName = trim($rowz['vName']);
                              $vDepartment= trim($rowz['vDeptStore']);
                              $vReason1 = trim($rowz['vReason']);
                              $vReason2 = trim($rowz['vOtherR']);
     
                              
                              echo '<tr>';
                              echo '<td>' . $dDfiled . '</td>';
                              echo '<td>' . $dDate . '</td>';
                              echo '<td>' . $dCovered . '</td>';
                              echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#sysid' . trim($cSysIDx)  . '">
                              <i class="fa fa-file-text-o"></i> View Details</button>';
                              //pop up message
                              echo '<div id="sysid' . trim($cSysIDx) . '" class="modal fade" role="dialog">
                                        <div class="modal-dialog"  style="width:800px">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Overtime Application Details</h4>
                                              </div>
                                              <div class="modal-body">
                                                <strong>Name: </strong> ' . $vName  . '<br>
                                                <strong>Department: </strong> ' . $vDepartment  . '<br>
                                                <strong>Date Filed: </strong> ' . $dDfiled  . '<br><hr>
                                                <strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';

                                                  //php that will pop out in the modal window
                                                  include ('../model/ViewDetailsUserH.php');

                                                echo '<br><br>

                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                  </td>';
                            echo '</tr>';                   
                          } 
                ?>
              </table>
          </div>
          <div class="box box-footer pull-right" id="sFooter">
          </div>
      </div>
      </div>
















      <div class="col-md-8" id="aView">
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Approved Application(s)</h3>
          </div>

          <div class="box-body">
              <table id="tblleaveApproverID" class="table table-bordered table-hover"> 
                <thead> 
                  <tr> 
                    <th>Date Filed</th> 
                    <th>OT Date</th> 
                    <th>Date Filed</th> 
                    <th>Action</th> 
                  </tr>
                </thead>
                <?php
                         $query = "SELECT * from tOTProcessH where cidnumber = '" . $cIDNumberx . "' and cStatus = 'APPROVED'";  
                         $rslt = sqlsrv_query($conn, $query);
                         while ($rowz = sqlsrv_fetch_array($rslt))  
                         {
                        
                              $cSysIDx = $rowz['cSysID'];
                              $dDfiled = trim($rowz['dFiledDate']);
                              $dDate = trim($rowz['dDate']);
                              $dCovered = trim($rowz['dFrom']) .' - '. trim($rowz['dTo']);

                              $vName = trim($rowz['vName']);
                              $vDepartment= trim($rowz['vDeptStore']);
                              $vReason1 = trim($rowz['vReason']);
                              $vReason2 = trim($rowz['vOtherR']);
     
                              
                              echo '<tr>';
                              echo '<td>' . $dDfiled . '</td>';
                              echo '<td>' . $dDate . '</td>';
                              echo '<td>' . $dCovered . '</td>';
                              echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#sysid' . trim($cSysIDx)  . '">
                              <i class="fa fa-file-text-o"></i> View Details</button>';
                              //pop up message
                              echo '<div id="sysid' . trim($cSysIDx) . '" class="modal fade" role="dialog">
                                        <div class="modal-dialog"  style="width:800px">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Overtime Application Details</h4>
                                              </div>
                                              <div class="modal-body">
                                                <strong>Name: </strong> ' . $vName  . '<br>
                                                <strong>Department: </strong> ' . $vDepartment  . '<br>
                                                <strong>Date Filed: </strong> ' . $dDfiled  . '<br><hr>
                                                <strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';

                                                  //php that will pop out in the modal window
                                                  include ('../model/ViewDetailsUserH.php');

                                                echo '<br><br>

                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                  </td>';
                            echo '</tr>';                   
                          } 
                ?>
              </table>
          </div>
          <div class="box box-footer pull-right" id="sFooter">
          </div>
      </div>
      </div>




      





      <div class="col-md-4 pull-right" id="dView">
        
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Application Notes</h3>
          </div>

          <div class="box-body">

            1.) Always check the <b>List of Approver(s)</b> before submitting the Overtime Application.
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
 
 
<script>
  $(function (){
    //Date picker
    $('#reservation').datepicker({
      autoclose: true
    })
  })

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
