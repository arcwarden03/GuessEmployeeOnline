
<?php
                session_start();
                include('../../../config/dbconfig-OT.php');

                $cIDno = $_POST['cidnoX'];
                $qryApprovers = "SELECT vName, vDepartment from vOnlineUserAccount where cIDNumber = '" . trim($cIDno) . "'"; 
                $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {

                         $name = trim($rowA['vName']);
                         $name = utf8_encode($name);
                         $data['jName'] = $name;
                         $data['jDept'] = trim($rowA['vDepartment']);
                        }
                            
                      echo json_encode($data);
                        //echo $r;
        
?>