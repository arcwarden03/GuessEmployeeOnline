<?php 
    session_start();
    //include('Auth.php');
    include('DBConnect4.php');

    $actionx = $_GET['x'];
    $cSysIdz = $_GET['cSysIdx'];
    $lvl = $_GET['nLvl'];

    $lvlmax = $_GET['xLvlMax'];
    

            /* Email Function */
            function PIFEmail($nlvl,$nMax,$eMail, $cControlNox)
                {

                    $query = "SELECT * from tblpayroll where cControlNumber = '" . $cControlNox . "'";  
                    $result = mysql_query($query) or die(mysql_error());
                    $maxi=mysql_num_rows($result);
                    while ($row = mysql_fetch_array($result)){
                        $EmpNamex = $row['vName'];
                    }
                    
                    //$to = $eMail;
                    //$to = $eMail . '; jpsarinas@guess.com.ph';
                    $to = 'mabrodriguez@guess.com.ph;';
                    $subject = 'Payroll Inquiry Form: '.$EmpNamex.'';

                    $message = "You have a pending PIF for approval. Please see below details: <br><br>";
                    $message .= 'From: <b>'.$EmpNamex.'</b><br>';
                    $message .= '<br><strong>Request Details</strong></br>';
                    $message .= '
                    <table border="1px solid black" style="width:800px; text-align:left; border:1px solid black";>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                    </tr>
                    </thead>
                    <tbody>';

                    $query = "SELECT * from tblpayrolldetails where cControlNumber = '" . $cControlNox . "'";  
                    $result = mysql_query($query) or die(mysql_error());
                    $maxi=mysql_num_rows($result);
                    while ($row = mysql_fetch_array($result)){
                    
                        $message .='
                        <tr>
                                <td>'. $row['dDate'] .'</td>
                                <td>'. $row['dMonth'] .'-'. $row['dYear'].'</td>
                                <td>'. $row['dCutoff'] .'</td>
                                <td>'. $row['dReason'] .'</td>
                        </tr>
                        ';
                    }

                    $message .= '
                    </tbody>
                    </table>
                    <br>
                    <br>';

                    $message .= '<strong>Approver Details</strong><br>';
                    $message .= '
                    <table border="1px solid black" style="width:800px; text-align:left; border:1px solid black";>
                    <tr>
                                <th><b>Approver Name</b></th>
                                <th><b>Status</b></th>
                                <th><b>Approval Date</b></th>
                    </tr>
                    </thead>
                    <tbody>';

                    $qryApprovers = "SELECT * from tblapprovers where cControlNumber = '" . $cControlNox . "'"; 
                    $result = mysql_query($qryApprovers) or die(mysql_error());
                    $maxi=mysql_num_rows($result);

                    while ($row = mysql_fetch_array($result)){

                        $message .='
                        <tr>
                                <td>'. $row['vAppName'] .'</td>
                                <td>'. $row['cStatus'] .'</td>
                                <td>'. $row['dApproveDate'] .'</td>
                        </tr>
                        ';
                    }
                    $message .= '
                    </tbody>
                    </table>
                    <br>
                    <br>';



                    $message .= '<a href="http://192.168.1.236/guessemployeeonline/payrollfortesting/rankandfile/emailresponse.php?x=APPROVED&cSysIdx='. trim($cControlNox) . '&nLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
                                 <a href="http://192.168.1.236/guessemployeeonline/payrollfortesting/rankandfile/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($nlvl) . '&xLvlMax=' . trim($nMax) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

                    $message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.1.236/guessemployeeonline/index.php).</p>";
                    $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
                    $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

                    $from = "PIFRequest@guess.com.ph";

                    $headers = "From:" . $from . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                    
                    mail($to,$subject,$message,$headers);

                }
            /* Email Function End */

             //check if already responded 
             $isResponded="";
             $fApprover = "Select cStatus from tblapprovers where cControlNumber = '" . $cSysIdz . "' and nLevel = '". $lvl ."' order by nLevel asc";
             $rApprover = mysql_query($fApprover) or die(mysql_error());
             $exists=mysql_num_rows($rApprover);
             if ($exists>0)
                 {
                 while ($ActiveApprover = mysql_fetch_array($rApprover))
                     {
                             $isResponded=$ActiveApprover['cStatus'];
                     }
                 }

    

            if($isResponded == 'APPROVED'){
                echo 'You already responded on this email. No action needed! Thank you!';
            }else{
                
                if($lvlmax==$lvl)
                {   

                $flvlx = "SELECT * from tblpayrolldetails where cControlNumber = '" . $cSysIdz  . "'";
                $rlvlx = mysql_query($flvlx) or die(mysql_error());
                while ($rowlvlx = mysql_fetch_array($rlvlx))
                 {
                    $dReason = $rowlvlx['dReason']; 
                 } 

                 if($dReason=='Unpaid Leave (VL / SL / EL)')
                        {
                            date_default_timezone_set('Asia/Manila');
                            $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                            //$dApproveDateTime=date("m/d/y  H:i:s", time()); 
                            $qryAdd = "update tblapprovers set cStatus = '" . $actionx . "', dApproveDate = '" . $dApproveDateTime . "'
                            where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                            $qryAddResult=mysql_query($qryAdd);
            
                            $qryAdd = "update tblpayroll set cApprover1Status='APPROVED', cApprover1='" . $dApproveDateTime . "',
                                        cCurrentLocation='HRD for Processing' where cControlNumber = '" . $cSysIdz . "'";
                            $qryAddResult=mysql_query($qryAdd);     
                            
                            $qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',
                                        dAddResponse='No Remarks yet',dHRDRemarks='No Remarks yet'  where cControlNumber = '" . $cSysIdz. "'";
                            $qryAddResult=mysql_query($qryAdd);   
                        
                            echo 'PIF Successfully Approved!';

                            //header("location: s_SendHRDNotification.php?nLevel=" . $NextLevel . "&ctrl=" . $_GET['y'] . ")");
                            header("location: s_SendHRDNotification.php?");

                        } else {

                            date_default_timezone_set('Asia/Manila');
                            $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                            //$dApproveDateTime=date("m/d/y  H:i:s", time()); 
                            $qryAdd = "update tblapprovers set cStatus = '" . $actionx . "', dApproveDate = '" . $dApproveDateTime . "'
                            where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                            $qryAddResult=mysql_query($qryAdd);
                            
                            $qryAdd = "update tblpayroll set cApprover1Status='APPROVED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Payroll for Processing' where cControlNumber = '" . $cSysIdz . "'";
                            $qryAddResult=mysql_query($qryAdd);     
                            $qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',dAddResponse='No Remarks yet',dHRDRemarks='No need for Remarks'  where cControlNumber = '" . $cSysIdz  . "'";
                            $qryAddResult=mysql_query($qryAdd); 

                            echo 'PIF Successfully Approved!';
                            header("location: s_SendPayrollNotification.php?");

                        }


                } else {
    
                    //check if approver is existing
                    $cApprover1="";
                    $eMail="";
                    $fApprover = "Select * from tblapprovers where cControlNumber = '" . $cSysIdz . "' and nLevel = '" . $lvl . "'";
                    $rApprover = mysql_query($fApprover) or die(mysql_error());
                    $exists=mysql_num_rows($rApprover);

                    if ($exists>0)
                        {
                            while ($ActiveApprover = mysql_fetch_array($rApprover))
                                {
                                    $cApprover1=$ActiveApprover['vAppName'];
                                }
                            //Get email of approver
                            if($cApprover1!="")
                            {
                                include_once('DBConnect2.php');
                                $fmail = "Select vemail from vOnlineUserAccount where vName = '" . trim($cApprover1) . "'";
                                $rmail=sqlsrv_query($conn, $fmail);
                                while ($appmail = sqlsrv_fetch_array($rmail))  
                                    {
                                        $eMail=$appmail['vemail'];
                                    }
                            }
    
                        }
    
                    //action of email
                    if($actionx == "APPROVED"){

                        //update approval status
                        date_default_timezone_set('Asia/Manila');
                        $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');   
                        //$dApproveDateTime=date("m/d/y  H:i:s", time()); 
                        $qryAdd = "update tblapprovers set cStatus = '" . $actionx . "', dApproveDate = '" . $dApproveDateTime . "'
                        where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                        $qryAddResult=mysql_query($qryAdd);
                        //dito ilagay yung $to na $eMail para masend sa next na approver via email
                        $lvl = $lvl + 1;
                        PIFEmail($lvl,$lvlmax,'$eMail' ,$cSysIdz);
                
                        echo 'PIF Successfully Approved!';
                    } elseif  ($actionx=='REJECTED') {

                        //update approval status
                        date_default_timezone_set('Asia/Manila');
                        $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                        //$dApproveDateTime=date("m/d/y  H:i:s", time()); 
                        $qryAdd = "update tblapprovers set cStatus = '" . $actionx . "', dApproveDate = '" . $dApproveDateTime . "'
                        where cControlNumber = '" . $cSysIdz . "' and nLevel= '" . $lvl ."'";
                        $qryAddResult=mysql_query($qryAdd);
    
                        echo 'PIF Successfully Rejected!!';
            
                                $qryAdd = "update tblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',
                                cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $cSysIdz . "'";
                                $qryAddResult=mysql_query($qryAdd);
                                        
                                $qryAdd = "insert into tblpayrollh select * from tblpayroll where cControlNumber = '" . $cSysIdz . "'";
                                $qryAddResult=mysql_query($qryAdd);
                                
                                $qryAdd = "delete from tblpayroll where cControlNumber = '" . $cSysIdz . "'";
                                $qryAddResult=mysql_query($qryAdd);
            
                                $qryAdd = "insert into tblpayrolldetailsh select * from tblpayrolldetails where cControlNumber = '" .$cSysIdz . "'";
                                $qryAddResult=mysql_query($qryAdd);
                                
                                $qryAdd = "delete from tblpayrolldetails where cControlNumber = '" . $cSysIdz. "'";
                                $qryAddResult=mysql_query($qryAdd);
            
                    }
    
                }
            }
           

 ?>