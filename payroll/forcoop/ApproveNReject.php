<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	$f = Mir('decrypt', $_GET['f']); //agency
    $p = Mir('decrypt', $_GET['p']); //agency
      
	$z = $w + 1;

			if ($x=='APPROVED')
				{

//-----------------------------------------------------------------KINGS COOPERATIVE-----------------------------------------------------------------------------------//	
					
                   	if($f=='KINGS COOPERATIVE')
						{

					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprover.php");


						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Kings Cooperative " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment!</br>


						<br><br>
						This is an automatically generated email please do not reply to this mail. 
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

					    echo'You have successfully approved.Request is now sent to Agency Coordinator';
				     
                           }

                     

//-----------------------------------------------------------------KINGS COOPERATIVE-----------------------------------------------------------------------------------//
				

//-----------------------------------------------------YEARNINGS OUTSOURCING COOPERATIVE-------------------------------------------------------------------------------//
				
	
                   	if($f=='YEARNINGS OUTSOURCING COOPERATIVE')
						{

					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprover.php");


						$to = 'jpsarinas@guess.com.ph; mabrodriguez@guess.com.ph;';
						$subject = "PIF Yearnings Outsourcing " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment!</br>


						<br><br>
						This is an automatically generated email please do not reply to this mail. 
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

					    echo'You have successfully approved.Request is now sent to Agency Coordinator';
				     
                           }

                           	if($f=='KINGS COOPERATIVE')
						{

					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprover.php");


						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Kings Cooperative " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment!</br>


						<br><br>
						This is an automatically generated email please do not reply to this mail. 
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

					    echo'You have successfully approved.Request is now sent to Agency Coordinator';
				     
                           }

//-----------------------------------------------------YEARNINGS OUTSOURCING COOPERATIVE-------------------------------------------------------------------------------//
				





		//end tag of approved
				}



//IF REQUEST IS REJECTED

			elseif ($x=='REJECTED')
				{


//-----------------------------------------------------------------KINGS COOPERATIVE-----------------------------------------------------------------------------------//

					 if($f=='KINGS COOPERATIVE')
						{

				        $to = 'mabrodriguez@guess.com.ph;';
				   		$subject = "PIF Kings Cooperative " . $y . "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " . $p . " is REJECTED by the Approver!</br>


						<br><br>
						This is an automatically generated email please do not reply to this mail. 
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);

				       echo'You have successfully Rejected the Request.';

				       
	          $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprover.php");	
			

				date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				    $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrolldetailsh select * from cooptblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from cooptblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					 }
//-----------------------------------------------------------------KINGS COOPERATIVE-----------------------------------------------------------------------------------//
					

//---------------------------------------------------------YEARNINGS OUTSOURCING COOPERATIVE----------------------------------------------------------------------------//

 if($f=='YEARNINGS OUTSOURCING COOPERATIVE')
						{

				        $to = 'mabrodriguez@guess.com.ph;';
				   		$subject = "PIF Yearnings Outsourcing " . $y . "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " . $p . " is REJECTED by the Approver!</br>


						<br><br>
						This is an automatically generated email please do not reply to this mail. 
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);

				       echo'You have successfully Rejected the Request.';

				       
	          $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprover.php");	
			

				date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				    $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrolldetailsh select * from cooptblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from cooptblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					 }


//---------------------------------------------------------YEARNINGS OUTSOURCING COOPERATIVE----------------------------------------------------------------------------//

				//end tag of rejected	
				}
			


?>