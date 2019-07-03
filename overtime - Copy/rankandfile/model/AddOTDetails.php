<?php
    include ('../../../config/dbconfig-OT2.php');
    include ('../../Auth.php');
    session_start();
    $timezone = date_default_timezone_set('Asia/Manila');
    
    $cIDNumber = trim($_SESSION['SESS_cIDNumber']);
    $vName = $_SESSION['SESS_vName'];
    $vDepartment = $_SESSION['SESS_vDepartment']; 
     
    $dDate = trim($_POST['OTDatex']);
    $dFrom = $_POST['OTFromx'];
    $dTo = $_POST['OTTox'];
    $tReason = $_POST['Reason1x'];

    if(trim($_POST['Reason2x']) == '') {
        $tOtherR = null;
    } else {
        $tOtherR = $_POST['Reason2x'];
    }

    $cidnox = null;
    
    $dNow = (new DateTime('now'))->format('Y/m/d H:i:s');
    $dNowx = (new DateTime('now'))->format('m/d/Y');
 
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
 

    

    if(date('H') >= 17) 
        {
            include ('../../../config/dbconfig-OT2.php');
                    // this is for checking
                    $queryx = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                    $rsltz = sqlsrv_query($conn, $queryx);
                    $rowx = sqlsrv_has_rows($rsltz);
                    while ($rowAz = sqlsrv_fetch_array($rsltz))  
                    {
                        $Datex = $rowAz['dDate'];
                        $dFromx = $rowAz['dFrom'];
                        $dTox = $rowAz['dTo'];
                    }
                
                    $queryP = "SELECT * from tOTProcess where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                    $rsltP = sqlsrv_query($conn, $queryP);
                    $rowP = sqlsrv_has_rows($rsltP);
                    while ($rowAP = sqlsrv_fetch_array($rsltP))  
                    {
                        $DateP = $rowAP['dDate'];
                        $dFromP = $rowAP['dFrom'];
                        $dToP = $rowAP['dTo'];
                    }
                
                    $queryH = "SELECT * from tOTProcessH where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                    $rsltH = sqlsrv_query($conn, $queryH);
                    $rowH = sqlsrv_has_rows($rsltH);
                    while ($rowAH = sqlsrv_fetch_array($rsltH))  
                    {
                        $DateH = $rowAH['dDate'];
                        $dFromH = $rowAH['dFrom'];
                        $dToH = $rowAH['dTo'];
                    }
            // end checking

            if(trim($dDate) == trim($dNowx))
            {
                echo "You cannot file your overtime for today beyond <b>5PM</b>!";				
                exit();


            } else { 
                
                if ($rowx == true){
                    if($Datex == $dDate){
    
                        if(trim($dFromx) == trim($dFrom) && trim($dTox) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Que!";				
                            exit();
                        }
    
                    }
                }
    
                if ($rowP == true){
                    if($DateP == $dDate){
    
                        if(trim($dFromP) == trim($dFrom) && trim($dToP) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Process!";				
                            exit();
                        }
    
                    }
                }
    
                if ($rowH == true){    
                    if($DateH == $dDate){
    
                        if(trim($dFromH) == trim($dFrom) && trim($dToH) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Archive!";				
                            exit();
                        }
    
                    }
                }
    
    
                include('../../../config/dbconfig-OT2.php');
                $zero = 0;  
                $pend = 'PENDING';
                $arc = '1900-01-01';
                $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, EmpIDNo, cWorkBase, vDeptStore, dFiledDate, dDate, cDayOff, 
                                            isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insParam = array($cControlNox, $cIDNumber, $vName, $cidnox, $wBase, $vDepartment, $dNow, 
                $dDate, $zero, $zero, $zero, $dFrom, $dTo, $tReason, $tOtherR, $pend, $arc);
                
                $insQryResult = sqlsrv_query($conn, $insQry, $insParam);

                echo "OT Details Successfully Added!!";				
                exit();
    
            }

    } else {
        include ('../../../config/dbconfig-OT2.php');
        // this is for checking
                $queryx = "SELECT * from tOTQue where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                $rsltz = sqlsrv_query($conn, $queryx);
                $rowx = sqlsrv_has_rows($rsltz);
                while ($rowAz = sqlsrv_fetch_array($rsltz))  
                {
                    $Datex = $rowAz['dDate'];
                    $dFromx = $rowAz['dFrom'];
                    $dTox = $rowAz['dTo'];
                }
            
                $queryP = "SELECT * from tOTProcess where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                $rsltP = sqlsrv_query($conn, $queryP);
                $rowP = sqlsrv_has_rows($rsltP);
                while ($rowAP = sqlsrv_fetch_array($rsltP))  
                {
                    $DateP = $rowAP['dDate'];
                    $dFromP = $rowAP['dFrom'];
                    $dToP = $rowAP['dTo'];
                }
            
                $queryH = "SELECT * from tOTProcessH where cIDNumber = '". $cIDNumber ."' and dDate= '". $dDate ."'"; 
                $rsltH = sqlsrv_query($conn, $queryH);
                $rowH = sqlsrv_has_rows($rsltH);
                while ($rowAH = sqlsrv_fetch_array($rsltH))  
                {
                    $DateH = $rowAH['dDate'];
                    $dFromH = $rowAH['dFrom'];
                    $dToH = $rowAH['dTo'];
                }
        // end checking

                if ($rowx == true){

                    if($Datex == $dDate){

                        if(trim($dFromx) == trim($dFrom) && trim($dTox) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Que!";				
                            exit();
                        }

                    }
                    
                } elseif ($rowP == true){
                    if($DateP == $dDate){

                        if(trim($dFromP) == trim($dFrom) && trim($dToP) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Process!";				
                            exit();
                        }

                    }

                } elseif ($rowH == true){    
                    if($DateH == $dDate){

                        if(trim($dFromH) == trim($dFrom) && trim($dToH) == trim($dTo))
                        {
                            echo "OT Date and Time Already Exist On Archive!";				
                            exit();
                        }

                    }
                }


                include('../../../config/dbconfig-OT2.php');
                $zero = 0;  
                $pend = 'PENDING';
                $arc = '1900-01-01';
                $insQry = "INSERT into tOTQue (cSysID, cIDNumber, vName, EmpIDNo, cWorkBase, vDeptStore, dFiledDate, dDate, cDayOff, 
                                            isDayOff, cShift, dFrom, dTo, vReason, vOtherR, cStatus, dArchiveDate) 
                                            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insParam = array($cControlNox, $cIDNumber, $vName, $cidnox, $wBase, $vDepartment, $dNow, 
                $dDate, $zero, $zero, $zero, $dFrom, $dTo, $tReason, $tOtherR, $pend, $arc);
                
                $insQryResult = sqlsrv_query($conn, $insQry, $insParam);

                echo "OT Details Successfully Added!!";				
                exit();
            
        }


?>