<?php
//include('Auth.php');
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
    
  

	$_SESSION['U_ValidMessage'] = "SUCCESFULLY REMOVED FROM QUEUE";
	session_write_close();
	header("location: PIF.php");


?>
