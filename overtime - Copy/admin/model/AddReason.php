<?php
    include('../../../config/dbconfig-OT2.php');
	session_start();
    
            $Departz = $_POST['Deptz'];
            $Reasonz = $_POST['Reasonz'];

            $insQry = "INSERT into tReason (cReason, vDeptStore) values ('". $Reasonz ."','". $Departz ."')";
            $insQryResult = sqlsrv_query($conn, $insQry);
            
            echo 'Reason Successfully Added!'


?>