<?php
session_start();
include('Auth.php');
include('DBConnect4.php');
  
include('MirFunctions.php');


  $Approve = Mir('encrypt', "APPROVED");
  $Reject = Mir('encrypt', "REJECTED");

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
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/thickbox.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
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
     

    
        <li title="Payroll Inquiry Form"><a href="PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>
        <li title="Payroll Inquiry Form"><a href="PIFRequests.php"><i class="fa fa-file-text-o"></i>Filed PIF Request</a></li>
        <li title="Payroll Inquiry Form"><a href="PIFHRD.php"><i class="fa fa-file-text-o"></i>PIF HRD </a></li>
          

         
          </ul>
          </li>

      </ul>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed" " >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <section class="content" id="sectionID">
  <!--left box -->
    

 




 <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">PIF COOP ARCHIVE</h3></div>
<br>

     
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Request Date</th>
                  <th>Name</th>
                  <th>Options</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
                 $functionqry = "Select * from cooptblpayroll where cControlNumber in (select cControlNumber from cooptblpayroll where cApprover1Status = 'APPROVED' and cCurrentLocation = 'HRD for Validation') order by dRequestDate desc";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['id'];
                      $cControlNumber = $row['cControlNumber'];
                       $vName= $row['vName'];
                       $vDepartment= $row['vDepartment'];
                       $vDesignation= $row['vDesignation'];
                       $vAgency= $row['vAgency'];
                      $dRequestDate = $row['dRequestDate'];

                      $vNamex=$_SESSION['SESS_vName'];
                     
                      $cApprover1 = $row['cApprover1Status'];

                       $x = Mir('encrypt', $cControlNumber);   

                       $a = Mir('encrypt', $vNamex);   
           
                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $vName . '</td>';
                   

                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button>';

                 
                    /*--------------------------BEGIN MODAL----------------------------------------*/
                  /*--------------------------this handles the pop up message--------------------*/
                    echo '<div id="message' . $nAutoNum . '" class="modal fade" role="dialog">
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br>
                      <strong>Agency: </strong> ' . $vAgency  . '<br><br>

                      ';


                     //include ('ViewDetailsHRD.php');



                    echo '

                    <form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>

                    ';




               

                    echo'





                  </div>
                </div>
              </div></td>'; 

              /*--------------------------END MODAL----------------------------------------*/
                    echo '</tr>';   









                    
                  }
                ?>
              </body>
            </table>
        </div>
    </div>
















  







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





<?php
          if (isset($_SESSION['U_ErrorMessage']))
          {
            echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>';
            echo '<p style="color:red">';
            //echo $_SESSION['U_ErrorMessage'];
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
