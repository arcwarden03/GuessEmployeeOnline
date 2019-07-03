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



	function PIFEmail($nlvl,$nMax,$cIDno,$EmpNamex,$cControlNox)
		{
			
	      $functionqryx = "Select * from tblappcoop where cControlNumber = '" . $cControlNox . "'";
	$resultx = mysql_query($functionqryx ) or die(mysql_error());
	while ($rowx = mysql_fetch_array($resultx)) 		
		{
			$cApprover1 = $rowx['vEmail'];

		}

	        $to = $cApprover1 . '; mabrodriguez@guess.com.ph';  
			//$to ='rkpedrique@guess.com.ph;mabrodriguez@guess.com.ph';  

			$subject = 'IT TEST ONLY Payroll Inquiry Form COOP: ';

			$message = "You have a pending PIF for approval. Please see below details: <br><br>";
			
			$message .= '<br><strong>Request Details</strong></br>';
				
					$query = "SELECT * from temptablecoop where cidnumber = '" . $cIDno . "'";  
			$result = mysql_query($query) or die(mysql_error());
			$maxi=mysql_num_rows($result);
			while ($row = mysql_fetch_array($result)){

				$message .='
				<br>

				<strong>Name: </strong> '. $row['vName'] .'		
					';

			$message .= '

			<br><br>

			<table border="1px solid black" style="width:800px; text-align:left; border:1px solid black";>
			<tr>
					
					<th><b>Date</b></th>
					<th><b>Month&Year</b></th>
					<th><b>Cutoff</b></th>
					<th><b>Nature of Inquiry</b></th>
			</tr>
			</thead>
			<tbody>';

		
	

				$message .='
				<tr>
						<td>'. $row['dDate'] .'</td>
						<td>'. $row['dMonth'] .'-'. $row['dYear'].'</td>
						<td>'. $row['dCutoff'] .'</td>
						<td>'. $row['dReason'] .'</td>
				</tr>
				';
			

			$message .= '
			</tbody>
			</table>
			';

			


			
			$message .= '
			</tbody>
			</table>

			<br>

			<strong>Approver: </strong> '. $row['vApprover'] .'

			<br>
			<br>';

}

			$message .= '<a href="http://192.168.1.236/guessemployeeonline/payroll/forcoop/emailresponse.php?x=APPROVED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($nlvl) . '&EmpNamex=' . trim($EmpNamex) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">APPROVE</a> 
						 <a href="http://192.168.1.236/guessemployeeonline/payroll/forcoop/emailresponse.php?x=REJECTED&cSysIdx=' . trim($cControlNox) . '&nLvl=' . trim($nlvl) . '" target="_blank" style="background-color: #999999;color: white; border: 1px solid #000000">REJECT</a><br>';

        	$message .= "<br><br><p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">Please Approve or Reject the request by clicking the button provided above. You may also Approve or Reject the request by loging in to the system (http://192.168.1.236/guessemployeeonline/index.php).</p>";
			$message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">**Please make sure you are connected to Head Office Network before you can approve using email. .</p>";
			$message .= "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">This is an automatically generated email please do not reply to this mail.</p>";

			$from = "PIFRequest@guess.com.ph";

			$headers = "From:" . $from . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
			
			mail($to,$subject,$message,$headers);


		}
	
		 
	
		$query = "SELECT * from temptablecoop where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
		$result = mysql_query($query) or die(mysql_error());
		$maxi=mysql_num_rows($result);

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


						$cApprover1 = '';
						$cApprover2 = '';
						$cCurrentLocation = '';

						// calling function of Controlno
						//$cControlNo = GetControlNo();

						

                        //this line will insert into line table cooptblpayroll
						$qryAdd ="insert into cooptblpayroll (cControlNumber, cIDNumber,EmployeeID,vName,vDepartment,vDesignation,dRequestDate,vAgency,cCurrentLocation) ";
						$qryAdd = $qryAdd . "select cControlNumber, cIDNumber,EmployeeID,vName,vDepartment,vDesignation,'" . $dRequestDate . "',vAgency,'Approver' from temptablecoop where cidnumber = '" . $cIDNumber . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);

						//this line will insert into line table cooptblpayrolldetails
						$qryAdd ="insert into cooptblpayrolldetails (cControlNumber,cIDNumber,EmployeeID,dDate,dMonth,dYear,dCutoff,dReason) ";
						$qryAdd = $qryAdd . "select cControlNumber,cIDNumber,EmployeeID,dDate,dMonth,dYear,dCutoff,dReason from temptablecoop where cIDNumber = '" . $cIDNumber . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);

						//this line will insert into line table 
						$qryAdd ="insert into tblappcoop (cControlNumber,vAppName,nLevel,vEmail) ";
						$qryAdd = $qryAdd . "select cControlNumber,vApprover,'1',vEmail from temptablecoop where cidnumber = '" . $cIDNumber . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);

						PIFEmail(1,$nMaxz,$cIDNumber,$vName,$cControlNo);
					

                        //delete from payrolltemptable
						$qryAdd ="delete from temptablecoop where cIDNumber = '" . $cIDNumber . "'";
						$qryAddResult=mysql_query($qryAdd);


						//will loop control number on the next insert
						$qryAdd = "update tcontrolno set cControlNumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
						//PIFEmail
						
						
							//"PIF SUCCESSFULLY SENT TO YOUR APPROVER! ";
						//$_SESSION['U_ValidMessage'] = $eMail;

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