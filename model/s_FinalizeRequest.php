<?php
include('../views/Auth.php');
include ('../config/dbconfig-login.php');
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



	
	//this function will get current control number
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
				
			$functionqry = "Select * from tControlNo where cWorkBase = '" . $BaseLoc . "'";
			$qryTicketResult=mysql_query($functionqry);
			if (mysql_num_rows($qryTicketResult)<>0)
				{
					$row = mysql_fetch_array($qryTicketResult);
					$LastTicketNo = $row['cControlNumber'];
				}
			$tick= $TickLoc . date("y") . str_pad($LastTicketNo, 4, '0', STR_PAD_LEFT);
			return $tick;
		}
	//end function

	$qryCheck = "SELECT * from tTransactionmir where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
	$rsltCheck = mysql_query($qryCheck) or die(mysql_error());
	$maxiCheck=mysql_num_rows($rsltCheck);
	if ($maxiCheck>0)
		{
			$qryAdd ="delete from tque where cidnumber = '" . $_SESSION['SESS_cIDNumber']. "'";
			$qryAddResult=mysql_query($qryAdd);

			$_SESSION['U_ErrorMessage'] = "You are not allowed to request uniform while there is still a pending request! Please coordinate with HRD to fix the problem.";
			session_write_close();
			header("location: ../views/rnf-request.php");		
		}
	else
		{

			$query = "SELECT * from tque where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'"; 
			$result = mysql_query($query) or die(mysql_error());
			$maxi=mysql_num_rows($result);
			if ($maxi>0)
				{
				
						//begin gathering data
						
						$timezone = "Asia/Manila";
						if(function_exists('date_default_timezone_set')) 
						date_default_timezone_set($timezone);
						$dRequestDate=date("y/m/d : H:i:s", time()); 
						$cControlNo = GetControlNo();
						$cCompany= $_SESSION['SESS_cCompany_UI'];
						$cIDNumber = $_SESSION['SESS_cIDNumber'];
						$vName = $_SESSION['SESS_vName'];
						$vDepartment = $_SESSION['SESS_vDepartment'];
						$cApprover1 = '';
						$cApprover2 = '';
						$vDesignation = $_SESSION['SESS_vDesignation'];
						$base=$_SESSION['SESS_cBranch'];
						$Day=date("d"); 
						$Month=date("m");
						$Year=date("y");
						$cGender=$_SESSION['SESS_cGender'];

						
						if ($base=='Head Office')
							{
								$cCurrentServer = "Manager";
							}
						else
							{
								$cCurrentServer = "ASM";					
							}

					/*----------------------------------------------*/
					//save approvers
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
									$qryAdd ="insert into tApprovers (cControlNumber, vAppName, nLevel) ";
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
							$_SESSION['U_ErrorMessage'] = "Unable to save request! No approvers selected..";
							session_write_close();
							header("location: ../views/rnf-request.php");	
						}
					
					/*----------------------------------------------*/
					//End save approvers


				
						//create header
						$qryAdd ="insert into tTransactionmir (cControlNumber, cCompany, cIDNumber, vName, cGender, vDepartment, dRequestDate, cApprover1, cApprover2, vDesignation, cCurrentServer, vAttachmentName) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cControlNo . "',";
						$qryAdd = $qryAdd . "'" . $cCompany . "',";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $vName . "',";
						$qryAdd = $qryAdd . "'" . $cGender . "',";
						$qryAdd = $qryAdd . "'" . $vDepartment . "',";
						$qryAdd = $qryAdd . "'" . $dRequestDate . "',";
						$qryAdd = $qryAdd . "'" . $cApprover1 . "',";
						$qryAdd = $qryAdd . "'" . $cApprover2 . "',";
						$qryAdd = $qryAdd . "'" . $vDesignation . "',";
						$qryAdd = $qryAdd . "'HRD (Validate)',";
						$qryAdd = $qryAdd . "'N/A')";		
						$qryAddResult=mysql_query($qryAdd);
					
						//create detail
						$qryAdd ="insert into tTransactionmirDetailed (cControlNumber, cIDNumber, nQuantity, cStyle, cActualStyle, cSize, vRemarks) ";
						$qryAdd = $qryAdd . "select '" . $cControlNo . "', cIDNumber, nQuantity, cStyle, cStyleActual, cSize, vRemarks from tque where cidnumber = '" . $cIDNumber . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
						//delete que
						$qryAdd ="delete from tque where cidnumber = '" . $cIDNumber . "'";
						$qryAddResult=mysql_query($qryAdd);
						
						//Update ticket
						$qryAdd = "update tcontrolno set ccontrolnumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
						//Update ticket
						$qryAdd = "update tcontrolno set ccontrolnumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);

						/*
						//----------------------------------------------------					
						//send notification to approver
						$to = $cApprover1;
						$subject = "Uniform Request: " . $vName . "";
						$message = "You have a pending Uniform request for approval.";
						
						$from = "UniformRequisition@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);
						//----------------------------------------------------
						*/






						$_SESSION['U_ValidMessage'] = "Request is sent to HRD for validation.";
						session_write_close();
						header("location: ../views/rnf-request.php");
			}			
		else
			{
				$_SESSION['U_ErrorMessage'] = "There are no records to save in database. please make sure que is not empty.";
				session_write_close();
				header("location: ../views/rnf-request.php");
			}	
	}
		

?>


