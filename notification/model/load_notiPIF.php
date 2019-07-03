<?php
session_start();
include('../../config/dbconfig-OT2.php'); 


  $vName = $_SESSION['SESS_vName'];

         if (trim($_SESSION['SESS_isCOOAccount'])=='1'){
             $notqryE = "SELECT count(*) AS rcnt from tOTProcess where cSysID in 
                              (Select cSysID from tApprover where vAppName = '". $vName ."' 
                              and cStatus = 'PENDING') and cSysID not in (select cSysID from tApprover 
                              where vAppName = '". $vName ."' and cStatus='PENDING') 
                              and cSysID not in (Select distinct cSysID from tApprover 
                              where vAppName <> '". $vName ."' and cstatus = 'PENDING')";
         } else {
             $notqryE = "SELECT count(*) AS rcnt FROM tOTProcess WHERE cSysID IN 
             (SELECT cSysID FROM tApprover WHERE vAppName ='". $vName ."' and cStatus = 'PENDING')";
         }

        $rNotifyE=sqlsrv_query($conn,$notqryE);
          while ($rLPE = sqlsrv_fetch_array($rNotifyE))    
            {
                $E = $rLPE['rcnt'];
            }
       if ($E>0)
       {
       // echo $E;
       }  

?>