<?php
	$servernamex = "192.168.1.236";
	$connarrx = array("Database"=>"ITLEAVESYS19", "UID"=>"raymir", "PWD"=>"mir@123");
	$conn2 = sqlsrv_connect($servernamex, $connarrx);
	if($conn2)
	{
		//echo "Connection established.<br />";
	}
	else
	{
		echo "Connection could not be established.<br />";
		die( print_r(sqlsrv_errors(), true));
	}
?>