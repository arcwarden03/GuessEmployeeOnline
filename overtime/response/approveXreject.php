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
           
            include ('../../config/dbconfig-OT2.php');
            $query = "SELECT * from tOTProcess where cSysID = '" . $cControlNo . "' order by cSysID asc";  
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

            /*$message .= '-----------------------------------------------------------------------------<br>';
            $message .= '<b>Reason: </b>'.$vReason1.' : ' .$vReason2. '<br>';
            $message .= '-----------------------------------------------------------------------------<br>';*/
            
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

            include ('../../config/dbconfig-OT2.php');
            $queryx = "SELECT * from tOTProcess where cSysID = '" . $cControlNo . "' order by cSysID asc";  
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

            include ('../../config/dbconfig-OT2.php');
            $qryApprovers = "SELECT distinct(vAppName) as 'vAppName', cStatus, dApproveDate, nLevel from tApprover where cSysID = '" . $cControlNo . "' order by nLevel asc"; 
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
            $headers .= "BCC: mabrodriguez@guess.com.ph;jpsarinas@guess.com.ph;" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            
            mail($to,$subject,$message,$headers);

       }

/* Email Function End */

        $postLevel = $lvl + 1;
        //check if approver is existing
        $qryApproverE = "SELECT vEmail from tApprover where cSysID = '" . $cSysIdz . "' and nLevel ='". $postLevel ."'"; 
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

                $upStatAPx = "update tApprover set cStatus = 'BYPASSED', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel <'" . $lvl ."' and cStatus = 'PENDING'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                $upStatAPx = "update tOTProcess set cStatus = '" . $actionx . "'
                            where cSysID = '" . $cSysIdz . "'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);
      
             
                $_SESSION['U_ValidMessage'] = 'OT Application Successfully Approved!';
                session_write_close();
                header("location: ../approver/view/OTApprovalHO.php");
                

            } 
            else 
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');

                $upStatAPx = "update tApprover set cStatus = 'BYPASSED', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel <'" . $lvl ."' and cStatus = 'PENDING'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                $dApproveDateTime=date("y/m/d : H:i:s", time()); 
                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPx = "update tOTProcess set cStatus = '" . $actionx . "'
                            where cSysID = '" . $cSysIdz . "'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);
                                       

                        $_SESSION['U_ValidMessage'] = 'OT Application Successfully Rejected!';
                        session_write_close();
                        header("location: ../approver/view/OTApprovalHO.php");
                        
        
            
            }

        } else {

            if($actionx == "APPROVED")
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                
                $upStatAPx = "update tApprover set cStatus = 'BYPASSED', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "' and nLevel <'" . $lvl ."' and cStatus = 'PENDING'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                            dApproveDate = '" . $dApproveDateTime . "' 
                            where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";

                $upStatAPRes = sqlsrv_query($conn, $upStatAP);
                $lvl = $lvl + 1;

                OTEmail($lvl, $lvlmax, $vEmailz ,$cSysIdz);
                //OTEmail($lvl, $lvlmax, 'jpsarinas@guess.com.ph' ,$cSysIdz);


                $_SESSION['U_ValidMessage'] = 'OT Application Successfully Approved!';
                session_write_close();
                header("location: ../approver/view/OTApprovalHO.php");
                


            }
            else
            {
                //update approval status
                date_default_timezone_set('Asia/Manila');
                $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                
                $upStatAPx = "update tApprover set cStatus = 'BYPASSED', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "' and nLevel <'" . $lvl ."' and cStatus = 'PENDING'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                $upStatAP = "update tApprover set cStatus = '" . $actionx . "', 
                dApproveDate = '" . $dApproveDateTime . "' 
                where cSysID = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                $upStatAPRes = sqlsrv_query($conn, $upStatAP);

                $upStatAPx = "update tOTProcess set cStatus = '" . $actionx . "'
                            where cSysID = '" . $cSysIdz . "'";
                $upStatAPResx = sqlsrv_query($conn, $upStatAPx);

                    $insProc = "INSERT into tOTProcessH SELECT * from tOTProcess where cSysID='". $cSysIdz ."'";
                    $insProcRes = sqlsrv_query($conn, $insProc);
                
                        $delProc = "DELETE from tOTProcess where cSysID='". $cSysIdz ."'";
                        $delProcRes = sqlsrv_query($conn, $delProc);
                
                
                    $insApp = "INSERT into tApproverH SELECT * from tApprover where cSysID='". $cSysIdz ."'";
                    $insAppRes = sqlsrv_query($conn, $insApp);
                
                        $delApp = "DELETE from tApprover where cSysID='". $cSysIdz ."'";
                        $delAppRes = sqlsrv_query($conn, $delApp);

                        $_SESSION['U_ValidMessage'] = 'OT Application Successfully Rejected!';
                        session_write_close();
                        header("location: ../approver/view/OTApprovalHO.php");
                        

            }
        }
            
    

 ?>