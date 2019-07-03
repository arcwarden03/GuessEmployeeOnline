
<?php
                session_start();
                include('DBConnect2.php');  

                $cIDno = $_POST['cidnoX'];
                $qryApprovers = "SELECT * from vOnlineUserAccount where cIDNumber = '" . trim($cIDno) . "'"; 
                $rsltApprovers=sqlsrv_query($conn, $qryApprovers);
                while ($rowA = sqlsrv_fetch_array($rsltApprovers))  
                        {
                          //$name=html_entity_decode(htmlentities($name));
                           
                         $name = trim($rowA['vName']);

                         $name = utf8_encode($name);

                          $data['jName'] = $name;
                          $data['jDept'] = $rowA['vDepartment'];
                          $data['jDesign'] = $rowA['vDesignation'];
                          $data['jAgency'] = $rowA['vAgency'];

                        }
                            
                    
                        //echo $r;

         $qryApprovers2 = "SELECT * from tOnlineGlobalApproval where cIDNumber='" . trim($cIDno) . "' and nLevel='1' "; 
                      
                        $rsltApprovers2=sqlsrv_query($conn, $qryApprovers2);
                        while ($rowA2 = sqlsrv_fetch_array($rsltApprovers2))  
                        {
                          
                          $data['jAppName'] = $rowA2['vAppName'];
                          $AppName  = $rowA2['vAppName'];
                               }

                        $fmail = "Select * from vOnlineUserAccount where vName = '" . ($AppName) . "'";
                        $rmail=sqlsrv_query($conn, $fmail);
                            while ($appmail = sqlsrv_fetch_array($rmail))  
                                      {
                                          
                                 $data['jEmail'] = $appmail['vemail'];
                                      }

                


                          echo json_encode($data);
        
?>