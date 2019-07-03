<?php
$PayrollServer = "192.168.2.6"; //serverName\instanceName
$cnInfoMain = array( "Database"=>"ITPAYROLL09", "UID"=>"sa", "PWD"=>"gu3ss@1t");
$cnPayroll = sqlsrv_connect($PayrollServer, $cnInfoMain);

if( $cnPayroll ) {
    
}else{
     echo "<p style=\"color:red;\">Cannot connect to server to collect approvers. Please call IT for support!.</p><br />";
     die( print_r( sqlsrv_errors(), true));
}
?>