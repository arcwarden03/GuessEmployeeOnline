
<?php

            include('../../../config/dbconfig-OT.php');
            $qryApprovers = "SELECT vAppName from tOnlineGlobalApproval where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' order by nLevel asc"; 
    
            $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
            $rowx = sqlsrv_has_rows($rsltApprovers);
                        
            if($rowx==false){
              $_SESSION['U_ErrorMessage'] = 'Approvers Not Set! Please configure approvers on <i>Online Approval(s) Module!';
              session_write_close();
              //header("location: ../view/OvertimeST.php");
              exit;
            } else {
            echo '<tbody>';
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
            }
           

?>