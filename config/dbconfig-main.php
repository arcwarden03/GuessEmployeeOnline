<?php
/*
	$servernamex = "SYSTEMS01\SQLEXPRESS";
	$connarrx = array("Database"=>"ITHRIS17", "UID"=>"sa", "PWD"=>"mir@123");
	$conn = sqlsrv_connect($servernamex, $connarrx);
*/
$user='raymir';
$password='mir@123';

	$cnLeave = odbc_connect("Driver={SQL Server Native Client 10.0};Server=192.168.1.236;Database=ITHRIS17;", $user, $password);
	if($cnLeave)
	{
		echo "Connection established.<br />";
	}
	else
	{
		echo "Connection could not be established.<br />";
		//die( print_r(sqlsrv_errors(), true));
	}
?>