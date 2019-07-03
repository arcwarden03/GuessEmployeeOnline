<?php
//include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	$y = Mir('decrypt', $_GET['y']); //control number

	session_start();
	
			$wBase=$_SESSION['SESS_cBranch'];
			if(trim($wBase)=='Head Office')
			{
				$wBase='HO';
			}
			else
			{
				$wBase='ST';	
			}
	//will get the data for $cControlNumber from Sir Raymir hehehe
	function GetControlNo() 
		{
			$BaseLoc=$_SESSION['SESS_cBranch'];
			if(trim($BaseLoc)=='Head Office')
			{
				$BaseLoc='HO';
			}
			else
			{
				$BaseLoc='ST';	
			}
			if ($BaseLoc == 'HO') {
					$TickLoc='H';
				}
			else 
				{
					$TickLoc='S';
				}
				
			$functionqry = "Select * from tcontrolno where cWorkBase = '" . $BaseLoc . "'";
			$qryTicketResult=mysql_query($functionqry);
			if (mysql_num_rows($qryTicketResult)<>0)
				{
					$row = mysql_fetch_array($qryTicketResult);
					$LastTicketNo = $row['cControlNumber'];
				}
			$tick= $TickLoc . date("y") . str_pad($LastTicketNo, 4, '0', STR_PAD_LEFT);
			return $tick;
		}


	function PIFEmail($nlvl, $eMail, $cIDno, $EmpNamex, $cControlNox)
		{
			
			//$to = $eMail;
			//		$to = $eMail . '; jpsarinas@guess.com.ph';
			$to = 'jpsarinas@guess.com.ph';
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

			$query = "SELECT * from payrolltemptable where cidnumber = '" . $cIDno . "'";  
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



			$message .= '<a href="http://192.168.1.236/guessemployeeonline/payroll/rankandfile/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($xlvl) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
						 <a href="http://192.168.1.236/guessemployeeonline/payroll/rankandfile/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($xlvl) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

        	$message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.1.236/guessemployeeonline/index.php).</p>";
			$message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
			$message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

			$from = "PIFRequest@guess.com.ph";

			$headers = "From:" . $from . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
			
			mail($to,$subject,$message,$headers);


		}
	
		$query = "SELECT * from payrolltemptable where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
		$result = mysql_query($query) or die(mysql_error());
		$maxi=mysql_num_rows($result);

		if ($maxi>0)
				{
						$timezone = "Asia/Manila";
						if(function_exists('date_default_timezone_set')) 
						date_default_timezone_set($timezone);
						$dRequestDate=date("y/m/d : H:i:s", time()); 
						$cIDNumber = $_SESSION['SESS_cIDNumber'];
						$vName = $_SESSION['SESS_vName'];
						$vDepartment = $_SESSION['SESS_vDepartment'];
						$vDesignation = $_SESSION['SESS_vDesignation'];
						$cApprover1 = '';
						$cApprover2 = '';
						$cCurrentLocation = '';
						// calling function of Controlno
						$cControlNo = GetControlNo();
				
						//saving of approvers in tblapprovers table
						$cnt=1;
						$approvers=0;
						$nLevel = 0;

							while ($cnt<=5)
							{
								if(isset($_POST['App' . $cnt]))
								{
									$App[] = $_POST['App' . $cnt];
									if ($_POST['App' . $cnt] == 'N/A')
									{

									}
									else
									{
										$nLevel = $nLevel + 1;
										$qryAdd ="insert into tblapprovers (cControlNumber, vAppName, nLevel) ";
										$qryAdd = $qryAdd . "Values (";
										$qryAdd = $qryAdd . "'" . $cControlNo . "',";
										$qryAdd = $qryAdd . "'" . $_POST['App' . $cnt] . "',";
										$qryAdd = $qryAdd . "'" . $nLevel . "')";		
										$qryAddResult=mysql_query($qryAdd);
										$approvers = $approvers + 1;
									}
								}
									$cnt = $cnt + 1;
							}

							if ($approvers==0)
							{
								$_SESSION['U_ErrorMessage'] = "UNABLE TO SAVE!NO APPROVERS SELECTED";
								session_write_close();
								header("location: PIF.php");	
								exit();
							}
		
							
						PIFEmail(1, 'jpsarinas@guess.com.ph', $cIDNumber, $vName, $cControlNo);
						//this line insert into header table tblpayroll
						$qryAdd ="insert into tblpayroll (cControlNumber,cIDNumber,vName,vDepartment,vDesignation,cApprover1,cApprover2,dRequestDate,cCurrentLocation) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cControlNo . "',";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $vName . "',";
						$qryAdd = $qryAdd . "'" . $vDepartment. "',";
						$qryAdd = $qryAdd . "'" . $vDesignation. "',";
						$qryAdd = $qryAdd . "'" . $cApprover1 . "',";
						$qryAdd = $qryAdd . "'" . $cApprover2 . "',";
						$qryAdd = $qryAdd . "'" . $dRequestDate . "',";
						$qryAdd = $qryAdd . "'Approver'";
                        $qryAdd = $qryAdd . ")";	
                        $qryAddResult=mysql_query($qryAdd);


                        //cthis line will insert into line table tblpayrolldetails
						$qryAdd ="insert into tblpayrolldetails (cControlNumber, cIDNumber,dDate,dMonth,dYear,dCutoff,dReason) ";
						$qryAdd = $qryAdd . "select '" . $cControlNo . "', cIDNumber,dDate,dMonth,dYear,dCutoff,dReason from payrolltemptable where cidnumber = '" . $cIDNumber . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					

                        //delete from payrolltemptable
						$qryAdd ="delete from payrolltemptable where cIDNumber = '" . $cIDNumber . "'";
						$qryAddResult=mysql_query($qryAdd);


						//will loop control number on the next insert
						$qryAdd = "update tcontrolno set cControlNumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
						//PIFEmail
						
					
						$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO YOUR APPROVER!";
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