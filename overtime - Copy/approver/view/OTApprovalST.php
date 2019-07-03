<?php
  session_start();
  $cIDNumberx = $_SESSION['SESS_cIDNumber'];
  $vAppNamex = $_SESSION['SESS_vName'];
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

   <!-- DataTables -->
   <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
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
    <ul class="nav navbar-nav">

    <li class="dropdown tasks-menu">
            <a href="../../../../eEmpRelations/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Employee Relations</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown tasks-menu">
            <a href="../../../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown tasks-menu">
            <a href="../../../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
            <ul class="dropdown-menu"></ul>
    </li>

    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../../../dist/img/user2-160x160.png" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
      </a>
    <ul class="dropdown-menu">
          
    <li class="user-header">
    <img src="../../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

     <p>
      <?php echo trim($vAppNamex) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
      <small><?php echo $_SESSION['SESS_cIDNumber']?></small> 
      </p>
      </li>

      </li>
       <li class="user-footer">
   
      <div class="pull-right">
      <a href="../../../Logout.php" class="btn btn-default btn-flat">Sign out</a>
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
  <img src="../../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
  </div>
   <div class="pull-left info">
   <p><b><small><marquee scrolldelay="150"><?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
   
   <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
   </div>
   </div>
 

      <ul class="sidebar-menu" data-widget="tree">
        <center><li class="header">MAIN NAVIGATION</li></center>
        <!-- Optionally, you can add icons to the links -->

 
          <li title="Overtime Form"><a href="OTApprovalST.php"><i class="fa fa-file-text-o"></i>OT Application For Approval</a></li>
          <li><a href="../../../Mainpage.php"><i class="glyphicon glyphicon-log-out"></i><span>Return</span></a></li>

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
    <li><a href="../../../mainpage.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Overtime Approval</li>
    </ol>
    </section>
<!-- Breadcrumb -->
  <section class="content" id="sectionID">
 

  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title"><i class="fa fa-file-text-o"></i> Pending for Approval</h3></div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Filing Date</th>
                  <th>Employee Name</th>
                  <th>Store</th>
                  <th>Overtime Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $vAppN = $_SESSION['SESS_vName'];

                  $functionqry = "Select * from tOTProcess where cSysID in 
                                  (select cSysID from tApprover where vAppName = '" . $vAppNamex . "' and cStatus = 'PENDING' ) 
                                  order by dFiledDate desc";
                  $rslt = sqlsrv_query($conn, $functionqry);
                  while ($rowAz = sqlsrv_fetch_array($rslt))  
                    {
                     
                        $cSysIDx = trim($rowAz['cSysID']);
                        $vName= $rowAz['vName'];
                        $vDepartment= $rowAz['vDeptStore'];
                        $dFDate = $rowAz['dFiledDate'];
                        $dDate = trim($rowAz['dDate']);
                        $dFrom = trim($rowAz['dFrom']);
                        $dTo = $rowAz['dTo'];
                        $vReason1 = $rowAz['vReason'];
                        $vReason2 = $rowAz['vOtherR'];

                        echo '<tr>';
                        echo '<td>' . $dFDate . '</td>';
                        echo '<td>' . $vName . '</td>';
                        echo '<td>' . $vDepartment . '</td>';
                        echo '<td>' . $dDate . '</td>';
                /*--------------------------------------Editable Time-----------------------------*/
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
                                    <strong>Date Filed: </strong> ' . $dFDate  . '<br>
                                    <strong>Time Coverage: </strong> ' . $dFrom .' to '. $dTo . '<br><hr>';

                                    if(trim($vReason2)==''){
                                      echo '<strong>Reason: </strong> ' . $vReason1 .'<br><hr>';
                                    } else {
                                      echo '<strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';
                                    }
                                    
                                  
                                    include ('../model/ViewDetails.php');
                                  
                                    echo '<br><br>';
                                    echo '<div class="modal-footer">';
                                     
                                    //include ('../model/ApproveReject.php');
                                  
                                    
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
                                                  echo '<form method="GET" action="../../response/approveXreject.php">';
                                                  echo '<input type="hidden" value="APPROVED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                                  echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
        
                                                
        
                                                  echo '</form></td>';
                                                  echo '<td>';
                                                  echo '<form method="GET" action="../../response/approveXreject.php">';
                                                  echo '<input type="hidden" value="REJECTED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
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

              </body>
            </table>
        </div>
    </div>



  </section>
    <!-- /.content -->
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

  $(function (){
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
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
