<?php
    $DOF = trim($_REQUEST['dofx']);

    $timestamp = strtotime($DOF);
	$day = date('l', $timestamp);
	echo $day;
?>
