<?php
	include ('DBConnect4.php');
	include ('MirFunctions.php');
	session_start();

	$w = $_GET['w']; //level
	$x = Mir('decrypt', $_GET['x']); //if approved or reject
	$y = Mir('decrypt', $_GET['y']); //control number
	$c = Mir('decrypt', $_GET['c']); //reason
	$f = Mir('decrypt', $_GET['f']); //agency
    $p = Mir('decrypt', $_GET['p']); //employee name

    $xDept = Mir('decrypt', $_GET['xDept']); //Department
    $xDate = Mir('decrypt', $_GET['xDate']); //Date of PIF
    $xMonth = Mir('decrypt', $_GET['xMonth']); //Month cutoff
	$xYear = Mir('decrypt', $_GET['xYear']); //year cutoff
	$xCutoff = Mir('decrypt', $_GET['xCutoff']); //cutoff
	$xReason= Mir('decrypt', $_GET['xReason']); //reason
	$xAddRemarks= Mir('decrypt', $_GET['xAddRemarks']); //reason
	$xApproverName= Mir('decrypt', $_GET['xApproverName']); //reason
	$xApprover1= Mir('decrypt', $_GET['xApprover1']); //reason

			if ($x=='APPROVED')
				{



//====================================================================KINGS COOPERATIVE==============================================================================//

                     if($f=='KINGS COOPERATIVE')
						{

							

					date_default_timezone_set('Asia/Manila');
                   $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                   $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                   $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

					 $functionqry2 = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $result = mysql_query($functionqry2) or die(mysql_error());
                  $maxi=mysql_num_rows($result);
                  while ($row = mysql_fetch_array($result))     
                     {
                      
                      $cApprover1= $row['cApprover1'];
                      $dAddRemarks= $row['dAddRemarks'];

                       }


                         include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='KIN' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }

						$to = 'guess@kingsgroup.com.ph;mabrodriguez@guess.com.ph;';
					//	$to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
				  
						$subject = "PIF Kings Cooperative : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>

                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

						}



//====================================================================KINGS COOPERATIVE==============================================================================//

//=================================================================YEARNINGS COOPERATIVE==============================================================================//

                     if($f=='YEARNINGS OUTSOURCING COOPERATIVE')
						{

							

					date_default_timezone_set('Asia/Manila');
                   $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                   $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                   $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

					$functionqry2 = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                   $result = mysql_query($functionqry2) or die(mysql_error());
                   $maxi=mysql_num_rows($result);
                   while ($row = mysql_fetch_array($result))     
                    {
                      
                      $cApprover1= $row['cApprover1'];
                      $dAddRemarks= $row['dAddRemarks'];

                       }

                       // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='YEA' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
						$to = 'lopezjordanryan.yoc@gmail.com;mabrodriguez@guess.com.ph;';
            //  $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
						
						$subject = "PIF Yearnings Outsourcing Cooperative : " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>

                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

						}



//=================================================================YEARNINGS COOPERATIVE==============================================================================//



//==================================================================PARAMOUNT COOPERATIVE==============================================================================//

                     if($f=='Paramount MPC')
						{

							

					date_default_timezone_set('Asia/Manila');
                   $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                   $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                   $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

					$functionqry2 = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                   $result = mysql_query($functionqry2) or die(mysql_error());
                   $maxi=mysql_num_rows($result);
                   while ($row = mysql_fetch_array($result))     
                    {
                      
                      $cApprover1= $row['cApprover1'];
                      $dAddRemarks= $row['dAddRemarks'];


                       }

                       // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='PAR' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
						$to = 'guess@paramountmpc.org;mabrodriguez@guess.com.ph;';
            // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
			
						$subject = "PIF Paramount-MPC : " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

						}



//===================================================================PARAMOUNT COOPERATIVE==============================================================================//


//===================================================================RESTEL COOPERATIVE==============================================================================//

                     if($f=='Restel-MPC')
						{

							

					date_default_timezone_set('Asia/Manila');
                   $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                   $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                   $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

					$functionqry2 = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                   $result = mysql_query($functionqry2) or die(mysql_error());
                   $maxi=mysql_num_rows($result);
                   while ($row = mysql_fetch_array($result))     
                    {
                      
                      $cApprover1= $row['cApprover1'];
                      $dAddRemarks= $row['dAddRemarks'];

                       }

                       // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='RES' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
	
            //$to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';

            $to =  'restelmpc@gmail.com;restelmpc.gcoordinator@gmail.com;mabrodriguez@guess.com.ph;'; 
					
						$subject = "PIF Restel-MPC : " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

						}



//===================================================================RESTEL COOPERATIVE==============================================================================//

//==============================================================Job Placement COOPERATIVE==============================================================================//

                     if($f=='Job Placement Resources Service Coop')
						{

							

					date_default_timezone_set('Asia/Manila');
                   $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                   $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $y . "'";
                   $rBypass=mysql_query($qBypass);

					$qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $y . "'";
				
					$rBypass=mysql_query($qBypass);

					$_SESSION['U_ValidMessage'] = "PIF SUCCESSFULLY SENT TO AGENGY COORDINATOR ";				
						
	                session_write_close();
					header("location: PIFApprovers.php");

					$functionqry2 = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                   $result = mysql_query($functionqry2) or die(mysql_error());
                   $maxi=mysql_num_rows($result);
                   while ($row = mysql_fetch_array($result))     
                    {
                      
                      $cApprover1= $row['cApprover1'];
                      $dAddRemarks= $row['dAddRemarks'];

                       }

                       // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='RES' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					
           // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
            $to = 'dorilin.caber@jprsc.com;mabrodriguez@guess.com.ph;';
					
						$subject = "PIF Job Placement Resources Service Coop: " . $y. "";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is already APPROVED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

						}



//==============================================================Job Placement COOPERATIVE==============================================================================//


	else{

						 $_SESSION['U_ErrorMessage'] = "Employee does not have Agency!Kindly Contact IT!";
				session_write_close();
				header("location: PIFApprovers.php");


						}


		//end tag of approved
				}





//IF REQUEST IS REJECTED

			elseif ($x=='REJECTED')
				{

//====================================================================KINGS COOPERATIVE==============================================================================//
					 if($f=='KINGS COOPERATIVE')
						{

           date_default_timezone_set('Asia/Manila');
          $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
          

	        $qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
             $qryAddResult=mysql_query($qryAdd);

          $qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);

          $qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);
				       
	       $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprovers.php");	


					 $functionqry2x = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resultx = mysql_query($functionqry2x) or die(mysql_error());
                  $maxix=mysql_num_rows($resultx);
                  while ($rowx = mysql_fetch_array($resultx))     
                      {
                      
                     $cApprover1= $rowx['cApprover1'];
                       $dAddRemarks= $rowx['dAddRemarks'];

                       }



				 $functionqry2y = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resulty = mysql_query($functionqry2y) or die(mysql_error());
                  $maxiy=mysql_num_rows($resulty);
                  while ($rowy = mysql_fetch_array($resulty))     
                      {
                      
                      $cRejectRemarks= $rowy['cRejectRemarks'];
                     

                       }

                        // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='KIN' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					    $to = 'guess@kingsgroup.com.ph;mabrodriguez@guess.com.ph;';
                       // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
                        //$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Kings Cooperative : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is REJECTED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                           <b> Reason for Rejection: </b>

                           <table border>
                    <tr>
                            <th><b>Remarks</b></th>
                            
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$cRejectRemarks."</td>
                                
                                
                        </tr>
                        
                        </table>





                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	 
         

            $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);



						}	

//====================================================================KINGS COOPERATIVE==============================================================================//

//================================================================YEARNINGS COOPERATIVE==============================================================================//
					 if($f=='YEARNINGS OUTSOURCING COOPERATIVE')
						{

	
				       
	     $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprovers.php");	

				   date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
				     $qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				  


					 $functionqry2x = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resultx = mysql_query($functionqry2x) or die(mysql_error());
                  $maxix=mysql_num_rows($resultx);
                  while ($rowx = mysql_fetch_array($resultx))     
                      {
                      
                      $cApprover1= $rowx['cApprover1'];
                       $dAddRemarks= $rowx['dAddRemarks'];

                       }

                      



				 $functionqry2y = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resulty = mysql_query($functionqry2y) or die(mysql_error());
                  $maxiy=mysql_num_rows($resulty);
                  while ($rowy = mysql_fetch_array($resulty))     
                      {
                      
                      $cRejectRemarks= $rowy['cRejectRemarks'];
                     

                       }

                        // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='YEA' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					    $to = 'lopezjordanryan.yoc@gmail.com;mabrodriguez@guess.com.ph;';
                       // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
                        //$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Yearnings Outsourcing Cooperative : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is REJECTED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                           <b> Reason for Rejection: </b>

                           <table border>
                    <tr>
                            <th><b>Remarks</b></th>
                            
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$cRejectRemarks."</td>
                                
                                
                        </tr>
                        
                        </table>





                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	  $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);



						}	

//===========================================================YEARNINGS COOPERATIVE==============================================================================//




//===========================================================PARAMOUNT COOPERATIVE==============================================================================//
					 if($f=='Paramount MPC')
						{

	
				       
	            $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprovers.php");	

				   date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
				     $qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				    


					 $functionqry2x = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resultx = mysql_query($functionqry2x) or die(mysql_error());
                  $maxix=mysql_num_rows($resultx);
                  while ($rowx = mysql_fetch_array($resultx))     
                      {
                      
                     $cApprover1= $rowx['cApprover1'];
                       $dAddRemarks= $rowx['dAddRemarks'];

                       }



				 $functionqry2y = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resulty = mysql_query($functionqry2y) or die(mysql_error());
                  $maxiy=mysql_num_rows($resulty);
                  while ($rowy = mysql_fetch_array($resulty))     
                      {
                      
                      $cRejectRemarks= $rowy['cRejectRemarks'];
                     

                       }

                        // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='PAR' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					    $to = 'guess@paramountmpc.org;mabrodriguez@guess.com.ph;';
                       // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
                        //$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Paramount MPC : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is REJECTED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                           <b> Reason for Rejection: </b>

                           <table border>
                    <tr>
                            <th><b>Remarks</b></th>
                            
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$cRejectRemarks."</td>
                                
                                
                        </tr>
                        
                        </table>





                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	

$qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);

						}	

//==========================================================Paramount MPC COOPERATIVE==============================================================================//



//==========================================================RESTEL COOPERATIVE==============================================================================//
					 if($f=='Restel-MPC')
						{

	
				       
	            $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprovers.php");	

				   date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
				     $qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				  


					 $functionqry2x = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resultx = mysql_query($functionqry2x) or die(mysql_error());
                  $maxix=mysql_num_rows($resultx);
                  while ($rowx = mysql_fetch_array($resultx))     
                      {
                      
                     $cApprover1= $rowx['cApprover1'];
                       $dAddRemarks= $rowx['dAddRemarks'];

                       }

                    

				 $functionqry2y = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resulty = mysql_query($functionqry2y) or die(mysql_error());
                  $maxiy=mysql_num_rows($resulty);
                  while ($rowy = mysql_fetch_array($resulty))     
                      {
                      
                      $cRejectRemarks= $rowy['cRejectRemarks'];
                     

                       }

                        // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='RES' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					    $to = 'restelmpc@gmail.com;mabrodriguez@guess.com.ph;';
                       // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
              //$to =  'restelmpc@gmail.com;mabrodriguez@guess.com.ph;';      
                        //$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Restel-MPC : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is REJECTED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                           <b> Reason for Rejection: </b>

                           <table border>
                    <tr>
                            <th><b>Remarks</b></th>
                            
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$cRejectRemarks."</td>
                                
                                
                        </tr>
                        
                        </table>





                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	  $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);



						}	

//==========================================================RESTEL COOPERATIVE==============================================================================//



//==========================================================JOB PLACEMENT COOPERATIVE==============================================================================//
					 if($f=='Job Placement Resources Service Coop')
						{

	
				       
	            $_SESSION['U_ValidMessage'] = " You have successfully rejected the request";
				session_write_close();
				header("location: PIFApprovers.php");	

				   date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
					
					$qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $y . "'";
				     $qryAddResult=mysql_query($qryAdd);

					$qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

					$qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $y . "'";
					$qryAddResult=mysql_query($qryAdd);

				    


					 $functionqry2x = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resultx = mysql_query($functionqry2x) or die(mysql_error());
                  $maxix=mysql_num_rows($resultx);
                  while ($rowx = mysql_fetch_array($resultx))     
                      {
                      
                     $cApprover1= $rowx['cApprover1'];
                       $dAddRemarks= $rowx['dAddRemarks'];

                       }

                        

				 $functionqry2y = "SELECT * from cooptblpayroll where cControlNumber='".$y."' ";
                  $resulty = mysql_query($functionqry2y) or die(mysql_error());
                  $maxiy=mysql_num_rows($resulty);
                  while ($rowy = mysql_fetch_array($resulty))     
                      {
                      
                      $cRejectRemarks= $rowy['cRejectRemarks'];
                     

                       }

                        // email address from HRIS
                       include('DBConnect2.php');
                         $qryApprovers2 = "SELECT * from tAgency where cAgencyCode='JPRSC' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          $vEmailAdd = $rowA2['vEmailAdd'];
                          
                        }
						
					    $to = 'dorilin.caber@jprsc.com;mabrodriguez@guess.com.ph;';
                       // $to = $vEmailAdd . 'mabrodriguez@guess.com.ph;';
                        //$to = 'mabrodriguez@guess.com.ph;';
						$subject = "PIF Job Placement Resources Service Coop : " . $y."";
						
						$message = " 

                        <br>Payroll Inquiry Request of " .$p. " is REJECTED for Payment! Kindly see details below:<br><br>

                        <b> Request Details: </b>

                      


                        <table border>
                    <tr>
                            <th><b>Date</b></th>
                            <th><b>Month&Year</b></th>
                            <th><b>Cutoff</b></th>
                            <th><b>Nature of Inquiry</b></th>
                            <th><b>Additional Remarks</b></th>
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xDate."</td>
                                <td>".$xMonth."  ".$xYear."</td>
                                <td>".$xCutoff."</td>
                                <td>".$xReason."</td>
                                <td>".$dAddRemarks."</td>
                        </tr>
                        
                        </table>

                        <br><br>

                           <b> Reason for Rejection: </b>

                           <table border>
                    <tr>
                            <th><b>Remarks</b></th>
                            
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$cRejectRemarks."</td>
                                
                                
                        </tr>
                        
                        </table>





                        <br><br>

                        <b> Approver Details </b>

                           <table border>
                    <tr>
                            <th><b>Approver Name</b></th>
                            <th><b>Approved Date</b></th>
                            
                    </tr>
                    </thead>
                    <tbody>

                 
                        <tr>
                                <td>".$xApproverName."</td>
                                <td>".$cApprover1." </td>
                                
                        </tr>
                        
                        </table>



						<br><br>
						<i>
						This is an automatically generated email please do not reply to this mail. <br>
                         Please click on the link (http://192.168.1.236/guessemployeeonline) to go directly to the system. </i>";
						

						$from = "PIFRequest@guess.com.ph";
						$headers = "From:" . $from . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
						mail($to,$subject,$message,$headers);	

	
            $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $y . "'";
          $qryAddResult=mysql_query($qryAdd);


						}	

//==========================================================JOB PLACEMENT COOPERATIVE==============================================================================//




else
						{


			    $_SESSION['U_ErrorMessage'] = "Employee does not have Agency!Kindly Contact IT for assistance!";
				session_write_close();
				header("location: PIFApprovers.php");


						}	


				//end tag of rejected	
				}
			


?>