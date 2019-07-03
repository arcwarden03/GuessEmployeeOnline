<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	$z = $w + 1;


	//check if there are remaining for approval
	$NextLevel=0;
	$chkNext = "SELECT * from tblapprovers where cControlNumber = '" . $y . "' and cStatus = 'PENDING' and nLevel=" . $z;
	$rnxt = mysql_query($chkNext) or die(mysql_error());
	while ($rowNext = mysql_fetch_array($rnxt))
		{
			$NextLevel = $rowNext['nLevel'];
		} 


	//CHECK IF ALREADY RESPONDED
	$fResponded = "SELECT * from tblapprovers where cControlNumber = '" . $y . "' and cStatus = 'PENDING' and nLevel=" . $w;
	$rResponded = mysql_query($fResponded) or die(mysql_error());
	$mResponded=mysql_num_rows($rResponded);
	if ($mResponded==1) 
    	{
		  date_default_timezone_set('Asia/Manila');
          $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');

		
			//update approval status
			$qryAdd = "update tblapprovers set cStatus = '" . $x . "', dApproveDate = '" . $dApproveDateTime . "' where cControlNumber = '" . $y . "' and nLevel= " . $w;
			$qryAddResult=mysql_query($qryAdd);

			

		
			//$qry = "Insert into temailresponded (ccontrolnumber) values ('" . $y . "')";
			//$execqry=mysql_query($qry);

			//Archive if rejected
			if ($x=='APPROVED')
				{
					//Bypass lower approvers
					$qBypass = "update tblapprovers set cStatus = 'BYPASSED' where cControlNumber = '" . $y . "' and nLevel < " . $w ." and cStatus = 'PENDING'";
					ECHO $qBypass;
					$rBypass=mysql_query($qBypass);
					
					if($NextLevel==0)
					{	


						if($c=='Unpaid Leave (VL / SL / EL)')
						{

						date_default_timezone_set('Asia/Manila');
                         $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');	

						$qryAdd = "update tblpayroll set cApprover1Status='APPROVED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='HRD for Processing' where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		
						$qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',dAddResponse='No Remarks yet',dHRDRemarks='No Remarks yet'  where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		

						header("location: s_SendHRDNotification.php?");

					     }

					   else {
					   	date_default_timezone_set('Asia/Manila');
                        $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');

					   	$qryAdd = "update tblpayroll set cApprover1Status='APPROVED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Payroll for Processing' where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		
						$qryAdd = "update tblpayrolldetails set dPayrollRemarks='No Remarks yet',dPayrollAction='No Remarks yet',dAddResponse='No Remarks yet',dHRDRemarks='No need for Remarks'  where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);	

						 header("location: s_SendPayrollNotification.php?");

							  }

							 

						//header("location: emailresponse.php?nLevel=" . $NextLevel . "&ctrl=" . $_GET['y'] . ")");
                        
					}


					
				$_SESSION['U_ValidMessage'] = " You have successfully approved the request";
				session_write_close();
				header("location: PIFApprover.php");	




				}
			elseif ($x=='REJECTED')
				{
					$qryAdd = "update tblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
							
					$qryAdd = "insert into tblpayrollh select * from tblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from tblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into tblpayrolldetailsh select * from tblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from tblpayrolldetails where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				$_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprover.php");	

					
				}
			

			//echo "You have successfully [" . $x . "] the request."; 
				$_SESSION['U_ValidMessage'] = " You have successfully approved the request.It is now sent to Payroll for Confirmation!";
				session_write_close();
				header("location: PIFApprover.php");	


		}
	else
		{
			echo "Already responded. No action needed. thank you!";
		}
?>