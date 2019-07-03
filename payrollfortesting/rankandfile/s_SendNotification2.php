<?php
include('Auth.php');
include ('DBConnect4.php');
	include ('MirFunctions.php');
	session_start();

$y = Mir('decrypt', $_GET['y']); //control number

//send notification to approver
					$to = 'mabrodriguez@guess.com.ph';
					//$to = $eMail . '; mabrodriguez@guess.com.ph';
					//$to = 'rkpedrique@guess.com.ph';
					$subject = "test: " ;

					$message = "<p style=\"color:#000; font-size:12px; font-family:Arial, Helvetica, sans-serif\">You have a pending Uniform request for approval. Please see below details:</p>";
					
					$message = $message . "<strong>test</strong><br>";
					
				
	              
					
					$from = "PIFRequest@guess.com.ph";
					$headers = "From:" . $from . "\r\n";
					$headers .= "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					mail($to,$subject,$message,$headers); 
		
?>

