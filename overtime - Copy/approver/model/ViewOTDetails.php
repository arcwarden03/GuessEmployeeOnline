<?php 
        session_start();

        $actionx = trim($_GET['OTDatex']);
        $cSysIdz = trim($_GET['OTDeptx']);

                $_SESSION['OT_Date'] = $actionx;
                $_SESSION['OT_Dept'] = $cSysIdz;
              
                header("location: ../view/OTApprovalHR.php");
      
 ?>