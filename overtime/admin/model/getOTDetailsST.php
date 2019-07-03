
<?php
              session_start();
              include('../../../config/dbconfig-OT2.php');
              $cIDNumberX = trim($_SESSION['SESS_cIDNumber']);
                $qryApprovers = "SELECT * from tOTQue where cIDNumber = '" . $cIDNumberX . "'"; 
    
                      echo '<tbody>';
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $cSysIDx = $rowA['cSysID'];
                          $vName  = $rowA['vName'];
                          $dFiled  = $rowA['dDate'];
                          $dCoverage  = $rowA['dFrom'] .' - '. $rowA['dTo'];
                          $vReason1 = $rowA['vReason'];
                          $vReason2 = $rowA['vOtherR'];
                          $vDepartment = $rowA['vDeptStore'];


                          echo '<tr>
                                    <td>'. $vName .'</td>
                                    <td>'. $dFiled .'</td>
                                    <td>'. $dCoverage .'</td>
                                    <td> 
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" 
                                                data-target="#sysid' . trim($cSysIDx)  . '">
                                                <i class="fa fa-file-text-o"></i> &nbspReview 
                                          </button>
                                      <form method="GET" action="../model/DelOTQueST.php" role="form">
                                          <input type="text" style="display:none;" name="hID" value="' . rtrim($rowA['cSysID']) . '">
                                          <input type="text" style="display:none;" name="hDate" value="' . rtrim($rowA['dDate']) . '">
                                          <button type="submit" name="btndel" class="btn btn-danger btn-xs">
                                              <i class="fa fa-times"></i> Remove
                                          </button>
                                      </form>
                                    </td>';
                                
                             echo'<div id="sysid' . trim($cSysIDx) . '" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width:800px">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Overtime Application Details</h4>
                                      </div>
                                      <div class="modal-body">
                                        <strong>Name: </strong> ' . $vName  . '<br>
                                        <strong>Department: </strong> ' . $vDepartment  . '<br>
                                        <strong>Date Filed: </strong> ' . $dDfiled  . '<br><hr>
                                        <strong>Time Covered: </strong> ' . $dCoverage .' <br><hr>
                                        <strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';
                                       
        
                                          include ('../model/ViewDetailsUser.php');
      
                                          echo '<br><br>';
                                          echo '<div class="modal-footer">
        
                                                    <table>
                                                      <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                              Close
                                                            </button>
                                                        </td>
                                                      </tr>
                                                    </table>
                                        
                                                </div>
         
                                          </div>
                                              </div>
                                            </div>
                                          </div>
                                        </td>

                                  </tr>'; 
        
                        }

                  
                      echo '</tbody>'; 
                      
        
?>