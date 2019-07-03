<?php
//include('Auth.php');
	//include ('DBConnect4.php');
	session_start();
	

	 // $cSysIdz = $_POST['cSysIdx'];

	$to = 'mabrodriguez@guess.com.ph';
	//$subject = "PIF FOR VERIFICATION ";
	$subject = "PIF FOR PROCESSING " ;
	$message = "You have a pending VL/SL/EL for Processing! Please login to view details.";
				
	$from = "PIFRequest@guess.com.ph";
	$headers = "From:" . $from . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						

	$mail=mail($to,$subject,$message,$headers);


	session_write_close();
	header("location: PIFApprover.php");	
?>




	