<?php
session_start();
//include('Auth.php');
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


 
<body class="hold-transition skin-blue sidebar-mini fixed" " >


  <div class="content-wrapper">
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

    

 
 <!--Active Box-->
  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">Pending PIF Requests</h3></div>
          <div class="box-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Request Date</th>
                  <th>Request is currently at:</th>
             
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $functionqry = "Select * from tblpayroll where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'";
                  $result = mysql_query($functionqry ) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['id'];
                      $cControlNumber = $row['cControlNumber'];
                      $dRequestDate = $row['dRequestDate'];
                     $vName= $row['vName'];
                       $vDepartment= $row['vDepartment'];
                       $vDesignation= $row['vDesignation'];
                      $dRequestDate = $row['dRequestDate'];
                       $cCurrentLocation = $row['cCurrentLocation'];
                      

                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                     echo '<td>' . $cCurrentLocation . '</td>';

                    
                   
                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button>';

                //pop up message
                 
                    echo '<div id="message' . $nAutoNum . '" class="modal fade" role="dialog">
                <div class="modal-dialog"  style="width:1000px">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Payroll Inquiry Request Details</h4>
                    </div>
                    <div class="modal-body">
                      <strong>Control Number: </strong> ' . $cControlNumber  . '<br>
                      <strong>Name: </strong> ' . $vName  . '<br>
                      <strong>Department: </strong> ' . $vDepartment  . '<br>
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>



                      ';
                      //php that will pop out in the modal window
                      include ('ViewDetailsUser.php');
                      echo '<br><br>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                  </div>

                </div>
              </div></td>';

             //modal 

                   echo '</tr>';                   
                  } 


                ?>
              </body>
            </table>
        </div>
    </div>

<!--ARCHIVE BOX -->

           <div class="box box-primary">
          <div class="box-header"><h3 class="box-title">Archived PIF Requests</h3></div>
           <div class="box-body">
          <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Request Date</th>
                  <th>Request is currently at:</th>
             
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $functionqry = "Select * from tblpayrollh where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'";
                  $result = mysql_query($functionqry) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      $nAutoNum = $row['id'];
                      $cControlNumber = $row['cControlNumber'];
                      $dRequestDate = $row['dRequestDate'];
                     $vName= $row['vName'];
                       $vDepartment= $row['vDepartment'];
                       $vDesignation= $row['vDesignation'];
                      $dRequestDate = $row['dRequestDate'];
                      $cCurrentLocation = $row['cCurrentLocation'];
                      

                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                      echo '<td>' . $cCurrentLocation . '</td>';


                    
                   
                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button>';

        //modal
                    echo '<div id="message' . $nAutoNum . '" class="modal fade" role="dialog">
                <div class="modal-dialog"  style="width:1000px">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request Details</h4>
                    </div>
                    <div class="modal-body">
                      <strong>Control Number: </strong> ' . $cControlNumber  . '<br>
                      <strong>Name: </strong> ' . $vName  . '<br>
                      <strong>Department: </strong> ' . $vDepartment  . '<br>
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>



                      ';
                      //location of pop out php window
                      include ('ViewDetailsUserH.php');
                      echo '<br><br>

                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

                </div>

                </div>
                </div></td>';

             //modal

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


<!--add to queue-->










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
