<?php
 

 //check approver max lvl
 $nMaxz=0;
 $qryApproverE = "SELECT max(nLevel) as 'nMax' from tApprover where cSysID = '" . $cSysIDx . "'"; 
 $rslt = sqlsrv_query($conn, $qryApproverE);
 while ($rowAxv = sqlsrv_fetch_array($rslt))  
     {
         $nMaxz = trim($rowAxv['nMax']);
     }

 //check approver max lvl
 $nLvl=0;
 $qryApproverE = "SELECT * from tApprover where vAppName = '". $vAppNamex ."' and cSysID = '". $cSysIDx ."'"; 
 $rslt = sqlsrv_query($conn, $qryApproverE);
 while ($rowAxc = sqlsrv_fetch_array($rslt))  
     {
         $nLvl = trim($rowAxc['nLevel']);
     }

?>