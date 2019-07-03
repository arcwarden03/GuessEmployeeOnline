<?php
    include ('../../../config/dbconfig-OT2.php');
	session_start();
    
	$cSysIDx = $_GET['hID'];

	$insProc = "INSERT into tOTProcessC SELECT * from tOTProcess where cSysID='". $cSysIDx ."'";
	$insProcRes = sqlsrv_query($conn, $insProc);

		$delProc = "DELETE from tOTProcess where cSysID='". $cSysIDx ."'";
		$delProcRes = sqlsrv_query($conn, $delProc);


	$insApp = "INSERT into tApproverC SELECT * from tApprover where cSysID='". $cSysIDx ."'";
	$insAppRes = sqlsrv_query($conn, $insApp);

		$delApp = "DELETE from tApprover where cSysID='". $cSysIDx ."'";
		$delAppRes = sqlsrv_query($conn, $delApp);

	//$_SESSION['U_ValidMessage'] = "OT application successfully cancelled!";
	$_SESSION['U_ValidMessage'] = $cSysIDx;
	session_write_close();
	header("location: ../view/OTPendArcHO.php");

?>
