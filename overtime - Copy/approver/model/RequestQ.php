<?php
//include('Auth.php');
	//include ('../../../config/dbconfig-login.php');
	include('../../../config/dbconfig-OT2.php');
	session_start();
	
   	$cIDNumber = $_SESSION['SESS_cIDNumber'];
    $dDate = $_POST['datepickapp'];
    $dFrom = $_POST['tFrom'];
    $dTo = $_POST['tTo'];
    $tReason = $_POST['rSelect'];
    $tOtherR = $_POST['reasonT'];

	if ($dDate == '' ) {
		$errmsg_arr = 'No selected OT Date!';				
		$errflag = true;
					//If there are input validations, redirect back to the login form
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: OvertimeHO.php");
			exit();
			}
	}


  			  $query = "SELECT * from payrolltemptable where cidnumber = '" . $cIDNumber . "'"; 
			  $rslt=sqlsrv_query($conn, $query);
			  while ($rowA = sqlsrv_fetch_array($rslt))  
			  {
				$Datex = $row['dDate'];
				$Reasonx = $row['dReason'];
			  }


            if ($maxi > 0){

            	if($Datex == $dDate){
            			if($Reasonx == $dReason){
							$errmsg_arr = 'Same reason on the same date is invalid!';				
									$errflag = true;
												//If there are input validations, redirect back to the login form
											if($errflag) 
												{
													$_SESSION['U_ErrorMessage'] = $errmsg_arr;
													session_write_close();
													header("location: PIF.php");
													exit();
												}
            			} else {

						$qryAdd ="insert into payrolltemptable (cIDNumber,dDate,dMonth,dYear,dCutoff,dReason) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");

            			}

            	} else {
						$qryAdd ="insert into payrolltemptable (cIDNumber,dDate,dMonth,dYear,dCutoff,dReason) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");
            	}

            } else {
						$qryAdd ="insert into payrolltemptable (cIDNumber,dDate,dMonth,dYear,dCutoff,dReason) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");
            	}
		

?>


