<?php
session_start();
//include('Auth.php');
//include('DBConnect.php');
  $eid = 0;

  //need for encryption from sir raymir
include('MirFunctions.php');

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
       <center><li class="header"><font color="white"> MAIN NAVIGATION</font></li></center>
        <!-- Optionally, you can add icons to the links -->
     
        <!--<li><a href="../../views/ChangePassword.php"><i class="fa fa-history"></i> <span>Change Password</span></a></li>-->
    
        <li title="Payroll Inquiry Form"><a href="PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>
        <li title="Payroll Inquiry Form"><a href="PIFRequests.php"><i class="fa fa-file-text-o"></i>Filed PIF Request</a></li>
        

      </ul>
     </section>

    </aside>

 <!--END OF SIDEBAR MENU-->   

 
<body class="hold-transition skin-blue sidebar-mini fixed" onload="LoadOTdetails()" >

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



          <div class="col-md-4">
              <label>ID Number: </label>
                    <div class="form-group">
                          <input id="tID" name="tIDno" type="text" class="form-control" onchange="SearchEmp(this.value, '<?php echo $vdept ?>')">
                    </div>
              </div>

              <div class="col-md-8">
              <label>Employee Name: </label>
                    <div class="form-group">
                          <input id="tEmp" type="text" class="form-control" readonly="true">
                    </div>
              </div>

              <div class="col-sm-6">
              <label>Department: </label>
                    <div class="form-group">
                          <input id="tDept" type="text" class="form-control" readonly="true">
                    </div>
              </div>

              <div class="col-sm-6">
              <label>Designation: </label>
                    <div class="form-group">
                          <input id="tDesig" type="text" class="form-control" readonly="true">
                    </div>
              </div>
<br>
                <div class="col-sm-6">
              <label>Agency: </label>
                    <div class="form-group">
                          <input id="tAgency" type="text" class="form-control" readonly="true">
                    </div>
              </div>

              <div class="col-sm-6">
              <label>Approver: </label>
                    <div class="form-group">
                          <input id="tAppName" type="text" class="form-control" readonly="true">
                           <input id="tEmail" type="hidden" class="form-control" readonly="true">
                    </div>
              </div>
            




      
      <div class="form-group">
        <div class="box-body">
        
     <br>    
  



    
          <!-- Date range -->
              <div id="LDetails" name="LDetails">
              <div class="col-md-12">
              
              <div class="form-group">
              <label>Date of the <u>PIF Request</u> <i> <font color="grey">(not the date today!)</font></i>:  </label>
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
              <div class="col-md-40">
              </div>
                    <div class="col-sm-4">
                    <select class="form-control select" id="tMonth" name="dMonth">
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
                    <select class="form-control select" id="tYear" name="dYear">

                    <option>2018</option>
                    <option>2019</option>
                  
                    </option>
                    </select></div>
                    <div class="col-sm-4">
                    <select class="form-control select" id="tCutoff" name="dCutoff">

                    <option>1st Half</option>
                    <option>2nd Half</option>
                  
                    </option>
                    </select></div>
              <br>
              &nbsp; &nbsp; &nbsp;
              <label>Reason of Request: </label>
                <div class="col-md-12">
                    <select class="form-control select" id="tReason" name="dReason">";
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
                  
                  <div class="form-group">
                  <label>Additional Remarks:</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Remarks" id="tAddRemarks" ></textarea>
                </div>



                  </div>
                  </div>
                  </div>
                  
                  <div id="LApprover" name="LApprover">

                  </div> 
                  
                  <div class="box box-footer pull-right">
                  
                  <div class="col-md-4 pull-right">
                 
                    <input class=" btn btn-primary " type="submit" name="submit" value="Add To Queue" onclick="AddQ()"> </a>
                  </div>
              
                </div>
              </div>
      
      </div>
    </div>





  </div>


        
 
     
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Details</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"></i>
                </button>
            </div>
          </div>
 
          <div class="box-body">
            <table id="tblleaveinfoID" class="table table-bordered table-hover"> 
              <thead>  
                <tr> 
                  <th>Employee Details</th> 
                  <th>Nature of Inquiry Details</th> 
                   <th>Remarks</th> 
                  <th>Action</th> 
                 
                </tr> 
              </thead>
              <tbody id="tblOTdet"></tbody>
              <tbody></tbody>
             </table>
          </div>

        </div>
        


  <div class="box box-primary with-border">
        
         
          <div class="box-body">

    <h4 class="box-title">Application Notes</h4>
          </div>
          <div class="box-body">
            1.) Make sure the PIF you are filing is okay for adjustment. <br>
            2.) Strictly no refiling!<br>
            3.) Same date and same reason of PIF is not allowed.


         <br><br>   
        <div class="col-md-3 pull-right"   id="btnsubshow">
                <form action="SubmitPIFRequest.php">
                 <button id="btnsubmit" type="submit" class="btn btn-block btn-primary btn-sm">
                   </i> Submit</button>
                </form>
              </div>
        </div>
        </div>
                     
                  

      </div>
              
    




    


</div>





<!--alertify js -->

        <?php
          if (isset($_SESSION['U_ErrorMessage']))
          {
            echo '<script>alertify.error(\'' . $_SESSION['U_ErrorMessage'] . '\');</script>';
            echo '<p style="color:red">';
           // echo $_SESSION['U_ErrorMessage'];// enable if you want to show text instead of modal
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






<script type="text/javascript">


 



//search emp
      
function SearchEmp(str, dept){

    var cidno = str;
    var deptx = dept;
    
    var nax = 'N/A';

    
    $.ajax({ 
      type:"post",
      url:"getUserDetails.php",
      data:{cidnoX:cidno},
      datatype: "JSON",
      success: function(valx){
        var vnamex = JSON.parse(valx);
        var namex = vnamex.jName;
        var deptz = vnamex.jDept;
        var designz = vnamex.jDesign;
        var Agentz = vnamex.jAgency;
        var AppNamez = vnamex.jAppName;
        var Emailz = vnamex.jEmail;
      
              $('#tEmp').val(namex);
              $('#tDept').val(deptz);
              $('#tDesig').val(designz);
              $('#tAgency').val(Agentz);
              $('#tAppName').val(AppNamez);
               $('#tEmail').val(Emailz);


      }
    })
  }







//add to que
 function LoadOTdetails(){
    $('#tblOTdet').load('PostQueue.php');
  }
 function AddQ(){
    var EmpName = $('#tEmp').val();
    var EmpID = $('#tID').val();
    var EmpDept = $('#tDept').val();
    var EmpDesig = $('#tDesig').val();
    var EmpAgency = $('#tAgency').val();
    var EmpDate = $('#datepicker').val();
    var EmpMonth = $('#tMonth').val();
    var EmpYear = $('#tYear').val();
    var EmpCutoff = $('#tCutoff').val();
    var EmpReason = $('#tReason').val();
    var EmpApp = $('#tAppName').val();
    var EmpEmail = $('#tEmail').val();
    var EmpAddRemarks = $('#tAddRemarks').val();

 if (EmpID==''){
            alertify.error('No selected Employee! Please fill-up required field!');
            return;
      }
  if (EmpDept==''){
            alertify.error('No selected Employee! Please fill-up required field!');
            return;
      }   

 if (EmpDesig==''){
            alertify.error('No selected Employee! Please fill-up required field!');
            return;
      }      

 if (EmpAgency==''){
            alertify.error('No selected Employee! Please fill-up required field!');
            return;
      }  

  if (EmpDate==''){
            alertify.error('No selected Date of Inquiry! Please fill-up required field!');
            return;
      }

    if (EmpApp==''){
            alertify.error('Employee has no Saved Approver!Kindly ask employee to save Approver in Global Approval Page!');
            return;
      }


      $.ajax({
              type: "post",
              url :"RequestQ2.php", //dito ka magsave ng data
              data: { 
                      EmpNamex: EmpName,
                      EmpIDx: EmpID,
                      EmpDeptx: EmpDept,
                      EmpDesigx: EmpDesig,
                      EmpAgencyx: EmpAgency,
                      EmpDatex: EmpDate,
                      EmpMonthx: EmpMonth,
                      EmpYearx: EmpYear,
                      EmpCutoffx: EmpCutoff,
                       EmpReasonx: EmpReason,
                       EmpAppx: EmpApp,
                       EmpEmailx: EmpEmail,
                       EmpAddRemarksx: EmpAddRemarks
                    },
               success: function(isOK){ 
                         
                          LoadOTdetails();
                          alertify.success('Successfully Added to Queue!');
                            return;

                          
                },
              
            })

  }


  



  

</script>








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
