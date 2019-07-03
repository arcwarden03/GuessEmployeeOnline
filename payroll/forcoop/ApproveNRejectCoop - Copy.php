<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
	session_start();

	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	$f = Mir('decrypt', $_GET['f']); //agency
    $p = Mir('decrypt', $_GET['p']); //employee name

      
	

			if ($x=='APPROVED')
				{



//====================================================================KINGS COOPERATIVE==============================================================================//

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
					header("location: PIFApprovers.php");

					

						//$to = 'guess@kingsgroup.com.ph;mabrodriguez@guess.com.ph;';
						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Kings Cooperative : " . $y. "";
						
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

						}



//====================================================================KINGS COOPERATIVE==============================================================================//




//==================================================================YEARNINGS COOPERATIVE==============================================================================//

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
					header("location: PIFApprovers.php");

						//$to = 'lopezjordanryan.yoc@gmail.com;mabrodriguez@guess.com.ph;';
						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF YEARNINGS OUTSOURCING COOPERATIVE : " . $y. "";
						
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

					   

						}



//===================================================================YEARNINGS COOPERATIVE==============================================================================//




//==================================================================Paramount COOPERATIVE==============================================================================//

                     if($f=='Paramount MPC')
						{


					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

						//$to = 'guess@paramountmpc.org;mabrodriguez@guess.com.ph;';
						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "Paramount MPC : " . $y. "";
						
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

					  

						}



//==================================================================Paramount COOPERATIVE==============================================================================//



//==================================================================Restel COOPERATIVE==============================================================================//

                     if($f=='Restel-MPC')
						{


					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

						//$to = 'restelmpc@gmail.com;mabrodriguez@guess.com.ph;';
						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "Restel-MPC : " . $y. "";
						
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

					  

						}



//==================================================================Restel COOPERATIVE==============================================================================//



//=============================================================Job Placement COOPERATIVE==============================================================================//

                     if($f=='Job Placement Resources Service Coop')
						{


					date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                    $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

						//$to = 'marlon.balatbat@jprsc.com;mabrodriguez@guess.com.ph;';
						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "Job Placement Resources Service Coop : " . $y. "";
						
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

					  

						}

						else{

						 $_SESSION['U_ErrorMessage'] = "Employee does not have Agency!Kindly Contact IT!";
				session_write_close();
				header("location: PIFApprovers.php");


						}
//==============================================================Job Placement COOPERATIVE==============================================================================//





		//end tag of approved
				}



//IF REQUEST IS REJECTED

			elseif ($x=='REJECTED')
				{

//====================================================================KINGS COOPERATIVE==============================================================================//
					 if($f=='KINGS COOPERATIVE')
						{

						//$to = 'guess@kingsgroup.com.ph;mabrodriguez@guess.com.ph;';
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
				header("location: PIFApprovers.php");	

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



						}	

//====================================================================KINGS COOPERATIVE==============================================================================//





//==================================================================Yearnings COOPERATIVE==============================================================================//
					 if($f=='YEARNINGS OUTSOURCING COOPERATIVE')
						{


					    //$to = 'lopezjordanryan.yoc@gmail.com;mabrodriguez@guess.com.ph;';
				   		$subject = "YEARNINGS OUTSOURCING COOPERATIVE " . $y . "";
						
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
				header("location: PIFApprovers.php");	

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



						}	

//==================================================================Yearnings COOPERATIVE==============================================================================//



//==================================================================Paramount COOPERATIVE==============================================================================//
					 if($f=='Paramount MPC')
						{

						 //$to = 'guess@paramountmpc.org;mabrodriguez@guess.com.ph;';	
					    $to = 'mabrodriguez@guess.com.ph;';
				   		$subject = "Paramount MPC " . $y . "";
						
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
				header("location: PIFApprovers.php");	

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



						}	

//==================================================================Paramount COOPERATIVE==============================================================================//



//==================================================================Restel COOPERATIVE==============================================================================//
					 if($f=='Restel-MPC')
						{

						 //$to = 'restelmpc@gmail.com;mabrodriguez@guess.com.ph;';	
					    $to = 'mabrodriguez@guess.com.ph;';
				   		$subject = "Restel-MPC " . $y . "";
						
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
				header("location: PIFApprovers.php");	

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



						}	

//==================================================================Restel COOPERATIVE==============================================================================//



//==================================================================JOB pPRSC COOPERATIVE==============================================================================//
					 if($f=='Job Placement Resources Service Coop')
						{

						//$to = 'marlon.balatbat@jprsc.com;mabrodriguez@guess.com.ph;';		
					    $to = 'mabrodriguez@guess.com.ph;';
				   		$subject = "Job Placement Resources Service Coop" . $y . "";
						
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
				header("location: PIFApprovers.php");	

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



						}	

//==================================================================JOBSPRC COOPERATIVE==============================================================================//


else
						{


					 
				$_SESSION['U_ErrorMessage'] = "Employee does not have Agency!Kindly Contact IT for assistance!";
				session_write_close();
				header("location: PIFApprovers.php");


						}	
















				//end tag of rejected	
				}
			


?>