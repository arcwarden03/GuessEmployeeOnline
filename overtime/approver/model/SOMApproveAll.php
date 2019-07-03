<?php
    include('../../../config/dbconfig-OT2.php');
    session_start();

    $actionx = trim($_GET['OTActionA']);
    $OTDept = trim($_GET['OTDeptA']);
 
 
        if($actionx == "APPROVED")
        {
            //update approval status
            date_default_timezone_set('Asia/Manila');
            $dApproveDateTime=(new DateTime('now'))->format('Y/m/d H:i:s');
            
            /*upStatAP = "update tOTProcess set cStatus = '" . $actionx . "'
            where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";*/

            $upStatAP = "update tOTProcess set cStatus = '" . $actionx . "'
            where vDeptStore = '". $OTDept ."' and cStatus = 'PENDING'";

            $upStatAPResx = sqlsrv_query($conn, $upStatAP);

            // approve all
                $dApproveDateTimex=(new DateTime('now'))->format('Y-m-d H:i:s');
                //$functionqry = "SELECT rtrim(cSysID) as cSysID from tOTProcess where dDate = '" . $OTDate . "' and vDeptStore = '". $OTDept ."'";
                $functionqry = "SELECT rtrim(cSysID) as cSysID from tOTProcess where vDeptStore = '". $OTDept ."'";
                $rslt = sqlsrv_query($conn, $functionqry);
                while ($rowAz = sqlsrv_fetch_array($rslt))  
                  {
                        $cSysIDx = $rowAz['cSysID'];

                        $functionqryx = "SELECT rtrim(cStatus) as cStatus from tApprover where cSysID = '". trim($cSysIDx) ."' and nLevel < '2'";
                        $rsltx = sqlsrv_query($conn, $functionqryx);
                        while ($rowAzx = sqlsrv_fetch_array($rsltx))  
                        {
                            $cResult = $rowAzx['cStatus'];

                            if($cResult == 'PENDING'){
                                $upStatAPx = "UPDATE tApprover set cStatus = 'BYPASSED', 
                                dApproveDate = '" . $dApproveDateTimex . "' where cSysID = '". trim($cSysIDx) ."' and nLevel < '2'";
                                $upStatAPResxz = sqlsrv_query($conn, $upStatAPx);
                            } 
                        }

                        $upStatAPxz = "UPDATE tApprover set cStatus = '" . $actionx . "', 
                        dApproveDate = '" . $dApproveDateTimex . "' where cSysID = '". $cSysIDx ."' and nLevel = '2'";
                        $upStatAPResxzc = sqlsrv_query($conn, $upStatAPxz);
                   
                  }
 

                $_SESSION['U_ValidMessage'] = 'OT Application(s) All Approved!';
                session_write_close();
                header("location: ../view/OTApprovalHO_SOM.php");


        } else {
            //update approval status
            /*
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
