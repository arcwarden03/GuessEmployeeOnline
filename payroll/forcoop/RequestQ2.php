<?php
//include('Auth.php');
	//include ('../../../config/dbconfig-login.php');
	include('DBConnect4.php');
	session_start();
	$cIDNumber = trim($_SESSION['SESS_cIDNumber']);


            $wBase=$_SESSION['SESS_cBranch'];
            if(trim($wBase)=='Head Office')
            {
                $wBase='HO';
            }
            else
            {
                $wBase='ST';    
            }


            function GetControlNo() 
        {
            $BaseLoc=$_SESSION['SESS_cBranch'];
            if(trim($BaseLoc)=='Head Office')
            {
                $BaseLoc='HO';
            }
            else
            {
                $BaseLoc='ST';  
            }
            if ($BaseLoc == 'HO') {
                    $TickLoc='H';
                }
            else 
                {
                    $TickLoc='S';
                }
                
            $functionqry = "Select * from tcontrolno where cWorkBase = '" . $BaseLoc . "'";
            $qryTicketResult=mysql_query($functionqry);
            if (mysql_num_rows($qryTicketResult)<>0)
                {
                    $row = mysql_fetch_array($qryTicketResult);
                    $LastTicketNo = $row['cControlNumber'];
                }
            $tick= $TickLoc . date("y") . str_pad($LastTicketNo, 4, '0', STR_PAD_LEFT);
            return $tick;
        }

 $cIDNumber = trim($_SESSION['SESS_cIDNumber']);
$vEmpName = trim($_POST['EmpNamex']);
$vEmpID = trim($_POST['EmpIDx']);
$vEmpDept = trim($_POST['EmpDeptx']);
$vEmpDesig = trim($_POST['EmpDesigx']);
$vEmpAgency = trim($_POST['EmpAgencyx']);
$vEmpDate = trim($_POST['EmpDatex']);
$vEmpMonth = trim($_POST['EmpMonthx']);
$vEmpYear = trim($_POST['EmpYearx']);
$vEmpCutoff = trim($_POST['EmpCutoffx']);
$vEmpReason = trim($_POST['EmpReasonx']);
$vEmpApp = trim($_POST['EmpAppx']);
$vEmpEmail = trim($_POST['EmpEmailx']);
$vEmpAddRemarks = trim($_POST['EmpAddRemarksx']);
$cIDNumber = $_SESSION['SESS_cIDNumber'];

$timezone = "Asia/Manila";

if(function_exists('date_default_timezone_set')) 
date_default_timezone_set($timezone);
$dRequestDate=date("y/m/d : H:i:s", time()); 

$cControlNo = GetControlNo();




     
/*--------------------------------------------- */

  $query = "SELECT * from cooptemptable where cidnumber = '" . $cIDNumber . "' 
                and dDate = '". $vEmpDate ."' and dReason = '". $vEmpReason ."'"; 
                        
              $result = mysql_query($query) or die(mysql_error());
              $maxi=mysql_num_rows($result);

              while ($row = mysql_fetch_array($result)){
                         $Datex = $row['dDate'];    
                         $Reasonx = $row['dReason'];
              }


            if ($maxi > 0){

                if($Datex == $vEmpDate){
                        if($Reasonx == $vEmpReason){
                           
                           echo "boo";             
                         exit();


                        } 

                    }             

     }           

                        $qryAdd ="insert into cooptemptable (cControlNumber,cIDNumber,EmployeeID,vName,vDepartment,vDesignation,vAgency,dDate,dMonth,dYear,dCutoff,dReason,dAddRemarks,cApproverName,cApproverEmail,dRequestDate) ";
                        $qryAdd = $qryAdd . "Values (";
                         $qryAdd = $qryAdd . "'" . $cControlNo. "',";
                        $qryAdd = $qryAdd . "'" . $cIDNumber. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpID. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpName. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpDept. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpDesig. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpAgency. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpDate. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpMonth. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpYear. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpCutoff. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpReason. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpAddRemarks. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpApp. "',";
                        $qryAdd = $qryAdd . "'" . $vEmpEmail. "',";
                        $qryAdd = $qryAdd . "'" . $dRequestDate. "')";
                        
                        echo $qryAdd;
                        $qryAddResult=mysql_query($qryAdd);


                        //will loop control number on the next insert
                        $qryAdd = "update tcontrolno set cControlNumber = cControlNumber + 1 where cWorkBase = '" . $wBase . "'";
                        echo $qryAdd;
                        $qryAddResult=mysql_query($qryAdd);


                 
     
?>


