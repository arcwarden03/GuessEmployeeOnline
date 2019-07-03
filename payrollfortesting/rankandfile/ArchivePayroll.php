<?php
include('Auth.php');
	include ('DBConnect4.php');
    include ('MirFunctions.php');
	session_start();
	
	
	
    $y = Mir('decrypt', $_GET['y']); //control number



		//checking if remarks is added 
					   $functionqry = "Select * from tblpayrolldetails where cControlNumber = '" . $y . "'";
					   $result = mysql_query($functionqry) or die(mysql_error());
                       $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                  {
                      
                    $dPayrollRemarks = $row['dPayrollRemarks'];
                    $dPayrollAction = $row['dPayrollAction'];
                    $dAddResponse = $row['dAddResponse'];
 
	              }
				
if ($dPayrollRemarks == '') {
		$errmsg_arr = 'NO Payroll REMARKS ADDED,BE SURE TO UPDATE REMARKS!';				
		$errflag = true;
		
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIFPayroll.php");
			exit();
			}
	}


if ($dPayrollAction == '') {
		$errmsg_arr = 'NO Payroll ACTION ADDED,BE SURE TO UPDATE REMARKS!';				
		$errflag = true;
		
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIFPayroll.php");
			exit();
			}
	}
	

if ($dAddResponse == '') {
		$errmsg_arr = 'NO Payroll ACTION ADDED,BE SURE TO UPDATE REMARKS!';				
		$errflag = true;
		
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: PIFPayroll.php");
			exit();
			}
	}


//update current server for user
					//$qryAdd = "update tblpayroll set cCurrentLocation = 'Payroll Already Responded' where cControlNumber = '" . $y . "'";
                  // $qryAddResult=mysql_query($qryAdd);
//insert into header table history
					//$qryAdd = "insert into tblpayrollh select * from tblpayroll where cControlNumber = '" . $y . "'";
                   // $qryAddResult=mysql_query($qryAdd);

//delete from table header                 
                   // $qryAdd = "delete from tblpayroll where cControlNumber = '" . $y . "'";
                  //  $qryAddResult=mysql_query($qryAdd);
//insert details into line table history
                   //$qryAdd = "insert into tblpayrolldetailsh select * from tblpayrolldetails where cControlNumber = '" . $y . "'";
                   // $qryAddResult=mysql_query($qryAdd);
//delete details into line table history            
                  // $qryAdd = "delete from tblpayrolldetails where cControlNumber = '" . $y . "'";
                   // $qryAddResult=mysql_query($qryAdd);

					$_SESSION['U_ValidMessage'] = "Successfully Updated and Archived the PIF!";
						session_write_close();
						header("location: PIFPayroll.php");
		
	

?>
