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
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Payroll Inquiry Form | Guess Employee Online System</title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">


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















  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

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
          <li title="Payroll Inquiry Form"><a href="PIFHR.php"><i class="fa fa-file-zip-o"></i>PIF for Remarks</a></li>
    <li title="Payroll Inquiry Form"><a href="PIFHRArchive.php"><i class="fa fa-file-zip-o"></i>Payroll Archive Requests</a></li>
         <li title="Return to Homepage"><a href="../../../../guessemployeeonline/MainPage.php"><i class="glyphicon glyphicon-log-out"></i> <span title="Return to Homepage">Return</span></a></li>
      </ul> 

          </span>
          </a>


          <ul class="treeview-menu">

           <li title="Payroll Inquiry Form"><a href="PIFPayroll.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>
          <li title="Payroll Inquiry Form"><a href="PIFPayrollArchive.php"><i class="fa fa-file-zip-o"></i>Payroll Archive Requests</a></li>




         
          </ul>
          </li>

      </ul>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
         
            
              <li class="active"><a href="#restel" data-toggle="tab">RESTEL </a></li>
              <li><a href="#kings" data-toggle="tab">KINGS </a></li>
              <li><a href="#pmount" data-toggle="tab">PARAMOUNT </a></li>
              <li><a href="#jbp" data-toggle="tab">JOB PLACEMENT </a></li>
              <li><a href="#yearn" data-toggle="tab">YEARNINGS </a></li>
               <li><a href="#allemp" data-toggle="tab">ALL EMPLOYEES </a></li>
            </ul>


            <div class="tab-content">
              



    <!-- RESTEL Employees -->
 <div class="tab-pane" id="restel">
    <div class="box-header"><h3 class="box-title">Restel Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where cApprover1Status = 'APPROVED' and cCurrentLocation = 'Payroll for Processing') and vAgency='RESTEL-MPC' order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');



                   




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- RESTEL Employees -->


   <!-- KINGS Employees -->
 <div class="tab-pane" id="kings">
    <div class="box-header"><h3 class="box-title">Kings Cooperative Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from cooptblpayroll where cControlNumber in (select cControlNumber from tblappcoop where cApprover1Status = 'APPROVED' and cCurrentLocation = 'HRD for Validation') and vAgency='KINGS COOPERATIVE' order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');



                   




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- KINGS Employees -->



 <!-- Paramount Employees -->
 <div class="tab-pane" id="pmount">
    <div class="box-header"><h3 class="box-title">Paramount Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where cApprover1Status = 'APPROVED' and cCurrentLocation = 'Payroll for Processing') and vAgency='Paramount MPC' order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');



                   




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- Paramount Employees -->




 <!-- JOB PLACEMENT Employees -->
 <div class="tab-pane" id="jbp">
    <div class="box-header"><h3 class="box-title">Job Placement Resources Service Coop Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where cApprover1Status = 'APPROVED' and cCurrentLocation = 'Payroll for Processing') and vAgency='Job Placement Resources Service Coop' order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');



                   




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- JOB PLACEMENT Employees -->




<!-- YEARNINGS Employees -->
 <div class="tab-pane" id="yearn">
    <div class="box-header"><h3 class="box-title">Yearnings Outsourcing Cooperative Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where cApprover1Status = 'APPROVED' and cCurrentLocation = 'Payroll for Processing') and vAgency='YEARNINGS OUTSOURCING COOPERATIVE' order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');



                   




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- YEARNINGS Employees -->



<!-- ALL Employees -->
 <div class="tab-pane" id="allemp">
    <div class="box-header"><h3 class="box-title">All Employees-Pending for Approval</h3></div>

     
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
                  $functionqry = "Select * from tblpayroll where cControlNumber in (select cControlNumber from tblapprovers where cApprover1Status = 'APPROVED' and cCurrentLocation = 'Payroll for Processing') order by dRequestDate desc";
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
                      <strong>Designation: </strong> ' . $vDesignation  . '<br><br>

                      ';


                     include ('ViewDetailsPayroll.php');




                   echo' <br>';

                    echo'<form method="GET" action="ArchivePayroll.php">
    
                      <input type="hidden" value="' . $x  . '" name="y">
                      

                      <button type="submit" class="btn btn-danger">Archive Request</button>
                      </form>
                      <td>





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

     <!-- YEARNINGS Employees -->















<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
