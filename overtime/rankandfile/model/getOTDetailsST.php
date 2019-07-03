<?php
                        include('../../../config/dbconfig-OT2.php');
                        session_start();
                        $cIDNumberX = trim($_SESSION['SESS_cIDNumber']);
                        
                        $qryApprovers = "SELECT * from tOTQue where cIDNumber = '" . $cIDNumberX . "'"; 
                        $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                        while ($row = sqlsrv_fetch_array($rsltApprovers))  
                        {
                              $cSysIDx = $row['cSysID'];
                              $cStatusx = trim($row['cStatus']);
                              $dDfiled = trim($row['dFiledDate']);
                              $dDate = trim($row['dDate']);
                              $dShift = trim($row['cShift']);
                              $dDOFF = trim($row['cDayOff']);
                              $dCovered = $row['dFrom'] .' - '. $row['dTo'];

                              $vName = trim($row['vName']);
                              $vDepartment= trim($row['vDeptStore']);
                              $vReason1 = trim($row['vReason']);
                              $vReason2 = trim($row['vOtherR']);
     

                          echo '<tr>
                                    <td>'. $vName .'</td>
                                    <td>'. $dDate .'</td>
                                    <td>'. $dCovered .'</td>
                                    <td> 
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" 
                                                data-target="#sysid' . trim($cSysIDx)  . '">
                                                <i class="fa fa-file-text-o"></i> &nbspReview 
                                          </button>
                                          <form method="GET" action="../model/DelOTQueST.php" role="form">
                                              <input type="text" style="display:none;" name="hID" value="' . rtrim($row['cSysID']) . '">
                                              <input type="text" style="display:none;" name="hDate" value="' . rtrim($row['dDate']) . '">
                                              <button type="submit" name="btndel" class="btn btn-danger btn-xs">
                                                  <i class="fa fa-times"></i> Remove
                                              </button>
                                          </form>';

                             echo'<div id="sysid' . trim($cSysIDx) . '" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width:400px">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Overtime Application Details</h4>
                                      </div>
                                      <div class="modal-body">
                                        <strong>Name: </strong> ' . $vName  . '<br>
                                        <strong>Department: </strong> ' . $vDepartment  . '<br>
                                        <strong>Filing Date: </strong> ' . $dDfiled  . '<br>
                                        <strong>Overtime Date: </strong> ' . $dDate  . '<br>
                                        <strong>Shift: </strong> ' . $dShift  . ' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <strong> Day-Off: </strong> ' . $dDOFF  . '<br><hr>
                                        <strong>Time Covered: </strong> ' . $dCovered .' <br><hr>


                                        <strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';
                                       
        
                                    
      
                                          echo '<br><br>';
                                          echo '<div class="modal-footer">
        
                                                    <table>
                                                      <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
                                                              Close
                                                            </button>
                                                        </td>
                                                      </tr>
                                                    </table>
                                        
                                                </div>';
         
                                           echo'</div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>';
                                    echo '</tr>';  
        
                        }

              ?>