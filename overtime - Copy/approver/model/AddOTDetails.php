<?php
    //include('Auth.php'); 
    include('../../../config/dbconfig-OT2.php');
	session_start();
    date_default_timezone_set('Asia/Manila');

    $cIDNumber = $_SESSION['SESS_cIDNumber'];
    $vName = $_SESSION['SESS_vName'];
    $vDepartment = $_SESSION['SESS_vDepartment']; 
    $dDate = $_POST['datepickapp'];
    $dFrom = $_POST['tFromx'];
    $dTo = $_POST['tTo'];
    $tReason = $_POST['rSelect'];
    $tOtherR = $_POST['reasonTx'];
    $dNow = (new DateTime('now'))->format('Y-m-d H:i:s');
 
    $wBase=$_SESSION['SESS_cBranch'];

        if(trim($wBase)=='Head Office')
        {
            $wBase='HO';
        }
        else
        {
            $wBase='ST';	
        }
 
    function GetControlNo($cIDnumberx) 
    {
                include('../../../config/dbconfig-OT2.php');
                $csysqry = "Select 
                case when right(rtrim(cSysID),3) is null 
                then 0 else right(rtrim(cSysID),3) end as cSysID from 
                (select cIDNumber, cSysID from tOTQue
                union all 
                select cIDNumber, cSysID from tOTProcess
                union all 
                select cIDNumber, cSysID from tOTProcessH) a 
                where a.cIDNumber = '" . $cIDnumberx . "' order by right(rtrim(cSysID),3) asc ";

                $qrySysID=sqlsrv_query($conn, $csysqry);
              
                while($row = sqlsrv_fetch_array($qrySysID))
                        {
                            $LastIDx = $row['cSysID'];
                        }
                        $LastIDx = $LastIDx + 1;
                        $SysID = $cIDnumberx . "-" . str_pad($LastIDx, 3, '0', STR_PAD_LEFT);
                 return $SysID;
    }

    $cControlNox = GetControlNo($cIDNumber);

	if ($dDate == '' ) {
		$errmsg_arr = 'No selected OT Date! Please complete OT Details!';				
		$errflag = true;
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: ../view/OvertimeHO.php");
			exit();
            }
            
    }  

    if ($tReason == '' ) {
		$errmsg_arr = 'No selected reason! Please complete OT Details!';				
		$errflag = true;
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: ../view/OvertimeHO.php");
			exit();
            }
            
    }  


    $query = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
    $rslt = sqlsrv_query($conn, $query);
    $rowx = sqlsrv_has_rows($rslt);
    while ($rowAz = sqlsrv_fetch_array($rslt))  
    {
        $Datex = $rowAz['dDate'];
    }
    


    if ($rowx === true){
        if($Datex == $dDate){
                    $errmsg_arr = 'OT Date Already Exist!';				
                    $errflag = true;
                    if($errflag) 
                        {
                            $_SESSION['U_ErrorMessage'] = $errmsg_arr;
                            session_write_close();
                            header("location: ../view/OvertimeHO.php");
                            exit();
                        }
        }
    } else {
        include('../../../config/dbconfig-OT2.php');
        $zero = 0;  
        $pend = 'PENDING';
        $arc = '1900-01-01';
        $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, cWorkBase, vDeptStore, dFiledDate, dDate, cDayOff, 
                                    isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insParam = array($cControlNox, $cIDNumber, $vName, $wBase, $vDepartment, $dNow, 
        $dDate, $zero, $zero, $zero, $dFrom, $dTo, $tReason, $tOtherR, $pend, $arc);
        
        $insQryResult = sqlsrv_query($conn, $insQry, $insParam);
        
        $_SESSION['U_ValidMessage'] = 'OT Details Successfully Added!';
        session_write_close();
        header("location: ../view/OvertimeHO.php");
    }



    

?>