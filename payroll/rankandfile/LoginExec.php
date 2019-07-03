<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

	session_start();

$serverName = "192.168.1.236"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ITHRIS17", "UID"=>"raymir", "PWD"=>"mir@123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


	$uName = trim($_POST['cUsername']);
	$pWord = trim($_POST['cPassword']);

	
	if($uName != '' && $pWord != '') 
		{
		$qry="SELECT * FROM vOnlineUserAccount where cUsername = '" . $uName . "' AND ltrim(rtrim(cPassword))='" . trim($pWord) . "'";
		$result=sqlsrv_query($conn, $qry);
		if(sqlsrv_has_rows($result) == 0 || ($uName == '' || $pWord == ''))
			{
				$errmsg_arr = 'Login Failed! Please verify your username and password';
				$errflag = true;
					//If there are input validations, redirect back to the login form
				if($errflag) 
					{
						$_SESSION['U_ErrorMessage'] = $errmsg_arr;
						session_write_close();
						header("location: Index.php");
						exit();
					}
			}
		
		else
			{
			$row = sqlsrv_fetch_array($result);
			//General Session
			$_SESSION['SESS_cIDNumber'] = $row['cIDNumber'];
			$_SESSION['SESS_vName'] = $row['vName'];
			$_SESSION['SESS_cUsername'] = $row['cUsername'];
			$_SESSION['SESS_cPassword'] = $row['cPassword'];
			$_SESSION['SESS_isCOO'] = $row['isCOOAccount'];
			$_SESSION['SESS_isHRManager'] = $row['isHRManager'];
			$_SESSION['SESS_cGender'] = $row['cGender'];
			$_SESSION['SESS_vDepartment'] = $row['vDepartment'];
			$_SESSION['SESS_vDesignation'] = $row['vDesignation'];
			$_SESSION['SESS_cJobClass'] = $row['cJobClass'];
			$_SESSION['SESS_cBranch'] = $row['cBranch'];
			$_SESSION['SESS_cArea'] = $row['cArea'];
			$_SESSION['SESS_vEmail'] = $row['vEmail'];
			$_SESSION['SESS_vSection'] = $row['vSection'];
			

			//Uniform System General Session
			$_SESSION['SESS_isU_Approver'] = $row['isU_Approver'];
			$_SESSION['SESS_isU_HRClerk'] = $row['isU_HRClerk'];
			$_SESSION['SESS_isU_WHSDiv'] = $row['isU_WHSDiv'];
			$_SESSION['SESS_isU_WHSClerk'] = $row['isU_WHSClerk'];
			$_SESSION['SESS_cU_SizeTops'] = $row['cU_SizeTops'];
			$_SESSION['SESS_cU_SizeBottoms'] = $row['cU_SizeBottoms'];
			$_SESSION['SESS_cU_Issuance1'] = $row['cU_Issuance1'];
			$_SESSION['SESS_cU_Issuance2'] = $row['cU_Issuance2'];
			$_SESSION['SESS_cU_Issuance3'] = $row['cU_Issuance3'];
			$_SESSION['SESS_cU_Issuance4'] = $row['cU_Issuance4'];
			$_SESSION['SESS_nU_MaxTops'] = $row['nU_MaxTops'];
			$_SESSION['SESS_nU_MaxBottoms'] = $row['nU_MaxBottoms'];
			$_SESSION['SESS_cU_AccountType'] = $row['cU_AccountType'];
			$_SESSION['SESS_nU_MaxApprovers'] = $row['approvers'];
			$_SESSION['SESS_isU_StoreDispatcher'] = $row['isU_StoreDispatcher'];

			//Leave General Session
			$_SESSION['SESS_isL_Approver'] = $row['isL_Approver'];
			$_SESSION['SESS_isL_Clinic'] = $row['isL_Clinic'];
			$_SESSION['SESS_isL_HRClerk'] = $row['isL_HRClerk'];

			if (trim($_SESSION['SESS_cU_AccountType'])=='clinic')
			{
				header("location: ../eleave/accounts/clnc/views/clnc-usr_page.php");
			}

			elseif (trim($_SESSION['SESS_cU_AccountType'])=='Approver')
			{
				header("location: MainPageforApprover.php");
			}
			elseif (trim($_SESSION['SESS_cU_AccountType'])=='Payroll')
			{
				header("location: MainPageforPayroll.php");
			}
			else
			{
				header("location: Mainpage.php");
			}
			
				}
				  		}
	else
		{
				//Login failed
				$errmsg_arr = 'Login Failed! Please verify your username and password';
				$errflag = true;
				//If there are input validations, redirect back to the login form
				if($errflag) 
					{
						$_SESSION['U_ErrorMessage'] = $errmsg_arr;
						session_write_close();
						header("location: Index.php");
						exit();
					}
		}






?>
<body>
</body>
</html>
