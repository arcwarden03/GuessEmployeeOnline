<?php
session_start();
?>
<ul class="nav navbar-nav">
          <!-- User Account Menu -->

          <!-- Notifications: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['SESS_vName']; ?></span>
              </a>
              <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                <?php echo trim($_SESSION['SESS_vName']) . ' - ' . $_SESSION['SESS_vDesignation']; ?>
                </p>
              </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="../../guessemployeeonline/Logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info"><p><b><small><marquee scrolldelay="150">
          <?php echo $_SESSION['SESS_vName']; ?></marquee></small></b></p>
          <!-- Status -->
          <a href="#"><?php echo $_SESSION['SESS_vDepartment'];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="header"><CENTER>MAIN NAVIGATION<CENTER></li>
        <!-- Optionally, you can add icons to the links -->
          <li><a href="../../Mainpage_Payroll.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                <?php 

                     echo '<li title="Payroll History"><a href="../../views/PayrollHistory.php"><i class="fa fa-share-square-o"></i>Payroll History</a></li>';
                     
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
                                
                                echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OTPendArcHO.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                              

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
                                    echo '<li title="Administration"><a href="../../overtime/admin/view/OTPasscode.php"><i class="fa fa-lock"></i>Passcode Generator</a></li>';
                                    echo '<li title="Administration"><a href="../../overtime/admin/view/OTReason.php"><i class="fa fa-pencil"></i>Reason Encoder</a></li></ul>';
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

                                    echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                    echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OTPendArcHO.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                                    echo'<li><a href="../../overtime/documents/EMS_USER_Manual_OT_HO_2.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                                } else {

                                    if(trim($_SESSION['SESS_vDesignation']) == 'Store Manager'){

                                      echo '<li class="treeview">';
                                      echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                                      echo '<span class="pull-right-container">';
                                      echo '<i class="fa fa-angle-left pull-right"></i>';
                                      echo '</span>';
                                      echo '</a>';
                                      echo '<ul class="treeview-menu">';
                                      
                                      echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                      echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';

                                      echo'<li><a href="#" target=""><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

                                    } elseif (trim($_SESSION['SESS_vDesignation']) == 'Store Supervisor') {

                                        echo '<li class="treeview">';
                                        echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                                        echo '<span class="pull-right-container">';
                                        echo '<i class="fa fa-angle-left pull-right"></i>';
                                        echo '</span>';
                                        echo '</a>';
                                        echo '<ul class="treeview-menu">';
                                        
                                        echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                        echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
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
                                          
                                          echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OvertimeST.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                          echo '<li title="Overtime Form"><a href="../../overtime/rankandfile/view/OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                            
                                          echo'<li><a href="../../overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';

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
                        echo '<li title="Payroll Inquiry Form"><a href="PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>';
                        echo '<li title="Payroll Inquiry Form"><a href="PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>';
                        echo'<li><a href="../../documents/PIFRankandFile.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To</a></li>';

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

                                  echo '<li title="Overtime Approval"><a href="../../overtime/approver/view/OTApprovalHO_HR.php"><i class="fa fa-check-square-o"></i>Staff OT for Approval</a></li>';
                                  echo '<li title="Overtime Approval"><a href="../../overtime/approver/view/OTApprovalHR.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                                
                                } elseif (trim($_SESSION['SESS_vDepartment'])=='HAS: Sales Operation'){

                                  if(trim($_SESSION['SESS_vDesignation']) != 'Sales Operation Manager') {
                                    echo '<li title="Overtime Approval"><a href="../../overtime/approver/view/OTApprovalST.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                                  }else{
                                    echo '<li title="Overtime Approval"><a href="../../overtime/approver/view/OTApprovalHO_SOM.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
                                  }

                                } else {
                                  echo '<li title="Overtime Approval"><a href="../../overtime/approver/view/OTApprovalHO.php"><i class="fa fa-check-square-o"></i>OT Application for Approval</a></li></ul>';
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
                                  echo '<li title="Payroll Inquiry Form"><a href="../rankandfile/PIFApprover.php"><i class="fa fa-check-square-o"></i>Payroll Inquiry for Approval </a></li>';

                                  echo '<li title="Payroll Inquiry Form"><a href="PIFApprovers.php"><i class="fa fa-check-square-o"></i>PIF Approval for COOP</a></li>';
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

                      // PIF Start
                       if (trim($_SESSION['SESS_cU_AccountType'])=='Payroll')
                      {

                                 echo '<li class="treeview">';
                                echo '<a href="#"><i class="fa fa-clock-o"></i><span>Overtime Form</span>';
                                echo '<span class="pull-right-container">';
                                echo '<i class="fa fa-angle-left pull-right"></i>';
                                echo '</span>';
                                echo '</a>';
                                echo '<ul class="treeview-menu">';
                                
                                echo '<li title="Overtime Form"><a href="OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                echo '<li title="Overtime Form"><a href="OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                  
                                echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li></ul>';


                         echo '<li class="treeview">';
                        echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
                        echo '<span class="pull-right-container">';
                        echo '<i class="fa fa-angle-left pull-right"></i>';
                        echo '</span>';
                        echo '</a>';
                        echo '<ul class="treeview-menu">';
                        echo '<li title="Payroll Inquiry Form"><a href="../payroll/rankandfile/PIFPayroll.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>';
                          echo '<li title="Payroll Inquiry Form"><a href="../payroll/rankandfile/PIFPayrollArchive.php"><i class="fa fa-file-zip-o"></i>Payroll Archive Requests</a></li>';
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
                                
                                echo '<li title="Overtime Form"><a href="OvertimeHO.php"><i class="fa fa-file-text-o"></i>Overtime Application</a></li>';
                                echo '<li title="Overtime Form"><a href="OTPendArcST.php"><i class="fa fa-file-zip-o"></i>Pending & Archive OT</a></li>';
                  
                                echo'<li><a href="overtime/documents/EMS_USER_Manual_OT_ST_3.pdf" target="_blank"><i class="fa fa-sticky-note-o"></i>How To Use OT Form</a></li></li>';

                                echo'</ul>';

                        echo '<li class="treeview">';
                        echo '<a href="#"><i class="fa fa-file-powerpoint-o"></i> <span>Payroll Inquiry Form</span>';
                        echo '<span class="pull-right-container">';
                        echo '<i class="fa fa-angle-left pull-right"></i>';
                        echo '</span>';
                        echo '</a>';
                        echo '<ul class="treeview-menu">';
                        echo '<li title="Payroll Inquiry Form"><a href="../payroll/rankandfile/PIF.php"><i class="fa fa-file-text-o"></i>Request PIF</a></li>';
                        echo '<li title="Payroll Inquiry Form"><a href="../payroll/rankandfile/PIFRequests.php"><i class="fa fa-file-zip-o"></i>Pending & Archive PIF </a></li>';
                        echo '<li title="Payroll Inquiry Form"><a href="../payroll/rankandfile/PIFHRD.php"><i class="fa fa-copy"></i>Pending Payroll Inquiries </a></li>';
                    
                    }


                     if (trim($_SESSION['SESS_vName'])=='ACUNA, DARLENE AGSANGRE' or trim($_SESSION['SESS_vName'])=='CERAOS, WINNIE FLEUR LAMADRID')
                    {

                     echo '<li title="Payroll Inquiry Form"><a href="../payroll/forcoop/PIFReqHRD.php"><i class="fa fa-copy"></i>PIF COOP REQUESTS </a></li>';

                    }


                                      echo '</li>';
                      echo '</ul>';
              
                ?>
      

          <li title="Return to Homepage"><a href="../../Mainpage.php"><i class="glyphicon glyphicon-log-out"></i> <span title="Return to Homepage">Return</span></a>
          </li>
          
        </ul>
      <!-- /.sidebar-menu -->