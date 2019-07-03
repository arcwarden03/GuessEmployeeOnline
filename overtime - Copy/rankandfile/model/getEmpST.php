
<?php
                include('../../../config/dbconfig-OT.php');
                $qryApprovers = "SELECT vName from vOnlineUserAccount where vDepartment = '" . $_SESSION['SESS_vDepartment'] . "'"; 

                        echo '<option selected="selected"></option>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $r  = $rowA['vName'];
                          echo '<option>'. $r .'</option>';
                        }
        
?>