<?php
//include('Auth.php');
	//include ('../../../config/dbconfig-login.php');
	include('DBConnect4.php');
	session_start();
	

    
   	$cIDNumber = $_SESSION['SESS_cIDNumber'];
    $dDate = $_POST['dDate'];
    $dMonth = $_POST['dMonth'];
    $dYear = $_POST['dYear'];
    $dCutoff = $_POST['dCutoff'];
    $dReason = $_POST['dReason'];

	if ($dDate == '' ) {
		$errmsg_arr = 'NO DATE SELECTED!';				
		$errflag = true;
					//If there are input validations, redirect back to the login form
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIF.php");
			exit();
			}
	}

				// added on where clause
  			  $query = "SELECT * from payrolltemptable where cidnumber = '" . $cIDNumber . "' 
				and dDate = '". $dDate ."' and dReason = '". $dReason ."'"; 
                        
              $result = mysql_query($query) or die(mysql_error());
              $maxi=mysql_num_rows($result);

              while ($row = mysql_fetch_array($result)){
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


