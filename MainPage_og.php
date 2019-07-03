<?php
session_start();
include ('Auth.php');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
--> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mainpage | Guess Employee Online System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Alertify -->
  <link rel="stylesheet" href="plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="plugins/alertify/alertify.default.css">
  <!-- alertify script -->
  <script src="plugins/alertify/alertify.js"></script>
  <script src="plugins/alertify/alertify.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="mainpage.php" class="logo">
      <i class="fa fa-building"></i> DII eSystem
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown tasks-menu">
            <a href="../../eEmpRequests/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-laptop"></i><span> Employees PO</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <?php 
            if(trim($_SESSION['SESS_cJobClass'])=='Managerial' && trim($_SESSION['SESS_cArea'])=='HO'){
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_vDepartment'])=='HHR: HRD') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            } elseif(trim($_SESSION['SESS_cJobClass'])=='Executive') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';

             } elseif(trim($_SESSION['SESS_vSection'])=='Payroll, Planning & Budget' && trim($_SESSION['SESS_cJobClass'])=='Supervisory') {
              echo'
              <li class="dropdown tasks-menu">
                <a href="../eStaffMngt/esm_dashboard.php" class="dropdown-toggle" ><i class="fa fa-sitemap"></i><span> Staff Management</span></a>
                <ul class="dropdown-menu"></ul>
              </li>';
            }
            
          ?>


          <li class="dropdown tasks-menu">
            <a href="../../eLeave/config/provide_access.php" class="dropdown-toggle" ><i class="fa fa-calendar"></i><span> Leave Application</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

          <li class="dropdown tasks-menu">
            <a href="../../eUniform/config/provide_access.php" class="dropdown-toggle"><i class="fa fa-list-alt"></i><span> Uniform Issuance</span></a>
            <ul class="dropdown-menu"></ul>
          </li>

         <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
                  <small><?php echo $_SESSION['SESS_cIDNumber']?></small> 
                </p>
              </li>

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="Logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><b><small><marquee scrolldelay="150"><?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
          <!-- Status -->
          <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <center><li class="header"> <font color="white">MAIN NAVIGATION</font></li></center>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="Mainpage.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="views/ChangePassword.php"><i class="fa fa-history"></i> <span>Change Password</span></a></li>
        <li><a href="views/GlobalApprovals.php"><i class="fa fa-check-circle-o"></i> <span>Online Approval(s)</span></a></li>

        <?php 
         
           echo '<li class="treeview">';
          echo '<a href="#"><i class="fa fa-calculator"></i> <span>Payroll Inquiry</span>';
          echo '<span class="pull-right-container">';
          echo '<i class="fa fa-angle-left pull-right"></i>';
          echo '</span>';
          echo '</a>';
          echo '<ul class="treeview-menu">';
           echo '<li title="Payroll History"><a href="views/PayrollHistory.php"><i class="fa fa-share-square-o"></i>Payroll History</a></li>';
         
          if (trim($_SESSION['SESS_cU_AccountType'])=='User' )
            { 
                // OT Start
                if (trim($_SESSION['SESS_cBranch'])=='Head Office')
                {
                    echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
                    
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcHO.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                  

                  //enable below for maintenance
                    //echo '<li title="Overtime Form"><a href="#"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                    //echo '<li title="Pending & Archive OT"><a href="#"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';

                    if (trim($_SESSION['SESS_vDesignation'])=='IT Helpdesk')
                    {
                      echo '<li class="treeview">';
                        echo '<a href="#"><i class="fa fa-user"></i><span>Overtime Admin</span>';
                        echo '<span class="pull-right-container">';
                        echo '<i class="fa fa-angle-left pull-right"></i>';
                        echo '</span>';
                        echo '</a>';
                        echo '<ul class="treeview-menu">';
                        echo '<li title="Administration"><a href="overtime/admin/view/OTPasscode.php"><i class="fa fa-lock"></i>Passcode Generator</a></li>';
                        echo '<li title="Administration"><a href="overtime/admin/view/OTReason.php"><i class="fa fa-pencil"></i>Reason Encoder</a></li></ul>';
                    }

                   
                    echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_HO_2.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                    } else if (trim($_SESSION['SESS_cBranch'])=='Store' && trim($_SESSION['SESS_vDepartment'])=='SLP: Loss Prevention Department') {
                        
                        echo '<li class="treeview">';
                        echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                        echo '<span class="pull-right-container">';
                        echo '<i class="fa fa-angle-left pull-right"></i>';
                        echo '</span>';
                        echo '</a>';
                        echo '<ul class="treeview-menu">';
                        
                         //enable below for maintenance
                        //echo '<li title="Overtime Form"><a href="#"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                        //echo '<li title="Pending & Archive OT"><a href="#"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';

                        echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                        echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcHO.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                        echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_HO_2.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                    } else {

                        if(trim($_SESSION['SESS_vDesignation']) == 'Store Manager'){

                          echo '<li class="treeview">';
                          echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                          echo '<span class="pull-right-container">';
                          echo '<i class="fa fa-angle-left pull-right"></i>';
                          echo '</span>';
                          echo '</a>';
                          echo '<ul class="treeview-menu">';
                          
                          echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                          echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';

                          echo'<li><a href="#" target=""><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                        } elseif (trim($_SESSION['SESS_vDesignation']) == 'Store Supervisor') {

                            echo '<li class="treeview">';
                            echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                            echo '<span class="pull-right-container">';
                            echo '<i class="fa fa-angle-left pull-right"></i>';
                            echo '</span>';
                            echo '</a>';
                            echo '<ul class="treeview-menu">';
                            
                            echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                            echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                            //allowed by ASM's below names
                            echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                        } elseif (

                                  trim($_SESSION['SESS_vName']) == 'MARARAC, RODALINE ADVIENTO' 
                                  or trim($_SESSION['SESS_vName']) == 'GARCIA, JOANA PAGULAYAN' 
                                  or trim($_SESSION['SESS_vName']) == 'MILALLOS, JORENA REDOBLE' 
                                  or trim($_SESSION['SESS_vName']) == 'RAMOS, ANABELLE ESPERANZA'
                                  or trim($_SESSION['SESS_vName']) == 'REYES, SHERLENE ANSAY' 
                                  or trim($_SESSION['SESS_vName']) == 'TAMBOL, NERISA SELEN' 
                                  or trim($_SESSION['SESS_vName']) == 'NAMORA, ANGELA IDA' 
                                  or trim($_SESSION['SESS_vName']) == 'BOADO, MA. CRISTINA MULATO' 
                                  or trim($_SESSION['SESS_vName']) == 'GALIA, HILDA ASTRERO' 
                                  or trim($_SESSION['SESS_vName']) == 'LUFAMIA, OLIVA SIMEON' 
                                  or trim($_SESSION['SESS_vName']) == 'BELOSTRINO, EMA RENZ PESCASIO'
                                  or trim($_SESSION['SESS_vName']) == 'MOJADO, GENALYN CARILLO'
                                  or trim($_SESSION['SESS_vName']) == 'NICOLAS, MARIALYN VOLUNTAD'
                                  or trim($_SESSION['SESS_vName']) == 'AVILA, JOYSIE LAMELA'
                                  or trim($_SESSION['SESS_vName']) == 'DE LEON, MARY ROSE QUINIE ROMARAOG'
                                  or trim($_SESSION['SESS_vName']) == 'MENDEZ, RINALYN GENETIA'
                                  or trim($_SESSION['SESS_vName']) == 'SARZUELO, CHERRY SELGA'
                                  or trim($_SESSION['SESS_vName']) == 'SINDAC, GLESA KAY CANLAS'
                                  or trim($_SESSION['SESS_vName']) == 'ARABIA, DOROTHY AGUILAR'
                                  or trim($_SESSION['SESS_cIDNumber']) == '1502563'
                                  or trim($_SESSION['SESS_vName']) == 'GATBUNTON, GRESTLYNN GALANG'
                                  or trim($_SESSION['SESS_vName']) == 'SILVA, JOLINA ESPARCIA'


                                )  
                           {

                              echo '<li class="treeview">';
                              echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                              echo '<span class="pull-right-container">';
                              echo '<i class="fa fa-angle-left pull-right"></i>';
                              echo '</span>';
                              echo '</a>';
                              echo '<ul class="treeview-menu">';
                              
                              echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                              echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                
                              echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                           }


            }
    
            // PIF Start
            echo '<li class="treeview">';
            echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
            echo '<span class="pull-right-container">';
            echo '<i class="fa fa-angle-left pull-right"></i>';
            echo '</span>';
            echo '</a>';
            echo '<ul class="treeview-menu">';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>';
          	echo'<li><a href="documents/PIFRankandFile.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To</a></li>';

            }

               if (trim($_SESSION['SESS_cU_AccountType'])=='Approver')
            {
                      echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';

                    if (trim($_SESSION['SESS_vDepartment'])=='HHR: HRD' && trim($_SESSION['SESS_vDesignation'])=='HRD Assistant Manager'){

                      echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalHO_HR.php"><i class="fa fa-check-square-o"></i>Staff OT for Approval</a></li>';
                      echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalHR.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                    
                    } elseif (trim($_SESSION['SESS_vDepartment'])=='HAS: Sales Operation'){

                      if(trim($_SESSION['SESS_vDesignation']) != 'Sales Operation Manager') {
                        echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalST.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                      }else{
                        echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalHO_SOM.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                      }

                    } else {
                      echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalHO.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                    }

                    
           
                      //enable below for maintenance
                      //echo '<li title="Overtime Approval"><a href="#"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';

                      echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
                      echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFApprover.php"><i class="fa fa-check-square-o"></i>Payroll Inquiry for Approval </a></li>';

                      echo '<li title="Payroll Inquiry Form"><a href="payroll/forcoop/PIFApprovers.php"><i class="fa fa-check-square-o"></i>PIF Approval for COOP</a></li>';
                      //echo '<li title="Payroll Inquiry Form"><a href="payroll/forcoop/PIFApprovers.php"><i class="fa fa-check-square-o"></i>COOP PIF for Approval</a></li>';
                     // if (trim($_SESSION['SESS_vName'])=='YAMON, JEANNE OLENDAN')
                  //{
                  // echo '<li title="Payroll Inquiry Form"><a href="payroll/forcoop/PIFHRDRemarks.php"><i class="fa fa-check-square-o"></i>Test</a></li>';
                  // }

            } elseif (trim($_SESSION['SESS_cU_AccountType'])=='COO') {
                    //added 05-27-2019
                    echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Approval</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
          
                    echo '<li title="Overtime Approval"><a href="overtime/approver/view/OTApprovalHO.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li>';
            }


           if (trim($_SESSION['SESS_cU_AccountType'])=='Payroll')
          {

                     echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
                    
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
      
                    echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';


             echo '<li class="treeview">';
            echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
            echo '<span class="pull-right-container">';
            echo '<i class="fa fa-angle-left pull-right"></i>';
            echo '</span>';
            echo '</a>';
            echo '<ul class="treeview-menu">';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFPayroll.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>';
              echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFPayrollArchive.php"><i class="fa fa-file-zip-o"></i>Payroll Archive Requests</a></li>';
          }

           if (trim($_SESSION['SESS_cU_AccountType'])=='HRDpif')
          {

                     echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                    echo '<span class="pull-right-container">';
                    echo '<i class="fa fa-angle-left pull-right"></i>';
                    echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
                    
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                    echo '<li title="Overtime Form"><a href="overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
      
                    echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li>';

                    echo'</ul>';

            echo '<li class="treeview">';
            echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
            echo '<span class="pull-right-container">';
            echo '<i class="fa fa-angle-left pull-right"></i>';
            echo '</span>';
            echo '</a>';
            echo '<ul class="treeview-menu">';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>';
            echo '<li title="Payroll Inquiry Form"><a href="payroll/rankandfile/PIFHRD.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>';
        
        }


         if (trim($_SESSION['SESS_vName'])=='ACUNA, DARLENE AGSANGRE' or trim($_SESSION['SESS_vName'])=='CERAOS, WINNIE FLEUR LAMADRID')
        {

         echo '<li title="Payroll Inquiry Form"><a href="payroll/forcoop/PIFReqHRD.php"><i class="fa fa-copy"></i>PIF COOP REQUESTS </a></li>';

        }


          echo '</ul>';
          echo '</li>';

        ?>
        </ul>
       
		    <li  title="How To Use EMS"><a href="documents/EMS_Manual.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>
          <span> How To Use EMS</span></a></li>
      
      
 

    



      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome!
        <small>Guess Employee System @2018</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    

<div >
<!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('Image/banner1.jpg') center center;">
              <h3 class="widget-user-username"><?php echo $_SESSION['SESS_vName']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $_SESSION['SESS_vDesignation']; ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/user2-160x160.png" alt="User Avatar">
            </div>

            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_cIDNumber'];?></h5>
                    <span class="description-text">ID NUMBER</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_vDepartment'];?></h5>
                    <span class="description-text">DEPARTMENT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['SESS_vDesignation'];?></h5>
                    <span class="description-text">DESIGNATION</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
        </div>            <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <h4>Reminder!</h4>
          <p>1.) Be sure to save your Approvers on Online Approval(s) page before filing!</p>
          <p>2.) Ensure that all your approvers are updated.</p>
          <!-- <p>3.) Overtime Application Module is now <b> LIVE </b>! You may file your Overtime Application under <i>Payroll Inquiry Options</i></p> -->
          <p>3.) All Employee Related Application like <b><i>Hold Notice</i></b>, <b><i>Manpower Request</i></b> and <b><i>Store Transfer</i></b> 
                  will be filed and processed on the old running system.</p>
        </div>
      </section>

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
    <!-- <strong>Copyright &copy; <a href="../estaffmngt/accounts/usr/views/esm_dashboard.php"> -->
         <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved. 
       <!-- Guess? IT Department 2018.</a></strong> All rights reserved. -->
    <!-- <strong>Copyright &copy; <a href="#">Guess? IT Department 2018.</a></strong> All rights reserved. -->
  </footer>


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>