<?php
  session_start();
  include ('../../../config/dbconfig-OT2.php');
  include ('../../Auth.php');
  $vdept = $_SESSION['SESS_vDepartment'];
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

 
<body class="hold-transition skin-blue sidebar-mini fixed"  onload="LoadOTdetails()">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<!-- Breadcrumb -->
    <section class="content-header">
    <h1><i class ="fa fa-clock-o"></i> Overtime Application Form</h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Payroll Inquiry</a></li>
        <li><a href="#">Overtime Form</a></li>
        <li class="active">Overtime Application</li>
    </ol>
    </section>
<!-- Breadcrumb -->

  <section class="content" id="sectionID">
  <!--left box -->
    <div class="row">
      <div class="col-md-6" >
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Fill up the Information</h3>
            <div class="box-tools pull-right">
                <!-- <button type="btnRef" onclick="myFunction();" title="Refresh Application Form"class="btn btn-box-tool"><i class="fa fa-refresh"></i>  Refresh -->
                <!-- </button> -->
            </div>
          </div>
      
       <form method="POST"  action="../model/AddOTDetailsST.php">
            <!-- alertift div -->
              <div class="box-body">
              <div id="alert" style="display:none;" class="alert alert-success text-center alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>
                  <span id="alertID"></span></h4>
              </div>

              <div id="errI" style="display:none;" class="alert alert-danger text-center alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-times"></i>
                  <span id="errID"></span></h4>
              </div>
      

              <!-- Date time today -->
              <div class="col-md-6">
              <div class="form-group">
                <label>Date Today:  <?php echo date("m/d/Y"); ?></label>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
              <label for="dlastf">Date Last Filed: <?php include ('../model/getLastFiledST.php') ?></label>
              </div>
              </div>

         
              <div class="col-md-3">
              <label>ID Number: </label>
                    <div class="form-group">
                          <input id="tID" name="tIDno" type="text" class="form-control" onchange="SearchEmp(this.value, '<?php echo $vdept ?>')">
                    </div>
              </div>

              <div class="col-md-9">
              <label>Employee Name: </label>
                    <div class="form-group">
                          <input id="tPos" type="text" class="form-control" readonly="true">
                    </div>
              </div>

              
              <!-- Date range -->
           
              <div class="col-md-7">
                 <div class="form-group">
                    <label>Overtime Date:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="datepickapp" onchange="checkIfvalid();">
                    </div>
                 </div> 
              </div>

         
              <div id="tAuth" class="col-md-5" style="display:none;">
                <div class="form-group">
                      <label>Passcode:</label>
                      <input id="tAuthCode" name ="tAuthCodex" type="text" class="form-control"
                      placeholder="Passcode override here.."></textarea>
                </div>
              </div>
              
              <div class="col-md-12">
                <center><p id="pNotice" style="display:none;" class="help-block">
                    <font color="red">
                      **Selected date exceeded on valid OT filing days! Please send an e-mail on your <b><i>ASM</i></b>
                      for <b>OT Approval & Passcode Override</b> request to proceed the OT filing.** <br><b>NOTE:</b>
                      Copy/Cc: <i>Helpdesk</i> on your e-mail.
                    </font>
                  </p>
                </center>
              </div>

              <!-- OT Time From -->
              <div class="col-md-6">
              <label>Overtime From:</label>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">                
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="tFrom" type="text" class="form-control timepicker">                 
                            </div>
                        </div>
                    </div>
              </div>

              <!-- OT Time To -->
              
              <div class="col-md-6">
              <label>To:</label>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="tTo" type="text" class="form-control timepicker">
                            </div>
                        </div>
                    </div>
              </div>

              <!-- Shift From -->
              
              <div class="col-md-6">
              <label>Shift From:</label>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">                
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="sFrom" type="text" class="form-control timepicker">                 
                            </div>
                        </div>
                    </div>
              </div>

              <!-- Shift To -->
              
              <div class="col-md-6">
              <label>To:</label>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input id="sTo" type="text" class="form-control timepicker">
                            </div>
                        </div>
                    </div>
              </div>

              <!-- Day off -->
              <div class="col-md-7">
              <label id="dOff">Day Off: </label>
                    <div class="form-group">
                      <select class="form-control select" id="DoffSelectx">
                        <option selected> </option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                      </select>
                    </div>
              </div>


              <!-- Reason -->
              <div class="col-md-7">
              <label>Reason: </label>
                    <div class="form-group">
                      <select class="form-control select" id="rSelect" onchange="onChangeR(this.value);">
                          <option selected="selected"></option>
                          <option>Audit Count</option>
                          <option>Construction Overtime</option>                       
                          <option>Delivery or STS Receiving and Preparation</option>
                          <option>Mall wide sale</option>
                          <option>Switch Out</option>
                          <option>Reliever</option>
                          <option>Holiday Pay</option>
                          <option>Others</option>
                      </select>
                    </div>
              </div>
                
          
              <!-- Other Reason -->
              
              <div id="tReasonx" class="col-md-12" style="display:none;">
                <div class="form-group">
                      <label>Other Reason:</label>
                      <textarea id="reasonTx" type="text" class="form-control" rows="4"
                      placeholder="[Enter your other reason regarding your overtime application]"></textarea>
                </div>
              </div>

              </div>  
                <div id="LApprover" name="LApprover">
              </div>
              
              <div class="box box-footer pull-right">
                  <div class="col-md-3 pull-right">
                    <input type="input" style="display:none;" id="isValid" name="isValidx" >
                    <button type="button" class="btn btn-block btn-primary btn-sm" onclick="SubmitOT()" id="btnaddDet"><i class="fa fa-plus"></i> Add Details</button>
                  </div>
              </div>
      
       </form>
      </div>
     </div>
    

  <!--right box -->
    
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Overtime Details</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
          </div>
 
          <div class="box-body">
            <table id="tblleaveinfoID" class="table table-bordered table-hover"> 
              <thead>  
                <tr> 
                  <th>Employee Name</th> 
                  <th>OT Date</th> 
                  <th>Time Covered</th> 
                  <th>Option</th> 
                </tr> 
              </thead>
              <tbody id="tblOTdet"></tbody>
              <tbody></tbody>
             </table>
          </div>

        </div>
        
      </div>
      
      <div class="col-md-6" id="aView">
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Approver Details</h3>
          </div>

          <div class="box-body">
              <table id="tblleaveApproverID" class="table table-bordered table-hover"> 
                <thead> 
                  <tr> 
                    <th>Approver Name</th> 
                  </tr>
                </thead>
                <?php include('../model/getApproverST.php') ?>
              </table>
          </div>

          <div class="box box-footer pull-right" id="sFooter">
              <div class="col-md-3 pull-right"   id="btnsubshow">
                <form action="../model/SubmitOTDetailsST.php">
                 <button id="btnsubmit" type="submit" class="btn btn-block btn-success btn-sm">
                   <i class="fa fa-paper-plane"></i> Submit</button>
                </form>
              </div>
          </div>

      </div>
      </div>

      <div class="col-md-6 pull-right" id="dView">
        
        <div class="box box-primary with-border">
          <div class="box-header">
            <h3 class="box-title">Application Notes</h3>
          </div>

          <div class="box-body">
            1.) Overtime Application that exceeds on valid filing days needed an <b>E-mail Verification</b> from
                your designated <b>ASM</b> before our <i>Helpdesk</i> personnel issue the Passcode.<br><br>

            2.) For <b><i>LPP Employee(s)</i></b>, Please let your <b>Store Head/Supervisor</b> file your overtime application
            using your account for your approval directly be sent to <b>Loss Prevention Assistant Manager </b>.<br><br>

            3.) Always check the <b>List of Approver(s)</b> before submitting the Overtime Application.
          
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
 
 <!-- time picker -->
<script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>

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
 
  })

  function onChangeR(str){
    if(str == "Others"){
      $('#tReasonx').show();
    } else {
      var xnull = null;
      $('#tReasonx').hide();
      $('#tReasonx').val(xnull);
    }
  }

  function SearchEmp(str, dept){

    var cidno = str;
    var deptx = dept;
    var nax = 'N/A';

    
    $.ajax({ 
      type:"post",
      url:"../model/getEmpName.php",
      data:{cidnoX:cidno},
      datatype: "JSON",
      success: function(valx){
        var vnamex = JSON.parse(valx);
        var namex = vnamex.jName;
        var deptz = vnamex.jDept;

        alertify.set({
          labels : {
            ok     : "Yes",
            cancel : "No"
          },
          delay : 5000,
          buttonReverse : true,
          buttonFocus   : "Yes"
        });
        
        if(deptx == deptz) {
            $('#tPos').val(namex);
        } else {
          alertify.confirm("Do you want to file overtime application for this employee?", function (e) {
            if (e) { 
              $('#tPos').val(namex);
            } else {
              $('#tPos').val(nax);
            }
          })
        }
      }
    })
  }
  

  function checkIfvalid(){
    var OTDate = $('#reservation').val();

    $.ajax({
      type:"POST",
      url:"../model/CheckIfValid.php",
      data:{OTd:OTDate},
      success: function(valx){
        if(valx >= 3){
          $('#tAuth').show();
          $('#pNotice').show();
          $('#isValid').val('0');
        } else {
          $('#tAuth').hide();
          $('#pNotice').hide();
          $('#isValid').val('1');
        }
      }
    })
  }

  function LoadOTdetails(){
    $('#tblOTdet').load('../model/getOTDetailsST.php');
  }


  //

  function SubmitOT(){
    var EmpName = $('#tPos').val();
    var EmpID = $('#tID').val();
    var OTDate = $('#reservation').val();
    var OTPass = $('#tAuthCode').val();
    var OTFrom = $('#tFrom').val();
    var OTTo = $('#tTo').val();
    var SFrom = $('#sFrom').val();
    var STo = $('#sTo').val();
    var Doff = $('#DoffSelectx').val();
    var Reason1 = $('#rSelect').val();
    var Reason2 = $('#reasonTx').val();
    var isValid = $('#isValid').val();


      if (EmpName==''){
            alertify.error('No selected employee! Please fill-up equired field!');
            return;
      }

      if (EmpID==''){
            alertify.error('No ID number entered! Please fill-up equired field!');
            return;
      }

      if (OTDate==''){
          alertify.error('No selected overtime date! Please fill-up equired field!');
          return;
      }

      if (Doff==''){
          alertify.error('No selected day-off details! Please fill-up equired field!');
          return;
      }

      if (Reason1==''){
          alertify.error('No selected reason for overtime! Please fill-up equired field!');
          return;
      } else if (Reason1=='Others'){
          if (Reason2==''){
            alertify.error('Please input other reason for overtime!');
            return;
        }
      }

      $.ajax({
              type: "post",
              url :"../model/AddOTDetailsST.php", //dito ka magsave ng data
              data: { 
                      EmpNamex: EmpName,
                      EmpIDx: EmpID,
                      OTDatex: OTDate,
                      OTPassx: OTPass,
                      OTFromx: OTFrom,
                      OTTox: OTTo, 
                      SFromx: SFrom, 
                      STox: STo, 
                      Doffx: Doff,
                      Reason1x: Reason1,
                      Reason2x: Reason2,
                      isValidx: isValid,
                    },
               success: function(isOK){ 
                          if(MirTrim(isOK)=='OT Details Successfully Added!!')
                          {
                            alertify.success(isOK);
                            LoadOTdetails();
                          }
                          else
                          {
                            alertify.error(isOK);
                          }
                
                },
               error: function(){ 
                alert('Unable to save leave. please call IT for support');}
            })

  }

  function MirTrim(x) {
          return x.replace(/^\s+|\s+$/gm,'');
  }







</script>

</body>
</html>
