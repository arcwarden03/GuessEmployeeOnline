<?php 
    include ('DBConnect4.php');
   
    session_start();
    
    $cIDNumber = trim($_SESSION['SESS_cIDNumber']);


function PIFEmail($nlvl,$nMax,$cIDno,$EmpNamex,$cControlNox)
        {
            
          $functionqryx = "Select * from tblappcoop where cControlNumber = '" . $cControlNox . "'";
            $resultx = mysql_query($functionqryx ) or die(mysql_error());
            while ($rowx = mysql_fetch_array($resultx))         
                {
                    $cApprover1 = $rowx['vEmail'];

                }

                   $to = $cApprover1 . '; mabrodriguez@guess.com.ph';  
                   // $to ='mabrodriguez@guess.com.ph';  

                    $subject = 'Payroll Inquiry Form COOP: ';

                    $message = "You have a pending PIF for approval. Please see below details: <br><br>";
                    
                    $message .= '<br><strong>Request Details</strong></br>';
                        

                    $message .= '

                    <br><br>

                    <table border="1px solid black" style="width:800px; text-align:left; border:1px solid black";>
                    <tr>
                            <th><b>Name</b></th>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                             <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>';

                
                            $query = "SELECT * from cooptemptable where cidnumber = '" . $cIDno . "'";  
                    $result = mysql_query($query) or die(mysql_error());
                    $maxi=mysql_num_rows($result);
                    while ($row = mysql_fetch_array($result)){

                        $message .='
                        
                        <tr>
                                <td>'. $row['vName'] .'</td>
                                <td>'. $row['dDate'] .'</td>
                                <td>'. $row['dMonth'] .'-'. $row['dYear'].'</td>
                                <td>'. $row['dCutoff'] .'</td>
                                <td>'. $row['dReason'] .'</td>
                                <td>'. $row['dAddRemarks'] .'</td>
                        </tr>

                    
                                
                     
                      



                        ';
                    
                    }

                    $message .= '
                    </tbody>
                    </table>



                    ';

                    



                    //$message .= '<a href="http://192.168.1.236/guessemployeeonline/payroll/forcoop/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($nlvl) . '&EmpNamex=' . trim($EmpNamex) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
                                // <a href="http://192.168.1.236/guessemployeeonline/payroll/forcoop/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($nlvl) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

                    $message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">You need to Approve or Reject the PIF Request by logging in to the Employee Management System (http://192.168.1.236/guessemployeeonline).</p>";
                    $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
                    $message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

                    $from = "PIFRequest@guess.com.ph";

                    $headers = "From:" . $from . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                    
                    mail($to,$subject,$message,$headers);


        }

                
            
                $query = "SELECT * from cooptemptable where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
                $result = mysql_query($query) or die(mysql_error());
                $maxi=mysql_num_rows($result);
                $rowq = mysql_fetch_array($qryTicketResult);
                if ($maxi>0)
                        {
                                $timezone = "Asia/Manila";
                                if(function_exists('date_default_timezone_set')) 
                                date_default_timezone_set($timezone);
                                $dRequestDate=date("y/m/d : H:i:s", time()); 
                                $cIDNumber = $_SESSION['SESS_cIDNumber'];
                                $EmployeeID = $_SESSION['EmployeeID'];
                                $vName = $_SESSION['vName'];
                                $vDepartment = $_SESSION['vDepartment'];
                                $vDesignation = $_SESSION['vDesignation'];
                                $vAgency= $_SESSION['vAgency'];
                                $vApprover = $_SESSION['vApprover'];

                                //get control number
                                $resultx = mysql_query($query) or die(mysql_error());
                                while ($rowx = mysql_fetch_array($resultx))         
                                    {
                                        $cControlNumber = $rowx['cControlNumber'];
                                    }
                       
                                

                                //insert into header
                                // $qryAdd = "INSERT into cooptblpayroll SELECT * from cooptemptable where cidnumber = '". $cIDNumber ."'";
                                // $qryAddResult=mysql_query($qryAdd); 
                            
                                $qryAdd ="insert into cooptblpayroll (cControlNumber,cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,dAddRemarks,cApproverName,cApproverEmail,cApprover1Status,dRequestDate,cCurrentLocation,dHRDRemarks) ";
                                $qryAdd = $qryAdd . "select cControlNumber,cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,dAddRemarks,cApproverName,cApproverEmail,'PENDING',dRequestDate,cCurrentLocation,dHRDRemarks from cooptemptable where cidnumber = '" . $cIDNumber . "'";
                                echo $qryAdd;
                                $qryAddResult=mysql_query($qryAdd);

                                //PIFEmail(1,$nMaxz,$cIDNumber,$vName,$cControlNo);

                                //insert of approver
                                $qryAdd ="insert into tblappcoop (cControlNumber,vAppName,nLevel,vEmail) ";
                                $qryAdd = $qryAdd . "select cControlNumber,cApproverName,'1',cApproverEmail from cooptemptable where cidnumber = '" . $cIDNumber . "'";
                                echo $qryAdd;
                                $qryAddResult=mysql_query($qryAdd);

                                PIFEmail(1,$nMaxz,$cIDNumber,$vName,$cControlNumber);

                                //delete from payrolltemptable
                                $qryAdd ="delete from cooptemptable where cIDNumber = '" . $cIDNumber . "'";
                                $qryAddResult=mysql_query($qryAdd);

                                //will loop control number on the next insert
                                //$qryAdd = "update tcontrolno set cControlNumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
                                // echo $qryAdd;
                                // $qryAddResult=mysql_query($qryAdd);

                                
                                $_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO YOUR APPROVER! ";               
                                session_write_close();
                                header("location: PIF.php");

                        }   

                else
                        {
                            $_SESSION['U_ErrorMessage'] = "THERE ARE NO RECORDS SAVED IN DATABASE.KINDLY CHECK QUEUE!";
                            session_write_close();
                            header("location: PIF.php");
                        }   










   
?>