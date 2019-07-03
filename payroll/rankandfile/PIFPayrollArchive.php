<?php
  session_start();
  $cIDNumberx = $_SESSION['SESS_cIDNumber'];
  $vAppNamex = $_SESSION['SESS_vName'];
include('DBConnect4.php');
  include ('../../Auth.php');

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

          <li class="dropdown tasks-menu">
            <a href="../../../eEmpRequests/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-laptop"></i><span> Employees PO</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
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
          <li title="Payroll Inquiry Form"><a href="PIFPayroll.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>
     
          <li title="Payroll Inquiry Form"><a href="PIFPayrollArchive.php"><i class="fa fa-file-zip-o"></i>Payroll Archive Requests</a></li>
          
          <li><a href="../../Mainpage.php"><i class="glyphicon glyphicon-log-out"></i><span>Return</span></a></li>
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
    
 <section class="content" id="sectionID">
 
  <div class="box box-primary col-md-12">

      
        <div class="box-header"><h3 class="box-title"><i class="fa fa-file-text-o"></i> Pending for Processing</h3>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>Control Number</center></th>
                  <th><center>Date Requested</center></th>
                  <th><center>Employee Name</center></th>
                   <th><center>Company</center></th>
                  <th><center>Actions</center></th>
                </tr>
              </thead>
              <tbody>

<?php
                

                 $functionqry = "Select * from tblpayrollh order by dRequestDate desc";
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
                       $vAgency = $row['vAgency'];

                      $vNamex=$_SESSION['SESS_vName'];
                     
                      $cApprover1 = $row['cApprover1Status'];

                       $x = Mir('encrypt', $cControlNumber);   

                       $a = Mir('encrypt', $vNamex);   
           
                    echo '<tr>';
                    echo '<td>' . $cControlNumber . '</td>';
                    echo '<td>' . $dRequestDate . '</td>';
                    echo '<td>' . $vName . '</td>';
                     echo '<td>' . $vAgency . '</td>';

                    echo '<td><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#message' . $nAutoNum  . '"><i class="fa fa-file-text-o"></i> View Details</button> 
                     
                     ';


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


                     include ('ViewDetailsUserH.php');

                


                  }

?>



              </tbody>
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
 <!-- time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>


 <!-- DataTables -->
 <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>  

  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
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

 

 
   


</script>

</body>
</html>
