<?php
include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	session_start();
	
					
					
				$_SESSION['U_ValidMessage'] = "BOO!";
						session_write_close();
						header("location: PayrollResponse.php");
		
	


// sending of notification to approvers

	



?>


