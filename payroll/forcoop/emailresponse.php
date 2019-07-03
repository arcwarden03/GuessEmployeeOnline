<?php 
    session_start();
    //include('Auth.php');
    include('DBConnect4.php');

    $actionx = $_GET['x'];
    $cSysIdz = $_GET['cSysIdx'];
    $lvl = $_GET['nLvl'];
    $vName= $_GET['EmpNamex'];
    $lvlmax = $_GET['xLvlMax'];
    

             //check if already responded 
             $isResponded="";
             $fApprover = "Select cStatus from tblappcoop where cControlNumber = '" . $cSysIdz . "' and nLevel = '". $lvl ."' order by nLevel asc";
             $rApprover = mysql_query($fApprover) or die(mysql_error());
             $exists=mysql_num_rows($rApprover);
             if ($exists>0)
                 {
                 while ($ActiveApprover = mysql_fetch_array($rApprover))
                     {
                             $isResponded=$ActiveApprover['cStatus'];
                     }
                 }

    

            if($isResponded == 'APPROVED'){
                echo 'You already responded on this email. No action needed! Thank you!';
            }else{
            
    
                    //action of email
                    if($actionx == "APPROVED"){

                        date_default_timezone_set('Asia/Manila');
                    $dApprovedDate=(new DateTime('now'))->format('Y-m-d H:i:s');

                    $qBypass = "update cooptblpayroll set cApprover1= '" . $dApprovedDate. "',cApprover1Status = 'APPROVED',cCurrentLocation='HRD for Validation' where cControlNumber = '" . $cSysIdz . "'";
                    $rBypass=mysql_query($qBypass);

                    $qBypass = "update tblappcoop set cStatus = 'APPROVED' , dApprovedDate = '" . $dApprovedDate. "' where cControlNumber = '" . $cSysIdz . "'";
                
                    $rBypass=mysql_query($qBypass);

                    $_SESSION['U_ValidMessage'] = "";      


                    echo 'PIF Successfully Approved and sent to Agency Coordinator!';



                    } 

                    elseif  ($actionx=='REJECTED') {

                
                date_default_timezone_set('Asia/Manila');
                    $dApproveDateTime=(new DateTime('now'))->format('Y-m-d H:i:s');
                    $qryAdd = "update cooptblpayroll set cApprover1Status='REJECTED', cApprover1='" . $dApproveDateTime . "',cCurrentLocation='Rejected by Approver' where cControlNumber = '" . $cSysIdz . "'";
                    $qryAddResult=mysql_query($qryAdd);

                    $qryAdd  = "update tblappcoop set cStatus = 'REJECTED' , dApprovedDate = '" . $dApproveDateTime. "' where cControlNumber = '" .$cSysIdz. "'";
                    $qryAddResult=mysql_query($qryAdd);

                    $qryAdd = "insert into cooptblpayrollh select * from cooptblpayroll where cControlNumber = '" . $cSysIdz. "'";
                    $qryAddResult=mysql_query($qryAdd);

                    $qryAdd = "delete from cooptblpayroll where cControlNumber = '" . $cSysIdz . "'";
                    $qryAddResult=mysql_query($qryAdd);

                    $qryAdd = "insert into cooptblpayrolldetailsh select * from cooptblpayrolldetails where cControlNumber = '" . $cSysIdz . "'";
                    $qryAddResult=mysql_query($qryAdd);
                    
                    $qryAdd = "delete from cooptblpayrolldetails where cControlNumber = '" . $cSysIdz . "'";
                    $qryAddResult=mysql_query($qryAdd);

                    echo 'You Succesfully Rejected the Request';
                      
                    }
    
                }
            
           

 ?>