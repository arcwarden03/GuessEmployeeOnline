
    <?php

                session_start();
         
                include('DBConnect2.php');   

                $cIDno = $_POST['cidnoX'];
                $qryApprovers = "SELECT vName from vOnlineUserAccount where cIDNumber = '" . trim($cIDno) . "'"; 
                $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          $r= $rowA['vName'];
                        
                        }
                            
                      //echo json_encode($data);
                        echo $r; 



?>