<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	//$q2 = Mir('decrypt', $_GET['q2']); //reason
	$z = $w + 1;

	
			if ($x=='APPROVED')

				{

	       		
                  $functionqry = "Select * from tblpayrolldetails where cControlNumber = '" . $y . "'";

                 

                  $result = mysql_query($functionqry) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      
                      $dHRDRemarks = $row['dHRDRemarks'];
  
		      
	                 }
				


if ($dHRDRemarks == 'No Remarks yet' ) {
		$errmsg_arr = 'NO REMARKS ADDED!Be sure to add remarks!';				
		$errflag = true;
					//If there are input validations, redirect back to the login form
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIFHRD.php");
			exit();
			}
	}


					 	$qryAdd = "update tblpayroll set cApprover1Status='APPROVED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Payroll for Processing' where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		
						$qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',dAddResponse='No Remarks yet'  where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);	

						 header("location: s_SendPayrollNotification.php?");
						//header("location: emailresponse.php?nLevel=" . $NextLevel . "&ctrl=" . $_GET['y'] . ")");
                       
					

				$_SESSION['U_ValidMessage'] = "successfully sent to" ;
				session_write_close();
				header("location: PIFHRD.php");	


				}
			



		
?>