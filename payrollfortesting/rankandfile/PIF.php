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
    <ul class="nav navbar-nav">

   <li class="dropdown tasks-menu">
            <a href="../../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Employee Relations</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

    <li class="dropdown tasks-menu">
    <a href="../../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
    <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown tasks-menu">
    <a href="../../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
    <ul class="dropdown-menu"></ul>
    </li>

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
      <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
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


<!--SYART OF SIDEBAR NAVIGATION-->
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
          <li title="Payroll History"><a href="#"><i class="fa fa-clock-o"></i>Overtime Application</a></li>
          <li title="Payroll History"><a href="views/PayrollHistory.php"><i class="fa fa-share-square-o"></i>Payroll History</a></li>
        
          <li class="treeview">
          <a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
        <ul class="treeview-menu">
          <li title="Payroll Inquiry Form"><a href="PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>
          <li title="Payroll Inquiry Form"><a href="PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>






          </ul>
          </li>
            <li><a href="EMS_USER_Manual_Leave_2.pdf" target="_blank">How To</a></li>


      </ul>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed"  >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <section class="content" id="sectionID">
  <!--left box -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
          <br>
            <h3 class="box-title">Payroll Inquiry Form <b>FOR TESTING</b></h3>
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
             <strong><font color="#3c8dbc">Position: </font></strong> <?php echo $_SESSION['SESS_vAgency']; ?> 
           
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
           <label>Date of Request: </label>
            <div class="input-group date">
              
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>

                <input type="text" class="form-control pull-right" id="datepicker" name='dDate' placeholder='Pick Date'>

           </div>



          </div>  

          </div>


      &nbsp; &nbsp; &nbsp;   <label>Cut-off Period of Request: </label>
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
                    <option name="1" value="Unpaid Unpaid OT Holiday">Unpaid Unpaid OT Holiday</option>
                    <option name="1" value="Unpaid Holiday">Unpaid Holiday</option>
                    <option name="1" value="Deduction-Days Absent">Deduction-Days Absent</option>
                    <option name="1" value="Deduction-Undertime">Deduction-Undertime</option>
                    <option name="1" value="Deduction-Late">Deduction-Late</option>
                    <option name="1" value="IT TEST ONLY">IT TEST ONLY</option>

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
            1.) Inquiry should be filed within (2)days upon receipt of payslip.
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
