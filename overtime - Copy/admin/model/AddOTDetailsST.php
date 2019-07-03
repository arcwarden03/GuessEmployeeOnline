<?php
    include('../../../config/dbconfig-OT2.php');
	session_start();
    date_default_timezone_set('Asia/Manila');

    $cIDNumber = trim($_SESSION['SESS_cIDNumber']);
    $vName = trim($_SESSION['SESS_vName']);
    $vDepartment = trim($_SESSION['SESS_vDepartment']); 
    
    $vEmpName = trim($_POST['EmpSelectx']);
    $vPos = trim($_POST['tPosx']);
    $dDate = $_POST['datepickapp'];
    $vPass = trim($_POST['tAuthCodex']);
    $dOTFrom = trim($_POST['tFrom']);
    $dOTTo = trim($_POST['tTo']);
    $dShift = trim($_POST['sFrom']) .' - '. trim($_POST['sTo']);
    $vDayOff = trim($_POST['DoffSelectx']);
    $vReason1 = trim($_POST['rSelect']);
    $vReason2 = trim($_POST['reasonTx']);
    
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
 

        $timestamp = strtotime($dDate);
        $day = date('l', $timestamp);
        echo $day;
     
        $dOFFval = 0;
        if($day==$vDayOff){
            $dOFFval = 1;
        } else {
            $dOFFval = 0;
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

 	if (trim($vEmpName) == '' || trim($vPos) == '' || trim($dDate) == '' || trim($vDayOff) == '' || trim($vReason1) == '') {
		$errmsg_arr = 'Please fill up required information!';				
		$errflag = true;
		if($errflag) 
			{
			$_SESSION['U_ErrorMessage'] = $errmsg_arr;
			session_write_close();
			header("location: ../view/OvertimeST.php");
			exit();
            }
            
    }  


    $query = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName = '". $vEmpName ."'"; 
    $rslt = sqlsrv_query($conn, $query);
    $rowx = sqlsrv_has_rows($rslt);
    while ($rowAz = sqlsrv_fetch_array($rslt))  
    {
        $Datex = $rowAz['dDate'];
    }


    if($wBase=='HO'){



        if ($rowx === true){
            if($Datex == $dDate){
                        $errmsg_arr = 'OT Date Already Exist To Employee!';				
                        $errflag = true;
                        if($errflag) 
                            {
                                $_SESSION['U_ErrorMessage'] = $errmsg_arr;
                                session_write_close();
                                header("location: ../view/OvertimeST.php");
                                exit();
                            }
            }
        } else {
            include('../../../config/dbconfig-OT2.php');
            $zero = 0;  
            $pend = 'PENDING';
            $arc = '1900-01-01';
            $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, cWorkBase, vDeptStore, vFiledBy, dFiledDate, dDate, cDayOff, 
                                        isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insParam = array($cControlNox, $cIDNumber, $vEmpName, $wBase, $vDepartment, $vName, $dNow, 
            $dDate, $vDayOff, $dOFFval, $dShift, $dOTFrom, $dOTTo, $vReason1, $vReason2, $pend, $arc);
            
            $insQryResult = sqlsrv_query($conn, $insQry, $insParam);

            
            $_SESSION['U_ValidMessage'] = 'OT Details Successfully Added!';
            session_write_close();
            header("location: ../view/OvertimeST.php");
        }

    } else {

        if ($rowx === true){
            if($Datex == $dDate){
                        $errmsg_arr = 'OT Date Already Exist To Employee!';			
                        $errflag = true;
                        if($errflag) 
                            {
                                $_SESSION['U_ErrorMessage'] = $errmsg_arr;
                                session_write_close();
                                header("location: ../view/OvertimeST.php");
                                exit();
                            }
            }
        } else {
            include('../../../config/dbconfig-OT2.php');
            $zero = 0;  
            $pend = 'PENDING';
            $arc = '1900-01-01';
            $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, cWorkBase, vDeptStore, vFiledBy, dFiledDate, dDate, cDayOff, 
                                        isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insParam = array($cControlNox, $cIDNumber, $vEmpName, $wBase, $vDepartment, $vName, $dNow, 
            $dDate, $vDayOff, $dOFFval, $dShift, $dOTFrom, $dOTTo, $vReason1, $vReason2, $pend, $arc);
            
            $insQryResult = sqlsrv_query($conn, $insQry, $insParam);
            
            /*$_SESSION['U_ValidMessage'] = $cControlNox.' - '.$cIDNumber.' - '.$vEmpName.' - '.$wBase.' - '.$vDepartment.' - '.
            $vName.' - '.$dNow.' - '.$dDate.' - '.$vDayOff.' - '.$zero.' - '.$dShift.' - '.$dOTFrom.' - '.$dOTTo.' - '.
            $vReason1.' - '.$vReason2.' - '.$pend.' - '.$arc;*/
            $_SESSION['U_ValidMessage'] = 'OT Details Successfully Added!';
            session_write_close();
            header("location: ../view/OvertimeST.php");
        }


    }


?>