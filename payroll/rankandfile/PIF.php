<?php
session_start();
//include('Auth.php');
//include('DBConnect.php');
  $eid = 0;

  //need for encryption from sir raymir
include('MirFunctions.php');



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
      <i class="fa fa-building"></i> DII eSystem
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- TOP HEADER LINKS -->
    <div class="navbar-custom-menu">
        
        <?php include('../Header.php'); ?>

     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed"  >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <section class="content-header">
      <h1>
        Welcome!
        <small>Guess Employee System @2018</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Payroll Inquiry Form</a></li>
      </ol>
    </section>

  <section class="content" id="sectionID">
  <!--left box -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
          <br>
            <h3 class="box-title">Payroll Inquiry Form</h3>
            <div class="box-tools pull-right">    
            </div>
          </div>
      
      <div class="form-group">
        <div class="box-body">
        
     <br>    
          <address>
            <p class="text-muted">
              <strong><font color="#3c8dbc">Name: </font></strong> <?php echo $_SESSION['SESS_vName']; ?> <br>
              <strong><font color="#3c8dbc">ID Number: </font></strong> <?php echo $_SESSION['SESS_cIDNumber']; ?> <br>
              <strong><font color="#3c8dbc">Department: </font></strong> <?php echo $_SESSION['SESS_vDepartment']; ?> <br>
              <strong><font color="#3c8dbc">Position: </font></strong> <?php echo $_SESSION['SESS_vDesignation']; ?>       
            <br>
            </p>
           </address>
           <hr>
      <br>
      <form class="col-md-10" method="POST" autocomplete="off"  action="RequestQ.php">
          <!-- Date range -->
              <div id="LDetails" name="LDetails">
              <div class="col-md-12">
          
              <div class="form-group">
              <label>Date of your PIF Request: </label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name='dDate' placeholder='Pick Date'>
                </div>
              </div>  
              </div>
          &nbsp; &nbsp; &nbsp;   
          <label>Cut-off Period of Request: </label>
              <div class="col-md-35">
              </div>
                    <div class="col-sm-4">
                    <select class="form-control select" name="dMonth">
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
                    </option>
                    </select></div>

                    <div class="col-sm-4">
                    <select class="form-control select" name="dYear">

                    <option>2018</option>
                    <option>2019</option>
                  
                    </option>
                    </select></div>
                    <div class="col-sm-4">
                    <select class="form-control select" name="dCutoff">

                    <option>1st Half</option>
                    <option>2nd Half</option>
                  
                    </option>
                    </select></div>
              <br>
              &nbsp; &nbsp; &nbsp;
              <label>Reason of Request: </label>
                <div class="col-md-12">
                    <select class="form-control select" name="dReason">";
                        <option name="1" value="Unpaid Leave (VL / SL / EL)">Unpaid Leave (VL / SL / EL)</option>
                        <option name="1" value="Unpaid Half-day Leave (AM / PM)">Unpaid Half-day Leave (AM / PM)</option>
                        <option name="1" value="Unpaid days worked">Unpaid days worked</option>
                        <option name="1" value="Unpaid Working Day Off">Unpaid Working Day Off</option>
                        <option name="1" value="Unpaid Overtime">Unpaid Overtime</option>
                        <option name="1" value="Unpaid Unpaid OT Holiday">Unpaid OT Holiday</option>
                        <option name="1" value="Unpaid Holiday">Unpaid Holiday</option>
                        <option name="1" value="Deduction-Days Absent">Deduction-Days Absent</option>
                        <option name="1" value="Deduction-Undertime">Deduction-Undertime</option>
                        <option name="1" value="Deduction-Late">Deduction-Late</option>
                         <option name="1" value="FOR IT TEST ONLY">FOR IT TEST ONLY</option>
                        </option>
                    </select>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                  
                  </div>
                  </div>
                  </div>
                  
                  <div id="LApprover" name="LApprover">

                  </div> 
                  
                  <div class="box box-footer pull-right">
                  
                  <div class="col-md-4 pull-right">
                  <a href='PIF.php?id=$row[id]'>
                    <input class=" btn btn-primary " type="submit" name="submit" value="Add To Queue"> </a>
                  </div>
              
                </div>
              </div>
      </form>
      </div>
    </div>













  </div>


      <div class="col-md-6" id="dView">
        


          
          <div class="box box-footer pull-right" id="sFooter">
             <!--<div class="col-md-3 pull-right">
                 <button id="btncance l" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i> Cancel</button>
              </div>-->
              <div class="col-md-3 pull-right" style="display:none;" id="btnsubshow">
                 <button id="btnsubmit" type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
              </div>
      </div>




        
                    
      <div class="col-sm-13" id="dView">
      <div class="box box-primary with-border">
       
                        <div class="box-body">
                            
              <table class="table table-bordered table-hover"> 
                       
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nature of Inquiry Details</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              include('DBConnect4.php');
                $query = "SELECT * from payrolltemptable where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
                        
                        $result = mysql_query($query) or die(mysql_error());
                        $maxi=mysql_num_rows($result);

                        while ($row = mysql_fetch_array($result)){
                            //get id data for removing by line
                           $id = $row['id'];
                            $svt = Mir('encrypt', $id);  
                              $x = Mir('encrypt', $cControlNumber); 


                    echo"<tr>";
                    echo" <td><font size=\"3px\">$row[dDate]</font></td>";
                    
                    echo"<td>";

                    echo"<div class=\"form-group\">";


                    echo"<font size=\"3px\">  $row[dReason]</font>";

                    echo"<br>";
                    echo"<font size=\"3px\"> Cutoff: $row[dMonth] , $row[dYear] - $row[dCutoff]</font>";

                    echo"</div>";


                    echo"</td>";



                   echo"<td>";
                    //remove per row codes removeq.php
                   echo '<form method="GET" action="RemoveQ.php" role="form">';
                     echo '<input type="hidden" value="' . $svt  . '" name="svt">';
                      echo' <input type="hidden" value="' . $x  . '" name="y">';
                       echo '<button type="submit" class="btn btn-danger">Remove</button>  ';
                        echo '</form>';
                     echo"</td>";


                     echo"</tr>";



                    echo"";



                  }
                ?>





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        

<form class="col-md-16" method="POST" autocomplete="off"  action="SubmitRequest.php">
  <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Details</h3>
          </div>

         
          <div class="box-body">


             <?php
                include('DBConnect2.php');
                $qryApprovers = "SELECT vAppName from tOnlineGlobalApproval where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
                      
                      echo '<div class="form-group">';
                      echo '<label>Approver(s)</label>';
                      echo '<table>';
                        $i=1;
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $AppName  = $rowA['vAppName'];
                          $AppLevel = "App".$i;

                          
                          echo '<tr>
                          <td>
                          <input class="form-control" style="width: 450px;" type="text" 
                          name="' . $AppLevel . '" value="' . $AppName . '" readonly>
                          </td>
                          </tr>';
                

                          $i = $i + 1;
                        }
                      echo '</table>';
                      echo '</div>'; 

            
               echo' 
      <input class=" btn btn-primary" type="submit" name="submit2" value="Submit"></a>';
                      
                ?>

                <!--email -->



                  

      </div>
             </form>      
    


        </div>
      </div>



    <!--NOTICE-->
     <div class="col-md-6" id="aView">
        <div class="box box-primary with-border">
          <div class="box-header with with-border">
            <h3 class="box-title">Application Notes</h3>
          </div>
          <div class="box-body">
            1.) Only <b>DIRECT</b> AND <b>AJW</b> Employees can file the PIF.<br>
            2.) If Reason of Request is VL/SL/EL. Please ensure the Leave must be  <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>FILED</b> in Leave System and <b>APPROVED</b> by approvers before filing!<br>
            3.) For Employees in <b>AGENCY</b> kindly coordinate your PIF Request <br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  to your respective <B>AGENCY COORDINATOR</B> for filing.<br>
            4.) Inquiry should be filed within (2)days upon receipt of payslip. <br>
        </div>
        </div>
    </div>
  <!--End Notice-->




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





<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Raymir Kristoffer A. Pedrique
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved.
  </footer>








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
