<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_vName_ELS is present or not
	if(!isset($_SESSION['SESS_vName_ELS']))
	{
		header("location: ../logout.php");
		exit();
	}
?>