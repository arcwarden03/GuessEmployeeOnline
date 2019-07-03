<?php 
    include ('../../../config/dbconfig-OT2.php');
    session_start();
    
    $cIDNumber = $_SESSION['SESS_cIDNumber'];

    function OTEmail($nlvl, $nMax, $eMail, $cIDNumberx)
    {
            include ('../../../config/dbconfig-OT2.php');
            $query = "SELECT * from tOTProcess where cidnumber = '" . $cIDNumberx . "' order by cSysID asc";  
            $rslt = sqlsrv_query($conn, $query);
            while ($row = sqlsrv_fetch_array($rslt))  
            {
                $cControlNox = $row['cSysID'];
                $EmpNamex = $row['vName'];
                $dFdate = $row['dFiledDate'];
                $dDate = $row['dDate'];
                $dFrom = $row['dFrom'];
                $dTo = $row['dTo'];
                $vReason1 = $row['vReason'];
                $vReason2 = $row['vOtherR'];
            }
            
            //$to = $eMail;
            //$to = $eMail . '; jpsarinas@guess.com.ph';
            $to = 'jpsarinas@guess.com.ph';
            $subject = 'Overtime Application Form: '.$EmpNamex.'';

            $message = "You have a pending OT Application for approval. Please see below details: <br><br>";
            $message .= '<b>From: </b>'.$EmpNamex.'<br>';

            $message .= '-----------------------------------------------------------------------------<br>';
            $message .= 'Reason: '.$vReason1.' : ' .$vReason2. '<br>';
            $message .= '-----------------------------------------------------------------------------<br>';
            
            $message .= '<br><strong>OT Details</strong></br>';
            $message .= '
            <table border="1px solid black" style="width:400px; text-align:center; border:1px solid black";>
            <tr>
                    <th><b>Filed Date</b></th>
                    <th><b>OT Date</b></th>
                    <th><b>Time Covered</b></th>
            </tr>
            </thead>
            <tbody>';

                $message .='
                <tr>
                        <td>'. $dFdate .'</td>
                        <td>'. $dDate .'</td>
                        <td>'. $dFrom .' - '. $dTo.'</td>
                </tr>
                ';
            

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

            $qryApprovers = "SELECT * from tApprover where cSysID = '" . $cControlNox . "' order by nLevel asc"; 
            $rslt = sqlsrv_query($conn, $qryApprovers);
            while ($rowx = sqlsrv_fetch_array($rslt))  
            {
                $message .='
                <tr>
                        <td>'. $rowx['vAppName'] .'</td>
                        <td>'. $rowx['cStatus'] .'</td>
                        <td>'. $rowx['dApproveDate'] .'</td>
                </tr>
                ';
            }
            $message .= '
            </tbody>
            </table>
            <br>
            <br>';


            $message .= '<a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNox) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
                        <a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

            $message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.1.236/guessemployeeonline/index.php)></p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

            $from = "OTApplication@guess.com.ph";

            $headers = "From:" . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            
            mail($to,$subject,$message,$headers);

    }

    $query = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."'"; 
    $rslt = sqlsrv_query($conn, $query);
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
                $vAppNamex = $rowAx['vAppName'];
                $nLvlx = $rowAx['nLevel'];
                $vEmailx = $rowAx['vemail'];
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
   
    //OTEmail(1,$vEmail',$cIDNumber);
    //OTEmail(1,$nMaxz,'jpsarinas@guess.com.ph',$cIDNumber);

    //$_SESSION['U_ValidMessage'] = $vEmail;
    $_SESSION['U_ValidMessage'] = 'OT Application(s) Successfully Submitted For Approval!';
    session_write_close();
    header("location: ../view/OvertimeST.php");

?>