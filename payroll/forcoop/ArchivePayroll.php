<?php
include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	session_start();
	
	
	
    $y = Mir('decrypt', $_GET['y']); //control number

//update current server for user
					$qryAdd = "update cooptblpayroll set cCurrentLocation = 'HRD Already Responded' where cControlNumber = '" . $y . "'";
                   $qryAddResult=mysql_query($qryAdd);
//insert into header table history
					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
                    $qryAddResult=mysql_query($qryAdd);

//delete from table header                 
                    $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
                    $qryAddResult=mysql_query($qryAdd);


					$_SESSION['U_ValidMessage'] = "Successfully Updated and Archived the PIF!";
						session_write_close();
						header("location: PIFHR.php");
		

?>
