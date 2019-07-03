<?php
	include ('config/dbconfig-login.php');
	include ('MirFunctions.php');

	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$z = $w + 1;

	//check if there are remaining for approval
	$NextLevel=0;
	$chkNext = "SELECT * from tApprovers where ccontrolnumber = '" . $y . "' and cStatus = 'PENDING' and nLevel=" . $z;
	$rnxt = mysql_query($chkNext) or die(mysql_error());
	while ($rowNext = mysql_fetch_array($rnxt))
		{
			$NextLevel = $rowNext['nLevel'];
		} 


	//CHECK IF ALREADY RESPONDED
	$fResponded = "SELECT * from tApprovers where ccontrolnumber = '" . $y . "' and cStatus = 'PENDING' and nLevel=" . $w;
	$rResponded = mysql_query($fResponded) or die(mysql_error());
	$mResponded=mysql_num_rows($rResponded);
	if ($mResponded==1) 
    	{
		  	$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) 
			date_default_timezone_set($timezone);
			$dApproveDateTime=date("y/m/d : H:i:s", time()); 

		
			//update approval status
			$qryAdd = "update tApprovers set cStatus = '" . $x . "', dApproveDate = '" . $dApproveDateTime . "' where cControlNumber = '" . $y . "' and nLevel= " . $w;
			$qryAddResult=mysql_query($qryAdd);
		
			$qry = "Insert into temailresponded (ccontrolnumber) values ('" . $y . "')";
			$execqry=mysql_query($qry);

			//Archive if rejected
			if ($x=='APPROVED' )
				{
					//Bypass lower approvers
					$qBypass = "update tApprovers set cStatus = 'BYPASSED' where cControlNumber = '" . $y . "' and nLevel < " . $w ." and cStatus = 'PENDING'";
					ECHO $qBypass;
					$rBypass=mysql_query($qBypass);
					
					if($NextLevel==0)
					{	
						$qryAdd = "update ttransactionmir set cCurrentServer = 'HRD (Manager)', cApprover1Status='APPROVED', dApprover1='" . $dApproveDateTime . "' where cControlNumber = '" . $y . "'";
						$qryAddResult=mysql_query($qryAdd);		
						header("location: config/s_NotifyHRD.php?nLevel=" . $NextLevel . "&ctrl=" . $_GET['y'] . ")");
					}
					else
					{
						header("location: config/s_SendNotification.php?nLevel=" . $NextLevel . "&ctrl=" . $_GET['y'] . ")");
					}
				}
			elseif ($x=='REJECTED')
				{
					$qryAdd = "update ttransactionmir set cCurrentServer = 'Approver', cApprover1Status='REJECTED' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
							
					$qryAdd = "insert into ttransactionmirh select * from ttransactionmir where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from ttransactionmir where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into ttransactionmirdetailedh select * from ttransactionmirdetailed where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
					$qryAdd = "delete from ttransactionmirdetailed where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);
					
				}
			echo "You have successfully [" . $x . "] the request."; 
		}
	else
		{
			echo "Already responded. No action needed. thank you!";
		}
?>