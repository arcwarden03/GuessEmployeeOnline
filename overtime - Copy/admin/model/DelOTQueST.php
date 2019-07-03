<?php
    include ('../../../config/dbconfig-OT2.php');
	session_start();
    
	$cSysIDx = $_GET['hID'];
	$dDatex = $_GET['hDate'];

	$qryDel = "DELETE from tOTQue where cSysID='". $cSysIDx ."' and dDate = '". $dDatex ."'";
	$delQryRes = sqlsrv_query($conn, $qryDel);

	$_SESSION['U_ValidMessage'] = "OT details successfully removed from the que!";
	session_write_close();
	header("location: ../view/OvertimeST.php");

?>
