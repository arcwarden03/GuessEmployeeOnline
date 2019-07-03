<?php
$serverName = "192.168.1.236"; //serverName
$connectionInfo = array( "Database"=>"ITOTSYS19", "UID"=>"raymir", "PWD"=>"mir@123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
     echo "<p style=\"color:red;\">Cannot connect to server to collect approvers. Please call IT for support!.</p><br />";
     die( print_r( sqlsrv_errors(), true));
}
?>