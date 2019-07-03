
<?php
                include('../../../config/dbconfig-OT2.php');
                $qryApprovers = "SELECT * from tReason"; 
 
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $OTDept  = $rowA['vDeptStore'];
                          $OTReason  = $rowA['cReason'];

                          echo '<tr>
                                    <td>'. $OTDept .'</td>
                                    <td>'. $OTReason .'</td>
                                </tr>';
                        }
                
        
?>