<?php
include('Auth.php');
	include ('DBConnect4.php');
	session_start();

	$x = $_GET['q'];
	$xy = $_GET['xy'];
		
	$timezone = "Asia/Manila";
	if(function_exists('date_default_timezone_set')) 
	date_default_timezone_set($timezone);
	$dReleaseDate=date("y/m/d : H:i:s", time()); 

	
	$qryAdd = "Update tblpayrolldetails set dAddResponse = '" . $x . "' where cControlnumber = '" . $xy . "'";
	$qryAddResult=mysql_query($qryAdd);
	

?>
