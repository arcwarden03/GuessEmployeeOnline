<?php
//include('Auth.php');
	include ('DBConnect4.php');
	include ('MirFunctions.php');
session_start();
    
    $svt = Mir('decrypt', $_GET['svt']); //if approved or reject
	
		
	//$x = $_GET['x'];

	$qryAdd = "delete from payrolltemptable where id= " . $svt;

	//$qryAdd = "delete from payrolltemptable where cidnumber = '" . $_SESSION['SESS_cIDNumber'] . "'";

	echo $qryAdd;
	$qryAddResult=mysql_query($qryAdd);

	$_SESSION['U_ValidMessage'] = "SUCCESFULLY REMOVED FROM QUEUE";
	session_write_close();
	header("location: PIF.php");


?>
