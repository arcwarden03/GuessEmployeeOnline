
<?php
                include('../../../config/dbconfig-OT2.php');
                $qryLastF = "SELECT max(dFiledDate) as 'lastF' from tOTProcess
                where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'
                UNION ALL
                SELECT max(dFiledDate) as 'lastF' from tOTProcessH 
                where cIDNumber = '" . $_SESSION['SESS_cIDNumber'] . "'
                GROUP BY dFiledDate"; 
                        $rsltX=sqlsrv_query($conn, $qryLastF);
                        while ($rowA = sqlsrv_fetch_array($rsltX))  
                        {
                          $dLastF  = substr($rowA['lastF'], 0, 11);
                          
                        }
                if ($dLastF ==''){
                  echo 'N/A';
                } else {
                  echo $dLastF;
                }
?>