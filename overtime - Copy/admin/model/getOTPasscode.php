
<?php
                session_start();
                require_once('../../../config/dbconfig-OT2.php');
                $ddatenow = date("Y-m-d");
                $qryApprovers = "SELECT * from tAuthCode where dDate = '" . $ddatenow . "'"; 
     

                      echo '<tbody>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $CodeDT  = trim($rowA['dDate']) .' - '. trim($rowA['dTime']);
                          $cDept  = $rowA['vDeptStore'];
                          $cCode  = $rowA['vCode'];

                          echo '<tr>
                                    <td>'. $CodeDT .'</td>
                                    <td>'. $cDept .'</td>
                                    <td>'. $cCode .'</td>
                                </tr>';
              
                        }
                      echo '</tbody>'; 
        

     
?>