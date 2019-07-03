<?php
include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	session_start();
	
	
	//$y = Mir('decrypt', $_GET['y']); //control number

	

					$_SESSION['U_ValidMessage'] = "Successfully Updated and Archived the PIF!";
						session_write_close();
						header("location: PIFPayroll.php");
		
	

?>
