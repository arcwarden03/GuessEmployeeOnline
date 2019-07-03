<?php
//include('Auth.php');
	//include ('../../../config/dbconfig-login.php');
	include('DBConnect4.php');
	session_start();
	

   
   	$cIDNumber = $_SESSION['SESS_cIDNumber'];
   	$EmployeeID = $_POST['EmployeeID'];
   	$vDepartment = $_POST['vDepartment'];
    $vDesignation = $_POST['vDesignation'];
    $vAgency= $_POST['vAgency'];
   	$vName = $_POST['vName'];
    $dDate = $_POST['dDate'];
    $dMonth = $_POST['dMonth'];
    $dYear = $_POST['dYear'];
    $dCutoff = $_POST['dCutoff'];
    $dReason = $_POST['dReason'];
    $AppName = $_POST['AppNamex'];
    $vEmail = $_POST['vEmail'];


//If Date field is empty
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


//IF PIF is already filed

$qryCheck = "SELECT * from cooptblpayrolldetailsh where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' and dDate = '". $dDate ."' and dReason = '". $dReason ."'
and EmployeeID = '". $EmployeeID ."'"; 
	$rsltCheck = mysql_query($qryCheck) or die(mysql_error());
	$maxiCheck=mysql_num_rows($rsltCheck);

   while ($row = mysql_fetch_array($rsltCheck)){
                         $Datey = $row['dDate'];	
                         $Reasony = $row['dReason'];
                          $EmployeeIDy = $row['EmployeeID'];
              }
              

	if ($maxiCheck > 0)
		{
           
			if($Date == $dDatey){
            			if($Reason == $dReasony){
            				if($EmployeeID == $EmployeeIDy){
							$errmsg_arr = 'PIF Request Date is already Filed!';				
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
										}
									}
								}

//if PIF is currently pending

$qryCheck5 = "SELECT * from cooptblpayrolldetails where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "' and dDate = '". $dDate ."' and dReason = '". $dReason ."' and EmployeeID = '". $EmployeeID ."'"; 
	$rsltCheck5 = mysql_query($qryCheck5) or die(mysql_error());
	$maxiCheck5=mysql_num_rows($rsltCheck5);

   while ($row = mysql_fetch_array($rsltCheck5)){
                         $Datez = $row['dDate'];	
                         $Reasonz = $row['dReason'];
                          $EmployeeIDz = $row['EmployeeID'];
              }
              

	if ($maxiCheck5 > 0)
		{
           
			if($Date == $dDatez){
            			if($Reason == $dReasonz){
            				if($EmployeeID == $EmployeeIDz){
							$errmsg_arr = 'You already filed same PIF Request and is Pending!';				
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
										}
									}
								}
	



  			// added on where clause
  			  $query = "SELECT * from temptablecoop where cidnumber = '" . $cIDNumber . "' 
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

						$qryAdd ="insert into temptablecoop (cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,vApprover,vEmail) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $EmployeeID . "',";
						$qryAdd = $qryAdd . "'" . $vName . "',";
						$qryAdd = $qryAdd . "'" . $vDepartment . "',";
						$qryAdd = $qryAdd . "'" . $vDesignation. "',";
						$qryAdd = $qryAdd . "'" . $vAgency. "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason. "',";
						$qryAdd = $qryAdd . "'" . $AppName. "',";
						$qryAdd = $qryAdd . "'" . $vEmail . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");

            			}

            	} else {
						$qryAdd ="insert into temptablecoop (cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,vApprover,vEmail) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $EmployeeID . "',";
						$qryAdd = $qryAdd . "'" . $vName . "',";
						$qryAdd = $qryAdd . "'" . $vDepartment . "',";
						$qryAdd = $qryAdd . "'" . $vDesignation. "',";
						$qryAdd = $qryAdd . "'" . $vAgency. "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason. "',";
						$qryAdd = $qryAdd . "'" . $AppName. "',";
						$qryAdd = $qryAdd . "'" . $vEmail . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");
            	}

            } else {
						$qryAdd ="insert into temptablecoop (cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,vApprover,vEmail) ";
						$qryAdd = $qryAdd . "Values (";
						$qryAdd = $qryAdd . "'" . $cIDNumber . "',";
						$qryAdd = $qryAdd . "'" . $EmployeeID . "',";
						$qryAdd = $qryAdd . "'" . $vName . "',";
						$qryAdd = $qryAdd . "'" . $vDepartment . "',";
						$qryAdd = $qryAdd . "'" . $vDesignation. "',";
						$qryAdd = $qryAdd . "'" . $vAgency. "',";
						$qryAdd = $qryAdd . "'" . $dDate . "',";
						$qryAdd = $qryAdd . "'" . $dMonth . "',";
						$qryAdd = $qryAdd . "'" . $dYear . "',";
						$qryAdd = $qryAdd . "'" . $dCutoff . "',";
						$qryAdd = $qryAdd . "'" . $dReason. "',";
						$qryAdd = $qryAdd . "'" . $AppName. "',";
						$qryAdd = $qryAdd . "'" . $vEmail . "')";
						echo $qryAdd;
						$qryAddResult=mysql_query($qryAdd);
					
				
						$_SESSION['U_ValidMessage'] = "DATE SUCCESSFULLY ADDED TO QUE!";
						session_write_close();
						header("location: PIF.php");
            	}
		
	  
















		

?>


