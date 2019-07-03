
<?php
                include('../../../config/dbconfig-OT.php');
                $qryApprovers = "SELECT distinct(vdepartment) from vOnlineUserAccount where cBranch = 'Head Office'"; 

                        echo '<option selected="selected"></option>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $r  = $rowA['vdepartment'];
                          echo '<option>'. $r .'</option>';
                        }
                     
        
?>