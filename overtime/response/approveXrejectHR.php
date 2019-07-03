<?php 
        session_start();
        include('../../config/dbconfig-OT2.php');

        $actionx = $_GET['x'];
        $cSysIdz = trim($_GET['cSysIdx']);

            if($actionx == "APPROVED")
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');

                $dApproveDateTime=(new DateTime('now'))->format('Y/m/d H:i:s');
                $upStatAP = "update tOTProcess set cStatus = '" . $actionx . "', 
                dArchiveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "'";

                $upStatAPResx = sqlsrv_query($conn, $upStatAP);


                //move to archive
                
                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
      
             
                        $_SESSION['U_ValidMessage'] = 'OT Application Successfully Approved and Archived!';
                        session_write_close();
                        header("location: ../approver/view/OTApprovalHR.php");
                

            } 
            else
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                
                $dApproveDateTime=(new DateTime('now'))->format('Y/m/d H:i:s');
                $upStatAP = "update tOTProcess set cStatus = '" . $actionx . "', 
                dArchiveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);


                 //move to archive
                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
                                       

                        $_SESSION['U_ValidMessage'] = 'OT Application Successfully Rejected and Archived!';
                        session_write_close();
                        header("location: ../approver/view/OTApprovalHR.php");
                        
        
            
            }

        
    

 ?>