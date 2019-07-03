<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_vName']))
	{
		header("location: Index.php");
		exit();
	}
?>