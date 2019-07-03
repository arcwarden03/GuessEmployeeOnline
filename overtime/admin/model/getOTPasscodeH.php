
<?php
                session_start();
                require_once('../../../config/dbconfig-OT2.php');
                $qryApprovers = "SELECT * from tAuthCodeH"; 
     

                      echo '<tbody>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $CodeDT  = trim($rowA['dDate']) .' - '. trim($rowA['dTime']);
                          $cDept  = $rowA['vDeptStore'];
                          $cCode  = $rowA['vCode'];
                          $hCode  = $rowA['dArchiveDate'];

                          echo '<tr>
                                    <td>'. $CodeDT .'</td>
                                    <td>'. $cDept .'</td>
                                    <td>'. $cCode .'</td>
                                    <td>'. $hCode .'</td>
                                </tr>';
                        }
                      echo '</tbody>'; 
        

?>