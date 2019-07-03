<?php 
    include ('../../../config/dbconfig-OT2.php');
    include ('../../Auth.php');
    session_start();
    
    $cIDNumber = trim($_SESSION['SESS_cIDNumber']);

    function OTEmail($nlvl, $nMax, $eMail, $cIDNumberx)
    {
            include ('../../../config/dbconfig-OT2.php');
            $query = "SELECT * from tOTProcess where cidnumber = '" . $cIDNumberx . "' order by cSysID asc";  
            $rslt = sqlsrv_query($conn, $query);
            while ($row = sqlsrv_fetch_array($rslt))  
            {
                $EmpNamex = $row['vName'];
                $vReason1 = $row['vReason'];
                $vReason2 = $row['vOtherR'];
            }
            
          
            $to = $eMail;
            //$to = 'jpsarinas@guess.com.ph';
            $subject = 'Overtime Application Form: '.$EmpNamex.'';

            $message = "You have a pending OT Application for approval. Please see below details: <br><br>";
            $message .= '<b>From: </b>'.$EmpNamex.'<br>';
            /*
            $message .= '-----------------------------------------------------------------------------<br>';
            $message .= '<b>Reason: </b>'.$vReason1.' : ' .$vReason2. '<br>';
            $message .= '-----------------------------------------------------------------------------<br>';
            */
            $message .= '<br><strong>OT Details</strong></br>';
            $message .= '
            <table border="1px solid black" style="width:650px; text-align:center; border:1px solid black";>
            <tr>
                    <th><b>Filing Date</b></th>
                    <th><b>Reason</b></th>
                    <th><b>OT Date</b></th>
                    <th><b>Time Covered</b></th>
            </tr>
            </thead>
            <tbody>';

            include ('../../../config/dbconfig-OT2.php');
            $queryx = "SELECT * from tOTProcess where cidnumber = '" . $cIDNumberx . "' and cStatus <> 'APPROVED' order by cSysID asc";  
            $rsltx = sqlsrv_query($conn, $queryx);
            while ($rowx = sqlsrv_fetch_array($rsltx))  
            {
                if(trim($rowx['vOtherR']) ==''){
                    $message .='
                    <tr>
                            <td>'. $rowx['dFiledDate'] .'</td>
                            <td>'. $rowx['vReason'].'</td>
                            <td>'. $rowx['dDate'] .'</td>
                            <td>'. $rowx['dFrom'].' to '.$rowx['dTo'] .'</td>
                    </tr>';
                } else {
                    $message .='
                    <tr>
                            <td>'. $rowx['dFiledDate'] .'</td>
                            <td>'. $rowx['vReason'].': '.$rowx['vOtherR'] .'</td>
                            <td>'. $rowx['dDate'] .'</td>
                            <td>'. $rowx['dFrom'].' to '.$rowx['dTo'] .'</td>
                    </tr>';
                }
            }

            
            $message .= '
            </tbody>
            </table>
            <br>
            <br>';

            $message .= '<strong>Approver Details</strong><br>';
            $message .= '
            <table border="1px solid black" style="width:650px; text-align:center; border:1px solid black";>
            <tr>
                        <th><b>Approver Name</b></th>
                        <th><b>Status</b></th>
                        <th><b>Approval Date</b></th>
            </tr>
            </thead>
            <tbody>';

            include ('../../../config/dbconfig-OT2.php');
            $qryApprovers = "SELECT distinct(vAppName) as 'vAppName', cStatus, dApproveDate, nLevel from tApprover where cIDNumber = '" . $cIDNumberx . "' and cStatus <> 'APPROVED' order by nLevel asc"; 
            $qryApproversRslt = sqlsrv_query($conn, $qryApprovers);
            while ($rowzx = sqlsrv_fetch_array($qryApproversRslt))  
            {
                if(trim($rowzx['dApproveDate']) == '1900-01-01'){
                    $message .='
                    <tr>
                            <td>'. $rowzx['vAppName'] .'</td>
                            <td>'. $rowzx['cStatus'] .'</td>
                            <td> </td>
                    </tr>
                    ';
                } else {
                    $message .='
                    <tr>
                            <td>'. $rowzx['vAppName'] .'</td>
                            <td>'. $rowzx['cStatus'] .'</td>
                            <td>'. $rowzx['dApproveDate'] .'</td>
                    </tr>
                    ';
                }     
            }

            $message .= '
            </tbody>
            </table>
            <br>';


            //$message .= '<a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNox) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
            //            <a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

            $message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">You may Approve or Reject the application by loging in to the system. Please click this link (http://192.168.1.236/guessemployeeonline/) to redirect.></p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

            $from = "OTApplication@guess.com.ph";

            $headers = "From:" . $from . "\r\n";
            $headers .= "BCC: mabrodriguez@guess.com.ph;jpsarinas@guess.com.ph;rkpedrique@guess.com.ph;" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            
            mail($to,$subject,$message,$headers);

    }

    include('../../../config/dbconfig-OT.php');
    $qryApprovers = "SELECT vAppName from tOnlineGlobalApproval where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
    $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
    $rowc = sqlsrv_has_rows($rsltApprovers);
                
    if($rowc==false){
        
      $_SESSION['U_ErrorMessage'] = 'Approvers Not Set! Please configure approvers on Online Approval(s) Module!';
      session_write_close();
      header("location: ../view/OvertimeHO.php");
      exit;

    } else {
        
        include('../../../config/dbconfig-OT2.php');
        $query = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."'"; 
        $rslt = sqlsrv_query($conn, $query);
        $rowx = sqlsrv_has_rows($rslt);

        if($rowx==true){

            while ($rowAz = sqlsrv_fetch_array($rslt))  
            {
                $Datex = $rowAz['dDate'];
                $cSysIDx = $rowAz['cSysID'];
        
                //send to process
                $qryAddDetailed = "INSERT into tOTProcess SELECT * from tOTQue where cidnumber = '". $cIDNumber ."' and dDate = '". $Datex ."'";
                $rsltAddDetailed=sqlsrv_query($conn, $qryAddDetailed);
        
                    //check approver detail and insert to approver table
                    $queryx = "SELECT * from vAppDet where cIDNumber = '". $cIDNumber ."' order by nLevel asc"; 
                    $rsltz = sqlsrv_query($conn, $queryx);
                    while ($rowAx = sqlsrv_fetch_array($rsltz))  
                    {
                        $vAppNamex = trim($rowAx['vAppName']);
                        $nLvlx = trim($rowAx['nLevel']);
                        $vEmailx = trim($rowAx['vemail']);
                        $statx = 'PENDING';
                        $pendD = '1900-01-01';
        
                            $insQry = "INSERT into tApprover (cSysID, cIDNumber, vAppName, vEmail, nLevel, cStatus, dApproveDate) values (?,?,?,?,?,?,?)";
                            $insParam = array($cSysIDx, $cIDNumber, $vAppNamex, $vEmailx, $nLvlx, $statx, $pendD);
                            $insQryResult = sqlsrv_query($conn, $insQry, $insParam);
        
                    }
            } 
            //check if approver is existing
            $qryApproverE = "SELECT vEmail from tApprover where cSysID = '" . $cSysIDx . "' and nLevel ='1'"; 
            $rslt = sqlsrv_query($conn, $qryApproverE);
            while ($rowAz = sqlsrv_fetch_array($rslt))  
                {
                    $vEmail = trim($rowAz['vEmail']);
                }
        
            //check approver max lvl
            $qryApproverE = "SELECT max(nLevel) as 'nMax' from tApprover where cSysID = '" . $cSysIDx . "'"; 
            $rslt = sqlsrv_query($conn, $qryApproverE);
            while ($rowAxz = sqlsrv_fetch_array($rslt))  
                {
                    $nMaxz = trim($rowAxz['nMax']);
                }
        
            //delete to que
            $qryDelQ = "delete from tOTQue where cidnumber = '". $cIDNumber ."'";
            $rsltAddDetailed=sqlsrv_query($conn, $qryDelQ);
        
            OTEmail(1,$nMaxz,$vEmail,$cIDNumber);
            //OTEmail(1,$nMaxz,'jpsarinas@guess.com.ph',$cIDNumber);
        
            //$_SESSION['U_ValidMessage'] = $vEmail;
            $_SESSION['U_ValidMessage'] = 'OT Application(s) Successfully Submitted For Approval!';
            session_write_close();
            header("location: ../view/OvertimeHO.php");
        
        } else {

            $_SESSION['U_ErrorMessage'] = 'No Existing OT Application On Que!';
            session_write_close();
            header("location: ../view/OvertimeHO.php");
        

        }
    }

  


    
?>