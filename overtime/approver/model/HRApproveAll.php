<?php
    include('../../../config/dbconfig-OT2.php');
    session_start();

    $actionx = trim($_GET['OTActionA']);
    $OTDate = trim($_GET['OTDateA']);
    $OTDept = trim($_GET['OTDeptA']);
 
 
        if($actionx == "APPROVED")
        {
            //update approval status
            date_default_timezone_set('Asia/Manila');
            $dApproveDateTime=(new DateTime('now'))->format('Y/m/d H:i:s');

            $upStatAP = "update tOTProcess set cStatus = '" . $actionx . "', 
            dArchiveDate = '" . $dApproveDateTime . "' 
            where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."' and cStatus = 'APPROVED'";

            $upStatAPResx = sqlsrv_query($conn, $upStatAP);


            //move to archive
            
                $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."' and cStatus = 'APPROVED'";
                $insProcRes = sqlsrv_query($conn, $insProc);
            
            // check approver id
                $functionqry = "SELECT rtrim(cSysID) as cSysID from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."' and cStatus = 'APPROVED'";
                $rslt = sqlsrv_query($conn, $functionqry);
                while ($rowAz = sqlsrv_fetch_array($rslt))  
                {
                        $cSysIDx = $rowAz['cSysID'];

                        $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID = '". $cSysIDx ."'";
                        $insAppRes = sqlsrv_query($conn, $insApp);

                        $delApp = "DELETE from tApprover where cSysID = '". $cSysIDx ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
                
                }


                $delProc = "DELETE from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."' and cStatus = 'APPROVED'";
                $delProcRes = sqlsrv_query($conn, $delProc);
        
         
                    $_SESSION['U_ValidMessage'] = 'OT Application(s) All Approved and Archived!';
                    session_write_close();
                    header("location: ../view/OTApprovalHR.php");


        } else {
/*
            //update approval status
            date_default_timezone_set('Asia/Manila');
            $dApproveDateTime=(new DateTime('now'))->format('Y/m/d H:i:s');

            $upStatAP = "update tOTProcess set cStatus = '" . $actionx . "', 
            dArchiveDate = '" . $dApproveDateTime . "' 
            where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";


            $upStatAPRes = sqlsrv_query($conn, $upStatAP);


             //move to archive
                $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";
                $insProcRes = sqlsrv_query($conn, $insProc);
            
                    $delProc = "DELETE from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";
                    $delProcRes = sqlsrv_query($conn, $delProc);
            
            
                $insApp = "INSERT into tApproverH SELECT * from tApprover where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";
                $insAppRes = sqlsrv_query($conn, $insApp);
            
                    $delApp = "DELETE from tApprover where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";
                    $delAppRes = sqlsrv_query($conn, $delApp);
                                   

                    $_SESSION['U_ValidMessage'] = 'OT Application(s) All Rejected!';
                    session_write_close();
                    header("location: ../view/OTApprovalHR.php");
                    
*/
        }


?>
