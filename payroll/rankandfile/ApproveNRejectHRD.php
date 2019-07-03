<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	$z = $w + 1;

	
			if ($x=='APPROVED')
				{
				

				//checking if remarks is added 
					   $functionqry = "Select * from tblpayrolldetails where cControlNumber = '" . $y . "'";
					   $result = mysql_query($functionqry) or die(mysql_error());
                       $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      
                    $dHRDRemarks = $row['dHRDRemarks'];
 
	              }
				
if ($dHRDRemarks == 'No Remarks yet' ) {
		$errmsg_arr = 'NO REMARKS ADDED,BE SURE TO UPDATE REMARKS!';				
		$errflag = true;
		
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIFHRD.php");
			exit();
			}
	}


					   	$qryAdd = "update tblpayroll set cCurrentLocation='Payroll for Processing' where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		
						$qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',dAddResponse='No Remarks yet'  where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);	

						$to = 'mabrodriguez@guess.com.ph;';
						$subject = "Payroll Inquiry Form: Control Number: " . $y. "";
						$message = "You have a pending PIF Request for Processing.Kindly Login to see more details!<br><br>
						This is an automatically generated email please do not reply to this mail. 
                          Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system.";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

					    $_SESSION['U_ValidMessage'] = " You have successfully approved the request";
				        session_write_close();
					
				$_SESSION['U_ValidMessage'] = " You have successfully sent the request to Payroll";
				session_write_close();
				header("location: PIFHRD.php");	


				}


		
?>