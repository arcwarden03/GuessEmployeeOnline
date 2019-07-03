<?php
    include ('../../../config/dbconfig-OT2.php');
	session_start();
    
    $cSysIDx = $_GET['hID'];
    //$dFrom = '15:00';
    //$dTo = '16:00';
    $dFrom = trim($_GET['tFromx']);
    $dTo = trim($_GET['tTox']);
 
	$qryUpdate = "UPDATE tOTProcess SET dFrom='". $dFrom ."', dTo='". $dTo ."' where cSysID='". $cSysIDx ."'";
	$qryUpdateRes = sqlsrv_query($conn, $qryUpdate);

	$_SESSION['U_ValidMessage'] = "OT details successfully updated!";
	session_write_close();
	header("location: ../view/OTApprovalHO.php");

?>
