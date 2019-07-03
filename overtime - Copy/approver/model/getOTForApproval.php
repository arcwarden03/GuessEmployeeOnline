<?php
                
                  include('../../../config/dbconfig-OT2.php');
                  session_start();
                  $vAppN = $_SESSION['SESS_vName'];

                  $Datex = $_POST['OTDeptx'];
                  $Deptx = $_POST['OTDatex'];
 
                  $functionqry = "SELECT * from tOTProcess   ";
                  $rslt = sqlsrv_query($conn, $functionqry);
                  while ($rowAz = sqlsrv_fetch_array($rslt))  
                    {
                     
                        $cSysIDx = trim($rowAz['cSysID']);
                        $vName= $rowAz['vName'];
                        $vDepartment= $rowAz['vDeptStore'];
                        $dFDate = $rowAz['dFiledDate'];
                        $dDate = trim($rowAz['dDate']);
                        $dFrom = trim($rowAz['dFrom']);
                        $dTo = $rowAz['dTo'];
                        $vReason1 = $rowAz['vReason'];
                        $vReason2 = $rowAz['vOtherR'];

                        echo '<tr>';
                        echo '<td>' . $vName . '</td>';
                        echo '<td>' . $dFDate . '</td>';
                        echo '<td>' . $dDate . '</td>';
                        echo '<td>' . $dFrom . '</td>';
                        echo '<td>' . $dTo . '</td>';

                        if ($vReason1=='Others'){
                          echo '<td>' . $vReason2 . '</td>';
                        } else {
                          echo '<td>' . $vReason1 . '</td>';
                        }
                /*--------------------------------------Editable Time-----------------------------*/
                  /*
                        echo'<form method="GET" action="../model/updateTime.php" role="form">';

                        echo '<td>';
                          echo '<div class="bootstrap-timepicker">';
                            echo '<div class="form-group">';   
                            echo '<div class="input-group">';
                              echo '<div class="input-group-addon">';
                              echo '<i class="fa fa-clock-o"></i>';
                              echo '</div>';
                                 echo '<input id="tFrom" name="tFromx" type="text" class="form-control timepicker" value="'. $dFrom .'">';              
                              echo '</div>';
                              echo '</div>';
                            echo '</div>';
                        echo'</td>';

                        echo '<td>';
                          echo '<div class="bootstrap-timepicker">';
                            echo '<div class="form-group">';   
                            echo '<div class="input-group">';
                              echo '<div class="input-group-addon">';
                              echo '<i class="fa fa-clock-o"></i>';
                              echo '</div>';
                                 echo '<input id="tTo" name="tTox" type="text" class="form-control timepicker" value="'. $dTo .'">';              
                              echo '</div>';
                              echo '</div>';
                            echo '</div>';       
                        echo'</td>';

                        echo'<input type="text" style="display:none;" name="hID" value="' . $cSysIDx . '">';
                        
                        echo '<td><button type="submit" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil-square-o"></i> Update</button>';
                        echo'</form>';
                  */
                /*---------------------------------Editable Time Done-----------------------------*/

                        echo '<td><button type="button" class="btn btn-primary btn-xs" 
                        data-toggle="modal" data-target="#message' . $cSysIDx  . '">
                        <i class="fa fa-file-text-o"></i> &nbspReview</button>';

                       

                  /*--------------------------BEGIN MODAL----------------------------------------*/
                  /*--------------------------this handles the pop up message--------------------*/
                    echo '<div id="message' . $cSysIDx . '" class="modal fade" role="dialog">
                              <div class="modal-dialog"  style="width:750px">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><center>Overtime Application Details</center></h4>
                                  </div>
                                  <div class="modal-body">
                       
                                    <strong>Name: </strong> ' . $vName  . '<br>
                                    <strong>Department: </strong> ' . $vDepartment  . '<br>
                                    <strong>Date Filed: </strong> ' . $dFDate  . '<br>
                                    <strong>Time Coverage: </strong> ' . $dFrom .' to '. $dTo . '<br><hr>';

                                    if(trim($vReason2)==''){
                                      echo '<strong>Reason: </strong> ' . $vReason1 .'<br><hr>';
                                    } else {
                                      echo '<strong>Reason: </strong> ' . $vReason1 .' : '. $vReason2 . '<br><hr>';
                                    }
                                    
                                  
                                    include ('../model/ViewDetails.php');
                                  
                                    echo '<br><br>';
                                    echo '<div class="modal-footer">';
                                     
                                    //include ('../model/ApproveReject.php');
                                  
                                    
                                     //check approver max lvl
                                      $nMaxz=0;
                                      $qryApproverEz = "SELECT max(nLevel) as 'nMax' from tApprover where cSysID = '" . $cSysIDx . "'"; 
                                      $rsltv = sqlsrv_query($conn, $qryApproverEz);
                                      while ($rowAxv = sqlsrv_fetch_array($rsltv))  
                                          {
                                              $nMaxz = trim($rowAxv['nMax']);
                                          }


                                      
                                      //check approver max lvl
                                      if(trim($_SESSION['SESS_vDesignation'])=='Sales Operation Manager' || trim($_SESSION['SESS_vDesignation'])=='Assistant Area Sales Manager' || trim($_SESSION['SESS_vDesignation'])=='Area Sales Manager')
                                      {
                                        $nLvl=0;
                                        $qryApproverEx = "SELECT * from tApprover where vAppName = '". $vAppNamex ."' and cSysID = '". $cSysIDx ."'"; 
                                        $rsltz = sqlsrv_query($conn, $qryApproverEx);
                                        while ($rowAxc = sqlsrv_fetch_array($rsltz))  
                                            {
                                                $nLvl = trim($rowAxc['nLevel']);
                                            }
                                          
                                  
                                             echo '<table>';
                                             echo '<tr><td>';
                                             echo '<form method="GET" action="../../response/approveXrejectST.php">';
                                             echo '<input type="hidden" value="APPROVED" name="x">';
                                             echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                             echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                             echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                             echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
  
                                           
  
                                             echo '</form></td>';
                                             echo '<td>';
                                             echo '<form method="GET" action="../../response/approveXrejectST.php">';
                                             echo '<input type="hidden" value="REJECTED" name="x">';
                                             echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                             echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                             echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                             echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                                             
                                        
                                             echo '</form></td></table>';
                                      } else {
                                              $nLvl=0;
                                              $qryApproverEx = "SELECT * from tApprover where vAppName = '". $vAppNamex ."' and cSysID = '". $cSysIDx ."'"; 
                                              $rsltz = sqlsrv_query($conn, $qryApproverEx);
                                              while ($rowAxc = sqlsrv_fetch_array($rsltz))  
                                                  {
                                                      $nLvl = trim($rowAxc['nLevel']);
                                                  }
                                                
                                        
                                                  echo '<table>';
                                                  echo '<tr><td>';
                                                  echo '<form method="GET" action="../../response/approveXreject.php">';
                                                  echo '<input type="hidden" value="APPROVED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                                  echo '<button type="submit" class="btn btn-primary">Approve</button>  ';
        
                                                
        
                                                  echo '</form></td>';
                                                  echo '<td>';
                                                  echo '<form method="GET" action="../../response/approveXreject.php">';
                                                  echo '<input type="hidden" value="REJECTED" name="x">';
                                                  echo '<input type="hidden" value="' . $cSysIDx  . '" name="cSysIdx">';
                                                  echo '<input type="hidden" value="' . $nLvl  . '" name="xLvl">';
                                                  echo '<input type="hidden" value="' . $nMaxz  . '" name="xLvlMax">';
                                                  echo '<button type="submit" class="btn btn-danger">Reject</button>  ';
                                                  
                                              
                                                  echo '</form></td></table>';
                                      }

 
                  echo '</div>
                        </div>
                        </div>
                        </div>
                        </td>';
                  echo '</tr>';   
                  }

 
                ?>
