<?php
include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	session_start();
	
	
	//$y = Mir('decrypt', $_GET['y']); //control number
	  $svtx = Mir('decrypt', $_GET['svtx']); 
	
	 		       
     $dAddResponsex = $_POST['dAddResponsex'];
   


				  $qryAdd = "update tblpayrolldetails set dAddResponse='" . $dAddResponsex . "' ";
			      $qryAddResult=mysql_query($qryAdd);
			


					$_SESSION['U_ValidMessage'] = "Successfully Updated the PIF!";
						session_write_close();
						header("location: PIFPayroll2.php");
		
	

?>
