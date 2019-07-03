<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_fullname']);
	unset($_SESSION['SESS_cIDNumber_ELS']);
	unset($_SESSION['SESS_cUsername_ELS']);
	unset($_SESSION['SESS_cPassword_ELS']);
	unset($_SESSION['SESS_vDepartment_ELS']);
	unset($_SESSION['SESS_vDesignation_ELS']);;
	unset($_SESSION['SESS_cJobClass_ELS']);
	unset($_SESSION['SESS_cBranch_ELS']);
	unset($_SESSION['SESS_cArea_ELS']);
	unset($_SESSION['SESS_vEmail_ELS']);;
	unset($_SESSION['SESS_vSection_ELS']);
	session_destroy();
	session_write_close();
	header("Location: ../login.php");
?>