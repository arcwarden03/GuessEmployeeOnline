<?php
include('Auth.php');
	include ('../../../config/dbconfig-login.php');
	include ('MirFunctions.php');
	session_start();

	$Level = $_GET['nLevel'];
	$x = Mir('decrypt', $_GET['ctrl']);
	$Approve = Mir('encrypt', "APPROVED");
	$Reject = Mir('encrypt', "REJECTED");

	//check if approver is existing
	$cApprover1="";
	$eMail="";
	$fApprover = "Select * from tApprovers where cControlNumber = '" . $x . "' and nLevel = " . $Level;
	$rApprover = mysql_query($fApprover) or die(mysql_error());
	$exists=mysql_num_rows($rApprover);
	if ($exists>0)
		{
			while ($ActiveApprover = mysql_fetch_array($rApprover))
				{
					$cApprover1=$ActiveApprover['vAppName'];
				}
			//Get email of approver
			if($cApprover1=="")
			{
				include('../../../config/dbconfig-SQL.php');
				$fmail = "Select * from vOnlineUserAccount where vName = '" . $cApprover1 . "'";
	            $rmail=sqlsrv_query($conn, $fmail);
	            while ($appmail = sqlsrv_fetch_array($rmail))  
		            {
		            	$eMail=$appmail['vemail'];
		            }
        	}

		}

	//BEGIN EMAIL BODY
	$functionqry = "Select * from ttransactionmir where cControlNumber = '" . $x . "'";
	$result = mysql_query($functionqry ) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) 		
		{
			//$cApprover1 = $row['cApprover1'];
			$vName = $row['vName'];
			$vHRApprover1Remarks = $row['vHRApprover1Remarks'];

					//send notification to approver
					//$to = $eMail . '; rkpedrique@guess.com.ph;mabrodriguez@guess.com.ph';
					$to = 'jpsarinas@guess.com.ph';
					$subject = "Uniform Request: " . $vName;

					$message = "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">You have a pending Uniform request for approval. Please see below details:</p>";
					
					$message = $message . "<strong>Request Details</strong><br>";
					$message = $message . '<table style="border: 1px solid #000000">';

					$message = $message . "<thead style=\"background:#999999\">";
					$message = $message . "<tr><td>Category</td><td>Size</td><td>Quantity</td></tr>";
					$message = $message . "</thead>";
					$message = $message . "<tbody>";
									
					$emailqry = "Select * from tTransactionmirdetailed where cControlNumber = '" . $x  . "'";
					$mail=mysql_query($emailqry);
					
				while($rowMail = mysql_fetch_array($mail)){
						$message = $message . "<tr><td style=\"width:300px\">".$rowMail['cStyle']."</td><td>".$rowMail['cSize']."</td><td>".$rowMail['nQuantity']."</td></tr>";
					}			

							$message = $message . "</tbody>";
							$message = $message . "</table><br><br>";
							
							$message = $message . "<strong>HR Remarks</strong><br>";
							$message = $message . '<table style="border: 1px solid #000000">';
							$message = $message . "<thead style=\"background:#999999\">";
							$message = $message . "<tr><td>Remarks</td></tr>";
							$message = $message . "</thead>";
							$message = $message . "<tbody>";
							$message = $message . "<tr><td style=\"width:300px;\">".$vHRApprover1Remarks."</td></tr>";
							$message = $message . "</tbody>";
							$message = $message . "</table><br><br>";
					
							//show approvers\
							$message = $message . "<strong>Approvers</strong><br>";
							$message = $message . '<table style="border: 1px solid #000000">';
							$message = $message . "<thead style=\"background:#999999\">";
							$message = $message . "<tr><td style=\"width:300px\">Name</td>";
							$message = $message . "<td style=\"width: 50px\">Status</td>";
							$message = $message . "<td style=\"width: 50px\">Date</td></tr>";
							$message = $message . "</thead>";
							$message = $message . "<tbody>";
							$fAllAPp = "Select * from tApprovers where cControlNumber = '" . $x . "' order by nLevel asc";
							$rAllAPp = mysql_query($fAllAPp ) or die(mysql_error());
							while ($rowListAPprovers = mysql_fetch_array($rAllAPp)) 		
								{
									$ApproverName = $rowListAPprovers['vAppName'];
									$cStatus = $rowListAPprovers['cStatus'];
									$dApproveDate = $rowListAPprovers['dApproveDate'];
							
									$message = $message . "<tr><td>".$ApproverName."</td><td>".$cStatus."</td><td>".$dApproveDate."</td></tr>";
								}
							$message = $message . "</tbody>";
							$message = $message . "</table><br><br>";


							$message = $message . '<a href="#"></a><a href="http://localhost/eUniform/response.php?w=' . $Level . '&x=' . $Approve . '&y=' . $_GET['ctrl'] . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a>  <a href="http://localhost/eUniform/response.php?w=' . $Level . '&x=' . $Reject . '&y=' . $_GET['ctrl'] . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';
							$message = $message . "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.2.103/euniformrequests).</p>";
							$message = $message . "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
							$message = $message . "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

					$from = "UniformRequest@guess.com.ph";
					$headers = "From:" . $from . "\r\n";
					$headers .= "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					mail($to,$subject,$message,$headers);
		
		
				if (mail)
				{
					$timezonez = "Asia/Manila";
					if(function_exists('date_default_timezone_set')) 
					date_default_timezone_set($timezonez);
					$dValidateDate=date("y/m/d : H:i:s", time());

					$qryUpdateValidation = "update ttransactionmir set cCurrentServer = 'Approver', cHRDClerk='VALIDATED', dClerkValidated='" . $dValidateDate . "' where cControlNumber = '" . $x . "'";
					$qryAddResult=mysql_query($qryUpdateValidation);
				}
				else
				{
					$_SESSION['U_ErrorMessage'] = "System encountered an error while processing. please call IT for support.";
					session_write_close();
					header("location: ../views/app-process.php");
				}
		}
		
	$_SESSION['U_ValidMessage'] = "Submitted to superior for approval";
	session_write_close();
	header("location: ../views/rnf-process.php");

?>

