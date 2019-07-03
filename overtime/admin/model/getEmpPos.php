
<?php
                include('../../../config/dbconfig-OT.php');
                $vEmpN = $_REQUEST['vNamex'];
                $qryApprovers = "SELECT vDesignation from vOnlineUserAccount where vName = '" . trim($vEmpN) . "'"; 
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $r  = $rowA['vDesignation'];
                        }
                        echo $r;
        
?>