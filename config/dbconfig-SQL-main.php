<?php
$serverNameMain = "192.168.1.236"; //serverName\instanceName
$connectionInfoMain = array( "Database"=>"ITPAYROLLPIF", "UID"=>"raymir", "PWD"=>"mir@123");
$connmain = sqlsrv_connect( $serverNameMain, $connectionInfoMain);

if( $connmain ) {
    
}else{
     echo "<p style=\"color:red;\">Cannot connect to server to collect approvers. Please call IT for support!.</p><br />";
     die( print_r( sqlsrv_errors(), true));
}
?>