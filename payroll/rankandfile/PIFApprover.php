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
      <i class="fa fa-calculator"></i> <strong>Payroll</strong>
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

 
<body class="hold-transition skin-blue sidebar-mini fixed" " >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
    <h1><i class ="fa fa-file-powerpoint-o"></i> Payroll Inquiry Form Approval</h1>
    <ol class="breadcrumb">
    <li><a href="../../../mainpage.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#">Payroll Inquiry Form</a></li>
        <li class="active">Payroll Inquiry for Approval</li>
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
                  <th>System ID</th>
                  <th>Request Date</th>
                  <th>Name</th>
                  <th>Options</th>
                </tr>
              </thead>
      
              <tbody>
                <?php
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where vAppName = '" . trim($_SESSION['SESS_vName']) . "' and cStatus = 'PENDING' ) order by dRequestDate desc";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['id'];
                      $cControlNumber = $row['cControlNumber'];
                       $vName= $row['vName'];
                       $vDepartment= $row['vDepartment'];
                       $vDesignation= $row['vDesignation'];
                      $dRequestDate = $row['dRequestDate'];
                     
                      $cApprover1 = $row['cApprover1Status'];
                     
                      $vName = $row['vName'];
                      
                     $x = Mir('encrypt', $cControlNumber);    

                        //check current level of approval
            $CurrentLevel=0;
            $flvl = "SELECT * from tblapprovers where cControlNumber = '" . $cControlNumber . "' and vAppName = '" . $_SESSION['SESS_vName'] . "'";
            $rlvl = mysql_query($flvl) or die(mysql_error());
            while ($rowlvl = mysql_fetch_array($rlvl))
              {
                $CurrentLevel = $rowlvl['nLevel'];
              } 
                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $vName . '</td>';
                   
            $flvlx = "SELECT * from tblpayrolldetails where cControlNumber = '" . $cControlNumber . "'";
            $rlvlx = mysql_query($flvlx) or die(mysql_error());
            while ($rowlvlx = mysql_fetch_array($rlvlx))
              {
                $dReason = $rowlvlx['dReason'];

                 $d = Mir('encrypt', $dReason);    
                 } 

                 //lvl max
              $query123 = "SELECT max(nLevel) as 'nMax' from tblapprovers where cControlNumber = '" .  $cControlNumber . "'"; 
              $result123 = mysql_query($query123) or die(mysql_error());
              while ($row123 = mysql_fetch_array($result123))  
                {
                  $nMaxz = $row123['nMax'];
                }

               // echo '<td>' . $dReason . '</td>';


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
                       


                       /* echo '<table>';
                        echo '<tr><td>';
                        echo '<form method="GET" action="ApproveNReject.php">';
                        echo '<input type="hidden" value="' . $CurrentLevel  . '" name="w">';
                        echo '<input type="hidden" value="' . $Approve  . '" name="x">';
                        echo '<input type="hidden" value="' . $x  . '" name="y">';
                         echo '<input type="hidden" value="' . $d  . '" name="c">';
                        echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
                        echo '</form></td>';
                        echo '<td>';
                        echo '<form method="GET" action="ApproveNReject.php">';
                        echo '<input type="hidden" value="' . $CurrentLevel  . '" name="w">';
                        echo '<input type="hidden" value="' . $Reject  . '" name="x">';
                        echo '<input type="hidden" value="' . $x  . '" name="y">';
                        echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                        echo '</form></td></table>';*/


                         echo '<table>';
                        echo '<tr><td>';
                        echo '<form method="GET" action="AandR.php">';
                        echo '<input type="hidden" value="' . $CurrentLevel  . '" name="nlvl">';
                        echo '<input type="hidden" value="APPROVED" name="x">';
                        echo '<input type="hidden" value="' . $cControlNumber  . '" name="cSysIdx">';
                        echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                         echo '<input type="hidden" value="' . $dReason  . '" name="c">';
                        echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
                        echo '</form></td>';
                        echo '<td>';
                        echo '<form method="GET" action="AandR.php">';
                        echo '<input type="hidden" value="' . $CurrentLevel  . '" name="nlvl">';
                        echo '<input type="hidden" value="REJECTED" name="x">';
                        echo '<input type="hidden" value="' . $cControlNumber  . '" name="cSysIdx">';
                        echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                         echo '<input type="hidden" value="' . $dReason  . '" name="c">';
                        echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                        echo '</form></td></table>';
  

                      }
                      
                      echo '</div>
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
    /*$('.timepicker').timepicker({
      showInputs: false
    })*/
  })
</script>
</body>
</html>
