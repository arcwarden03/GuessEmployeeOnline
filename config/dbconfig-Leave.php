<?php
/*
	$servernamex = "SYSTEMS01\SQLEXPRESS";
	$connarrx = array("Database"=>"ITHRIS17", "UID"=>"sa", "PWD"=>"mir@123");
	$conn = sqlsrv_connect($servernamex, $connarrx);
*/
$user='sa';
$password='mir@123';

	$cnHRIS = odbc_connect("Driver={SQL Server Native Client 10.0};Server=SYSTEMS01\SQLEXPRESS;Database=ITGUESS18;", $user, $password);
	if(!$cnHRIS)
	{
		echo "Connection could not be established.<br />";
		//die( print_r(sqlsrv_errors(), true));
	}


?>