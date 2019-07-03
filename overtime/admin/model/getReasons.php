
<?php
                include('../../../config/dbconfig-OT2.php');
                $qryApprovers = "SELECT cReason from tReason where vDeptStore = '" . $_SESSION['SESS_vDepartment'] . "'"; 

                        echo '<option selected="selected"></option>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $r  = $rowA['cReason'];
                          echo '<option>'. $r .'</option>';
                        }
                        echo '<option>Others</option>';
        
?>