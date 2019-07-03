<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
			unset($_SESSION['SESS_cIDNumber']);
			unset($_SESSION['SESS_vName']);
			unset($_SESSION['SESS_cUsername']);
			unset($_SESSION['SESS_cPassword']);
			unset($_SESSION['SESS_isCOO']);
			unset($_SESSION['SESS_isHRManager']);
			unset($_SESSION['SESS_cGender']);
			unset($_SESSION['SESS_vDepartment']);
			unset($_SESSION['SESS_vDesignation']);
			unset($_SESSION['SESS_cJobClass']);
			unset($_SESSION['SESS_cBranch']);
			unset($_SESSION['SESS_cArea']);
			unset($_SESSION['SESS_vEmail']);
			unset($_SESSION['SESS_vSection']);

			//Uniform System General Session
			unset($_SESSION['SESS_isU_Approver']);
			unset($_SESSION['SESS_isU_HRClerk']);
			unset($_SESSION['SESS_isU_WHSDiv']);
			unset($_SESSION['SESS_isU_WHSClerk']);
			unset($_SESSION['SESS_cU_SizeTops']);
			unset($_SESSION['SESS_cU_SizeBottoms']);
			unset($_SESSION['SESS_cU_Issuance1']);
			unset($_SESSION['SESS_cU_Issuance2']);
			unset($_SESSION['SESS_cU_Issuance3']);
			unset($_SESSION['SESS_cU_Issuance4']);
			unset($_SESSION['SESS_nU_MaxTops']);
			unset($_SESSION['SESS_nU_MaxBottoms']);
			unset($_SESSION['SESS_cU_AccountType']);

			//Leave General Session
			unset($_SESSION['SESS_isL_Approver']);
			unset($_SESSION['SESS_isL_Clinic']);


	session_write_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged Out</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p align="center">&nbsp;</p>
<h4 align="center" class="err">You have been logged out.</h4>
<p align="center">Click here to <a href="Index.php">Login</a></p>
</body>
</html>
