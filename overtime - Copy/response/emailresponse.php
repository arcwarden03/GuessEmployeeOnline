<?php 
        session_start();
        include('../../config/dbconfig-OT2.php');

        $actionx = $_GET['x'];
        $cSysIdz = trim($_GET['cSysIdx']);
        $lvl = $_GET['xLvl'];
        $lvlmax = $_GET['xLvlMax'];
    

/* Email Function */

function OTEmail($nlvl, $nMax, $eMail, $cControlNo)
       {
            include('../../config/dbconfig-OT2.php');
            $query = "SELECT * from tOTProcess where cSysID = '" . $cControlNo . "'";  
            $rslt = sqlsrv_query($conn, $query);
            while ($rowAz = sqlsrv_fetch_array($rslt))  
            {
                $EmpNamex = $rowAz['vName'];
                $dFdate = $rowAz['dFiledDate'];
                $dDate = $rowAz['dDate'];
                $dFrom = $rowAz['dFrom'];
                $dTo = $rowAz['dTo'];
                $vReason1 = $rowAz['vReason'];
                $vReason2 = $rowAz['vOtherR'];
            }
            
            //$to = $eMail;
            //$to = $eMail . '; jpsarinas@guess.com.ph';
            $to = 'jpsarinas@guess.com.ph';
            $subject = 'Overtime Application Form: '.$EmpNamex.'';

            $message = "You have a pending OT Application for approval. Please see below details: <br><br>";
            $message .= 'From: <b>'.$EmpNamex.'</b><br>';

            $message .= '-----------------------------------------------------------------------------<br>';
            $message .= 'Reason: '.$vReason1.' : ' .$vReason2. '<br>';
            $message .= '-----------------------------------------------------------------------------<br>';
            
            $message .= '<br><strong>OT Details</strong></br>';
            $message .= '
            <table border="1px solid black" style="width:400px; text-align:left; border:1px solid black";>
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
            <table border="1px solid black" style="width:650px; text-align:left; border:1px solid black";>
            <tr>
                        <th><b>Approver Name</b></th>
                        <th><b>Status</b></th>
                        <th><b>Approval Date</b></th>
            </tr>
            </thead>
            <tbody>';

            $qryApprovers = "SELECT * from tApprover where cSysID = '" . $cControlNo . "' order by nLevel asc"; 
            $rslt = sqlsrv_query($conn, $qryApprovers);
            while ($rowAx = sqlsrv_fetch_array($rslt))  
            {

                $message .='
                <tr>
                        <td>'. $rowAx['vAppName'] .'</td>
                        <td>'. $rowAx['cStatus'] .'</td>
                        <td>'. $rowAx['dApproveDate'] .'</td>
                </tr>
                ';
            }
            $message .= '
            </tbody>
            </table>
            <br>
            <br>';


            $message .= '<a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNo) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
                        <a href="http://192.168.1.236/guessemployeeonline/overtime/response/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNo) . '&xLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

            $message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.1.236/guessemployeeonline/index.php)></p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
            $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

            $from = "OTApplication@guess.com.ph";

            $headers = "From:" . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            
            mail($to,$subject,$message,$headers);

       }

/* Email Function End */

        //check if approver is existing
        $qryApproverE = "SELECT vEmail from tApprover where cSysID = '" . $cSysIdz . "' and nLevel ='". $lvl ."'"; 
        $rslt = sqlsrv_query($conn, $qryApproverE);
        while ($rowAz = sqlsrv_fetch_array($rslt))  
        {
            $vEmailz = $rowAz['vEmail'];
        }


        if($lvlmax == $lvl){
            if($actionx == "APPROVED")
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');

                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                $upStatAPx = "update tOTProcess set cStatus = '" . $actionx . "'
                            where cSysID = '" . $cSysIdz . "'";

                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);
      

                echo $cSysIdz;
                echo'&nbsp;';
                echo 'OT Successfully Approved!';
            } 
            elseif ($actionx=='REJECTED') 
            {
                //update approval status
                $dApproveDateTime=date("y/m/d : H:i:s", time()); 
                $upStatAP = "update tblapprovers set cStatus = '" . $actionx . "', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                echo 'PIF Successfully Rejected!';

                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
            

            }
        } else {

            if($actionx == "APPROVED")
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);
                $lvl = $lvl + 1;

                //OTEmail($lvl, $lvlmax, $vEmailz ,$cSysIdz);
                OTEmail($lvl, $lvlmax, 'jpsarinas@guess.com.ph' ,$cSysIdz);

                echo $cSysIdz;
                echo'&nbsp;';
                echo 'OT Application Successfully Approved!';
            }
            elseif ($actionx=='REJECTED') 
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');

                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                echo $cSysIdz;
                echo'&nbsp;';
                echo 'OT Application Successfully Rejected!';

                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
            

            }
            else
            {
                    echo "Already responded. No action needed. thank you!";
            }
        }
            
    

 ?>