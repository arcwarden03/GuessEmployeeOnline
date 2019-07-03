<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_vName is present or not
	if(!isset($_SESSION['SESS_vName']))
	{
		header("location: ../../../index.php");
		exit();
	} 

?>