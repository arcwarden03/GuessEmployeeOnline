
<?php
                include('../../../config/dbconfig-OT.php');
                $qryApprovers = "SELECT vAppName from tOnlineGlobalApproval where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' order by nLevel asc"; 
    
                      echo '<tbody>';
                        $i=1;
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $AppName  = $rowA['vAppName'];
                          $AppLevel = "App".$i;

                          echo '<tr>
                                    <td>
                                        <input class="form-control" style="width: 450px;" type="text" 
                                        name="' . $AppLevel . '" value="' . $AppName . '" readonly>
                                    </td>
                                </tr>';
                        }
                      echo '</tbody>'; 
        
?>