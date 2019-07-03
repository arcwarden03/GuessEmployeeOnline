<?php
session_start();
include('../views/Auth.php');
include ('../config/dbconfig-SQL.php');

$NewPassword = $_POST['cp'];

//check if not blank
if ($NewPassword=='')
{
	$_SESSION['U_ErrorMessage'] = "Please enter new password!";
	session_write_close();
	header("location: ../views/changepassword.php");
	exit();
}

//check if more than 8 characters
if (strlen($NewPassword)<8)
{
	$_SESSION['U_ErrorMessage'] = "Password must be greater than 8 characters!";
	session_write_close();
	header("location: ../views/changepassword.php");
	exit();
}

//check if alpha numeric
if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $NewPassword))
{
    
}
else
{
	$_SESSION['U_ErrorMessage'] = "Password must contain letters and numbers!";
	session_write_close();
	header("location: ../views/changepassword.php");
	exit();
}





$qryUpdate = "Update tOnlineUseraccount set cPassword='" . $NewPassword . "' where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'";
echo $qryUpdate;
$rsltUpdate=sqlsrv_query($conn, $qryUpdate);

if ($rsltUpdate)
	{
		$_SESSION['U_ValidMessage'] = "Successfully changed password.";
		session_write_close();
		header("location: ../views/changepassword.php");
	}
else
	{
		$_SESSION['U_ErrorMessage'] = "Unable to change password! please call IT for support";
		session_write_close();
		header("location: ../views/changepassword.php");	
	}
?>


