<?php
    include ('../../../config/dbconfig-OT2.php');
    include ('../../Auth.php');
	session_start();
    date_default_timezone_set('Asia/Manila');

    $cIDNumber = trim($_SESSION['SESS_cIDNumber']);
    $vName = trim($_SESSION['SESS_vName']);
    $vDepartment = trim($_SESSION['SESS_vDepartment']); 
    $dNow = (new DateTime('now'))->format('Y-m-d H:i:s');

    $vEmpName = trim($_POST['EmpNamex']);
    $vEmpID = trim($_POST['EmpIDx']);
    $dDate = trim($_POST['OTDatex']);
    $tPass = trim($_POST['OTPassx']);
    $dOTFrom = trim($_POST['OTFromx']);
    $dOTTo = trim($_POST['OTTox']);
    $dShift = trim($_POST['SFromx']) .' - '. trim($_POST['STox']);

    $vDayOff = trim($_POST['Doffx']);
    $vReason1 = trim($_POST['Reason1x']);

    
    if(trim($_POST['Reason2x']) == '') {
        $vReason2 = null;
    } else {
        $vReason2 = trim($_POST['Reason2x']);
    }

   
    $isValid = $_POST['isValidx'];

    $wBase = $_SESSION['SESS_cBranch'];

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

    //check if valid to file  

        if(trim($isValid)==1){
                // another checking here
                    include('../../../config/dbconfig-OT2.php');
                    $queryx = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                    $rsltz = sqlsrv_query($conn, $queryx);
                    $rowx = sqlsrv_has_rows($rsltz);
                    while ($rowAz = sqlsrv_fetch_array($rsltz))  
                    {
                        $Datex = $rowAz['dDate'];
                        $dFromx = $rowAz['dFrom'];
                        $dTox = $rowAz['dTo'];
                        $vNamex = $rowAz['vName'];
                    }

                    if ($rowx == true){

                        if($Datex == $dDate){

                            if(trim($dFromx) == trim($dOTFrom) && trim($dTox) == trim($dOTTo) && trim($vEmpName) == trim($vNamex))
                            {
                                echo "OT Date and Time For This Employee Already Exist On Que!";				
                                exit();
                            }

                        }
                    }

                    include('../../../config/dbconfig-OT2.php');
                    $queryPx = "SELECT * from tOTProcess where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                    $rsltPx = sqlsrv_query($conn, $queryPx);
                    $rowPx = sqlsrv_has_rows($rsltPx);
                    while ($rowAPx = sqlsrv_fetch_array($rsltPx))  
                    {
                        $DateP = $rowAPx['dDate'];
                        $dFromP = $rowAPx['dFrom'];
                        $dToP = $rowAPx['dTo'];
                        $vNameP = $rowAPx['vName'];
                    }

                    if ($rowPx == true){
                        if($DateP == $dDate){

                            if(trim($dFromP) == trim($dOTFrom) && trim($dToP) == trim($dOTTo) && trim($vEmpName) == trim($vNameP))
                            {
                                echo "OT Date and Time For This Employee Already Exist On Process!";				
                                exit();
                            }

                        }
                    }

                    include('../../../config/dbconfig-OT2.php');
                    $queryH = "SELECT * from tOTProcessH where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                    $rsltH = sqlsrv_query($conn, $queryH);
                    $rowH = sqlsrv_has_rows($rsltH);
                    while ($rowAH = sqlsrv_fetch_array($rsltH))  
                    {
                        $DateH = $rowAH['dDate'];
                        $dFromH = $rowAH['dFrom'];
                        $dToH = $rowAH['dTo'];
                        $vNameH = $rowAH['vName'];
                    }

                    if ($rowH == true){    
                        if($DateH == $dDate){

                            if(trim($dFromH) == trim($dOTFrom) && trim($dToH) == trim($dOTTo) && trim($vEmpName) == trim($vNameH))
                            {
                                echo "OT Date and Time For This Employee Already Exist On Archive!";				
                                exit();
                        
                            }

                        }
                    }

                    // is employee under this store?
                    /*include('../../../config/dbconfig-OT.php');
                    $qEmp = "SELECT vDepartment from vOnlineUserAccount where cIDNumber = '". $vEmpID ."'"; 
                     $qEmpRes = sqlsrv_query($conn, $qEmp);
                    $rowqEmpRes = sqlsrv_has_rows($qEmpRes);
                    while ($rowEmp = sqlsrv_fetch_array($rowqEmpRes))  
                    {
                        $vEmpDept = $rowEmp['vDepartment'];
                    }*/
                    

                //end checking



                include('../../../config/dbconfig-OT2.php');
                $zero = 0;  
                $pend = 'PENDING';
                $arc = '1900-01-01';
                $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, EmpIDNo, cWorkBase, vDeptStore, vFiledBy, dFiledDate, dDate, cDayOff, 
                                            isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insParam = array($cControlNox, $cIDNumber, $vEmpName, $vEmpID, $wBase, $vDepartment, $vName, $dNow, 
                $dDate, $vDayOff, $dOFFval, $dShift, $dOTFrom, $dOTTo, $vReason1, $vReason2, $pend, $arc);
                
                $insQryResult = sqlsrv_query($conn, $insQry, $insParam);
                
                echo "OT Details Successfully Added!!";				
                exit();
            

        } else {

            //check if valid passcode
            include('../../../config/dbconfig-OT2.php');
            $query = "SELECT * from tAuthCode where vDeptStore = '". $vDepartment ."' and vCode = '". $tPass ."'"; 
            $rslt = sqlsrv_query($conn, $query);
            $rowz = sqlsrv_has_rows($rslt);
            
           
            if ($rowz===true){

                // another checking here
                        include('../../../config/dbconfig-OT2.php');
                        $queryx = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                        $rsltz = sqlsrv_query($conn, $queryx);
                        $rowx = sqlsrv_has_rows($rsltz);
                        while ($rowAz = sqlsrv_fetch_array($rsltz))  
                        {
                            $Datex = $rowAz['dDate'];
                            $dFromx = $rowAz['dFrom'];
                            $dTox = $rowAz['dTo'];
                            $vNamex = $rowAz['vName'];
                        }

                        if ($rowx == true){

                            if($Datex == $dDate){

                                if(trim($dFromx) == trim($dOTFrom) && trim($dTox) == trim($dOTTo) && trim($vEmpName) == trim($vNamex))
                                {
                                    echo "OT Date and Time For This Employee Already Exist On Que!";				
                                    exit();
                                }

                            }
                        }

                        include('../../../config/dbconfig-OT2.php');
                        $queryPx = "SELECT * from tOTProcess where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                        $rsltPx = sqlsrv_query($conn, $queryPx);
                        $rowPx = sqlsrv_has_rows($rsltPx);
                        while ($rowAPx = sqlsrv_fetch_array($rsltPx))  
                        {
                            $DateP = $rowAPx['dDate'];
                            $dFromP = $rowAPx['dFrom'];
                            $dToP = $rowAPx['dTo'];
                            $vNameP = $rowAPx['vName'];
                        }

                        if ($rowPx == true){
                            if($DateP == $dDate){

                                if(trim($dFromP) == trim($dOTFrom) && trim($dToP) == trim($dOTTo) && trim($vEmpName) == trim($vNameP))
                                {
                                    echo "OT Date and Time For This Employee Already Exist On Process!";				
                                    exit();
                                }

                            }
                        }

                        include('../../../config/dbconfig-OT2.php');
                        $queryH = "SELECT * from tOTProcessH where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."' and vName= '". $vEmpName ."'"; 
                        $rsltH = sqlsrv_query($conn, $queryH);
                        $rowH = sqlsrv_has_rows($rsltH);
                        while ($rowAH = sqlsrv_fetch_array($rsltH))  
                        {
                            $DateH = $rowAH['dDate'];
                            $dFromH = $rowAH['dFrom'];
                            $dToH = $rowAH['dTo'];
                            $vNameH = $rowAH['vName'];
                        }

                        if ($rowH == true){    
                            if($DateH == $dDate){

                                if(trim($dFromH) == trim($dOTFrom) && trim($dToH) == trim($dOTTo) && trim($vEmpName) == trim($vNameH))
                                {
                                    echo "OT Date and Time For This Employee Already Exist On Archive!";				
                                    exit();
                            
                                }

                            }
                        }
                //end checking


                                include('../../../config/dbconfig-OT2.php');
                                $zero = 0;  
                                $pend = 'PENDING';
                                $arc = '1900-01-01';
                                $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, EmpIDNo, cWorkBase, vDeptStore, vFiledBy, dFiledDate, dDate, cDayOff, 
                                                            isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                                            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                $insParam = array($cControlNox, $cIDNumber, $vEmpName, $vEmpID, $wBase, $vDepartment, $vName, $dNow, 
                                $dDate, $vDayOff, $dOFFval, $dShift, $dOTFrom, $dOTTo, $vReason1, $vReason2, $pend, $arc);
                                
                                $insQryResult = sqlsrv_query($conn, $insQry, $insParam);
                                
                                echo "OT Details Successfully Added!!";				
                                exit();
                            
            } else {


                echo "Invalid Passcode! Please double check given Passcode!";				
                exit();

            }
        }
    
?>