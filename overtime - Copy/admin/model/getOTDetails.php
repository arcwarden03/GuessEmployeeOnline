
<?php

                $qryApprovers = "SELECT * from tOTQue where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
    
                      echo '<tbody>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $fDate  = $rowA['dFiledDate'];
                          $dFiled  = $rowA['dDate'];
                          $dCoverage  = $rowA['dFrom'] .' - '. $rowA['dTo'];

                          echo '<tr>
                                    <td>'. $fDate .'</td>
                                    <td>'. $dFiled .'</td>
                                    <td>'. $dCoverage .'</td>
                                    <td> 
                                      <form method="GET" action="../model/DelOTQue.php" role="form">
                                          <input type="text" style="display:none;" name="hID" value="' . rtrim($rowA['cSysID']) . '">
                                          <input type="text" style="display:none;" name="hDate" value="' . rtrim($rowA['dDate']) . '">
                                          <button type="submit" name="btndel" class="btn btn-danger btn-xs">
                                              <i class="fa fa-times"></i> Remove
                                          </button>
                                      </form>
                                    </td>
                                </tr>';
              
      
                        }
                      echo '</tbody>'; 
        
?>