<?php
     include('DBConnect4.php');
	session_start();
    
	$cSysIDx = $_GET['hID'];
	$dDatex = $_GET['hDate'];
	$dReasonx = $_GET['hReason'];

	$qryDel = "DELETE from cooptemptable where EmployeeID='". $cSysIDx ."' and dDate = '". $dDatex ."' and dReason = '". $dReasonx ."' ";
    $qryAddResult=mysql_query($qryDel);

	$_SESSION['U_ValidMessage'] = "Successfully removed from the Queue!";
	session_write_close();
	header("location: PIF.php");

?>
