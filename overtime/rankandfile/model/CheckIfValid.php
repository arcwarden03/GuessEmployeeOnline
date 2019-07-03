<?php
    $OTDate = $_REQUEST['OTd'];
    $tempDLate = strtotime(date("M d Y ")) - (strtotime($OTDate));
    $dDays = floor($tempDLate/3600/24);
    echo $dDays
?>
